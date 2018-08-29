<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use View;
use App\Foo;
use App\Event;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $foo;
	public function __construct(Foo $foo)
	{		 
	   $this->foo = $foo;
	   
    }
	

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderby('created_at','desc')->paginate(3);
        return view('home')->with('events',$events);
    }

    public function cubs()
    {
        $events = Event::where('unit','cubs')->orderby('created_at','desc')->paginate(3);
        return view('pages.units.cubs')->with('events',$events);
    }

    public function scout()
    {
        $events = Event::where('unit','sct')->orderby('created_at','desc')->paginate(3);
        return view('pages.units.scout')->with('events',$events);
    }

    public function advanced_scout()
    {
        $events = Event::where('unit','asct')->orderby('created_at','desc')->paginate(3);
        return view('pages.units.advanced_scout')->with('events',$events);
    }

    public function traveler()
    {
        $events = Event::where('unit','tvlr')->orderby('created_at','desc')->paginate(3);
        return view('pages.units.traveler')->with('events',$events);
    }

    public function about()
    {
        return view('pages.about');
    }
}
