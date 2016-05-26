@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Users
<a href="{{ URL::to('users-add') }}" class="ws-tablepage-action-btn">Add New</a>        
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

@foreach ($users as $user)
<tr>
<td class="text-center"><img class="ws-table-img-30px" src="{{ asset('images/icons/user.png') }}"></td>
<td class="text-left">{{$user->fullname}}</td>
<td class="text-left">{{$user->email}}</td>
<td class="text-center">{{$user->contact}}</td>
<td class="text-center">{{$user->role}}</td>
@if($user->status == "on")    
<td class="text-center">Active</td>
@else
<td class="text-center">Inactive</td>
@endif

<td class="text-center">
<a href="{{ URL::to('users-edit/'.$user->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>


<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('users-delete-details/'.$user->id) }}" data-message = "Are you sure you want to delete this user?" data-toggle="modal" data-target="#meesageModel">
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