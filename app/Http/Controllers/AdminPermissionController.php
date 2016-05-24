<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PermissionController;

use App\AdminPermission;

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

class AdminPermissionController extends Controller
{
    
    public static function setdefaultpermissions($adminid){
        
        $permissions = PermissionController::getpermissions();
        $permission_count = count($permissions);
        
        for($i=0;$i<$permission_count;$i++){
            
            $permission = new AdminPermission;
            
            if($permissions[$i]->priority == "default"){
                
                $permission->admins_id      = $adminid;
                $permission->permissions_id = $permissions[$i]->id;
                $permission->status         = "on";
                
            }
            else{
                $permission->admins_id      = $adminid;
                $permission->permissions_id = $permissions[$i]->id;
            }
            
            $permission->save();
            
        }
        
    }
    
    public static function getadminpermissions($adminid){
        
        $permissions = DB::table('admin_permissions')
                      ->join('admins', 'admin_permissions.admins_id', '=', 'admins.id')
                      ->join('permissions', 'admin_permissions.permissions_id', '=', 'permissions.id')
                      ->where('admin_permissions.admins_id' , '=', $adminid)
                      ->select('permissions.permission', 'admin_permissions.status', 'admin_permissions.permissions_id')->get();
        
        return $permissions;
    }
    
    public static function updateadminpermissions($adminid,$permissions){
        
        $permission_count  = count($permissions);
        $success_count = 0;
        $found = false;
        
        $admin_permissions = AdminPermission::where('admins_id' , '=', $adminid)->get();
        
        $all_permissions_count = count($admin_permissions);
        
        for($i=0;$i<$all_permissions_count;$i++){
            
            $permission_id = $admin_permissions[$i]->permissions_id;
            
            for($j=0;$j<$permission_count;$j++){
                $selected_id = $permissions[$j];
                if($permission_id == $selected_id){
                    $found = true;
                    break;
                }
            }
            
            if($found){  
                
                DB::table('admin_permissions')->where('admins_id', $adminid)->where('permissions_id', $permission_id)->update(['status' => "on"]);

                $found = false;
            }
            else{
                DB::table('admin_permissions')->where('admins_id', $adminid)->where('permissions_id', $permission_id)->update(['status' => NULL]);
            }
            
            
                
       
            
        }
        
    }
    
    
}
