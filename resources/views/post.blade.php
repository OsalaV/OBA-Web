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
var page='Home';
</script>

<section class="well temp-section background-white">
<div class="container">
<div class="row">    

    
<div class="col-md-8" style="margin-bottom:40px">
    
<div class="row post-header-row">
<span class="font-header-25px color-black">{{$post->title}}</span>
</div>   
 

<div class="row post-details-row">
<span class="post-tags"><i class="fa fa-calendar"></i> {{$post->updated_at->toFormattedDateString()}}</span>&nbsp;
<span class="post-tags"><i class="fa fa-clock-o"></i> {{'at '.$post->updated_at->toTimeString()}}</span>
</div>

    
@if($post->imagestate == "true")
<div class="row post-img-row">
<img class="post-img" src="{{asset($post->imagepath)}}" alt="">           
</div>
@endif 

<div class="row post-share-row text-left">
<div class="post-share">
  <span class="font-para-15 color-darkblue hidden-xs">Share this post </span>
  <a class="fa fa-facebook" title="" target="_blank" href="#"></a>
  <a class="fa fa-twitter" title="" target="_blank" href="#"></a>
  <a class="fa fa-google-plus" title="" target="_blank" href="#"></a>
  <a class="fa fa-linkedin" title="" target="_blank" href="#"></a>
</div>
</div>
    
   
<!--post description-->
<div id="desc" data-desc="{{$post->description}}">
    
</div>
    

<!--video div-->
@if($post->video != NULL)
<div class="row tickets-row">  
<div class="embed-responsive embed-responsive-16by9">
            
    <iframe class="embed-responsive-item" src="{{asset($post->video)}}" frameborder="0" autohide="1" modestbranding="1" rel="0" theme="light" allowfullscreen></iframe>
    
</div>
</div>   
@endif
    

</div>   
 
<div class="col-md-4 ws-side-bx-container">
         
<div class="side-list hidden-xs hidden-sm">      
    <ul id="list-2">
      <span class="font-para-15 color-darkblue font-normal">Recent Posts</span>
      <hr>
      @foreach($posts as $post)
      <li><p class="animated"><a href="{{ URL::to('posts/'.str_replace(' ', '_', $post->title)) }}">{{$post->title}}</a></p></li>
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



