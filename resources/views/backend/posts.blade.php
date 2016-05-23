@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Posts
<a href="{{ URL::to('posts-add') }}" class="ws-tablepage-action-btn">Add New</a>    
<a href="" class="ws-tablepage-action-btn">Preview</a>      
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('posts-view') }}">All <span>({{$count_all}})</span></a> |</li>
  <li><a href="{{ URL::to('posts-published') }}">Published <span>({{$count_active}})</span></a> |</li>
  <li><a href="{{ URL::to('posts-unpublished') }}">Unpublished <span>({{$count_inactive}})</span></a></li>
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
<th class="text-center">Published</th>
<!--<th class="text-center">Last Updated</th>-->
<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">
    
@foreach($posts as $post)
<tr>
<td class="text-center">{{$post->id}}</td>
<td class="text-center"><img class="ws-table-img" src="{{ asset($post->mediapath) }}"></td>
<td class="text-left">{{$post->title}}</td>
<td class="text-center">{{$post->description}}</td>
@if($post->status == "on")    
<td class="text-center">Yes</td>
@else
<td class="text-center">No</td>
@endif


<td class="text-center">
<a href="{{ URL::to('posts-edit/'.$post->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>


<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('posts-delete-details/'.$post->id) }}" data-message = "Are you sure you want to delete this post?" data-toggle="modal" data-target="#meesageModel">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>

</tr>
@endforeach

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