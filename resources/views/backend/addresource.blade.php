@extends('backend.layout')

@section('content')

<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Indicates a neutral informative change or action.
</div>

<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('resources-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Resources</a>

<form role="form" action="{{ URL::to('resources-add-details') }}" method="post"  class="ws-form" enctype="multipart/form-data">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Resource
<button type="submit" class="ws-form-action-btn">Save Resource</button>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="resource" autocomplete="off" placeholder="Resource Name" required>
    </div>
</div>
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">        
        <textarea class="form-control textarea" name="description" placeholder="Description" cols="20" wrap="hard"></textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Resource Image</label>
        <input type="file" class="form-control" name="image[]" multiple="">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Resource Files</label>
        <input type="file" class="form-control" name="resource[]" multiple="">
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


@stop