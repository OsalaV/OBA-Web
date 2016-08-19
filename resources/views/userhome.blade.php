@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>    
  
<script type="text/javascript">      
var page='Events';
</script>


<section class="well temp-section background-white">
<div class="container">
<div class="row">    

    
<div class="col-md-12">
    
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
    
<div class="porto">
@foreach($events as $pubevent)
<div class="pf" data-pf-image="{{asset($pubevent->imagepath)}}" data-pf-title="{{$pubevent->title}}" data-pf-onclick="{{ URL::to('events/'.str_replace(' ', '_', $pubevent->title)) }}"></div>
@endforeach       
</div>
</div>
    
<div class="row">  
{{ $events->links() }} 
</div>
    
    
@else

<div class="row post-header-row">    
<p class="ws-tag-label"><strong>There are no recent events</strong></p>

    
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
$(document).ready(function () {
  $('.porto').porto({
      columns        : 4,
      margin         : 5,
      captionMode    : "title",
      background     : "rgba(252, 184, 18, 0.8)", 
      onclickAction  : "url",
      linkTarget     : "same"
  });
});
</script>


@stop