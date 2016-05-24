@extends('Layouts.layout')



@section('content')

<main>        

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
  <a href="{{ URL::to('event/'.$event->id) }}" class="fa fa-angle-right fa-2x"></a>
  </div>  
</div>
</div>

</div>
</div>

</li>
@endforeach
        

  
</ul> 
    
    <h2 class="font-header-large color-black">PAST <small class="color-yellow">EVENTS </small></h2>


    
    <ul class="bxslider">
        
        <li>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="thumbnail port-thumb">
                    <img src="../images/events/2.jpg" alt="">
                    <div class="port-caption background-yellow-alpha port-cap-hover">      
                      <div class="wrap">
                      <h3 class="font-sub-22">Prefects Guide</h3>
                      <a href="#" class="btn-link fa-angle-right"></a>
                      </div>  
                    </div>
                  </div>

                    <p class="font-para-15 color-darkblue">
                    Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  </p>

                </div>
            </div>

        </li>

        <li>

        </li>

        <li>

        </li>

        <li>

        </li>

        <li>

        </li>

        <li>

        </li>

        <!--next 6-->
        <li>

        </li>

        <li>

        </li>

        <li>

        </li>

        <li>

        </li>

        <li>

        </li>

        <li>

        </li>

  
    </ul> 
    
<!--
<div class="row">
            
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="thumbnail port-thumb thumb-shadow">
    <img src="../Resources/images/events/2.jpg" alt="">
    <div class="port-caption background-yellow-alpha port-cap-hover">      
      <div class="wrap">
      <h3 class="font-sub-22">Prefects Guide</h3>
      <a href="#" class="btn-link fa-angle-right"></a>
      </div>  
    </div>
  </div>  
    
    <p class="font-para-15 color-darkblue">
    Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </p>
    
</div>

    
</div>
-->
</div>
</div>
</section>
    
</main>

<script>
$(document).ready(function(){

$('.bxslider').bxSlider({
  minSlides: 1,
  maxSlides: 1,
  slideWidth: 1000,
  slideMargin: 10
});

});

    
    
</script>

@stop