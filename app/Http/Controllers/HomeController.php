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
use App\landingPageCarousel;
use App\BooksLibrary;
use App\BooksCategory;
use ImageOptimizer;

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
        $cubPost = Post::approved()->where('linked_unit','cubs')->orderby('created_at','desc')->get()->first();
        $scoutPost = Post::approved()->where('linked_unit','sct')->orderby('created_at','desc')->get()->first();
        $ascoutPost = Post::approved()->where('linked_unit','asct')->orderby('created_at','desc')->get()->first();
        $travelerPost = Post::approved()->where('linked_unit','tvlr')->orderby('created_at','desc')->get()->first();
        $capPost = Post::approved()->where('linked_unit','cap')->orderby('created_at','desc')->get()->first();
        $events = Event::approved()->where('event_time', '>=', Carbon::now()->toDateString())->orderby('event_time','asc')->take(2)->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('home')
            ->with('cubPost',$cubPost)
            ->with('scoutPost',$scoutPost)
            ->with('ascoutPost',$ascoutPost)
            ->with('travelerPost',$travelerPost)
            ->with('capPost',$capPost)
            ->with('events',$events);
    }

    public function cubs()
    {
        $posts = Post::approved()->where('linked_unit','cubs')->orderby('created_at','desc')->paginate(3);
        $sideposts = Post::approved()->where('linked_unit','cubs')->orderby('created_at','desc')->paginate(6);
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.units.cubs')->with('posts',$posts)->with('sideposts',$sideposts);
    }

    public function scout()
    {
        $posts = Post::approved()->where('linked_unit','sct')->orderby('created_at','desc')->paginate(3);
        $sideposts = Post::approved()->where('linked_unit','sct')->orderby('created_at','desc')->paginate(6);
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.units.scout')->with('posts',$posts)->with('sideposts',$sideposts);
    }

    public function advanced_scout()
    {
        $posts = Post::approved()->where('linked_unit','asct')->orderby('created_at','desc')->paginate(3);
        $sideposts = Post::approved()->where('linked_unit','asct')->orderby('created_at','desc')->paginate(6);
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.units.advanced_scout')->with('posts',$posts)->with('sideposts',$sideposts);
    }

    public function traveler()
    {
        $posts = Post::approved()->where('linked_unit','tvlr')->orderby('created_at','desc')->paginate(3);
        $sideposts = Post::approved()->where('linked_unit','tvlr')->orderby('created_at','desc')->paginate(6);
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.units.traveler')->with('posts',$posts)->with('sideposts',$sideposts);
    }

    public function captains()
    {
        $posts = Post::approved()->where('linked_unit','cap')->orderby('created_at','desc')->paginate(3);
        $sideposts = Post::approved()->where('linked_unit','cap')->orderby('created_at','desc')->paginate(6);
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.units.captains')->with('posts',$posts)->with('sideposts',$sideposts);
    }

    public function news()
    {
        $posts = Post::approved()->orderby('created_at','desc')->paginate(6);
        $sidePosts = Post::approved()->orderby('created_at','desc')->take(6)->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.news_test')->with('posts',$posts)->with('sidePosts',$sidePosts);
    }

    public function viewPost($id){
        $post=Post::approved()->where('post_id',$id)->get();
        if(count($post)>0){
            $currentPost = Post::find($id);
            $currentPostImages = PostImage::where('post_id',$id)->get();
            $sidePosts = Post::approved()->orderby('created_at','desc')->take(6)->get();
            app(\App\Http\Controllers\VisitorController::class)->log();
            return view('pages.postPage')->with('currentPost',$currentPost)->with('sidePosts',$sidePosts)->with('currentPostImages',$currentPostImages);
        }else {
            return redirect('/news');;
        }
    }

    public function events()
    {
        $events = Event::approved()->where('event_time', '>=', Carbon::now()->toDateString())->orderby('event_time','asc')->get();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.events')->with('events',$events);
    }

    public function viewEvent($id){
        $event=Event::approved()->where('event_id',$id)->get();
        if (count($event)>0){
            $events = Event::approved()->orderby('event_time','asc')->paginate(3);
            $currentEvent = Event::find($id);
            app(\App\Http\Controllers\VisitorController::class)->log();
            return view('pages.eventPage')->with('events',$events)->with('currentEvent',$currentEvent);
        }else{
            return redirect('/events');;
        }

    }

    public function library(){
        $books = BooksLibrary::all();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.library')->with('books',$books);
    }

    public function team(){
        $captains = Captain::all();
        app(\App\Http\Controllers\VisitorController::class)->log();
        return view('pages.team')->with('captains',$captains);
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

    public function OptimizeImages(){
        $pathToImage = public_path().'/images/Captain/Captain-1541797846.jpeg';
                ImageOptimizer::optimize($pathToImage);
        return response()->json(["msg"=>"done"]);
    }
}
