<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use Validator;
use Redirect;
use File;

class UploadController extends Controller {
        
    public static function upload($files,$destinationPath){

        $file_count = count($files);
        
        $uploadcount = 0;
        $uploaded    = array();
        
        for($i=0; $i<$file_count;$i++){
            
            $rules = array('file' => 'required');  //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $files[$i]), $rules);
            
            if($validator->passes()){     
                $filename = rand(11111,99999999).'.'.$files[$i]->getClientOriginalExtension();
                $upload_success = $files[$i]->move($destinationPath, $filename);
                
                if($upload_success){
                $uploaded[] = $destinationPath.$filename;
                $uploadcount++;
                }
                else{
                    break;
                }
                
            }
            else{
                break;
            }
            
            
        }
        
        if($uploadcount == $file_count){
            $result = array('upload' => true ,'filepaths' => $uploaded);
            return $result;
        }
        else{
            $uploaded_count = count($uploaded);
            for($i=0; $i<$uploaded_count;$i++){
                if (File::exists($uploaded[$i]))
                {                     
                    File::delete($uploaded[$i]);
                }
            }
            
            $result = array('upload' => false ,'error' => "These files cannot be uploaded");
            return $result;
                
        }
        
        
    }
    
    public static function delete_file($filepath){
        
        if (File::exists($filepath))
        {           
           if(File::delete($filepath)){
               return true;
           }
           else{
               return false;
           }
        }
        else{
            return false;
        }
        
    }
    
    

}
