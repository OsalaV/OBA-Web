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

class GuestController extends Controller
{
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    public function index()
    {
         $users = User::where('role' , '=', 'user')->orderBy('id', 'desc')->paginate(25, ['*'], 'page'); 
         return View::make('backend/guests', array('title' => 'Guests', 'users' => $users));
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey');      
        
         $users = User::where('nic', 'LIKE', '%'.$searchkey.'%')->orderBy('id', 'desc')->paginate(25); 
       
        
         return View::make('backend/guests', array('title' => 'Guests','users' => $users));
        
        
    }
    
    
}
