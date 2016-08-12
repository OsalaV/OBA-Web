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
      
<!--Links -->
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/fonts.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/template.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/listo.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/form.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/customs/flipclock.css') }}">
        
<!--Fonts and Icons -->
<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.6.3/css/font-awesome.min.css') }}">


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
    
    

@yield('content')
       
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
        
  
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/header.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.animations.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.porto.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ws-updatecart.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ws-modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ws-formsubmit.js') }}"></script>
    
</body>
</html>



