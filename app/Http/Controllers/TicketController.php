<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EventController;

use App\Event;
use App\Ticket;

use Illuminate\Support\Facades\Request;

use View;
use Session;
use Input;
use Redirect;
use Validator;
use Response;
use Auth;
use File;
use URL;
use DB;

class TicketController extends Controller
{
    
    public function __construct()
	{        
        $this->middleware('auth');
	}
    
    
    public function index()
    {        
        $publicevents   =  EventController::getpublicevents(); 
        
        return View::make('backend/tickets', array('title' => 'Tickets', 'pubevents' => $publicevents));
    }
    
    public function edit($id) //event id
    {   
        $events = Event::where('id' , '=', $id)->first(); 
        
//        $tickets = Ticket::where('events_id' , '=', $id)->get();
        
        $tickets = DB::table('tickets')->where('events_id' , '=', $id)->select('*', DB::raw('(no_of_total-no_of_left) as no_of_sold'))->get();
        
        $amounts = DB::table('tickets')->where('events_id' , '=', $id)->select( DB::raw('SUM(price*(no_of_total-no_of_left)) as profit'))->get();
        
//        $tickets = DB::table('tickets')
//                      ->join('events', 'tickets.id', '=', 'events.id')
//                      ->where('tickets.id' , '=', $id)
//                      ->select('tickets.id', 'tickets.category', 'tickets.price', 'tickets.no_of_total', 'tickets.no_of_total -tickets.no_of_left as no_of_sold' , 'tickets.no_of_left', 'tickets.ticket_status' , 'events.id as eventid')->get();
        
        return View::make('backend/viewticket', array('title' => 'Tickets Management', 'tickets' => $tickets, 'events' => $events, 'amounts' => $amounts));
    }
    
    public function create($id)
    {
        $ticket = Event::where('id' , '=', $id)->first();
        
        return View::make('backend/addtickets', array('title' => 'Tickets | Add Tickets', 'ticket' => $ticket));
    }
    
    
    public function editview($id)
    {   
        $ticket = Ticket::where('id' , '=', $id)->first();
        return View::make('backend/editticket', array('title' => 'Tickets Management', 'ticket' => $ticket));
    }
    
    public function store()
    {
        
        $ticket = new Ticket;
        
        $id = Input::get('events_id');
        
        $ticket->category      = Input::get('category');
        $ticket->price         = Input::get('price');
        $ticket->no_of_total   = Input::get('no_of_total'); 
        $ticket->no_of_left    = Input::get('no_of_total'); 
        $ticket->color         = Input::get('color');
        $ticket->events_id     = $id;
        
        
        
        if($ticket->save()){
            //save activity
//            $activity_task = "Event : ".$event->title." has been added";
//            $activity_type = "event";
//            $connection_id = $event->id;
//            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect('tickets-add/'.$id.'?save=success==true')->with('success', 'Ticket details were successfully added');
        }
        else{
            return redirect('tickets-add/'.$id.'?save=success==false')->with('error', 'Ticket details were not successfully added');
        }
        
        
    }
    
    public function update($id){
        
        $ticket = Ticket::where('id' , '=', $id)->first(); 
        
        $ticket->category      = Input::get('category');
        $ticket->price         = Input::get('price');
        $ticket->no_of_total   = Input::get('no_of_total'); 
        $ticket->no_of_left    = Input::get('no_of_total'); 
        $ticket->color         = Input::get('color');
        
        if($ticket->save()){
            //save activity
//            $activity_task = "Event : ".$event->title." details has been changed";
//            $activity_type = "event";
//            $connection_id = $event->id;
//            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity            
            
            return redirect(URL::to('tickets-edit/'.$id.'?edit=success==true'))->with('success', 'Ticket details were successfully edited');  
        }
        else{
            return redirect(URL::to('tickets-edit/'.$id.'?edit=success==false'))->with('error', 'Ticket details were not successfully edited');
        }        
        
    }
    
    public function updatestatus($id){
        
        $ticket = Ticket::where('id' , '=', $id)->first(); 
        
                
        $ticket->ticket_status  = Input::get('ticket_status');
        
        if($ticket->save()){
            //save activity
//            $activity_task = "Event : ".$event->title." status has been changed";
//            $activity_type = "event";
//            $connection_id = $event->id;
//            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('tickets-edit-view/'.$id.'?status=changes==true'))->with('success', 'Ticket status was successfully edited');
        }
        else{
            return redirect(URL::to('tickets-edit-view/'.$id.'?status=changes==false'))->with('error', 'Ticket status was not successfully edited');           
        }        
        
    }
    
    
    
}