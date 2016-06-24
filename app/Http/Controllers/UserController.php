<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserPermissionController;

use App\User;
use App\Event;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;
use Hash;

class UserController extends Controller
{
    public function __construct()
	{        
        $this->middleware('user');
	}
    
    
    public function index()
    {   
        if (Session::has('user')) {
            $user = Session::get('user');
            if($user->role == 'user'){
                $username = $user->firstname.' '.$user->lastname;
                $events = Event::where('status' , '=', 'on')->where('type' , '=', 'public')->where('ticketstate' , '=', 'on')->orderBy('id', 'desc')->get(); 
                return View::make('userhome', array('title' => $username, 'events' => $events));
            }
            else{
                 return redirect(URL::to('login')); 
            }
        }
        else{
            return redirect(URL::to('login')); 
        }
        
         
    }
    
    public function userprofile(){
        
        if (Session::has('user')) {
            $user = Session::get('user');
            if($user->role == 'user'){
                $username = $user->firstname.' '.$user->lastname;
                return View::make('userprofile', array('title' => $username));
            }
            else{
                 return redirect(URL::to('login')); 
            }
        }
        else{
            return redirect(URL::to('login')); 
        }
        
        
    }
    
    public function updateuser($id){
        
        $user = User::where('id' , '=', $id)->first(); 
        
        $user->firstname        = Input::get('firstname');
        $user->lastname         = Input::get('lastname'); 
        $user->email            = Input::get('email');         
        $user->month            = Input::get('month'); 
        $user->day              = Input::get('day'); 
        $user->year             = Input::get('year'); 
        $user->nic              = Input::get('nic'); 
        $user->address          = Input::get('address');
        $user->contact          = Input::get('contact'); 
                    
        
        if($user->save()){
            
            Session::forget('user');
            Session::put('user',$user);    
            
            return redirect(URL::to('user-profile/?edit=success==true'));  
        }
        else{
            return redirect(URL::to('user-profile/?edit=success==false')); 
        }        
        
    } 
    
    
    

    
    
    
    
}