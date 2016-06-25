@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>    
    


<section class="well temp-section background-white">
<div class="container">
<div class="row">    

    
<div class="col-md-8">
    
<div class="row post-header-row">
<span class="font-header-25px color-black">
{{'Welcome '.Session::get('user')->firstname}}
<a href="{{ URL::to('user-home') }}" class="user-action-btn user-action-btn-blue active-blue">Events</a>
<a href="{{ URL::to('user-profile') }}" class="user-action-btn user-action-btn-blue">My Profile</a> 
<a href="{{ URL::to('user-cart') }}" class="user-action-btn user-action-btn-blue">My Cart</a>  
<a href="{{ URL::to('user-logout') }}" class="user-action-btn user-action-btn-blue">Logout</a> 
</span>
</div>   
 
@if(count($events) > 0)
<div class="row user-table-row">
 
<ul class="bxslider"> 
@foreach($events as $pubevent)
<li>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    
    
<form id="{{'publiceventform'.$pubevent->id}}" action="{{ URL::to('events-show') }}" method="get" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="postid" value="{{$pubevent->id}}" />
    
<a id="publicevent" data-id="{{$pubevent->id}}" class="cursor-pointer">
<img src="{{asset($pubevent->imagepath)}}" alt="">
</a>
    
</form> 
    
    
    

</div>
</div>

</li>
@endforeach
</ul> 
    
    
</div>
@else

<div class="row post-header-row">    
<p class="ws-tag-label"><strong>There are events recently</strong></p>

    
<p class="">You can select any kind of tickets that are available in the events.</p>
<p class="">Each category allows you to select maximum 10 tickets.</p>    
<p class="">You can use any kind of payment method to buy this tickets.</p>
    
<p class="ws-tag-label"><strong>Thank You!!!</strong></p>
    
<div class="post-header-row">
<span class="font-header-25px color-black">
<a href="{{ URL::to('user-logout') }}" class="user-action-btn user-action-btn-blue">Logout Now</a> 
</span>
</div>
    
    
    
</div>    

    
    
@endif

    
 


    
    
    
    
    
    
</div>   
    

    
</div>
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 


<script>
$(document).ready(function(){

$('.bxslider').bxSlider({
  minSlides: 1,
  maxSlides: 1,
  pager: false
});

}); 
</script>


@stop