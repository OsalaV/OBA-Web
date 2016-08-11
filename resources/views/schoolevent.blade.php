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

    
<div class="col-md-8">
    
<div class="row post-header-row">
<span class="font-header-25px color-black">{{$event->title}}</span>
</div>   
 

<div class="row post-details-row">
<span class="post-tags"><i class="fa fa-calendar"></i> {{$event->month.' '.$event->day.', '.$event->year}}</span>&nbsp;
<span class="post-tags"><i class="fa fa-clock-o"></i> {{'at '.$event->time}}</span>
</div>

    
@if($event->imagestate == "true")
<div class="row post-img-row">
<img class="post-img" src="{{asset($event->imagepath)}}" alt="">           
</div>
@endif 

<!--
<div class="row post-share-row text-left">
<div class="post-share">
  <span class="font-para-15 color-darkblue hidden-xs">Share this post </span>
  <a class="fa fa-facebook" title="" target="_blank" href="#"></a>
  <a class="fa fa-twitter" title="" target="_blank" href="#"></a>
  <a class="fa fa-google-plus" title="" target="_blank" href="#"></a>
  <a class="fa fa-linkedin" title="" target="_blank" href="#"></a>
</div>
</div>
-->
    
 
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
<a href="{{ URL::to('download-events-resource/'.$encrypted) }}" class="ws-form-action-btn-green pull-left">Download Resource Files</a>
</div>
@endif   
    
 
@if(count($eventimages) != 0)
<div class="row tickets-row">
    
<div class="porto">
@foreach($eventimages as $eventimage)
<div class="pf" data-pf-image="{{asset($eventimage->img_path)}}"></div>
@endforeach       
</div>
    
    
</div>   
@endif
    
    
    
</div>   
    
<div class="col-md-4">
    
    <div style="height:400px;background-color: green;margin-top:92px">
        <div style="padding-top:150px">
            <center>
                <h1 style="font-weight: bold; color: white">Platinum </h1>
            </center>
        </div>
    </div>
    <div style="height:300px;background-color: blue;">
        <div style="padding-top:100px">
            <center>
                <h1 style="font-weight: bold; color: white">Gold</h1>
            </center>
        </div>
    </div>
    <div style="height:200px;background-color: red;">
        <div style="padding-top:60px">
            <center>
                <h1 style="font-weight: bold; color: white">Silver</h1>
            </center>
        </div>
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
      background     : "transparent"
  });
});
</script>





@stop