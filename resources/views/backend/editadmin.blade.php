@extends('backend.layout')

@section('content')


<div class="col-md-8 ws-form-container">

<form role="form" action="{{ URL::to('admins-edit-details/'.$admin->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Admin
<button type="submit" class="ws-form-action-btn">Save Admin</button>
<a href="{{ URL::to('admins-view') }}" class="ws-tablepage-action-btn">Administrators</a>  
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="fullname" placeholder="Full Name" required value="{{$admin->fullname}}">
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" required value="{{$admin->email}}">
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" placeholder="Contact Number" required value="{{$admin->contact}}">
    </div>
</div>
</div>
    
<div class="row">

<div class="col-md-6">
<div class="form-group">
<select class="form-control" name="role" required>
<option value="" disabled selected>Select Admin Role</option>
@if($admin->role == "admin")
<option value="admin" selected="selected">admin</option> 
<option value="superadmin">superadmin</option> 
@elseif($admin->role == "superadmin")
<option value="admin">admin</option> 
<option value="superadmin" selected="selected">superadmin</option> 
@else
<option value="admin">admin</option> 
<option value="superadmin">superadmin</option> 
@endif
</select>
    
</div> 
</div>
    
<div class="col-md-6">
<div class="form-group">
<select class="form-control" name="accesslevel" required>
<option value="" disabled selected>Select Access Level</option>
@if($admin->accesslevel == "default")
<option value="default" selected="selected">Default</option> 
<option value="medium">Medium</option> 
<option value="high">High</option>    
@elseif($admin->accesslevel == "medium")
<option value="default">Default</option> 
<option value="medium" selected="selected">Medium</option> 
<option value="high">High</option> 
@elseif($admin->accesslevel == "high")
<option value="default">Default</option> 
<option value="medium">Medium</option> 
<option value="high" selected="selected">High</option> 
@else
<option value="default">Default</option> 
<option value="medium">Medium</option> 
<option value="high">High</option>     
@endif
</select>
    
</div> 
</div>
    
</div>
    
    
<div class="row">
    
<div class="col-md-12">
<div class="form-group">

<span class="font-main font-13px-600 color-darkblue">Set admin status as active &nbsp;</span> 
@if($admin->status == "on")
<input type="checkbox" name="status" checked/>
@else
<input type="checkbox" name="status"/>   
@endif
</div> 
</div>
    
</div>

    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Admin</button>
</div>
</div>


    
</form>
    
</div>


@stop