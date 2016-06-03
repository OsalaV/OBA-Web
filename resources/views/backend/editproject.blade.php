@extends('backend.layout')

@section('content')

<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('projects-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Projects</a>

<form role="form" action="{{ URL::to('projects-edit-details/'.$project->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Project
<a href="{{ URL::to('projects-show/'.$project->id) }}" class="ws-form-action-btn hidden-xs">Preview</a>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Project Title" value="{{$project->title}}" required>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Project Description" required>{{$project->description}}</textarea>
    </div>
</div>
</div>

{{ csrf_field() }} 
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Project</button>
</div>
</div>
</form>
    
    
</div>
    
    
<div class="col-md-4 ws-formpanel-container">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Options</span>
@if(Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('projects-delete-details/'.$project->id) }}" data-message = "Are you sure you want to delete this project?" data-toggle="modal" data-target="#meesageModel">Delete</a>
@endif
</div>
    
<div class="panel-body ws-formpanel-body">

<form id="{{'checkform'.$project->id}}" action="{{ URL::to('projects-edit-status/'.$project->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
    
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this project?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($project->status == "on")
<input id="status" data-id="{{$project->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$project->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
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
@if ($project->imagestate == "true" && Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('projects-delete-image/'.$project->id) }}" data-message = "Are you sure you want to delete this image?" data-toggle="modal" data-target="#meesageModel">Delete Image</a>
@endif

</div>
    
<div class="panel-body ws-formpanel-body">
@if ($project->imagestate == "true")
<div class="row">
<img class="ws-form-imagepreview" src="{{ asset($project->imagepath) }}">
</div>
@else
<div class="alert alert-warning fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> {{ $project->imagepath }}
</div>
@endif

    
@if ($project->imagestate == "false" || $project->imagestate == NULL)
<form action="{{ URL::to('projects-edit-image/'.$project->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
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
@if ($project->resourcestate == "true" && Session::get('DELETE') == "on")    
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('projects-delete-resource/'.$project->id) }}" data-message = "Are you sure you want to delete this resource?" data-toggle="modal" data-target="#meesageModel">Delete Resource</a>    
@endif

</div>
    
<div class="panel-body ws-formpanel-body">
@if ($project->resourcestate == "true")
<div class="row">
<a href="{{ URL::to('projects-download-resource/'.$project->id) }}" class="ws-form-action-btn-green pull-right hidden-xs">Download Resource Files</a>
</div>
@else
<div class="alert alert-warning fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> {{ $project->resourcepath }}
</div>
@endif

    
@if ($project->resourcestate == "false" || $project->resourcestate == NULL)
<form action="{{ URL::to('projects-edit-resource/'.$project->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
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