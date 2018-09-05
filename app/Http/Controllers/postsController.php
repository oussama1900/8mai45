<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostImage;
use App\Captain;
use Auth;
use DB;
use Carbon\Carbon;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('title','desc')->paginate(5);
        return view('post.view')->with("posts",$posts);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNewPost(Request $request)
    {

        $post_title = $request->input('post_title');
        $post_date = $request->input('post_date');
        $location = $request->input('location');
        $description = $request->input('description');
        $post_summary = $request->input('post_summary');
        $post_type = $request->input('post_type');
        $cover_image = $request->input('cover_image');
        $linked_unit = $request->input('linked_unit');
        $repo ='PostCover';
        $cover_image = $this->insertImage($cover_image,$repo,$repo);
        $user = Auth::user();
        $user_unit = $user ->captain->unit;

        if($user->captain->role=='gov'){
            if($linked_unit!="")
                $linked_unit = Auth::user()->captain->unit;
            else
                $linked_unit ="gov";
        }
        if($user->captain->role !='gov' && Auth::user()->captain->role!='med' && $user->captain->role!='vmed'){
            $linked_unit = $user_unit;
        }


        $post_id = DB::table('posts')->insertGetId(


             [
                 'post_title'=>$post_title,
                 'posted_by'=>$user->scout_id,
                 'linked_unit'=>$linked_unit,
                 'post_date'=>$post_date,
                 'location'=>$location,
                 'description'=>$description,
                 'post_summary'=>$post_summary,
                 'post_type'=>$post_type,
                 'cover_image'=>$cover_image,
                 'created_at'=>Carbon::now(),

             ]
        );


        $images = $request->input('post_images');
        $title ="post_images";
        $repo = 'Postimages';
        for($i=0;$i<count($images);$i++){

            $post_image[$i] = $this->insertImage($images[$i],$title,$repo);
            DB::insert('insert into postimages(post_id,image) values (?,?)',[ $post_id,$post_image[$i]]);

        }

        return response()->json(["message"=>"created Successfully"]);
    }

    /**
     * @param $image
     * @return string
     */
    public function insertImage($image,$title,$repo){

        if($image==""){
            $filename="";
        }else{
            $expl = explode(',',$image);
            $decode = base64_decode($expl[1]);
            if(str_contains($expl[0],'png')){
                $exte= 'png';

            }else{
                $exte= 'jpeg';
            }

            $filename = $title.'-'. date('YmdHis',time()).mt_rand().'.'.$exte;
            $filepath = public_path().'/images/'.$repo.'/'.$filename;


            file_put_contents($filepath,$decode);

        }
        return $filename;

    }

    public function getMyPosts(){
        $user = Auth::user();
        $myposts = Post::where('posted_by',$user->scout_id)->get();
        $myinfo = $user->profile;
        return response()->json(["MyPosts"=>[$myposts,$myinfo]]);
    }

    public function getMyUnitPosts(){
        $user = Auth::user();
        $user_unit = $user->captain->unit;

        $unitposts = Post::with('post_creator')->where('linked_unit',$user_unit)->get();
        return response()->json(["myunitPosts"=>$unitposts]);

    }




   public function getPostsNotApproved(){
        $user = Auth::user();
        $user_unit = $user->captain->unit;
        if($user_unit == 'cubs' || $user_unit == 'sct' ||  $user_unit == 'asct' || $user_unit == 'tvlr'){
            $post_not_approved = Post::with('post_creator')
                                     ->where('linked_unit',$user_unit)
                                     ->where('approved',false)
                                     ->get();
        }
        return response()->json(["post_not_approved"=>$post_not_approved]);
   }
   public function getPostsApproved(){
       $user = Auth::user();
       $user_unit = $user->captain->unit;
       $publisher_id = Captain::where('unit',$user_unit)->where('role','trne')->value('scout_id');

       if($user_unit == 'cubs' || $user_unit == 'sct' ||  $user_unit == 'asct' || $user_unit == 'tvlr'){
           $post_approved = Post::with('post_creator')
               ->where('linked_unit',$user_unit)
               ->where('approved',true)
               ->where('posted_by',$publisher_id)
               ->get();
       }
       return response()->json(["post_approved"=>$post_approved]);
   }
   public function DeletePost($post_id){
        $post = Post::find($post_id);
        if($post!=null){
            $post->delete();
        }
      return response()->json(["deletepost"=>"deleted Successfully"]);
   }

public function ApprovePost($post_id){
        $post_not_approved = Post::find($post_id);
        $post_not_approved->approved = true;
        $post_not_approved->save();
        return response()->json(["postApproved"=>"Successfully"]);

}
public function DisapprovePost($post_id){
        $post_not_approved = Post::find($post_id);
        $post_not_approved->approved = false;
        $post_not_approved->save();
        return response()->json(["postDisapproved"=>"Successfully"]);

}
public function getPost($post_id){
    $post = Post::find($post_id);
    $post_images = PostImage::where('post_id',$post_id)->get();
    return response()->json(["post"=>[$post,$post_images]]);
}
public function EditPost($post_id, Request $request){
        $post = Post::find($post_id);
        $post_title = $request->input('post.post_title');
        $post_date = $request->input('post.post_date');
        $location = $request->input('post.location');
        $description = $request->input('post.description');
        $post_summary = $request->input('post.post_summary');
        $post_type = $request->input('post.post_type');
        $cover_image = $request->input('post.cover_image');

        // first we need to insert the new post
        $post->post_title = $post_title;
        $post->post_date =$post_date;
        $post->location  =$location;
        $post->description  =$description;
        $post->post_summary =$post_summary;
        $post->post_type =$post_type;
        $post->cover_image =$cover_image;
        $post->save();

        // delete the old images

        $new_post_images = $request->input('new_post_images');
        $post_images_deleted = $request->input('post_images_deleted');

        foreach ($post_images_deleted as $deleted){
            $image =  $deleted['image'];
           DB::table('postimages')->where('post_id',$post_id)
                                       ->where('image',$image)
                                       ->delete();
        }

        // insert the new images

        $title ="post_images";
        $repo = 'Postimages';
       for($i=0;$i<count($new_post_images);$i++){

        $new_image[$i] = $this->insertImage($new_post_images[$i],$title,$repo);
       DB::insert('insert into postimages(post_id,image) values (?,?)',[ $post_id,$new_image[$i]]);

    }
     DB::table('editedposts')->insert([
          "post_id"=>$post_id,
          "editor"=>Auth::user()->scout_id,
          "updated_at"=>Carbon::now(),
      ]);


    return response()->json(["updated"=>"Successfully"]);
}




















    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('post_title');
        $data = $request->input('content');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show')->with('post',$post);
    }

    public function view()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    //this is a function for post images uplaods

    public function upload(Request $request)
    {
        $input = $request->all();
        $imagename = $input['image'];
        list($type, $imagename) = explode(';', $imagename);
        list(, $imagename)      = explode(',', $imagename);
        $imagename = base64_decode($imagename);
        $imageNamee = time().'.png';
        file_put_contents('./uploads/posts/'.$imageNamee, $imagename);
        if(!empty($imageNamee)){
            return Redirect::back()->with('msg_success', "Image Upload success!");
        }
        return Redirect::back()->with('msg_delete', "Image Upload Failed!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
