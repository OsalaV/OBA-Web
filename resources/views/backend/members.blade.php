@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Members
<a href="{{ URL::to('members-add') }}" class="ws-tablepage-action-btn">Add New</a>    
<a href="{{ URL::to('committee-members') }}" class="ws-tablepage-action-btn">Preview</a>      
</h2>
    
<div class="clearfix hidden-xs">
<div class="pull-left">
<ul class="ws-table-options">
  <li><a href="{{ URL::to('members-view') }}">All <span>({{$all->count()}})</span></a> |</li>
  <li><a href="{{ URL::to('members-published') }}">Published <span>({{$active->count()}})</span></a> |</li>
  <li><a href="{{ URL::to('members-unpublished') }}">Unpublished <span>({{$inactive->count()}})</span></a></li>
</ul>  
</div> 
<div class="pull-right">
<form role="form" action="{{ URL::to('members-search') }}" method="post" enctype="multipart/form-data">
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
<th class="text-center">Image</th>  
<th class="text-left">Full Name</th>
<th class="text-left">Designation</th>
<th class="text-left">Year</th>
<th class="text-left">Email</th>
<th class="text-left">Contact</th>
<th class="text-center">Published</th>


<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">

@foreach($members as $member)
<tr>
<td class="text-center"><img class="ws-table-img-40px" src="{{ asset($member->imagepath) }}"></td>
<td class="text-left">{{$member->fullname}}</td>
<td class="text-left">{{$member->designation}}</td>
<td class="text-left">{{$member->year}}</td>
<td class="text-left">{{$member->email}}</td>
<td class="text-left">{{$member->contact}}</td>
    
<td class="text-center">
<form id="{{'checkform'.$member->id}}" action="{{ URL::to('members-set-status/'.$member->id) }}" method="post" class="form-inline" enctype="multipart/form-data">
@if($member->status == "on")
<input id="status" data-id="{{$member->id}}" class="ws-form-inputcheck" type="checkbox" name="status" checked /> 
@else
<input id="status" data-id="{{$member->id}}" class="ws-form-inputcheck" type="checkbox" name="status" /> 
@endif
{{ csrf_field() }}
</form>    
</td>
    
    

<td class="text-right">
<a href="{{ URL::to('members-edit/'.$member->id) }}">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>

@if(Session::get('DELETE') == "on")
<td class="text-right">
<a class="ws-open-msg" data-url="{{ URL::to('members-delete-details/'.$member->id) }}" data-message = "Are you sure you want to delete this member?" data-toggle="modal" data-target="#meesageModel">
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

</div><!-- ws-table-container -->

    
{{ $members->links() }}    






@stop