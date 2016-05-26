<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserPermissionController;

use App\User;

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

class LoginController extends Controller
{
    
    public function index()
    {
    return View::make('backend/login', array('title' => 'DS OBA | Login'));
    }
    
    public function login(){
        
        $email    = Input::get('email');
        $password = Input::get('password');
        
        
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            
            $userid = Auth::id();
            $userfullname = Auth::user()->fullname;
            $this->setpermissionstosession($userid);
            
//            echo Session::get('READ');

            return Redirect::intended('dashboard-view');
            
        }
        else{
            return redirect('ds-admin?auth=attempt==failed');
        }
        
        
    }    
    
    private function setpermissionstosession($userid){
        
        $userpermissions = UserPermissionController::getuserpermissions($userid); 
            
        foreach($userpermissions as $userpermission){
        Session::put($userpermission->permission, $userpermission->status);   
        }
        
    }
    
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('ds-admin?logout=success==true');
    }
    
    
}
