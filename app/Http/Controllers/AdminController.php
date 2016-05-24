<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminPermissionController;

use App\Admin;


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
    
    public function index()
    {
         $admins = Admin::all()->sortByDesc("id"); 
        
         return View::make('backend/admins', array('title' => 'DS OBA | Administrators', 'admins' => $admins));
    }
    
    public function create()
    {
         return View::make('backend/addadmin', array('title' => 'DS OBA | Add Admin'));
    }
    
    public function store()
    {
        
        $admin = new Admin;
        
        $admin->fullname         = Input::get('fullname'); 
        $admin->email            = Input::get('email'); 
        $admin->password         = Hash::make(Input::get('password'));
        $admin->contact          = Input::get('contact'); 
        $admin->role             = Input::get('role');   
        $admin->status           = Input::get('status');         
        
        $default_permissions     = Input::get('permissions'); 
        
        if($admin->save()){ 
            $adminid = $admin->id;
            
            if($default_permissions == "on"){
                AdminPermissionController::setdefaultpermissions($adminid);       
            }
            
            return redirect('admins-add?save=success==true')->with('success', 'Admin was successfully added');
        }
        else{
            return redirect('admins-add?save=success==false')->with('error', 'Admin was not successfully added');
        }
        
    }
    
    public function edit($id){
        
        $admin = Admin::where('id' , '=', $id)->first();  
        $adminpermissions = AdminPermissionController::getadminpermissions($id);       
        
        return View::make('backend/editadmin', array('title' => 'DS OBA | Edit Admin','admin' => $admin, 'adminpermissions' => $adminpermissions));
        
        
    }
    
    public function update($id){
        
        $admin = Admin::where('id' , '=', $id)->first(); 
        
        $admin->fullname         = Input::get('fullname'); 
        $admin->email            = Input::get('email'); 
        $admin->contact          = Input::get('contact'); 
        $admin->role             = Input::get('role');  
        $admin->accesslevel      = Input::get('accesslevel');  
        $admin->status           = Input::get('status');                   
        
        if($admin->save()){
            return redirect(URL::to('admins-edit/'.$id.'?edit=success==true'))->with('success', 'Admin was successfully edited');  
        }
        else{
            return redirect(URL::to('admins-edit/'.$id.'?edit=success==false'))->with('error', 'Admin was not successfully edited');
        }        
        
    } 
    
    public function updatepermissions($id){
        
        $permissions = Input::get('status');
            
        $result = AdminPermissionController::updateadminpermissions($id,$permissions);   
            
//        if($result){
//            return redirect(URL::to('admins-edit/'.$id.'?edit=permissions==true'))->with('success', 'Admin permissions was successfully edited');   
//        }
//        else{
//            return redirect(URL::to('admins-edit/'.$id.'?edit=permissions==false'))->with('error', 'Admin permissions was not successfully edited');   
//        }
        
    }
    
    public function destroy($id){
        
        $admin = Admin::where('id' , '=', $id)->first(); 
        
        
        if ($admin->delete()){
          return redirect(URL::to('admins-view?event=deleted==true'))->with('success', 'Admin was successfully deleted');
        }
        else{
          return redirect(URL::to('admins-view?event=deleted==false'))->with('error', 'Admin was not successfully deleted');    
        }            
        
    }   
    
    
    
}
