@extends('Layouts.layout')

@section('content')

<main> 
        
<script type="text/javascript">      
var page='Home';
</script>
        
 
@if(count($sliders) > 0)
<section class="well slider-section background-white">
<div class="container-fluid no-padding">

<ul class="bxslider" style="padding:0px !important;">
  @foreach($sliders as $slider)
  <li><img src="{{asset($slider->imagepath)}}"/></li>
  @endforeach
</ul>    
    
</div>
</section>
@endif
<!--end of slider section-->
   
   
@if(count($posts) > 0)  
<section class="well temp-section background-white hidden-xs hidden-sm">
<div class="container no-padding">
<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<ul class="bxslider-posts">    
 @foreach($posts as $post)
<li class="">
  <div class="form-inline clearfix">
  <div class="post-title-box text-center">
  
  
  <div class="post-title-box-inner">
      
  <?php 
      
      $t_txt = $post->title;
      $t_len = strlen($t_txt);
      
      if($t_len > 64){
          $t_stringCut = substr($t_txt, 0, 64);
          $t_string    = substr($t_stringCut, 0, strrpos($t_stringCut, ' ')).'...';    
      }
      else{
          $t_string    = $t_txt;
      }
      
      $paragraphs  = explode("[para]",$post->description); 

      $d_txt = $paragraphs[1];
      
      $d_len = strlen($d_txt);
      if($d_len > 150){
          $d_stringCut = substr($d_txt, 0, 150);
          $d_string    = substr($d_stringCut, 0, strrpos($d_stringCut, ' ')).'...';
      }
      else{
          $d_string    = $d_txt;
      }
    
  ?>
  
  
  <a href="{{ URL::to('posts/'.str_replace(' ', '_', $t_txt)) }}" class="news-title">{{$t_string}}</a>
  <p class="post-desc">{{$d_string}}</p>
  

  </div>
      
      
     
  </div>
  </div>
  
</li>
@endforeach
</ul> 
</div>    

</div>
</div>
</section>
@endif
    
    
@if(count($posts) > 0)    
<section class="well temp-section background-white hidden-md hidden-lg">
<div class="container-fluid no-padding">
<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<ul id="ul-news" class="animated no-padding">
@foreach($posts as $post)
<li>
<div class="form-inline clearfix">
<div class="post-title-box text-center">

<div class="post-title-box-inner">  
    
<?php 
      
      $t_txt = $post->title;
      $t_len = strlen($t_txt);
      
      if($t_len > 64){
          $t_stringCut = substr($t_txt, 0, 64);
          $t_string    = substr($t_stringCut, 0, strrpos($t_stringCut, ' ')).'...';    
      }
      else{
          $t_string    = $t_txt;
      }
      
      $paragraphs  = explode("[para]",$post->description); 

      $d_txt = $paragraphs[1];
      
      $d_len = strlen($d_txt);
      if($d_len > 150){
          $d_stringCut = substr($d_txt, 0, 150);
          $d_string    = substr($d_stringCut, 0, strrpos($d_stringCut, ' ')).'...';
      }
      else{
          $d_string    = $d_txt;
      }
    
  ?>
    
    
<a href="{{ URL::to('posts/'.str_replace(' ', '_', $t_txt)) }}" class="news-title">{{$t_string}}</a>
<p class="post-desc">{{$d_string}}</p>
</div>    
    
</div>
</div>
    
    
</li>
@endforeach
</ul> 
</div>    

</div>
</div>
</section>
@endif    
    

    
    
    
<!--end of news section--> 
   
   
    
		    
<section class="well temp-section background-ash">
<div class="container no-padding">
<h2 class="font-header-large color-black">WELCOME TO <small class="color-yellow">OLD BOYS ASSOCIATION!</small></h2>
<div class="row">
<div class="col-md-12 col-sm-12">
  <p id="" class="font-para-15 color-darkblue">
    D.S. Senanayake College, situated in Colombo 07 (Cinnamon Gardens) is one of the premiere educational institutes in Sri Lanka. With the short span of history it has been able to gain many achievements of excellence both in the academic and non academic fields , locally and internationally to be proud as a truly multi-ethnic, multi-religious College which has proudly created unblemished and prestigious record of excellence in academia , sport and community leadership culminating being an institute of highly innovative and patriotic individuals to the motherland. School has current enrollment of over 6000 students with an academic staff over 275. It is among the most sought after schools in Colombo. The school is listed among theNational Schools, which come under the administration of the Ministry of Education, thus has direct funding from the ministry.<br><br>D.S Senanayake College provides education to students from Grade 1 to 13 in Sinhala, Tamil & English Mediums. It also provides Mathematics, Science, Commerce & Arts fields for the Advance Level Examinations. The School is fully equipped with Modern Classrooms, Multiple Science Laboratories and Computer Laboratories, Ground & Sports Complex for sports activities. It also has more than 35 Clubs, Societies & Associations engaged in all types of co-curricular activities. There are wide range of sporting activities, be it the track, field or water.
But the most wonderful side of this tale is the success of D.S Senanayake College is that the rapid growth of this establishment in such a short period of 45 years. It was the sole commitment of the administration of the school, teachers, parents and students & the past pupils working together to achieve a common goal. Their path was always not cleared. It was a harsh climb to the top, with a lot of sweat, blood & tears in the path that we walked by. Because as our founding Principal Mr. R. I. T. Alles says ” D.S was not built of the pocket of the rich man, but of the hand of the humble poor man.” 
  </p>
</div>
</div>
</div>
</section>
<!--end of welcome section-->   
		    

<section class="hidden-xs hidden-sm well banner-section background-white">
<div class="container no-padding">
<h2 class="font-header-large color-black">50th <small class="color-yellow">Anniversary</small></h2>
<div class="row">

<div class="col-md-9 col-sm-12 col-xs-12">
<div class="clock-builder-output"></div> 
</div>
    
</div>
</div>
</section>

<!--post section here   -->
        
        
		    
<section class="well temp-section background-ash">
<div class="container-fluid no-padding">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12">
    
<img class="post-img" src="{{asset('images/icons/RIT.png')}}">

<center>
<p id="" class="font-para-14 color-darkblue font-para14-margin animated">
The school under him glowed in the country as a role model for studies, discipline of students, unity and diversity. The school’s teachers under his leadership excelled in mentoring and nurturing all the students who came under their care. His charisma is an inspiration to students, teachers, parents and everyone alike he touched upon during his long profile as an educationist until his departure
</p>
<p class="color-lightblue font-para-nopad-18">Ralph Ignatius Thomas Alles</p>
<p class="color-parablue font-para-nopad font-para-margin-bottom">Founder</p>


</center>

</div>

@if(count($topmembers) > 0)
<div class="col-md-6 col-sm-6 col-xs-12">

<blockquote id="block-1" class="media offs3 animated">   
    <div class="media-left media-rp-left">
      <img class="img-circle" src="{{asset($topmembers['president']->imagepath)}}" alt="">
    </div>             
    <div class="media-body media-rp-body">              
      <p class="font-para-14 color-darkblue">       
        {{$topmembers['president']->message }}
      </p>
      <p class="color-lightblue font-para-nopad-18">
        {{$topmembers['president']->fullname}}
      </p>
      <p class="color-parablue font-para-nopad">
        {{$topmembers['president']->designation}}  
      </p>
    </div>
</blockquote>

<blockquote id="block-2" class="media offs3 animated">   
    <div class="media-left media-rp-left">
      <img class="img-circle" src="{{asset($topmembers['generalsec']->imagepath)}}" alt="">
    </div>             
    <div class="media-body media-rp-body">              
      <p class="font-para-14 color-darkblue">       
        {{$topmembers['generalsec']->message }}        
      </p>
      <p class="color-lightblue font-para-nopad-18">
        {{$topmembers['generalsec']->fullname}}
      </p>
      <p class="color-parablue font-para-nopad">
        {{$topmembers['generalsec']->designation}}  
      </p>
    </div>
</blockquote>

<blockquote id="block-3" class="media offs3 animated">   
    <div class="media-left media-rp-left">
      <img class="img-circle" src="{{asset($topmembers['treasurer']->imagepath)}}" alt="">
    </div>             
    <div class="media-body media-rp-body">              
      <p class="font-para-14 color-darkblue">       
        {{$topmembers['treasurer']->message }}         
      </p>
      <p class="color-lightblue font-para-nopad-18">
        {{$topmembers['treasurer']->fullname}}
      </p>
      <p class="color-parablue font-para-nopad">
        {{$topmembers['treasurer']->designation}}  
      </p>
    </div>
</blockquote>

</div>
@endif    
</div>
</div>
</section>    
<!--end of purpose section--> 
		    
</main>

<script type="text/javascript"> 
    $(document).ready(function(){
      $('.bxslider').bxSlider({
          mode:'fade',
          pager: false,
          auto: true,
          controls: false

      });
    });
</script>


<script type="text/javascript">
    $(function(){
        FlipClock.Lang.Custom = { days:'Days', hours:'Hours', minutes:'Minutes', seconds:'Seconds' };
        var opts = {
            clockFace: 'DailyCounter',
            countdown: true,
            language: 'Custom'
        };  
        var countdown = 1486665000 - ((new Date().getTime())/1000); //from: 02/10/2017 12:00 am +0530
        countdown = Math.max(1, countdown);
        $('.clock-builder-output').FlipClock(countdown, opts);
    });
</script>


<script>
$(document).ready(function(){

$('.bxslider-posts').bxSlider({
  minSlides: 3,
  maxSlides: 3,
  slideWidth: 600,
  slideMargin: 10,
  pager: false,
  auto: true,
  controls: false,
  speed: 3000,
  pause: 0,
  autoHover: true
});

});
    

    
</script>



@stop