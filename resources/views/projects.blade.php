@extends('Layouts.layout')



@section('content')

<main>        
    
<script type="text/javascript">      
    var page='Projects';
</script>

<section class="well temp-section background-white">
<div class="container">
    
<div class="row">    
<h2 class="font-header-large color-black">OUR <small class="color-yellow">PROJECTS</small></h2>
</div>
    

<div class="porto">
  @foreach($projects as $project)   
  <div class="pf" data-pf-image="{{asset($project->imagepath)}}" data-pf-title="{{$project->title}}" data-pf-onclick="{{ URL::to('projects/'.str_replace(' ', '_', $project->title)) }}"></div>
  @endforeach
</div> 
    
    
<div class="row">  
{{ $projects->links() }} 
</div>


    
</div>

</section>
    
</main>

<script>
$(document).ready(function () {
  $('.porto').porto({
      columns        : 4,
      margin         : 5,
      captionMode    : "title",
      background     : "rgba(252, 184, 18, 0.8)", 
      onclickAction  : "url",
      linkTarget     : "same"
  });
});
</script>


@stop