<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;


use Illuminate\Support\Facades\Request;

use App\Resource;

use View;
use Session;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;
use DB;


class ResourceController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    
    public function index()
    {        
        $allresources = Resource::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
        $pubresources = Resource::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
        $unpresources = Resource::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
        
        return View::make('backend/resources', array('title' => 'Resources','resources' => $allresources, 'all' => $allresources, 'active' => $pubresources,'inactive' => $unpresources));        
    }
    
    public function create()
    {
          return View::make('backend/addresource', array('title' => 'Resources | Add Resource'));
    }
    
    public function uploadResource(){
        
        $resourceUploadPath = 'uploads/resources/resources/';
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
        
        $imageUploadPath = 'uploads/resources/images/';
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
        
        $resource = new Resource;
        
        $resource->resource      = Input::get('resource'); 
        $resource->description   = Input::get('description');         
        
        if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $resource->imagepath    = $image_upload_result['imagepath'];
            $resource->imagestate   = $image_upload_result['imagestate'];
        } 
        
        if(Input::hasFile('resource')){
            $resource_upload_result = $this->uploadResource();
            $resource->resourcepath  = $resource_upload_result['resourcepath'];
            $resource->resourcestate = $resource_upload_result['resourcestate'];
        }
         

        if($resource->save()){
            //save activity
            $activity_task = "Resource : ".$resource->resource." has been added";
            $activity_type = "resource";
            $connection_id = $resource->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect('resources-view?save=success==true')->with('success', 'Resource was successfully added');
        }
        else{
            return redirect('resources-view?save=success==false')->with('error', 'Resource was not successfully added');
        }
        
    }
    
    public function edit($id){
        
        $resource = Resource::where('id' , '=', $id)->first();  
        
        return View::make('backend/editresource', array('title' => 'Resource | Edit Resource','resource' => $resource));        
        
    }
    
    public function update($id){
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
        $resource->resource     = Input::get('resource');                        
        $resource->description  = Input::get('description');
        
        if($resource->save()){
            //save activity
            $activity_task = "Resource : ".$resource->resource." details has been changed";
            $activity_type = "resource";
            $connection_id = $resource->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity            
            
            return redirect(URL::to('resources-edit/'.$id.'?edit=success==true'))->with('success', 'Resource was successfully edited');  
        }
        else{
            return redirect(URL::to('resources-edit/'.$id.'?edit=success==false'))->with('error', 'Resource was not successfully edited');
        }        
        
    }  
    
    public function updatestatus($id){
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
                
        $resource->status  = Input::get('status');
        
        if($resource->save()){
            //save activity
            $activity_task = "Resource : ".$resource->resource." status has been changed";
            $activity_type = "resource";
            $connection_id = $resource->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('resources-edit/'.$id.'?status=changes==true'))->with('success', 'Resource status was successfully edited');
        }
        else{
            return redirect(URL::to('resources-edit/'.$id.'?status=changes==false'))->with('error', 'Resource status was not successfully edited');           
        }        
        
    }
    
    public function setstatus($id){
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
                
        $resource->status  = Input::get('status');

        if($resource->save()){
            //save activity
            $activity_task = "Resource : ".$resource->resource." status has been changed";
            $activity_type = "resource";
            $connection_id = $resource->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('resources-view?status=changes==true'))->with('success', 'Resource status was successfully edited');
        }
        else{
            return redirect(URL::to('resources-view?status=changes==false'))->with('error', 'Resource status was not successfully edited');           
        }        
        
    }
    
    public function updateimage($id){
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
        $image_upload_result;
        
        if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $resource->imagepath    = $image_upload_result['imagepath'];
            $resource->imagestate   = $image_upload_result['imagestate'];
            
            if($resource->save()){
                //save activity
                $activity_task = "Resource : ".$resource->resource." image has been added";
                $activity_type = "resource";
                $connection_id = $resource->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('resources-edit/'.$id.'?image=changes==true'))->with('success', 'Resource image was successfully edited');
            }
            else{
                return redirect(URL::to('resources-edit/'.$id.'?image=changes==false'))->with('error', 'Resource image was not successfully edited');           
            } 
        } 
        else{
            return redirect(URL::to('resources-edit/'.$id.'?image=found==false'))->with('error', 'Please select an image to upload');           
        }
         
    }
    
    public function updateresource($id){
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
        $resource_upload_result;
        
        if(Input::hasFile('resource')){
            $resource_upload_result = $this->uploadResource();
            $resource->resourcepath  = $resource_upload_result['resourcepath'];
            $resource->resourcestate = $resource_upload_result['resourcestate'];        
            
            if($resource->save()){
                //save activity
                $activity_task = "Resource : ".$resource->resource." resourrce file has been added";
                $activity_type = "resource";
                $connection_id = $resource->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                
                return redirect(URL::to('resources-edit/'.$id.'?resource=changes==true'))->with('success', 'Resource resource file was successfully edited');
            }
            else{
                return redirect(URL::to('resources-edit/'.$id.'?resource=changes==false'))->with('error', 'Resource resource file was not successfully edited');           
            } 
        } 
        else{
            return redirect(URL::to('resources-edit/'.$id.'?image=found==false'))->with('error', 'Please select an resource to upload');           
        }
        
        
    }
    
    public function destroy($id){
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
        $imagestate = $resource->imagestate;
        $imagepath  = $resource->imagepath;
                
        $resourcestate = $resource->resourcestate;
        $resourcepath = $resource->resourcepath;
        
        if($imagestate == "true"){
        UploadController::delete_file($imagepath);
        }
        if($resourcestate == "true"){
        UploadController::delete_file($resourcepath);
        }
            
        if ($resource->delete()){
          //save activity
          $activity_task = "Resource : ".$resource->resource." has been deleted";
          $activity_type = NULL;
          $connection_id = NULL;
          ActivityController::store($activity_task,$activity_type,$connection_id);
          //save activity

          return redirect(URL::to('resources-view?resource=deleted==true'))->with('success', 'Resource was successfully deleted');
        }
        else{
          return redirect(URL::to('resources-view?resource=deleted==false'))->with('error', 'Resource was not successfully deleted');    
        }            
        
    }   
    
    
    public function destroyimge($id){
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
        
        $imagepath = $resource->imagepath;
        
        if(UploadController::delete_file($imagepath)){
            $resource->imagepath  = "Image has been deleted";
            $resource->imagestate = "false";

            if($resource->save()){
                //save activity
                $activity_task = "Resource : ".$resource->resource." image has been deleted";
                $activity_type = "resource";
                $connection_id = $resource->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('resources-edit/'.$id.'?image=deleted==true'))->with('success', 'Resource image was successfully deleted');
            }
            else{
                return redirect(URL::to('resources-edit/'.$id.'?image=deleted==false'))->with('error', 'Resource image was not successfully deleted');
            }
        }
        
    }
    
    public function destroyresource($id){
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
        $resourcepath = $resource->resourcepath;
        
        if(UploadController::delete_file($resourcepath)){
                   
          $resource->resourcepath  = "Resource file has been deleted";
          $resource->resourcestate = "false";

          if($resource->save()){
              //save activity
              $activity_task = "Resource : ".$resource->resource." resource file has been deleted";
              $activity_type = "resource";
              $connection_id = $resource->id;
              ActivityController::store($activity_task,$activity_type,$connection_id);
              //save activity
              
              
              return redirect(URL::to('resources-edit/'.$id.'?resource=deleted==true'))->with('success', 'Resource resource file was successfully deleted');
          }
          else{
              return redirect(URL::to('resources-edit/'.$id.'?resource=deleted==false'))->with('error', 'Resource resource file was not successfully deleted');
          }
        }
        
    }   
    
    public function getpublished(){    
        
          $allresources = Resource::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $pubresources = Resource::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
          $unpresources = Resource::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');


          return View::make('backend/resources', array('title' => 'Resources | Published','resources' => $pubresources, 'all' => $allresources, 'active' => $pubresources,'inactive' => $unpresources));
        
    }
    
    public function getunpublished(){
        
         $allresources = Resource::select('*')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $pubresources = Resource::where('status','=','on')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');
         $unpresources = Resource::whereNull('status')->orderBy('id', 'desc')->paginate(25, ['*'], 'page');


         return View::make('backend/resources', array('title' => 'Resources | Unpublished','resources' => $unpresources, 'all' => $allresources, 'active' => $pubresources,'inactive' => $unpresources));
        
    }
    
    public function downloadresource($id){
        
        $resource = Resource::where('id' , '=', $id)->first(); 
        
        $resourcepath = $resource->resourcepath;
        return response()->download($resourcepath);
        
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey');      
        
         $resources = Resource::where('resource', 'LIKE', '%'.$searchkey.'%')->orderBy('id', 'desc')->paginate(25); 
        
        
         $allresources = Resource::paginate(25);  
         $pubresources = Resource::where('status','=','on')->paginate(25); 
         $unpresources = Resource::whereNull('status')->paginate(25);         
        
         return View::make('backend/resources', array('title' => 'Resources','resources' => $resources, 'all' => $allresources, 'active' => $pubresources,'inactive' => $unpresources));
        
        
    }
    
}
