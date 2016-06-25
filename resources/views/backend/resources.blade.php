@extends('backend.layout')

@section('content')

<a href="{{ URL::to('settings-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Settings</a>

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Resources
<a href="{{ URL::to('resources-add') }}" class="ws-tablepage-action-btn">Add New</a>    
<a href="{{ URL::to('membership') }}" class="ws-tablepage-action-btn">Preview</a>
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('resources-view') }}">All <span>({{$all->count()}})</span></a> |</li>
  <li><a href="{{ URL::to('resources-published') }}">Published <span>({{$active->count()}})</span></a> |</li>
  <li><a href="{{ URL::to('resources-unpublished') }}">Unpublished <span>({{$inactive->count()}})</span></a></li>
</ul>  
</div> 
<div class="pull-right">
<form role="form" action="{{ URL::to('resources-search') }}" method="get" enctype="multipart/form-data">
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
<th class="text-center">Image</th>
<th class="text-left">Resource Name</th>  
<th class="text-left">Last Updated</th>
<th class="text-center">Published</th>
<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">
    
@foreach($resources as $resource)
<tr>

@if($resource->imagestate == "true")
<td class="text-center"><img class="ws-table-img" src="{{ asset($resource->imagepath) }}"></td>
@else
<td class="text-center"></td>
@endif
<td class="text-left">{{$resource->resource}}</td>
<td class="text-left">{{$resource->updated_at}}</td>
    
<td class="text-center">
<form id="{{'checkform'.$resource->id}}" action="{{ URL::to('resources-set-status/'.$resource->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($resource->status == "on")
<input id="status" data-id="{{$resource->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$resource->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
{{ csrf_field() }}
</form>    
</td> 


<td class="text-center">
<a href="{{ URL::to('resources-edit/'.$resource->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>

@if(Session::get('DELETE') == "on")
<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('resources-delete-details/'.$resource->id) }}" data-message = "Are you sure you want to delete this resource?" data-toggle="modal" data-target="#meesageModel">
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

    
{{ $resources->links() }}      


@stop