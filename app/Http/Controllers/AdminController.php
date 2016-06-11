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

class AdminController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    public function index(){
        $admins = User::where('role' , '!=', 'user')->get(); 
        return View::make('backend/admins', array('title' => 'Administrators', 'admins' => $admins));
    }
    
    public function create()
    {
         return View::make('backend/addadmin', array('title' => 'Administrators | Add Admin'));
    }
    
    public function store(){

        $user = new User;
        
        $user->firstname        = Input::get('firstname');
        $user->lastname         = Input::get('lastname'); 
        $user->email            = Input::get('email'); 
        $user->password         = Hash::make(Input::get('password'));
        $user->month            = Input::get('month'); 
        $user->day              = Input::get('day'); 
        $user->year             = Input::get('year'); 
        $user->nic              = Input::get('nic'); 
        $user->address          = Input::get('address');
        $user->contact          = Input::get('contact'); 
        $user->role             = Input::get('role'); 
        
        $default_permissions    = Input::get('permissions'); 
        
        if($user->save()){ 
            $userid = $user->id;
            $role   = $user->role;
            
            if($role == 'admin' && $default_permissions == 'on'){
                UserPermissionController::setdefaultpermissions($userid);           
            }
            else if($role == 'superadmin'){
                UserPermissionController::setfullpermissions($userid);           
            }
            else{
                UserPermissionController::setpermissions($userid);    
            }
            
            return redirect('admins-view?save=success==true')->with('success', 'Admin was successfully added');
        }
        else{
            return redirect('admins-view?save=success==false')->with('error', 'Admin was not successfully added');
        }
    
    
    }
    
    public function edit($id){
        
        $user = User::where('id' , '=', $id)->first();  
        $userpermissions = UserPermissionController::getuserpermissions($id);       
        
        return View::make('backend/editadmin', array('title' => 'Administrators | Edit Admin','user' => $user, 'userpermissions' => $userpermissions));        
        
    }
    
    public function update($id){
        
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
        $user->role             = Input::get('role'); 
                    
        
        if($user->save()){
            return redirect(URL::to('admins-edit/'.$id.'?edit=success==true'))->with('success', 'Admin was successfully edited');  
        }
        else{
            return redirect(URL::to('admins-edit/'.$id.'?edit=success==false'))->with('error', 'Admin was not successfully edited');
        }        
        
    } 
    
    public function updatepermissions($id){
        
        $permissions = Input::get('status');
            
        $result = UserPermissionController::updateuserpermissions($id,$permissions);   
            
        if($result){
            return redirect(URL::to('admins-edit/'.$id.'?edit=permissions==true'))->with('success', 'Admin permissions was successfully edited');   
        }
        else{
            return redirect(URL::to('admins-edit/'.$id.'?edit=permissions==false'))->with('error', 'Admin permissions was not successfully edited');   
        }
        
    }
    
    public function updatepassword($id){
       
        $user = User::where('id' , '=', $id)->first(); 
        
        $user->password = Hash::make(Input::get('password'));
        
        if($user->save()){
            return redirect(URL::to('admins-edit/'.$id.'?edit=password==true'))->with('success', 'Admin password was successfully edited');  
        }
        else{
            return redirect(URL::to('admins-edit/'.$id.'?edit=password==false'))->with('error', 'Admin password was not successfully edited');
        } 
        
    }
    
    public function destroy($id){
        
        $user = User::where('id' , '=', $id)->first(); 
        
        
        if ($user->delete()){
          return redirect(URL::to('admins-view?user=deleted==true'))->with('success', 'Admin was successfully deleted');
        }
        else{
          return redirect(URL::to('admins-view?user=deleted==false'))->with('error', 'Admin was not successfully deleted');    
        }            
        
    } 
    
    
}
