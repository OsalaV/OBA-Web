@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Activities 
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('activities-view') }}">All <span></span></a> |</li>
  <li><a href="{{ URL::to('activities-recent') }}">Recent <span></span></a> |</li>
  <li><a href="{{ URL::to('activities-posts') }}">Posts <span></span></a> |</li>
  <li><a href="{{ URL::to('activities-events') }}">Events <span></span></a> |</li>
  <li><a href="{{ URL::to('activities-projects') }}">Projects <span></span></a> |</li>
  <li><a href="{{ URL::to('activities-members') }}">Members <span></span></a> |</li>
  <li><a href="{{ URL::to('activities-sliders') }}">Slider <span></span></a> |</li>
  <li><a href="{{ URL::to('activities-branches') }}">Branches <span></span></a> |</li>
  <li><a href="{{ URL::to('activities-resources') }}">Resources <span></span></a></li>
</ul>  
</div> 
<div class="pull-right">
<form role="form" action="{{ URL::to('activities-search') }}" method="post" enctype="multipart/form-data">
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
<th class="text-left">Activity</th>
<th class="text-left">Activity Type</th>
<th class="text-left">Last Updated</th>
<th class="text-left">Author</th>
<th></th>
<th>
@if($activities->count() > 0)
<a class="ws-open-msg" data-url="{{ URL::to('activities-delete') }}" data-message = "Are you sure you want to clear this table?" data-toggle="modal" data-target="#meesageModel">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-trash-o fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
@endif
</th>
</tr>
</thead>

<tbody class="ws-table-body">

@foreach($activities as $activity)
<tr>

<td class="text-left">{{$activity->activity}}</td>
<td class="text-left">{{$activity->type}}</td>
<td class="text-left">{{$activity->updated_at}}</td>
<td class="text-left">{{$activity->firstname.' '.$activity->lastname}}</td>
<td class="text-center">
<a href="{{ URL::to('activities-view/'.$activity->type.'/'.$activity->referenced_id) }}" class="ws-tablepage-action-btn">View</a> 
</td>
<td></td>

</tr>
@endforeach


</tbody>
</table>

</div><!-- ws-table-container -->

    
{{ $activities->links() }}




@stop