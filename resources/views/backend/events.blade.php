@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Events
<a href="{{ URL::to('events-add') }}" class="ws-tablepage-action-btn">Add New</a>    
<a href="" class="ws-tablepage-action-btn">Preview</a>      
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('events-view') }}">All <span>({{$count_all}})</span></a> |</li>
  <li><a href="{{ URL::to('events-published') }}">Published <span>({{$count_active}})</span></a> |</li>
  <li><a href="{{ URL::to('events-unpublished') }}">Unpublished <span>({{$count_inactive}})</span></a></li>
</ul>  
</div> 
<div class="pull-right">
<form role="form" action="{{ URL::to('events-search') }}" method="post" enctype="multipart/form-data">
<input class="form-search-control" type="text" name="searchkey" required> 
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
<th class="text-center">Date</th>
<th class="text-center">Time</th>
<th class="text-center">Location</th>
<th class="text-center">Description</th>

<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">

<?php foreach ($events as $event) { ?>
<tr>
<td class="text-center">{{$event->id}}</td>
<td class="text-center"><img class="ws-table-img" src="<?php echo $event->eventimage ?>"></td>
<td class="text-left">{{$event->title}}</td>
<td class="text-center">{{$event->date}}</td>
<td class="text-center">{{$event->time}}</td>
<td class="text-center">{{$event->location}}</td>
<td class="text-center">{{$event->description}}</td>

<td class="text-center">
<a href="{{ URL::to('events-edit/'.$event->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>


<td class="text-center">
<a href="{{ URL::to('events-delete/'.$event->id) }}">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>

</tr>
<?php } ?>


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