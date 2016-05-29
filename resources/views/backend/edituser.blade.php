@extends('backend.layout')

@section('content')


<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('users-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Users</a>

<form role="form" action="{{ URL::to('users-edit-details/'.$user->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Edit User
<button type="submit" class="ws-form-action-btn">Save User</button>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="fullname" placeholder="Full Name" required value="{{$user->fullname}}">
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" required value="{{$user->email}}">
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" placeholder="Contact Number" required value="{{$user->contact}}">
    </div>
</div>
</div>
    
<div class="row">

<div class="col-md-12">
<div class="form-group">
    
{{ Form::select(
    'role',
    array('' => 'Select User Role','admin' => 'Admin', 'superadmin' => 'Super Admin'),
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
<button type="submit" class="ws-form-action-btn pull-right">Save User</button>
</div>
</div>


    
</form>
    
<div class="panel panel-default" style="margin-top:25px;">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Permissions</span>

</div>
  
    
<div class="panel-body ws-formpanel-body">


<form action="{{ URL::to('users-edit-permissions/'.$user->id) }}" method="post" class="ws-form" enctype="multipart/form-data">

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
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('users-delete-details/'.$user->id) }}" data-message = "Are you sure you want to delete this user?" data-toggle="modal" data-target="#meesageModel">Delete</a>
</div>
  
    
<div class="panel-body ws-formpanel-body">

    
<form id="{{'checkform'.$user->id}}" action="{{ URL::to('users-edit-status/'.$user->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
    
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Do you want to publish this user?</span> </div>
    
<div class="pull-right ws-form-check text-center">
@if($user->status == "on")
<input id="status" data-id="{{$user->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$user->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
{{ csrf_field() }}   
</div>
    
    
</div>    
</div>  
   
</form> 
    

</div>
</div>
   
    

 <div class="panel panel-default">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Change Password</span>
</div>
  
    
<div class="panel-body ws-formpanel-body">


<form action="{{ URL::to('users-edit-password/'.$user->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
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