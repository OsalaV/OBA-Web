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

class UserController extends Controller
{
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    
    public function index()
    {
         $users = User::all()->sortByDesc("id");       
        
         return View::make('backend/users', array('title' => 'Users', 'users' => $users));
    }
    
    public function create()
    {
         return View::make('backend/adduser', array('title' => 'Users | Add User'));
    }
    
    public function store()
    {
        
        $user = new User;
        
        $user->fullname         = Input::get('fullname'); 
        $user->email            = Input::get('email'); 
        $user->password         = Hash::make(Input::get('password'));
        $user->contact          = Input::get('contact'); 
        $user->role             = Input::get('role');   
        $user->status           = Input::get('status');         
        
        $default_permissions     = Input::get('permissions'); 
        
        if($user->save()){ 
            $userid = $user->id;
            
            if($default_permissions == "on"){
                UserPermissionController::setdefaultpermissions($userid);       
            }
            else{
                UserPermissionController::setpermissions($userid); 
            }
            
            return redirect('users-view?save=success==true')->with('success', 'User was successfully added');
        }
        else{
            return redirect('users-view?save=success==false')->with('error', 'User was not successfully added');
        }
        
    }
    
    public function edit($id){
        
        $user = User::where('id' , '=', $id)->first();  
        $userpermissions = UserPermissionController::getuserpermissions($id);       
        
        return View::make('backend/edituser', array('title' => 'Users | Edit User','user' => $user, 'userpermissions' => $userpermissions));
        
        
    }
    
    public function update($id){
        
        $user = User::where('id' , '=', $id)->first(); 
        
        $user->fullname         = Input::get('fullname'); 
        $user->email            = Input::get('email'); 
        $user->contact          = Input::get('contact'); 
        $user->role             = Input::get('role');    
                    
        
        if($user->save()){
            return redirect(URL::to('users-edit/'.$id.'?edit=success==true'))->with('success', 'User was successfully edited');  
        }
        else{
            return redirect(URL::to('users-edit/'.$id.'?edit=success==false'))->with('error', 'User was not successfully edited');
        }        
        
    } 
    
    public function updatestatus($id){
        
        $user = User::where('id' , '=', $id)->first(); 
                
        $user->status  = Input::get('status');
        
        if($user->save()){                    
            
            return redirect(URL::to('users-edit/'.$id.'?status=changes==true'))->with('success', 'User status was successfully changed');   
        }
        else{
            return redirect(URL::to('users-edit/'.$id.'?status=changes==false'))->with('error', 'User status was not successfully changed');            
        }
        
    }
    
    public function setstatus($id){
        
        $user = User::where('id' , '=', $id)->first(); 
                
        $user->status  = Input::get('status');
        
        if($user->save()){                    
            
            return redirect(URL::to('users-view?status=changes==true'))->with('success', 'User status was successfully changed');   
        }
        else{
            return redirect(URL::to('users-view?status=changes==false'))->with('error', 'User status was not successfully changed');            
        }
        
    }
    
    
    
    public function updatepassword($id){
       
        $user = User::where('id' , '=', $id)->first(); 
        
        $user->password = Hash::make(Input::get('password'));
        
        if($user->save()){
            return redirect(URL::to('users-edit/'.$id.'?edit=password==true'))->with('success', 'User password was successfully edited');  
        }
        else{
            return redirect(URL::to('users-edit/'.$id.'?edit=password==false'))->with('error', 'User password was not successfully edited');
        } 
        
    }
    
    public function updatepermissions($id){
        
        $permissions = Input::get('status');
            
        $result = UserPermissionController::updateuserpermissions($id,$permissions);   
            
        if($result){
            return redirect(URL::to('users-edit/'.$id.'?edit=permissions==true'))->with('success', 'User permissions was successfully edited');   
        }
        else{
            return redirect(URL::to('users-edit/'.$id.'?edit=permissions==false'))->with('error', 'User permissions was not successfully edited');   
        }
        
    }
    
    public function destroy($id){
        
        $user = User::where('id' , '=', $id)->first(); 
        
        
        if ($user->delete()){
          return redirect(URL::to('users-view?user=deleted==true'))->with('success', 'User was successfully deleted');
        }
        else{
          return redirect(URL::to('users-view?user=deleted==false'))->with('error', 'User was not successfully deleted');    
        }            
        
    } 
    
    
}