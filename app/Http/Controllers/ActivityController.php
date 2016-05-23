<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use App\Activity;

use View;
use DB;

class ActivityController extends Controller
{
    
    public function index()
    {
         $activities = DB::table('activities')
                       ->join('admins', 'activities.admin_id', '=', 'admins.id')   
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'DS OBA | Activities', 'activities' => $activities));
    }
    
    public static function store($activity_task,$type,$id){
        
        $activity = new Activity;
        
        $activity->activity = $activity_task;
        $activity->admin_id = 1;
        //get admin id using session later
        switch ($type) {
            case "event":
                $activity->events_id = $id;
                break;
            case "slider":
                $activity->sliders_id = $id;
                break;
            case "project":
                $activity->projects_id = $id;
                break;
            case "post":
                $activity->posts_id = $id;
                break;
            case "member":
                $activity->members_id = $id;
                break;
            case "branch":
                $activity->branches_id = $id;
                break;
            case "resource":
                $activity->resources_id = $id;
                break;              
        }
        
        
        if($activity->save()){
            return true;
        }
        else{
            return false;
        }
        
    }
    
    public function viewlogall($type,$id){
        
        $column = "";
        $referenced_table  = '';
        $referenced_column = '';
        
        switch ($type) {
            case "event":
                $column = "activities.events_id";
                $referenced_table = 'events';
                $selecting_column = 'events.created_at';break;
            case "slider":
                $column = "activities.sliders_id";
                $referenced_table = 'sliders';
                $selecting_column = 'sliders.created_at';break;
            case "project":
                $column = "activities.projects_id";
                $referenced_table = 'projects';
                $selecting_column = 'projects.created_at';break;
            case "post":
                $column = "activities.posts_id";
                $referenced_table = 'posts';
                $selecting_column = 'posts.created_at';break;
            case "member":
                $column = "activities.members_id";
                $referenced_table = 'members';
                $referenced_column= 'members.created_at';break;
            case "branch":
                $column = "activities.branches_id";
                $referenced_table = 'branches';
                $selecting_column = 'branches.created_at';break;
            case "resource":
                $column = "activities.resources_id";
                $referenced_table = 'resources';
                $selecting_column = 'resources.created_at';break;              
        }
        
        
        $logdetails = DB::table('activities')
                      ->join('admins', 'activities.admin_id', '=', 'admins.id')   
                      ->where($column , '=', $id)
                      ->select('activities.activity', 'activities.updated_at', 'admins.fullname')
                      ->orderBy('activities.id','desc')->get();
       
        $hostdetails = DB::table($referenced_table)->select($selecting_column)->where('id' , '=', $id)->first();
        
        
        return View::make('backend/activitylog', array('title' => 'DS OBA | Activity Log', 'type' => $type, 'id' => $id, 'logdata' => $logdetails, 'hostdata' => $hostdetails));
        
    }
    
    
    public function viewloglast($type,$id){
        
        $column = "";
        $referenced_table  = '';
        $referenced_column = '';
        
        switch ($type) {
            case "event":
                $column = "activities.events_id";
                $referenced_table = 'events';
                $selecting_column = 'events.created_at';break;
            case "slider":
                $column = "activities.sliders_id";
                $referenced_table = 'sliders';
                $selecting_column = 'sliders.created_at';break;
            case "project":
                $column = "activities.projects_id";
                $referenced_table = 'projects';
                $selecting_column = 'projects.created_at';break;
            case "post":
                $column = "activities.posts_id";
                $referenced_table = 'posts';
                $selecting_column = 'posts.created_at';break;
            case "member":
                $column = "activities.members_id";
                $referenced_table = 'members';
                $referenced_column= 'members.created_at';break;
            case "branch":
                $column = "activities.branches_id";
                $referenced_table = 'branches';
                $selecting_column = 'branches.created_at';break;
            case "resource":
                $column = "activities.resources_id";
                $referenced_table = 'resources';
                $selecting_column = 'resources.created_at';break;              
        }
        
        
        $logdetails = DB::table('activities')
                      ->join('admins', 'activities.admin_id', '=', 'admins.id')  
                      ->where($column , '=', $id)
                      ->select('activities.activity', 'activities.updated_at', 'admins.fullname')
                      ->orderBy('activities.id','desc')->first();
        
        $hostdetails = DB::table($referenced_table)->select($selecting_column)->where('id' , '=', $id)->first();

        return View::make('backend/activitylog', array('title' => 'DS OBA | Activity Log', 'type' => $type, 'id' => $id, 'logdata' => $logdetails, 'hostdata' => $hostdetails));
        
    }
    
    
}