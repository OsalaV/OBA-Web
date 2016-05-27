@extends('backend.layout')

@section('content')

<div class="col-md-8 ws-form-container">

<form role="form" action="{{ URL::to('branches-edit-details/'.$branch->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Branch
<a href="" class="ws-form-action-btn hidden-xs">Preview</a>
<a href="{{ URL::to('activity-log-last/'.'branch'.'/'.$branch->id) }}" class="ws-form-action-btn hidden-xs">Log Details</a>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="branch" placeholder="Branch Name" value="{{$branch->branch}}" required>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Event Date</label> -->
        <input type="text" class="form-control" name="address_line1" placeholder="Branch Address 1" value="{{$branch->address_line1}}" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Starting Time</label> -->
        <input type="text" class="form-control" name="address_line2" placeholder="Branch Address 2" value="{{$branch->address_line2}}" required>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="address_line3" placeholder="Branch Address 3 " value="{{$branch->address_line3}}">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{$branch->email}}">
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" placeholder="Contact" value="{{$branch->contact}}">
    </div>
</div>
</div>

    
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <textarea class="form-control textarea" name="description" placeholder="Branch Description">{{$branch->description}}</textarea>
        </div>
    </div>
</div>
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Branch</button>
</div>
</div>


    
</form>
    
</div>

<div class="col-md-4 ws-formpanel-container">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Options</span>
@if(Session::get('DELETE') == "on")  
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('branches-delete-details/'.$branch->id) }}" data-message = "Are you sure you want to delete this branch?" data-toggle="modal" data-target="#meesageModel">Delete</a>
@endif
</div>
  
    
<div class="panel-body ws-formpanel-body">


<form action="{{ URL::to('branches-edit-status/'.$branch->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this branch?</span> </div>
<div class="pull-right ws-form-check text-center">
<?php if($branch->status == "on") { ?>
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