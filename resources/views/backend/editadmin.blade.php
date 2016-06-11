@extends('backend.layout')

@section('content')


<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('admins-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Administrators</a>

<form role="form" action="{{ URL::to('admins-edit-details/'.$user->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit Admin
<button type="submit" class="ws-form-action-btn">Save Admin</button>
</h2>
    
<label class="font-main font-15px-600">Name<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="firstname" placeholder="First name" required value="{{$user->firstname}}">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="lastname" placeholder="Last name" required value="{{$user->lastname}}">
    </div>
</div>
</div>
 
<label class="font-main font-15px-600">Email<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="" required value="{{$user->email}}">
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
    $user->month,
    array('class' => 'form-control','required' => 'required')
    ) 
}}
</div> 
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="day" required placeholder="Day" value="{{$user->day}}">
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="year" required placeholder="Year" value="{{$user->year}}">
    </div>
</div>
</div>   
    
<label class="font-main font-15px-600">NIC/Passport<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="nic" required value="{{$user->nic}}">
    </div>
</div>
</div>     
    
<label class="font-main font-15px-600">Address</label>     
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control" name="address" maxlength="8000" cols="20" wrap="hard">{{$user->address}}</textarea>
    </div>
</div>
</div>   
    
<label class="font-main font-15px-600">Contact Number<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" required value="{{$user->contact}}">
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
    $user->role,
    array('class' => 'form-control','required' => 'required')
    ) 
}}

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
    
<div class="panel panel-default" style="margin-top:25px;">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Permissions</span>

</div>
  
    
<div class="panel-body ws-formpanel-body">


<form action="{{ URL::to('admins-edit-permissions/'.$user->id) }}" method="post" class="ws-form" enctype="multipart/form-data">

@foreach($userpermissions as $userpermission)
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">{{$userpermission->permission}} </span> </div>
<div class="pull-right ws-form-check text-center">
@if($userpermission->status == "on")
<input type="checkbox" name="status[]" checked value="{{$userpermission->permissions_id}}" />
@else
<input type="checkbox" name="status[]" value="{{$userpermission->permissions_id}}"/>
@endif
</div>
</div>    
</div>
@endforeach
    
{{ csrf_field() }}
    
<div class="row">
<div class="form-group">
<button type="submit" class="ws-form-action-btn pull-right">Save</button>
</div>
</div>
    
</form>
    

</div>
</div>
    
</div>


<div class="col-md-4 ws-formpanel-container">
    
<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Options</span>
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('admins-delete-details/'.$user->id) }}" data-message = "Are you sure you want to delete this admin?" data-toggle="modal" data-target="#meesageModel">Delete</a>
</div>
  
    
<div class="panel-body ws-formpanel-body">
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Change Password</span>
</div>
  
    
<div class="panel-body ws-formpanel-body">


<form action="{{ URL::to('admins-edit-password/'.$user->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="New Password" required>
    </div>
</div>
</div>
 
{{ csrf_field() }}
    
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