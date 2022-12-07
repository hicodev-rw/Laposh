@extends('web.layout')
@section('content')
  
    <div class="our_room">
    <div class="row">
    <div class="col-md-5 col-xl-5"style="margin:auto;">
            <div class="form_register" style="border:none;">
                    <h3 class="panel-title text-center"><strong>Reservation Details</strong></h3>

                    Dear {{auth()->user()->lastName}}, you are about to submit reservation with the following details. You are required to pay for it to be active!
                    <hr/>
<div>
<h5><strong>Reference:{{$booking->reference}}</strong></h5>
</div>
<div>
<h5><strong>Room:{{$booking->room->name}}</strong></h5>
</div>
<div>
<h5><strong>Price: ${{$booking->room->price}}</strong></h5>
</div>
<div>
<h5><strong>Check in date:{{$booking->check_in_date}}</strong></h5>
</div>
<div>
<h5><strong>Check out date:{{$booking->check_out_date}}</strong></h5>
</div>
<div>
<h5><strong>Stay duration:{{$days}} days ({{$hours}} hours)</strong></h5>
</div>

Regards,
<br><br>
<br>


                        </div>
						</div>
			<div class="col-md-6  col-xl-6" style="margin:auto;padding:10px">
            <div class="form_register">
                <div class="panel-heading display-table" >
                    <h3 class="panel-title text-center"><strong>Payment Details</strong></h3>
                </div>
                <div class='form-row row'>
                            <div class='col-xl-12 error hide' >
                                <p>Please correct the errors and try again.</
                    </p>
                        </div>
                <div>
    
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
    
                        <form 
                            role="form" 
                            action="{{ url('/stripe/payment') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            style="width:150%;"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
                        <input value="{{$booking->id}}" name="booking_id" type='number' hidden>
                        <div class='card-body'style="padding-bottom:0px;">
                            <div class='col-xs-12 form-group required'>
                                <label class='card-title mb-0'style="font-size:16px;"><strong>Name on Card</strong></label> 
                                <input class='form-control' size='4' type='text'required>
                            </div>
                        </div>
    
                        <div class='card-body'style="padding-bottom:1px;">
                            <div class='col-xs-12' style="background-color:#eef2fcf5; border:none;">
                                <label style="font-size:16px;"><strong>Amount ($)</strong></label> 
                                <input value="{{$amount}}" class='form-control' type='Number' step="2" name="amount" readonly>
                            </div>
                        </div>
                        <div class='card-body' style="padding-bottom:1px;">
                            <div class='col-xs-12 form-group card required' style="background-color:#eef2fcf5; border:none;">
                                <label class='card-title mb-0'style="font-size:16px;"><strong>Card Number</strong></label> 
                                <input class='form-control card-number' size='20' type='text'required>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-xs-12 col-md-3 form-group cvc required'>
                                <label class='card-title mb-0'style="font-size:16px;"><strong>CVC</strong></label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'required>
                            </div>
                            <div class='col-xs-12 col-md-5 form-group expiration required'>
                                <label class='card-title mb-0' style="font-size:16px;"><strong>Expiration Month</strong></label> 
                                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required' >
                                <label class='card-title mb-0'style="font-size:16px;"><strong>Expiration Year</strong></label> 
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'required >
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <center>
                                <button class="read_more" type="submit">Pay Now</button>
</center>
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>        


    
        
</div>
</div>
</div>

@endsection    

