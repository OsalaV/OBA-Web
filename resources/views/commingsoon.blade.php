<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="WS Admin Template Theme by Samu">
    <meta name="author" content="Samu Abeynayake(WS)">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comming Soon</title>
    
    <link rel="icon" href="{{asset('images/icons/favicon.ico')}}" type="image/x-icon">

    <!--Bootstrap -->

    <link rel="stylesheet" type="text/css" href="{{asset('css/common/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/flipclock.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/template.css') }}"> 
           
    <!--Fonts and Icons -->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.6.3/css/font-awesome.min.css') }}">

    <style text="text/css">body .flip-clock-wrapper ul li a div div.inn, body .flip-clock-small-wrapper ul li a div div.inn { color: #CCCCCC; background-color: #333333; } body .flip-clock-dot, body .flip-clock-small-wrapper .flip-clock-dot { background: #323434; } body .flip-clock-wrapper .flip-clock-meridium a, body .flip-clock-small-wrapper .flip-clock-meridium a { color: #323434; }</style>

    <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/flipclock.js') }}"></script>  
</head>
    
<body class="ws-overlay-body">


<div class="ws-overlay-textbox">

<div class="text-center">
<img class="ws-overlay-logo" src="{{asset('images/icons/logo.png')}}" />  
</div>


<hr> 
<div class="text-center">
<h2 class="font-header-large color-black">We<small class="color-white"> are launching in</small></h2> 
</div>

<div class="ws-overlay-clock">
    <div class="clock-builder-output"></div> 
</div>

<div class="text-center">  
<div id="div-social" class="social ws-overlay-social">
  <a class="fa fa-facebook" title="Facebook" href="https://www.facebook.com/OBADSSC/"></a>
  <a class="fa fa-twitter" title="Twitter" href="https://twitter.com/obadssc"></a>
  <a class="fa fa-instagram" title="Instagram" href="https://www.instagram.com/obadssc/"></a>
</div> 
</div>

<hr>

<div class="text-center">
<img class="ws-overlay-add" src="{{asset('images/icons/agra.png')}}" /> 
<img class="ws-overlay-add" src="{{asset('images/icons/sadaharitha.png')}}" />
<img class="ws-overlay-add" src="{{asset('images/icons/pilot.jpg')}}" />
<img class="ws-overlay-add" src="{{asset('images/icons/asb.png')}}" />
<img class="ws-overlay-add" src="{{asset('images/icons/maxmara.jpg')}}" />
</div> 

</div>


   
<!-- js files -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
   
<script type="text/javascript">
$(function(){
	FlipClock.Lang.Custom = { days:'Days', hours:'Hours', minutes:'Minutes', seconds:'Seconds' };
	var opts = {
		clockFace: 'HourCounter',
		countdown: true,
		language: 'Custom'
	};  
	var countdown = 1475845200 - ((new Date().getTime())/1000); // from: 10/07/2016 06:30 pm +0530
	countdown = Math.max(1, countdown);
	$('.clock-builder-output').FlipClock(countdown, opts);
});
</script>
    
</body>
</html>