<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;

use Illuminate\Support\Facades\Request;


use App\Sponser;
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

class SponserController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    public static function store($type,$id)
    {
        $sponser = new Sponser;
        
        $sponser->type      = $type;
        $sponser->events_id = $id;
        
        $sponser->save();
    }
    
    public function uploadImage(){
        
        $imageUploadPath = 'uploads/events/sponsers/';
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
    
    public function destroyimge($id){
        $sponser = Sponser::where('id' , '=', $id)->first(); 
        
        $imagepath = $sponser->imagepath;
        
        if(UploadController::delete_file($imagepath)){
            $sponser->imagepath  = NULL;
            $sponser->save();
        }
        
    }
    
    
    
    public static function getPlatinumSponser($id){
        $sponser = Sponser::where('events_id' , '=', $id)->where('type' , '=', 'Platinum')->first();  
        return $sponser;
    }
    
    public static function getGoldSponser($id){
        $sponser = Sponser::where('events_id' , '=', $id)->where('type' , '=', 'Gold')->first();  
        return $sponser;
    }
    
    public static function getSilverSponser($id){
        $sponser = Sponser::where('events_id' , '=', $id)->where('type' , '=', 'Silver')->first();  
        return $sponser;
    }
    
    public function updateSponser($id){
        
        $sponser = Sponser::where('id' , '=', $id)->first(); 
        
        $sponser->valid_period = Input::get('valid_period');
        $sponser->status       = Input::get('status');
        
        if(Input::hasFile('image')){
            $this->destroyimge($id);
            $image_upload_result = $this->uploadImage();
            $sponser->imagepath    = $image_upload_result['imagepath'];
            $sponser->imagestate   = $image_upload_result['imagestate'];
        } 
        
        
        if($sponser->save()){            
            return redirect(URL::to('events-edit/'.$sponser->events_id.'?edit=success==true'))->with('success', 'Event was successfully edited');  
        }
        else{
            return redirect(URL::to('events-edit/'.$sponser->events_id.'?edit=success==false'))->with('error', 'Event was not successfully edited');
        }        
        
    }
    
    
    
    
}
