@extends('backend.layout')

@section('content')

<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  
  <p>READ   Permissions allows VIEW privileges.</p>
  <p>WRITE  Permissions allows ADD and EDIT privileges.</p>
  <p>DELETE Permissions allows DELETE privileges.</p>
</div>


<h2 class="font-main font-uppercase font-25px-600 color-darkblue">User Permissions       
</h2>

<div class="clearfix hidden-xs">
<form role="form" action="{{ URL::to('permissions-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
<label class="font-main font-15px-600">Add New Permission 
<button type="submit" class="ws-form-action-btn">Save</button>  
</label>
<div class="row">

<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control" name="permission" placeholder="Permission" required>
</div> 
</div>
    
<div class="col-md-6">
<div class="form-group">
<select class="form-control" name="priority" required>
<option value="" disabled selected>Select Priority Level</option>
<option value="default">Default</option> 
<option value="medium">Medium</option> 
<option value="high">High</option> 
</select>
    
</div> 
</div>
    
</div>
</form>
</div>


<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-center">#</th> 
<th class="text-center"></th>  
<th class="text-left">Permission</th>
<th class="text-left">Priority</th>
<th class="text-left">Created At</th>
<th class="text-left">Updated At</th>
<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">

@foreach ($permissions as $permission)
<tr>
<td class="text-center">{{$permission->id}}</td>
@if($permission->priority == "high")
<td class="text-center"><span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-lock fa-lg ws-icon-Xsmall"></i>
</span></td>
@elseif($permission->priority == "medium")
<td class="text-center"><span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-lock fa-lg ws-icon-Xsmall"></i>
</span></td>
@else
<td class="text-center"><span class="ws-fonts-15px-yellow ws-span-small">
<i class="fa fa-lock fa-lg ws-icon-Xsmall"></i>
</span></td>
@endif
<td class="text-left">{{$permission->permission}}</td>
<td class="text-left">{{$permission->priority}}</td>
<td class="text-left">{{$permission->created_at}}</td>
<td class="text-left">{{$permission->updated_at}}</td>

<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('permissions-delete/'.$permission->id) }}" data-message = "Are you sure you want to delete this permission?" data-toggle="modal" data-target="#meesageModel">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>

</tr>
@endforeach


</tbody>
</table>

</div><!-- ws-table-container -->


@stop