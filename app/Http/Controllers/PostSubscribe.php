<?php

namespace App\Http\Controllers;

use App\PostSubscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostSubscribe extends Controller
{
    //
    public function newSubscriber(Request $request){
        $request->validate(
            ['email' => 'required|unique:post_subscribers',],
            ['email.unique' => 'هاذا الايمايل مسجل']
            );

        $email = $request->input('email');

        $newSubscriber = new PostSubscriber();
        $newSubscriber->email = $email;
        $newSubscriber->save();
        return back()->with('result','true');

    }
}
