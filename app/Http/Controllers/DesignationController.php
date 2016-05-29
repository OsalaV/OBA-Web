<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Designation;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;

class DesignationController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    public function index()
    {
         $designations = Designation::all(); 
        
         return View::make('backend/designations', array('title' => 'Designations', 'designations' => $designations));
    }
    
    public function store(){       
        
        $designation = new Designation;
        
        $designation->designation = Input::get('designation'); 
        $designation->status      = 'on'; 
        
        if($designation->save()){            
            return redirect('designations-view?save=success==true')->with('success', 'Designation was successfully added');
        }
        else{
            return redirect('designations-view?save=success==false')->with('error', 'Designation was not successfully added');
        }
        
        
    }
    
    public function update($id){
        
        $designation = Designation::where('id' , '=', $id)->first(); 
                
        $designation->designation  = Input::get('designation');
        
        if($designation->save()){         
            return redirect('designations-view?edit=success==true')->with('success', 'Designation details was successfully edited');
        }
        else{  
            return redirect('designations-view?edit=success==false')->with('success', 'Designation details was not successfully edited');
        }
        
    }
    
    
    public function updatestatus($id){
        
        $designation = Designation::where('id' , '=', $id)->first(); 
                
        $designation->status  = Input::get('status');
        
        if($designation->save()){         
            return redirect('designations-view?status=changes==true')->with('success', 'Designation status was successfully edited');
        }
        else{  
            return redirect('designations-view?status=changes==false')->with('success', 'Designation status was not successfully edited');
        }
        
    }
    
    public static function getdesignations(){
        
      
        $designations = Designation::all(['id', 'designation'])->pluck('designation', 'id');
        
        return $designations;
        
    }
    
    
    
}
