@extends('backend.layout')

@section('content')

<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Use [para] tag before adding a new paragraph in description.
  <br>
  <strong>Info!</strong> Image resolution should be 960 X 370 px.
</div>

<div class="col-md-8 ws-form-container">

<a href="{{ URL::to('events-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Events</a> 
    
<form role="form" action="{{ URL::to('events-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Event
<button type="submit" class="ws-form-action-btn">Save Event</button>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Event Title" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="font-main font-15px-600">Select Event Type</label>
    
{{ Form::select(
    'type',
    array('' => 'Select Event Type','public' => 'Public Event', 'private' => 'Shool Event'),
    null,
    array('class' => 'form-control','required' => 'required')
    ) 
}}

</div> 
</div>    
</div>

<label class="font-main font-15px-600">Event Date</label> 
<div class="row">
<div class="col-md-3">
<div class="form-group">

{{ Form::select(
    'month',
    array('Jan' => 'January','Feb' => 'February', 'Mar' => 'March', 'Apr' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'Aug' => 'August', 'Sept' => 'September', 'Oct' => 'October', 'Nov' => 'November', 'Dec' => 'December'),
    null,
    array('class' => 'form-control','required' => 'required')
    ) 
}}
    
</div> 
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="day" required placeholder="Day">
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="year" required placeholder="Year">
    </div>
</div>
</div>
   

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="time" placeholder="Event Time" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="location" placeholder="Location" required>
    </div>
</div>
</div>

    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Cover Image</label>
        <input type="file" class="form-control" name="image[]" placeholder="Cover Image"   multiple="" required>

        
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Resource Files</label>
        <input type="file" class="form-control" name="resource[]" placeholder="Resources" multiple="" >
    </div>
</div>
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Event Description" maxlength="8000" cols="20" wrap="hard" required></textarea>
    </div>
</div>
</div>
 
    
<div class="row">
<div class="col-md-12">
  
<div class="form-group">
<label class="font-main font-15px-600">Add images to this event   
</label>
<input type="file" class="form-control" name="eventimages[]" multiple="">
</div> 

</div>
</div>   
    
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="facebook" placeholder="Facebook Link" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="twitter" placeholder="Twitter Link" >
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="instagram" placeholder="Instagram Link" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="google" placeholder="Google+ Link" >
    </div>
</div>
</div>

    
    
{{ csrf_field() }}
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Event</button>
</div>
</div>


    
</form>
    
</div>


@stop