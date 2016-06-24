<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Transaction;

use Session;
use View;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;
use Hash;

class TransactionController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('user');
	}
    
    public function index(){

    }
    
    public static function createtransaction(){
        
        $transaction = new Transaction;
        
        $transaction->users_id = Session::get('user')->id;
        
        $transaction->save();
        
        Session::put('transactionid',$transaction->id);  
        
    }
    
    public static function removedummytransactions(){
        
        $userid = Session::get('user')->id;
        
        $transactions = Transaction::where('users_id' , '=', $userid)->whereNull('transactionstate')->get(); 
        
        if ($transactions->count()) { 
            foreach($transactions as $transaction){
                $transaction->delete();
            }
        }
        
        
    }
    
}
