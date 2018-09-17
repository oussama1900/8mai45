<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Finance;
use Carbon\Carbon;
use DB;

class FinanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
	public function update_money(Request $request){
	$money = $request->input('money');
	$date = $request->input('date');
	$desc = $request->input('description');
	$money_state = $request->input('money_state');
	$finance = Finance::all();

	if(count($finance)==0){
		$first_money = new Finance;
		$first_money->transaction_money = $money;
	 $first_money->transaction_date = $date;
		$first_money->transaction_description = $desc;
		$first_money->money_total = $money;
		$first_money->save();
			return response()->json(["msg"=>"Success"]);
}else{
	$new_transaction = new Finance;

	$last_row = Finance::latest()->first();
	if(!$money_state){
			$totale = $last_row->money_total - $money;
			$money = "-".$money;

	}else{
			$totale = $last_row->money_total + $money;
	}
	$new_transaction->transaction_money = $money;
	$new_transaction->transaction_date = $date;
	$new_transaction->transaction_description=$desc;
	$new_transaction->money_total=$totale;
	$new_transaction->save();
return response()->json(["msg"=>"Success"]);
}



}
public function getmoney_values(){

	$current_month = Carbon::now()->format('m');
	$money =DB::table("finances")
	->select('id')

				->whereRaw('MONTH(transaction_date) = ?',[$current_month])
                ->orderBy('transaction_date','asc')
				->get();

				$money_values = [];
				$transaction_date=[];
				$transaction_description=[];
                 $trans_money=[];
			foreach($money as $key){
					$transaction_money = Finance::select('money_total','transaction_date','transaction_description','transaction_money')
															 ->where('id',$key->id)
															 ->orderBy('transaction_date','asc')
															 ->get()[0];
						array_push($money_values,$transaction_money->money_total);
						array_push($transaction_date,$transaction_money->transaction_date);
                        array_push($transaction_description,$transaction_money->transaction_description );

                        array_push($trans_money,$transaction_money->transaction_money );

				}



$current_month_days=[];
			for($i=1;$i<=31;$i++){
				array_push($current_month_days,$i);
			}




	return  response()->json(["money_values"=>[$money_values,$transaction_date,$current_month_days,$transaction_description,$trans_money]]);
}

public function getyearly_money(){
	$months=["جانفي","فيفري","مارس","أفريل","ماي","جوان","جويلية","أوت","سبتمبر","أكتوبر","نوفمبر","ديسمبر"];
    $current_year = Carbon::now()->format('Y');

	$money =DB::table("finances")
        ->select('id')

        ->whereRaw('YEAR(transaction_date) = ?',[$current_year])
        ->orderBy('transaction_date','asc')
        ->get();

    $money_values=[];
    $transaction_date=[];
    $transaction_description=[];
    $trans_money=[];
    foreach($money as $key){
        $transaction_money = Finance::select('money_total','transaction_date','transaction_description','transaction_money')
            ->where('id',$key->id)
            ->orderBy('transaction_date','asc')
            ->get()[0];

        array_push($money_values,$transaction_money->money_total);
        array_push($transaction_date,$months[date("m",strtotime($transaction_money->transaction_date))-1] );
        array_push($transaction_description,$transaction_money->transaction_description );
        array_push($trans_money,$transaction_money->transaction_money );

    }
    return  response()->json(["money_values"=>[$money_values,$transaction_date,$months,$transaction_description,$trans_money]]);

}
}
