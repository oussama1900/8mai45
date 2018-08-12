<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scout;
use App\Captain;
use App\User;
use App\Unit;
use App\UnitScout;
use DB;


use App\Http\Requests;

class ScoutController extends Controller
{
    public function getScouts(Request $request){
        $Scout ="";

        switch ( url()->current()){
            case 'http://localhost:8000/api/scouts/cubs':
                $Scout = UnitScout::with('scout')->where('unit_id','cubs')->get();
                break;
            case 'http://localhost:8000/api/scouts/scout':
                $Scout = UnitScout::with('scout')->where('unit_id','sct')->get();
                break;
            case 'http://localhost:8000/api/scouts/advanced_scout':
                $Scout = UnitScout::with('scout')->where('unit_id','asct')->get();
                break;
                case 'http://localhost:8000/api/scouts/traveler':
            $Scout = UnitScout::with('scout')->where('unit_id','tvlr')->get();
            break;
            case 'http://localhost:8000/api/scouts/captain':
            $Scout = Captain::with('isScout')->get();
            break;

        }



        return response()->json(["Scouts"=> $Scout]);
    }


    public function getScout($id){

        $Scout = Scout::find($id);
        return response()->json(["Scouts"=>$Scout]);
    }

    public function AddNewScout(Request $request){



      DB::insert('insert into scouts(assurance_num,first_name,last_name,date_of_birth,membership_date,email,phone) values (?,?,?,?,?,?,?)',
           [(int)$request->input('ScoutInfo.0.assurance_num'),
                $request->input('ScoutInfo.0.first_name'),
               $request->input('ScoutInfo.0.last_name'),
                $request->input('ScoutInfo.0.date_of_birth'),
                $request->input('ScoutInfo.0.membership_date'),
               $request->input('ScoutInfo.0.email'),
              (int) $request->input('ScoutInfo.0.phone')]);


        $scout_id =DB::table('scouts')->where('assurance_num',(int)$request->input('ScoutInfo.0.assurance_num') )->value('scout_id');


        $unit_id = $request->input('scout_unit.0.unit_id');

        if($unit_id!= 'cap'){
            DB::insert('insert into unitscouts(scout_id,unit_id) values(?,?) ',[$scout_id,$unit_id]);
        }




       if($request->input('role')){
           $role = $request->input('role');
           DB::insert('insert into captains (scout_id,role) values (?,?)',[$scout_id,$role]);
       }


        return response()->json(["msg" =>$unit_id]);
    }
  public function  EditScoutInfo(Request $request,$id){

        $scout = Scout::find($id);
        if(!$scout){
            return response()->json(["msg" => "doesn't exist"]);
        }
        $scout->first_name= $request->input('first_name');
        $scout->last_name= $request->input('last_name');
        $scout->date_of_birth= $request->input('date_of_birth');
        $scout->membership_date= $request->input('membership_date');
        $scout->save();
      return response()->json(["msg" => $scout]);
  }
    public function destroy($id){

        $scout = Scout::find($id);
        $captain = Captain::find($id);
        $user = User::find($id);

        DB::delete('delete from unitscouts where scout_id = ?',[$id]);


        if($user){

          DB::delete('delete from users where scout_id = ?',[$id]);

            $captain->delete();
            $scout->delete();
        }else {
            if ($captain) {
               $captain->delete();
                $scout->delete();
            } else {
                if ($scout) {
                    $scout->delete();
                } else {
                    return response()->json(["msg" => "doesn't exist"]);
                }
            }

        }
            return response()->json(["msg"=>"deleted successfully"]);


    }




}
