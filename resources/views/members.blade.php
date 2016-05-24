@extends('Layouts.layout')



@section('content')

<main>        

<section class="well temp-section background-white">
<div class="container">
<div class="row">    
<h2 class="font-header-large color-black">COMMITTEE <small class="color-yellow">MEMBERS</small></h2>

<div class="row">
@foreach($members as $member)
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="thumbnail port-thumb">
    <img class="" src="{{asset($member->imagepath)}}" alt="">
    <div>
    <h4 class="font-sub-16"><a class="color-lightblue" href="#">{{$member->fullname}} <br /><br /> {{$member->post}}</a></h4>
    <p class="font-para-14 color-darkblue">
    {{$member->email}} <br /> {{$member->contact}}
    </p>
    <!--<h4 class="font-sub-22"><a class="color-lightblue" href="#">President </a></h4>-->
        <div id="div-sociali" class="sociali animated">
              <a class="fa fa-facebook" title="" target="_blank" href="{{$member->facebook}}"></a>
              <a class="fa fa-google-plus" title="" target="_blank" href="{{$member->google}}"></a>
              <a class="fa fa-linkedin" title="" target="_blank" href="{{$member->linkedin}}"></a>
              <a class="fa fa-twitter" title="" target="_blank" href="{{$member->twitter}}"></a>
        </div> 
    </div>  
    </div>
</div>
@endforeach

</div>
</div>
    
<div class="row">    
<h2 class="font-header-large color-black">BATCH <small class="color-yellow">REPRESENTS</small></h2>
 
<ul class="bxslider">
    @foreach($batchreps as $batchrep)
    <li>
        <div class="thumbnail port-thumb">
            <img class="" src="{{asset($batchrep->imagepath)}}" alt="">
            <div class="hidden-xs">
                <h4 class="font-sub-16"><a class="color-lightblue" href="#">{{$batchrep->fullname}}</a></h4>
                <p class="font-para-14 color-darkblue">
                {{$batchrep->year}} <br /> {{$batchrep->email}} <br /> {{$batchrep->contact}} 
                </p>
            </div>  
        </div>
        <div id="div-sociali" class="sociali animated">
              <a class="fa fa-facebook" title="" target="_blank" href="{{$batchrep->facebook}}"></a>
              <a class="fa fa-google-plus" title="" target="_blank" href="{{$batchrep->google}}"></a>
              <a class="fa fa-linkedin" title="" target="_blank" href="{{$batchrep->linkedin}}"></a>
              <a class="fa fa-twitter" title="" target="_blank" href="{{$batchrep->twitter}}"></a>
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
  minSlides: 5,
  maxSlides: 5,
  slideWidth: 600,
  slideMargin: 10
});

});

    
    
</script>

@stop