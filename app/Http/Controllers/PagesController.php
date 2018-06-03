<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* this contoller is for linking views with routes*/
class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }

}
