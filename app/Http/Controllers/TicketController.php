<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;


use Illuminate\Support\Facades\Request;

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

class TicketController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    
    public function index()
    {        
        return View::make('backend/tickets', array('title' => 'Tickets'));
    }
    
    public function create(){
        return View::make('backend/addtickets', array('title' => 'Tickets | Add Tickets'));
    }
    
    
    public function edit()
    {        
        return View::make('backend/viewticket', array('title' => 'Tickets Management'));
    }
    
}