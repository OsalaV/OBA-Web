@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>    
    
<script type="text/javascript">      
var page='Home';
</script>

<section class="well temp-section background-white">
<div class="container">
<div class="row">    

    
<div class="col-md-8" style="margin-bottom:40px">
    
<div class="row post-header-row">
<span class="font-header-25px color-black">{{$post->title}}</span>
</div>   
 

<div class="row post-details-row">
<span class="post-tags"><i class="fa fa-calendar"></i> {{$post->updated_at->toFormattedDateString()}}</span>&nbsp;
<span class="post-tags"><i class="fa fa-clock-o"></i> {{'at '.$post->updated_at->toTimeString()}}</span>
</div>

    
@if($post->imagestate == "true")
<div class="row post-img-row">
<img class="post-img" src="{{asset($post->imagepath)}}" alt="">           
</div>
@endif 

<div class="row post-share-row text-left">
<div class="post-share">
  <span class="font-para-15 color-darkblue hidden-xs">Share this post </span>
  <a class="fa fa-facebook" title="" target="_blank" href="#"></a>
  <a class="fa fa-twitter" title="" target="_blank" href="#"></a>
  <a class="fa fa-google-plus" title="" target="_blank" href="#"></a>
  <a class="fa fa-linkedin" title="" target="_blank" href="#"></a>
</div>
</div>
    
    
<?php    
$description = $post->description;    
$paragraphs  = explode("[para]",$description);    
?>
   
<div class="row">
@foreach($paragraphs as $paragraph)
<p class="font-para-15 color-darkblue">{{$paragraph}}</p>
@endforeach
</div>
    

<!--video div-->
@if($post->video != NULL)
<div class="row tickets-row">  
<div class="embed-responsive embed-responsive-16by9">
            
    <iframe class="embed-responsive-item" src="{{asset($post->video)}}" frameborder="0" autohide="1" modestbranding="1" rel="0" theme="light" allowfullscreen></iframe>
    
</div>
</div>   
@endif
    

</div>   
 
<div class="col-md-4" style="margin-top:91px">
     <div style="margin-left:5px;margin-right:5px;background-color:#1DE9B6">
        <ul style="padding-top:30px;padding-bottom:30px">
            @foreach($posts as $post)
            <li>
<!--              <input type="hidden" name="postid" value="{{$post->id}}" />-->
              <a href="{{ URL::to('posts-show/'.$post->title) }}">{{$post->title}}</a>
            </li>
            @endforeach
        </ul>
     </div>
</div>
    
</div>
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 


@stop