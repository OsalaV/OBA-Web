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
    
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    public function index()
    {
         $permissions = Permission::all(); 
        
         return View::make('backend/permissions', array('title' => 'Admin Permissions', 'permissions' => $permissions));
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
