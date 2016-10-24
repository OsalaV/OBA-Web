<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DesignationController;

use Illuminate\Support\Facades\Request;

use App\Member;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;
use DB;

class MemberController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('admin');
	}
    
    
    public function index()
    {           
        
          $allmembers = DB::table('members')
                    ->join('designations', 'members.designations_id', '=', 'designations.id')->select('members.id','members.fullname','members.year','members.imagepath','members.email','members.contact','members.status','designations.designation')->orderBy('designations.id', 'asc')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
          
          $pubmembers = Member::where('status','=','on')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
          $unpmembers = Member::whereNull('status')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
         

          return View::make('backend/members', array('title' => 'Members','members' => $allmembers, 'all' => $allmembers, 'active' => $pubmembers,'inactive' => $unpmembers));
      
    }
    
    public function create()
    {
          $designations = DesignationController::getdesignations();
          
          return View::make('backend/addmember', array('title' => 'Members | Add Member', 'designations' => $designations));
    }
    
    public function uploadImage(){
        
        $imageUploadPath = 'uploads/members/images/';
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
        
         $image_upload_result;
        
         $member = new Member;
               
        
         $member->fullname        = Input::get('fulname'); 
         $member->designations_id = Input::get('designations_id'); 
         $member->year            = Input::get('year');         
               
         if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $member->imagepath    = $image_upload_result['imagepath'];
            $member->imagestate   = $image_upload_result['imagestate'];
         } 
        
         $member->message      = Input::get('message');
         $member->email        = Input::get('email');                    
         $member->contact      = Input::get('contact'); 
         $member->facebook     = Input::get('facebook');
         $member->twitter      = Input::get('twitter');                  
         $member->linkedin     = Input::get('linkedin');
         $member->google       = Input::get('google');
        
         if($member->save()){
            //save activity
            $activity_task = "Member : ".$member->fullname." has been added";
            $activity_type = "member";
            $connection_id = $member->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
             
            return redirect('members-view?save=success==true')->with('success', 'Member was successfully added');
         }
         else{
            return redirect('members-view?save=success==false')->with('success', 'Member was not successfully added');
         }

    }
    
    public function edit($id){
        
        $member = Member::where('id' , '=', $id)->first();
        $designations = DesignationController::getdesignations();
        
        return View::make('backend/editmember', array('title' => 'Members | Edit Member','designations' => $designations, 'member' => $member));
        
        
    }
    
    public function update($id){
        
         $member = Member::where('id' , '=', $id)->first(); 
        
         $member->fullname        = Input::get('fulname'); 
         $member->designations_id = Input::get('designations_id'); 
         $member->year            = Input::get('year');
         $member->message         = Input::get('message');
         $member->email           = Input::get('email');                    
         $member->contact         = Input::get('contact'); 
         $member->facebook        = Input::get('facebook');
         $member->twitter         = Input::get('twitter');                  
         $member->linkedin        = Input::get('linkedin');
         $member->google          = Input::get('google');
        
        if($member->save()){
            //save activity
            $activity_task = "Member : ".$member->fullname." details has been changed";
            $activity_type = "member";
            $connection_id = $member->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('members-edit/'.$id.'?edit=success==true'))->with('success', 'Member was successfully edited');  
        }
        else{
            return redirect(URL::to('members-edit/'.$id.'?edit=success==false'))->with('success', 'Member was not successfully edited');
        }          
        
    }
    
    public function updatestatus($id){
        
        $member = Member::where('id' , '=', $id)->first(); 
        
                
        $member->status  = Input::get('status');
        
        if($member->save()){
            //save activity
            $activity_task = "Member : ".$member->fullname." status has been changed";
            $activity_type = "member";
            $connection_id = $member->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('members-edit/'.$id.'?status=changes==true'))->with('success', 'Member status was successfully edited');
        }
        else{
            return redirect(URL::to('members-edit/'.$id.'?status=changes==false'))->with('error', 'Member status was not successfully edited');           
        }       
        
    }
    
    public function setstatus($id){
        
        $member = Member::where('id' , '=', $id)->first(); 
        
                
        $member->status  = Input::get('status');
        
        if($member->save()){
            //save activity
            $activity_task = "Member : ".$member->fullname." status has been changed";
            $activity_type = "member";
            $connection_id = $member->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('members-view?status=changes==true'))->with('success', 'Member status was successfully edited');
        }
        else{
            return redirect(URL::to('members-view?status=changes==false'))->with('error', 'Member status was not successfully edited');           
        }       
        
    }
    
    public function updateimage($id){
        
        $member = Member::where('id' , '=', $id)->first(); 
        
        $image_upload_result;
        
        if(Input::hasFile('image')){
            $image_upload_result = $this->uploadImage();
            $member->imagepath    = $image_upload_result['imagepath'];
            $member->imagestate   = $image_upload_result['imagestate'];
            
            if($member->save()){
                //save activity
                $activity_task = "Member : ".$member->fullname." image has been added";
                $activity_type = "member";
                $connection_id = $member->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('members-edit/'.$id.'?image=changes==true'))->with('success', 'Member image was successfully edited');
            }
            else{
                return redirect(URL::to('members-edit/'.$id.'?image=changes==false'))->with('error', 'Member image was not successfully edited');           
            } 
        } 
        else{
            return redirect(URL::to('members-edit/'.$id.'?image=found==false'))->with('error', 'Please select an image to upload');           
        }
         
    }
    
    public function destroy($id){
        
        $member = Member::where('id' , '=', $id)->first(); 
        
        $imagestate = $member->imagestate;
        $imagepath = $member->imagepath;
        
        if($imagestate == "true"){
            UploadController::delete_file($imagepath);
        }
        
        
        if ($member->delete()){
          //save activity
          $activity_task = "Member : ".$member->fullname." has been deleted";
          $activity_type = NULL;
          $connection_id = NULL;
          ActivityController::store($activity_task,$activity_type,$connection_id);
          //save activity
             
          return redirect(URL::to('members-view?member=deleted==true'))->with('success', 'Member was successfully deleted');
        }
        else{
          return redirect(URL::to('members-view?member=deleted==false'))->with('success', 'Member was not successfully deleted');    
        }            
        
              
    }
    
    public function destroyimge($id){
        $member = Member::where('id' , '=', $id)->first(); 
        
        $imagepath = $member->imagepath;
        
        if(UploadController::delete_file($imagepath)){
            $member->imagepath  = "Image has been deleted";
            $member->imagestate = "false";

            if($member->save()){
                //save activity
                $activity_task = "Member : ".$member->fullname." image has been deleted";
                $activity_type = "member";
                $connection_id = $member->id;
                ActivityController::store($activity_task,$activity_type,$connection_id);
                //save activity
                
                return redirect(URL::to('members-edit/'.$id.'?image=deleted==true'))->with('success', 'Member image was successfully deleted');
            }
            else{
                return redirect(URL::to('members-edit/'.$id.'?image=deleted==false'))->with('error', 'Member image was not successfully deleted');
            }
        }
        
    }
    
    public function getpublished(){
        
          $allmembers = Member::select('*')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
          $pubmembers = DB::table('members')
                      ->join('designations', 'members.designations_id', '=', 'designations.id')
                      ->where('members.status' , '=', 'on')->select('members.id','members.fullname','members.year','members.imagepath','members.email','members.contact','members.status','designations.designation')->orderBy('designations.id', 'asc')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
        
          $unpmembers = Member::whereNull('status')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
         

          return View::make('backend/members', array('title' => 'Members | Published','members' => $pubmembers, 'all' => $allmembers, 'active' => $pubmembers,'inactive' => $unpmembers));
    }
    
    public function getunpublished(){         
        
          $allmembers = Member::select('*')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
          $pubmembers = Member::where('status','=','on')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
          $unpmembers = DB::table('members')
                      ->join('designations', 'members.designations_id', '=', 'designations.id')
                      ->where('members.status' , '=', NULL)
                      ->select('members.id','members.fullname','members.year','members.imagepath','members.email','members.contact','members.status','designations.designation')->orderBy('designations.id', 'asc')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
         

          return View::make('backend/members', array('title' => 'Members | Unpublished','members' => $unpmembers, 'all' => $allmembers, 'active' => $pubmembers,'inactive' => $unpmembers));
        
    }
    
    public static function gettopmembers(){
        
        $seniorpresident = DB::table('members')->join('designations', 'members.designations_id','=','designations.id')->where('members.status' , '=', 'on')->where('designations.designation' , '=', 'Senior President')->select('*')->first();
        
        
        $president = DB::table('members')->join('designations', 'members.designations_id', '=','designations.id')->where('members.status' , '=', 'on')->where('designations.designation' , '=', 'President')->select('*')->first();
        
        $generalsec = DB::table('members')->join('designations', 'members.designations_id','=','designations.id')->where('members.status' , '=', 'on')->where('designations.designation' , '=', 'General Secretary')->select('*')->first();
        
        $treasurer = DB::table('members')->join('designations', 'members.designations_id','=','designations.id')->where('members.status' , '=', 'on')->where('designations.designation' , '=', 'Treasurer')->select('*')->first();

        
        $topmembers = array('seniorpresident' => $seniorpresident,'president' => $president,'generalsec' => $generalsec,'treasurer' => $treasurer);
      
        return $topmembers;
        
    }
    
    public static function getpastpresidents(){
        
        $pastpresidents = DB::table('members')->join('designations', 'members.designations_id', '=', 'designations.id')->where('members.status' , '=', 'on')->where('designations.designation' , '=', 'Past President')->select('*')->orderBy('members.year', 'desc')->get();
        
        return $pastpresidents;
        
    }
    
    public static function getcommittee(){
        
        $committee = DB::table('members')->join('designations', 'members.designations_id', '=', 'designations.id')->where('members.status' , '=', 'on')->where('designations.designation' , '!=', 'Batch Representative')->where('designations.designation' , '!=', 'Past President')->select('*')->orderBy('designations.id', 'asc')->orderBy('members.year', 'desc')->get(); 
        
        return $committee;
    }
    
    public static function getbatchreps(){
        
        $batchreps = DB::table('members')->join('designations', 'members.designations_id', '=', 'designations.id')->where('members.status' , '=', 'on')->where('designations.designation' , '=', 'Batch Representative')->select('*')->orderBy('members.year', 'desc')->get(); 
        
        return $batchreps;
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey');      
        
         $members = DB::table('members')->join('designations', 'members.designations_id', '=', 'designations.id')
                      ->where('members.fullname', 'LIKE', '%'.$searchkey.'%')->orWhere('designations.designation', 'LIKE', '%'.$searchkey.'%')->orWhere('members.year', 'LIKE', '%'.$searchkey.'%')->select('members.id','members.fullname','members.year','members.imagepath','members.email','members.contact','members.status','designations.designation')->orderBy('designations.id', 'asc')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
        
        
         $allmembers = DB::table('members')
                    ->join('designations', 'members.designations_id', '=', 'designations.id')->select('members.id','members.fullname','members.year','members.imagepath','members.email','members.contact','members.status','designations.designation')->orderBy('designations.id', 'asc')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
          
         $pubmembers = Member::where('status','=','on')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
         $unpmembers = Member::whereNull('status')->orderBy('members.year', 'desc')->paginate(25, ['*'], 'page');
        
         return View::make('backend/members', array('title' => 'Members','members' => $members, 'all' => $allmembers, 'active' => $pubmembers,'inactive' => $unpmembers));         
        
    }

    
}