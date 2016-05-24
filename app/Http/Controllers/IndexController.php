<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use App\Event;
use App\Project;
use App\Member;
use App\Branch;
use App\Post;

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
          $presidents = Member::where([['status' , '=', "on"],['type' , '=', "Committee Member"],['post' , '=', "President"],])->first();
          $principals = Member::where([['status' , '=', "on"],['type' , '=', "Committee Member"],['post' , '=', "Principal"],])->first();
          $secretarys  = Member::where([['status' , '=', "on"],['type' , '=', "Committee Member"],['post' , '=', "General Secretary "],])->first();
          $posts = Post::where('status' , '=', "on")->get();
          return View::make('index', array('title' => 'Home' , 'posts' => $posts , 'presidents' => $presidents , 'principals' => $principals , 'secretarys' => $secretarys));;
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
          $projects = Project::where('status' , '=', "on")->get();
          return View::make('projects', array('title' => 'Projects', 'projects' => $projects));;
    }

//    public function committe()
//    {
//          return View::make('presidents', array('title' => 'Presidents', 'members' => $members));;
//    }

    public function membership()
    {
          return View::make('membership', array('title' => 'Membership'));;
    }

    public function contact()
    {
          $branches = Branch::where('status' , '=', "on")->get();
          return View::make('contact', array('title' => 'Contact Us', 'branches' => $branches));;
    }

    public function members()
    {
          $batchreps = Member::where([['status' , '=', "on"],['type' , '=', "Batch Representer"],])->get();
          $members = Member::where([['status' , '=', "on"],['type' , '=', "Committee Member"],])->get();
          return View::make('members', array('title' => 'Members', 'members' => $members, 'batchreps' =>$batchreps));;
    }

    public function presidents()
    {
          $presidents = Member::where([['status' , '=', "on"],['type' , '=', "Past President"],])->get();
          return View::make('presidents', array('title' => 'Presidents', 'presidents' =>$presidents));;
    }
    
    public function showevent($id){
        
        $event = Event::where('id' , '=', $id)->first();
        
        return View::make('event', array('title' => $event->title, 'event' => $event));
    }
    
    public function showproject($id){
        
        $project = Project::where('id' , '=', $id)->first();
        
        return View::make('project', array('title' => $project->title, 'project' => $project));
    }
    
    public function showpost($id){
        
        $post = Post::where('id' , '=', $id)->first();
        
        return View::make('post', array('title' => $post->title, 'post' => $post));
    }
    
    
    
}