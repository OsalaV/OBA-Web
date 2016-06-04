@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Tickets Management
<!--<a href="{{ URL::to('posts-add') }}" class="ws-tablepage-action-btn">Add New</a>       -->
</h2>
    
<div class="clearfix hidden-xs">
<!--
<div class="pull-left">
<ul class="ws-table-options">
</ul>  
</div> 
-->
<div class="pull-right">
<form role="form" action="" method="post" enctype="multipart/form-data">
<input class="form-search-control" name="searchkey" type="text" required> 
<input type="submit" id="search-submit" class="button form-search-btn" value="Search">
</form>  
</div>
</div>
    


<div class="table-responsive ws-table-container">

<table class="table ws-table">
<thead class="ws-table-head">
<tr>
<th class="text-center">Event Name</th>  
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
<div class="price-box">

        <form class="form-horizontal form-pricing" role="form">

<!--
          <div class="price-slider">
            <h4 class="great">Amount</h4>
            <span>Minimum $10 is required</span>
            <div class="col-sm-12">
             <div id="slider"></div>
            </div>
          </div>
          <div class="price-slider">
            <h4 class="great">Duration</h4>
            <span>Minimum 1 day is required</span>
            <div class="col-sm-12">
              <div id="slider2"></div>
            </div>
          </div>
-->

          <div class="price-form">

<!--
            <div class="form-group">
              <label for="amount" class="col-sm-6 control-label">Amount (LKR): </label>
              <div class="col-sm-6">
                <input type="hidden" id="amount" class="form-control">
                <p class="price lead" id="amount-label">0</p>
                <span class="price">.00</span>
              </div>
            </div>
            <div class="form-group">
              <label for="duration" class="col-sm-6 control-label">Duration: </label>
              <div class="col-sm-6">
                <input type="hidden" id="duration" class="form-control">
                <p class="price lead" id="duration-label">0</p>
                <span class="price">days</span>
              </div>
            </div>
-->
<!--            <hr class="style">-->
            <div class="form-group total">
              <label for="total" class="col-sm-6 control-label"><strong>Amount (LKR): </strong></label>
              <div class="col-sm-6">
                <input type="hidden" id="total" class="form-control">
                <center><p class="price lead" id="total-label">0.00</p></center> 
              </div>
            </div>

          </div>

<!--
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed <span class="glyphicon glyphicon-chevron-right pull-right" style="padding-right: 10px;"></span></button>
            </div>
          </div>
-->
<!--
          <div class="form-group">
            <div class="col-sm-12">
              <img src="http://amirolahmad.github.io/bootstrap-pricing-slider/images/payment.png" class="img-responsive payment" />
            </div>
          </div>
-->

        </form>

</div>




@stop