<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use View;
use App\Foo;
use Carbon\Carbon;
use App\Event;
use App\Post;
use App\PostImage;
use App\Captain;

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
        $posts = Post::orderby('created_at','desc')->paginate(3);
        $events = Event::where('event_time', '>=', Carbon::now()->toDateString())->orderby('event_time','asc')->take(3)->get();
        $events = Event::orderby('created_at','desc')->paginate(3);
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('home')->with('posts',$posts)->with('events',$events);
    }

    public function cubs()
    {
        $posts = Post::where('linked_unit','cubs')->orderby('created_at','desc')->paginate(3);
        $events = Event::where('unit','cubs')->where('event_time', '>=', Carbon::now()->toDateString())->orderby('event_time','asc')->take(3)->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.units.cubs')->with('posts',$posts)->with('events',$events);
    }

    public function scout()
    {
        $posts = Post::where('linked_unit','sct')->orderby('created_at','desc')->paginate(3);
        $events = Event::where('unit','sct')->where('event_time', '>=', Carbon::now()->toDateString())->orderby('event_time','asc')->take(3)->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.units.scout')->with('posts',$posts)->with('events',$events);
    }

    public function advanced_scout()
    {
        $posts = Post::where('linked_unit','asct')->orderby('created_at','desc')->paginate(3);
        $events = Event::where('unit','asct')->where('event_time', '>=', Carbon::now()->toDateString())->orderby('event_time','asc')->take(3)->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.units.advanced_scout')->with('posts',$posts)->with('events',$events);
    }

    public function traveler()
    {
        $posts = Post::where('linked_unit','tvlr')->orderby('created_at','desc')->paginate(3);
        $events = Event::where('unit','tvlr')->where('event_time', '>=', Carbon::now()->toDateString())->orderby('event_time','asc')->take(3)->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.units.traveler')->with('posts',$posts)->with('events',$events);
    }

    public function news()
    {
        $posts = Post::orderby('created_at','desc')->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.news_test')->with('posts',$posts);
    }

    public function viewPost($id){
        $posts = Post::orderby('created_at','desc')->paginate(3);
        $allPosts = Post::inRandomOrder()->get();
        $currentPost = Post::find($id);
        $currentPostImages = PostImage::where('post_id',$id)->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.postPage')->with('posts',$posts)->with('currentPost',$currentPost)->with('allPosts',$allPosts)->with('currentPostImages',$currentPostImages);
    }

    public function events()
    {
        $events = Event::orderby('event_time','asc')->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.events')->with('events',$events);
    }

    public function viewEvent($id){
        $events = Event::orderby('event_time','asc')->paginate(3);
        $currentEvent = Event::find($id);
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.eventPage')->with('events',$events)->with('currentEvent',$currentEvent);
    }

    public function captains(){
        $captains = Captain::all();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.captains')->with('captains',$captains);
    }

    public function contact(){
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.contact');
    }

    public function about()
    {
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.about');
    }
}
