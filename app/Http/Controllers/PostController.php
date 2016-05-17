<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;

use Illuminate\Support\Facades\Request;

use View;
use Session;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;

class PostController extends Controller
{
    
    public function index()
    {
          $posts = Post::all(); 
          return View::make('backend/posts', array('title' => 'Posts','posts' => $posts));;
    }
    
    public function create()
    {
          return View::make('backend/addpost', array('title' => 'Add Post'));
    }
    
    public function store()
    {
        
           $imagefile = Input::file('postimage');
           $imagedestinationPath = 'uploads/posts/images/';
           $imagefilename  = rand(11111,99999).'.'.$imagefile->getClientOriginalExtension(); 
        
           $imageupload = UploadController::upload($imagefile,$imagedestinationPath,$imagefilename);
        
           if($imageupload){
               
                 $post = new Post;
        
                 $post->title        = Input::get('title');               
                 $post->description  = Input::get('description');   
                 $post->postimage    = $imagedestinationPath.$imagefilename;
               
                 if($post->save()){
                    return Redirect::to('posts-add?save=success==true');    
                 }
                 else{
                    return Redirect::to('/posts-add?save=success==false');
                 }
               
               
           }
           else{
               return Redirect::to('/posts-add?upload=success==false');
           }

    }
    
    public function edit($id){
        
        $post = Post::where('id' , '=', $id)->first();  
        
        return View::make('backend/editpost', array('title' => 'Edit Post','post' => $post));
        
        
    }
    
    public function update($id){
        
        $post = Post::where('id' , '=', $id)->first(); 
        
        $post->title        = Input::get('title');                 
        $post->description  = Input::get('description');
        
        if($post->save()){
            return Redirect::to('posts-view?edit=success==true');    
        }
        else{
            return Redirect::to('/posts-view?edit=success==false');
        }        
        
    }
    
    public function destroy($id){
        
        $post = Post::where('id' , '=', $id)->first(); 
        
        if (File::exists($post->postimage))
        {           
           if(File::delete($post->postimage)){
               if ($post->delete()){
                   return Redirect::to('posts-view?delete=success==true');    
               }
               else{
                   return Redirect::to('posts-view?delete=success==false');    
               }
           }
           else{
               return Redirect::to('posts-view?file=delete==false');
           }
            
           

        }
        else{
            return Redirect::to('posts-view?file=exists==false');    
        }      
        
    }
    
    public function updatestatus($id){
        
        $post = Post::where('id' , '=', $id)->first(); 
        
                
        $post->status  = Input::get('status');
        
        if($post->save()){
            return Redirect::to('posts-edit/'.$id);   
         
        }
        else{
            return Redirect::to('posts-edit/'.$id);
           
        }        
        
    }
    
    public function getpublished(){
        
         $posts = Post::where('status' , '=', 'on')->get(); 
         
         return View::make('backend/posts', array('title' => 'Posts | Published','posts' => $posts));
        
    }
    
    
}