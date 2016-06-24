@extends('backend.layout')

@section('content')

<div class="col-md-8 ws-form-container">

<a href="{{ URL::to('tickets-show/'.$eventid) }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a> 
    
<form role="form" action="{{ URL::to('tickets-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Ticket
<button type="submit" class="ws-form-action-btn">Save Ticket</button>
</h2>
    
    
<div class="row">
<div class="col-md-12">
<div class="form-group">
<input type="hidden" class="form-control" name="events_id" value="{{$eventid}}" required>
</div> 
</div>    
</div>
   

<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="category" placeholder="Ticket Category" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="price" placeholder="Ticket Price" required>
    </div>
</div>
</div>
 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="no_of_total" placeholder="Total Tickets" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">Select Color</label>
        <input type="color" class="form-control" name="color" required>
    </div>
</div>
</div>
    
    
{{ csrf_field() }}
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Ticket</button>
</div>
</div>


    
</form>
    
</div>


@stop