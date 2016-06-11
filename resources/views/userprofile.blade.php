@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>    
    


<section class="well temp-section background-white">
<div class="container">
<div class="row">    

    
<div class="col-md-8">
    
<div class="row post-header-row">
<span class="font-header-25px color-black">
{{'Welcome '.Session::get('user')->firstname}}
<a href="{{ URL::to('') }}" class="user-action-btn user-action-btn-blue">My Profile</a> 
<a href="{{ URL::to('') }}" class="user-action-btn user-action-btn-blue">My Tickets</a> 
<a href="{{ URL::to('user-logout') }}" class="user-action-btn user-action-btn-blue">Logout</a> 
</span>
</div>   
 
 


    
 


    
    
    
    
    
    
</div>   
    

    
</div>
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 


@stop