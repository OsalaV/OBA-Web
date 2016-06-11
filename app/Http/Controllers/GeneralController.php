<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;

class GeneralController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    public function index()
    {
          return View::make('backend/generalsettings', array('title' => 'General Settings'));
    }
    
    
    
}
