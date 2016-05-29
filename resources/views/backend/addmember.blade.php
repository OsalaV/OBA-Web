@extends('backend.layout')

@section('content')


<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><strong>Info!</strong> Member Image size should be 270 x 290 px</p>
</div>

<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('members-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Members</a> 
    

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

<div class="col-md-12">
<div class="form-group">
    
{{ Form::select(
    'designations_id',
    $designations,
    null,
    array('class' => 'form-control','required' => 'required')
    ) 
}}
    

</div> 
</div>
    
</div>

<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="year" placeholder="Year" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label class="font-main font-15px-600">Member Image</label>
        <input type="file" class="form-control" name="image[]" placeholder="Member Image" multiple="" required>       
    </div>
</div>
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="message" placeholder="Message"></textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" placeholder="Contact Number" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="facebook" placeholder="Facebook Link" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="twitter" placeholder="Twitter Link" >
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="linkedin" placeholder="LinkedIn Link" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="google" placeholder="Google+ Link" >
    </div>
</div>
</div>
    
   
{{ csrf_field() }} 
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Member</button>
</div>
</div>


    
</form>
    
</div>


@stop