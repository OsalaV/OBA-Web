<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;

use Illuminate\Support\Facades\Request;

use App\Event;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;

class EventController extends Controller
{
    
    public function index()
    {
          $events = Event::all(); 
          $allcount    = Event::all()->count(); 
          $activecount = Event::where('status','=','on')->count(); 
          $inactivecount = Event::whereNull('status')->count(); 
          
          return View::make('backend/events', array('title' => 'Events','events' => $events,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' => $inactivecount));
    }
    
    public function create()
    {
          return View::make('backend/addevent', array('title' => 'Add Event'));
    }
    
    public function store()
    {
        
           $file = Input::file('coverimage');
           $destinationPath = 'uploads/events/images/';
        
           $result = UploadController::singleUpload($file,$destinationPath);
        
           if($result['upload']){
                   
                 $event = new Event;
        
                 $event->title        = Input::get('title'); 
                 $event->date         = Input::get('date'); 
                 $event->time         = Input::get('time');
                 $event->location     = Input::get('location');                  
                 $event->description  = Input::get('description');   
                 $event->eventimage   = $result['filepath'];
               
                 if($event->save()){
                    return Redirect::to('events-add?save=success==true');    
                 }
                 else{
                    return Redirect::to('/events-add?save=success==false');
                 }
               
               
           }
           else{
               
               return Redirect::to('/events-add?upload=success==false');
           }

    }
    
    public function edit($id){
        
        $event = Event::where('id' , '=', $id)->first();  
        
        return View::make('backend/editevent', array('title' => 'Edit Event','event' => $event));
        
        
    }
    
    public function update($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        $event->title        = Input::get('title'); 
        $event->date         = Input::get('date'); 
        $event->time         = Input::get('time');
        $event->location     = Input::get('location');                  
        $event->description  = Input::get('description');
        
        if($event->save()){
            return Redirect::to('events-view?edit=success==true');    
        }
        else{
            return Redirect::to('/events-view?edit=success==false');
        }        
        
    }
    
    public function destroy($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        if (File::exists($event->eventimage))
        {           
           if(File::delete($event->eventimage)){
               if ($event->delete()){
                   return Redirect::to('events-view?delete=success==true');    
               }
               else{
                   return Redirect::to('events-view?delete=success==false');    
               }
           }
           else{
               return Redirect::to('events-view?file=delete==false');
           }
            
           

        }
        else{
            return Redirect::to('events-view?file=exists==false');    
        }
        
        
        
    }
    
    public function updatestatus($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
                
        $event->status  = Input::get('status');
        
        if($event->save()){
            return Redirect::to('events-edit/'.$id);   
         
        }
        else{
            return Redirect::to('events-edit/'.$id);
           
        }        
        
    }
    
    public function getpublished(){
        
         $events = Event::where('status','=','on')->get();          
        
         $allcount    = Event::all()->count(); 
         $activecount = Event::where('status','=','on')->count(); 
         $inactivecount = Event::whereNull('status')->count(); 
          
         return View::make('backend/events', array('title' => 'Events | Published','events' =>  $events,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' =>  $inactivecount));
        
    }
    
    public function getunpublished(){
        
         $events = Event::whereNull('status')->get(); 
         
         $allcount    = Event::all()->count(); 
         $activecount = Event::where('status','=','on')->count(); 
         $inactivecount = Event::whereNull('status')->count(); 
          
         return View::make('backend/events', array('title' => 'Events | Unpublished','events' =>  $events,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' =>  $inactivecount));
        
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey'); 
         
         $events = Event::where('title','=',$searchkey)->orWhere('date','=',$searchkey)->get();          
        
         $allcount    = Event::all()->count(); 
         $activecount = Event::where('status','=','on')->count(); 
         $inactivecount = Event::whereNull('status')->count(); 
          
         return View::make('backend/events', array('title' => 'Events','events' =>  $events,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' =>  $inactivecount));
        
    }
    
    
    
    
}
