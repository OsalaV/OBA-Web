@extends('backend.layout')

@section('content')

<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Indicates a neutral informative change or action.
</div>

<div class="col-md-8 ws-form-container">

<form role="form" action="{{ URL::to('branches-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Branch
<button type="submit" class="ws-form-action-btn">Save Branch</button>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="branch" placeholder="Branch Name" required>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Event Date</label> -->
        <input type="text" class="form-control" name="address_line1" placeholder="Branch Address 1" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Starting Time</label> -->
        <input type="text" class="form-control" name="address_line2" placeholder="Branch Address 2" required>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="address_line3" placeholder="Branch Address 3">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email">
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" placeholder="Contact">
    </div>
</div>
</div>

    
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <textarea class="form-control textarea" name="description" placeholder="Branch Description"></textarea>
        </div>
    </div>
</div>
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Event</button>
</div>
</div>


    
</form>
    
</div>


@stop