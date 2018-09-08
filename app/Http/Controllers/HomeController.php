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
        $events = Event::where('event_time', '>=', Carbon::now()->toDateString())->orderby('created_at','desc')->take(3)->get();
        return view('home')->with('posts',$posts)->with('events',$events);
    }

    public function cubs()
    {
        $posts = Post::where('linked_unit','cubs')->orderby('created_at','desc')->paginate(3);
        return view('pages.units.cubs')->with('posts',$posts);
    }

    public function scout()
    {
        $posts = Post::where('linked_unit','sct')->orderby('created_at','desc')->paginate(3);
        return view('pages.units.scout')->with('posts',$posts);
    }

    public function advanced_scout()
    {
        $posts = Post::where('linked_unit','asct')->orderby('created_at','desc')->paginate(3);
        return view('pages.units.advanced_scout')->with('posts',$posts);
    }

    public function traveler()
    {
        $posts = Post::where('linked_unit','tvlr')->orderby('created_at','desc')->paginate(3);
        return view('pages.units.traveler')->with('posts',$posts);
    }

    public function news()
    {
        $posts = Post::orderby('created_at','desc')->get();
        return view('pages.news')->with('posts',$posts);
    }

    public function viewPost($id){
        $posts = Post::orderby('created_at','desc')->paginate(3);
        $allPosts = Post::inRandomOrder()->get();
        $currentPost = Post::find($id);
        $currentPostImages = PostImage::where('post_id',$id)->get();
        return view('pages.postPage')->with('posts',$posts)->with('currentPost',$currentPost)->with('allPosts',$allPosts)->with('currentPostImages',$currentPostImages);
    }

    public function about()
    {
        return view('pages.about');
    }
}
