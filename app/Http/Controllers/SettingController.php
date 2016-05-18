<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use View;

class SettingController extends Controller
{
    
    public function index()
    {
          return View::make('backend/settings', array('title' => 'DS OBA | Settings'));
    }
    
    
}