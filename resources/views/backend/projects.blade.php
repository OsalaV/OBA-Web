@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Projects
<a href="{{ URL::to('projects-add') }}" class="ws-tablepage-action-btn">Add New</a>    
<a href="{{ URL::to('projects') }}" class="ws-tablepage-action-btn">Preview</a>      
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('projects-view') }}">All <span>({{$all->count()}})</span></a> |</li>
  <li><a href="{{ URL::to('projects-published') }}">Published <span>({{$active->count()}})</span>  |</a></li>
  <li><a href="{{ URL::to('projects-unpublished') }}">Unpublished <span>({{$inactive->count()}})</span></a></li>
</ul>  
</div> 
<div class="pull-right">
<form role="form" action="{{ URL::to('projects-search') }}" method="get" enctype="multipart/form-data">
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
<th class="text-left">Title</th>
<th class="text-left">Last Updated</th>
<th class="text-center">Published</th>
<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">

@foreach($projects as $project)
<tr>

<td class="text-center"><img class="ws-table-img" src="{{ asset($project->imagepath) }}"></td>
<td class="text-left">{{$project->title}}</td>
<td class="text-left">{{$project->updated_at}}</td>
    
    
<td class="text-center">
<form id="{{'checkform'.$project->id}}" action="{{ URL::to('projects-set-status/'.$project->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($project->status == "on")
<input id="status" data-id="{{$project->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$project->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
{{ csrf_field() }}
</form>    
</td> 
    


<td class="text-center">
<a href="{{ URL::to('projects-edit/'.$project->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>

@if(Session::get('DELETE') == "on")
<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('projects-delete-details/'.$project->id) }}" data-message = "Are you sure you want to delete this project?" data-toggle="modal" data-target="#meesageModel">
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

{{ $projects->links() }}     

@stop