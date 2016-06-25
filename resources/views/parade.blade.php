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

@if(count($eventimages) > 0)   
<div class="col-md-6"  style="margin-bottom:20px;">

<div class="porto">
@foreach($eventimages as $eventimage)
<div class="pf" data-pf-image="{{asset($eventimage->img_path)}}"></div>
@endforeach       
</div>
    
    
</div>
@endif    
   
    
<?php    
$description = $event->description;    
$paragraphs  = explode("[para]",$description);    
?>
    
<div class="col-md-6 col-sm-12">
@foreach($paragraphs as $paragraph)
<p id="para-1" class="font-para-15 color-darkblue animated">{{$paragraph}}</p>
@endforeach    
</div>

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


<script>
$(document).ready(function () {
  $('.porto').porto({
      columns        : 4,
      margin         : 2,
      background     : "transparent"
  });
});
</script>



@stop