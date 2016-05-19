<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use App\Activity;

use View;

class ActivityController extends Controller
{
    
    public function index()
    {
//          return View::make('backend/dashboard', array('title' => 'Dashboard'));
    }
    
    public static function store($activity_task){
        
        $activity = new Activity;
        
        $activity->activity = $activity_task;
        $activity->admin_id = 1;
        
        if($activity->save()){
            $activityID = $activity->id;
            return $activityID;
        }
        
    }
    
    
}