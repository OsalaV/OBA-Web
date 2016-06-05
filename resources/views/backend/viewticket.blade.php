@extends('backend.layout')

@section('content')

<a href="{{ URL::to('tickets-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Tickets</a>

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Tickets Management
<a href="{{ URL::to('tickets-add') }}" class="ws-tablepage-action-btn">Add New</a>       
</h2>
    

<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-center">Category</th>  
<th class="text-center">Price</th>  
<th class="text-left">Total Issued Tickets</th>
<th class="text-center">Total Sold Tickets</th>  
<th class="text-center">Total Left Tickets</th>  

<th></th>
<th></th>
</tr>
</thead>

<tbody class="ws-table-body">
    

<tr>
<td class="text-left"></td>
<td class="text-left"></td>
<td class="text-left"></td>
<td class="text-left"></td>
<td class="text-left"></td>
<td class="text-left"></td>
<td class="text-left"></td>
    
    
<td class="text-center">
<a href="">
<span class="ws-fonts-15px-darkblue ws-span-small">
<i class="fa fa-pencil fa-lg ws-icon-Xsmall"></i>
</span> 
</a>
</td>
</tr>


</tbody>
</table>

</div><!-- ws-table-container -->

    
    
<!-- Ticket Amount -->


<!--<div class="ws-forms-pricing">-->

<div class="ws-price-forms">

<div class="row">
    
<div class="col-md-6"></div>
    
<div class="col-md-6">
<div class="col-md-6">
<p class="ws-tag-label"><strong>Amount (LKR): </strong></p>
</div>

<div class="col-md-6">
<p class="ws-price-label">0.00</p>
</div>    
</div>
    
</div>

</div>

<!--</div>-->






@stop