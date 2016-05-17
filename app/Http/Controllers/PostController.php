<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use View;

class PostController extends Controller
{
    
    public function index()
    {
          return View::make('backend/posts', array('title' => 'Posts'));;
    }
    
    
}