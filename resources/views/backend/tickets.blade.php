@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Tickets Management
<!--<a href="{{ URL::to('posts-add') }}" class="ws-tablepage-action-btn">Add New</a>       -->
</h2>
    
<div class="clearfix hidden-xs">
<!--
<div class="pull-left">
<ul class="ws-table-options">
</ul>  
</div> 
-->
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
<th class="text-left">Tatal Issued Tickets</th>
<!--<th class="text-left">Last Updated</th>-->
<th class="text-center">Published</th>

<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">
    

<tr>
<td class="text-center"></td>
<td class="text-left"></td>
<td class="text-left"></td>
    

    
<td class="text-center">
<a href="">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>
</tr>


</tbody>
</table>

</div><!-- ws-table-container -->

    
    





@stop