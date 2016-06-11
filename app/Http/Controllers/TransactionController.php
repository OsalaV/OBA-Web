<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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

class TransactionController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    public function index(){
        return View::make('backend/users', array('title' => 'Users', 'users' => $users));
    }
    
    
    
}
