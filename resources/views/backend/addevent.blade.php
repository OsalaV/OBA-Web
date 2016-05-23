@extends('backend.layout')

@section('content')

<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Indicates a neutral informative change or action.
</div>

<div class="col-md-8 ws-form-container">

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
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Event Date</label> -->
        <input type="text" class="form-control" name="date" placeholder="Event Date" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Starting Time</label> -->
        <input type="text" class="form-control" name="time" placeholder="Event Time" required>
    </div>
</div>
</div>

<div class="row">
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
        <textarea class="form-control textarea" name="description" placeholder="Event Description" required></textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Event</button>
</div>
</div>


    
</form>
    
</div>


@stop