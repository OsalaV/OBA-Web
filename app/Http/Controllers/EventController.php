<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;

use Illuminate\Support\Facades\Request;

use App\Event;
use App\EventImage;


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
        $this->middleware('admin');
	}
    
    
    public function index()
    {
          $allevents = Event::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $pubevents = Event::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $unpevents = Event::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');

          return View::make('backend/events', array('title' => 'Events','events' => $allevents, 'all' => $allevents, 'active' => $pubevents,'inactive' => $unpevents));
    }
    
    public function create()
    {
          return View::make('backend/addevent', array('title' => 'Events | Add Event'));
    }
    
    public function uploadResource(){
        
        $resourceUploadPath = 'uploads/events/resources/';
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
        
        $imageUploadPath = 'uploads/events/covers/';
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
    
    public function uploadImageAlbum(){
        
        $imageUploadPath = 'uploads/events/images/';
        $imagepath       = "";
        $files           = Input::file('eventimages');
        
        $images_result = UploadController::upload($files,$imageUploadPath);
        
        if($images_result['upload']){
            $imageFiles  =  $images_result['filepaths'];  
            return array('imagestate' => 'true' ,'imagepath' => $imageFiles);
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
        $album_upload_result;
        
        $event = new Event;
        
        $event->title         = Input::get('title');
        $event->type          = Input::get('type');
        $event->month         = Input::get('month'); 
        $event->day           = Input::get('day'); 
        $event->year          = Input::get('year'); 
        $event->time          = Input::get('time');
        $event->location      = Input::get('location');                  
        $event->description   = Input::get('description'); 
        $event->facebook      = Input::get('facebook');
        $event->twitter       = Input::get('twitter');
        $event->instagram     = Input::get('instagram');
        $event->google        = Input::get('google');
        
        
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
            
            if(Input::hasFile('eventimages')){
                $album_upload_result  = $this->uploadImageAlbum();  
                if($this->storeimages($album_upload_result,$event->id)){
                    $event->albumstate    = 'true';
                    $event->save();
                }
            }
            
            
            return redirect('events-view?save=success==true')->with('success', 'Event was successfully added');
        }
        else{
            return redirect('events-view?save=success==false')->with('error', 'Event was not successfully added');
        }
        
    }
    
    public function storeimages($album_upload_result,$id){
        
        if($album_upload_result['imagestate'] == "true"){
            
            $uploadedFiles = $album_upload_result['imagepath'];
            $file_count = count($uploadedFiles);
            $save_count = 0;
            
            for($i=0; $i<$file_count;$i++){
                 $image = new EventImage;                 
                 $image->img_path    = $uploadedFiles[$i];
                 $image->img_state   = $album_upload_result['imagestate'];
                 $image->events_id   = $id;
                 $image->save();
            }
            
            return true;
            
        }
        else{
            return false;
        }
        
    }
    
    public function updatealbumimages(){

        $id = Input::get('events_id'); 
        
        if(Input::hasFile('eventimages')){
            $album_upload_result  = $this->uploadImageAlbum();  
            if($this->storeimages($album_upload_result,$id)){
                return redirect(URL::to('events-edit/'.$id.'?albumimage=updated==true'));
            }
            else{
                return redirect(URL::to('events-edit/'.$id.'?albumimage=updated==false'));
            }
        }
        else{
            return redirect(URL::to('events-edit/'.$id.'?albumimage=updated==false'));
        }
        
    } 
    
    public function edit($id){
        
        $event = Event::where('id' , '=', $id)->first();  
        $eventimages = EventImage::where('events_id' , '=', $event->id)->get();
        
        return View::make('backend/editevent', array('title' => 'Events | Edit Event','event' => $event, 'eventimages' => $eventimages));
        
        
    }
    
    public function update($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        $event->title         = Input::get('title');
        $event->type          = Input::get('type');
        $event->month         = Input::get('month'); 
        $event->day           = Input::get('day'); 
        $event->year          = Input::get('year'); 
        $event->time          = Input::get('time');
        $event->location      = Input::get('location');                  
        $event->description   = Input::get('description'); 
        $event->facebook      = Input::get('facebook');
        $event->twitter       = Input::get('twitter');
        $event->instagram     = Input::get('instagram');
        $event->google        = Input::get('google');
        
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
        $resourcepath  = $event->resourcepath;
        
        $albumstate    = $event->albumstate;
        
        if($imagestate == "true"){
        UploadController::delete_file($imagepath);
        }
        if($resourcestate == "true"){
        UploadController::delete_file($resourcepath);
        }
        if($albumstate == "true"){
        $this->destroyalbum($event->id);
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
    
    public function destroyalbumimge($id){
        
        $event = EventImage::where('id' , '=', $id)->first(); 
        
        $imagepath = $event->img_path;
        $eventid = $event->events_id;
        
        if(UploadController::delete_file($imagepath)){
            
            if($event->delete()){    
                return redirect(URL::to('events-edit/'.$eventid.'?albumimage=deleted==true'))->with('success', 'Event album image was successfully deleted');
            }
            else{
                return redirect(URL::to('events-edit/'.$eventid.'?albumimage=deleted==false'))->with('error', 'Event album image was not successfully deleted');
            }
        }
        
    }
    
    public function destroyalbum($id){
        
        $images = EventImage::where('events_id' , '=', $id)->get(); 
        foreach($images as $image){
            $imagepath = $image->img_path;
            UploadController::delete_file($imagepath);
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
        
          $allevents = Event::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $pubevents = Event::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $unpevents = Event::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');


          return View::make('backend/events', array('title' => 'Events | Published','events' => $pubevents, 'all' => $allevents, 'active' => $pubevents,'inactive' => $unpevents));
        
    }
    
    public function getunpublished(){
        
         $allevents = Event::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $pubevents = Event::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $unpevents = Event::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');

         return View::make('backend/events', array('title' => 'Events | Unpublished','events' => $unpevents, 'all' => $allevents, 'active' => $pubevents,'inactive' => $unpevents));
        
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey');      
        
         $events = Event::where('title', 'LIKE', '%'.$searchkey.'%')->orderBy('id', 'desc')->paginate(25); 
        
        
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
    
    public static function getpublicevents(){
        
         $events = Event::where('status' , '=', 'on')->where('type' , '=', 'public')->get(); 
        
         return $events;
        
    }
    
    public static function getschoolevents(){
        
         $events = Event::where('status' , '=', 'on')->where('type' , '=', 'private')->get(); 
        
         return $events;
        
    }
    
    public static function geteventimages($id){
        $eventimages = EventImage::where('events_id' , '=', $id)->where('img_state' , '=', 'true')->get();
        return $eventimages;
    }
    
    public static function getpublicevent($title){
        
         $event = Event::where('title' , '=', $title)->where('type' , '=', 'public')->first(); 
        
         return $event;
        
    }
    
    public static function getschoolevent($title){
        
         $event = Event::where('title' , '=', $title)->where('type' , '=', 'private')->first(); 
        
         return $event;
        
    }
    
    public static function getparadedetails(){
        
         $event = Event::where('type' , '=', 'parade')->first(); 
        
         return $event;
        
    }
    
    public function setticketstate($id){
        
        $event = Event::where('id' , '=', $id)->first(); 
        
                
        $event->ticketstate  = Input::get('ticketstate');
        
        if($event->save()){    
            //save activity
            $activity_task = "Event : ".$event->title." ticket state has been changed";
            $activity_type = "event";
            $connection_id = $event->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            
            return redirect(URL::to('tickets?status=changes==true'))->with('success', 'Event ticket status was successfully edited');
        }
        else{
            return redirect(URL::to('tickets?status=changes==false'))->with('error', 'Event ticket status was not successfully edited');           
        }
        
    }
    
    
}
