@extends('backend.layout')

@section('content')

@if (session('alert-success'))
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> {{ session('alert-success') }}
    </div>
@endif


<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Indicates a neutral informative change or action.
</div>

<div class="col-md-8 ws-form-container">

<form role="form" action="{{ URL::to('members-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Member
<button type="submit" class="ws-form-action-btn">Save Member</button>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="fulname" placeholder="Full Name" required>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Event Date</label> -->
        <input type="text" class="form-control" name="post" placeholder="Post" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Starting Time</label> -->
        <input type="text" class="form-control" name="year" placeholder="Year" required>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <select class="form-control" name="type"> <option>Committee Member</option><option>Batch Representer</option><option>Past President</option> </select>
    </div>
</div>
</div>

    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Member Image (width = 270,height = 290px)</label>
        <input type="file" class="form-control" name="image[]" placeholder="Member Image" multiple="" required>       
    </div>
</div>
<!--
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Resource Files</label>
        <input type="file" class="form-control" name="resources[]" placeholder="Resources" multiple="" >
    </div>
</div>
-->
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="Message" placeholder="Message"></textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Event Date</label> -->
        <input type="text" class="form-control" name="contact" placeholder="Contact Number" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Starting Time</label> -->
        <input type="text" class="form-control" name="facebook" placeholder="FB Link" >
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Event Date</label> -->
        <input type="text" class="form-control" name="linkedin" placeholder="LinkedIn Link" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Starting Time</label> -->
        <input type="text" class="form-control" name="twitter" placeholder="Twitter Link" >
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <!-- <label class="font-main font-15px-600">Event Date</label> -->
        <input type="text" class="form-control" name="google" placeholder="Google Link" >
    </div>
</div>
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Member</button>
</div>
</div>


    
</form>
    
</div>


@stop