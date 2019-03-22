<?php

namespace App\Http\Controllers;

use App\BooksCategory;
use App\BooksLibrary;
use Auth;
use File;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function getCategories(){
        $categories = BooksCategory::all();
        return response()->json(["categories"=>$categories]);

    }
    public function UploadBook(Request $request){
        $book_name = $request->input('book_name');
        $description = $request->input('description');
        $book_category = $request->input('book_category');
        $author_name = $request->input('author_name');
        $book_image = $request->input('book_image');
        $book_pdf = $request->input('book_pdf');
        $new_category = $request->input('new_category');

            $book_image = $this->insertBookImage($book_image);
            $this->OptimizeImages('/uploads/Books/Images',$book_image);

        $book_pdf = $this->insertBookPDF($book_pdf);

        if(count($new_category)!=0){
            foreach ($new_category as $category){
                $add_category = new BooksCategory;
                $add_category->category_name = $category['category_name'];
                $add_category->save();
            }
        }

        $new_book = new BooksLibrary;
        $new_book->title = $book_name;
        $new_book->author = $author_name;
        $new_book->category = $book_category;
        $new_book->description = $description;
        $new_book->picture = $book_image;
        $new_book->file = $book_pdf;
        $new_book->uploaded_by = Auth::user()->scout_id;
        $new_book->save();
    }
    public function insertBookImage( $image){
        $filename="";
        $filepath="";
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
            $currenttime = date('YmdHis',time()).mt_rand();
            $filename = 'Book'. $currenttime.'.'.$exte;
            $filepath = public_path().'/uploads/Books/Images/'.$filename;


            file_put_contents($filepath,$decode);

        }
        return $filename;

    }
    public function insertBookPDF($pdf){
        $filename="";
        $filepath="";
        if($pdf==""){
            $filename="";
        }else{
            $expl = explode(',',$pdf);
            $decode = base64_decode($expl[1]);
            $exte = 'pdf';
            $currenttime = date('YmdHis',time()).mt_rand();
            $filename = 'Book'. $currenttime.'.'.$exte;
            $filepath = public_path().'/uploads/Books/PDF/'.$filename;


            file_put_contents($filepath,$decode);

        }
        return $filename;

    }
    public function getBooks(){
        $books = BooksLibrary::all();
        return response()->json(["books"=>$books]);
    }
    public function deleteBook($id){
        $book = BooksLibrary::find($id);
        File::delete(public_path().'/uploads/Books/PDF/'.$book->file);
        if($book->picture!=""){
            $url = '/uploads/Books/Images';
            if(file_exists(public_path().$url.'/medium/'.$book->picture))
            File::delete(public_path().$url.'/medium/'.$book->picture);
            if(file_exists(public_path().$url.'/origin/'.$book->picture));
            File::delete(public_path().$url.'/origin/'.$book->picture);
            File::delete(public_path().'/uploads/Books/Images/'.$book->picture);
        }
        $book->delete();
    }
    public function getBook($id){
        $book = BooksLibrary::find($id);
        return response()->json(["book"=>$book]);

    }
    public function EditBookInfo(Request $request,$id){
        $book_name = $request->input('book_name');
        $description = $request->input('description');
        $book_category = $request->input('book_category');
        $author_name = $request->input('author_name');
        $book_image = $request->input('book_image');
        $new_category = $request->input('new_category');

        $book_image = $this->insertBookImage($book_image);
        $this->OptimizeImages('/uploads/Books/Images',$book_image);
        if(count($new_category)!=0){
            foreach ($new_category as $category){
                $add_category = new BooksCategory;
                $add_category->category_name = $category['category_name'];
                $add_category->save();
            }
        }
        $new_book = BooksLibrary::find($id);;
        $new_book->title = $book_name;
        $new_book->author = $author_name;
        $new_book->category = $book_category;
        $new_book->description = $description;
        $new_book->picture = $book_image;
        $new_book->save();
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
