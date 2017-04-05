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
            	<!--<a class="btn " href="{{ url('/client/manage')}}">Management</a>-->
                <div class="dropdown user_icons user_notice">
                    <a class="dropdown-toggle bell compaby_bell" type="button" id="menu1" data-toggle="dropdown" href="#">
                        <span class="badge notice_count_badge">{{ $count }}</span></a>
                    <div class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <div class="succes gray arrow_box"></div>
                    </div>
                </div>
                 <a href="/client/transaction" class="puzzel"></a>                                                
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
                
                  Client Transaction List</h1>
            </figure>
        </article> 
        <!-- /.container -->         
    </section>
    <!-- /.duis-quis --> 
    <section class="block">
        <article class="container">
            <div class="mid_back post_page_content">
                <div class="col100">
                  @if (!is_null($deposit_trans))
                    <div class="head_cover">
                        <h3>DEPOSIT TRANSACTION</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                      <table style="width: 100%">
                        <tbody>
                          <tr>
                            <td>Project Deposit</td>
                            <td>{{$deposit_trans->amount}}</td>
                            <td>{{$deposit_trans->created_at}}</td>
                          </tr>                          
                        </tbody>
                      </table>
                    </div>
                  @endif
                  <?php $project_id = 0 ?>                
                  <?php $project_total = 0 ?>
                  @foreach($transactions as $item)
                    @if ($project_id != $item->project->id)                    
                      @if ($project_id > 0)
                          <tr>
                            <td>Total Payment:</td>
                            <td>{{$project_total}}</td>
                            <td></td>
                          </tr>                                                
                          </tbody>
                        </table>
                      </div>
                      <?php $project_total = 0 ?>
                      @endif                    
                      <?php $project_total += $item->amount; ?>
                      <div class="head_cover" style="margin: 20px 0 10px 0; ">
                          <h3>{{$item->project->name}}</h3>
                          <div class="clearfix"></div>
                      </div>
                      <?php $project_id = $item->project->id ?>
                      <div>
                        <table style="width: 100%">
                          <thead>
                            <tr>
                              <td>Task Name</td>
                              <td>Amount</td>
                              <td>Payment Date</td>
                            </tr>
                          </thead>
                          <tbody>
                    @endif
                    @if(is_null($item->task))
                          <tr>
                            <td>Project Deposit</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->created_at}}</td>
                          </tr>                          
                    @else
                          <tr>
                            <td>{{$item->task->name}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->created_at}}</td>
                          </tr>                          
                    @endif
                  @endforeach
                          <tr>
                            <td>Total Payment:</td>
                            <td>{{$project_total}}</td>
                            <td></td>
                          </tr>                                                
                          </tbody>
                        </table>
                      </div>
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
      } else {
        $('#card_paymentform').show();
        $('#paypal_paymentform').hide();
        $('#paypal_button_box').hide();
      }
    });
  });
</script>
