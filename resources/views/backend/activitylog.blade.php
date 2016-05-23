@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Log Details
<a href="{{ URL::to('activity-log-all/'.$type.'/'.$id) }}" class="ws-tablepage-action-btn">All</a> 
<a href="{{ URL::to('activity-log-last/'.$type.'/'.$id) }}" class="ws-tablepage-action-btn">Last</a> 
</h2>

<h4 class="font-main font-15px-600">ID : {{$id}}</h4>
<h4 class="font-main font-15px-600">Activity On : {{ucfirst($type)}}</h4>

<h4 class="font-main font-15px-600">Created At : {{$hostdata->created_at}}</h4>


<div class="ws-tablebox-container">
    
<div class="table-responsive ws-table-container">

<table class="table ws-table-log">
    
<thead>
<th class="font-main font-15px-600 text-left">Activity</th>   
<th class="font-main font-15px-600 text-left">Updated At</th>  
<th class="font-main font-15px-600 text-left">Author</th>  
</thead>

<tbody class="ws-table-log-body">

@if(is_array($logdata))
@foreach($logdata as $log)
<tr>
<td class="font-main font-15px-600 text-left">{{$log->activity}}</td>
<td class="font-main font-15px-600 text-left">{{$log->updated_at}}</td>
<td class="font-main font-15px-600 text-left">{{$log->fullname}}</td>
</tr>
@endforeach
@else
<tr>
<td class="font-main font-15px-600 text-left">{{$logdata->activity}}</td>
<td class="font-main font-15px-600 text-left">{{$logdata->updated_at}}</td>
<td class="font-main font-15px-600 text-left">{{$logdata->fullname}}</td>
</tr>
@endif
    
</tbody>
</table>

</div>

    
    
    
</div>




@stop