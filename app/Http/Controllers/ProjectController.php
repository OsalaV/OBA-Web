<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;

use Illuminate\Support\Facades\Request;

use App\Project;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;

class ProjectController extends Controller
{
    public function index()
    {
          $projects      = Project::all(); 
          $allcount      = Project::all()->count(); 
          $activecount   = Project::where('status','=','on')->count(); 
          $inactivecount = Project::whereNull('status')->count(); 
          
          return View::make('backend/projects', array('title' => 'Projects','projects' => $projects,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' => $inactivecount));
    }
    
    public function create()
    {
          return View::make('backend/addproject', array('title' => 'Add Project'));
    }
    
    public function uploadResource(){
        
        $resourceUploadPath = 'uploads/projects/resources/';
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
        
        $imageUploadPath = 'uploads/projects/images/';
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
        
        $project = new Project;
        
        $project->title        = Input::get('title');                  
        $project->description  = Input::get('description');   
        
             
        if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $project->imagepath    = $image_upload_result['imagepath'];
            $project->imagestate   = $image_upload_result['imagestate'];
        } 
        
        if(Input::hasFile('resource')){
            $resource_upload_result = $this->uploadResource();
            $project->resourcepath  = $resource_upload_result['resourcepath'];
            $project->resourcestate = $resource_upload_result['resourcestate'];
        }
         

        if($project->save()){
            //save activity
            $activity_task = "Project : ".$project->title." has been added";
            $activity_type = "project";
            $connection_id = $project->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect('projects-add?save=success==true')->with('success', 'Project was successfully added');
        }
        else{
            return redirect('projects-add?save=success==false')->with('success', 'Project was not successfully added');
        }   

    }
     
    public function edit($id){
        
        $project = Project::where('id' , '=', $id)->first();  
        
        return View::make('backend/editproject', array('title' => 'Edit Project','project' => $project));
        
        
    }
    
    public function update($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
        $project->title        = Input::get('title');                   
        $project->description  = Input::get('description');
        
        if($project->save()){
            //save activity
            $activity_task = "Project : ".$project->title." details has been changed";
            $activity_type = "project";
            $connection_id = $project->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('projects-edit/'.$id.'?edit=success==true'))->with('success', 'Project was successfully edited');  
        }
        else{
            return redirect(URL::to('projects-edit/'.$id.'?edit=success==false'))->with('success', 'Project was not successfully edited');
        }          
        
    }
    
    public function updatestatus($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
                
        $project->status  = Input::get('status');
        
        if($project->save()){
            //save activity
            $activity_task = "Project : ".$project->title." status has been changed";
            $activity_type = "project";
            $connection_id = $project->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('projects-edit/'.$id.'?status=changes==true'))->with('success', 'Project status was successfully edited');
        }
        else{
            return redirect(URL::to('projects-edit/'.$id.'?status=changes==false'))->with('error', 'Project status was not successfully edited');           
        }            
        
    }
    
    public function updateimage($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
        $image_upload_result;
        
        if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $project->imagepath    = $image_upload_result['imagepath'];
            $project->imagestate   = $image_upload_result['imagestate'];
            
            if($project->save()){
                //save activity
                $activity_task = "Project : ".$project->title." image has been changed";
                $activity_type = "project";
                $connection_id = $project->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('projects-edit/'.$id.'?image=changes==true'))->with('success', 'Project image was successfully edited');
            }
            else{
                return redirect(URL::to('projects-edit/'.$id.'?image=changes==false'))->with('error', 'Project image was not successfully edited');           
            } 
        } 
        else{
            return redirect(URL::to('projects-edit/'.$id.'?image=found==false'))->with('error', 'Please select an image to upload');           
        }
         
    }
    
    public function updateresource($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
        $resource_upload_result;
        
        if(Input::hasFile('resource')){
            $resource_upload_result = $this->uploadResource();
            $project->resourcepath  = $resource_upload_result['resourcepath'];
            $project->resourcestate = $resource_upload_result['resourcestate'];        
            
            if($project->save()){
                //save activity
                $activity_task = "Project : ".$project->title." resourrce file has been changed";
                $activity_type = "project";
                $connection_id = $project->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('projects-edit/'.$id.'?resource=changes==true'))->with('success', 'Project resource file was successfully edited');
            }
            else{
                return redirect(URL::to('projects-edit/'.$id.'?resource=changes==false'))->with('error', 'Project resource file was not successfully edited');           
            } 
        } 
        else{
            return redirect(URL::to('projects-edit/'.$id.'?image=found==false'))->with('error', 'Please select a resource to upload');           
        }
        
    }
    
    public function destroy($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
        $imagestate = $project->imagestate;
        $imagepath  = $project->imagepath;
                
        $resourcestate = $project->resourcestate;
        $resourcepath = $project->resourcepath;
        
        if($imagestate == "true"){
        UploadController::delete_file($imagepath);
        }
        if($resourcestate == "true"){
        UploadController::delete_file($resourcepath);
        }
        
    
        if ($project->delete()){
          //save activity
          $activity_task = "Project : ".$project->title." has been deleted";
          $activity_type = NULL;
          $connection_id = NULL;
          ActivityController::store($activity_task,$activity_type,$connection_id);
          //save activity   

          return redirect(URL::to('projects-view?project=deleted==true'))->with('success', 'Project was successfully deleted');
        }
        else{
          return redirect(URL::to('projects-view?project=deleted==false'))->with('success', 'Project was not successfully deleted');    
        }            
      
                  
    }
    
    public function destroyimge($id){
        $project = Project::where('id' , '=', $id)->first(); 
        
        $imagepath = $project->imagepath;
        
        if(UploadController::delete_file($imagepath)){
            $project->imagepath  = "Image has been deleted";
            $project->imagestate = "false";

            if($project->save()){
                //save activity
                $activity_task = "Project : ".$project->title." image has been deleted";
                $activity_type = "project";
                $connection_id = $project->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('projects-edit/'.$id.'?image=deleted==true'))->with('success', 'Project image was successfully deleted');
            }
            else{
                return redirect(URL::to('projects-edit/'.$id.'?image=deleted==false'))->with('error', 'Project image was not successfully deleted');
            }
        }
        
    }
    
    public function destroyresource($id){
        $project = Project::where('id' , '=', $id)->first(); 
        
        $resourcepath = $project->resourcepath;
        
        if(UploadController::delete_file($resourcepath)){
                   
          $project->resourcepath  = "Resource file has been deleted";
          $project->resourcestate = "false";

          if($project->save()){
              //save activity
                $activity_task = "Project : ".$project->title." resource file has been deleted";
                $activity_type = "project";
                $connection_id = $project->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
              return redirect(URL::to('projects-edit/'.$id.'?resource=deleted==true'))->with('success', 'Project resource file was successfully deleted');
          }
          else{
              return redirect(URL::to('projects-edit/'.$id.'?image=resource==false'))->with('error', 'Project resource file was not successfully deleted');
          }
        }
        
    }    
    
    public function getpublished(){
        
         $projects      = Project::where('status','=','on')->get();          
        
         $allcount      = Project::all()->count(); 
         $activecount   = Project::where('status','=','on')->count(); 
         $inactivecount = Project::whereNull('status')->count(); 
          
         return View::make('backend/projects', array('title' => 'Projects | Published','projects' =>  $projects,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' =>  $inactivecount));
        
    }
    
    public function getunpublished(){
        
         $projects      = Project::whereNull('status')->get(); 
         
         $allcount      = Project::all()->count(); 
         $activecount   = Project::where('status','=','on')->count(); 
         $inactivecount = Project::whereNull('status')->count(); 
          
         return View::make('backend/projects', array('title' => 'Projects | Unpublished','projects' =>  $projects,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' =>  $inactivecount));
        
    }
    
    public function downloadresource($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
        $resourcepath = $project->resourcepath;
        return response()->download($resourcepath);
        
    }
    
}