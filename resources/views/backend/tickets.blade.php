@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Tickets
</h2>
    
<div class="clearfix hidden-xs">

<div class="pull-right">
<form role="form" action="" method="post" enctype="multipart/form-data">
<input class="form-search-control" name="searchkey" type="text" required> 
<input type="submit" id="search-submit" class="button form-search-btn" value="Search">
</form>  
</div>
</div>
    


<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-center">Event Name</th>  
<!--<th class="text-left">Tatal Issued Tickets</th>-->
<th class="text-center">Published</th>

<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">
    
@foreach($pubevents as $pubevent)
<tr>
<td class="text-center">{{$pubevent->title}}</td>

<td class="text-center">
<form id="{{'checkform'.$pubevent->id}}" action="{{ URL::to('events-set-ticketstate/'.$pubevent->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($pubevent->ticketstate == "on")
<input id="status" data-id="{{$pubevent->id}}" class="ws-form-inputcheck" type="checkbox" name="ticketstate" checked /> 
@else
<input id="status" data-id="{{$pubevent->id}}" class="ws-form-inputcheck" type="checkbox" name="ticketstate" /> 
@endif
{{ csrf_field() }}
</form>    
</td>
    

    
<td class="text-center">
<a href="{{ URL::to('tickets-edit/'.$pubevent->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-eye fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>
 
</tr>
@endforeach


</tbody>
</table>

</div><!-- ws-table-container -->


@stop