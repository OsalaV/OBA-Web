@extends('Layouts.layout')



@section('content')

<main>      
    
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
<img class="" src="{{asset($member->imagepath)}}" alt="">
</div>
    
<div class="text-center">
    
<h4 class="font-sub-16 color-darkblue">{{$member->fullname}}
<br>
<span class="font-para-14 color-lightblue">{{$member->designation}}</span>
</h4>

<p class="font-para-14 color-darkblue">
{{$member->email}}
<br>
{{$member->contact}}
</p>

<div class="sociali">
@if($member->facebook != NULL)
<a class="fa fa-facebook" title="" target="_blank" href="{{$member->facebook}}"></a>
@endif
@if($member->twitter != NULL)
<a class="fa fa-twitter" title="" target="_blank" href="{{$member->twitter}}"></a>
@endif
@if($member->google != NULL)
<a class="fa fa-google-plus" title="" target="_blank" href="{{$member->google}}"></a>
@endif
@if($member->linkedin != NULL)
<a class="fa fa-linkedin" title="" target="_blank" href="{{$member->linkedin}}"></a>
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