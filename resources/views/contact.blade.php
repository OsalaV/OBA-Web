@extends('Layouts.layout')



@section('content')

<main> 
<script type="text/javascript">      
var page='Contact';
</script>

<section class="well temp-section background-white">
<div class="container">


<div class="col-md-8">
    
<div class="row">    
<h2 class="font-header-large color-black">CONTACT <small class="color-yellow">US</small></h2>


<form role="form" id="contact-form" class="contact-form animated">
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="Name" autocomplete="off" id="Name" placeholder="Name" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="email" class="form-control" name="email" autocomplete="off" id="email" placeholder="E-mail" required>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" rows="3" name="Message" id="Message" placeholder="Message" required></textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
<div class="form-group">
<button type="submit" class="btn main-btn pull-right">Send</button>
</div>
</div>
</div>
</form>    
    
    <div class="row">
        <div class="col-md-6">
            <h4 class="font-sub-22 color-darkblue">Join the Community</h4>
            <div class="fb-page" data-href="https://www.facebook.com/DS50thAnniversary/?fref=ts" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/DS50thAnniversary/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/DS50thAnniversary/?fref=ts">DS 50th Anniversary 1967-2017</a></blockquote></div> 
        </div>
    </div>
    
</div>
    
</div>


<div class="col-md-4 ws-contact-block">

<div class="row">    
<h2 class="font-header-large color-black">OUR <small class="color-yellow">REACH</small></h2>

<div class="row">
@foreach($branches as $branch)    
<div class="col-md-12 col-sm-6 col-xs-12">
<div class="thumbnail port-thumb">
<div>
<h4 class="font-sub-22"><a class="color-lightblue" href="{{ URL::to($branch->website) }}">{{$branch->branch}}</a></h4>
<p class="font-para-14 color-darkblue">
{{$branch->description}}
</p>
<p class="font-para-14-bold color-black">
{{$branch->address_line1}}<br>{{$branch->address_line2}}<br>{{$branch->address_line3}}
</p>

<p class="font-para-14-bold color-black">
{{$branch->email}} <br /> {{$branch->contact}}
</p>
</div>  
</div>
</div>
@endforeach   
</div>



</div>

</div>
    


    
    
   
</div>
</section>
    
</main>


@stop