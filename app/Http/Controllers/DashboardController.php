<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $this->middleware('auth');
	}
    
    
    public function index()
    {
        return View::make('backend/dashboard', array('title' => 'Dashboard'));
    }
    
    
}