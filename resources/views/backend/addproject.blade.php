@extends('backend.layout')

@section('content')

<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Use [para] tag before adding a new paragraph in description.
  <br>
  <strong>Info!</strong> Image resolution should be 960 X 370 px.
</div>

<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('projects-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Projects</a>

<form role="form" action="{{ URL::to('projects-add-details') }}" method="post"  class="ws-form" enctype="multipart/form-data">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Project
<button type="submit" class="ws-form-action-btn">Save Project</button>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Project Title" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="tagline" placeholder="Tagline">
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Project Description" required maxlength="8000" cols="20" wrap="hard"></textarea>
    </div>
</div>
</div>

    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Project Cover Image</label>
        <input type="file" class="form-control" name="image[]" placeholder="Project Image" multiple="" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Resource Files</label>
        <input type="file" class="form-control" name="resource[]" placeholder="Resources" multiple="">
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
  
<div class="form-group">
<label class="font-main font-15px-600">Add images to this project   
</label>
<input type="file" class="form-control" name="projectimages[]" multiple="">
</div> 

</div>
</div>
    
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="font-main font-15px-600">Add a video to this project </label>
    <input type="url" class="form-control" name="video" placeholder="Embeded Youtube Link" >
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


@stop