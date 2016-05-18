<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;

class SliderController extends Controller
{
    
    public function index()
    {
          return View::make('backend/slidersettings', array('title' => 'DS OBA | Slider Settings'));
    }
    
    public function store()
    {
        
           

    }
    
    
    
    
}