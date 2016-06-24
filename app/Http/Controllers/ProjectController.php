<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;

use Illuminate\Support\Facades\Request;

use App\Project;
use App\ProjectImage;

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
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    
    public function index()
    {                
         $allprojects = Project::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $pubprojects = Project::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $unpprojects = Project::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');

         return View::make('backend/projects', array('title' => 'Projects','projects' => $allprojects, 'all' => $allprojects, 'active' => $pubprojects,'inactive' => $unpprojects));
        
    }
    
    public function create()
    {
          return View::make('backend/addproject', array('title' => 'Projects | Add Project'));
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
        
        $imageUploadPath = 'uploads/projects/covers/';
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
        
        $imageUploadPath = 'uploads/projects/images/';
        $imagepath       = "";
        $files           = Input::file('projectimages');
        
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
        
        $project = new Project;
        
        $project->title        = Input::get('title');                  
        $project->tagline      = Input::get('tagline');                  
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
            
            if(Input::hasFile('projectimages')){
                $album_upload_result  = $this->uploadImageAlbum();  
                $this->storeimages($album_upload_result,$project->id);
            }
            
            return redirect('projects-view?save=success==true')->with('success', 'Project was successfully added');
        }
        else{
            return redirect('projects-view?save=success==false')->with('success', 'Project was not successfully added');
        }   

    }
    
    public function storeimages($album_upload_result,$id){
        
        if($album_upload_result['imagestate'] == "true"){
            
            $uploadedFiles = $album_upload_result['imagepath'];
            $file_count = count($uploadedFiles);
            $save_count = 0;
            
            for($i=0; $i<$file_count;$i++){
                 $image = new ProjectImage;                 
                 $image->img_path    = $uploadedFiles[$i];
                 $image->img_state   = $album_upload_result['imagestate'];
                 $image->projects_id   = $id;
                 $image->save();
            }
            
            return true;
            
        }
        else{
            return false;
        }
        
    }
    
    public function updatealbumimages(){

        $id = Input::get('projects_id'); 
        
        if(Input::hasFile('projectimages')){
            $album_upload_result  = $this->uploadImageAlbum();  
            if($this->storeimages($album_upload_result,$id)){
                return redirect(URL::to('projects-edit/'.$id.'?albumimage=updated==true'));
            }
            else{
                return redirect(URL::to('projects-edit/'.$id.'?albumimage=updated==false'));
            }
        }
        else{
            return redirect(URL::to('projects-edit/'.$id.'?albumimage=updated==false'));
        }
        
    } 
     
    public function edit($id){
        
        $project = Project::where('id' , '=', $id)->first();
        $projectimages = ProjectImage::where('projects_id' , '=', $project->id)->get();
        
        return View::make('backend/editproject', array('title' => 'Projects | Edit Project','project' => $project, 'projectimages' => $projectimages));
        
        
    }
    
    public function update($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
        $project->title        = Input::get('title');
        $project->tagline      = Input::get('tagline');      
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
    
    public function setstatus($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
                
        $project->status  = Input::get('status');
        
        if($project->save()){
            //save activity
            $activity_task = "Project : ".$project->title." status has been changed";
            $activity_type = "project";
            $connection_id = $project->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('projects-view?status=changes==true'))->with('success', 'Project status was successfully edited');
        }
        else{
            return redirect(URL::to('projects-view?status=changes==false'))->with('error', 'Project status was not successfully edited');           
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
    
    public function destroyalbumimge($id){
        
        $project = ProjectImage::where('id' , '=', $id)->first(); 
        
        $imagepath = $project->img_path;
        $projectid = $project->projects_id;
        
        if(UploadController::delete_file($imagepath)){
            
            if($project->delete()){    
                return redirect(URL::to('projects-edit/'.$projectid.'?albumimage=deleted==true'))->with('success', 'Project album image was successfully deleted');
            }
            else{
                return redirect(URL::to('projects-edit/'.$projectid.'?albumimage=deleted==false'))->with('error', 'Project album image was not successfully deleted');
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
        
         $allprojects = Project::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $pubprojects = Project::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $unpprojects = Project::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');

         return View::make('backend/projects', array('title' => 'Projects | Published','projects' => $pubprojects, 'all' => $allprojects, 'active' => $pubprojects,'inactive' => $unpprojects));        
        
    }
    
    public function getunpublished(){
        
         $allprojects = Project::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $pubprojects = Project::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $unpprojects = Project::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');

         return View::make('backend/projects', array('title' => 'Projects | Unpublished','projects' => $unpprojects, 'all' => $allprojects, 'active' => $pubprojects,'inactive' => $unpprojects)); 
        
    }
    
    public function downloadresource($id){
        
        $project = Project::where('id' , '=', $id)->first(); 
        
        $resourcepath = $project->resourcepath;
        return response()->download($resourcepath);
        
    }
    
    public static function getprojects(){
        
         $porjects = Project::where('status' , '=', 'on')->get(); 
        
         return $porjects;
        
    }
    
    public static function getproject($title){
        
         $porject = Project::where('title' , '=', $title)->first(); 
        
         return $porject;
        
    }
    
    public static function getprojectimages($id){
        $projectimages = ProjectImage::where('projects_id' , '=', $id)->where('img_state' , '=', 'true')->get();
        return $projectimages;
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey');      
        
         $porjects = Project::where('title', 'LIKE', '%'.$searchkey.'%')->orderBy('id', 'desc')->paginate(25); 
        
         $allprojects = Project::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $pubprojects = Project::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $unpprojects = Project::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/projects', array('title' => 'Projects','projects' => $porjects, 'all' => $allprojects, 'active' => $pubprojects,'inactive' => $unpprojects));         
        
    }
    
}