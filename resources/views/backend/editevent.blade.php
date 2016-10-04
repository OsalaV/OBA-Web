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

    
@if($event->type == 'parade')
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Event
<a href="{{ URL::to('psycho-parade') }}" class="ws-form-action-btn hidden-xs">Preview</a>
</h2>
@elseif($event->type == 'public')
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Event
<a href="{{ URL::to('events-public/'.str_replace(' ', '_', $event->title)) }}" class="ws-form-action-btn hidden-xs">Preview</a>
</h2>
@else
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Event
<a href="{{ URL::to('events-school/'.str_replace(' ', '_', $event->title)) }}" class="ws-form-action-btn hidden-xs">Preview</a>
</h2>
@endif
    
    
    
<form role="form" action="{{ URL::to('events-edit-details/'.$event->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Event Title" value="{{$event->title}}" required>
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
    $event->type,
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
    $event->month,
    array('class' => 'form-control','required' => 'required')
    ) 
}}
</div> 
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="day" required placeholder="Day" value="{{$event->day}}">
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="year" required placeholder="Year" value="{{$event->year}}">
    </div>
</div>
</div>
    

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="time" placeholder="Event Time" value="{{$event->time}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="location" placeholder="Location" value="{{$event->location}}" required>
    </div>
</div>
</div>

<div class="row">

</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Event Description" required>{{$event->description}}</textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="facebook" placeholder="Facebook Link" value="{{$event->facebook}}" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="twitter" placeholder="Twitter Link" value="{{$event->twitter}}" >
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="instagram" placeholder="Instagram Link" value="{{$event->instagram}}" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="google" placeholder="Google+ Link" value="{{$event->google}}" >
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="font-main font-15px-600">Add a video to this event   </label>
    <input type="url" class="form-control" name="video" placeholder="Embeded Youtube Link" value="{{$event->video}}" >
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
    
    
<div class="row ws-imgpanel">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Event Images</span>
</div>
    
    
<div class="panel-heading ws-formpanel-heading">

<form action="{{ URL::to('events-edit-albumimages') }}" method="post" class="ws-form" enctype="multipart/form-data">
 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">Add new images</label>
        <input type="file" class="form-control" name="eventimages[]" multiple="" required>
        <input type="hidden" name="events_id" value="{{$event->id}}" required>
    </div>
</div>    
</div>

{{ csrf_field() }} 
    
<div class="row">
<div class="form-group" style="padding-right:15px;">
<button type="submit" class="ws-form-action-btn pull-right">Save</button>
</div>
</div>
    
</form>
    
</div>
    
    
    
    
<div class="panel-body ws-formpanel-body">


<div class="row">
@foreach($eventimages as $eventimage)
<div class="col-md-3 ws-imgpreview-bx">

@if(Session::get('DELETE') == "on")
<a class="ws-open-msg pull-right" href="{{ URL::to('events-delete-albumimage/'.$eventimage->id) }}" >
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
@endif
    
<img class="ws-form-imagepreview" src="{{ asset($eventimage->img_path) }}">  
    
</div>    
@endforeach    

</div>
   

</div>
</div>    
    
</div>
    
    
<div class="row ws-imgpanel">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Event Sponsers &nbsp;&nbsp;</span>

<form id="{{'checkform'.$event->id}}" action="{{ URL::to('events-set-sponserstate/'.$event->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
    

<div class="form-group">    
<div class="text-center">
@if($event->sponserstate == "on")
<input id="status" data-id="{{$event->id}}" class="ws-form-inputcheck" type="checkbox" name="sponserstate" checked /> 
@else
<input id="status" data-id="{{$event->id}}" class="ws-form-inputcheck" type="checkbox" name="sponserstate" /> 
@endif
{{ csrf_field() }}   
</div>    
    
</div> 
</form> 


</div>
  
<!--  sdkmd-->
       
    
<div class="panel-heading ws-formpanel-heading col-md-4">

<form action="{{ URL::to('events-edit-sponser/'.$platinumsponser->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
   
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">PLATINUM SPONSER (390x400)</label>
    </div>
</div>    
</div>
    
<div class="row ws-imgpreview-bxadd">    
@if ($platinumsponser->imagestate == "true")
<img class="ws-form-imagepreview" src="{{ asset($platinumsponser->imagepath) }}">
@else
<img class="ws-form-imagepreview" src="{{ asset('images/icons/img-preview.png') }}">
@endif
</div>   

    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="file" class="form-control" name="image[]" multiple="">
    </div>
</div>    
</div>   
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">Valid Period</label>
        <input type="text" class="form-control" name="valid_period" value="{{$platinumsponser->valid_period}}">
    </div>
</div>    
</div>
    
<div class="row">
<div class="col-md-12">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this sponser?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($platinumsponser->status == "on")
<input id="status" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
</div>
    
    
</div>
</div>
</div>


{{ csrf_field() }} 
    
<div class="row">
<div class="form-group" style="padding-right:15px;">
<button type="submit" class="ws-form-action-btn pull-right">Save</button>
</div>
</div>
    
</form>
    
</div>
    
<div class="panel-heading ws-formpanel-heading col-md-4">

<form action="{{ URL::to('events-edit-sponser/'.$goldsponser->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
   
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">GOLD SPONSER<br> (390x300)</label>
    </div>
</div>    
</div>
    
<div class="row ws-imgpreview-bxadd">   
@if ($goldsponser->imagestate == "true")
<img class="ws-form-imagepreview" src="{{ asset($goldsponser->imagepath) }}">
@else
<img class="ws-form-imagepreview" src="{{ asset('images/icons/img-preview.png') }}">
@endif
</div>
    
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="file" class="form-control" name="image[]" multiple="">
    </div>
</div>    
</div>   
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">Valid Period</label>
        <input type="text" class="form-control" name="valid_period" value="{{$goldsponser->valid_period}}">
    </div>
</div>    
</div>
    
<div class="row">
<div class="col-md-12">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this sponser?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($goldsponser->status == "on")
<input id="status" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
</div>
    
    
</div>
</div>
</div>


{{ csrf_field() }} 
    
<div class="row">
<div class="form-group" style="padding-right:15px;">
<button type="submit" class="ws-form-action-btn pull-right">Save</button>
</div>
</div>
    
</form>
    
</div> 
    
<div class="panel-heading ws-formpanel-heading col-md-4">

<form action="{{ URL::to('events-edit-sponser/'.$silversponser->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
   
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">SILVER SPONSER<br> (390x200)</label>
    </div>
</div>    
</div>
    
<div class="row ws-imgpreview-bxadd">   
@if ($silversponser->imagestate == "true")
<img class="ws-form-imagepreview" src="{{ asset($silversponser->imagepath) }}">
@else
<img class="ws-form-imagepreview" src="{{ asset('images/icons/img-preview.png') }}">
@endif
</div>
    
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="file" class="form-control" name="image[]" multiple="">
    </div>
</div>    
</div>   
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">Valid Period</label>
        <input type="text" class="form-control" name="valid_period" value="{{$silversponser->valid_period}}">
    </div>
</div>    
</div>
    
<div class="row">
<div class="col-md-12">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this sponser?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($silversponser->status == "on")
<input id="status" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
</div>
    
    
</div>
</div>
</div>


{{ csrf_field() }} 
    
<div class="row">
<div class="form-group" style="padding-right:15px;">
<button type="submit" class="ws-form-action-btn pull-right">Save</button>
</div>
</div>
    
</form>
    
</div> 
    
    

</div>    
    
</div>
    
  
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