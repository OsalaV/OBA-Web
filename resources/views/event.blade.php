@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>        

<section class="well temp-section background-white">
<div class="container">
<div class="row">   
    
    <h2 class="font-header-large color-black"><small class="color-black">{{$event->title}}</small></h2>

    <img class="header-image" src="{{asset($event->imagepath)}}">
    
</div>

<div class="row"> 
<div class="temp-section">
    
<div class="col-sm-12 col-md-4 bar-list-container">

            <ul class="link-list">
                <li>
                  <a href="#">{{"Date : ".$event->date}}</a>
                </li>                
            </ul>
    
</div>
    
<div class="col-sm-12 col-md-4 bar-list-container">

            <ul class="link-list">
                <li>
                  <a href="#">{{"Time : ".$event->time}}</a>
                </li>                
            </ul>
    
</div>
    
<div class="col-sm-12 col-md-4 bar-list-container">

            <ul class="link-list">
                <li>
                  <a href="#">{{"Location : ".$event->location}}</a>
                </li>                
            </ul>
    
</div>

</div>
</div>
    
<div class="row"> 
<div class="temp-section">
    
    
<div class="col-md-12 col-sm-12">
<p id="para-1" class="font-para-15 color-darkblue animated">
{{$event->description}}
</p>
</div>

</div>
</div>
    
    
 
<div class="row parade-social-icon-container"> 
    
<div id="div-parade-social" class="parade-social animated">
  <a class="fa fa-facebook" title="" target="_blank" href="#"></a>
  <a class="fa fa-twitter" title="" target="_blank" href="#"></a>
  <a class="fa fa-google-plus" title="" target="_blank" href="#"></a>
  <a class="fa fa-instagram" title="" target="_blank" href="#"></a>
</div>    
    
</div>

</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 




@stop