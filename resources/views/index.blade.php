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
  

     
<!--post-->
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
  
  
  <div class="post-title-box-inner text-left">  
  <a href="{{ URL::to('posts/'.str_replace(' ', '_', $post->title)) }}" class="news-title">{{$post->title}}</a>
  
  <div id="{{'post'.$post->id}}" class="post-desc" data-desc="{{$post->description}}"></div>
  <script>
     var id = "#post"+{{$post->id}};
     var desc = $(id).data("desc");

     var res       = desc.substr(0, 175);
     var lastIndex = res.lastIndexOf(" ");
    
     var para = res.substring(0, lastIndex);
     
     $(id).append(para+'... <br><span><a href="{{ URL::to('posts/'.str_replace(' ', '_', $post->title)) }}">Read More</a></span>');
  </script>
  

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

<div class="post-title-box-inner text-left">  

<a href="{{ URL::to('posts/'.str_replace(' ', '_', $post->title))}}" class="news-title">{{$post->title}}</a>

<p id="{{'postmv'.$post->id}}" class="post-desc" data-desc="{{$post->description}}"></p>
<script>
     var id = "#postmv"+{{$post->id}};
     var desc = $(id).data("desc");

     var res       = desc.substr(0, 175);
     var lastIndex = res.lastIndexOf(" ");
    
     var para = res.substring(0, lastIndex);
     
     $(id).append(para+'... <br><span><a href="{{ URL::to('posts/'.str_replace(' ', '_', $post->title)) }}">Read More</a></span>');
  </script>


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
		    

<section id="bannersection" class="well banner-section background-white banner_1">
<div class="container no-padding">
<h2 class="font-header-large color-black">50th <small class="color-yellow">Anniversary</small></h2>
<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="clock-builder-output hidden-xs hidden-sm"></div> 
</div>
    
</div>
</div>
</section>

<!--post section here   -->
        
        
		    
<section class="well temp-section background-ash background-mob-white">
<div class="container no-padding">
<div class="row">
<div class="col-md-12">
    <div class="testimonial">
        <div class="pic">
            <img src="{{asset('images/icons/RIT.png')}}" alt="">
        </div>
        <div class="testimonial-content">
            <p class="description color-darkblue">
                    The school under him glowed in the country as a role model for studies, discipline of students, unity and diversity. The school’s teachers under his leadership excelled in mentoring and nurturing all the students who came under their care. His charisma is an inspiration to students, teachers, parents and everyone alike he touched upon during his long profile as an educationist until his departure
            </p>
            <h3 class="testimonial-title color-darkblue">Ralph Ignatius Thomas Alles
                <small class="post">Founder</small>
            </h3>
        </div>
        <div  class="clearfix"></div>
    </div>
</div>

</div>
</div>
</section>    
<!--founder testimonial-->


<section class="well temp-section background-white background-mob-ash">
<div class="container no-padding">
<div class="row">

<div class="col-md-6 col-sm-12 col-xs-12">
    <div id="block-2" class="ws-mem-testimonial animated">
        <div class="ws-mem-pic">
            <img src="{{asset($topmembers['president']->imagepath)}}" alt="">
        </div>
        <div class="ws-mem-testimonial-review"> 
            <h4 class="ws-mem-testimonial-title">{{$topmembers['president']->fullname}}
            <small>{{$topmembers['president']->designation}} </small>
            </h4>           
            <p>{{$topmembers['president']->message }}</p>
        </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-12 col-xs-12">
    <div id="block-3" class="ws-mem-testimonial animated">
        <div class="ws-mem-pic">
            <img src="{{asset($topmembers['generalsec']->imagepath)}}" alt="">
        </div>
        <div class="ws-mem-testimonial-review">
            <h4 class="ws-mem-testimonial-title">{{$topmembers['generalsec']->fullname}}
            <small>{{$topmembers['generalsec']->designation}} </small>
            </h4> 
            <p>{{$topmembers['generalsec']->message }}</p>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
    <div id="block-4" class="ws-mem-testimonial animated">
        <div class="ws-mem-pic">
            <img src="{{asset($topmembers['treasurer']->imagepath)}}" alt="">
        </div>
        <div class="ws-mem-testimonial-review">  
            <h4 class="ws-mem-testimonial-title">{{$topmembers['treasurer']->fullname}}
            <small>{{$topmembers['treasurer']->designation}} </small>
            </h4>          
            <p>{{$topmembers['treasurer']->message }}</p>
        </div>
    </div>
</div>
</div>

</div>

</section>		
<!--members testimonial-->		    
		        
		            
		                    
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
  speed: 1000,
  pause: 3000,
  autoHover: true
});

});
    

    
</script>

<script>
    
$(document).ready(function(){
    
    setInterval(function() {
       var section = $('#bannersection');
       if(section.hasClass('banner_1'))
       {
           section.removeClass('banner_1');
           section.addClass('banner_2');
       }
      else {        
           section.removeClass('banner_2');
           section.addClass('banner_1');
      }
    }, 6000);
    
});

</script>


@stop