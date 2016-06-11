@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Guest Users        
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<!--
<ul class="ws-table-options">
  <li><a href="">All <span>(11)</span></a> |</li>
  <li><a href="">Published <span>(1)</span></a> |</li>
  <li><a href="">Unpublished <span>(1)</span></a></li>
</ul>  
-->
</div> 
<div class="pull-right">
<form role="form" action="{{ URL::to('guests-search') }}" method="post" enctype="multipart/form-data">
<input class="form-search-control" type="text" name="searchkey" required> 
{{ csrf_field() }}
<input type="submit" id="search-submit" class="button form-search-btn" value="Search">
</form>  
</div>
</div>
    


<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th></th>
<th class="text-center">NIC/Passport</th>
<th class="text-left">Full Name</th>  
<th class="text-left">Email</th>
<th class="text-center">Contact Number</th>
<th></th>
<th></th>
</tr>
</thead>


<tbody class="ws-table-body">

@foreach ($users as $user)
<tr>
<td class="text-center"><img class="ws-table-img-30px" src="{{ asset('images/icons/user.png') }}"></td>
<td class="text-center">{{$user->nic}}</td>
<td class="text-left">{{$user->firstname.' '.$user->lastname}}</td>
<td class="text-left">{{$user->email}}</td>
<td class="text-center">{{$user->contact}}</td>
    
<td class="text-center">
<a href="">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>




</tr>
@endforeach


</tbody>
    
    
</table>

</div><!-- ws-table-container -->

    
{{ $users->links() }}


@stop