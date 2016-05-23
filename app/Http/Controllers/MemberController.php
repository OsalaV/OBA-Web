<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;


use Illuminate\Support\Facades\Request;

use App\Member;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;

class MemberController extends Controller
{
    
    public function index()
    {
          $members       = Member::all(); 
          $allcount      = Member::all()->count(); 
          $activecount   = Member::where('status','=','on')->count(); 
          $inactivecount = Member::whereNull('status')->count(); 
          
          return View::make('backend/members', array('title' => 'Members','members' => $members,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' => $inactivecount));
    }
    
    public function create()
    {
          return View::make('backend/addmember', array('title' => 'Add Member'));
    }
    
    public function uploadImage(){
        
        $imageUploadPath = 'uploads/members/images/';
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
        
         $member = new Member;
               
        
         $member->fullname     = Input::get('fulname'); 
         $member->post         = Input::get('post'); 
         $member->year         = Input::get('year');
         $member->message      = Input::get('message');
         $member->type         = Input::get('type');  
         $member->email        = Input::get('email');                    
         $member->contact      = Input::get('contact'); 
         $member->facebook     = Input::get('facebook');
         $member->twitter      = Input::get('twitter');                  
         $member->linkedin     = Input::get('linkedin');
         $member->google       = Input::get('google');
               
         if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $member->imagepath    = $image_upload_result['imagepath'];
            $member->imagestate   = $image_upload_result['imagestate'];
         } 
        
         if($member->save()){
            $activity_task = "Member : ".$member->title." has been added";
            $activity_id = ActivityController::store($activity_task);
            $member->activities_id = $activity_id;
            $member->save();
            return redirect('members-add?save=success==true')->with('success', 'Member was successfully added');
         }
         else{
            return redirect('members-add?save=success==false')->with('success', 'Member was not successfully added');
         }

    }
    
    public function edit($id){
        
        $member = Member::where('id' , '=', $id)->first();  
        
        return View::make('backend/editmember', array('title' => 'Edit Member','member' => $member));
        
        
    }
    
    public function update($id){
        
         $member = Member::where('id' , '=', $id)->first(); 
        
         $member->fullname     = Input::get('fulname'); 
         $member->post         = Input::get('post'); 
         $member->year         = Input::get('year');
         $member->message      = Input::get('message');
         $member->type         = Input::get('type');  
         $member->email        = Input::get('email');                    
         $member->contact      = Input::get('contact'); 
         $member->facebook     = Input::get('facebook');
         $member->twitter      = Input::get('twitter');                  
         $member->linkedin     = Input::get('linkedin');
         $member->google       = Input::get('google');
        
        if($member->save()){
            $activity_task = "Member : ".$member->title." details has been changed";
            $activity_id = ActivityController::store($activity_task);
            $member->activities_id = $activity_id;
            $member->save();
            return redirect(URL::to('members-edit/'.$id.'?edit=success==true'))->with('success', 'Member was successfully edited');  
        }
        else{
            return redirect(URL::to('members-edit/'.$id.'?edit=success==false'))->with('success', 'Member was not successfully edited');
        }          
        
    }
    
    public function updatestatus($id){
        
        $member = Member::where('id' , '=', $id)->first(); 
        
                
        $member->status  = Input::get('status');
        
        if($member->save()){
            $activity_task = "Member : ".$member->title." status has been changed";
            $activity_id = ActivityController::store($activity_task);
            $member->activities_id = $activity_id;
            $member->save();
            return redirect(URL::to('members-edit/'.$id.'?status=changes==true'))->with('success', 'Member status was successfully edited');
        }
        else{
            return redirect(URL::to('members-edit/'.$id.'?status=changes==false'))->with('error', 'Member status was not successfully edited');           
        }       
        
    }
    
    public function updateimage($id){
        
        $member = Member::where('id' , '=', $id)->first(); 
        
        $image_upload_result;
        
        if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $member->imagepath    = $image_upload_result['imagepath'];
            $member->imagestate   = $image_upload_result['imagestate'];
            
            if($member->save()){
                $activity_task = "Member : ".$member->title." image has been added";
                $activity_id = ActivityController::store($activity_task);
                $member->activities_id = $activity_id;
                $member->save();
                return redirect(URL::to('members-edit/'.$id.'?image=changes==true'))->with('success', 'Member image was successfully edited');
            }
            else{
                return redirect(URL::to('members-edit/'.$id.'?image=changes==false'))->with('error', 'Member image was not successfully edited');           
            } 
        } 
        else{
            return redirect(URL::to('members-edit/'.$id.'?image=found==false'))->with('error', 'Please select an image to upload');           
        }
         
    }
    
    public function destroy($id){
        
        $member = Member::where('id' , '=', $id)->first(); 
        
        $imagepath = $member->imagepath;
        
        if(UploadController::delete_file($imagepath)){
            
            if ($member->delete()){
              $activity_task = "Member : ".$member->title." has been deleted";
              $activity_id = ActivityController::store($activity_task);              
              return redirect(URL::to('members-view?member=deleted==true'))->with('success', 'Member was successfully deleted');
            }
            else{
              return redirect(URL::to('members-view?member=deleted==false'))->with('success', 'Member was not successfully deleted');    
            }            
        }
              
    }
    
    public function destroyimge($id){
        $member = Member::where('id' , '=', $id)->first(); 
        
        $imagepath = $member->imagepath;
        
        if(UploadController::delete_file($imagepath)){
            $member->imagepath  = "Image has been deleted";
            $member->imagestate = "false";

            if($member->save()){
                $activity_task = "Member : ".$member->title." image has been deleted";
                $activity_id = ActivityController::store($activity_task);
                $member->activities_id = $activity_id;
                $member->save();
                return redirect(URL::to('members-edit/'.$id.'?image=deleted==true'))->with('success', 'Member image was successfully deleted');
            }
            else{
                return redirect(URL::to('members-edit/'.$id.'?image=deleted==false'))->with('error', 'Member image was not successfully deleted');
            }
        }
        
    }
    
    public function getpublished(){
        
         $members       = Member::where('status','=','on')->get();          
        
         $allcount      = Member::all()->count(); 
         $activecount   = Member::where('status','=','on')->count(); 
         $inactivecount = Member::whereNull('status')->count(); 
          
         return View::make('backend/members', array('title' => 'Members | Published','members' =>  $members,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' =>  $inactivecount));
        
    }
    
    public function getunpublished(){
        
         $members       = Member::whereNull('status')->get(); 
         
         $allcount      = Member::all()->count(); 
         $activecount   = Member::where('status','=','on')->count(); 
         $inactivecount = Member::whereNull('status')->count(); 
          
         return View::make('backend/members', array('title' => 'Members | Unpublished','members' =>  $members,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' =>  $inactivecount));
        
    }

    
}