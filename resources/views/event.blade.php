@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>   
    <script type="text/javascript">      
            var page='Event';
        </script>

<section class="well temp-section background-white">
<div class="container">
<div class="row">   
 
<div class="col-md-6">
<h2 class="font-header-large color-black"><small class="color-black">{{$event->title}}</small></h2>
</div> 

<div class="col-md-6 parade-social-icon-container text-right"> 
    
<div id="div-parade-social" class="parade-social animated">
  <a class="fa fa-facebook" title="" target="_blank" href="#"></a>
  <a class="fa fa-twitter" title="" target="_blank" href="#"></a>
  <a class="fa fa-google-plus" title="" target="_blank" href="#"></a>
  <a class="fa fa-instagram" title="" target="_blank" href="#"></a>
</div>    
    
</div>    
</div>
    
<div class="row">
<img class="header-image" src="{{asset($event->imagepath)}}">  
</div>

<div class="row ico-container">

<div class="col-md-4">
 
<div class="form-inline clearfix">
<div class="event-icon-box">
<center><i class="fa fa-calendar fa-3x event-icon"></i> </center>
</div>
<div class="post-title-box text-center">
<span class="font-para-18">{{$event->date}}</span>
</div>
</div>
    
</div>
    
<div class="col-md-4">
 
<div class="form-inline clearfix">
<div class="event-icon-box">
<center><i class="fa fa-clock-o fa-3x event-icon"></i> </center>
</div>
<div class="post-title-box text-center">
<span class="font-para-18">{{$event->time}}</span>
</div>
</div>
    
</div>
    
<div class="col-md-4">
 
<div class="form-inline clearfix">
<div class="event-icon-box">
<center><i class="fa fa-map-marker fa-3x event-icon"></i> </center>
</div>
<div class="post-title-box text-center">
<span class="font-para-18">{{$event->location}}</span>
</div>
</div>
    
</div>
    
    
</div>
    
<div class="row"> 
<div class="temp-section">
<div class="col-md-12 col-sm-12">
<p id="para-1" class="font-para-15 color-darkblue animated">
{{$event->description}}
</p>
</div>

</div>
</div>
    
    

<div class="row tickets-row">   
 
<div class="col-md-10">    
<h2 class="font-header-large color-black">GRAB YOUR <small class="color-yellow">Tickets now</small></h2>    
</div>
    
<div class="col-md-2">  
<div class="selfie-creative-btn">						
<a class="btn btn-1 btn-1c" href="">SIGN IN NOW</a>					
</div>
</div> 
    
</div>

    

</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 




@stop