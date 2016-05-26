@extends('Layouts.layout')



@section('content')


<main>        

<section class="well temp-section background-white">
<div class="container">
<div class="row">    
<h2 class="font-header-large color-black">PAST <small class="color-yellow">PRESIDENTS</small></h2>


<div class="row">
@foreach($presidents as $president)
<div class="col-md-6 col-sm-6 col-xs-12">   
<div class="col-md-6 col-sm-6 col-xs-12 thumbnail port-thumb"> 
  <img class="" src="{{asset($president->imagepath)}}" alt="">
</div>
<div class="col-md-6 col-sm-6 col-xs-12">             
  <p class="font-sub-16">{{$president->fullname}}</p>

  <p class="font-para-14 color-darkblue"> {{$president->year}} <br /> {{$president->email}} <br /> {{$president->contact}} </p>
    
  <div id="div-sociali" class="sociali animated">
              <a class="fa fa-facebook" title="" target="_blank" href="{{$president->facebook}}"></a>
              <a class="fa fa-google-plus" title="" target="_blank" href="{{$president->google}}"></a>
              <a class="fa fa-linkedin" title="" target="_blank" href="{{$president->linkedin}}"></a>
              <a class="fa fa-twitter" title="" target="_blank" href="{{$president->twitter}}"></a>
  </div>
</div>
</div>
@endforeach      
</div>
    
</div>
</section>
    
</main>

@stop