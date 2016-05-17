@extends('backend.layout')

@section('content')

<div class="col-md-8 ws-form-container">

<form role="form" class="ws-form">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Project
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
        <label class="font-main font-15px-600">Project Image</label>
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
    
    
<div class="col-md-4 ws-formpanel-container">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Options</span>
<a href="" class="ws-form-action-btn pull-right">Preview</a>
<a href="" class="ws-form-action-btn-red pull-right">Delete</a>
</div>
    
<div class="panel-body ws-formpanel-body">


<form class="ws-form">
 
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this project?</span> </div>
<div class="pull-right ws-form-check text-center">
<input type="checkbox" />    
</div>
</div>    
</div>
    
<div class="row">
<div class="form-group">
<a href="" class="ws-form-action-btn pull-right">Save</a>
</div>
</div>
    
</form>
    

</div>
</div>
    
    
</div>


@stop