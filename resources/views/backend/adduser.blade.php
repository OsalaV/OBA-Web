@extends('backend.layout')

@section('content')


<div class="col-md-8 ws-form-container">

<form role="form" action="{{ URL::to('users-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New User
<button type="submit" class="ws-form-action-btn">Save User</button>
<a href="{{ URL::to('users-view') }}" class="ws-tablepage-action-btn">Users</a>  
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" placeholder="Contact Number" required>
    </div>
</div>
</div>
    
<div class="row">

<div class="col-md-12">
<div class="form-group">
<select class="form-control" name="role" required>
<option value="" disabled selected>Select User Role</option>
<option value="admin">admin</option> 
<option value="superadmin">superadmin</option> 
</select>
    
</div> 
</div>
    
</div>
    
    
<div class="row">
    
<div class="col-md-6">
<div class="form-group">

<span class="font-main font-13px-600 color-darkblue">Set default permissions to this user &nbsp;</span> 
<input type="checkbox" name="permissions" checked/>

</div> 
</div>
    
<div class="col-md-6">
<div class="form-group">

<span class="font-main font-13px-600 color-darkblue">Set user status as active &nbsp;</span> 
<input type="checkbox" name="status" checked/>

</div> 
</div>
    
</div>

{{ csrf_field() }}
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save User</button>
</div>
</div>


    
</form>
    
</div>


@stop