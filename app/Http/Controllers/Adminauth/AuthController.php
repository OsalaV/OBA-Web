<?php

namespace App\Http\Controllers\Adminauth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserPermissionController;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;



use Session;
use View;
use Input;
use Redirect;
use Response;
use Auth;
use File;
use URL;
use Hash;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    
	protected $guard = 'admin';
    
    
    

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function showLogin()
    {
//        if(view()->exists('auth.adminlogin')) {
//            return view('auth.adminlogin');
//        }       
        
        return view('auth.adminlogin');
    }
    
    
    public function authenticate()
    {
        $email    = Input::get('email');
        $password = Input::get('password');
        
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            
            $user = Auth::guard('admin')->user();          
 
            
            if($user->role == "admin" || $user->role == "superadmin"){
                Session::put('user',$user);  
                $this->setpermissionstosession($user->id);
                return redirect('dashboard-view'); 
            }
            else{                 
                return redirect('admin-login?auth=attempt==failed');
            }
            
        }
        else{
            return redirect('admin-login?auth=attempt==failed');
        }
    }
    
    public function logout(){
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect('admin-login?logout=success==true');
    }
    
    private function setpermissionstosession($userid){
        
        $userpermissions = UserPermissionController::getuserpermissions($userid);             
        foreach($userpermissions as $userpermission){
        Session::put($userpermission->permission, $userpermission->status);   
        }        
    }
    
}
