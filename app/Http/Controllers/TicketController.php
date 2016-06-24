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
        $this->middleware('admin');
	}
    
    
    public function index()
    {        
        $publicevents = Event::where('type' , '=', 'public')->orderBy('id', 'desc')->paginate(25); 
        
        return View::make('backend/tickets', array('title' => 'Tickets', 'pubevents' => $publicevents));
    }
    
    public function show($id)
    {   
        $event = Event::where('id' , '=', $id)->first(); 
        
        $tickets = DB::table('tickets')->where('events_id' , '=', $id)->select('*', DB::raw('(no_of_total-no_of_left) as no_of_sold'))->get();
        
        $amounts = DB::table('tickets')->where('events_id' , '=', $id)->select( DB::raw('SUM(price*(no_of_total-no_of_left)) as profit'))->get();
        
        
        return View::make('backend/viewticket', array('title' => 'Tickets | '.$event->title, 'tickets' => $tickets, 'event' => $event, 'amounts' => $amounts));
    }
    
    public function create($id)
    {        
        return View::make('backend/addtickets', array('title' => 'Tickets | Add Tickets', 'eventid' => $id));
    }
    
    
    public function edit($id)
    {   
        $ticket = Ticket::where('id' , '=', $id)->first();
        return View::make('backend/editticket', array('title' => 'Tickets | Edit Tickets', 'ticket' => $ticket));
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
        $ticket->ticket_status = 'on';
        $ticket->events_id     = $id;
        
        $event = Event::where('id' , '=', $id)->first(); 
        
        if($ticket->save()){
            //save activity
            $activity_task = "Ticket : ".$ticket->category." category has been added to event - ".$event->title;
            $activity_type = "ticket";
            $connection_id = $ticket->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect('tickets-add/'.$id.'?save=success==true')->with('success', 'Ticket details were successfully added');
        }
        else{
            return redirect('tickets-add/'.$id.'?save=success==false')->with('error', 'Ticket details were not successfully added');
        }
        
        
    }
    
    public function update($id){
        
        $ticket = Ticket::where('id' , '=', $id)->first(); 
        $event = Event::where('id' , '=', $ticket->events_id)->first(); 
        
        $ticket->category      = Input::get('category');
        $ticket->price         = Input::get('price');
        $ticket->color         = Input::get('color');

        if($ticket->save()){
            //save activity
            $activity_task = "Ticket : ".$ticket->category." category details has been changed on event - ".$event->title;
            $activity_type = "ticket";
            $connection_id = $ticket->id; 
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity            
            
            return redirect(URL::to('tickets-edit/'.$ticket->id.'?edit=success==true'))->with('success', 'Ticket details were successfully edited');  
        }
        else{
            return redirect(URL::to('tickets-edit/'.$ticket->id.'?edit=success==false'))->with('error', 'Ticket details were not successfully edited');
        }        
        
    }
    
    public function updatetickets($id){
        
        $ticket = Ticket::where('id' , '=', $id)->first(); 
        $event = Event::where('id' , '=', $ticket->events_id)->first(); 
        
        $type      = Input::get('type');
        $newcount  = Input::get('newcount');
        
        $current_total = $ticket->no_of_total;
        $current_left  = $ticket->no_of_left;
        
        if($type == 'increment'){
            $current_total = $current_total+$newcount;
            $current_left  = $current_left+$newcount;
        }
        else{
            $current_total = $current_total-$newcount;
            $current_left  = $current_left-$newcount;
        }
        
        
        $ticket->no_of_total   = $current_total; 
        $ticket->no_of_left    = $current_left; 
        
        if($ticket->save()){
            //save activity
            $activity_task = "Ticket : ".$newcount." tickets ".$type." in event - ".$event->title;
            $activity_type = "ticket";
            $connection_id = $ticket->id; 
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity            
            
            return redirect(URL::to('tickets-edit/'.$ticket->id.'?edit=success==true'))->with('success', 'Ticket settings were successfully edited');  
        }
        else{
            return redirect(URL::to('tickets-edit/'.$ticket->id.'?edit=success==false'))->with('error', 'Ticket settings were not successfully edited');
        }     
        
    }
    
    public function updatestatus($id){
        
        $ticket = Ticket::where('id' , '=', $id)->first(); 
        $event = Event::where('id' , '=', $ticket->events_id)->first(); 
                
        $ticket->ticket_status  = Input::get('ticket_status');
        
        if($ticket->save()){
            //save activity
            $activity_task = "Ticket : ".$ticket->category." status has been changed in event - ".$event->title;
            $activity_type = "ticket";
            $connection_id = $ticket->id;
            ActivityController::store($activity_task,$activity_type,$connection_id);
            //save activity
            
            return redirect(URL::to('tickets-edit/'.$ticket->id.'?status=changes==true'))->with('success', 'Ticket status was successfully edited');
        }
        else{
            return redirect(URL::to('tickets-edit/'.$ticket->id.'?status=changes==false'))->with('error', 'Ticket status was not successfully edited');           
        }        
        
    }
    
    public function search(){
         
         $searchkey = Input::get('searchkey');      
        
         $events = Event::where('title', 'LIKE', '%'.$searchkey.'%')->where('type', '=', 'public')->orderBy('id', 'desc')->paginate(25); 
      
        
         return View::make('backend/tickets', array('title' => 'Tickets','pubevents' => $events));
        
        
    }
    
    public static function getticketdetails($id){
        
        $tickets = Ticket::where('events_id' , '=', $id)->get();
        
        return $tickets;
    }
    
    
    
}