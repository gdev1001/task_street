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
                  Invite a Expertise</h1>
            </figure>
        </article> 
        <!-- /.container -->         
    </section>
    <!-- /.duis-quis --> 
    <section class="block">
        <article class="container">
            <div class="mid_back post_page_content">
                <div class="col100">
                    <div class="head_cover" style="margin-bottom: 5px;">
                        <h3>Expert Email Address</h3>
                        <div class="clearfix"></div>                        
                    </div>
                    <form class="form-horizontal" action="{{ URL('/client/invite') }}" role="form" method="post">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">                        
                        <div class="pro_info">
                            <input type="email" name="email" style="width: 50%; margin-bottom: 20px;" required />
                            <div class="clearfix"></div>
                            <input type="submit" class="btn" value="INVITE">
                        </div>
                    </form>
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
  });
</script>
