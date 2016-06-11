<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserPermissionController;

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

class UserController extends Controller
{
    public function __construct()
	{        
        $this->middleware('user');
	}
    
    
    public function index()
    {   
        if (Session::has('user')) {
            $user = Session::get('user');
            if($user->role == 'user'){
                $username = $user->firstname.' '.$user->lastname;
                return View::make('userprofile', array('title' => $username));
            }
            else{
                 return redirect(URL::to('login')); 
            }
        }
        else{
            return redirect(URL::to('login')); 
        }
        
         
    }
    
    
    
    
}