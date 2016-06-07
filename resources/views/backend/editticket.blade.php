@extends('backend.layout')

@section('content')

<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('tickets-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Tickets</a> 

<form role="form" action="{{ URL::to('tickets-edit-details/'.$ticket->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Ticket
<a href="" class="ws-form-action-btn hidden-xs">Preview</a>
</h2>
    
<label class="font-main font-15px-600">Ticket Category</label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="category" placeholder="Ticket Category" value="{{$ticket->category}}" required>
    </div>
</div>
</div>

     
<div class="row">
<div class="col-md-4">
<label class="font-main font-15px-600">Ticket Price</label> 
    <div class="form-group">
        <input type="text" class="form-control" name="price" required placeholder="Ticket Price" value="{{$ticket->price}}">
    </div>
</div>
<div class="col-md-4">
<label class="font-main font-15px-600">Total Issued Tickets</label> 
    <div class="form-group">
        <input type="text" class="form-control" name="no_of_total" required placeholder="Total Issued Tickets" value="{{$ticket->no_of_total}}">
    </div>
</div>
<div class="col-md-4">
<label class="font-main font-15px-600">Total Left Tickets</label> 
    <div class="form-group">
        <input type="text" class="form-control" name="no_of_left" required placeholder="Total Left Tickets" value="{{$ticket->no_of_left}}">
    </div>
</div>
</div>

    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">Select Color</label>
        <input type="color" class="form-control" name="color" value="{{$ticket->color}}" required>
    </div>
</div>
</div>

   
{{ csrf_field() }}
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Ticket Details</button>
</div>
</div> 
</form>
    
    
</div>

<div class="col-md-4 ws-formpanel-container">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Options</span>

</div>  
    
<div class="panel-body ws-formpanel-body">
<form id="{{'checkform'.$ticket->id}}" action="{{ URL::to('tickets-edit-status/'.$ticket->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
    
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this Ticket details?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($ticket->ticket_status == "on")
<input id="status" data-id="{{$ticket->id}}" class="ws-form-inputcheck" type="checkbox" name="ticket_status" checked /> 
@else
<input id="status" data-id="{{$ticket->id}}" class="ws-form-inputcheck" type="checkbox" name="ticket_status" /> 
@endif
{{ csrf_field() }}   
</div>
    
    
</div>    
</div>  
   
</form>  
</div>
</div>       
   
</div>


@stop