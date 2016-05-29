@extends('backend.layout')

@section('content')

<a href="{{ URL::to('settings-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Settings</a>

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Designations       
</h2>

<div class="clearfix hidden-xs">
<form role="form" action="{{ URL::to('designations-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
<div class="form-group">
<label class="font-main font-15px-600">Add New Designation
<button type="submit" class="ws-form-action-btn">Save</button>    
</label>
<input type="text" class="form-control" name="designation" required placeholder="Designation">
</div> 
{{ csrf_field() }} 
 
    
</form>
</div>



<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-center">#</th> 
<th class="text-center"></th>  
<th class="text-left">Designation</th>
<th class="text-left">Created At</th>
<th class="text-left">Updated At</th>
<th class="text-center">Status</th>
</tr>
</thead>

<tbody class="ws-table-body">

@foreach ($designations as $designation)
<tr>
<td class="text-center">{{$designation->id}}</td>
<td class="text-center"><span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-star fa-lg ws-icon-Xsmall"></i>
</span></td>
    
<td class="text-left">
<form action="{{ URL::to('designation-edit-details/'.$designation->id) }}" method="post" class="form-inline" enctype="multipart/form-data">

<input class="form-control" type="text" name="designation" value="{{$designation->designation}}"  /> 
    
{{ csrf_field() }}
    
<button type="submit" class="ws-form-action-btn">Save</button>  
</form>    
</td>
    
    
    
<td class="text-left">{{$designation->created_at}}</td>
<td class="text-left">{{$designation->updated_at}}</td>

<td class="text-center">
<form id="{{'checkform'.$designation->id}}" action="{{ URL::to('designation-edit-status/'.$designation->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($designation->status == "on")
<input id="status" data-id="{{$designation->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$designation->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
{{ csrf_field() }}
</form>    
</td> 
    
    

</tr>
@endforeach


</tbody>
</table>

</div><!-- ws-table-container -->


@stop