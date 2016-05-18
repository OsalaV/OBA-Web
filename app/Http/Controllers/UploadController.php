<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use Validator;
use Redirect;

class UploadController extends Controller {

//	public static function upload($file,$destinationPath,$filename){
//        
//        $uplodedfile = array('file' => $file);        
//        
//        $rules = array('file' => 'required',);
//        
//        $validator = Validator::make($uplodedfile, $rules);
//        
//        if ($validator->fails()) {
//            return false;
//        }         
//        else {            
//            if ($file->isValid()) {
//              
//              $file->move($destinationPath, $filename); 
//                
//              return true;
//          
//            }
//            else {              
//              return false;
//            }
//        
//       }
//        
//    }
    
    public static function singleUpload($file,$destinationPath){
        
        $rules = array('file' => 'required');  //'required|mimes:png,gif,jpeg,txt,pdf,doc'
        $validator = Validator::make(array('file'=> $file), $rules);

        if($validator->passes()){     
            $filename = rand(11111,99999).'.'.$file->getClientOriginalExtension();
            $upload_success = $file->move($destinationPath, $filename);
            
            if($upload_success){                
                $result = array('upload' => true ,'filepath' => $destinationPath.$filename);
                return $result;                
            }
            else{
                $result = array('upload' => false ,'error' => "This file cannot be uploaded");
                return $result;
            }
            
        }
        else{
            $result = array('upload' => false ,'error' => "This file has validation erors");
            return $result;
        }
        
        
    }
    
    
    
    
    
    
    public static function multipleUpload($files,$destinationPath){
        
        // Making counting of uploaded files
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        
        foreach($files as $file) {
            
            $rules = array('file' => 'required');  //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);
            
            if($validator->passes()){     
                $filename = rand(11111,99999).'.'.$file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $filename);
                $uploadcount++;
                echo "ok here";
            }
            else{
                echo "error here";
            }
            
            
        }
        
//        if($uploadcount == $file_count){
//            return true;
//        }
//        else{
//            return false;
//        }
        
        
    }
    
    

}
