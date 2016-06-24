@extends('Layouts.layout')



@section('content')

<main>        
    
<script type="text/javascript">      
var page='Events';
</script>

<section class="well temp-section background-white">
<div class="container">
<div class="row events-public-row">    
  
<ul class="bxslider"> 
@foreach($pubevents as $pubevent)
<li>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">

<form id="{{'publiceventform'.$pubevent->id}}" action="{{ URL::to('events-show') }}" method="get" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="postid" value="{{$pubevent->id}}" />
    
<a id="publicevent" data-id="{{$pubevent->id}}" class="cursor-pointer">
<img src="{{asset($pubevent->imagepath)}}" alt="">
</a>
    
</form> 


</div>
</div>

</li>
@endforeach
</ul> 
</div>
    
@if(count($schoolevents) != 0)
<div class="row">  
    
<h2 class="font-header-large color-black">SCHOOL <small class="color-yellow">EVENTS </small></h2>
    
<div class="porto">
@foreach($schoolevents as $schoolevent)
<?php $encrypted = Crypt::encrypt($schoolevent->title); ?>
<div class="pf" data-pf-image="{{asset($schoolevent->imagepath)}}" data-pf-title="{{$schoolevent->title}}" data-pf-onclick="{{ URL::to('schoolevents-show/'.$encrypted) }}"></div>
@endforeach       
</div> 
    
    
</div>
@endif    
    
    
    
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