<?php

namespace App\Http\Controllers;

use App\Captain;
use App\Concerned;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

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



       // $concerned = new Concerned;
       // $event =DB::select('select * from events ');
        /*$event = new Event;
        $event->title = $title;
        $event->description = $desc;
     //   $event->type = $type;
        $event->responsible = $responsible;
        $event->commision = $type;

        $event->location = $location;
        $event->save();*/

     $event= DB::insert('insert into events (title,description,type,responsible,event_time,location) values (?,?,?,?,?,?)',["fgf","ghgh","",1,$time,"ffhfghfg"]);

      $event_id = DB::table('events')->insertGetId(
            ['title' => $title,
                'description' =>$desc,
                'type'=>$type,
                'responsible'=>$responsible,
                'event_time'=>$time,
                'location'=>$location
            ]
        );

     foreach ($Concerned as $concerned ){
         DB::insert('insert into concerned (event_id,scout_id) values(?,?)',[$event_id,$concerned['scout_id']]);

        }



        return response()->json(["event"=>$type]);

    }
}
