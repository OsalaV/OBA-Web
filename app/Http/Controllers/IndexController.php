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

    public function events()
    {
          return View::make('events', array('Title' => 'Events'));;
    }

    public function parade()
    {
          return View::make('parade', array('Title' => 'Parade'));;
    }

    public function project()
    {
          return View::make('projects', array('Title' => 'Members'));;
    }

    public function committe()
    {
          return View::make('presidents', array('Title' => 'Presidents'));;
    }

    public function membership()
    {
          return View::make('membership', array('Title' => 'Membership'));;
    }

    public function contact()
    {
          return View::make('contact', array('Title' => 'Contact Us'));;
    }

    public function members()
    {
          return View::make('members', array('Title' => 'Members'));;
    }

    public function presidents()
    {
          return View::make('presidents', array('Title' => 'Presidents'));;
    }
}