@extends('backend.layout')

@section('content')


<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('admins-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Administrators</a>

<form role="form" action="{{ URL::to('admins-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
 
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Admin
<button type="submit" class="ws-form-action-btn">Save Admin</button>
</h2>
 
<label class="font-main font-15px-600">Name<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="firstname" placeholder="First name" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
    </div>
</div>
</div>
 
<label class="font-main font-15px-600">Email<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="" required>
    </div>
</div>
</div>
 
<label class="font-main font-15px-600">Password<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="password" class="form-control" name="password" required>
    </div>
</div>
</div>
    
<label class="font-main font-15px-600">Birthday<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-3">
<div class="form-group">    
{{ Form::select(
    'month',
    array('Jan' => 'January','Feb' => 'February', 'Mar' => 'March', 'Apr' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'Aug' => 'August', 'Sept' => 'September', 'Oct' => 'October', 'Nov' => 'November', 'Dec' => 'December'),
    null,
    array('class' => 'form-control','required' => 'required')
    ) 
}}
</div> 
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="day" required placeholder="Day">
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="year" required placeholder="Year">
    </div>
</div>
</div>   
    
<label class="font-main font-15px-600">NIC/Passport<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="nic" required>
    </div>
</div>
</div>     
    
<label class="font-main font-15px-600">Address</label>     
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control" name="address" maxlength="8000" cols="20" wrap="hard"></textarea>
    </div>
</div>
</div>   
    
<label class="font-main font-15px-600">Contact Number<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" required>
    </div>
</div>
</div> 

    
<div class="row">

<div class="col-md-12">
<div class="form-group">

<label class="font-main font-15px-600">Select Role</label>
    
{{ Form::select(
    'role',
    array('' => 'Select Role','admin' => 'Admin', 'superadmin' => 'Super Admin'),
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

<span class="font-main font-13px-600 color-darkblue">Set default permissions to this user &nbsp;</span> 
<input type="checkbox" name="permissions" checked/>

</div> 
</div>

    
</div>

{{ csrf_field() }}
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Admin</button>
</div>
</div>


    
</form>
    
</div>


@stop