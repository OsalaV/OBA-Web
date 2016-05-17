<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use View;

class DashboardController extends Controller
{
    
    public function index()
    {
          return View::make('backend/dashboard', array('title' => 'Dashboard'));;
    }
    
    
}