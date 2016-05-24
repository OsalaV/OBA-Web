@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>        

<section class="well temp-section background-white">
<div class="container">
<div class="row">    

    
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
  <div class="thumbnail port-thumb">
    <img src="{{asset($project->imagepath)}}" alt="">
  </div>              
</div>
            
<div class="col-md-8 col-sm-12 col-xs-12">
    
    <h2 class="font-header-large color-black"><small class="color-black">{{$project->title}}</small></h2>
</div>
</div>   
    
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <p class="font-para-15 color-darkblue">
        {{$project->description}}
      </p>
  </div>
</div>
    
</div>
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 


@stop