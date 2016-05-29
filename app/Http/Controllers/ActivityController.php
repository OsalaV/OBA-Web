<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\User;
use App\Http\Controllers\Controller;


use App\Activity;

use View;
use Session;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;
use DB;


class ActivityController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    
    public function index()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')   
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'Activities', 'activities' => $activities));
    }
    
    public static function store($activity_task,$type,$id){
        
        $activity = new Activity;
        
        $activity->activity = $activity_task;
        $activity->type     = $type;
        $activity->users_id = Session::get('user')->id;
        $activity->referenced_id = $id;
        
        
        if($activity->save()){
            return true;
        }
        else{
            return false;
        }
        
    }
    
    public function view($type,$id){
        
        $url = '';
        
        
        switch ($type) {
            case "post":
                $url = 'posts-edit/'.$id;break;
            case "event":
                $url = 'events-edit/'.$id;break;
            case "project":
                $url = 'projects-edit/'.$id;break;            
            case "member":
                $url = 'members-edit/'.$id;break; 
            case "slider":
                $url = 'imageslider';break;
            case "branch":
                $url = 'branches-edit/'.$id;break; 
            case "resource":
                $url = 'resources-edit/'.$id;break; 
            
        }
        
        return redirect($url);
        
    }
    
    public function recentactivities()
    {
        $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')   
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'Activities', 'activities' => $activities));
        
        
//         $activities = DB::table('activities')
//                       ->join('users', 'activities.users_id', '=', 'users.id')
//                       ->where('created_at', '>=', Carbon::now()->subMonth())
//                       ->select('*')
//                       ->orderBy('activities.id','desc')->get();
//        
//         return View::make('backend/activities', array('title' => 'Activities | Recent', 'activities' => $activities));
    }
    
    public function postactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'post')
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'Activities | Posts', 'activities' => $activities));
    }
    
    public function eventactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'event')
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'Activities | Events', 'activities' => $activities));
    }
    
    public function projectactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'project')
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'Activities | Projects', 'activities' => $activities));
    }
    
    public function memberactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'member')
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'Activities | Members', 'activities' => $activities));
    }
    
    public function slideractivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'slider')
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'Activities | Sliders', 'activities' => $activities));
    }
    
    public function branchactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'branch')
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'Activities | Branches', 'activities' => $activities));
    }
    
    public function resourceactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'resource')
                       ->select('*')
                       ->orderBy('activities.id','desc')->get();
        
         return View::make('backend/activities', array('title' => 'Activities | Resources', 'activities' => $activities));
    }
    
    
    
}