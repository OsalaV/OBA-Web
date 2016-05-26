@extends('Layouts.layout')


@section('content')
<!--
    <script>
        $(document).ready(function(){
          $('.bxslider').bxSlider({
              mode:'fade'
          });
        });  
    </script>
-->
	<main>        
		<section class="well slider-section background-white">
		<div class="container-fluid no-padding">

		<ul class="bxslider" style="padding:0px !important;">
		  <li><img src="../images/slider/1.jpg"  /></li>
		  <li><img src="../images/slider/2.jpg"  /></li>
		  <li><img src="../images/slider/3.jpg"  /></li>
		</ul>    

		    
		    
		    
		</div>
		</section>
		<!--end of slider section-->
		    
		<section class="well temp-section background-ash">
		<div class="container no-padding">
		<h2 class="font-header-large color-black">WELCOME TO <small class="color-yellow">OLD BOYS ASSOCIATION!</small></h2>
		<div class="row">
		    <div class="col-md-6 col-sm-12">
		      <p id="para-2" class="font-para-15 color-darkblue animated">
		        D.S. Senanayake College, situated in Colombo 07 (Cinnamon Gardens) is one of the premiere educational institutes in Sri Lanka. With the short span of history it has been able to gain many achievements of excellence both in the academic and non academic fields , locally and internationally to be proud as a truly multi-ethnic, multi-religious College which has proudly created unblemished and prestigious record of excellence in academia , sport and community leadership culminating being an institute of highly innovative and patriotic individuals to the motherland. School has current enrollment of over 6000 students with an academic staff over 275. It is among the most sought after schools in Colombo. The school is listed among theNational Schools, which come under the administration of the Ministry of Education, thus has direct funding from the ministry.
		      </p>
		    </div>
		    <div class="col-md-6 col-sm-12">
		      <p id="para-3" class="font-para-15 color-darkblue animated">
		        D.S Senanayake College provides education to students from Grade 1 to 13 in Sinhala, Tamil & English Mediums. It also provides Mathematics, Science, Commerce & Arts fields for the Advance Level Examinations. The School is fully equipped with Modern Classrooms, Multiple Science Laboratories and Computer Laboratories, Ground & Sports Complex for sports activities. It also has more than 35 Clubs, Societies & Associations engaged in all types of co-curricular activities. There are wide range of sporting activities, be it the track, field or water.
But the most wonderful side of this tale is the success of D.S Senanayake College is that the rapid growth of this establishment in such a short period of 45 years. It was the sole commitment of the administration of the school, teachers, parents and students & the past pupils working together to achieve a common goal. Their path was always not cleared. It was a harsh climb to the top, with a lot of sweat, blood & tears in the path that we walked by. Because as our founding Principal Mr. R. I. T. Alles says ” D.S was not built of the pocket of the rich man, but of the hand of the humble poor man.”      
		      </p>
		    </div>
		</div>
		</div>
		</section>
		<!--end of welcome section-->   
		    

        <section class="hidden-xs hidden-sm well banner-section background-white">
            <div class="container no-padding">
                <h2 class="font-header-large color-black">50th Aniversary</h2>
                <div class="row">

                    <div class="col-md-9 col-sm-12 col-xs-12">

                        <div class="clock-builder-output"></div>
                    <style text="text/css">body .flip-clock-wrapper ul li a div div.inn, body .flip-clock-small-wrapper ul li a div div.inn { color: #CCCCCC; background-color: #333333; align-items: center } body .flip-clock-dot, body .flip-clock-small-wrapper .flip-clock-dot { background: #323434; } body .flip-clock-wrapper .flip-clock-meridium a, body .flip-clock-small-wrapper .flip-clock-meridium a { color: #323434; }</style>
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
                    </div>
            
<!--
                    <div class="col-md-3 col-sm-12 col-xs-12">

                        <img class="fifty-logo" src="../images/50th.jpg" style="height:auto; "></a>

                    </div>    
-->
            
                </div>
            </div>
        </section>
        
        
		<section class="well temp-section background-white">
		<div class="container no-padding">
		<div class="row">
		    
		<div class="col-md-12 col-sm-12 col-xs-12">
		  <h2 class="font-header-large color-black">NEWS</h2>
		  <ul id="ul-news" class="news-list list-inline animated">
            @foreach($posts as $post)
		    <li>
		      <div class="news-icon-box text-center"></div>
		      <a href="{{ URL::to('post/'.$post->id) }}" class="news-title">{{$post->title}}</a>
		    </li>
            @endforeach
		  </ul> 
		  
		</div>    
		    
		</div>
		</div>
		</section>
		<!--end of news section-->     
		    
		<section class="well temp-section background-ash">
		<div class="container no-padding">
		<div class="row">
		 
		<div class="col-md-6 col-sm-6 col-xs-12">
		<h2 class="font-header-large color-black">purposes</h2>

		<p class="font-para-14 color-darkblue">
		Curabitur eu lorem ac lacus laoreet auctor. Fusce vitae orci nec velit ornare rhoncus ut tempus est. Mauris eu augue lorem. Suspendisse sit amet vehi cula nisl, nec faucibus nisl. Proin ac fermentum orci, non semper metus. Nulla nulla tellus
		</p>
		    
		<div class="num-list">
		   <ol id="list-1">
		      <li><p class="animated">Fusce itae orci nec velit ornare rhon</p></li>
		      <li><p class="animated">Ecus ut tempus estauris eu augue lorem.</p></li>
		      <li><p class="animated">Suspendisse sit amet vehicula</p></li>
		      <li><p class="animated">Anisl, nec faucibus nislroin ac fermentum</p></li>
		      <li><p class="animated">Horci, non semper metusulla nulla</p></li>
		      <li><p class="animated">Dellus, tincidunt vel eros gravida, cursu</p></li>
		      <li><p class="animated">Nullam ac magna nisi. Integer</p></li>
		      <li><p class="animated">Dictum sagittis vulputate ulla a purus</p></li>
		   </ol>
		</div>
		    

		</div>
		    
		<div class="col-md-6 col-sm-6 col-xs-12">
<!--		<h2 class="font-header-large color-black">testimonial</h2>-->
		<blockquote class="media offs3">   
		    <div class="media-left media-rp-left">
		      <img class="img-circle" src="../images/testimonial/1.jpg" alt="">
		    </div>             
		    <div class="media-body media-rp-body">              
		      <p class="font-para-14 color-darkblue">       
		        Curabitur eu lorem ac lacus laoreet auctor. Fusce vitae orci nec velit ornare rhoncus ut tem pus est. Mauris eu aug ue lorem. Suspendisse sit amet vehi cul      
		      </p>
		      <cite class="color-lightblue">
		        Susantha Dissanayake<br />
		        President
		      </cite>
		    </div>
		</blockquote>
		    
		<blockquote class="media offs3">   
		    <div class="media-left media-rp-left">
		      <img class="img-circle" src="../images/testimonial/2.jpg" alt="">
		    </div>             
		    <div class="media-body media-rp-body">              
		      <p class="font-para-14 color-darkblue">       
		        Curabitur eu lorem ac lacus laoreet auctor. Fusce vitae orci nec velit ornare rhoncus ut tem pus est. Mauris eu aug ue lorem. Suspendisse sit amet vehi cul        
		      </p>
		      <cite class="color-lightblue">
		        Shiraj Inimankada<br />
		        General Secretary
		      </cite>
		    </div>
		</blockquote>
		    
		<blockquote class="media offs3">   
		    <div class="media-left media-rp-left">
		      <img class="img-circle" src="../images/testimonial/3.jpg" alt="">
		    </div>             
		    <div class="media-body media-rp-body">              
		      <p class="font-para-14 color-darkblue">       
		        Curabitur eu lorem ac lacus laoreet auctor. Fusce vitae orci nec velit ornare rhoncus ut tem pus est. Mauris eu aug ue lorem. Suspendisse sit amet vehi cul        
		      </p>
		      <cite class="color-lightblue">
		        Pasad Weerasekera<br />
		        Treasurer
		      </cite>
		    </div>
		</blockquote>
		    
		</div>
		</div>
		</div>
		</section>    
		<!--end of purpose section--> 
		    
</main>

   <script>
		$(document).ready(function(){
		  $('.bxslider').bxSlider({
		      mode:'fade'
		  });
		});
  </script>

@stop