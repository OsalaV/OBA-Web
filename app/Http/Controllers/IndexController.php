<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
Use View;

class IndexController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
          return View::make('index', array('Title' => 'Home'));;
    }
}