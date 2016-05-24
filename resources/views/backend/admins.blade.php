@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Administrators
<a href="{{ URL::to('admins-add') }}" class="ws-tablepage-action-btn">Add New</a>        
</h2>


<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-center"></th>  
<th class="text-left">Name</th>
<th class="text-left">Email</th>
<th class="text-center">Contact Number</th>
<th class="text-center">Role</th>
<th class="text-center">Status</th>
<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">

@foreach ($admins as $admin)
<tr>
<td class="text-center"><img class="ws-table-img-30px" src="{{ asset('images/icons/user.png') }}"></td>
<td class="text-left">{{$admin->fullname}}</td>
<td class="text-left">{{$admin->email}}</td>
<td class="text-center">{{$admin->contact}}</td>
<td class="text-center">{{$admin->role}}</td>
@if($admin->status == "on")    
<td class="text-center">Active</td>
@else
<td class="text-center">Inactive</td>
@endif

<td class="text-center">
<a href="{{ URL::to('admins-edit/'.$admin->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>


<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('admins-delete-details/'.$admin->id) }}" data-message = "Are you sure you want to delete this record?" data-toggle="modal" data-target="#meesageModel">
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