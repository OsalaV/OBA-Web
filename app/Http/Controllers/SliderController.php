<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;

use Illuminate\Support\Facades\Request;

use App\Slider;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;

class SliderController extends Controller
{
    
    public function index()
    {
          return View::make('backend/slidersettings', array('title' => 'DS OBA | Slider Settings'));
    }
    
    public function store()
    {
        
           $files = Input::file('sliderimages');
           $destinationPath = 'uploads/sliders/';
        
           $file_count = count($files);
           $file_save_count = 0;
        
           $result = UploadController::multipleUpload($files,$destinationPath);
        
           if($result['upload']){
                 $uploadedFiles =  $result['filepaths'];
                 for($i=0; $i<$file_count;$i++){
                     $slider = new Slider;                 
                     $slider->sliderimage   = $uploadedFiles[$i];
                     if($slider->save()){$file_save_count++;}
                     else{
                         break;
                     }
                 }
                 
               
                 if($file_count == $file_save_count){
                    return Redirect::to('slidersettings?save=success==true');    
                 }
                 else{
                    return Redirect::to('slidersettings?save=success==false');
                 }
               
               
           }
           else{
               
               return Redirect::to('slidersettings?upload=success==false');
           }
        
           

    }
    
    
    
    
}