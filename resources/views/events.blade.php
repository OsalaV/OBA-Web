@extends('Layouts.layout')



@section('content')

<main>     
   
<style>
    
.bx-wrapper, .bx-viewport {
    width: 100%;
/*    height: 250px !important; */
}
    
.bx-wrapper img {    
/*    height: 250px;*/
    display: block;
}

    
</style>   
    
<script type="text/javascript">      
var page='Events';
</script>

<section class="well temp-section background-white">

<div class="container">
 
<div class="row ws-events-bottom-row">

<h2 class="font-header-large color-black">OUR <small class="color-yellow">EVENTS </small></h2>


<div class="col-md-6">
 
@if(count($recentevents) > 0)

<div class="row">   
<ul class="bxslider"> 
@foreach($recentevents as $recentevent)
<li>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">


    
<a href="{{ URL::to('events/'.str_replace(' ', '_', $recentevent->title)) }}" >
<img src="{{asset($recentevent->imagepath)}}" alt="">
</a>    



</div>
</div>

</li>
@endforeach
</ul>

<div class="ws-bottoms-up">
<h4>Recent Events</h4>    
</div>
   
</div>
@endif   
</div>

<div class="col-md-6 ws-featued-vid">
<div class="embed-responsive embed-responsive-16by9">
            
    <iframe class="embed-responsive-item" src="{{$feturedvideo->description}}" frameborder="0" autohide="1" modestbranding="1" rel="0" theme="light" allowfullscreen></iframe>
    
</div>    
    
</div>
    

</div>
  
</div>


<div class="container ws-dv-pad0">
 
@if(count($events) > 0)   
<div class="porto">
@foreach($events as $event)
<div class="pf" data-pf-image="{{asset($event->imagepath)}}" data-pf-title="{{$event->title}}" data-pf-onclick="{{ URL::to('events/'.str_replace(' ', '_', $event->title)) }}"></div>
@endforeach       
</div>
@endif    
    
<div class="row">  
{{ $events->links() }} 
</div>
    
</div>
    
    

</section>
    
</main>

<script>
$(document).ready(function(){

$('.bxslider').bxSlider({
  minSlides: 1,
  maxSlides: 1,
  pager: false
});

}); 
</script>   


<script>
$(document).ready(function () {
  $('.porto').porto({
      columns        : 4,
      margin         : 5,
      captionMode    : "title",
      background     : "rgba(252, 184, 18, 0.8)", 
      onclickAction  : "url",
      linkTarget     : "same"
  });
});
</script>









@stop