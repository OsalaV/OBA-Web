<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use App\Event;

use View;




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
          return View::make('index', array('title' => 'Home'));;
    }

    public function events()
    {
         $events = Event::where('status' , '=', "on")->get();
         return View::make('events', array('title' => 'Events', 'events' => $events));
    }

    public function parade()
    {
          return View::make('parade', array('title' => 'Parade'));;
    }

    public function projects()
    {
          return View::make('projects', array('title' => 'Projects'));;
    }

    public function committe()
    {
          return View::make('presidents', array('title' => 'Presidents'));;
    }

    public function membership()
    {
          return View::make('membership', array('title' => 'Membership'));;
    }

    public function contact()
    {
          return View::make('contact', array('title' => 'Contact Us'));;
    }

    public function members()
    {
          return View::make('members', array('title' => 'Members'));;
    }

    public function presidents()
    {
          return View::make('presidents', array('title' => 'Presidents'));;
    }
    
    public function showevent($id){
        
        $event = Event::where('id' , '=', $id)->first();
        
        return View::make('event', array('title' => $event->title, 'event' => $event));
    }
    
    
    
}