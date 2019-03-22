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
use Image;
use App\Scout;

use File;
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
    
    public function OptimizeScoutImages (){
     

           $captains = Scout::all();
           $image =" ";
           foreach($captains as $captain){
                if($captain->image!=""){
                    if(strpos($captain->image,'Cubs')!==false)
                       $this->OptimizeImages('/images/Cubs',$captain->image);

                       if(strpos($captain->image,'Scout')!==false)
                       $this->OptimizeImages('/images/Scout',$captain->image);

                       if(strpos($captain->image,'AdvancedScout')!==false)
                       $this->OptimizeImages('/images/AdvancedScout',$captain->image);

                       if(strpos($captain->image,'Traveler')!==false)
                       $this->OptimizeImages('/images/Traveler',$captain->image);

                       if(strpos($captain->image,'Captain')!==false)
                        $this->OptimizeImages('/images/Captain',$captain->image);
                       
                }
                  
                
           }
           return "done";
        

        }
         
    public function OptimizeEventImages (){
     

        $events = Event::all();
        $image =" ";
        foreach($events as $event){
             if($event->event_image!=""){
                 if(strpos($event->event_image,'Event')!==false)
                    $this->OptimizeImages('/images/EventImages',$event->event_image);

                  
                    
             }
               
             
        }
        return "done";
     

     }
     public function OptimizePostImages (){
     

       $posts = Post::all();
        
        foreach($posts as $post){
             if($post->cover_image!=""){
                 if(strpos($post->cover_image,'PostCover')!==false)
                    $this->OptimizeImages('/images/PostCover',$post->cover_image);

                  
                    
             }
               
             
        }
        $images = PostImage::all();
        foreach($images as $image){
         
            if($image->image!=""){
                if(strpos($image->image,'post_images')!==false)
                   $this->OptimizeImages('/images/Postimages',$image->image);

                 
                   
            }
        }
        return "done";
     

     }
     public function optimizeBooks(){
        $books = BooksLibrary::all();
         foreach($books as $book){
         
            if($book->picture!=""){
                if(strpos($book->picture,'Book')!==false)
                   $this->OptimizeImages('/uploads/Books/Images',$book->picture);

                 
                   
            }
         }
        $landings = landingPageCarousel::all();
        foreach($landings as $landing){
         
            if($landing->image!=""){
                if(strpos($landing->image,'Carousel_Image')!==false)
                   $this->OptimizeImages('/images/Carousel',$landing->image);

                 
                   
            }
        }
        return "done";
     }
     public function OptimizeTest(){
        $this->OptimizeImages('/images','login_background.jpg');
        $this->OptimizeImages('/images','about-footer.png');
        $this->OptimizeImages('/images','arabic-region.PNG');
        $this->OptimizeImages('/images','arabic-region.png');
        $this->OptimizeImages('/images','login_logo.png');
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

    public function OptimizeImages ($url,$filename){
        $realpath = public_path($url);
        if(file_exists($realpath.'/'.$filename)){
            if(!file_exists($realpath.'/origin'))
        mkdir($realpath.'/origin', 0777, true);
    
        if(!file_exists($realpath.'/medium'))
        mkdir($realpath.'/medium', 0777, true);
         
        
    
        copy($realpath.'/'.$filename,$realpath.'/origin/'.$filename);
        $imagesize = round(filesize($realpath.'/origin/'.$filename)/1024/1024); 
    
        if($imagesize<1)
           copy($realpath.'/'.$filename,$realpath.'/medium/'.$filename);
        
        else{
            File::delete($realpath.'/'.$filename);
            list($width, $height, $type, $attr) = getimagesize($realpath.'/origin/'.$filename);
    
            $image_medium = new \Intervention\Image\ImageManager();
            $image_medium->make($realpath.'/origin/'.$filename)->resize($width/2,$height/2)->save($realpath.'/medium/'.$filename);
          
            $image_small = new \Intervention\Image\ImageManager();
            $image_small->make($realpath.'/origin/'.$filename)->resize($width/3,$height/3)->save($realpath.'/'.$filename);
        }  

        }
      
          
        
    
        }
   
}
