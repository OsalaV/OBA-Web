<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PermissionController;

use App\UserPermission;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;
use DB;

class UserPermissionController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    public static function setdefaultpermissions($userid){
        
        $permissions = PermissionController::getpermissions();
        $permission_count = count($permissions);
        
        for($i=0;$i<$permission_count;$i++){
            
            $permission = new UserPermission;
            
            if($permissions[$i]->priority == "default"){
                
                $permission->users_id       = $userid;
                $permission->permissions_id = $permissions[$i]->id;
                $permission->status         = "on";
                
            }
            else{
                $permission->users_id       = $userid;
                $permission->permissions_id = $permissions[$i]->id;
            }
            
            $permission->save();
            
        }
        
    }
    
    public static function setpermissions($userid){
        
        $permissions = PermissionController::getpermissions();
        $permission_count = count($permissions);
        
        for($i=0;$i<$permission_count;$i++){
            
            $permission = new UserPermission;
            
            $permission->users_id       = $userid;
            $permission->permissions_id = $permissions[$i]->id;
            $permission->status         = NULL;                
            
            $permission->save();
            
        }
        
    }
    
    public static function getuserpermissions($userid){
        
        $permissions = DB::table('user_permissions')
                      ->join('users', 'user_permissions.users_id', '=', 'users.id')
                      ->join('permissions', 'user_permissions.permissions_id', '=', 'permissions.id')
                      ->where('user_permissions.users_id' , '=', $userid)
                      ->select('permissions.permission', 'user_permissions.status', 'user_permissions.permissions_id')->get();
        
        return $permissions;
    }
    
    public static function updateuserpermissions($userid,$permissions){
        
        $permission_count  = count($permissions);
        $found = false;
        
        $user_permissions = UserPermission::where('users_id' , '=', $userid)->get();
        
        $all_permissions_count = count($user_permissions);
        
        for($i=0;$i<$all_permissions_count;$i++){
            
            $permission_id = $user_permissions[$i]->permissions_id;
            
            for($j=0;$j<$permission_count;$j++){
                $selected_id = $permissions[$j];
                if($permission_id == $selected_id){
                    $found = true;
                    break;
                }
            }
            
            if($found){ 
                DB::table('user_permissions')->where('users_id', $userid)->where('permissions_id', $permission_id)->update(['status' => "on"]);

                $found = false;
            }
            else{
                DB::table('user_permissions')->where('users_id', $userid)->where('permissions_id', $permission_id)->update(['status' => NULL]);
            }
        }
        
        return true;
        
    }
    
    
}
