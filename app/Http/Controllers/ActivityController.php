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
        $this->middleware('admin');
	}
    
    
    public function index()
    {       
        
         $activities   = DB::table('activities')
                         ->join('users', 'activities.users_id', '=', 'users.id')   
                         ->select('activities.activity',
                                  'activities.type',
                                  'activities.updated_at',
                                  'users.firstname',
                                  'users.lastname',
                                  'activities.referenced_id'
                                 )
                         ->orderBy('activities.id','desc')->paginate(25, ['*'], 'page');
        
        
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
        
        $today     = Carbon::now();         
        $yesterday = Carbon::yesterday();        
        
        $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id') 
                       ->whereBetween('activities.updated_at', array($yesterday, $today))
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.updated_at','desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/activities', array('title' => 'Activities', 'activities' => $activities));

    }
    
    public function postactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'post')
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.id','desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/activities', array('title' => 'Activities | Posts', 'activities' => $activities));
    }
    
    public function eventactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'event')
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.id','desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/activities', array('title' => 'Activities | Events', 'activities' => $activities));
    }
    
    public function projectactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'project')
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.id','desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/activities', array('title' => 'Activities | Projects', 'activities' => $activities));
    }
    
    public function memberactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'member')
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.id','desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/activities', array('title' => 'Activities | Members', 'activities' => $activities));
    }
    
    public function slideractivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'slider')
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.id','desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/activities', array('title' => 'Activities | Sliders', 'activities' => $activities));
    }
    
    public function branchactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'branch')
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.id','desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/activities', array('title' => 'Activities | Branches', 'activities' => $activities));
    }
    
    public function resourceactivities()
    {
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('type', '=', 'resource')
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.id','desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/activities', array('title' => 'Activities | Resources', 'activities' => $activities));
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey');      
        
         $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id')
                       ->where('users.firstname', 'LIKE', '%'.$searchkey.'%')
                       ->orWhere('users.lastname', 'LIKE', '%'.$searchkey.'%')    
                       ->orWhere('activities.updated_at', 'LIKE', '%'.$searchkey.'%')
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.id','desc')->paginate(25, ['*'], 'page');
       
        
         return View::make('backend/activities', array('title' => 'Activities', 'activities' => $activities));
        
        
    }
    
    public function destroy(){
        
        if(DB::table('activities')->truncate()){
            return redirect(URL::to('activities-view?records=deleted==true'));
        }
        else{
            return redirect(URL::to('activities-view?records=deleted==false'));
        }
        
    }
    
    public static function getrecent()
    {
        //get recent activities into dashboard   
        $today     = Carbon::now();         
        $yesterday = Carbon::yesterday();        
        
        $activities = DB::table('activities')
                       ->join('users', 'activities.users_id', '=', 'users.id') 
                       ->whereBetween('activities.updated_at', array($yesterday, $today))->where('type', '=', 'event')->orWhere('type', '=', 'project')->orWhere('type', '=', 'post')->orWhere('type', '=', 'member')
                       ->select('activities.activity',
                                'activities.type',
                                'activities.updated_at',
                                'users.firstname',
                                'users.lastname',
                                'activities.referenced_id'
                                )
                       ->orderBy('activities.updated_at','desc')->take(10)->get();
        
         return $activities;

    }
    
    
    
}