@extends('backend.layout')

@section('content')


<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Indicates a neutral informative change or action.
</div>

<a href="{{ URL::to('settings-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Settings</a>  

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Image Slider 
<a href="" class="ws-tablepage-action-btn">Preview</a>   
</h2>

    
<div class="clearfix hidden-xs">
<form role="form" action="{{ URL::to('imageslider-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
<div class="form-group">
<label class="font-main font-15px-600">Add New Image
<button type="submit" class="ws-form-action-btn">Save</button>    
</label>
<input type="file" class="form-control" name="sliderimages[]" multiple="" required>
</div> 
{{ csrf_field() }} 
</form>
</div>
  
<div class="ws-tablebox-container">
    
<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-center">Image</th>  
<th class="text-left">Created at</th> 
<th class="text-left">Last Updated</th>
<th class="text-center">Publish</th>

<th></th>

</tr>
</thead>

<tbody class="ws-table-body">
@foreach ($sliders as $slider)
<tr>
<td class="text-center"><img class="ws-table-img-200px" src="{{ asset($slider->imagepath) }}"></td>    
<td class="text-left">{{$slider->created_at}}</td>
<td class="text-left">{{$slider->updated_at}}</td>
    
    
<td class="text-center">
<form id="{{'checkform'.$slider->id}}" action="{{ URL::to('imageslider-edit-status/'.$slider->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($slider->status == "on")
<input id="status" data-id="{{$slider->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$slider->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
{{ csrf_field() }}
</form>    
</td>        

@if(Session::get('DELETE') == "on")
<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('imageslider-delete-details/'.$slider->id) }}" data-message = "Are you sure you want to delete the selected record?" data-toggle="modal" data-target="#meesageModel">
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

</div>

    
    
    
</div>





@stop