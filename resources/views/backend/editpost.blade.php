@extends('backend.layout')

@section('content')

<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Use [para] tag before adding a new paragraph in description.
  <br>
  <strong>Info!</strong> Image resolution should be 960 X 370 px.
</div>

<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('posts-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Posts</a>
   
    
<form id="{{'postform'.$post->id}}" action="{{ URL::to('posts-show') }}" method="get" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="postid" value="{{$post->id}}" />    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Post
<a id="post" data-id="{{$post->id}}" class="ws-form-action-btn hidden-xs">Preview</a>
</h2>     
</form>


<form role="form" action="{{ URL::to('posts-edit-details/'.$post->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{$post->title}}" required>
    </div>
</div>
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Write something here" required maxlength="8000" cols="20" wrap="hard">{{$post->description}}</textarea>
    </div>
</div>
</div>
    
 {{ csrf_field() }} 
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Post</button>
</div>
</div>
</form>
    
    
</div>
    
<div class="col-md-4 ws-formpanel-container">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Options</span>
@if(Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('posts-delete-details/'.$post->id) }}" data-message = "Are you sure you want to delete this post?" data-toggle="modal" data-target="#meesageModel">Delete</a>
@endif   
</div>
    
<div class="panel-body ws-formpanel-body">
    
<form id="{{'checkform'.$post->id}}" action="{{ URL::to('posts-edit-status/'.$post->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
 
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this post?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($post->status == "on")
<input id="status" data-id="{{$post->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$post->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
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
@if ($post->imagestate == "true" && Session::get('DELETE') == "on")
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('posts-delete-image/'.$post->id) }}" data-message = "Are you sure you want to delete this image?" data-toggle="modal" data-target="#meesageModel">Delete Image</a>  
@endif

</div>
    
<div class="panel-body ws-formpanel-body">
@if ($post->imagestate == "true")
<div class="row">
<img class="ws-form-imagepreview" src="{{ asset($post->imagepath) }}">
</div>
@else
<div class="alert alert-warning fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> {{ $post->imagepath }}
</div>
@endif

    
@if ($post->imagestate == "false" || $post->imagestate == NULL)
<form action="{{ URL::to('posts-edit-image/'.$post->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
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