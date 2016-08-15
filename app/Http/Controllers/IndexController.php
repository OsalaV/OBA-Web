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
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ResourceController;

use App\Event;
use App\Project;
use App\Member;
use App\Branch;
use App\Post;
use App\Slider;
use App\Resource;


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
use Crypt;


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
          $sliders    = SliderController::getsliders(); 
          $posts      = PostController::getposts(); 
          $topmembers = MemberController::gettopmembers();
        
          return View::make('index', array('title' => 'Home','sliders' => $sliders,'posts' => $posts,'topmembers' => $topmembers));
    }

    public function events()
    {
          $publicevents   =  EventController::getpublicevents(); 
          $schoolevents   =  EventController::getschoolevents(); 
          
          return View::make('events', array('title' => 'Events', 'pubevents' => $publicevents, 'schoolevents' => $schoolevents));
    }
    
    public function showpublicevent($title){
          
          $title = str_replace('_', ' ', $title);
        
          $event    =  EventController::getpublicevent($title); 
          $tickets  =  TicketController::getticketdetails($event->id); 
          return View::make('event', array('title' => $event->title, 'event' => $event, 'tickets' => $tickets));
    }
    
    public function showschoolevent($title){
          
          $title = str_replace('_', ' ', $title);
        
          $event       =  EventController::getschoolevent($title); 
          $eventimages =  EventController::geteventimages($event->id);
          $platinumadd =  ResourceController::getpaltinumadd();
          $goldadd     =  ResourceController::getgoldadd();
          $silveradd   =  ResourceController::getsilveradd();

        
          return View::make('schoolevent', array('title' => $event->title, 'event' => $event, 'eventimages' => $eventimages,'platinum' => $platinumadd,'gold' => $goldadd,'silver' => $silveradd));
        

        
    }

    public function psychoparade()
    {   
          $event       =  EventController::getparadedetails(); 
          $eventimages =  EventController::geteventimages($event->id);
          return View::make('parade', array('title' => $event->title, 'event' => $event, 'eventimages' => $eventimages));
    }

    public function projects()
    {
          $projects   =  ProjectController::getprojects(); 
          return View::make('projects', array('title' => 'Projects', 'projects' => $projects));
    }
    
    public function showproject($title){
        
          $title = str_replace('_', ' ', $title);
        
          $project       =  ProjectController::getproject($title); 
          $projectimages =  ProjectController::getprojectimages($project->id);
          return View::make('project', array('title' => $project->title, 'project' => $project, 'projectimages' => $projectimages));
    }

    public function members()
    {
          $committee = MemberController::getcommittee(); 
          $batchreps = MemberController::getbatchreps(); 
          return View::make('members', array('title' => 'Committee', 'committee' => $committee, 'batchreps' => $batchreps));
    }
    
    public function downloadprojectresource($encrypted){
        
        $id = Crypt::decrypt($encrypted);
        
        $project = Project::where('id' , '=', $id)->first(); 
        
        $resourcepath = $project->resourcepath;
        return response()->download($resourcepath);
        
    }
    
    public function downloadeventresource($encrypted){
        
        $id = Crypt::decrypt($encrypted);
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        $resourcepath = $event->resourcepath;
        return response()->download($resourcepath);
        
    }
    
    
    public function downloadresource($encrypted){
        
        $id = Crypt::decrypt($encrypted);
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
        $resourcepath = $resource->resourcepath;
        return response()->download($resourcepath);
        
    }
    
    public function batchreps()
    {
          $batchreps = MemberController::getbatchreps(); 
          return View::make('batchreps', array('title' => 'Batch Representatives', 'batchreps' => $batchreps));
    }
    
    public function pastpresidents()
    {
          $presidents = MemberController::getpastpresidents(); 
          return View::make('presidents', array('title' => 'Past Presidents', 'presidents' =>$presidents));
    }

    public function membership()
    {
          $membership = ResourceController::getmembershipform();
          return View::make('membership', array('title' => 'Membership', 'membership' => $membership));
    }

    public function contact()
    {
          $branches   =  BranchController::getbranches(); 
          return View::make('contact', array('title' => 'Contact Us', 'branches' => $branches));
    }    
    
    public function showpost($title){    
        
        $title = str_replace('_', ' ', $title);   
        $post   =  PostController::getpost($title); 
        return View::make('post', array('title' => $post->title, 'post' => $post));
        
    }
    
    public function userlogin(){
        return View::make('guestregestration', array('title' => 'Login'));
    }
    
    public function authtickets($id){
        
        if (Session::has('user')) {
            return redirect(URL::to('events-show/'.$id)); 
        }
        else{
            return redirect(URL::to('login')); 
        }
        
        
    }
    
    
    
    
    
    
    
    
}