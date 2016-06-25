@extends('backend.layout')

@section('content')

<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Use [para] tag before adding a new paragraph in description.
  <br>
  <strong>Info!</strong> Image resolution should be 960 X 370 px.
</div>

<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('members-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Members</a> 

<form role="form" action="{{ URL::to('members-edit-details/'.$member->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Member
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="fulname" placeholder="Full Name" value="{{$member->fullname}}" required>
    </div>
</div>
</div>

<div class="row">

<div class="col-md-12">
<div class="form-group">
    
{{ Form::select(
    'designations_id',
    $designations,
    $member->designations_id,
    array('class' => 'form-control','required' => 'required')
    ) 
}}

</div> 
</div>
    
</div>
    
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">        
        <input type="text" class="form-control" name="year" placeholder="Year" value="{{$member->year}}" required>
    </div>
</div>
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="message" placeholder="Member Message">{{$member->message}}</textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$member->email}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="{{$member->contact}}" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="facebook" placeholder="FB Link" value="{{$member->facebook}}">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="twitter" placeholder="Twitter Link" value="{{$member->twitter}}" >
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="linkedin" placeholder="LinkedIn Link" value="{{$member->linkedin}}" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="google" placeholder="Google+ Link" value="{{$member->google}}" >
    </div>
</div>
</div>
    
{{ csrf_field() }} 

<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Member</button>
</div>
</div>

    
</form>
    
</div>

<div class="col-md-4 ws-formpanel-container">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Options</span>
@if(Session::get('DELETE') == "on")    
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('members-delete-details/'.$member->id) }}" data-message = "Are you sure you want to delete this member?" data-toggle="modal" data-target="#meesageModel">Delete</a>
@endif
</div>
    
<div class="panel-body ws-formpanel-body">
    
<form id="{{'checkform'.$member->id}}" action="{{ URL::to('members-edit-status/'.$member->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
    
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this member?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($member->status == "on")
<input id="status" data-id="{{$member->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$member->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
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
@if ($member->imagestate == "true" && Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('members-delete-image/'.$member->id) }}" data-message = "Are you sure you want to delete this image?" data-toggle="modal" data-target="#meesageModel">Delete Image</a>
@endif

</div>
    
<div class="panel-body ws-formpanel-body">
@if ($member->imagestate == "true")
<div class="row">
<img class="ws-form-imagepreview" src="{{ asset($member->imagepath) }}">
</div>
@else
<div class="alert alert-warning fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> {{ $member->imagepath }}
</div>
@endif

    
@if ($member->imagestate == "false" || $member->imagestate == NULL)
<form action="{{ URL::to('members-edit-image/'.$member->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
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
        
</div>


@stop