@extends('backend.layout')

@section('content')

<div class="col-md-8 ws-form-container">

<form role="form" class="ws-form">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Post
<button type="submit" class="ws-form-action-btn">Save Post</button>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Title" required>
    </div>
</div>
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Write something here" required></textarea>
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


@stop