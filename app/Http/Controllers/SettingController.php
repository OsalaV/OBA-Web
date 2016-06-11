<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use View;

class SettingController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    public function index()
    {
          return View::make('backend/settings', array('title' => 'Settings'));
    }
    
    
}