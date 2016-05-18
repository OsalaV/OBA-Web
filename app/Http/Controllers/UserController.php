<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;

use Illuminate\Support\Facades\Request;

use App\User;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;

class UserController extends Controller
{
    
    public function index()
    {
          $users = User::all();          
          
          return View::make('backend/users', array('title' => 'Users','users' => $users));
    }
    
}