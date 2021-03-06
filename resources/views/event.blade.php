<!DOCTYPE html>
<html>
<head>
    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no"/>
<title>{{$title}}</title>
    
<link rel="icon" href="{{asset('images/icons/favicon.ico')}}" type="image/x-icon">


<!--Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{asset('css/common/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/common/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/common/animatetime.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/common/jquery.bxslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/common/jquery.porto.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/common/scrollbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/common/remodal.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/common/remodal-default-theme.css') }}">
      
<!--Links -->
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/fonts.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/template.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/listo.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/form.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/flipclock.css') }}">
        
<!--Fonts and Icons -->
<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.6.3/css/font-awesome.min.css') }}">


<!--<link href="/pace/themes/pace-theme-barber-shop.css" rel="stylesheet" />-->


<script type="text/javascript" src="{{ asset('js/jquery-1.11.2.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/flipclock.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rd-smoothscroll.min.js') }}"></script>

<script type="text/javascript">      
var page='Home';
</script> 
    
</head>

<body>

<div class="temp-body">

<!--===========================================================================================-->
<!--HEADER-->
<!--===========================================================================================-->  
    
<header>  
            
<div class="container-fluid header-wrapper">
<div class="row header-container">
                            
<div class="col-md-3 col-sm-3 header-logo-container hidden-xs">
<div class="navbar-header header-brand-container background-yellow text-center" >
<div class="navbar-brand header-brand">
<a href=""><img class="header-logo" src="{{asset('images/icons/logo.png')}}"></a>
</div>
</div>
</div>
                                
<div class="col-md-9 col-sm-9 header-flag-container">
<div class="header-flag-yellow"></div>
<div class="header-flag-black text-center">
<h5 class ="header-flag-text">D.S.Senanayake College Old Boys Association</h5>
<h5 class ="header-flag-text-small">Country before self</h5>
</div>
</div>


</div>
</div>

</header>
    
<div class=" header-nav-container text-left">
<div class="header-menu">
<ul class="header-nav">
<li id="Home" class=""><a href="/"><span>Home</span></a></li>
<li id="Events" class=""><a href="{{ URL::to('events') }}"><span>Events</span></a></li>
<!--<li id="Parade" class=""><a href="{{ URL::to('psycho-parade') }}"><span>Psycho Parade</span></a></li>-->
<li id="Projects" class=""><a href="{{ URL::to('projects') }}"><span>Projects</span></a></li>
<li id="Member" class=""><a href="{{ URL::to('committee-members') }}"><span>Committee</span></a>
    <ul class="top-ul">
    <li><a href="{{ URL::to('batch-representatives') }}"><span>Batch Representatives</span></a></li>
    <li><a href="{{ URL::to('past-presidents') }}"><span>Past Presidents</span></a></li>
    </ul>            
</li>
<li id="Membership" class=""><a href="{{ URL::to('membership') }}"><span>Membership</span></a></li>
<li id="Contact" class=""><a href="{{ URL::to('contact') }}"><span>Contact Us</span></a></li>
</ul>
</div>
</div> 
    
<a class="scrolldn" href="#"></a>

<a class="scrollup" href="#"></a>


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
 
<!--event description-->
<div id="desc" data-desc="{{$event->description}}">
    
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
        
    
</div>
    

 
<div class="col-md-4 ws-side-bx-container">
 
@if($event->sponserstate != NULL)  
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
@endif  

<div class="side-list hidden-xs hidden-sm">   
<ul id="list-2">
  <span class="font-para-15 color-darkblue font-normal">Recent Events</span>
  <hr>
  @foreach($recentevents as $recentevent)
  <li><p class="animated"><a href="{{ URL::to('events/'.str_replace(' ', '_', $recentevent->title)) }}">{{$recentevent->title}}</a></p></li>
  <hr>
  @endforeach 
</ul>
</div>

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
      margin         : 2,
      background     : "rgba(0,0,0,.6)",
      captionFit     : true
  });
});
</script>   
      
      
      
      
      
      
       
<footer class="footer-container">
<section class="footer-section">
<div class="container"> 
<div class="col-md-6 col-sm-12 col-xs-12 footer-text-container">
<p class="font-footer color-white footer-text">
Developed by 2011 batch &#169; <span class="footer-year">2016</span>
<a class="footer-privacy" href="">Privacy Policy</a>
</p> 
</div>
<div class="col-md-6 col-sm-12 col-xs-12 footer-icon-container">
<div id="div-social" class="social animated">
  <a class="fa fa-facebook" title="" target="_blank" href="#"></a>
  <a class="fa fa-twitter" title="" target="_blank" href="#"></a>
  <a class="fa fa-google-plus" title="" target="_blank" href="#"></a>
  <a class="fa fa-instagram" title="" target="_blank" href="#"></a>
</div> 
</div> 
</div> 
</section>    
</footer>
   
</div><!--temp-body-->
        
<script type="text/javascript">
    $(document).ready(function(){
        
        $(window).scroll(function(){
            if ($(this).scrollTop() > 1000) {
                $('.scrollup').fadeIn();
                $('.scrolldn').fadeIn();
            } else {
                $('.scrollup').fadeOut();
                $('.scrolldn').fadeOut();
            }
        });
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 1000);
            return false;
        });

        $('.scrolldn').click(function(){
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            return false;
        });
    });
</script>
    
    
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/header.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.animations.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.porto.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ws-updatecart.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ws-modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ws-formsubmit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/remodal.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ws-member-modal.js') }}"></script>
<script src="{{ asset('js/pace.min.js') }}"></script>


<script>

    Pace.on("done", function(){
        $(".cover").show(2000);
    });
    
</script>  
    
<script>
$(document).ready(function() {    
var description = $('#desc').data("desc");   
$('#desc').append(description); 
});    
</script> 

    
</body>
</html>



