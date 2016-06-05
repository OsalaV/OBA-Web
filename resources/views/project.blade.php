@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>       
    
<script type="text/javascript">      
    var page='Project';
</script>

<section class="well temp-section background-white">
<div class="container">

<div class="row">    

    
<div class="col-md-8">
    
<div class="row post-header-row">
<span class="font-header-25px color-black">{{$project->title}}</span>
</div>   
    
<div class="row post-details-row">
<span class="post-tags">{{$project->tagline}}</span>
</div>

    
@if($project->imagestate == "true")
<div class="row post-img-row">
<img class="post-img" src="{{asset($project->imagepath)}}" alt="">           
</div>
@endif 

    
<div class="row">
<p class="font-para-15 color-darkblue">{{$project->description}}</p>
</div>
    
@if($project->resourcestate == 'true')
<div class="row tickets-row">					
<a class="" href="{{ URL::to('projects-download-resource/'.$project->id) }}">Download Resource Files</a>	
</div>
@endif   
    
    
    
    
</div>   
    

    
</div>
    
    
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 


@stop