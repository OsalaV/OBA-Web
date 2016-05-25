@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Branches
<a href="{{ URL::to('branches-add') }}" class="ws-tablepage-action-btn">Add New</a>    
<a href="" class="ws-tablepage-action-btn">Preview</a>      
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('branches-view') }}">All <span>({{$count_all}})</span></a> |</li>
  <li><a href="{{ URL::to('branches-published') }}">Published <span>({{$count_active}})</span></a> |</li>
  <li><a href="{{ URL::to('branches-unpublished') }}">Unpublished <span>({{$count_inactive}})</span></a></li>
</ul>  
</div> 
<div class="pull-right">
<form role="form" action="#" method="post" enctype="multipart/form-data">
<input class="form-search-control" type="text" name="searchkey" required> 
<input type="submit" id="search-submit" class="button form-search-btn" value="Search">
</form>  
</div>
</div>
    


<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-left">Branch</th>
<th class="text-center">Description</th>
<th class="text-center">Address Line 1</th>
<th class="text-center">Address Line 2</th>
<th class="text-center">Address Line 3</th>
<th class="text-center">Email</th>
<th class="text-center">Contact</th>
<th class="text-center">Published</th>
<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">

@foreach($branches as $branch)
<tr>
<td class="text-left">{{$branch->branch}}</td>
<td class="text-center">{{$branch->description}}</td>
<td class="text-center">{{$branch->address_line1}}</td>
<td class="text-center">{{$branch->address_line2}}</td>
<td class="text-center">{{$branch->address_line3}}</td>
<td class="text-center">{{$branch->email}}</td>
<td class="text-center">{{$branch->contact}}</td>
    
<td class="text-center">
<form action="{{ URL::to('branches-status-publish/'.$branch->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($branch->status == "on")    
<input class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
<button type="submit" class="ws-form-action-btn">Save</button>
</form>    
</td>

<td class="text-center">
<a href="{{ URL::to('branches-edit/'.$branch->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>


<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('branches-delete-details/'.$branch->id) }}" data-message = "Are you sure you want to delete this branch?" data-toggle="modal" data-target="#meesageModel">
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