@extends('Layouts.layout')



@section('content')


<main>        
    
<script type="text/javascript">      
    var page='Parade';
</script>

<section class="well temp-section background-white">
<div class="container">
<div class="row parade-img-row">    
<h2 class="font-header-large color-black">PSYCHO <small class="color-yellow">PARADE</small></h2>
@if($event->imagestate == 'true')
<img class="header-image" src="{{asset($event->imagepath)}}">
@endif    
    
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
<!--<div class="temp-section">-->
    
<div class="col-sm-12 col-md-6 bar-list-container">

<ul class="bar-list">
    <li>
    <a href="#"><img class="thumb-img" src="../images/parade/1.jpg" style="height:auto;"></a>
    <a href="#"><img class="thumb-img" src="../images/parade/2.jpg" style="height:auto;"></a>
    <a href="#"><img class="thumb-img" src="../images/parade/3.jpg" style="height:auto;"></a>
    <a href="#"><img class="thumb-img" src="../images/parade/4.jpg" style="height:auto;"></a>
    <a href="#"><img class="thumb-img" src="../images/parade/5.jpg" style="height:auto;"></a>
    <a href="#"><img class="thumb-img" src="../images/parade/6.jpg" style="height:auto;"></a>
    <a href="#"><img class="thumb-img" src="../images/parade/7.jpg" style="height:auto;"></a>
    <a href="#"><img class="thumb-img" src="../images/parade/8.jpg" style="height:auto;"></a>
    <a href="#"><img class="thumb-img" src="../images/parade/9.jpg" style="height:auto;"></a>
    </li>
  </ul>
</div>
    
    
<div class="col-md-6 col-sm-12">
<p id="para-1" class="font-para-15 color-darkblue animated">{{$event->description}}</p>
</div>

<!--</div>-->
</div>
 
<div class="row parade-social-icon-container"> 
    
<div id="div-parade-social" class="parade-social animated">
  <a class="fa fa-facebook" title="" target="_blank" href="#"></a>
  <a class="fa fa-twitter" title="" target="_blank" href="#"></a>
  <a class="fa fa-google-plus" title="" target="_blank" href="#"></a>
  <a class="fa fa-instagram" title="" target="_blank" href="#"></a>
</div>    
    
</div>

</div>
</section>
    
</main>


@stop