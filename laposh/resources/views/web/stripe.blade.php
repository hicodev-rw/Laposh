@extends('web.layout')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
    <div class="our_room">
    <div class="row">
    <div class="col-md-5 col-xl-5"style="margin:auto;">
            <div class="form_register">
                    <h3 class="panel-title text-center"><strong>Reservation Details</strong></h3>

                    Dear {{auth()->user()->lastName}}, your reservation has been received with the following details. You are rewured to pay for it to be active!
<div>
Reference:{{$booking->reference}}
</div>
<div>
Price:{{$booking->room->price}}
</div>
<div>
Room:{{$booking->room->name}}
</div>
<div>
Check in date:{{$booking->check_in_date}}
</div>
<div>
Check out date:{{$booking->check_out_date}}
</div>


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
    
                        <div class='card-body'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'style="font-size:16px;">Name on Card</label> 
                                <input class='form-control' size='4' type='text'>
                            </div>
                        </div>
    
                        <div class='card-body'>
                            <div class='col-xs-12 form-group card required' style="background-color:#eef2fcf5; border:none;">
                                <label class='control-label'style="font-size:16px;">Card Number</label> 
                                <input autocomplete='off' class='form-control card-number' size='20' type='text'>
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
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
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

    
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
@endsection