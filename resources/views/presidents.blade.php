@extends('Layouts.layout')



@section('content')


<main class="remodal-bg">        
    
<script type="text/javascript">      
    var page='Member';
</script>

<section class="well temp-section background-white">
<div class="container">
<div class="row">    
<h2 class="font-header-large color-black">PAST <small class="color-yellow">PRESIDENTS</small></h2>


<div class="row">
@foreach($presidents as $president) 
<div class="col-md-3 col-sm-6 col-xs-12">

<div class="text-center">
<a class="memmode" data-im="{{asset($president->imagepath)}}" data-name="{{$president->fullname}}" data-designation="{{$president->year}}" data-email="{{$president->email}}" data-contact="{{$president->contact}}" data-fb="{{$president->facebook}}" data-tw="{{$president->twitter}}" data-li="{{$president->linkedin}}" data-gp="{{$president->google}}">
<img class="img-circle" src="{{asset($president->imagepath)}}" alt="">
</a>
</div>
   
    
<div class="text-center">    
<h4 class="font-sub-16 color-darkblue">{{$president->fullname}}
<br>
<span class="font-para-14 color-lightblue">{{$president->year}}</span>
</h4>   
</div>  

</div>
@endforeach      
</div>
    
</div>
</div>
</section>
   
   
   
<!--start of modal -->
<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" data-remodal-options="hashTracking: false">

<div class="mem-body">    

<div class="profile text-center">
<div class="col-sm-12">
<div class="col-xs-12 col-sm-4 text-center">
    <figure>
        <img id="mem-img" src="" alt="" class="img-circle img-responsive">
    </figure>
</div>

<div class="col-xs-12 col-sm-8 text-left">
    <h3 class="color-darkblue font-para-nopad-20" id="mem-name"></h3>
    <p><strong class="font-para-14 color-lightblue" id="mem-designation"></strong></p>
    <p>                 
    <span id="mem-email" class="tags"></span>
    </p>
    <p>                 
    <span id="mem-contact" class="tags"></span>
    </p>
    
    <div class="sociali mem-social">
    <a id="mem-fb" class="fa fa-facebook" title="Facebook" target="_blank" href=""></a>
    <a id="mem-tw" class="fa fa-twitter" title="Twitter" target="_blank" href=""></a>
    <a id="mem-li" class="fa fa-linkedin" title="Linkedin" target="_blank" href=""></a>
    <a id="mem-gp" class="fa fa-google-plus" title="Google+" target="_blank" href=""></a>
    </div>

</div>             

</div>   


</div>                 
</div>
</div>
<!--end of modal-->
   
   
    
</main>

@stop