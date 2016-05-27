@extends('backend.layout')

@section('content')

<div class="col-md-8 ws-form-container">

<form role="form" action="{{ URL::to('events-edit-details/'.$event->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Event
<a href="" class="ws-form-action-btn hidden-xs">Preview</a>
<a href="{{ URL::to('activity-log-last/'.'event'.'/'.$event->id) }}" class="ws-form-action-btn hidden-xs">Log Details</a>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Event Title" value="{{$event->title}}" required>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Event Date</label> -->
        <input type="text" class="form-control" name="date" placeholder="Event Date" value="{{$event->date}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Starting Time</label> -->
        <input type="text" class="form-control" name="time" placeholder="Event Time" value="{{$event->time}}" required>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="location" placeholder="Location" value="{{$event->location}}" required>
    </div>
</div>
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Event Description" required>{{$event->description}}</textarea>
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

<div class="col-md-4 ws-formpanel-container">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Options</span>
@if(Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('events-delete-details/'.$event->id) }}" data-message = "Are you sure you want to delete this event?" data-toggle="modal" data-target="#meesageModel">Delete</a>
@endif
</div>  
    
<div class="panel-body ws-formpanel-body">
<form id="{{'checkform'.$event->id}}" action="{{ URL::to('events-edit-status/'.$event->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
    
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this event?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($event->status == "on")
<input id="status" data-id="{{$event->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$event->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
{{ csrf_field() }}   
</div>
    
    
</div>    
</div>  
   
</form>  
</div>
</div>
   
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Image Settings</span>
@if ($event->imagestate == "true" && Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('events-delete-image/'.$event->id) }}" data-message = "Are you sure you want to delete this image?" data-toggle="modal" data-target="#meesageModel">Delete Image</a>
@endif

</div>
    
<div class="panel-body ws-formpanel-body">
@if ($event->imagestate == "true")
<div class="row">
<img class="ws-form-imagepreview" src="{{ asset($event->imagepath) }}">
</div>
@else
<div class="alert alert-warning fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> {{ $event->imagepath }}
</div>
@endif

    
@if ($event->imagestate == "false" || $event->imagestate == NULL)
<form action="{{ URL::to('events-edit-image/'.$event->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">Add new image</label>
        <input type="file" class="form-control" name="image[]" multiple="" required>
    </div>
</div>    
</div>

{{ csrf_field() }} 
    
<div class="row">
<div class="form-group">
<button type="submit" class="ws-form-action-btn pull-right">Save</button>
</div>
</div>
    
</form>
@endif    

</div>
</div> 
    
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Resource Settings</span>
@if ($event->resourcestate == "true" && Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('events-delete-resource/'.$event->id) }}" data-message = "Are you sure you want to delete this resource file?" data-toggle="modal" data-target="#meesageModel">Delete Resource</a>
@endif

</div>
    
<div class="panel-body ws-formpanel-body">
@if ($event->resourcestate == "true")
<div class="row">
<a href="{{ URL::to('events-download-resource/'.$event->id) }}" class="ws-form-action-btn-green pull-right hidden-xs">Download Resource Files</a>
</div>
@else
<div class="alert alert-warning fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> {{ $event->resourcepath }}
</div>
@endif

    
@if ($event->resourcestate == "false" || $event->resourcestate == NULL)
<form action="{{ URL::to('events-edit-resource/'.$event->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">Add new resource</label>
        <input type="file" class="form-control" name="resource[]" multiple="" required>
    </div>
</div>    
</div>
 
{{ csrf_field() }} 
    
<div class="row">
<div class="form-group">
<button type="submit" class="ws-form-action-btn pull-right">Save</button>
</div>
</div>
    
</form>
@endif    

</div>
</div>    
   
</div>


@stop