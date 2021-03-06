@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Tickets
</h2>
    
<div class="clearfix hidden-xs">

<div class="pull-right">
<form role="form" action="{{ URL::to('tickets-search') }}" method="get" enctype="multipart/form-data">
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
<th class="text-left"></th> 
<th class="text-left">Event Name</th>  
<th class="text-center">Tickets Availability</th>

<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">
    
@foreach($events as $event)
<tr>
<td class="text-left"></td>
<td class="text-left">{{$event->title}}</td>

<td class="text-center">
<form id="{{'checkform'.$event->id}}" action="{{ URL::to('events-set-ticketstate/'.$event->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($event->ticketstate == "on")
<input id="status" data-id="{{$event->id}}" class="ws-form-inputcheck" type="checkbox" name="ticketstate" checked /> 
@else
<input id="status" data-id="{{$event->id}}" class="ws-form-inputcheck" type="checkbox" name="ticketstate" /> 
@endif
{{ csrf_field() }}
</form>    
</td>
    

    
<td class="text-center">
<a href="{{ URL::to('tickets-show/'.$event->id) }}">
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

{{ $events->links() }} 


@stop