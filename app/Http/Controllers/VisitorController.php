<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Visitor;
class VisitorController extends Controller
{
	public function log(){

		$ip =  $_SERVER['REMOTE_ADDR'];
		$current_date = Carbon::now()->format('Y-m-d');



	$already_visit_today =	Visitor::where('visit_date',$current_date)
	                                ->where('ip',$ip)
																	 ->get();






		if(count($already_visit_today)==0){
			$new_visitor = new Visitor;
			$new_visitor->ip = $ip;
			$new_visitor->visit_date = $current_date;
			$new_visitor->last_visit_date = Carbon::now();
			$new_visitor->created_at = Carbon::now();
			$new_visitor->save();
		}else{

			$id = $already_visit_today[0]->id;
			$visitor = Visitor::find($id);
			$visitor->last_visit_date = Carbon::now();
			$visitor->save();
		}


	}
	function get_client_ip() {
	$ipaddress = 	getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');
	return $ipaddress;
}
}
