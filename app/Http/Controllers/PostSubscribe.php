<?php

namespace App\Http\Controllers;

use App\PostSubscriber;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostSubscribe extends Controller
{
    //
    public function newSubscriber(Request $request){
        $request->validate(
            ['email' => 'required|unique:post_subscribers|email',],
            ['email.unique' => 'لقد تم تسجيل هاذا البريد الالكتروني من قبل',
             'email.email' => 'الرجاء التأكد من ادخال عنوان بريد إلكتروني صحيح'
            ]
            );

        $email = $request->input('email');

        $newSubscriber = new PostSubscriber();
        $newSubscriber->email = $email;
        $newSubscriber->save();
        return back()->with('result','true');

    }

    public function contactForm(Request $request) {
        $request->validate(
            ['name' => 'required',
             'surname' => 'required',
             'message' => 'required',
                ],
            ['name.required' => 'الرجاء التأكد من ادخال اللقب',
             'surname.required' => 'الرجاء التأكد من ادخال الإسم',
             'message.required' => 'الرجاء التأكد من ادخال الموضوع',
            ]
        );

        $name = $request->input('name');
        $surname = $request->input('surname');
        $message = $request->input('message');

        $newContact = new Contact();
        $newContact->name = $name;
        $newContact->surname = $surname;
        $newContact->message = $message;
        $newContact->save();
        return back()->with('result','true');
    }
}
