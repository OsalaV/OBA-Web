<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;

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

class ProjectController extends Controller
{
    public function index()
    {
          $projects = Project::all();          
          
          return View::make('backend/projects', array('title' => 'Projects','projects' => $projects));
    }
    
    public function create()
    {
          return View::make('backend/addproject', array('title' => 'Add Project'));
    }
    
    public function store()
    {
        
           $imagefile = Input::file('projectimage');
           $imagedestinationPath = 'uploads/projects/images/';
           $imagefilename  = rand(11111,99999).'.'.$imagefile->getClientOriginalExtension(); 
        
           $imageupload = UploadController::upload($imagefile,$imagedestinationPath,$imagefilename);
        
           if($imageupload){
               
                 $project = new Project;
        
                 $project->title        = Input::get('title');                  
                 $project->description  = Input::get('description');   
                 $project->projectimage = $imagedestinationPath.$imagefilename;
               
                 if($project->save()){
                    return Redirect::to('projects-add?save=success==true');    
                 }
                 else{
                    return Redirect::to('/projects-add?save=success==false');
                 }
               
               
           }
           else{
               return Redirect::to('/projects-add?upload=success==false');
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
            return Redirect::to('projects-view?edit=success==true');    
        }
        else{
            return Redirect::to('/projects-view?edit=success==false');
        }        
        
    }
    
    public function destroy($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
        if (File::exists($project->projectimage))
        {           
           if(File::delete($project->projectimage)){
               if ($project->delete()){
                   return Redirect::to('projects-view?delete=success==true');    
               }
               else{
                   return Redirect::to('projects-view?delete=success==false');    
               }
           }
           else{
               return Redirect::to('projects-view?file=delete==false');
           }
                   

        }
        else{
            return Redirect::to('projects-view?file=exists==false');    
        }
                  
    }
    
    public function updatestatus($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
                
        $project->status  = Input::get('status');
        
        if($project->save()){
            return Redirect::to('projects-edit/'.$id);   
         
        }
        else{
            return Redirect::to('projects-edit/'.$id);
           
        }        
        
    }
    
    public function getpublished(){
        
         $projects = Project::where('status' , '=', 'on')->get(); 
         
         return View::make('backend/projects', array('title' => 'Projects | Published','projects' => $projects));
        
    }
    
}