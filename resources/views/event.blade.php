@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>   
<script type="text/javascript">      
    var page='Events';
</script>
    
    
<section class="well temp-section background-white">
<div class="container">
    
@if(Session::has('success'))
<div class="row post-header-row">
<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('success')}}
  <a href="{{ URL::to('user-cart') }}" class="user-action-btn user-action-btn-blue">View Cart Now</a> 
</div> 
</div>
@endif
    
@if(Session::has('error'))
<div class="row post-header-row">    
<div class="alert alert-danger fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('error')}}
</div> 
</div>
@endif
    
    
@if(Session::has('user'))
<div class="row post-header-row">
<span class="font-header-25px color-black">
{{'Welcome '.Session::get('user')->firstname}}
<a href="{{ URL::to('user-home') }}" class="user-action-btn user-action-btn-blue active-blue">Events</a>
<a href="{{ URL::to('user-profile') }}" class="user-action-btn user-action-btn-blue">My Profile</a> 
<a href="{{ URL::to('user-cart') }}" class="user-action-btn user-action-btn-blue">My Cart</a> 
<a href="{{ URL::to('user-logout') }}" class="user-action-btn user-action-btn-blue">Logout</a> 
</span>
</div>
@endif
    
    
<div class="row">   
 
<div class="col-md-6 header-pad-0px">
<h2 class="font-header-large color-black"><small class="color-black">{{$event->title}}</small></h2>
</div> 

<div class="col-md-6 parade-social-icon-container text-right"> 
    
<div id="div-parade-social" class="parade-social animated">
  @if($event->facebook != NULL)
  <a class="fa fa-facebook" title="" target="_blank" href="{{$event->facebook}}"></a>
  @endif
  @if($event->twitter != NULL)
  <a class="fa fa-twitter" title="" target="_blank" href="{{$event->twitter}}"></a>
  @endif
  @if($event->google != NULL)
  <a class="fa fa-google-plus" title="" target="_blank" href="{{$event->google}}"></a>
  @endif
  @if($event->linkedin != NULL)
  <a class="fa fa-linkedin" title="" target="_blank" href="{{$event->linkedin}}"></a>
  @endif
</div>    
    
</div>    
</div>
    
<div class="row">
<img class="header-image" src="{{asset($event->imagepath)}}">  
</div>

<div class="row ico-container">
  
<div class="col-md-2 timebox">
<time>

<span class="day">{{$event->day}}</span>
<span class="month">{{$event->month}}</span>
<span class="year">{{$event->year}}</span>
</time>    
</div>
    
<div class="col-md-10 infobox">
<div class="info">
    <h2 class="title"><i class="fa fa-map-marker fa-lg hidden-xs"></i> {{$event->location}}</h2>
    <p class="desc"><i class="fa fa-clock-o fa-lg hidden-xs"></i> {{$event->time}}</p>
</div>    
</div>

</div>

    
<div class="row"> 
<p id="para-1" class="font-para-15 color-darkblue animated">
{{$event->description}}
</p>
</div>

@if($event->resourcestate == 'true')
<div class="row tickets-row">	
<?php $encrypted = Crypt::encrypt($event->id); ?>
<a href="{{ URL::to('download-events-resource/'.$encrypted) }}" class="ws-form-action-btn-green pull-left">Download Resource Files</a>
</div>
@endif  


@if($event->ticketstate == 'on')
    
<div class="row tickets-row">   

@foreach($tickets as $ticket)
    
<style>
{{".".$ticket->category}}:hover{
  background: {{$ticket->color}};
  color: #ffffff;
}
{{".".$ticket->category}} .fontcolor{
  color: {{$ticket->color}};
}
{{".".$ticket->category}}:hover .fontcolor{
  color: #ffffff;
}   
</style>
    
<div class="col-sm-6 col-md-3 cir-box">
<center>
<div class="circle {{$ticket->category}} img-circle">
      <h4 class="fontcolor">{{$ticket->category}}</h4>
      <span class="price-large fontcolor">{{round($ticket->price)}}</span>
      <br>
      <span class="price-small">LKR</span>
  </div>    
</center>
 
@if(Session::has('user'))
<div class="tickets-row">
<center>
<form action="{{ URL::to('user-addto-cart') }}" method="post" class="contact-form animated" enctype="multipart/form-data">
    

   
<div class="form-group">    
{{ Form::selectRange(
    'qty',
    1,10,
    null,
    array('class' => 'form-control')
    ) 
}}
</div>

    
<div class="form-group"> 
<input type="hidden" class="form-control" name="tickets_id" required value="{{$ticket->id}}">
</div>
    
<div class="form-group"> 
<input type="hidden" class="form-control" name="events_id" required value="{{$event->id}}">
</div>
 
{{ csrf_field() }} 
    
<div class="tickets-row">
<button type="submit" class="ws-form-action-btn-green">Add to Cart</button>
</div>

    
</form>
</center>
</div>
@endif
    
    
</div>
@endforeach      
</div>
    

@if(!Session::has('user'))
<div class="row tickets-row"> 
<center>
<div class="selfie-creative-btn">						
<a class="btn btn-1 btn-1c" href="{{ URL::to('auth-tickets/'.$event->id) }}">Grab your tickets now</a>	
</div>
</center>
</div>
@endif   
    
    
@endif 


    

</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 




@stop