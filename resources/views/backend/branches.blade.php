@extends('backend.layout')

@section('content')

<a href="{{ URL::to('settings-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Settings</a>   

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Branches | Committees
<a href="{{ URL::to('branches-add') }}" class="ws-tablepage-action-btn">Add New</a>    
<a href="{{ URL::to('contact') }}" class="ws-tablepage-action-btn">Preview</a>      
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('branches-view') }}">All <span>({{$count_all}})</span></a> |</li>
  <li><a href="{{ URL::to('branches-published') }}">Published <span>({{$count_active}})</span></a> |</li>
  <li><a href="{{ URL::to('branches-unpublished') }}">Unpublished <span>({{$count_inactive}})</span></a></li>
</ul>  
</div> 
<!--
<div class="pull-right">
<form role="form" action="#" method="post" enctype="multipart/form-data">
<input class="form-search-control" type="text" name="searchkey" required> 
<input type="submit" id="search-submit" class="button form-search-btn" value="Search">
</form>  
</div>
-->
</div>
    


<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-left">Branch | Committee</th>
<th class="text-left">Type</th>
<th class="text-center">Address</th>
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
<td class="text-center">{{$branch->type}}</td>
<td class="text-center">{{$branch->address_line1." ".$branch->address_line2." ".$branch->address_line3}}</td>
<td class="text-center">{{$branch->email}}</td>
<td class="text-center">{{$branch->contact}}</td>
    
<td class="text-center">
<form id="{{'checkform'.$branch->id}}" action="{{ URL::to('branches-set-status/'.$branch->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($branch->status == "on")
<input id="status" data-id="{{$branch->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$branch->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
{{ csrf_field() }}
</form>    
</td>    
    

<td class="text-center">
<a href="{{ URL::to('branches-edit/'.$branch->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>

@if(Session::get('DELETE') == "on")
<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('branches-delete-details/'.$branch->id) }}" data-message = "Are you sure you want to delete this branch?" data-toggle="modal" data-target="#meesageModel">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>
@endif
    
</tr>
@endforeach


</tbody>
</table>

</div><!-- ws-table-container -->

    
<!--
<div class="ws-table-pagiation-container">
<ul class="pagination ws-pagination-ul">
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>      
</div>
-->





@stop