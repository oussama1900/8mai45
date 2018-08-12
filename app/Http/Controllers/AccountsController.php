<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Scout;
use DB;

class AccountsController extends Controller
{
    //

    public function  getUsersAccounts(){
        $accounts =   User::with('profile')->get();



        return response()->json(["users"=>$accounts]);
    }
    public function  AddNewAccount(Request $request){
        $email = $request->input('email');
        $scout_id=   DB::table('scouts')->where('email',$email)->value('scout_id');

        if($scout_id){
            $password = $request->input('password');
            $password_encrypted = password_hash($password, PASSWORD_BCRYPT);
            DB::insert('insert into users(scout_id,email,password) values(?,?,?)',[$scout_id,$email,$password_encrypted]);
            return response()->json(["msg"=>"added Successfully"]);
        }




        return response()->json(["users"=>"scout not found"]);
    }

}
