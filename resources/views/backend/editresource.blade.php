@extends('backend.layout')

@section('content')

<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('resources-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Resources</a>

<form role="form" action="{{ URL::to('resources-edit-details/'.$resource->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Resource
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="resource" autocomplete="off" placeholder="Resource Name" required value="{{$resource->resource}}">
    </div>
</div>
</div>
    
<div class="row">

<div class="col-md-12">
<div class="form-group">
    
{{ Form::select(
    'type',
    array('' => 'Select Resource Type','advertisement' => 'Advertisement', 'banner' => 'Banner', 'membershipform' => 'Membership Form', 'others' => 'Others'),
    $resource->type,
    array('class' => 'form-control','required' => 'required')
    ) 
}}

</div> 
</div>
    
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">        
        <textarea class="form-control textarea" name="description" placeholder="Description" maxlength="8000" cols="20" wrap="hard">{{$resource->description}}</textarea>
    </div>
</div>
</div>
    
{{ csrf_field() }}
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Resource</button>
</div>
</div>


    
</form>
    
</div>

<div class="col-md-4 ws-formpanel-container">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Options</span>
@if(Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('resources-delete-details/'.$resource->id) }}" data-message = "Are you sure you want to delete this resource?" data-toggle="modal" data-target="#meesageModel">Delete</a>
@endif
</div>  
    
<div class="panel-body ws-formpanel-body">
<form id="{{'checkform'.$resource->id}}" action="{{ URL::to('resources-edit-status/'.$resource->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
    
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this resource?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($resource->status == "on")
<input id="status" data-id="{{$resource->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$resource->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
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
@if ($resource->imagestate == "true" && Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('resources-delete-image/'.$resource->id) }}" data-message = "Are you sure you want to delete this image?" data-toggle="modal" data-target="#meesageModel">Delete Image</a>
@endif

</div>
    
<div class="panel-body ws-formpanel-body">
@if ($resource->imagestate == "true")
<div class="row">
<img class="ws-form-imagepreview" src="{{ asset($resource->imagepath) }}">
</div>
@else
<div class="alert alert-warning fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> {{ $resource->imagepath }}
</div>
@endif

    
@if ($resource->imagestate == "false" || $resource->imagestate == NULL)
<form action="{{ URL::to('resources-edit-image/'.$resource->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
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
@if ($resource->resourcestate == "true" && Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('resources-delete-resource/'.$resource->id) }}" data-message = "Are you sure you want to delete this resource file?" data-toggle="modal" data-target="#meesageModel">Delete Resource</a>
@endif

</div>
    
<div class="panel-body ws-formpanel-body">
@if ($resource->resourcestate == "true")
<div class="row">
<a href="{{ URL::to('resources-download-resource/'.$resource->id) }}" class="ws-form-action-btn-green pull-right hidden-xs">Download Resource Files</a>
</div>
@else
<div class="alert alert-warning fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> {{ $resource->resourcepath }}
</div>
@endif

    
@if ($resource->resourcestate == "false" || $resource->resourcestate == NULL)
<form action="{{ URL::to('resources-edit-resource/'.$resource->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
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