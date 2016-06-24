<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Controllers\TransactionController;



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
//     protected $redirectTo = 'events';
    
    
    

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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function storeuser(){
        
        $user = new User;
        
        $user->firstname        = Input::get('firstname');
        $user->lastname         = Input::get('lastname'); 
        $user->email            = Input::get('email'); 
        $user->password         = Hash::make(Input::get('password'));
        $user->month            = Input::get('month'); 
        $user->day              = Input::get('day'); 
        $user->year             = Input::get('year'); 
        $user->nic              = Input::get('nic'); 
        $user->address          = Input::get('address');
        $user->contact          = Input::get('contact'); 
 
        
        if($user->save()){ 
            return redirect('login')->with('success', 'You have been successfuly registerd with us. Please login to continue.');
        }
        else{
            return redirect('login')->with('error', 'There are some problems with your registration. Please Try again.');
        }
        
    }
    
    public function authenticate()
    {
        $email    = Input::get('email');
        $password = Input::get('password');
        
        if (Auth::guard('user')->attempt(['email' => $email, 'password' => $password])) {
            
            $user = Auth::guard('user')->user();              
            
            if($user->role == "user"){
                Session::put('user',$user);  
                TransactionController::removedummytransactions();
                TransactionController::createtransaction();
                return redirect('user-home'); 
            }
            else{                 
                return redirect('login?auth=attempt==failed')->with('error', 'Your Email and/or Password are not recognized. Please try again');
            }
            
        }
        else{
            return redirect('login?auth=attempt==failed')->with('error', 'Your Email and/or Password are not recognized. Please try again');
        }
    }
    
    public function logout(){
        TransactionController::removedummytransactions();
        Auth::guard('user')->logout();
        Session::flush();
        return redirect('login?logout=success==true')->with('success', 'You are now logged out ');;
    }
    
    
    
}
