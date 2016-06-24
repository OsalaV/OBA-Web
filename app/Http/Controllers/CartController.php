<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Event;
use App\Cart;

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
use DB;

class CartController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('user');
	}
    
    public function index()
    {   
        $user = Session::get('user');
        $username = $user->firstname.' '.$user->lastname;
        $trasnactionid =  Session::get('transactionid');
        
        $eventsid = DB::table('carts')->where('carts.transactions_id' , '=', $trasnactionid) 
                    ->select('carts.events_id as eventid')->groupBy('carts.events_id')->get();
        
        $carts = array();
        
        foreach($eventsid as $eventid){
       
        $event      = DB::table('events')                    
                    ->where('id' , '=', $eventid->eventid)                     
                    ->select('events.title as eventtitle',
                             'events.location',
                             'events.time',
                             'events.month',
                             'events.day',
                             'events.year')->first();
          
            
        $tickets    = DB::table('carts')
                    ->join('tickets', 'carts.tickets_id', '=', 'tickets.id')
                    ->where('carts.events_id' , '=', $eventid->eventid) 
                    ->where('carts.transactions_id' , '=', $trasnactionid)
                    ->select('tickets.id as ticketid',
                             'tickets.category',
                             'tickets.price',
                             'carts.id as cartid',
                             'carts.qty',
                             DB::raw('(tickets.price*SUM(carts.qty)) as total')
                            )->groupBy('carts.tickets_id')->get();
           
            
       
        
            
        
            
        $cartitems = array('event' => $event, 'tickets' => $tickets);
          
        array_push($carts,$cartitems);
            
            
        }        
        
        return View::make('cartdetails', array('title' => $username.' | My Cart', 'carts' => $carts)); 
           
            
        
    }
    
    public function addtocart(){
        
        $trasnactionid =  Session::get('transactionid');
        $ticketid      =  Input::get('tickets_id');
        
        $cartexists = Cart::where('tickets_id' , '=', $ticketid)->where('transactions_id' , '=', $trasnactionid)->first();
        
        if($cartexists === null){
            
            $cart = new Cart;
        
            $cart->tickets_id       = $ticketid;
            $cart->events_id        = Input::get('events_id');
            $cart->qty              = Input::get('qty');
            $cart->transactions_id  = $trasnactionid;

            if($cart->save()){
                $message = Input::get('qty').' ticket(s) have been added to the cart';
                return redirect()->back()->with('success', $message);
            }
            else{
                $message = 'Ticket(s) have not been added to the cart';
                return redirect()->back()->with('error', $message);
            }
            
        }
        else{
            $updated_qty = $cartexists->qty + Input::get('qty');
            
            if($updated_qty > 10){
                $message = 'You cannot buy more than 10 tickets from one category';
                return redirect()->back()->with('error', $message);
            }
            else{
                $cartexists->qty = $updated_qty;
                
                if($cartexists->save()){
                    $message = Input::get('qty').' ticket(s) have been added to the cart';
                    return redirect()->back()->with('success', $message);
                }
                else{
                    $message = 'Ticket(s) have not been added to the cart';
                    return redirect()->back()->with('error', $message);
                }
                
            }
            
            
            
            
            
        }
        
    }
    
    public function updatecart(){

        $trasnactionid =  Session::get('transactionid');
        $ticketid      =  Input::get('tickets_id');
        
        $cart = Cart::where('tickets_id' , '=', $ticketid)->where('transactions_id' , '=', $trasnactionid)->first(); 
        
        $up_qty = Input::get('qty');
        
        
        
        if($up_qty > 10 || $up_qty === 0){
            $message = 'You cannot buy more than 10 tickets or none from one category';
            return redirect(URL::to('user-cart/?cart=updated=false'))->with('error', $message);
        }
        else{
            $cart->qty = $up_qty;
            if($cart->save()){            
                $message = Input::get('qty').' ticket(s) have been added to the cart';
                return redirect(URL::to('user-cart/?cart=updated=true'))->with('success', $message);
            }
            else{
                $message = 'Ticket(s) have not been added to the cart';
                return redirect(URL::to('user-cart/?cart=updated=false'))->with('error', $message); 
            }
        }
        
        
        
    }
    
    public function deletefromcart($id){
        
        $cart = Cart::where('id' , '=', $id)->first();
        
        if ($cart->delete()){
            $message = 'ticket(s) have been deleted from cart';
            return redirect(URL::to('user-cart/?cart=delete=true'))->with('success', $message);
        }
        else{
            $message = 'Ticket(s) cannot be delete';
            return redirect(URL::to('user-cart/?cart=delete=false'))->with('error', $message); 
        }
    }
    
    
    
    
}
