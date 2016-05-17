<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;

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

class MemberController extends Controller
{
    
    public function index()
    {
          $members = Member::all();          
          
          return View::make('backend/members', array('title' => 'Members','members' => $members));
    }
    
    public function create()
    {
          return View::make('backend/addmember', array('title' => 'Add Member'));
    }
    
    public function store()
    {
        
           $imagefile = Input::file('memberimage');
           $imagedestinationPath = 'uploads/members/images/';
           $imagefilename  = rand(11111,99999).'.'.$imagefile->getClientOriginalExtension(); 
        
           $imageupload = UploadController::upload($imagefile,$imagedestinationPath,$imagefilename);
        
           if($imageupload){
               
                 $member = new Member;
        
                 $member->fullname     = Input::get('fulname'); 
                 $member->post         = Input::get('post'); 
                 $member->year         = Input::get('year');
                 $member->memberimage  = $imagedestinationPath.$imagefilename;
                 $member->message      = Input::get('message');
                 $member->type         = Input::get('type');  
                 $member->email        = Input::get('email');                    
                 $member->contact      = Input::get('contact'); 
                 $member->facebook     = Input::get('facebook');
                 $member->twitter      = Input::get('twitter');                  
                 $member->linkedin     = Input::get('linkedin');
                 $member->google       = Input::get('google');
               
                 if($member->save()){
                    return Redirect::to('members-add?save=success==true');    
                 }
                 else{
                    return Redirect::to('/members-add?save=success==false');
                 }
               
               
           }
           else{
               return Redirect::to('/members-add?upload=success==false');
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
//                 $member->memberimage  = $imagedestinationPath.$imagefilename;
                 $member->message      = Input::get('message');
                 $member->type         = Input::get('type');  
                 $member->email        = Input::get('email');                    
                 $member->contact      = Input::get('contact'); 
                 $member->facebook     = Input::get('facebook');
                 $member->twitter      = Input::get('twitter');                  
                 $member->linkedin     = Input::get('linkedin');
                 $member->google       = Input::get('google');
        
        if($member->save()){
            return Redirect::to('members-view?edit=success==true');    
        }
        else{
            return Redirect::to('/members-view?edit=success==false');
        }        
        
    }
    
    public function destroy($id){
        
        $member = Member::where('id' , '=', $id)->first(); 
        
        if (File::exists($member->memberimage))
        {           
           if(File::delete($member->memberimage)){
               if ($member->delete()){
                   return Redirect::to('members-view?delete=success==true');    
               }
               else{
                   return Redirect::to('members-view?delete=success==false');    
               }
           }
           else{
               return Redirect::to('members-view?file=delete==false');
           }
            
           

        }
        else{
            return Redirect::to('members-view?file=exists==false');    
        }
              
    }
    
    public function updatestatus($id){
        
        $member = Member::where('id' , '=', $id)->first(); 
        
                
        $member->status  = Input::get('status');
        
        if($member->save()){
            return Redirect::to('members-edit/'.$id);   
         
        }
        else{
            return Redirect::to('members-edit/'.$id);
           
        }        
        
    }
    
    public function getpublished(){
        
         $members = Member::where('status' , '=', 'on')->get(); 
         
         return View::make('backend/members', array('title' => 'Members | Published','members' => $members));
        
    }

    
}