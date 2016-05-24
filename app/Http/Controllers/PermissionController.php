<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Permission;


use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;

class PermissionController extends Controller
{
    
    public function index()
    {
         $permissions = Permission::all(); 
        
         return View::make('backend/permissions', array('title' => 'DS OBA | Admin Permissions', 'permissions' => $permissions));
    }
    
    public function store(){
        
        $permission = new Permission;
        
        $permission->permission      = Input::get('permission');
        $permission->priority   = Input::get('priority');        
        
        
        if($permission->save()){            
            return redirect('permissions-view?save=success==true')->with('success', 'Permission was successfully added');
        }
        else{
            return redirect('permissions-view?save=success==false')->with('error', 'Permission was not successfully added');
        }
        
        
    }
    
    
    public function destroy($id){
        
        $permission = Permission::where('id' , '=', $id)->first(); 
            
        if ($permission->delete()){
          return redirect(URL::to('permissions-view?permissions=deleted==true'))->with('success', 'Permission was successfully deleted');
        }
        else{
          return redirect(URL::to('permissions-view?permissions=deleted==false'))->with('error', 'Permission was not successfully deleted');    
        }            
        
    }   
    
    public static function getdefaultpermissions(){
        
        $permissions = Permission::where('priority' , '=', 'default')->get(); 
        
        return $permissions;
        
    }
    
    public static function getpermissions(){
        
        $permissions = Permission::all(); 
        
        return $permissions;
        
    }
    
}
