<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;


use Illuminate\Support\Facades\Request;

use View;
use Session;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;
use DB;

class PostController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    
    public function index()
    {        
          $allposts = Post::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $pubposts = Post::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $unpposts = Post::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');

          return View::make('backend/posts', array('title' => 'Posts','posts' => $allposts, 'all' => $allposts, 'active' => $pubposts,'inactive' => $unpposts));
        
    }
    
    public function create()
    {
          return View::make('backend/addpost', array('title' => 'Posts | Add Post'));
    }
    
    public function uploadImage(){
        
        $imageUploadPath = '/public/uploads/posts/images/';
        $imagepath       = "";
        $files           = Input::file('image');
        
        $images_result = UploadController::upload($files,$imageUploadPath);
        
        if($images_result['upload']){
            $imageFiles  =  $images_result['filepaths'];
            $imagepath   =  end($imageFiles);
            return array('imagestate' => 'true' ,'imagepath' => $imagepath);
        }
        else{  
            $imageErrors = $images_result['error'];
            return array('imagestate' => 'false' ,'imagepath' => $imageErrors);
        }
        
    }
    
    public function store()
    {
        
        $image_upload_result;   
               
        $post = new Post;

        $post->title        = Input::get('title');               
        $post->description  = Input::get('description');   

        if(Input::hasFile('image')){
           $image_upload_result = $this->uploadImage();
           $post->mediapath    = $image_upload_result['imagepath'];
           $post->mediastate   = $image_upload_result['imagestate'];
        } 
        
        $post->status  = Input::get('status');   
        
        if($post->save()){
            //save activity
            $activity_task = "Post : ".$post->title." has been added";
            $activity_type = "post";
            $connection_id = $post->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect('posts-view?save=success==true')->with('success', 'Post was successfully added');
        }
        else{
            return redirect('posts-view?save=success==false')->with('success', 'Post was not successfully added');
        }
                  

    }
    
    
    public function edit($id){
        
        $post = Post::where('id' , '=', $id)->first();  
        
        return View::make('backend/editpost', array('title' => 'Posts | Edit Post','post' => $post));
        
        
    }
    
    public function update($id){
        
        $post = Post::where('id' , '=', $id)->first(); 
        
        $post->title        = Input::get('title');                 
        $post->description  = Input::get('description');
        
        if($post->save()){
            //save activity
            $activity_task = "Post : ".$post->title." details has been changed";
            $activity_type = "post";
            $connection_id = $post->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('posts-edit/'.$id.'?edit=success==true'))->with('success', 'Post was successfully edited');  
        }
        else{
            return redirect(URL::to('posts-edit/'.$id.'?edit=success==false'))->with('success', 'Post was not successfully edited');
        }           
        
    }
    
    public function updatestatus($id){
        
        $post = Post::where('id' , '=', $id)->first(); 
        
                
        $post->status  = Input::get('status');
        
        if($post->save()){
            //save activity
            $activity_task = "Post : ".$post->title." status has been changed";
            $activity_type = "post";
            $connection_id = $post->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('posts-edit/'.$id.'?status=changes==true'))->with('success', 'Post status was successfully edited');
        }
        else{
            return redirect(URL::to('posts-edit/'.$id.'?status=changes==false'))->with('error', 'Post status was not successfully edited');           
        }        
        
    }
    
    public function setstatus($id){
        
        $post = Post::where('id' , '=', $id)->first(); 
        
                
        $post->status  = Input::get('status');
        
        if($post->save()){
            //save activity
            $activity_task = "Post : ".$post->title." status has been changed";
            $activity_type = "post";
            $connection_id = $post->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('posts-view?status=changes==true'))->with('success', 'Post status was successfully edited');
        }
        else{
            return redirect(URL::to('posts-view?status=changes==false'))->with('error', 'Post status was not successfully edited');           
        }        
        
    }
    
    public function updateimage($id){
        
        $post = Post::where('id' , '=', $id)->first(); 
        
        $image_upload_result;
        
        if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $post->mediapath    = $image_upload_result['imagepath'];
            $post->mediastate   = $image_upload_result['imagestate'];
            
            if($post->save()){
                //save activity
                $activity_task = "Post : ".$post->title." image has been changed";
                $activity_type = "post";
                $connection_id = $post->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('posts-edit/'.$id.'?image=changes==true'))->with('success', 'Post image was successfully edited');
            }
            else{
                return redirect(URL::to('posts-edit/'.$id.'?image=changes==false'))->with('error', 'Post image was not successfully edited');           
            } 
        } 
        else{
            return redirect(URL::to('posts-edit/'.$id.'?image=found==false'))->with('error', 'Please select an image to upload');           
        }
         
    }
    
    public function destroy($id){
        
        $post = Post::where('id' , '=', $id)->first(); 
        
        $imagestate = $post->mediastate;
        $imagepath = $post->mediapath;
        
        if($imagestate == "true"){
            UploadController::delete_file($imagepath);
        }
        
         
        if ($post->delete()){
          //save activity
          $activity_task = "Post : ".$post->title." has been deleted";
          $activity_type = NULL;
          $connection_id = NULL;
          ActivityController::store($activity_task,$activity_type,$connection_id);
          //save activity
            
          return redirect(URL::to('posts-view?post=deleted==true'))->with('success', 'Post was successfully deleted');
        }
        else{
          return redirect(URL::to('posts-view?post=deleted==false'))->with('success', 'Post was not successfully deleted');    
        }            
       
    }
    
    public function destroyimge($id){
        $post = Post::where('id' , '=', $id)->first(); 
        
        $imagepath = $post->mediapath;
        
        if(UploadController::delete_file($imagepath)){
            $post->mediapath  = "Image has been deleted";
            $post->mediastate = "false";

            if($post->save()){
                //save activity
                $activity_task = "Post : ".$post->title." image has been deleted";
                $activity_type = "post";
                $connection_id = $post->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('posts-edit/'.$id.'?image=deleted==true'))->with('success', 'Post image was successfully deleted');
            }
            else{
                return redirect(URL::to('posts-edit/'.$id.'?image=deleted==false'))->with('error', 'Post image was not successfully deleted');
            }
        }
        
    }
    
    public function getpublished(){
        
          $allposts = Post::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $pubposts = Post::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $unpposts = Post::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');

          return View::make('backend/posts', array('title' => 'Posts | Published','posts' => $pubposts, 'all' => $allposts, 'active' => $pubposts,'inactive' => $unpposts));
        
    }
    
    public function getunpublished(){
        
          $allposts = Post::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $pubposts = Post::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $unpposts = Post::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');

          return View::make('backend/posts', array('title' => 'Posts | Unpublished','posts' => $unpposts, 'all' => $allposts, 'active' => $pubposts,'inactive' => $unpposts));
        
    }
    
    public static function getposts(){
        
         $posts = Post::where('status' , '=', 'on')->get(); 
        
         return $posts;
        
    }
    
    public static function getpost($id){
        
         $post = Post::where('id' , '=', $id)->first(); 
        
         return $post;
        
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey');      
        
         $posts = Post::where('title', 'LIKE', '%'.$searchkey.'%')->orWhere('created_at', 'LIKE', '%'.$searchkey.'%')->orderBy('id', 'desc')->paginate(25); 
        
        
         $allposts = Post::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $pubposts = Post::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $unpposts = Post::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');      
        
         return View::make('backend/posts', array('title' => 'Posts','posts' => $posts, 'all' => $allposts, 'active' => $pubposts,'inactive' => $unpposts));
        
        
    }
    
}