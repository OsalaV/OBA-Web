@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Activities 
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('events-view') }}">All <span>()</span></a> |</li>
  <li><a href="{{ URL::to('events-published') }}">Recent <span>()</span></a> |</li>
  <li><a href="{{ URL::to('events-unpublished') }}">Unpublished <span>()</span></a></li>
</ul>  
</div> 
<div class="pull-right">
<form role="form" action="{{ URL::to('events-search') }}" method="post" enctype="multipart/form-data">
<input class="form-search-control" type="text" name="searchkey" required> 
<input type="submit" id="search-submit" class="button form-search-btn" value="Search">
</form>  
</div>
</div>
    


<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-left">Activity</th>
<th class="text-left">Created At</th>
<th class="text-left">Author</th>
<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">

@foreach($activities as $activity)
<tr>

<td class="text-left">{{$activity->activity}}</td>
<td class="text-left">{{$activity->created_at}}</td>
<td class="text-left">{{$activity->fullname}}</td>
<td class="text-center"><a href="" class="ws-tablepage-action-btn">View</a> </td>


<td class="text-center">
<a class="ws-open-msg" data-url="" data-message = "Are you sure you want to delete the selected record?" data-toggle="modal" data-target="#meesageModel">
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

    
<div class="ws-table-pagiation-container">
<ul class="pagination ws-pagination-ul">
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>      
</div>




@stop