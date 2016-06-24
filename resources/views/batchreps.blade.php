@extends('Layouts.layout')



@section('content')

<main>      
    
<script type="text/javascript">      
    var page='Member';
</script>

<section class="well temp-section background-white">
<div class="container">
<div class="row committee-row">    
<h2 class="font-header-large color-black">BATCH <small class="color-yellow">representatives</small></h2>

<div class="row">
@foreach($batchreps as $batchrep)
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="text-center">
<img class="" src="{{asset($batchrep->imagepath)}}" alt="">
</div>
    
<div class="text-center">
    
<h4 class="font-sub-16 color-darkblue">{{$batchrep->fullname}}
<br>
<span class="font-para-14 color-lightblue">{{$batchrep->year}}</span>
</h4>
    
<p class="font-para-14 color-darkblue">
{{$batchrep->email}}
<br>
{{$batchrep->contact}}
</p>

<div class="sociali">
@if($batchrep->facebook != NULL)
<a class="fa fa-facebook" title="" target="_blank" href="{{$batchrep->facebook}}"></a>
@endif
@if($batchrep->twitter != NULL)
<a class="fa fa-twitter" title="" target="_blank" href="{{$batchrep->twitter}}"></a>
@endif
@if($batchrep->google != NULL)
<a class="fa fa-google-plus" title="" target="_blank" href="{{$batchrep->google}}"></a>
@endif
@if($batchrep->linkedin != NULL)
<a class="fa fa-linkedin" title="" target="_blank" href="{{$batchrep->linkedin}}"></a>
@endif    
</div>
   
</div>  

</div>
@endforeach

</div>
</div>
   
</div>
</section>
    
</main>

<!--
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
-->

@stop