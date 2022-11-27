<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Laposh</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      
      <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
      <link rel="stylesheet" href="{{ URL::asset('css/error.css'); }}">
      <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css');}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ URL::asset('css/style.css');}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ URL::asset('css/responsive.css');}}">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ URL::asset('css/jquery.mCustomScrollbar.min.css');}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ URL::asset('css/nav.css');}}">
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ URL::asset('images/loading.gif');}}" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <section class="ftco-section">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
      <div class="row">
      <div class="col-xl-6 col-lg-5 col-md-6 col-sm-5" >
      </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" style="padding-right:20px; padding-left:30px; align-items:right">
                   <nav class="navigation navbar">
                         <ul class="row">
                            @if(!auth()->user() || auth()->user()->role!='client')
                            <li class="nav-item">
                               <a href="/register">Register</a>
                            </li>&nbsp;|&nbsp;
                            <li class="nav-item">
                               <a href="/login">Login</a>
                            </li>&nbsp;@endif
                            
                            @if(auth()->user() && auth()->user()->role=='client')|&nbsp;
                            <li class="nav-item">
                               <a href="/customer/dashboard">My Laposh</a>
                            </li>
                            @endif
                         </ul>
                   </nav>
                </div>
            </div>
</div>
		<div class="container-fluid px-md-5">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<a class="navbar-brand" href="#">Laposh Hotel <span>We serve you better</span></a>
						</div>
						<div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
							<form action="#" class="searchform order-lg-last">
			          <div class="form-group d-flex">
			            <input type="text" class="form-control pl-3" placeholder="Search">
			            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
			          </div>
			        </form>
						</div>
					</div>
				</div>

				<div class="col-md-4 d-flex">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-youtube"><i class="sr-only">Youtube</i></span></a>
		    		</p>
	        </div>
				</div>
			</div>
		</div>
          </div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid">
	    
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="/rooms" class="nav-link">Rooms</a></li>
	        	<li class="nav-item"><a href="/gallery" class="nav-link">Gallery</a></li>
              <li class="nav-item"><a href="/about" class="nav-link">about us</a></li>
	          <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
     </div></div></div></div>
    <!-- END nav -->

	</section>
      @yield('content')
      <!--  footer -->
      <footer>
         <div class="footer">
               <div class="row">
               <div class=" col-md-3">
                     <h3>La posh Hotel</h3>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
                  <div class=" col-md-3">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Kigali, Rwanda</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> 0788230853</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> info@laposh.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-3">
                     <h3>Menu Links</h3>
                     <ul class="link_menu">
                        <li><a href="/">Home</a></li>
                        <li><a href="/rooms">Our Rooms</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-3">
                     <h3>News letter</h3>
                     <form action="/subscribe" method="POST" class="bottom_form">
                        {{csrf_field()}}
                        <input class="enter" placeholder="Enter your email" type="email" name="email" required>
                        <button type="submit" class="sub_btn">subscribe</button>
                     </form>

                  </div>
               </div>
            </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      
      <script src="{{ URL::asset('js/jquery.min.js');}}"></script>
      <script src="{{ URL::asset('js/bootstrap.bundle.min.js');}}"></script>
      <script src="{{ URL::asset('js/jquery-3.0.0.min.js');}}"></script>
      <!-- sidebar -->
      <script src="{{ URL::asset('js/jquery.mCustomScrollbar.concat.min.js');}}"></script>
      <script src="{{ URL::asset('js/custom.js');}}"></script>

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
   </body>
</html>