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
    

<div class="row">   
 
<div class="col-md-6 header-pad-0px">
<span class="font-header-30px color-black">{{$event->title}}</span>
</div> 

<div class="col-md-6 parade-social-icon-container text-right"> 
    
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
    
    
</div>   
    
<div class="col-md-4">
    
    @if($platinum != NULL)    
    <div class="row add-img-row" style="margin-top:70px">
    @if($platinum->status == 'on')
    <img class="post-img" src="{{asset($platinum->imagepath)}}" alt="">   
    @else
    <img class="post-img" src="{{asset('images/icons/platinum-cover.png')}}" alt="">  
    @endif
    </div>
    @else
    <div class="row add-img-row" style="margin-top:70px">    
    <img class="post-img" src="{{asset('images/icons/platinum-cover.png')}}" alt="">  
    </div>
    @endif
    
    
    @if($gold != NULL)    
    <div class="row add-img-row">
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
    <div class="row add-img-row">
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