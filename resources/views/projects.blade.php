@extends('Layouts.layout')



@section('content')

<main>        

<section class="well temp-section background-white">
<div class="container">
<div class="row">    
<h2 class="font-header-large color-black">OUR <small class="color-yellow">PROJECTS</small></h2>


<div class="row">
@foreach($projects as $project)
<div class="col-md-4 col-sm-12 col-xs-12">
  <div class="thumbnail port-thumb">
    <img src="{{asset($project->imagepath)}}" alt="">
    <div class="port-caption background-yellow-alpha port-cap-hover">
      <h3 class="font-sub-22">{{$project->title}}</h3>
      <div class="wrap">       
        <a href="{{ URL::to('project/'.$project->id) }}" class="btn-link fa-angle-right"></a>
      </div>  
    </div>
  </div>              
</div>
@endforeach
</div>    
    
</div>
</div>
</section>
    
</main>

@stop