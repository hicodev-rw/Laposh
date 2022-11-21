@extends('web.layout')
@section('content')

  
    <div class="our_room">
    <div class="row">
    <div class="col-md-5 col-xl-5"style="margin:auto;">
            <div class="form_register">
                    <h3 class="panel-title text-center"><strong>Reservation Details</strong></h3>

                    Dear {{auth()->user()->lastName}}, your reservation has been received with the following details. You are required to pay for it to be active!
                    <hr/>
<div>
<h4><strong>Reference:{{$booking->reference}}</strong></h4>
</div>
<div>
<h4><strong>Room:{{$booking->room->name}}</strong></h4>
</div>
<div>
<h4><strong>Price: ${{$booking->room->price}}</strong></h4>
</div>
<div>
<h4><strong>Check in date:{{$booking->check_in_date}}</strong></h4>
</div>
<div>
<h4><strong>Check out date:{{$booking->check_out_date}}</strong></h4>
</div>

Regards,
<br><br><br>
<br>


                        </div>
						</div>
			<div class="col-md-6  col-xl-4" style="margin:auto;">
            <div class="form_register">
                <div class="panel-heading display-table" >
                    <h3 class="panel-title text-center"><strong>Payment Details</strong></h3>
                </div>
                <div class='form-row row'>
                            <div class='col-md-12 error form-group hide' >
                                <p>Please correct the errors and try again.</
                    </p>
                        </div>
                <div class="panel-body">
    
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
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
                        <input value="{{$booking->id}}" name="booking_id" type='number' hidden>
                        <div class='card-body'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'style="font-size:16px;">Name on Card</label> 
                                <input class='form-control' size='4' type='text'>
                            </div>
                        </div>
    
                        <div class='card-body'>
                            <div class='col-xs-12' style="background-color:#eef2fcf5; border:none;">
                                <label style="font-size:16px;">Amount</label> 
                                <input value="{{$booking->room->price}}" class='form-control' type='number' step="2" name="amount" readonly>
                            </div>
                        </div>
                        <div class='card-body'>
                            <div class='col-xs-12 form-group card required' style="background-color:#eef2fcf5; border:none;">
                                <label class='control-label'style="font-size:16px;">Card Number</label> 
                                <input class='form-control card-number' size='20' type='text'>
                            </div>
                        </div>
                        <div class="row">
                        <div class='card-body'>
                            <div class='col-xs-12 col-md-3 form-group cvc required'>
                                <label class='control-label'style="font-size:16px;">CVC<br><br></label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-5 form-group expiration required'>
                                <label class='control-label' style="font-size:16px;">Expiration Month</label> 
                                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'style="font-size:16px;">Expiration Year</label> 
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>
                            </div>
    
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>        
        </div>
    </div>



    
        
</div>
</div>
</div>

@endsection    

