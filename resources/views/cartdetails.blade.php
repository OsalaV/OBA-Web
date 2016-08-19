@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>    
    
<script type="text/javascript">      
var page='Events';
</script>

<section class="well temp-section background-white">
<div class="container">
<div class="row">    

    
<div class="col-md-8">
    
<div class="row post-header-row">
<span class="font-header-25px color-black">
{{'Welcome '.Session::get('user')->firstname}}
<a href="{{ URL::to('user-home') }}" class="user-action-btn user-action-btn-blue">Events</a>
<a href="{{ URL::to('user-profile') }}" class="user-action-btn user-action-btn-blue">My Profile</a> 
<a href="{{ URL::to('user-cart') }}" class="user-action-btn user-action-btn-blue active-blue">My Cart</a> 
<a href="{{ URL::to('user-logout') }}" class="user-action-btn user-action-btn-blue">Logout</a> 
</span>
</div>   

<?php
$subtotal = 0;    
?>
 
@if(Session::has('success'))
<div class="row post-header-row">
<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('success')}} 
</div> 
</div>
@endif
    
@if(Session::has('error'))
<div class="row post-header-row">    
<div class="alert alert-danger fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{Session::get('error')}}
</div> 
</div>
@endif
    
    

@foreach($carts as $cart) 

<div class="row user-table-row">

<h5 class="cart-tag">{{'Event&nbsp;&nbsp;: '.$cart['event']->eventtitle}}</h5>
<h5 class="cart-tag">{{'Venue&nbsp;: '.$cart['event']->location}}</h5>
<h5 class="cart-tag">{{'Time&nbsp;&nbsp;&nbsp;: '.$cart['event']->month.'-'.$cart['event']->day.'-'.$cart['event']->year.' @  '.$cart['event']->time}}</h5>
    
<div class="table-responsive"> 
<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-left">Category</th>  
<th class="text-right">Price</th>
<th class="text-center">Qty.</th>
<th class="text-right">Total</th>

<th></th>
</tr>
</thead>
  

<tbody class="ws-table-body">
 
@foreach($cart['tickets'] as $ticket)
    
   
<tr>
  
<td class="text-left">{{$ticket->category}}</td>
<td class="text-right">{{$ticket->price}}</td>
<td class="text-center">
<form id="{{'numform'.$ticket->ticketid}}" action="{{ URL::to('user-update-cart') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<input class="text-center" type="number" min="1" max="10" step="1" name="qty" value ="{{$ticket->qty}}"/>
<input type="hidden" name="tickets_id" value="{{$ticket->ticketid}}" />
<label id="cartuplabel" class="cart-update" data-id="{{$ticket->ticketid}}">Update</label>
</form>
</td>
<td class="text-right">{{$ticket->total}}</td>

<?php
$subtotal = $subtotal + $ticket->total;
?>

    
<td class="text-center">
<a class="ws-open-msg" data-url="{{ URL::to('user-delete-cart/'.$ticket->cartid) }}" data-message = "Are you sure you want to delete this item from cart?" data-toggle="modal" data-target="#meesageModel">
<span class="ws-fonts-15px-red ws-span-small">
<i class="fa fa-times fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>
    
    
</tr>
  
    
@endforeach
    
</tbody>    
</table>
</div>    
</div>
@endforeach 

@if($subtotal == 0)  
<div class="row post-header-row">    
<p class="ws-tag-label"><strong>You haven't selected any items yet</strong></p>

    
<p class="">You can select any kind of tickets that are available in the events.</p>
<p class="">Each category allows you to select maximum 10 tickets.</p>    
<p class="">You can use any kind of payment method to buy this tickets.</p>
    
<p class="ws-tag-label"><strong>Thank You!!!</strong></p>
    
<div class="post-header-row">
<span class="font-header-25px color-black">
<a href="{{ URL::to('user-home') }}" class="user-action-btn user-action-btn-blue">Go Back To Events</a> 
</span>
</div>
    
    
    
</div>    
@endif
    
    
</div>   
 
@if($subtotal != 0)
    
<div class="col-md-4 summary-box">

<div class="row post-header-row">
<h4>Summary</h4>
<hr>
</div>
  
<div class="row post-header-row">
    
<div class="col-xs-6 col-sm-6 col-md-6">
<p class="ws-tag-label"><strong>Total (LKR): </strong></p>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 text-right">
<p class="ws-price-label">{{ number_format($subtotal,2)   }}</p>
</div>
    
    
</div>
    
<div class="row">
<div id="CheckoutButtons"><a href="/Checkout.aspx" id="CheckoutButton" title="Use your credit card with our secure checkout">Continue to checkout</a></div>      
    
</div>  

    
<div class="row">
<img class="card-img" src="{{asset('images/icons/cards.png')}}" alt="">    
</div>


    
</div>
@endif   
</div>
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 



@stop