<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;

use Illuminate\Support\Facades\Request;
//use Illuminate\Pagination\LengthAwarePaginator;

use App\Slider;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;

class SliderController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    
    public function index()
    {
          $slider = Slider::select('*')->orderBy('id', 'desc')->paginate(5, ['*'], 'page');
        
          return View::make('backend/slidersettings', array('title' => 'Image Slider','sliders' => $slider));
    }
    
    public function uploadImage(){
        
        $imageUploadPath = '/public/uploads/sliderimages/';
        $files           = Input::file('sliderimages');
        
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
        $image_upload_result;
        
        if(Input::hasFile('sliderimages')){
            $image_upload_result = $this->uploadImage();  
            
            if($image_upload_result['imagestate'] == "true"){
                
                $uploadedFiles = $image_upload_result['imagepath'];
                $file_count = count($uploadedFiles);
                $save_count = 0;
                
                for($i=0; $i<$file_count;$i++){
                     $slider = new Slider;                 
                     $slider->imagepath    = $uploadedFiles[$i];
                     $slider->imagestate   = $image_upload_result['imagestate'];
                     if($slider->save()){
                         
                         //save activity
                         $activity_task = "Image Slider : ".$slider->imagepath." has been added";
                         $activity_type = "slider";
                         $connection_id = $slider->id;
                         ActivityController::store($activity_task,$activity_type,$connection_id);
                         //save activity
                         
                         $save_count++;
                         
                     }
                     else{
                         break;
                     }
                 }
                
                 if($file_count == $save_count){
                     return redirect(URL::to('imageslider?images=added==true'))->with('success', 'Slider image files were successfully added');    
                 }
                 else{
                     return redirect(URL::to('imageslider?images=added==false'))->with('error', 'Slider image files were not successfully added'); 
                 }
                
            }
            else{
                return redirect(URL::to('imageslider?images=upload==false'))->with('error', 'Slider image files were not successfully uploaded'); 
            }
        }
        
    }
    
    public function updatestatus($id){
        
        $slider = Slider::where('id' , '=', $id)->first(); 
                
        $slider->status  = Input::get('status');
        
        if($slider->save()){
            //save activity
            $activity_task = "Image Slider : ".$slider->imagepath." status has been changed";
            $activity_type = "slider";
            $connection_id = $slider->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity            
            
            return redirect(URL::to('imageslider?status=changes==true'))->with('success', 'Image status was successfully changed');   
        }
        else{
            return redirect(URL::to('imageslider?status=changes==false'))->with('error', 'Image status was not successfully changed');            
        }
        
    }
    
    public function destroy($id){
        
        $slider = Slider::where('id' , '=', $id)->first(); 
        
        $imagepath = $slider->imagepath;
        
        if(UploadController::delete_file($imagepath)){
            
            if ($slider->delete()){
              //save activity       
              $activity_task = "Image Slider : ".$slider->imagepath." has been deleted";
              $activity_type = NULL;
              $connection_id = NULL;
              ActivityController::store($activity_task,$activity_type,$connection_id);
              //save activity            
                                
              return redirect(URL::to('imageslider?image=delete==true'))->with('success', 'Slider image was successfully deleted'); 
            }
            else{
              return redirect(URL::to('imageslider?image=delete==false'))->with('error', 'Slider image was not successfully deleted');   
            } 

        }
        
    }
    
   
    public static function getsliders(){
        
         $slider = Slider::where('status' , '=', 'on')->get(); 
        
         return $slider;
        
    }
    
    
    
}