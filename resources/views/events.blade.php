@extends('Layouts.layout')



@section('content')

<main>        
    
    <script type="text/javascript">      
            var page='Events';
        </script>

<section class="well temp-section background-white">
<div class="container">
<div class="row">    
<h2 class="font-header-large color-black">UPCOMMING <small class="color-yellow">EVENTS </small></h2>


    
<ul class="bxslider">
 
@foreach($events as $event)
<li>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="thumbnail port-thumb">
<img src="{{asset($event->imagepath)}}" alt="">
<div class="port-caption background-yellow-alpha port-cap-hover">      
  <div class="wrap">
  <h3 class="font-sub-22">{{$event->title}}</h3>
  <a href="{{ URL::to('events-view/'.$event->id) }}" class="fa fa-angle-right fa-2x"></a>
  </div>  
</div>
</div>

</div>
</div>

</li>
@endforeach
        

  
</ul> 
    


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

@stop