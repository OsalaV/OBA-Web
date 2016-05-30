<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\MemberController;


use App\Event;
use App\Project;
use App\Member;
use App\Branch;
use App\Post;
use App\Slider;


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
          $sliders =  SliderController::getsliders(); 
          $posts   =  PostController::getposts(); 
        
          return View::make('index', array('title' => 'Home','sliders' => $sliders,'posts' => $posts));
    }

    public function events()
    {
          $events   =  EventController::getevents(); 
          return View::make('events', array('title' => 'Events', 'events' => $events));
    }
    
    public function showevent($id){
          $event    =  EventController::getevent($id); 
          return View::make('event', array('title' => $event->title, 'event' => $event));
    }

    public function parade()
    {
          return View::make('parade', array('title' => 'Psycho Parade'));
    }

    public function projects()
    {
          $projects   =  ProjectController::getprojects(); 
          return View::make('projects', array('title' => 'Projects', 'projects' => $projects));
    }
    
    public function showproject($id){
          $project   =  ProjectController::getproject($id); 
          return View::make('project', array('title' => $project->title, 'project' => $project));
    }

    public function members()
    {
          $committee = MemberController::getcommittee(); 
          $batchreps = MemberController::getbatchreps(); 
          return View::make('members', array('title' => 'Committee', 'committee' => $committee, 'batchreps' => $batchreps));
    }
    
    public function pastpresidents()
    {
          $presidents = MemberController::getpastpresidents(); 
          return View::make('presidents', array('title' => 'Presidents', 'presidents' =>$presidents));
    }

    public function membership()
    {
          return View::make('membership', array('title' => 'Membership'));
    }

    public function contact()
    {
          $branches   =  BranchController::getbranches(); 
          return View::make('contact', array('title' => 'Contact Us', 'branches' => $branches));
    }    
    
    public function showpost($id){        
        $post   =  PostController::getpost($id); 
        return View::make('post', array('title' => $post->title, 'post' => $post));
        
    }
    
    
    
}