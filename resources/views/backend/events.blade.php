@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Events
<a href="{{ URL::to('events-add') }}" class="ws-tablepage-action-btn">Add New</a>    
<a href="{{ URL::to('events') }}" class="ws-tablepage-action-btn">Preview</a>      
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('events-view') }}">All <span>({{$all->count()}})</span></a> |</li>
  <li><a href="{{ URL::to('events-published') }}">Published <span>({{$active->count()}})</span></a> |</li>
  <li><a href="{{ URL::to('events-unpublished') }}">Unpublished <span>({{$inactive->count()}})</span></a></li>
</ul>  
</div> 
<div class="pull-right">
<form role="form" action="{{ URL::to('events-search') }}" method="get" enctype="multipart/form-data">
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
<th class="text-left">Date</th>
<th class="text-left">Time</th>
<th class="text-left">Location</th>
<th class="text-center">Published</th>

<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">

@foreach($events as $event)
<tr>
<td class="text-center"><img class="ws-table-img" src="{{ asset($event->imagepath) }}"></td>
<td class="text-left">{{$event->title}}</td>
<td class="text-left">{{$event->day.'-'.$event->month.'-'.$event->year}}</td>
<td class="text-left">{{$event->time}}</td>
<td class="text-left">{{$event->location}}</td>

<td class="text-center">
<form id="{{'checkform'.$event->id}}" action="{{ URL::to('events-set-status/'.$event->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($event->status == "on")
<input id="status" data-id="{{$event->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$event->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
{{ csrf_field() }}
</form>    
</td>


<td class="text-center">
<a href="{{ URL::to('events-edit/'.$event->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>


@if(Session::get('DELETE') == "on")
<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('events-delete-details/'.$event->id) }}" data-message = "Are you sure you want to delete this event?" data-toggle="modal" data-target="#meesageModel">
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

{{ $events->links() }}    




@stop