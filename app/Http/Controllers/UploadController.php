<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use Validator;

class UploadController extends Controller {

	public static function upload($file,$destinationPath,$filename){
        
        $uplodedfile = array('file' => $file);        
        
        $rules = array('file' => 'required',);
        
        $validator = Validator::make($uplodedfile, $rules);
        
        if ($validator->fails()) {
            return false;
        }         
        else {            
            if ($file->isValid()) {
              
              $file->move($destinationPath, $filename); 
                
              return true;
            
//              if (Input::hasFile($filename)) {
//                  return true;
//              }
//              else{
//                  return false;
//              } 
          
            }
            else {              
              return false;
            }
        
       }
        
    }

}
