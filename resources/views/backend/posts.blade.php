@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Posts
<a href="{{ URL::to('posts-add') }}" class="ws-tablepage-action-btn">Add New</a>    
<a href="" class="ws-tablepage-action-btn">Preview</a>      
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="">All <span>(11)</span></a> |</li>
  <li><a href="">Published <span>(1)</span></a> |</li>
  <li><a href="">Unpublished <span>(1)</span></a></li>
</ul>  
</div> 
<div class="pull-right">
<form>
<input class="form-search-control" type="text"> 
<input type="submit" id="search-submit" class="button form-search-btn" value="Search">
</form>  
</div>
</div>
    


<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th>#</th>
<th class="text-center">Image</th>  
<th class="text-left">Title</th>
<th class="text-center">Description</th>
<th class="text-center">Last Updated</th>
<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">

<tr>
<td class="text-center">1</td>
<td class="text-center"><img class="ws-table-img" src=""></td>
<td class="text-left">Croods</td>
<td class="text-center">17-sep-15</td>
<td class="text-center">10.30 AM</td>



<td class="text-center">
<a href="">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>


<td class="text-center">
<a href="">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>

</tr>

<tr>
<td class="text-center">1</td>
<td class="text-center"><img class="ws-table-img" src=""></td>
<td class="text-left">Croods</td>
<td class="text-center">17-sep-15</td>
<td class="text-center">10.30 AM</td>



<td class="text-center">
<a href="">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>


<td class="text-center">
<a href="">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>

</tr>



</tbody>
</table>

</div><!-- ws-table-container -->

    
<div class="ws-table-pagiation-container">
<ul class="pagination ws-pagination-ul">
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>      
</div>  


@stop