<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
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

       /* switch ( url()->current()){
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
            }*/
            if(Route::currentRouteNamed('captain')){
                $Scout = UnitScout::with('scout')->where('unit_id','cubs')->get();
            }
            if(Route::currentRouteNamed('captain')){
                $Scout = UnitScout::with('scout')->where('unit_id','sct')->get();
            }
            if(Route::currentRouteNamed('captain')){
                $Scout = UnitScout::with('scout')->where('unit_id','asct')->get();
            }
            if(Route::currentRouteNamed('captain')){
                $Scout = UnitScout::with('scout')->where('unit_id','tvlr')->get();
            }
            if(Route::currentRouteNamed('captain')){
                $Scout = Captain::with('isScout')->get();
            }


        return response()->json(["Scouts"=> $Scout]);
    }


    public function getScout($id){

        $Scout = Scout::find($id);
        return response()->json(["Scouts"=>$Scout]);
    }

    public function AddNewScout(Request $request){

        $unit_id = $request->input('scout_unit.0.unit_id');
        if($request->input('ScoutInfo.0.image')==""){
            $filename="";

        }else{
            $expl = explode(',',$request->input('ScoutInfo.0.image'));

            $decode = base64_decode($expl[1]);
            if(str_contains($expl[0],'png')){
                $exte= 'png';

            }else{
                $exte= 'jpeg';
            }
            $currenttime = Carbon::now()->timestamp;
            $filename = $currenttime.'.'.$exte;
            switch ($unit_id){
                case 'cubs':{
                    $filepath = public_path().'/images/Cubs/'.$filename;
                    break;
                }
                case'sct':{
                    $filepath = public_path().'/images/Scout/'.$filename;
                    break;
                }
                case 'asct':{
                    $filepath = public_path().'/images/AdvancedScout/'.$filename;
                    break;
                }
                case 'tvlr':{
                    $filepath = public_path().'/images/Traveler/'.$filename;
                    break;
                }
                case 'cap':{
                    $filepath = public_path().'/images/Captain/'.$filename;
                    break;
                }
            }


            file_put_contents($filepath,$decode);
        }



      DB::insert('insert into scouts(assurance_num,first_name,last_name,date_of_birth,membership_date,email,phone,image) values (?,?,?,?,?,?,?,?)',
           [(int)$request->input('ScoutInfo.0.assurance_num'),
                $request->input('ScoutInfo.0.first_name'),
               $request->input('ScoutInfo.0.last_name'),
                $request->input('ScoutInfo.0.date_of_birth'),
                $request->input('ScoutInfo.0.membership_date'),
               $request->input('ScoutInfo.0.email'),
              (int) $request->input('ScoutInfo.0.phone'),
               $filename]);


        $scout_id =DB::table('scouts')->where('assurance_num',(int)$request->input('ScoutInfo.0.assurance_num') )->value('scout_id');




        if($unit_id!= 'cap'){
            DB::insert('insert into unitscouts(scout_id,unit_id) values(?,?) ',[$scout_id,$unit_id]);
        }




       if($request->input('role')){
           $role = $request->input('role');
           DB::insert('insert into captains (scout_id,role) values (?,?)',[$scout_id,$role]);
       }


        return response()->json(["msg" =>"added Successfully"]);
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
