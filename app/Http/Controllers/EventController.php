<?php

namespace App\Http\Controllers;

use App\Captain;
use App\Scout;
use App\User;
use App\Notifications\notifyCaptain;
use App\Concerned;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
use Carbon\Carbon;
 use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //
    public function getCaptains(){

        $captain =DB::select('select * from scouts where scout_id in ( select scout_id from captains)');
        $current_user = Auth::user()->captain->role;
        return response()->json(["captain"=>[$captain,$current_user]]);
    }
    public function PostEvent(Request $request){
        $title = $request->input('title');
        $desc = $request->input('desc');
        $type = $request->input('type');
        $time = $request->input('time');
        $location = $request->input('location');
        $Concerned = $request->input('Concerned');
        $responsible = $request->input('responsible');
        $image = $request->input('image');
        $created_by = Auth::user()->profile->scout_id;
        $created_at = date('Y-m-d H:i:s');
        $unit = $request->input('unit');
        $event_image = $this->insertEventImage($image);
        if(Auth::user()->captain->role=='gov'){
            if($unit!="")
            $unit = Auth::user()->captain->unit;
            else
                $unit ="gov";
        }
         if(Auth::user()->captain->role !='gov' && Auth::user()->captain->role!='med' && Auth::user()->captain->role!='vmed'){
            $unit = Auth::user()->captain->unit;
         }
        if(Auth::user()->captain->role=='trne'){
          $approved = false;

        }else{
          $approved = true;
        }




        $event_id = DB::table('events')->insertGetId(
            [
                'created_by'=>$created_by,
                'title' => $title,
                'description' =>$desc,
                'type'=>$type,
                'responsible'=>$responsible,
                'event_time'=>$time,
                'location'=>$location,
                'created_at'=>$created_at,
                'event_image'=>$event_image,
                'approved'=>$approved,
                'unit'=>$unit,
            ]
        );


                $gov_id = Captain::where('role','gov')->value('scout_id');
                $med_id = Captain::where('role','med')->value('scout_id');
                $vmed_id = Captain::where('role','vmed')->value('scout_id');

                $gov_user = User::find($gov_id);
                $med_user = User::find($med_id);
                $vmed_user = User::find($vmed_id);

                $current_user = Auth::user();
                $current_user_fullname=' '.$current_user->profile->last_name .' '.$current_user->profile->first_name.' ';

                  $notification_type = '( حدث للموافقة(  '.$type;

                if(Auth::user()->captain->role=='trne'){

                  foreach ($Concerned as $concerned ){

                      DB::insert('insert into concerned (event_id,scout_id) values(?,?)',[$event_id,$concerned['scout_id']]);

                     }

                    $ucap_id = Captain::where('unit',$current_user->captain->unit)->where('role','ucap')->value('scout_id');
                      $vucap_id = Captain::where('unit',$current_user->captain->unit)->where('role','vucp')->value('scout_id');
                        $capa_id = Captain::where('unit',$current_user->captain->unit)->where('role','capa')->value('scout_id');

                   $ucap = User::find($ucap_id);
                  $vucap = User::find($vucap_id);
                  $capa = User::find($capa_id);
                       $message_forgov="القائد المربص".$current_user_fullname.'قام بوضع حدث جديد منتظرا الموافقة عليه';
                       if($gov_user!=null)
                      $gov_user->notify(new notifyCaptain($message_forgov,$notification_type,$event_image,$time));
                    if($med_user!=null)
                      $med_user->notify(new notifyCaptain($message_forgov,$notification_type,$event_image,$time));
                    if($ucap!=null)
                        $ucap->notify(new notifyCaptain($message_forgov,$notification_type,$event_image,$time));
                    if($vucap!=null)
                          $vucap->notify(new notifyCaptain($message_forgov,$notification_type,$event_image,$time));
                    if($capa!=null)
                            $capa->notify(new notifyCaptain($message_forgov,$notification_type,$event_image,$time));



                }else{

                     if(Auth::user()->captain->role!='gov'){
                          $message_forgov="لقد قام".$current_user_fullname.'بوضع منشور جديد ';
                         if($gov_user!=null)
                            $gov_user->notify(new notifyCaptain($message_forgov,$notification_type,$event_image,$time));
                            if(Auth::user()->captain->role !='med'){
                              $message_forgov="لقد قام".$current_user_fullname.'بوضع منشور جديد ';
                                if($med_user!=null)
                                $med_user->notify(new notifyCaptain($message_forgov,$notification_type,$event_image,$time));
                                if(Auth::user()->captain->role !='vmed'){
                                    if($vmed_user!=null)
                                  $vmed_user->notify(new notifyCaptain($message_forgov,$notification_type,$event_image,$time));
                                }
                            }

                     }
                     foreach ($Concerned as $concerned ){

                         DB::insert('insert into concerned (event_id,scout_id) values(?,?)',[$event_id,$concerned['scout_id']]);

                         $current_user = Auth::user()->profile;
                         $current_user_fullname=' '.$current_user->last_name .' '.$current_user->first_name.' ';
                         $notification_message =" لقد تم اختيارك من طرف".$current_user_fullname. " الرجاء تأكيد الحضور من عدمه";


                         $user = User::find($concerned['scout_id']);
                          $notification_type = '( حدث جديد(  '.$type;
                          if($user!=null)
                           $user->notify(new notifyCaptain($notification_message,$notification_type,$event_image,$time));
                        }
                }




        return response()->json(["event"=>$type]);

    }
    public function getMyEvents(){
        $scout_id = Auth::user()->scout_id;
        $scout = Scout::find($scout_id);
        $event = Event::where('created_by',$scout_id)->get();
        return response()->json(["Events"=>[$event,$scout]]);
    }
    public function insertEventImage( $image){
        $filename="";
        $filepath="";
        if($image==""){
            $filename="";
        }else{
            $expl = explode(',',$image);
            $decode = base64_decode($expl[1]);
            if(str_contains($expl[0],'png')){
                $exte= 'png';

            }else{
                $exte= 'jpeg';
            }
            $currenttime = Carbon::now()->timestamp;
            $filename = 'Event'. $currenttime.'.'.$exte;
            $filepath = public_path().'/images/EventImages/'.$filename;


            file_put_contents($filepath,$decode);

        }
        return $filename;

    }
    public function getEvent($event_id){
        $event = Event::find($event_id);

        $concerned = Concerned::where('event_id',$event_id)->get();
        $concerned_id=[];
        foreach ($concerned as $con){
            $scout = Scout::find($con->scout_id);
            array_push($concerned_id,$scout);
        }
        return response()->json(["event"=>[$event,$concerned_id]]);

    }
    public function UpdateEvent(Request $request)
    {
        $event_id = $request->input('event_id');
        $title = $request->input('title');
        $desc = $request->input('desc');
        $type = $request->input('type');
        $time = $request->input('event_time');
        $location = $request->input('location');
        $Concerned = $request->input('Concerned');
        $responsible = $request->input('responsible');
        $image = $request->input('image');
        $updated_at = date('Y-m-d H:i:s');
        $unit = $request->input('unit');
        $event_image = "";
        $event = Event::find($event_id);
        $concerned = Concerned::where('event_id', $event_id);
        $concerned->delete();
        if ($unit == "") {
            $unit = Auth::user()->captain->unit;
        }


        $event->title = $title;
        $event->description = $desc;
        $event->type = $type;
        $event->event_time = $time;
        $event->responsible = $responsible;
        $event->location = $location;
        $event->unit = $unit;
        $event->updated_at = date('Y-m-d H:i:s');


        $oldimage = Event::find($event_id)->event_image;
        if ($image == null) {

            $notification_image = $oldimage;
        } else {


            $this->deleteOldEventImage($oldimage);
            $event_image = $this->insertEventImage($image);
            $notification_image = $event_image;
            $event->event_image = $event_image;
        }


        $current_user = Auth::user()->profile;
        $current_user_fullname = ' ' . $current_user->last_name . ' ' . $current_user->first_name . ' ';
        $message_forgov = "  الحدث تم تعديله بواسطة " . $current_user_fullname;
        $notification_type = '( تعديل الحدث (  ' . $type;
        $gov_id = Captain::where('role', 'gov')->value('scout_id');
        $gov_user = User::find($gov_id);

        $med_id = Captain::where('role', 'med')->value('scout_id');
        $vmed_id = Captain::where('role', 'vmed')->value('scout_id');
        $med_user = User::find($med_id);
        $vmed_user = User::find($vmed_id);

        if (Auth::user()->captain->role == 'trne') {
            $trainee_unit = Auth::user()->captain->unit;


            $ucap_id = Captain::where('role', 'ucap')->where('unit', $trainee_unit)->value('scout_id');
            $vucp_id = Captain::where('role', 'vucp')->where('unit', $trainee_unit)->value('scout_id');
            $capa_id = Captain::where('role', 'capa')->where('unit', $trainee_unit)->value('scout_id');


            $ucap_user = User::find($ucap_id);

            $vucp_user = User::find($vucp_id);
            $capa_user = User::find($capa_id);


            /**
             * here if the curent user who update event is trainee so we have two situation
             * 1- the frist one if his event he want to update isn't  approved
             *      so we need this steps
             *        1- send notification to the governor
             *        2- send notification to the media responsible
             *        3- send notification to the vice media responsible
             *        4- send notification to the same unit captain
             *        5- send notification to the same viceunit captain
             *        6- send notification to the same unit captain assistant
             *        7- update concerned without informe them
             *  2- second situation is when the updater is trainee too but this time  his event  is approved
             *        so we need to do this steps
             *          1-send notification to the ucap
             *          2-send notification to the vucap
             *          3-send notification to the capa
             *          4-send notification to who's concerned
             *          5-send notification to the med
             *          6-send notification to the vmed
             *
             **/

            if ($event->approved == false) {

                if ($gov_user != null)
                    $gov_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));

                if ($med_user != null)
                    $med_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));
                if ($vmed_user != null)
                    $vmed_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));
                if ($ucap_user != null)
                    $ucap_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));
                if ($vucp_user != null)
                    $ucap_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));

                if ($capa_user != null)
                    $capa_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));

                foreach ($Concerned as $con)
                    DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);


            } else {
                if ($med_user != null)
                    $med_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));
                if ($vmed_user != null)
                    $vmed_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));
                if ($ucap_user != null)
                    $ucap_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));
                if ($vucp_user != null)
                    $ucap_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));

                if ($capa_user != null)
                    $capa_user->notify(new notifyCaptain($message_forgov, $notification_type, $notification_image, $time));
                foreach ($Concerned as $con) {
                    DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                    $current_user = Auth::user()->profile;
                    $current_user_fullname = ' ' . $current_user->last_name . ' ' . $current_user->first_name . ' ';
                    $notification_message = " لقد تم اختيارك من طرف" . $current_user_fullname . " الرجاء تأكيد الحضور من عدمه";

                    $user = User::find($con['scout_id']);
                    if ($user != null)
                        $user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                }

            }

        } /**
         *  now we are in complicated situation
         *    1- if the updater is  the creator and in the same time the $responsible
         *      so we will not notify him
         *          1-if the updater is the governor so we need just to notify who's concerned (med too )
         *          2-if the updater is the med so we need to notify who's concerned and the governor also
         *          3-if the updater is the vmed so we need to notify who's concerned and the governor & media
         *          4- if the updater is ucap so we need to notify(vucp,capa,trne) + govenor + med + $vmed_id + who's concerned
         *          5- if the updater is vucp // // / // / / // / (ucap,capa,trne) / // /  // // // / //////////////////////
         *          6- if the updater is capa // // / // / / // / (ucap,capa,trne) / // /  // // // / ////////////////////
         *   2- if the updater is not he creator
         *          1- if he's the responsible
         *               1-
         **/

        else {


            $creator = $event->created_by;
            $responsible = $event->responsible;
            $creator_user = User::find($creator);
            $responsible_user = User::find($responsible);

            $user = Auth::user();
            $user_id = $user->scout_id;
            $user_role = $user->captain->role;

            $cap_unit = $user->captain->assignedRole->getUnit();
            $ucap_user_unit = $user->captain->unit;

            $current_user = $user->profile;
            $current_user_fullname = ' ' . $current_user->last_name . ' ' . $current_user->first_name . ' ';

            if ($user_role == 'gov') {
                $notification_message = " قام القائد " . $current_user_fullname . "  يتعديل حدث ";
                if ($user_id == $responsible) {
                    // so the gov is responsible
                    if ($user_id == $creator) {
                        // the gov is responsible + is creator
                        $notification_message = " قام القائد " . $current_user_fullname . "  بتعديل حدث  ";
                        if ($med_user != null && $med_user != $creator_user && $med_user != $responsible_user){

                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($vmed_user != null &&  $vmed_user != $creator_user && $vmed_user != $responsible_user ){

                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام القائد " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);

                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    } else {
                        // the gov is responsible but is not creator
                        $notification_message = " قام القائد " . $current_user_fullname . "  بتعديل حدث هو المسؤول عنه  ";
                        if ($med_user != null && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($creator_user != null){
                            $notification_message = " قام القائد " . $current_user_fullname . "  بتعديل حدث قمت بكتابته ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام القائد " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    }

                } else {
                    // so the gov is not a responsible
                    if ($user_id == $creator) {
                        // the gov is a creator
                        $notification_message = " قام القائد " . $current_user_fullname . " بتعديل حدث ";
                        if ($med_user != null && $med_user != $responsible_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null){
                            $notification_message = " قام القائد " . $current_user_fullname . " بتعديل حدث وتم وضعك كمسؤول في هذا الحدث ";
                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام القائد " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    } else {
                        $notification_message = " قام القائد " . $current_user_fullname . " بتعديل حدث";
                        // the gov is not creator
                        if ($med_user != null && $med_user != $responsible_user  && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user  && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null && $responsible_user !=  $creator_user){
                            $notification_message = " قام القائد " . $current_user_fullname ."  بتعديل حدث  ";

                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($creator_user != null){
                            $notification_message = " قام القائد " . $current_user_fullname . "  بتعديل حدث  ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    }

                }


            }
            if ($user_role == 'med') {
                $notification_message = " قام مسؤول الاعلام " . $current_user_fullname . "  يتعديل حدث ";
                if ($user_id == $responsible) {
                    // so the med is responsible
                    if ($user_id == $creator) {
                        // the gov is responsible + is creator
                        $notification_message = " قام مسؤول الاعلام " . $current_user_fullname . "  بتعديل حدث  ";
                        if ($gov_user != null && $gov_user != $creator_user && $gov_user != $responsible_user){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($vmed_user != null &&  $vmed_user != $creator_user && $vmed_user != $responsible_user ){

                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام مسؤول الاعلام " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);

                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    } else {
                        // the gov is responsible but is not creator
                        $notification_message = " قام مسؤول الاعلام " . $current_user_fullname . "  بتعديل حدث هو المسؤول عنه  ";
                        if ($gov_user != null && $gov_user != $creator_user)
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($creator_user != null){
                            $notification_message = " قام مسؤول الاعلام " . $current_user_fullname . "  بتعديل حدث قمت بكتابته ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام مسؤول الاعلام " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    }

                } else {
                    // so the gov is not a responsible
                    if ($user_id == $creator) {
                        // the gov is a creator
                        $notification_message = " قام  مسؤول الاعلام " . $current_user_fullname . " بتعديل حدث ";
                        if ($gov_user != null && $gov_user != $responsible_user)
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null){
                            $notification_message = " قام  مسؤول الاعلام " . $current_user_fullname . " بتعديل حدث وتم وضعك كمسؤول في هذا الحدث ";
                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام مسؤول الاعلام " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    } else {
                        $notification_message = " قام مسؤول الاعلام " . $current_user_fullname . " بتعديل حدث";
                        // the gov is not creator
                        if ($gov_user != null && $gov_user != $responsible_user  && $gov_user != $creator_user)
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user  && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null && $responsible_user !=  $creator_user){
                            $notification_message = " قام مسؤول الاعلام " . $current_user_fullname ."  بتعديل حدث  ";

                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($creator_user != null){
                            $notification_message = " قام مسؤول الاعلام " . $current_user_fullname . "  بتعديل حدث  ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    }

                }


            }
            if ($user_role == 'vmed') {
                $notification_message = " قام نائب مسؤول الاعلام " . $current_user_fullname . "  يتعديل حدث ";
                if ($user_id == $responsible) {
                    // so the med is responsible
                    if ($user_id == $creator) {
                        // the gov is responsible + is creator
                        $notification_message = " قام نائب مسؤول الاعلام " . $current_user_fullname . "  بتعديل حدث  ";
                        if ($gov_user != null && $gov_user != $creator_user && $gov_user != $responsible_user){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null &&  $med_user != $creator_user && $med_user != $responsible_user ){

                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام نائب مسؤول الاعلام " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);

                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    } else {
                        // the gov is responsible but is not creator
                        $notification_message = " قام نائب  مسؤول الاعلام " . $current_user_fullname . "  بتعديل حدث هو المسؤول عنه  ";
                        if ($gov_user != null && $gov_user != $creator_user)
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($med_user != null && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($creator_user != null){
                            $notification_message = " قام نائب  مسؤول الاعلام " . $current_user_fullname . "  بتعديل حدث قمت بكتابته ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام نائب  مسؤول الاعلام " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    }

                } else {
                    // so the gov is not a responsible
                    if ($user_id == $creator) {
                        // the gov is a creator
                        $notification_message = " قام  نائب  مسؤول الاعلام " . $current_user_fullname . " بتعديل حدث ";
                        if ($gov_user != null && $gov_user != $responsible_user)
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($med_user != null && $med_user != $responsible_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null){
                            $notification_message = " قام  نائب  مسؤول الاعلام " . $current_user_fullname . " بتعديل حدث وتم وضعك كمسؤول في هذا الحدث ";
                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام  نائب مسؤول الاعلام " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    } else {
                        $notification_message = " قام نائب  مسؤول الاعلام " . $current_user_fullname . " بتعديل حدث";
                        // the gov is not creator
                        if ($gov_user != null && $gov_user != $responsible_user  && $gov_user != $creator_user)
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($med_user != null && $med_user != $responsible_user  && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null && $responsible_user !=  $creator_user){
                            $notification_message = " قام نائب  مسؤول الاعلام " . $current_user_fullname ."  بتعديل حدث  ";

                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($creator_user != null){
                            $notification_message = " قام نائب  مسؤول الاعلام " . $current_user_fullname . "  بتعديل حدث  ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    }

                }


            }
            if ($user_role == 'ucap') {
                $notification_message = " قام قائد الوحدة " . $current_user_fullname . "  يتعديل حدث ";
                if ($user_id == $responsible) {
                    // so the med is responsible
                    if ($user_id == $creator) {
                        // the gov is responsible + is creator
                        $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                        if ($gov_user != null && $gov_user != $creator_user && $gov_user != $responsible_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null &&  $med_user != $creator_user && $med_user != $responsible_user ){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null &&  $vmed_user != $creator_user && $vmed_user != $responsible_user ){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $vucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','vucp')->value('scout_id'));
                        $capa_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','capa')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام قائد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($vucap_user != null &&  $vucap_user != $creator_user && $vucap_user != $responsible_user ){

                            $vucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($capa_user != null &&  $capa_user != $creator_user && $capa_user != $responsible_user ){

                            $capa_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&  $trne_user != $creator_user && $trne_user != $responsible_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        foreach ($Concerned as $con) {
                            $notification_message = " قام قائد الوحدة " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);

                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    } else {
                        // the gov is responsible but is not creator
                        $notification_message = " قام قائد الوحدة " . $current_user_fullname . "  بتعديل حدث هو المسؤول عنه  ";
                        if ($gov_user != null && $gov_user != $creator_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null && $med_user != $creator_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null && $vmed_user != $creator_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $vucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','vucp')->value('scout_id'));
                        $capa_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','capa')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام قائد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($vucap_user != null &&  $vucap_user != $creator_user  ){

                            $vucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($capa_user != null &&  $capa_user != $creator_user ){

                            $capa_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&  $trne_user != $creator_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($creator_user != null){
                            $notification_message = " قام قائد الوحدة " . $current_user_fullname . "  بتعديل حدث قمت بكتابته ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام قائد الوحدة " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    }

                } else {
                    // so the gov is not a responsible
                    if ($user_id == $creator) {
                        // the gov is a creator
                        $notification_message = " قام  قائد الوحدة " . $current_user_fullname . " بتعديل حدث ";
                        if ($gov_user != null && $gov_user != $responsible_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null && $med_user != $responsible_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null && $vmed_user != $responsible_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($responsible_user != null){
                            $notification_message = " قام  قائد وحدة " . $cap_unit.' ' .$current_user_fullname . " بتعديل حدث وتم وضعك كمسؤول في هذا الحدث ";
                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $vucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','vucp')->value('scout_id'));
                        $capa_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','capa')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام قائد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($vucap_user != null &&   $vucap_user != $responsible_user ){

                            $vucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($capa_user != null &&   $capa_user != $responsible_user ){

                            $capa_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&   $trne_user != $responsible_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام  قائد الوحدة " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    } else {
                        $notification_message = " قام قائد الوحدة " . $current_user_fullname . " بتعديل حدث";
                        // the gov is not creator
                        if ($gov_user != null && $gov_user != $responsible_user  && $gov_user != $creator_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null && $med_user != $responsible_user  && $med_user != $creator_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null && $vmed_user != $responsible_user  && $vmed_user != $creator_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        if ($responsible_user != null && $responsible_user !=  $creator_user){
                            $notification_message = " قام قائد وحدة " .  $cap_unit.' '.$current_user_fullname ."  بتعديل حدث  ";

                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($creator_user != null){
                            $notification_message = " قام قائد وحدة " .  $cap_unit.' '.$current_user_fullname ."  بتعديل حدث  ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $vucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','vucp')->value('scout_id'));
                        $capa_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','capa')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام قائد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($vucap_user != null &&  $vucap_user != $creator_user && $vucap_user != $responsible_user ){

                            $vucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($capa_user != null &&  $capa_user != $creator_user && $capa_user != $responsible_user ){

                            $capa_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&  $trne_user != $creator_user && $trne_user != $responsible_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    }

                }


            }
            if ($user_role == 'vucp') {
                $notification_message = " قام نائب قائد الوحدة " . $current_user_fullname . "  يتعديل حدث ";
                if ($user_id == $responsible) {
                    // so the med is responsible
                    if ($user_id == $creator) {
                        // the gov is responsible + is creator
                        $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                        if ($gov_user != null && $gov_user != $creator_user && $gov_user != $responsible_user){
                            $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null &&  $med_user != $creator_user && $med_user != $responsible_user ){
                            $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null &&  $vmed_user != $creator_user && $vmed_user != $responsible_user ){
                            $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $ucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','ucap')->value('scout_id'));
                        $capa_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','capa')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام نائب قائد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($ucap_user != null &&  $ucap_user != $creator_user && $ucap_user != $responsible_user ){

                            $ucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($capa_user != null &&  $capa_user != $creator_user && $capa_user != $responsible_user ){

                            $capa_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&  $trne_user != $creator_user && $trne_user != $responsible_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        foreach ($Concerned as $con) {
                            $notification_message = " قام نائب قائد الوحدة " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);

                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    } else {
                        // the gov is responsible but is not creator
                        $notification_message = " قام نائب قائد الوحدة " . $current_user_fullname . "  بتعديل حدث هو المسؤول عنه  ";
                        if ($gov_user != null && $gov_user != $creator_user){
                            $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null && $med_user != $creator_user){
                            $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null && $vmed_user != $creator_user){
                            $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $ucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','ucap')->value('scout_id'));
                        $capa_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','capa')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام نائب قائد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($ucap_user != null &&  $ucap_user != $creator_user  ){

                            $ucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($capa_user != null &&  $capa_user != $creator_user ){

                            $capa_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&  $trne_user != $creator_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($creator_user != null){
                            $notification_message = " قام نائب قائد الوحدة " . $current_user_fullname . "  بتعديل حدث قمت بكتابته ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام نائب قائد الوحدة " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    }

                } else {
                    // so the gov is not a responsible
                    if ($user_id == $creator) {
                        // the gov is a creator
                        $notification_message = " قام نائب  قائد الوحدة " . $current_user_fullname . " بتعديل حدث ";
                        if ($gov_user != null && $gov_user != $responsible_user){
                            $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null && $med_user != $responsible_user){
                            $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null && $vmed_user != $responsible_user){
                            $notification_message = " قام نائب قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($responsible_user != null){
                            $notification_message = " قام نائب  قائد وحدة " . $cap_unit.' ' .$current_user_fullname . " بتعديل حدث وتم وضعك كمسؤول في هذا الحدث ";
                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $ucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','ucap')->value('scout_id'));
                        $capa_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','capa')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام نائب قائد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($ucap_user != null &&   $ucap_user != $responsible_user ){

                            $ucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($capa_user != null &&   $capa_user != $responsible_user ){

                            $capa_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&   $trne_user != $responsible_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام نائب  قائد الوحدة " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    } else {
                        $notification_message = " قام قائد الوحدة " . $current_user_fullname . " بتعديل حدث";
                        // the gov is not creator
                        if ($gov_user != null && $gov_user != $responsible_user  && $gov_user != $creator_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null && $med_user != $responsible_user  && $med_user != $creator_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null && $vmed_user != $responsible_user  && $vmed_user != $creator_user){
                            $notification_message = " قام قائد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        if ($responsible_user != null && $responsible_user !=  $creator_user){
                            $notification_message = " قام قائد وحدة " .  $cap_unit.' '.$current_user_fullname ."  بتعديل حدث  ";

                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($creator_user != null){
                            $notification_message = " قام قائد وحدة " .  $cap_unit.' '.$current_user_fullname ."  بتعديل حدث  ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $ucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','ucap')->value('scout_id'));
                        $capa_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','capa')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام قائد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($ucap_user != null &&  $ucap_user != $creator_user && $ucap_user != $responsible_user ){

                            $ucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($capa_user != null &&  $capa_user != $creator_user && $capa_user != $responsible_user ){

                            $capa_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&  $trne_user != $creator_user && $trne_user != $responsible_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    }

                }


            }
            if ($user_role == 'capa') {
                $notification_message = " قام نائب قائد الوحدة " . $current_user_fullname . "  يتعديل حدث ";
                if ($user_id == $responsible) {
                    // so the med is responsible
                    if ($user_id == $creator) {
                        // the gov is responsible + is creator
                        $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                        if ($gov_user != null && $gov_user != $creator_user && $gov_user != $responsible_user){
                            $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null &&  $med_user != $creator_user && $med_user != $responsible_user ){
                            $notification_message = " قام االقائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null &&  $vmed_user != $creator_user && $vmed_user != $responsible_user ){
                            $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $ucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','ucap')->value('scout_id'));
                        $vucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','vucp')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام القائد المساعد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($ucap_user != null &&  $ucap_user != $creator_user && $ucap_user != $responsible_user ){

                            $ucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vucap_user != null &&  $vucap_user != $creator_user && $vucap_user != $responsible_user ){

                            $vucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&  $trne_user != $creator_user && $trne_user != $responsible_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        foreach ($Concerned as $con) {
                            $notification_message = " قام القائد المساعد الوحدة " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);

                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    } else {
                        // the gov is responsible but is not creator
                        $notification_message = " قام القائد المساعد الوحدة " . $current_user_fullname . "  بتعديل حدث هو المسؤول عنه  ";
                        if ($gov_user != null && $gov_user != $creator_user){
                            $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null && $med_user != $creator_user){
                            $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null && $vmed_user != $creator_user){
                            $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $ucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','ucap')->value('scout_id'));
                        $vucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','vucp')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام القائد المساعد الوحدة " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($ucap_user != null &&  $ucap_user != $creator_user  ){

                            $ucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vucap_user != null &&  $vucap_user != $creator_user ){

                            $vucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&  $trne_user != $creator_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($creator_user != null){
                            $notification_message = " قام القائد المساعد الوحدة " . $current_user_fullname . "  بتعديل حدث قمت بكتابته ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام القائد المساعد الوحدة " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    }

                } else {
                    // so the gov is not a responsible
                    if ($user_id == $creator) {
                        // the gov is a creator
                        $notification_message = " قام القائد المساعد الوحدة " . $current_user_fullname . " بتعديل حدث ";
                        if ($gov_user != null && $gov_user != $responsible_user){
                            $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null && $med_user != $responsible_user){
                            $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null && $vmed_user != $responsible_user){
                            $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($responsible_user != null){
                            $notification_message = " قام القائد المساعد وحدة " . $cap_unit.' ' .$current_user_fullname . " بتعديل حدث وتم وضعك كمسؤول في هذا الحدث ";
                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $ucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','ucap')->value('scout_id'));
                        $vucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','vucp')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام القائد المساعد  " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($ucap_user != null &&   $ucap_user != $responsible_user ){

                            $ucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vucap_user != null &&   $vucap_user != $responsible_user ){

                            $vucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&   $trne_user != $responsible_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام القائد المساعد " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    } else {
                        $notification_message = " قام القائد المساعد " . $current_user_fullname . " بتعديل حدث";
                        // the gov is not creator
                        if ($gov_user != null && $gov_user != $responsible_user  && $gov_user != $creator_user){
                            $notification_message = " قام القائد المساعد " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($med_user != null && $med_user != $responsible_user  && $med_user != $creator_user){
                            $notification_message = " قام القائد المساعد " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vmed_user != null && $vmed_user != $responsible_user  && $vmed_user != $creator_user){
                            $notification_message = " قام القائد المساعد " . $cap_unit.' '.$current_user_fullname . "  بتعديل حدث  ";
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        if ($responsible_user != null && $responsible_user !=  $creator_user){
                            $notification_message = " قام القائد المساعد " .  $cap_unit.' '.$current_user_fullname ."  بتعديل حدث  ";

                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($creator_user != null){
                            $notification_message = " قام القائد المساعد " .  $cap_unit.' '.$current_user_fullname ."  بتعديل حدث  ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        $ucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','ucap')->value('scout_id'));
                        $vucap_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','vucp')->value('scout_id'));
                        $trne_user = User::find(Captain::where('unit',$ucap_user_unit)->where('role','trne')->value('scout_id'));
                        $notification_message = " قام القائد المساعد " .$current_user_fullname . "  بتعديل حدث  ";
                        if ($ucap_user != null &&  $ucap_user != $creator_user && $ucap_user != $responsible_user ){

                            $ucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($vucap_user != null &&  $vucap_user != $creator_user && $vucap_user != $responsible_user ){

                            $vucap_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($trne_user != null &&  $trne_user != $creator_user && $trne_user != $responsible_user ){

                            $trne_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    }

                }


            }

            if ($user_role == 'fin') {
                $notification_message = " قام مسؤول المالية " . $current_user_fullname . "  يتعديل حدث ";
                if ($user_id == $responsible) {
                    // so the gov is responsible
                    if ($user_id == $creator) {
                        // the gov is responsible + is creator
                        $notification_message = " قام مسؤول المالية " . $current_user_fullname . "  بتعديل حدث  ";
                        if ($gov_user != null && $gov_user != $creator_user && $gov_user != $responsible_user){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $creator_user && $med_user != $responsible_user){

                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($vmed_user != null &&  $vmed_user != $creator_user && $vmed_user != $responsible_user ){

                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام مسؤول المالية " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);

                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    } else {
                        // the gov is responsible but is not creator

                        $notification_message = " قام مسؤول المالية " . $current_user_fullname . "  بتعديل حدث هو المسؤول عنه  ";
                        if ($gov_user != null && $gov_user != $creator_user ){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($creator_user != null){
                            $notification_message = " قام مسؤول المالية " . $current_user_fullname . "  بتعديل حدث قمت بكتابته ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام مسؤول المالية " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    }

                } else {
                    // so the gov is not a responsible
                    if ($user_id == $creator) {
                        // the gov is a creator
                        $notification_message = " قام مسؤول المالية " . $current_user_fullname . " بتعديل حدث ";
                        if ($gov_user != null && $gov_user != $responsible_user ){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $responsible_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null){
                            $notification_message = " قام مسؤول المالية " . $current_user_fullname . " بتعديل حدث وتم وضعك كمسؤول في هذا الحدث ";
                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام مسؤول المالية " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    } else {
                        $notification_message = " قام مسؤول المالية " . $current_user_fullname . " بتعديل حدث";
                        // the gov is not creator
                        if ($gov_user != null && $gov_user != $responsible_user && $gov_user != $creator_user ){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $responsible_user  && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user  && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null && $responsible_user !=  $creator_user){
                            $notification_message = " قام مسؤول المالية " . $current_user_fullname ."  بتعديل حدث  ";

                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($creator_user != null){
                            $notification_message = " قام مسؤول المالية " . $current_user_fullname . "  بتعديل حدث  ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    }

                }


            }
            if ($user_role == 'surv') {
                $notification_message = " قام مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . "  يتعديل حدث ";
                if ($user_id == $responsible) {
                    // so the gov is responsible
                    if ($user_id == $creator) {
                        // the gov is responsible + is creator
                        $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . "  بتعديل حدث  ";
                        if ($gov_user != null && $gov_user != $creator_user && $gov_user != $responsible_user){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $creator_user && $med_user != $responsible_user){

                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($vmed_user != null &&  $vmed_user != $creator_user && $vmed_user != $responsible_user ){

                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);

                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    } else {
                        // the gov is responsible but is not creator

                        $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . "  بتعديل حدث هو المسؤول عنه  ";
                        if ($gov_user != null && $gov_user != $creator_user ){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($creator_user != null){
                            $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . "  بتعديل حدث قمت بكتابته ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    }

                } else {
                    // so the gov is not a responsible
                    if ($user_id == $creator) {
                        // the gov is a creator
                        $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . " بتعديل حدث ";
                        if ($gov_user != null && $gov_user != $responsible_user ){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $responsible_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null){
                            $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . " بتعديل حدث وتم وضعك كمسؤول في هذا الحدث ";
                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    } else {
                        $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . " بتعديل حدث";
                        // the gov is not creator
                        if ($gov_user != null && $gov_user != $responsible_user && $gov_user != $creator_user ){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $responsible_user  && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user  && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null && $responsible_user !=  $creator_user){
                            $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname ."  بتعديل حدث  ";

                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($creator_user != null){
                            $notification_message = " قام مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname . "  بتعديل حدث  ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    }

                }


            }
            if ($user_role == 'csd') {
                $notification_message = " قام مسؤول خدمة و تنمية المجتمع " . $current_user_fullname . "  يتعديل حدث ";
                if ($user_id == $responsible) {
                    // so the gov is responsible
                    if ($user_id == $creator) {
                        // the gov is responsible + is creator
                        $notification_message = " قام  مسؤول خدمة و تنمية المجتمع " . $current_user_fullname . "  بتعديل حدث  ";
                        if ($gov_user != null && $gov_user != $creator_user && $gov_user != $responsible_user){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $creator_user && $med_user != $responsible_user){

                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($vmed_user != null &&  $vmed_user != $creator_user && $vmed_user != $responsible_user ){

                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام  مسؤول خدمة و تنمية المجتمع " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);

                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    } else {
                        // the gov is responsible but is not creator

                        $notification_message = " قام  مسؤول خدمة و تنمية المجتمع" . $current_user_fullname . "  بتعديل حدث هو المسؤول عنه  ";
                        if ($gov_user != null && $gov_user != $creator_user ){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($creator_user != null){
                            $notification_message = " قام  مسؤول خدمة و تنمية المجتمع " . $current_user_fullname . "  بتعديل حدث قمت بكتابته ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام مسؤول خدمة و تنمية المجتمع " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }
                    }

                } else {
                    // so the gov is not a responsible
                    if ($user_id == $creator) {
                        // the gov is a creator
                        $notification_message = " قام  مسؤول خدمة و تنمية المجتمع " . $current_user_fullname . " بتعديل حدث ";
                        if ($gov_user != null && $gov_user != $responsible_user ){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $responsible_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null){
                            $notification_message = " قام  مسؤول خدمة و تنمية المجتمع " . $current_user_fullname . " بتعديل حدث وتم وضعك كمسؤول في هذا الحدث ";
                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            $notification_message = " قام  مسؤول خدمة و تنمية المجتمع " . $current_user_fullname . " باختيارك لتكون معني بهذا الحدث يرجى تأكيد الحضور من عدمه";
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    } else {
                        $notification_message = " قام  مسؤول خدمة و تنمية المجتمع " . $current_user_fullname . " بتعديل حدث";
                        // the gov is not creator
                        if ($gov_user != null && $gov_user != $responsible_user && $gov_user != $creator_user ){

                            $gov_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }
                        if ($med_user != null && $med_user != $responsible_user  && $med_user != $creator_user)
                            $med_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($vmed_user != null && $vmed_user != $responsible_user  && $vmed_user != $creator_user)
                            $vmed_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        if ($responsible_user != null && $responsible_user !=  $creator_user){
                            $notification_message = " قام  مسؤول متابعة البرامج وتنفيذ الخطط " . $current_user_fullname ."  بتعديل حدث  ";

                            $responsible_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }

                        if ($creator_user != null){
                            $notification_message = " قام خدمة و تنمية المجتمع " . $current_user_fullname . "  بتعديل حدث  ";
                            $creator_user->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));
                        }


                        foreach ($Concerned as $con) {
                            DB::insert('insert into concerned (event_id,scout_id) values(?,?)', [$event_id, $con['scout_id']]);
                            $user_con = User::find($con['scout_id']);
                            if ($user_con != null && $user_id != $con['scout_id'])
                                $user_con->notify(new notifyCaptain($notification_message, $notification_type, $notification_image, $time));

                        }

                    }

                }


            }
        }

            $event->save();

            $user = Auth::user()->scout_id;
            $editedevents = DB::insert('insert into editedevents values(?,?,?)', [$event_id, $user_id, Carbon::now()]);
            return response()->json(["updated" => "Successfully"]);

    }
    public function deleteOldEventImage($image_name){
        $imagepath =  public_path().'/images/EventImages/'.$image_name;
        File::delete($imagepath);

    }
    public function deleteEvent($event_id){

       $concerned = Concerned::where('event_id',$event_id);
        $concerned->delete();

        $event = Event::find($event_id);
        $event->delete();

    }
    public function getConcernedEvents(){
        $user_id = Auth::user()->scout_id;
    $concerned=  DB::select('select  event_id from concerned where scout_id = ?',[$user_id]);

        $concerned_event=[];



            foreach ($concerned as $con){
                $event = Event::with('creator')->with('is_concerned')->where('event_id',$con->event_id)->get()[0];
                array_push($concerned_event,$event);

            }




    return response()->json(["concernedevent"=>[$concerned_event,$user_id]]);


}
    public function Confirm_presence(Request $request){
        $user = Auth::user()->scout_id;
        $event_id = $request->input('event_id');

         $event = Event::find($event_id);
         $concerned = Concerned::where('event_id',$event_id)->where('scout_id','!=',$user);
        $responsible_id = $event->responsible;
        $creator_id = $event->created_by;
        $gov = User::find(Captain::where('role','gov')->value('scout_id'));
        $responsible = User::find($responsible_id);
        $creator = User::find($creator_id);


        $current_user = Auth::user()->profile;
        $current_user_fullname=' '.$current_user->last_name .' '.$current_user->first_name.' ';
        $notification_message = 'القائد'.$current_user_fullname.'أكد حضوره للحدث';
        $notification_type =   '( تأكيد حضور ('.$event->type;
        $notification_image = $event->event_image;
        $notification_time = $event->event_time;






      DB::update('update concerned set presence = ?  where event_id = ? and scout_id = ?',[true,$event_id,$user]);
        if($responsible!=null || $creator!=null){
            if($responsible!=null && $creator!=null){
                if($responsible->scout_id == $creator->scout_id ){
                    if($responsible->scout_id == $gov->scout_id){
                        $gov->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));
                    }else{
                        $responsible->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));
                    }


                }else{









                    if($responsible!=null  ){

                        $responsible->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));



                    }

                    if($creator!=null){

                        $creator->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));

                    }

                }
            }

        }



foreach($concerned as $con){
    if(Auth::user()->scout_id!=$con['scout_id']){
      $concerned_cap = User::find($con['scout_id']);
if($concerned_cap!=null)
  $concerned_cap->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));
    }


}
  return response()->json(["presence"=>true]);
}
/*public function getConcernedEvents(Request $request){





  $user_id = Auth::user()->scout_id;
$concerned=  DB::select('select distinct event_id from concerned where scout_id = ?',[$user_id]);

  $concerned_event=[];



      foreach ($concerned as $con){
          $event = Event::with('creator')->where('event_id',$con->event_id)->get()[0];
          array_push($concerned_event,$event);

      }




return response()->json(["concernedevent"=>$concerned_event]);
}*/
    public function Confirm_absence(Request $request){
  $user = Auth::user()->scout_id;
  $event_id = $request->input('event_id');

   $event = Event::find($event_id);
   $concerned = Concerned::where('event_id',$event_id)->where('scout_id','!=',$user);
  $responsible_id = $event->responsible;
  $creator_id = $event->created_by;
  $gov = User::find(Captain::where('role','gov')->value('scout_id'));
  $responsible = User::find($responsible_id);
  $creator = User::find($creator_id);


  $current_user = Auth::user()->profile;
  $current_user_fullname=' '.$current_user->last_name .' '.$current_user->first_name.' ';
  $notification_message = 'القائد'.$current_user_fullname.'أكد غيابه عن الحدث';
  $notification_type =   '( تأكيد غياب ('.$event->type;
  $notification_image = $event->event_image;
  $notification_time = $event->event_time;






DB::update('update concerned set presence = ?  where event_id = ? and scout_id = ?',[false,$event_id,$user]);

        if($responsible!=null || $creator!=null){
            if($responsible!=null && $creator!=null){
                if($responsible->scout_id == $creator->scout_id ){
                    if($responsible->scout_id == $gov->scout_id){
                        $gov->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));
                    }else{
                        $responsible->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));
                    }


                }else{









                    if($responsible!=null  ){

                            $responsible->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));



                    }

                    if($creator!=null){

                            $creator->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));

                    }

                }
            }

        }

foreach($concerned as $con){
if(Auth::user()->scout_id!=$con['scout_id']){
$concerned_cap = User::find($con['scout_id']);
if($concerned_cap!=null)
$concerned_cap->notify(new notifyCaptain($notification_message,$notification_type,$notification_image,$notification_time));
}


}

    return response()->json(["absence"=>false]);
}
    public function getPresenceEvents(){
    $user = Auth::user()->scout_id;
    $concerned=  DB::select('select  event_id from concerned where scout_id = ? and presence = ?',[$user,1]);
    $presence_events=[];



    foreach ($concerned as $con){
        $event = Event::with('creator')->where('event_id',$con->event_id)->get()[0];
        array_push($presence_events,$event);

    }




    return response()->json(["presence_events"=>$presence_events]);
}
    public function getabsenceevents(){
    $user = Auth::user()->scout_id;
    $concerned=  DB::select('select  event_id from concerned where scout_id = ? and presence = ?',[$user,0]);
    $absence_events=[];



    foreach ($concerned as $con){
        $event = Event::with('creator')->where('event_id',$con->event_id)->get()[0];
        array_push($absence_events,$event);

    }




    return response()->json(["absenceevents"=>$absence_events]);
}
    public function getMyEventsApproved(){
        $user = Auth::user()->scout_id;
        $events_approved = Event::with('creator')->where('created_by',$user)->where('approved',true)->get();
        return response()->json(["approved"=>$events_approved]);
}
    public function getMyUnitEvents(){

    $all_events = Event::with('creator')->where('approved',true)->get();
    $MyUnitEvents = [];
    $user_cap =Auth::user()->captain;
    foreach ($all_events as $event){
        $captain = Captain::where('scout_id',$event->created_by)->get()[0];
        if($captain->unit == $user_cap->unit){
            array_push($MyUnitEvents,$event);
        }
    }
        return response()->json(["allevents"=>[$MyUnitEvents,$user_cap]]);
}
    public function getEventsNotApproved(){

    $notApproved = Event::with('creator')->where('approved',false)->get();
    $notApprovedSameunit =[];
    $user = Auth::user()->captain;
    if($user->role =='gov'| $user->role =='med' | $user->role =='vmed'){
        return response()->json(["notApproved"=>$notApproved]);
    }else{
        if($user->role =='ucap' | $user->role =='vucap' | $user->role =='capa'){
            foreach($notApproved as $sameunit){
                $creator = $notApproved->created_by;
                $captain = Captain::where('scout_id',$creator)->get();

                $captain_unit = $captain->unit;
                if($user->unit==$captain_unit){
                    array_push($notApprovedSameunit,$sameunit);

                }

            }
        }
    }

        return response()->json(["notApproved"=>$notApprovedSameunit]);
}
    public function approveEvent(Request $request){
        $event_id = $request->input('event_id');
    DB::table('events')->where('event_id',$event_id)->update(['approved'=>true]);


    $event = Event::find($event_id);
    $user = Auth::user()->profile;
        $current_user = Auth::user();
        $current_user_fullname=' '.$current_user->profile->last_name .' '.$current_user->profile->first_name.' ';
    $notification_message ='قام القائد '.$current_user_fullname.'بالموافقة على حدث  طالبت بنشره ';
     $notification_type = '( حدث جديد(  '.$event->type;
     $creator = User::find( $event->created_by);
        $creator_unit = $creator->captain->unit;
        $ucap = User::find(Captain::where('unit',$creator_unit)->where('role','ucap')->value('scout_id'));
        $vucap = User::find(Captain::where('unit',$creator_unit)->where('role','vucap')->value('scout_id'));
        $capa = User::find(Captain::where('unit',$creator_unit)->where('role','capa')->value('scout_id'));
        if($creator!=null)
            $creator->notify(new notifyCaptain($notification_message,$notification_type,$event->event_image,$event->event_time));
        $trainee_user_fullname=' '.$creator->profile->last_name .' '.$creator->profile->first_name.' ';
        $notification_message ='قام القائد '.$current_user_fullname.'بالموافقة على حدث  طالب القائد المتربص '.$trainee_user_fullname;
        if($ucap!=null)
            $ucap->notify(new notifyCaptain($notification_message,$notification_type,$event->event_image,$event->event_time));
        if($vucap!=null)
            $vucap->notify(new notifyCaptain($notification_message,$notification_type,$event->event_image,$event->event_time));
        if($capa!=null)
            $capa->notify(new notifyCaptain($notification_message,$notification_type,$event->event_image,$event->event_time));
        return response()->json(["approved"=>true]);
}
    public function disapproveEvent(Request $request){
        $event_id = $request->input('event_id');
    DB::table('events')->where('event_id',$event_id)->update(['approved'=>false]);

        $event = Event::find($event_id);
        $user = Auth::user()->profile;
        $current_user = Auth::user();
        $current_user_fullname=' '.$current_user->profile->last_name .' '.$current_user->profile->first_name.' ';
        $notification_message ='قام القائد '.$current_user_fullname.'برفض  حدث طالبت بنشره ';
        $notification_type = '( حدث جديد(  '.$event->type;
        $creator = User::find( $event->created_by);
        $creator_unit = $creator->captain->unit;
        $ucap = User::find(Captain::where('unit',$creator_unit)->where('role','ucap')->value('scout_id'));
        $vucap = User::find(Captain::where('unit',$creator_unit)->where('role','vucap')->value('scout_id'));
        $capa = User::find(Captain::where('unit',$creator_unit)->where('role','capa')->value('scout_id'));
        if($creator!=null)
            $creator->notify(new notifyCaptain($notification_message,$notification_type,$event->event_image,$event->event_time));
        $trainee_user_fullname=' '.$creator->profile->last_name .' '.$creator->profile->first_name.' ';
        $notification_message ='قام القائد '.$current_user_fullname.'برفض  حدث  طالب القائد المتربص '.$trainee_user_fullname;

        if($ucap!=null)
            $ucap->notify(new notifyCaptain($notification_message,$notification_type,$event->event_image,$event->event_time));
            if($vucap!=null)
                $vucap->notify(new notifyCaptain($notification_message,$notification_type,$event->event_image,$event->event_time));
                if($capa!=null)
                    $capa->notify(new notifyCaptain($notification_message,$notification_type,$event->event_image,$event->event_time));


        return response()->json(["approved"=>false]);
}
    public function getEventsApproved(){

        $event = Event::with('creator')->where('approved',true)->get();

        $event_trainee=[];
    foreach ($event as $trainee_event){
        $creator = $trainee_event->created_by;
        $trainee = Captain::where('scout_id',$creator)->get()[0];
       if($trainee->role=='trne'){
            array_push($event_trainee,$trainee_event);

        }
    }
        return response()->json(["eventsapproved"=>$event_trainee]);
}
    public function getUnitEvents($unit_number){
        /*
         * 1-cub
         * 2-scout
         * 3-advancedscout
         * 4-traveler
         * 5-media
         * 6-CSD
         * 7-Service_Community development
         * 8-Finance
         */

    $Allevents = Event::with('creator')->where('approved',true)->get();
    $unit_events=[];
        switch ($unit_number){
            case 1:{
                //cub

               foreach ($Allevents as $event){
                    $captain = Captain::where('scout_id',  $event->created_by)->get()[0];
                    if($captain->unit=='cubs'){
                        array_push($unit_events,$event);
                    }
                }
                break;
            }
            case 2:{
                foreach ($Allevents as $event){
                    $captain = Captain::where('scout_id',  $event->created_by)->get()[0];
                    if($captain->unit=='sct'){
                        array_push($unit_events,$event);
                    }
                }
                break;
            }
            case 3:{
                foreach ($Allevents as $event){
                    $captain = Captain::where('scout_id',  $event->created_by)->get()[0];
                    if($captain->unit=='asct'){
                        array_push($unit_events,$event);
                    }
                }
                break;
            }
            case 4:{
                foreach ($Allevents as $event){
                    $captain = Captain::where('scout_id',  $event->created_by)->get()[0];
                    if($captain->unit=='tvlr'){
                        array_push($unit_events,$event);
                    }
                }
                break;
            }
            case 5:{
                foreach ($Allevents as $event){
                    $captain = Captain::where('scout_id',  $event->created_by)->get()[0];
                    if($captain->unit=='med'){
                        array_push($unit_events,$event);
                    }
                }
                break;
            }
            case 6:{
                foreach ($Allevents as $event){
                    $captain = Captain::where('scout_id',  $event->created_by)->get()[0];
                    if($captain->unit=='surv'){
                        array_push($unit_events,$event);
                    }
                }
                break;
            }
            case 7:{
                foreach ($Allevents as $event){
                    //Service_Community development
                    $captain = Captain::where('scout_id',  $event->created_by)->get()[0];
                    if($captain->unit=='csd'){
                        array_push($unit_events,$event);
                    }
                }
                break;
            }
            case 8:{
                foreach ($Allevents as $event){
                    $captain = Captain::where('scout_id',  $event->created_by)->get()[0];
                    if($captain->unit=='fin'){
                        array_push($unit_events,$event);
                    }
                }
                break;
            }


        }
    return response()->json(["unit_events"=>$unit_events]);
}
public function getCalenderEvents(){
  $user_id = Auth::user()->scout_id;
$event_resp = Event::where('responsible',$user_id)->get();

$allevents = [];
foreach ($event_resp as $resp) {
array_push($allevents,$resp);
  // code...
}

$concerned = Concerned::where('scout_id',$user_id)->get();
foreach($concerned as $con){



    if(!$this->serach($con['event_id'],$allevents)){
      $event = Event::find($con['event_id']);
        array_push($allevents,$event);
    }
    // code...


}





return response()->json(["CalenderEvents"=>$allevents]);
}
public function serach($con,$allevents){
  foreach ($allevents as $all) {

  if($all->event_id == $con)
  return true;
  return false;
  }

}
}
