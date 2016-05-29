<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Guest;

use View;

class GuestController extends Controller
{
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    public function index()
    {
        
         return View::make('backend/guests', array('title' => 'Guests'));
    }
}
