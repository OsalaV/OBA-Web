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
    
 

    
<div class="row">
<pre class="font-para-15 color-darkblue content-pre">{{$event->description}}</pre>
</div>
    
    
    
    
    
    
</div>   
    

    
</div>
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 


@stop