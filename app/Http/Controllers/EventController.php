<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;

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
use URL;

class EventController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    
    public function index()
    {
          $allevents = Event::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'p');
          $pubevents = Event::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'p');
          $unpevents = Event::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'p');

        

          return View::make('backend/events', array('title' => 'Events','events' => $allevents, 'all' => $allevents, 'active' => $pubevents,'inactive' => $unpevents));
    }
    
    public function create()
    {
          return View::make('backend/addevent', array('title' => 'Events | Add Event'));
    }
    
    public function uploadResource(){
        
        $resourceUploadPath = '/public/uploads/events/resources/';
        $resourcepath       = "";
        $resources          = Input::file('resource');    
        
        
        $resources_result = UploadController::upload($resources,$resourceUploadPath);
        if($resources_result['upload']){
          $resourceFiles =  $resources_result['filepaths'];
          $resourcepath  = end($resourceFiles);
          return array('resourcestate' => 'true' ,'resourcepath' => $resourcepath);
        }
        else{
          $resourceErrors =  $resources_result['error'];
          return array('resourcestate' => 'false' ,'resourcepath' => $resourceErrors);
        }
       
        
    }
    
    public function uploadImage(){
        
        $imageUploadPath = '/public/uploads/events/images/';
        $imagepath       = "";
        $files           = Input::file('image');
        
        $images_result = UploadController::upload($files,$imageUploadPath);
        
        if($images_result['upload']){
            $imageFiles  =  $images_result['filepaths'];
            $imagepath   =  end($imageFiles);
            return array('imagestate' => 'true' ,'imagepath' => $imagepath);
        }
        else{  
            $imageErrors = $images_result['error'];
            return array('imagestate' => 'false' ,'imagepath' => $imageErrors);
        }
        
    }
    
    public function store()
    {
        $resource_upload_result;
        $image_upload_result;
        
        $event = new Event;
        
        $event->title         = Input::get('title'); 
        $event->date          = Input::get('date'); 
        $event->time          = Input::get('time');
        $event->location      = Input::get('location');                  
        $event->description   = Input::get('description'); 
        
        if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $event->imagepath    = $image_upload_result['imagepath'];
            $event->imagestate   = $image_upload_result['imagestate'];
        } 
        
        if(Input::hasFile('resource')){
            $resource_upload_result = $this->uploadResource();
            $event->resourcepath  = $resource_upload_result['resourcepath'];
            $event->resourcestate = $resource_upload_result['resourcestate'];
        }
         

        if($event->save()){
            //save activity
            $activity_task = "Event : ".$event->title." has been added";
            $activity_type = "event";
            $connection_id = $event->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect('events-view?save=success==true')->with('success', 'Event was successfully added');
        }
        else{
            return redirect('events-view?save=success==false')->with('error', 'Event was not successfully added');
        }
        
    }
    
    public function edit($id){
        
        $event = Event::where('id' , '=', $id)->first();  
        
        return View::make('backend/editevent', array('title' => 'Events | Edit Event','event' => $event));
        
        
    }
    
    public function update($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        $event->title        = Input::get('title'); 
        $event->date         = Input::get('date'); 
        $event->time         = Input::get('time');
        $event->location     = Input::get('location');                  
        $event->description  = Input::get('description');
        
        if($event->save()){
            //save activity
            $activity_task = "Event : ".$event->title." details has been changed";
            $activity_type = "event";
            $connection_id = $event->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity            
            
            return redirect(URL::to('events-edit/'.$id.'?edit=success==true'))->with('success', 'Event was successfully edited');  
        }
        else{
            return redirect(URL::to('events-edit/'.$id.'?edit=success==false'))->with('error', 'Event was not successfully edited');
        }        
        
    }       
    
    public function updatestatus($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
                
        $event->status  = Input::get('status');
        
        if($event->save()){
            //save activity
            $activity_task = "Event : ".$event->title." status has been changed";
            $activity_type = "event";
            $connection_id = $event->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('events-edit/'.$id.'?status=changes==true'))->with('success', 'Event status was successfully edited');
        }
        else{
            return redirect(URL::to('events-edit/'.$id.'?status=changes==false'))->with('error', 'Event status was not successfully edited');           
        }        
        
    }
    
    public function setstatus($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
                
        $event->status  = Input::get('status');
        
        if($event->save()){
            //save activity
            $activity_task = "Event : ".$event->title." status has been changed";
            $activity_type = "event";
            $connection_id = $event->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('events-view?status=changes==true'))->with('success', 'Event status was successfully edited');
        }
        else{
            return redirect(URL::to('events-view?status=changes==false'))->with('error', 'Event status was not successfully edited');           
        }
        
    }
    
    public function updateimage($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        $image_upload_result;
        
        if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $event->imagepath    = $image_upload_result['imagepath'];
            $event->imagestate   = $image_upload_result['imagestate'];
            
            if($event->save()){
                //save activity
                $activity_task = "Event : ".$event->title." image has been added";
                $activity_type = "event";
                $connection_id = $event->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('events-edit/'.$id.'?image=changes==true'))->with('success', 'Event image was successfully edited');
            }
            else{
                return redirect(URL::to('events-edit/'.$id.'?image=changes==false'))->with('error', 'Event image was not successfully edited');           
            } 
        } 
        else{
            return redirect(URL::to('events-edit/'.$id.'?image=found==false'))->with('error', 'Please select an image to upload');           
        }
         
    }
    
    public function updateresource($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        $resource_upload_result;
        
        if(Input::hasFile('resource')){
            $resource_upload_result = $this->uploadResource();
            $event->resourcepath  = $resource_upload_result['resourcepath'];
            $event->resourcestate = $resource_upload_result['resourcestate'];        
            
            if($event->save()){
                //save activity
                $activity_task = "Event : ".$event->title." resourrce file has been added";
                $activity_type = "event";
                $connection_id = $event->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                
                return redirect(URL::to('events-edit/'.$id.'?resource=changes==true'))->with('success', 'Event resource file was successfully edited');
            }
            else{
                return redirect(URL::to('events-edit/'.$id.'?resource=changes==false'))->with('error', 'Event resource file was not successfully edited');           
            } 
        } 
        else{
            return redirect(URL::to('events-edit/'.$id.'?image=found==false'))->with('error', 'Please select an resource to upload');           
        }
        
        
    }
    
    public function destroy($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        $imagestate = $event->imagestate;
        $imagepath  = $event->imagepath;
                
        $resourcestate = $event->resourcestate;
        $resourcepath = $event->resourcepath;
        
        if($imagestate == "true"){
        UploadController::delete_file($imagepath);
        }
        if($resourcestate == "true"){
        UploadController::delete_file($resourcepath);
        }
            
        if ($event->delete()){
          //save activity
          $activity_task = "Event : ".$event->title." has been deleted";
          $activity_type = NULL;
          $connection_id = NULL;
          ActivityController::store($activity_task,$activity_type,$connection_id);
          //save activity

          return redirect(URL::to('events-view?event=deleted==true'))->with('success', 'Event was successfully deleted');
        }
        else{
          return redirect(URL::to('events-view?event=deleted==false'))->with('error', 'Event was not successfully deleted');    
        }            
        
    }   
        
    public function destroyimge($id){
        $event = Event::where('id' , '=', $id)->first(); 
        
        $imagepath = $event->imagepath;
        
        if(UploadController::delete_file($imagepath)){
            $event->imagepath  = "Image has been deleted";
            $event->imagestate = "false";

            if($event->save()){
                //save activity
                $activity_task = "Event : ".$event->title." image has been deleted";
                $activity_type = "event";
                $connection_id = $event->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('events-edit/'.$id.'?image=deleted==true'))->with('success', 'Event image was successfully deleted');
            }
            else{
                return redirect(URL::to('events-edit/'.$id.'?image=deleted==false'))->with('error', 'Event image was not successfully deleted');
            }
        }
        
    }
    
    public function destroyresource($id){
        $event = Event::where('id' , '=', $id)->first(); 
        
        $resourcepath = $event->resourcepath;
        
        if(UploadController::delete_file($resourcepath)){
                   
          $event->resourcepath  = "Resource file has been deleted";
          $event->resourcestate = "false";

          if($event->save()){
              //save activity
              $activity_task = "Event : ".$event->title." resource file has been deleted";
              $activity_type = "event";
              $connection_id = $event->id;
              ActivityController::store($activity_task,$activity_type,$connection_id);
              //save activity
              
              
              return redirect(URL::to('events-edit/'.$id.'?resource=deleted==true'))->with('success', 'Event resource file was successfully deleted');
          }
          else{
              return redirect(URL::to('events-edit/'.$id.'?image=resource==false'))->with('error', 'Event resource file was not successfully deleted');
          }
        }
        
    }    
    
    public function getpublished(){    
        
          $allevents = Event::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'p');
          $pubevents = Event::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'p');
          $unpevents = Event::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'p');


          return View::make('backend/events', array('title' => 'Events | Published','events' => $pubevents, 'all' => $allevents, 'active' => $pubevents,'inactive' => $unpevents));
        
    }
    
    public function getunpublished(){
        
         $allevents = Event::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'p');
         $pubevents = Event::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'p');
         $unpevents = Event::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'p');

         return View::make('backend/events', array('title' => 'Events | Unpublished','events' => $unpevents, 'all' => $allevents, 'active' => $pubevents,'inactive' => $unpevents));
        
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey');      
        
         $events = Event::where('title', 'LIKE', '%'.$searchkey.'%')->orWhere('date', 'LIKE', '%'.$searchkey.'%')->paginate(25); 
        
        
         $allevents = Event::paginate(25);  
         $pubevents = Event::where('status','=','on')->paginate(25); 
         $unpevents = Event::whereNull('status')->paginate(25);         
        
         return View::make('backend/events', array('title' => 'Events','events' => $events, 'all' => $allevents, 'active' => $pubevents,'inactive' => $unpevents));
        
        
    }
    
    public function downloadresource($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        $resourcepath = $event->resourcepath;
        return response()->download($resourcepath);
        
    }
    
    public static function getevents(){
        
         $events = Event::where('status' , '=', 'on')->get(); 
        
         return $events;
        
    }
    
    public static function getevent($id){
        
         $event = Event::where('id' , '=', $id)->first(); 
        
         return $event;
        
    }
    
    
}
