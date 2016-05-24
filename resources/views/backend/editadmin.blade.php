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

<div class="col-md-12">
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
    
</div>

    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Save Admin</button>
</div>
</div>


    
</form>
    
<div class="panel panel-default" style="margin-top:25px;">
<div class="panel-heading ws-formpanel-heading clearfix">
<span class="pull-left">Permissions</span>
<!--<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('admin-delete-details/'.$admin->id) }}" data-message = "Are you sure you want to delete this admin?" data-toggle="modal" data-target="#meesageModel">Delete</a>-->
</div>
  
    
<div class="panel-body ws-formpanel-body">


<form action="{{ URL::to('admin-edit-permissions/'.$admin->id) }}" method="post" class="ws-form" enctype="multipart/form-data">

@foreach($adminpermissions as $adminpermission)
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">{{$adminpermission->permission}} </span> </div>
<div class="pull-right ws-form-check text-center">
@if($adminpermission->status == "on")
<input type="checkbox" name="status[]" checked value="{{$adminpermission->permissions_id}}" />
@else
<input type="checkbox" name="status[]" value="{{$adminpermission->permissions_id}}"/>
@endif
</div>
</div>    
</div>
@endforeach
    
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
<a class="ws-form-action-btn-red pull-right hidden-xs ws-open-msg" data-url="{{ URL::to('admin-delete-details/'.$admin->id) }}" data-message = "Are you sure you want to delete this admin?" data-toggle="modal" data-target="#meesageModel">Delete</a>
</div>
  
    
<div class="panel-body ws-formpanel-body">


<form action="{{ URL::to('admin-edit-status/'.$admin->id) }}" method="post" class="ws-form" enctype="multipart/form-data">
 
<div class="row">
<div class="form-group clearfix">
<div class="pull-left ws-form-span">
<span class="font-main font-13px-600 color-darkblue">Set admin status as active </span> </div>
<div class="pull-right ws-form-check text-center">
@if($admin->status == "on")
<input type="checkbox" name="status" checked/>
@else
<input type="checkbox" name="status"/>
@endif
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