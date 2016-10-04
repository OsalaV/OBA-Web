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

    
<div class="col-md-8"  style="margin-bottom:40px">
    
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
 
<div class="col-md-12 header-pad-0px">
<span class="font-header-30px color-black">{{$event->title}}</span>
</div> 

<div class="col-md-12 parade-social-icon-container text-right"> 
    
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
  @if($event->instagram != NULL)
  <a class="fa fa-instagram" title="" target="_blank" href="{{$event->instagram}}"></a>
  @endif
</div>    
    
</div>    
</div>

    
@if($event->imagestate == "true")
<div class="row post-img-row">
<img class="post-img" src="{{asset($event->imagepath)}}" alt="">           
</div>
@endif 
    
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
 
<?php    
$description = $event->description;    
$paragraphs  = explode("[para]",$description);    
?>
   
<div class="row">
@foreach($paragraphs as $paragraph)
<p class="font-para-15 color-darkblue">{{$paragraph}}</p>
@endforeach
</div>
 
    
@if($event->resourcestate == 'true')
<div class="row tickets-row">	
<?php $encrypted = Crypt::encrypt($event->id); ?>
<h4 class="font-para-15 color-darkblue">You can download all resource files from here
<a href="{{ URL::to('download-events-resource/'.$encrypted) }}" class="ws-form-action-btn-green">Download</a>
</h4>
</div>
@endif   
    
 
@if(count($eventimages) != 0)
<div class="tickets-row">
    
<div class="porto">
@foreach($eventimages as $eventimage)
<div class="pf" data-pf-image="{{asset($eventimage->img_path)}}"></div>
@endforeach       
</div>
    
    
</div>   
@endif
  
<!--video div-->
@if($event->video != NULL)
<div class="row tickets-row">  
<div class="embed-responsive embed-responsive-16by9">
            
    <iframe class="embed-responsive-item" src="{{asset($event->video)}}" frameborder="0" autohide="1" modestbranding="1" rel="0" theme="light" allowfullscreen></iframe>
    
</div>
</div>   
@endif
    
    
<!--tickets div   -->
 
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
<a href="{{ URL::to('auth-tickets/'.$event->id) }}" class="btn ws-btn-p btn-warning hidden-xs">Grab your tickets now
</a>
    
<a href="{{ URL::to('auth-tickets/'.$event->id) }}" class="btn ws-btn-p btn-warning hidden-sm hidden-md hidden-lg">Tickets</a>
    
</center>   
    
    
    
    
    
</div>
@endif   
    
@endif 
    
    
@if($event->ticketstate == NULL && $event->type == 'public')
<div class="row" style="margin-top:40px;">
<div class="col-md-12 header-pad-0px">
<span class="font-header-30px color-black">Tickets will be available soon...</span>
    
<!--<h5 class="font-header-large color-black">Tickets <small class="color-yellow">will be available soon...</small></h5>-->
    
</div>     
</div>    
@endif   
    
    
    
</div>
    

@if($event->sponserstate != NULL)  
<div class="col-md-4 ws-side-bx-container">
  
<span class="font-para-15 color-darkblue">Sponsored By</span>
    
<div class="side-list">
    



@if($platinum != NULL)  

<div class="row add-img-row col-lg-12 col-md-12 col-sm-4 col-wsm-4">

<div class="ws-ribbon">
<div class="ws-ribbon-inner">
    <span class="ws-ribbon-label">PLATINUM
        <br>
        SPONSER</span>
</div>
</div>
    
@if($platinum->status == 'on')
<img class="post-img" src="{{asset($platinum->imagepath)}}" alt="">   
@else
<img class="post-img" src="{{asset('images/icons/platinum-cover.png')}}" alt="">  
@endif
</div>
@else
<div class="row add-img-row">    
<img class="post-img" src="{{asset('images/icons/platinum-cover.png')}}" alt="">  
</div>
@endif


@if($gold != NULL)    
<div class="row add-img-row col-lg-12 col-md-12 col-sm-4 col-wsm-4">
    
<div class="ws-ribbon">
<div class="ws-ribbon-inner">
    <span class="ws-ribbon-label">GOLD
        <br>
        SPONSER</span>
</div>
</div>
    
@if($gold->status == 'on')
<img class="post-img" src="{{asset($gold->imagepath)}}" alt="">   
@else
<img class="post-img" src="{{asset('images/icons/gold-cover.png')}}" alt="">  
@endif
</div>
@else
<div class="row add-img-row">    
<img class="post-img" src="{{asset('images/icons/gold-cover.png')}}" alt="">  
</div>
@endif

    
    
@if($silver != NULL)    
<div class="row add-img-row col-lg-12 col-md-12 col-sm-4 col-wsm-4">
<div class="ws-ribbon">
<div class="ws-ribbon-inner">
    <span class="ws-ribbon-label">SILVER
        <br>
        SPONSER</span>
</div>
</div>
@if($silver->status == 'on')
<img class="post-img" src="{{asset($silver->imagepath)}}" alt="">   
@else
<img class="post-img" src="{{asset('images/icons/silver-cover.png')}}" alt="">  
@endif
</div>
@else
<div class="row add-img-row">    
<img class="post-img" src="{{asset('images/icons/silver-cover.png')}}" alt="">  
</div>
@endif
    
    
</div>

</div>
@endif  
    
    
    
    
    
    



    
</div>
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 



<script>
$(document).ready(function () {
  $('.porto').porto({
      columns        : 4,
      margin         : 2,
      background     : "rgba(0,0,0,.6)",
      captionFit     : true
  });
});
</script>





@stop