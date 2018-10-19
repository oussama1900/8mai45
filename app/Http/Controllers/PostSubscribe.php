<?php

namespace App\Http\Controllers;

use App\PostSubscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostSubscribe extends Controller
{
    //
    public function newSubscriber(Request $request){
        $email = $request->input('email');
        $subscriber = PostSubscriber::where('email',$email)->get();
        $newSubscriber = new PostSubscriber;
        $newSubscriber->email = $email;
        $newSubscriber->save();
       if($subscriber!=null){

           return back()->with('result',false);
       }else{
           $newSubscriber = new PostSubscriber;
           $newSubscriber->email = $email;
           $newSubscriber->save();
           return back()->with('result',true);
       }
    }
}
