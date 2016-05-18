@extends('backend.layout')

@section('content')


<div class="col-md-8 ws-form-container">

<form role="form" action="{{ URL::to('posts-edit-save/'.$post->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Post
<button type="submit" class="ws-form-action-btn">Save Post</button>
</h2>
    
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
        <textarea class="form-control textarea" name="description" placeholder="Write something here" required>{{$post->description}}</textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600 pull-right">Add Photo/Video</label>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">        
        <input type="file" class="form-control" name="postimage">
    </div>
</div>
</div>
    

    
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
<a href="" class="ws-form-action-btn pull-right">Preview</a>
<a href="{{ URL::to('posts-delete/'.$post->id) }}" class="ws-form-action-btn-red pull-right">Delete</a>
</div>
    
<div class="panel-body ws-formpanel-body">


<form class="ws-form" action="{{ URL::to('posts-edit-status/'.$post->id) }}" method="post" enctype="multipart/form-data">
 
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this post?</span> </div>
<div class="pull-right ws-form-check text-center">
<?php if($post->status == "on") { ?>
<input type="checkbox" name="status" checked/>
<?php } else { ?>
<input type="checkbox" name="status"/>
<?php } ?> 
</div>
</div>    
</div>
    
<div class="row">
<div class="form-group">
<button type="submit" class="ws-form-action-btn pull-right">Save</button>
</div>
</div>
    
</form>
    

</div>
</div>
    
    
</div>




@stop