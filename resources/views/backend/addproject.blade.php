@extends('backend.layout')

@section('content')

<div class="col-md-8 ws-form-container">

<form role="form" action="{{ URL::to('projects-add-save') }}" method="post"  class="ws-form" enctype="multipart/form-data">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Project
<button type="submit" class="ws-form-action-btn">Save Project</button>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Project Title" required>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Project Description" required></textarea>
    </div>
</div>
</div>

    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Project Image (width = 370,height = 370px)</label>
        <input type="file" class="form-control" name="projectimage" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Resource Files</label>
        <input type="file" class="form-control" name="resources[]" placeholder="Resources" multiple="">
    </div>
</div>
</div>
    

    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Project</button>
</div>
</div>
</form>
    
    
</div>


@stop