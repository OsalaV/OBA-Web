<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ActivityController;

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

class DashboardController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    
    public function index()
    {
        $recentactivities = ActivityController::getrecent();
        return View::make('backend/dashboard', array('title' => 'Dashboard', 'recentactivities' => $recentactivities));
    }
    
    
    
    
}