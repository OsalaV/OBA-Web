@extends('Layouts.layout')



@section('content')

<main>        
    
<script type="text/javascript">      
var page='Events';
</script>

<section class="well temp-section background-white">
<div class="container">
  
<!--
@if(count($pubevents) > 0)
<div class="row events-public-row">   
<ul class="bxslider"> 
@foreach($pubevents as $pubevent)
<li>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">


    
<a href="{{ URL::to('events-public/'.str_replace(' ', '_', $pubevent->title)) }}" >
<img src="{{asset($pubevent->imagepath)}}" alt="">
</a>    



</div>
</div>

</li>
@endforeach
</ul> 
</div>
@endif   
-->
    
    
    
@if(count($events) > 0)
<div class="row">      
<h2 class="font-header-large color-black">OUR <small class="color-yellow">EVENTS </small></h2>
</div>    

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