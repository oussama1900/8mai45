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
        return response()->json(["captain"=>$captain]);
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
        $event_image = $this->insertEventImage($image);



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
                'approved'=>$approved
            ]
        );

     foreach ($Concerned as $concerned ){

         DB::insert('insert into concerned (event_id,scout_id) values(?,?)',[$event_id,$concerned['scout_id']]);

         $current_user = Auth::user()->profile;
         $current_user_fullname=' '.$current_user->last_name .' '.$current_user->first_name.' ';
         $notification_message =" لقد تم اختيارك من طرف".$current_user_fullname. " الرجاء تأكيد الحضور من عدمه";


         $user = User::find($concerned['scout_id']);
           $user->notify(new notifyCaptain($notification_message,$type,$event_image,$time));
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
    public function UpdateEvent(Request $request){
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
        $event_image="";
        $event = Event::find($event_id);
        $concerned = Concerned::where('event_id',$event_id);
        $concerned->delete();


        $event->title =$title;
        $event->description = $desc;
        $event->type = $type;
        $event->event_time = $time;
        $event->responsible = $responsible;
        $event->location = $location;
        $event->updated_at = date('Y-m-d H:i:s');




$oldimage = Event::find($event_id)->event_image;
        if($image==null){

           $notification_image=$oldimage;
        }else{


            $this->deleteOldEventImage($oldimage);
            $event_image = $this->insertEventImage($image);
               $notification_image=$event_image;
            $event->event_image = $event_image;
        }
        foreach ($Concerned as $con){
            DB::insert('insert into concerned (event_id,scout_id) values(?,?)',[$event_id,$con['scout_id']]);
            $current_user = Auth::user()->profile;
            $current_user_fullname=' '.$current_user->last_name .' '.$current_user->first_name.' ';
            $notification_message =" لقد تم اختيارك من طرف".$current_user_fullname. " الرجاء تأكيد الحضور من عدمه";


            $user = User::find($con['scout_id']);
              $user->notify(new notifyCaptain($notification_message,$type,$notification_image,$time));
        }

        $event->save();

        $user = Auth::user()->scout_id;
        $editedevents = DB::insert('insert into editedevents values(?,?)',[$event_id,$user]);
        return response()->json(["updated"=>"Successfully"]);
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
    $concerned=  DB::select('select Distinct event_id from concerned where scout_id = ?',[$user_id]);

        $concerned_event=[];



            foreach ($concerned as $con){
                $event = Event::with('creator')->where('event_id',$con->event_id)->get();
                array_push($concerned_event,$event);

            }




    return response()->json(["concernedevent"=>$concerned_event]);


}
public function Confirm_presence(Request $request){
        $user = Auth::user()->scout_id;
        $event_id = $request->input('event_id');


        DB::update('update concerned set presence = ?,absence_cause = ? where event_id = ? and scout_id = ?',[true,"",$event_id,$user]);

        return response()->json(["presence"=>true]);
}
public function Confirm_absence(Request $request){
    $user = Auth::user()->scout_id;
    $event_id = $request->input('event_id');

    DB::update('update concerned set presence = ? where event_id = ? and scout_id = ?',[false,$event_id,$user]);
    return response()->json(["absence"=>false]);
}
public function getPresenceEvents(){
    $user = Auth::user()->scout_id;
    $concerned=  DB::select('select Distinct event_id from concerned where scout_id = ? and presence = ?',[$user,true]);
    $presence_events=[];



    foreach ($concerned as $con){
        $event = Event::with('creator')->where('event_id',$con->event_id)->get();
        array_push($presence_events,$event);

    }




    return response()->json(["presence_events"=>$presence_events]);
}
public function getabsenceevents(){
    $user = Auth::user()->scout_id;
    $concerned=  DB::select('select Distinct event_id from concerned where scout_id = ? and presence = ?',[$user,false]);
    $absence_events=[];



    foreach ($concerned as $con){
        $event = Event::with('creator')->where('event_id',$con->event_id)->get();
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
        return response()->json(["approved"=>true]);
}
public function disapproveEvent(Request $request){
        $event_id = $request->input('event_id');
    DB::table('events')->where('event_id',$event_id)->update(['approved'=>false]);

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

}
