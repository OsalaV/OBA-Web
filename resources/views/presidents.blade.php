@extends('Layouts.layout')



@section('content')


<main>        
    
<script type="text/javascript">      
    var page='Member';
</script>

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
<p class="font-sub-16">{{$president->fullname}}
<br>
<span class="font-para-14 color-lightblue">{{$president->year}}</span>
</p>

<p class="font-para-14 color-darkblue">{{$president->email}}<br />{{$president->contact}}</p>
    
<div class="sociali">
@if($president->facebook != NULL)
<a class="fa fa-facebook" title="" target="_blank" href="{{$president->facebook}}"></a>
@endif
@if($president->twitter != NULL)
<a class="fa fa-twitter" title="" target="_blank" href="{{$president->twitter}}"></a>
@endif
@if($president->google != NULL)
<a class="fa fa-google-plus" title="" target="_blank" href="{{$president->google}}"></a>
@endif
@if($president->linkedin != NULL)
<a class="fa fa-linkedin" title="" target="_blank" href="{{$president->linkedin}}"></a>
@endif    
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