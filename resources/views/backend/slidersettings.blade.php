@extends('backend.layout')

@section('content')

<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Indicates a neutral informative change or action.
</div>

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Image Slider 
<a href="" class="ws-tablepage-action-btn">Preview</a>      
</h2>
    
<div class="clearfix hidden-xs">
<form role="form" action="{{ URL::to('slidersettings-save') }}" method="post" class="ws-form" enctype="multipart/form-data">
<div class="form-group">
<label class="font-main font-15px-600">Add New Image
<button type="submit" class="ws-form-action-btn">Save</button>    
</label>
<input type="file" class="form-control" name="sliderimages[]" multiple="" required>
</div>    
</form>
</div>
    
<div class="ws-tablebox-container">
    
<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th>#</th>
<th class="text-center">Image</th>  
<th class="text-left">Created at</th> 
<th class="text-center">Uploaded by</th> 
<th class="text-center">Publish</th> 
<th></th>

</tr>
</thead>

<tbody class="ws-table-body">
<tr>
<td class="text-center">1</td>
<td class="text-center"><img class="ws-table-img-200px" src="images/slider/1.jpg"></td>    
<td class="text-left">2016-05-15 22:07:31</td>
<td class="text-center">admin</td>
    
<td class="text-center">
<form role="form" class="">
<input class="ws-form-inputcheck" type="checkbox" />    
<h2><button type="submit" class="ws-form-action-btn">Save</button></h2>     
</form>    
</td>
    
<td>
<a href="">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>    
</td>
</tr>
 
<tr>
<td class="text-center">2</td>
<td class="text-center"><img class="ws-table-img-200px" src="images/slider/2.jpg"></td>    
<td class="text-left">2016-05-15 22:07:31</td>
<td class="text-center">admin</td>
    
<td class="text-center">
<form role="form" class="">
<input class="ws-form-inputcheck" type="checkbox" />    
<h2><button type="submit" class="ws-form-action-btn">Save</button></h2>     
</form>    
</td>
    
<td>
<a href="">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>    
</td>
</tr>
    
<tr>
<td class="text-center">3</td>
<td class="text-center"><img class="ws-table-img-200px" src="images/slider/3.jpg"></td>    
<td class="text-left">2016-05-15 22:07:31</td>
<td class="text-center">admin</td>
    
<td class="text-center">
<form role="form" class="">
<input class="ws-form-inputcheck" type="checkbox" />    
<h2><button type="submit" class="ws-form-action-btn">Save</button></h2>     
</form>    
</td>
    
<td>
<a href="">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>    
</td>
</tr>
    
    
</tbody>
</table>

</div>

    
    
    
</div>



@stop