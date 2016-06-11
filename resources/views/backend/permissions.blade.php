@extends('backend.layout')

@section('content')

<a href="{{ URL::to('settings-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Settings</a>

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Admin Permissions       
</h2>

<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-center">#</th> 
<th class="text-center"></th>  
<th class="text-left">Permission</th>
<th class="text-left">Priority</th>
<th class="text-left">Privileges</th>
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
@else
<td class="text-center"><span class="ws-fonts-15px-yellow ws-span-small">
<i class="fa fa-lock fa-lg ws-icon-Xsmall"></i>
</span></td>
@endif
<td class="text-left">{{$permission->permission}}</td>
<td class="text-left">{{$permission->priority}}</td>
<td class="text-left">{{$permission->privilages}}</td>
<td class="text-left">{{$permission->created_at}}</td>
<td class="text-left">{{$permission->updated_at}}</td>


</tr>
@endforeach


</tbody>
</table>

</div><!-- ws-table-container -->


@stop