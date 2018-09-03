<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostImage;
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
        $repo ='PostCover';
        $cover_image = $this->insertImage($cover_image,$repo,$repo);
        $user = Auth::user();
        $user_unit = $user ->captain->unit;

        if($user_unit==""){
            $user_unit = $user->captain->role;

        }

        $post_id = DB::table('posts')->insertGetId(


             [
                 'post_title'=>$post_title,
                 'posted_by'=>$user->scout_id,
                 'linked_unit'=>$user_unit,
                 'post_date'=>$post_date,
                 'location'=>$location,
                 'description'=>$description,
                 'post_summary'=>$post_summary,
                 'post_type'=>$post_type,
                 'cover_image'=>$cover_image,

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
