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

    
<div class="col-md-8" style="margin-bottom:40px">
    
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
    
<?php    
$description = $project->description;    
$paragraphs  = explode("[para]",$description);    
?>
   
<div class="row">
@foreach($paragraphs as $paragraph)
<p class="font-para-15 color-darkblue">{{$paragraph}}</p>
@endforeach
</div>   

@if($project->resourcestate == 'true')
<div class="row tickets-row">	
<?php $encrypted = Crypt::encrypt($project->id); ?>
<h4 class="font-para-15 color-darkblue">You can download all resource files from here
<a href="{{ URL::to('download-projects-resource/'.$encrypted) }}" class="ws-form-action-btn-green">Download</a>
</h4>
</div>
@endif 
    

@if(count($projectimages) > 0)
<div class="tickets-row">
    
<div class="porto">
@foreach($projectimages as $projectimage)
<div class="pf" data-pf-image="{{asset($projectimage->img_path)}}"></div>
@endforeach       
</div>
    
    
</div>   
@endif

    

<!--video div-->
@if($project->video != NULL)
<div class="row tickets-row">  
<div class="embed-responsive embed-responsive-16by9">
            
    <iframe class="embed-responsive-item" src="{{asset($project->video)}}" frameborder="0" autohide="1" modestbranding="1" rel="0" theme="light" allowfullscreen></iframe>
    
</div>
</div>   
@endif
    

    
    
</div>  

    
</div>
    
    
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 


<script>
$(document).ready(function () {
  $('.porto').porto({
      columns        : 4,
      margin         : 2,
      background     : "rgba(0,0,0,.6)",
      captionFit     : true
  });
});
</script>


@stop