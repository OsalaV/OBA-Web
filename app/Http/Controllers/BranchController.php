<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;

use Illuminate\Support\Facades\Request;

use App\Branch;


use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;

class BranchController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    
    public function index()
    {
          $branches      = Branch::all()->sortByDesc("id"); 
          $allcount      = Branch::all()->count(); 
          $activecount   = Branch::where('status','=','on')->count(); 
          $inactivecount = Branch::whereNull('status')->count(); 
          
          return View::make('backend/branches', array('title' => 'Branches','branches' => $branches,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' => $inactivecount));
    }
    
    public function create()
    {
          return View::make('backend/addbranch', array('title' => 'Branches | Add Branch'));
    }
    
    public function store()
    {
        $branch = new Branch;
        
        $branch->branch        = Input::get('branch');            
        $branch->description   = Input::get('description'); 
        $branch->address_line1 = Input::get('address_line1'); 
        $branch->address_line2 = Input::get('address_line2'); 
        $branch->address_line3 = Input::get('address_line3'); 
        $branch->email         = Input::get('email');
        $branch->contact       = Input::get('contact');       
        
        if($branch->save()){
            //save activity
            $activity_task = "Branch : ".$branch->branch." has been added";
            $activity_type = "branch";
            $connection_id = $branch->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect('branches-view?save=success==true')->with('success', 'Branch was successfully added');
        }
        else{
            return redirect('branches-view?save=success==false')->with('error', 'Branch was not successfully added');
        }
        
    }
    
    public function edit($id){
        
        $branch = Branch::where('id' , '=', $id)->first();  
        
        return View::make('backend/editbranch', array('title' => 'Branches | Edit Branch','branch' => $branch));
        
        
    }
    
    public function update($id){
        
        $branch = Branch::where('id' , '=', $id)->first(); 
        
        $branch->branch        = Input::get('branch');            
        $branch->description   = Input::get('description'); 
        $branch->address_line1 = Input::get('address_line1'); 
        $branch->address_line2 = Input::get('address_line2'); 
        $branch->address_line3 = Input::get('address_line3'); 
        $branch->email         = Input::get('email');
        $branch->contact       = Input::get('contact');   
        
        if($branch->save()){
            //save activity
            $activity_task = "Branch : ".$branch->branch." details has been changed";
            $activity_type = "branch";
            $connection_id = $branch->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity            
            
            return redirect(URL::to('branches-edit/'.$id.'?edit=success==true'))->with('success', 'Branch was successfully edited');  
        }
        else{
            return redirect(URL::to('branches-edit/'.$id.'?edit=success==false'))->with('error', 'Branch was not successfully edited');
        }        
        
    } 
    
    public function updatestatus($id){
        
        $branch = Branch::where('id' , '=', $id)->first(); 
        
                
        $branch->status  = Input::get('status');
        
        if($branch->save()){
            //save activity
            $activity_task = "Branch : ".$branch->branch." status has been changed";
            $activity_type = "branch";
            $connection_id = $branch->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('branches-edit/'.$id.'?status=changes==true'))->with('success', 'Branch status was successfully edited');
        }
        else{
            return redirect(URL::to('branches-edit/'.$id.'?status=changes==false'))->with('error', 'Branch status was not successfully edited');           
        }        
        
    }
    
    public function setstatus($id){
        
        $branch = Branch::where('id' , '=', $id)->first(); 
        
                
        $branch->status  = Input::get('status');
        
        if($branch->save()){
            //save activity
            $activity_task = "Branch : ".$branch->branch." status has been changed";
            $activity_type = "branch";
            $connection_id = $branch->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('branches-view?status=changes==true'))->with('success', 'Branch status was successfully edited');
        }
        else{
            return redirect(URL::to('branches-view?status=changes==false'))->with('error', 'Branch status was not successfully edited');           
        }        
        
    }
    
    public function destroy($id){
        
        $branch = Branch::where('id' , '=', $id)->first(); 
        
        if ($branch->delete()){
          //save activity
          $activity_task = "Branch : ".$branch->branch." has been deleted";
          $activity_type = NULL;
          $connection_id = NULL;
          ActivityController::store($activity_task,$activity_type,$connection_id);
          //save activity

          return redirect(URL::to('branches-view?branch=deleted==true'))->with('success', 'Branch was successfully deleted');
        }
        else{
          return redirect(URL::to('branches-view?branch=deleted==false'))->with('error', 'Branch was not successfully deleted');    
        }            
        
    }
    
    public function getpublished(){
        
         $branches = Branch::where('status','=','on')->get()->sortByDesc("id"); ;          
        
         $allcount    = Branch::all()->count(); 
         $activecount = Branch::where('status','=','on')->count(); 
         $inactivecount = Branch::whereNull('status')->count(); 
          
         return View::make('backend/branches', array('title' => 'Branches | Published','branches' =>  $branches,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' =>  $inactivecount));
        
    }
    
    public function getunpublished(){
        
         $branches = Branch::whereNull('status')->get()->sortByDesc("id"); 
         
         $allcount    = Branch::all()->count(); 
         $activecount = Branch::where('status','=','on')->count(); 
         $inactivecount = Branch::whereNull('status')->count(); 
          
         return View::make('backend/branches', array('title' => 'Branches | Unpublished','branches' =>  $branches,'count_all' => $allcount,'count_active' => $activecount,'count_inactive' =>  $inactivecount));
        
    }
    
     public static function getbranches(){
        
         $branches = Branch::where('status' , '=', 'on')->get(); 
        
         return $branches;
        
    }
        

    
}