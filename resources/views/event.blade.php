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
  
<div class="col-md-2 timebox">
<time>
<span class="day">4</span>
<span class="month">Jul</span>
<span class="year">2016</span>
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
<div class="temp-section">
<div class="col-md-12 col-sm-12">
<p id="para-1" class="font-para-15 color-darkblue animated">
{{$event->description}}
</p>
</div>

</div>
</div>
    
    

<div class="row tickets-row">   

<div class="col-md-3">
  <div class="circle c1 img-circle">
      <h4 class="blue">Basic Plan</h4>
      <span class="icon blue"><i class="fa fa-eur"></i></span>
      <span class="price-large blue">8,</span>
      <span class="price-small">90</span>
      <p>Great for small Business</p>
  </div>
</div>
    
          
<div class="col-md-3">
          <div class="circle c2 img-circle">
              <h4 class="yellow">Starter Plan</h4>
              <span class="icon yellow"><i class="fa fa-eur"></i></span>
              <span class="price-large yellow">24,</span>
              <span class="price-small">90</span>
              <p>Great for small Business</p>
          </div>
  </div><!-- .Col-md-3 ends here -->
          
          <div class="col-md-3">
                  <div class="circle c3 img-circle">
                      <h4 class="green">Premier Plan</h4>
                      <span class="icon green"><i class="fa fa-eur"></i></span>
                      <span class="price-large green">54,</span>
                      <span class="price-small">90</span>
                      <p>Great for small Business</p>
                  </div>
              </div><!-- .Col-md-3 ends here -->
          
          <div class="col-md-3">
                  <div class="circle c4 img-circle">
                      <h4 class="red">Deluxe Plan</h4>
                      <span class="icon red"><i class="fa fa-eur"></i></span>
                      <span class="price-large red">8,</span>
                      <span class="price-small">90</span>
                      <p>Great for small Business</p>
                  </div>
          </div>
    
</div>
    


<div class="row tickets-row"> 
<center>

<div class="selfie-creative-btn">						
<a class="btn btn-1 btn-1c" href="{{ URL::to('user-login') }}">Grab your tickets now</a>	
</div>
   
    
</center>    
    
</div>


    

</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 




@stop