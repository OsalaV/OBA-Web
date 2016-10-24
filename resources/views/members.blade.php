@extends('Layouts.layout')



@section('content')

<main class="remodal-bg">      
    
<script type="text/javascript">      
    var page='Member';
</script>

<section class="well temp-section background-white">
<div class="container">
<div class="row committee-row">    
<h2 class="font-header-large color-black">executive <small class="color-yellow">committee</small></h2>

<div class="row">
@foreach($committee as $member)
<div class="col-md-3 col-sm-6 col-xs-12">

<div class="text-center">
<a class="memmode" data-im="{{asset($member->imagepath)}}" data-name="{{$member->fullname}}" data-designation="{{$member->designation}}" data-email="{{$member->email}}" data-contact="{{$member->contact}}" data-fb="{{$member->facebook}}" data-tw="{{$member->twitter}}" data-li="{{$member->linkedin}}" data-gp="{{$member->google}}">
<img class="img-circle" src="{{asset($member->imagepath)}}" alt="">
</a>
</div>
    
<div class="text-center">
    
<h4 class="font-sub-16 color-darkblue">{{$member->fullname}}
<br>
<span class="font-para-14 color-lightblue">{{$member->designation}}</span>
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