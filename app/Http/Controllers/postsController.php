<?php

namespace App\Http\Controllers;

use App\Notifications\NotifiySubscribers;
use App\Notifications\notifyCaptain;
use App\PostSubscriber;
use Illuminate\Http\Request;
use App\Post;
use Notification;
use App\PostImage;
use App\Captain;
use App\User;
use Auth;
use DB;
use File;
use Carbon\Carbon;
use ImageOptimizer;



class postsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
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
        $post_type = $request->input("post_type");
        $post_type = $post_type['0'];
        $cover_image = $request->input('cover_image');
        $linked_unit = $request->input("linked_unit");

        $repo ='PostCover';
        $cover_image = $this->insertImage($cover_image,$repo,$repo);

        $this->OptimizeImages('/images/PostCover',$cover_image);
       

        $user = Auth::user();
        $user_unit = $user ->captain->unit;




        if(Auth::user()->captain->role=='gov'){
            $linked_unit = $linked_unit['0'];
            if($linked_unit == "الأشبال")
                $linked_unit ="cubs";
            if($linked_unit == "الكشاف")
                $linked_unit ="sct";
            if($linked_unit == "الكشاف المتقدم")
                $linked_unit ="asct";
            if($linked_unit == "الجوالة")
                $linked_unit ="tvlr";
            if($linked_unit == "القادة")
                $linked_unit ="cap";
            if($linked_unit=="وحدة أخرى")
                $linked_unit ="gov";


        }
        if(Auth::user()->captain->role =='med' || Auth::user()->captain->role =='vmed' ){
            $linked_unit = $linked_unit['0'];
            if($linked_unit == "الأشبال")
                $linked_unit ="cubs";
            if($linked_unit == "الكشاف")
                $linked_unit ="sct";
            if($linked_unit == "الكشاف المتقدم")
                $linked_unit ="asct";
            if($linked_unit == "الجوالة")
                $linked_unit ="tvlr";
            if($linked_unit == "القادة")
                $linked_unit ="cap";
            if($linked_unit=="الاعلام")
                $linked_unit ="med";
            if($linked_unit=="الاعلام")
                $linked_unit ="med";

            if($linked_unit=="المالية")
                $linked_unit ="fin";
            if($linked_unit=="متابعة البرامج وتنفيذ الخطط")
                $linked_unit ="surv";
            if($linked_unit=="خدمة و تنمية المجتمع")
                $linked_unit ="csd";




        }




        if($user->captain->role !='gov' && Auth::user()->captain->role!='med' && $user->captain->role!='vmed'){
            $linked_unit = $user_unit;
        }


        if(Auth::user()->captain->role=="trne")
            $approved=false;
        else
            $approved=true;
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
                 'approved'=>$approved,
                 'cover_image'=>$cover_image,
                 'created_at'=>Carbon::now(),

             ]
        );


        $images = $request->input('post_images');
        $title ="post_images";
        $repo = 'Postimages';
        for($i=0;$i<count($images);$i++){

            $post_image[$i] = $this->insertImage($images[$i],$title,$repo);
            $this->OptimizeImages('/images/Postimages',$post_image[$i]);
            DB::insert('insert into postimages(post_id,image) values (?,?)',[ $post_id,$post_image[$i]]);

        }

        if($user->captain->role =='med' || $user->captain->role =='vmed'){
            if($user->captain->role =='med' ){

                    $cap = User::find(Captain::where('role','gov')->value('scout_id'));
                $notification_message ="قام مسؤول الاعلام بنشر خبر جديد ";
                $notification_type = $post_type;
                if($cap!=null)
                $cap->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
            }
            if($user->captain->role =='vmed'){
                $cap = User::find(Captain::where('role','gov')->value('scout_id'));
                $med = User::find(Captain::where('role','med')->value('scout_id'));
                $notification_message ="قام نائب مسؤول الاعلام بنشر خبر جديد ";
                $notification_type = $post_type;
                if($cap!=null)
                $cap->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($med!=null)
                $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));

            }
        }
        if(Auth::user()->captain->role =="ucap" ||
				 Auth::user()->captain->role=="vucp"    ||
				 Auth::user()->captain->role == "capa"  ||
				 Auth::user()->captain->role == "trne"
			 ){
            if($user->captain->role =="ucap"){
                $med = User::find(Captain::where('role','med')->value('scout_id'));
                $vmed = User::find(Captain::where('role','vmed')->value('scout_id'));
                $unit = $user->captain->assignedRole->getUnit();
                $notification_message ="قام قائد وحدة ".$unit." بنشر خبر جديد  ";
                $notification_type = $post_type;
                if($med!=null)
                $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vmed!=null)
                $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
            }
            if(Auth::user()->captain->role == "vucp"){
                $med = User::find(Captain::where('role','med')->value('scout_id'));
                $vmed = User::find(Captain::where('role','vmed')->value('scout_id'));
                $ucap = User::find(Captain::where('role','ucap')->where('unit',$user->captain->unit)->value('scout_id'));
                $unit = $user->captain->assignedRole->getUnit();
                $notification_message ="قام نائب قائد وحدة ".$unit."بنشر خبر جديد ";
                $notification_type = $post_type;
                if($med!=null)
                $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vmed!=null)
                $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($ucap!=null)
                $ucap->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
            }
            if($user->captain->role == "capa"){
                $med = User::find(Captain::where('role','med')->value('scout_id'));
                $vmed = User::find(Captain::where('role','vmed')->value('scout_id'));
                $ucap = User::find(Captain::where('role','ucap')->where('unit',$user->captain->unit)->value('scout_id'));
                $vucp = User::find(Captain::where('role','vucp')->where('unit',$user->captain->unit)->value('scout_id'));
                $unit = $user->captain->assignedRole->getUnit();
                $notification_message ="قام القائد المساعد لوحدة ".$unit."بنشر خبر جديد ";
                $notification_type = $post_type;
                if($med!=null)
                $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vmed!=null)
                $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($ucap!=null)
                $ucap->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vucp!=null)
                $vucp->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
            }
            if(Auth::user()->captain->role == "trne"){
                $gov = User::find(Captain::where('role','gov')->value('scout_id'));
                $med = User::find(Captain::where('role','med')->value('scout_id'));
                $vmed = User::find(Captain::where('role','vmed')->value('scout_id'));
                $ucap = User::find(Captain::where('role','ucap')->where('unit',$user->captain->unit)->value('scout_id'));
                $vucp = User::find(Captain::where('role','vucp')->where('unit',$user->captain->unit)->value('scout_id'));
                $capa = User::find(Captain::where('role','capa')->where('unit',$user->captain->unit)->value('scout_id'));
                $unit = $user->captain->assignedRole->getUnit();
                $notification_message ="قام القائد المتربص لوحدة ".$unit." بنشر خبر جديد منتظرا الموافقة عليه ";
                $notification_type = $post_type;
                if($gov!=null)
                $gov->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($med!=null)
                $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vmed!=null)
                $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($ucap!=null)
                $ucap->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vucp!=null)
                $vucp->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($capa!=null)
                $capa->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));

            }


					}
            if($user->captain->role=="fin"){
                $gov = User::find(Captain::where('role','gov')->value('scout_id'));
                $med = User::find(Captain::where('role','med')->value('scout_id'));
                $vmed = User::find(Captain::where('role','vmed')->value('scout_id'));
                $notification_message ="قام مسؤول المالية  بنشر خبر جديد ";
                $notification_type = $post_type;
                if($gov!=null)
                $gov->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($med!=null)
                $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vmed!=null)
                $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));

            }
            if($user->captain->role=="surv"){
                $gov = User::find(Captain::where('role','gov')->value('scout_id'));
                $med = User::find(Captain::where('role','med')->value('scout_id'));
                $vmed = User::find(Captain::where('role','vmed')->value('scout_id'));
                $notification_message ="قام مسؤول متابعة البرامج وتنفيذ الخطط بنشر خبر جديد ";
                $notification_type = $post_type;
                if($gov!=null)
                $gov->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($med!=null)
                $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vmed!=null)
                $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));

            }
            if($user->captain->role=="csd"){
                $gov = User::find(Captain::where('role','gov')->value('scout_id'));
                $med = User::find(Captain::where('role','med')->value('scout_id'));
                $vmed = User::find(Captain::where('role','vmed')->value('scout_id'));
                $notification_message ="قام مسؤول خدمة و تنمية المجتمع بنشر خبر جديد ";
                $notification_type = $post_type;
                if($gov!=null)
                $gov->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($med!=null)
                $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vmed!=null)
                $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));

            }

        if($user->captain->role=="vgov"){
            $gov = User::find(Captain::where('role','gov')->value('scout_id'));
            $med = User::find(Captain::where('role','med')->value('scout_id'));
            $vmed = User::find(Captain::where('role','vmed')->value('scout_id'));
            $notification_message ="قام نائب المحافظ  بنشر خبر جديد ";
            $notification_type = $post_type;
            if($gov!=null)
                $gov->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
            if($med!=null)
                $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
            if($vmed!=null)
                $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));

        }
          if($user->captain->role!="trne"){
            $subscribers = PostSubscriber::all();
            foreach ($subscribers as $subscriber){

                Notification::route('mail', $subscriber->email)->notify(new NotifiySubscribers($cover_image,$post_title,$post_id));

            }
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
        $unit_member=[];
        $trne = Captain::where('role','trne')->where('unit',$user_unit)->get();
        $ucap = Captain::where('role','ucap')->where('unit',$user_unit)->value('scout_id');
        $vucp = Captain::where('role','vucp')->where('unit',$user_unit)->value('scout_id');
        $capa = Captain::where('role','capa')->where('unit',$user_unit)->value('scout_id');
        array_push($unit_member,$ucap);
        array_push($unit_member,$vucp);
        array_push($unit_member,$capa);
        foreach ($trne as $member){
            array_push($unit_member,$member->scout_id);
        }
        $unitposts = Post::with(['post_creator','is_captain'])->where('linked_unit',$user_unit)->where('approved',true)->whereIn('posted_by',$unit_member)->get();
         $user_role = Auth::user()->captain;
        return response()->json(["myunitPosts"=>$unitposts,"user"=>$user_role]);

    }



  public function getUnitPostsNotApproved(){
      $post_not_approved = Post::with('post_creator')
          ->where('approved',false)
          ->get();
      return response()->json(["post_not_approved"=>$post_not_approved]);
  }
   public function getPostsNotApproved(){
        $user = Auth::user();
        $user_unit = $user->captain->unit;
        if(Auth::user()->hasRole('gov') || Auth::user()->hasRole('med') ||Auth::user()->hasRole('vmed')){
            $post_not_approved = Post::with('post_creator')
                ->where('approved',false)
                ->get();
        }
        if(Auth::user()->hasRole('ucap') || Auth::user()->hasRole('vucp') || Auth::user()->hasRole('capa')){

            $current_user_unit = Auth::user()->captain->unit;
            $unit_member=[];

            $trne = Captain::where('role','trne')->where('unit',$current_user_unit)->get();

            foreach ($trne as $member){
                array_push($unit_member,$member->scout_id);
            }






            $post_not_approved = Post::with('post_creator')
                ->whereIn('posted_by',$unit_member)
                ->where('approved',false)
                ->get();
        }
        return response()->json(["post_not_approved"=>$post_not_approved]);
   }
   public function getUnitPostsApproved(){
       $publisher_id = Captain::where('role','trne')->value('scout_id');
       $post_approved = Post::with('post_creator')
           ->where('approved',true)
           ->where('posted_by',$publisher_id)
           ->get();
       return response()->json(["post_approved"=>$post_approved]);
   }
   public function getPostsApproved(){
       $user = Auth::user();
       $user_unit = $user->captain->unit;
       $publisher_id = Captain::where('unit',$user_unit)->where('role','trne')->value('scout_id');
       if(Auth::user()->hasRole('gov') || Auth::user()->hasRole('med') ||Auth::user()->hasRole('vmed')){
           $post_approved = Post::with('post_creator')
               ->where('approved',true)
               ->get();
       }
       if(Auth::user()->hasRole('ucap') || Auth::user()->hasRole('vucp') || Auth::user()->hasRole('capa')){
         $current_user_unit = Auth::user()->captain->unit;
            $unit_member=[];

          $trne = Captain::where('role','trne')->where('unit',$current_user_unit)->get();

         foreach ($trne as $member){
             array_push($unit_member,$member->scout_id);
         }

           $post_approved = Post::with('post_creator')
               ->whereIn('posted_by',$unit_member)
               ->where('approved',true)
               ->get();
       }
       return response()->json(["post_approved"=>$post_approved]);
   }
   public function DeletePost($post_id){
        $post = Post::find($post_id);
        $post_images = PostImage::where('post_id',$post_id)->get();
        foreach ($post_images as $image){



            File::delete(public_path().'/images/Postimages/'.$image->image);


            $url = '/images/Postimages';
            if(file_exists(public_path().$url.'/medium/'.$image->image))
            File::delete(public_path().$url.'/medium/'.$image->image);
            if(file_exists(public_path().$url.'/origin/'.$image->image));
            File::delete(public_path().$url.'/origin/'.$image->image);
            DB::delete('delete from postimages where post_id = ?',[$image->post_id]);
       }
        if($post!=null){
            $url = '/images/PostCover';
            if(file_exists(public_path().$url.'/medium/'.$post->cover_image))
            File::delete(public_path().$url.'/medium/'.$post->cover_image);
            if(file_exists(public_path().$url.'/origin/'.$post->cover_image));
            File::delete(public_path().$url.'/origin/'.$post->cover_image);

            File::delete(public_path().'/images/PostCover/'.$post->cover_image);
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
        $post_date = $request->input('post.date');
        $location = $request->input('post.location');
        $description = $request->input('post.description');
        $post_summary = $request->input('post.post_summary');
        $post_type = $request->input('post.post_type');
        if(is_array($post_type)){
            $post_type = $post_type['0'];
        }

        $cover_image = $request->input('post.cover_image');
        if(strpos($cover_image, 'PostCover') === false){
            $url = '/images/PostCover';
            if(file_exists(public_path().$url.'/medium/'.$post->cover_image))
            File::delete(public_path().$url.'/medium/'.$post->cover_image);
            if(file_exists(public_path().$url.'/origin/'.$post->cover_image));
            File::delete(public_path().$url.'/origin/'.$post->cover_image);

            File::delete(public_path().'/images/PostCover/'.$post->cover_image);
            $cover_image = $this->insertImage($cover_image,'PostCover','PostCover');
            $this->OptimizeImages('/images/PostCover',$cover_image);
        }

        // first we need to insert the new post
        $post->post_title = $post_title;
        $post->post_date =$post_date;
        $post->location  =$location;
        $post->description  =$description;
        $post->post_summary =$post_summary;
        $post->post_type =$post_type;
        $post->cover_image =$cover_image;
        $post->save();
        if($post->posted_by != Auth::user()->scout_id){
            $user = Auth::user()->profile;
            $full_name = $user->last_name.' '.$user->first_name;
            $notification_message ="قام القائد  ".$full_name."بتعديل خبر قمت بنشره";
            $notification_type = $post_type;
            $creator = User::find($post->posted_by);
            if($creator!=null)
                $creator->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
        }else{
            if(Auth::user()->captain->role!='trne'){
                $user = Auth::user()->profile;
                $full_name = $user->last_name.' '.$user->first_name;
                $notification_message ="قام القائد  ".$full_name." بتعديل خبر قام بنشره مسبقا ";
                $notification_type = $post_type;
                $med= User::find(Captain::where('role','med')->value('scout_id'));
                $vmed= User::find(Captain::where('role','vmed')->value('scout_id'));
                if($med!=null)
                    $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vmed!=null)
                    $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
            }else{
                $user = Auth::user()->profile;
                $full_name = $user->last_name.' '.$user->first_name;
                $notification_message ="قام القائد المتربص لوحدة  ".Auth::user()->captain->assignedRole->getUnit() ." ".$full_name." بتعديل خبر قام بنشره مسبقا ";
                $notification_type = $post_type;
								$gov =User::find(Captain::where('role','gov')->value('scout_id'));
                $med= User::find(Captain::where('role','med')->value('scout_id'));
                $vmed= User::find(Captain::where('role','vmed')->where('unit',Auth::user()->captain->unit)->value('scout_id'));
                $ucap = User::find(Captain::where('role','ucap')->where('unit',Auth::user()->captain->unit)->value('scout_id'));
                $vucp = User::find(Captain::where('role','vucp')->where('unit',Auth::user()->captain->unit)->value('scout_id'));
                $capa  =User::find(Captain::where('role','capa')->where('unit',Auth::user()->captain->unit)->value('scout_id'));
								if($gov!=null)
										$gov->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($med!=null)
                    $med->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vmed!=null)
                    $vmed->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($ucap!=null)
                    $ucap->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
                if($vucp!=null)
                    $vucp->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));

                if($capa!=null)
                    $capa->notify(new notifyCaptain($notification_message,$notification_type,$cover_image,Carbon::now()));
            }

        }

        // delete the old images

        $new_post_images = $request->input('new_post_images');
        $post_images_deleted = $request->input('post_images_deleted');

        foreach ($post_images_deleted as $deleted){
            $image =  $deleted['image'];
           if(strpos($image, 'post_images') !== false){

            $url = '/images/Postimages';
            if(file_exists(public_path().$url.'/medium/'.$image))
            File::delete(public_path().$url.'/medium/'.$image);
            if(file_exists(public_path().$url.'/origin/'.$image));
            File::delete(public_path().$url.'/origin/'.$image);

            File::delete(public_path().'/images/Postimages/'.$image);

            DB::table('postimages')->where('post_id',$post_id)
            ->where('image',$image)
            ->delete();


           }

        
        }

        // insert the new images

        $title ="post_images";
        $repo = 'Postimages';
       for($i=0;$i<count($new_post_images);$i++){

        $new_image[$i] = $this->insertImage($new_post_images[$i],$title,$repo);
        $this->OptimizeImages('/images/Postimages',$new_image[$i]);
        DB::insert('insert into postimages(post_id,image) values (?,?)',[ $post_id,$new_image[$i]]);

    }
     DB::table('editedposts')->insert([
          "post_id"=>$post_id,
          "editor"=>Auth::user()->scout_id,
          "updated_at"=>Carbon::now(),
      ]);


    return response()->json(["updated"=>"Successfully"]);
}


   public function getUnitPosts($unit_id){
        switch($unit_id){
            case 1:{
                $post = Post::with('post_creator')->where('linked_unit','cubs')->get();
                break;
            }
            case 2:{
                $post = Post::with('post_creator')->where('linked_unit','sct')->get();
                break;
            }
         case 3:{
                $post = Post::with('post_creator')->where('linked_unit','asct')->get();
                break;
            }
         case 4:{
                $post = Post::with('post_creator')->where('linked_unit','tvlr')->get();
                break;
            }
         case 5:{
                $post = Post::with('post_creator')->where('linked_unit','cap')->get();
                break;
            }
         case 6:{
             $media = Captain::where('role','med')->value('scout_id');
             $vmedia = Captain::where('role','vmed')->value('scout_id');
                $post = Post::with('post_creator')->whereIn('posted_by',[$media,$vmedia])->get();
                break;
            }
         case 7:{
                $post = Post::with('post_creator')->where('linked_unit','fin')->get();
                break;
            }
         case 8:{
                $post = Post::with('post_creator')->where('linked_unit','csd')->get();
                break;
            }
         case 9:{
                $post = Post::with('post_creator')->where('linked_unit','surv')->get();
                break;
            }
        }
        return response()->json(["post"=>$post]);

   }


public function getMyApprovedPosts(){
    $user = Auth::user();
    $myposts = Post::where('posted_by',$user->scout_id)->where('approved',true)->get();
    $myinfo = $user->profile;
    return response()->json(["MyPosts"=>[$myposts,$myinfo]]);
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
