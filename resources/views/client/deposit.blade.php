<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Shokse</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href='{{asset("images/favicon-icon.png")}}' sizes="16x16">
	<!--Bootstrap-->
    <link href='{{asset("css/bootstrap.min.css")}}' rel="stylesheet">
    
    <!--font-awesome CSS-->
    <link href='{{asset("css/font-awesome.min.css")}}' rel="stylesheet">    
    <!--Custom Template CSS-->
    <link href='{{asset("css/main.css")}}' rel="stylesheet" type="text/css">
    <!--Media Query CSS-->
    <link href='{{asset("css/media-query-all.css")}}' rel="stylesheet" type="text/css"> 
    <!--slick CSS-->
    <link rel="stylesheet" type="text/css" href='{{asset("css/slick-theme.css")}}'/>    
    <link rel="stylesheet" type="text/css" href='{{asset("css/slick.css")}}'/>
	 <link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/datepicker.css")}} >
    <!--Bootstrap-select-->
    <link href='{{asset("css/bootstrap-select.min.css")}}' rel="stylesheet">
	
	
  </head>
  <?php
    $notif = \Notice::text()->all();
    $uid = Auth()->user()->id;
    $count = count(\Notice::text()->unread());
?>
  <body>
     <header class="shokse-header block logged_header profile-notice">
    	<nav class="navbar container">
          <figure class="row">
            <figcaption class="navbar-header pull-left">
              <a class="navbar-brand" href="#"><img src='{{asset("images/shokse-logo.png")}}' class="img-responsive" alt="logo"/></a>
              <button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target="#mobileMenuCollapsing">
                 <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
            </figcaption>
            <figcaption class="search_cover navbar-collapse">
              <!--<a href="#" class="userPic"></a>-->               
                <div class="dropdown user_icons user_notice">
                    <a class="dropdown-toggle bell compaby_bell" type="button" id="menu1" data-toggle="dropdown" href="#">
                        <span class="badge notice_count_badge"></span></a>
                    <div class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <div class="succes gray arrow_box"></div>
                    </div>
                </div>
                 <a href="/client/transaction" class="puzzel"></a>
                            
               <ul class="nav navbar-nav" style="float:right; margin-left: 20px !important;">
                <li class="menu-item dropdown">
                  <a href="#" class="dropdown-toggle menu_1" data-toggle="dropdown">
                    <span></span>
                    <span class="mid"></span>
                    <span></span>
                  </a>	
                  
                  <ul class="dropdown-menu">
                    <li class="menu-item dropdown dropdown-submenu">
                      <a href="{{ url('/client/transaction')}}" class="dropdown-toggle" >Transaction</a>
                    </li>
                    <li class="menu-item dropdown dropdown-submenu">
                        <a href="{{ url('/client/invite')}}" class="dropdown-toggle" >Invite Expert</a>
                    </li>
                    <li class="menu-item dropdown dropdown-submenu">
                      <a href="{{ url('/client/profile')}}" class="dropdown-toggle" >Account</a>
                    </li>
                    <li class="menu-item dropdown dropdown-submenu">
                      <a href="{{ url('/auth/logout') }}" class="dropdown-toggle" >Sign Out</a>
                    </li>
                  </ul>
                </li>
              </ul>
                
                
            </figcaption>
            <!-- /.nav-right --> 
                      
          </figure>
          <!-- /row -->          
		</nav>
        <!-- /.container -->
    </header>
    <!-- /.shokse-header -->
<main class="block">
    <section class="block post_page2">
        <article class="container">
            <figure>
                <h1 class="text-center nonotexttransform">
                  <a class="navbar-brand" href="/client/manage" style="vertical-align: middle; line-height: 50px;margin-left: 60px;">
                      <img src="/images/left_arrow.png">
                  </a>                                                          
                  Deposit For Project</h1>
                <h6 class="text-center">You need to pay the deposit, for the team generating and detailed development plan. <span>Please bind the payment info with the project and pay $300.</span></h6>

            </figure>
        </article> 
        <!-- /.container -->         
    </section>
    <!-- /.duis-quis --> 
    <section class="block">
        <article class="container">
            <div class="mid_back post_page_content">
                <div class="col100">
                    <div class="head_cover">
                        <h3>PAYMENT INFORMATION</h3>
                        <div class="clearfix"></div>
                        <small>Please fill the form below.</small>
                    </div>
                    <div class="payment_method">
                      <ul style="text-align: left; list-style: none;">
                        @if($client_method)
                          <li><input type="radio" name="payment_method" id="client_payment_method" checked/> Client Payment Method</li>                        
                        @else
                          <li><input type="radio" name="payment_method" id="paypal_payment_method" class="payment_method_radio" value="paypal"/> Paypal</li>
                          <li><input type="radio" name="payment_method" id="credit_payment_method" class="payment_method_radio" value="credit"/> Credit</li>
                        @endif
                      </ul>
                    </div>
                    @if($client_method)
                    <form id="client_paymentform" class="form-horizontal" action="{{ URL('/client/deposit') }}" role="form" method="post">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">                        
                        <div class="pro_info">
                            <input type="hidden" name="payment_method_nonce" id="client-payment-method-nonce"/>
                            <input type="hidden" name="payment_type" value="client"/>
                            <input type="hidden" name="projectid" value="{{$projectid}}" id="client_project_id"/>
                            <div class="clearfix"></div>
                            <input type="submit" class="btn post_now" value="Pay $300">
                            <a href="/client/manage" class="btn post_now" >Cancel</a>
                        </div>
                    </form>
                    @else
                    <div id="paypal_button_box" style="display: none;">
                      <script src="https://www.paypalobjects.com/api/button.js?"
                          data-merchant="braintree"
                          data-id="paypal-button"
                          data-button="checkout"
                          data-color="gold"
                          data-size="medium"
                          data-shape="pill"
                          data-button_type="submit"
                          data-button_disabled="false"
                      ></script>                    
                    </div>
                    <form id="paypal_paymentform" class="form-horizontal" action="{{ URL('/client/deposit') }}" role="form" method="post" style="display: none;">
                      <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="payment_method_nonce" id="paypal-payment-method-nonce"/>
                      <input type="hidden" name="payment_type" value="paypal"/>
                      <input type="hidden" name="projectid" value="{{$projectid}}" id="paypal_project_id"/>
                      <input type="submit" class="btn post_now" value="Pay $300" id="paypal_pay_button">
                      <a href="/client/manage" class="btn post_now" >Cancel</a>
                    </form>

                    <form id="card_paymentform" class="form-horizontal" action="{{ URL('/client/deposit') }}" role="form" method="post" style="display: none;">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <div class="pro_info">
                            <div class="pro_info_box">
                                <label>Card Number</label>
                                <div id="card-number" class="hosted-field input1"></div>
                            </div>
                            <div class="pro_info_box">
                                <label>CVV</label>
                                <div id="cvv" class="hosted-field input1"></div>
                            </div>
                            <div class="pro_info_box">
                                <label>Expiration Date</label>
                                <div id="expiration-date" class="hosted-field input1"></div>
                            </div>
                            <input type="hidden" name="payment_method_nonce" id="card-payment-method-nonce"/>
                            <input type="hidden" name="payment_type" value="credit-card"/>
                            <input type="hidden" name="projectid" value="{{$projectid}}" id="card_project_id"/>
                            <div class="clearfix"></div>
                            <input type="submit" class="btn post_now" value="Pay $300" id="card_pay_button">
                            <a href="/client/manage" class="btn post_now" >Cancel</a>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </article> 
        <!-- /.container -->         
    </section>
	
	

</main><!-- /main -->

<footer class="block shokse-footer">
    	<article class="container">
        	<figure class="shokse-footer-top col-md-16 col-sm-16 col-xs-16">
            	<figcaption class="col-md-8 col-sm-8 col-xs-16 footer-left">
                	<a href="#" class="footer-logo"><img src='{{asset("images/shokse-footer-logo.png")}}' alt="footer-img" /></a>
                    <p class="primary-color shokse-matche">Shokse matches the perfect candidate to your projects in need. No matter how complicated, the Shokse management system gets your project done faster and bettter.</p>
                </figcaption>
  				<!-- /figcaption col -->
                
                <figcaption class="col-md-8 col-sm-8 col-xs-16 footer-right">
                	<ul>
                    	<li>
                        	<h6>About us</h6>
                            <a href="#">Who We Are</a>
                        </li>
                        <li>
                        	<h6>Quick Links</h6>
                            <a href="#">Register</a>
                        </li>
                        <li>
                        	<h6>Supports</h6>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                    
                </figcaption>
  				<!-- /figcaption col -->
                
            </figure>
  			<!-- /.footer-top -->    
            
            <figure class="shokse-footer-bottom col-md-16 col-sm-16 col-xs-16">
                <figcaption class="col-md-8 col-sm-8 col-xs-16 social-link">
                	<a href="http://www.facebook.com/Shokse"><img src='{{asset("images/fb-icon.png")}}' alt="icon" /></a>
                  <a href="http://www.twitter.com/devshokse"><img src='{{asset("images/twiter-icon.png")}}' alt="icon" /></a>
                  <a href="http://www.linkedin.com/company/shokse"><img src='{{asset("images/link-in-icon.png")}}' alt="icon" /></a>
                </figcaption>
  				<!-- /figcaption col -->
                
                <figcaption class="col-md-8 col-sm-8 col-xs-16 copyWrite">
                	<a href="#">© 2016 Shokse Ltd </a>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Privacy Policy</a>
                </figcaption>
  				<!-- /figcaption col -->
                
            </figure>
  			<!-- /.footer-bottom --> 
        
        </article>
  		<!-- /article -->        
    </footer>
  	<!-- /footer.shokse-footer -->

<!-- <script src='{{asset("js/jquery.js")}}'></script> -->




<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.8.0/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.8.0/js/hosted-fields.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.8.0/js/paypal.min.js"></script>

<!-- bootstrap v3.3.7 js -->
<script src="{!! Request::root().'/assets/js/bootstrap.min.js' !!}"></script>
<!-- Select2 4.0.3 js -->
<script src="{!! Request::root().'/assets/js/select2.min.js' !!}"></script>

<script src='{{asset("js/bootstrap-select.min.js")}}'></script>
<script src='{{asset("js/iscroll.js")}}'></script>
<script src='{{asset("js/main.js")}}'></script>
<script src='{{asset("js/slick.min.js")}}'></script> 
<script src='{{asset("js/expertise/vendor/bootstrap-datepicker.js")}}'></script>
<script type="text/javascript" src="/js/notification.js"></script>

<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('js/jquery.validate.js') }}"></script>
<!-- form validation script-->
<script>
  $(document).ready(function() {
    $('.payment_method_radio').click(function(){
      var selected_mode = $('input[name=payment_method]:checked').val();
      if(selected_mode == 'paypal'){
        $('#card_paymentform').hide();
        $('#paypal_paymentform').show();
        $('#paypal_button_box').show();
        if($('#paypal-payment-method-nonce').val() == ''){
          $('#paypal_pay_button').prop('disabled', true);
        } else {
          $('#paypal_pay_button').prop('disabled', false);
        }
      } else {
        $('#card_paymentform').show();
        $('#paypal_paymentform').hide();
        $('#paypal_button_box').hide();
      }
    });
  });
</script>
@if (!$client_method)
<script>
braintree.client.create({
  authorization: '<?php echo $gateway->getTokenKey() ?>'
}, function (err, clientInstance) {
  if (err) {
    console.error(err);
    return;
  }

  braintree.hostedFields.create({
    client: clientInstance,
    styles: {
      'input': {
        'font-size': '14px',
        'font-family': 'helvetica, tahoma, calibri, sans-serif',
        'color': '#3a3a3a'
      },
      ':focus': {
        'color': 'black'
      }
    },
    fields: {
      number: {
        selector: '#card-number',
        placeholder: '4111 1111 1111 1111'
      },
      cvv: {
        selector: '#cvv',
        placeholder: '123'
      },
      expirationDate: {
        selector: '#expiration-date',
        placeholder: 'MM/YY'
      }
    }
  }, function (err, hostedFieldsInstance) {
    if (err) {
      console.error(err);
      return;
    }

    hostedFieldsInstance.on('validityChange', function (event) {
      var field = event.fields[event.emittedBy];

      if (field.isValid) {
        if (event.emittedBy === 'expirationMonth' || event.emittedBy === 'expirationYear') {
          if (!event.fields.expirationMonth.isValid || !event.fields.expirationYear.isValid) {
            return;
          }
        } else if (event.emittedBy === 'number') {
          $('#card-number').next('span').text('');
        }
                
        // Apply styling for a valid field
        $(field.container).parents('.form-group').addClass('has-success');
      } else if (field.isPotentiallyValid) {
        // Remove styling  from potentially valid fields
        $(field.container).parents('.form-group').removeClass('has-warning');
        $(field.container).parents('.form-group').removeClass('has-success');
        if (event.emittedBy === 'number') {
          $('#card-number').next('span').text('');
        }
      } else {
        // Add styling to invalid fields
        $(field.container).parents('.form-group').addClass('has-warning');
        // Add helper text for an invalid card number
        if (event.emittedBy === 'number') {
          $('#card-number').next('span').text('Looks like this card number has an error.');
        }
      }
    });

    hostedFieldsInstance.on('cardTypeChange', function (event) {
      // Handle a field's change, such as a change in validity or credit card type
      if (event.cards.length === 1) {
        $('#card-type').val("Pay with " + event.cards[0].niceType);
      } else {
        $('#card-type').val('Pay with Card');
      }
    });

    $('#card_paymentform').submit(function (event) {
      if($('#card_project_id').val() == ''){
        event.preventDefault();
      }
      if($('#card-payment-method-nonce').val() == ''){
        event.preventDefault();
        hostedFieldsInstance.tokenize(function (err, payload) {
          if (err) {
            console.error(err);
            return;
          }
          
          $('#card-payment-method-nonce').val(payload.nonce);          
          $('#card_paymentform').submit();
        });
      }
    });
  });
});
</script>

<script>

$('#paypal_paymentform').submit(function (event) {
  if($('#paypal_project_id').val() == ''){
    event.preventDefault();
  }  
  if($('#paypal-payment-method-nonce').val() == ''){
    event.preventDefault();
  }
});

$('#client_paymentform').submit(function (event) {
  if($('#client_project_id').val() == ''){
    event.preventDefault();
  }  
});

var paypalButton = document.querySelector('.paypal-button');

// Create a client.
braintree.client.create({
  authorization: '<?php echo $gateway->getTokenKey() ?>'
}, function (clientErr, clientInstance) {

  // Stop if there was a problem creating the client.
  // This could happen if there is a network error or if the authorization
  // is invalid.
  if (clientErr) {
    console.error('Error creating client:', clientErr);
    return;
  }

  // Create a PayPal component.
  braintree.paypal.create({
    client: clientInstance
  }, function (paypalErr, paypalInstance) {

    // Stop if there was a problem creating PayPal.
    // This could happen if there was a network error or if it's incorrectly
    // configured.
    if (paypalErr) {
      console.error('Error creating PayPal:', paypalErr);
      return;
    }

    // Enable the button.
    paypalButton.removeAttribute('disabled');

    // When the button is clicked, attempt to tokenize.
    paypalButton.addEventListener('click', function (event) {

      // Because tokenization opens a popup, this has to be called as a result of
      // customer action, like clicking a button—you cannot call this at any time.
      paypalInstance.tokenize({
        flow: 'vault'
      }, function (tokenizeErr, payload) {

        // Stop if there was an error.
        if (tokenizeErr) {
          if (tokenizeErr.type !== 'CUSTOMER') {
            console.error('Error tokenizing:', tokenizeErr);
          }
          return;
        }

        // Tokenization succeeded!
        paypalButton.setAttribute('disabled', true);
        console.log('Got a nonce! You should submit this to your server.');
        $('#paypal-payment-method-nonce').val(payload.nonce);
        $('#paypal_pay_button').prop('disabled', false);
      });

    }, false);

  });

});
</script>
@endif
