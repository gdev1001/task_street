<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Shokse client project</title>
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
  </head>
  <body>
    <header class="shokse-header block">
    	<nav class="navbar container">
          <figure class="row">
            <figcaption class="navbar-header pull-left">
              <a class="navbar-brand" href="#"><img src='{{asset("images/shokse-logo.png")}}' alt="logo"/></a>
              <button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target="#mobileMenuCollapsing">
                 <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
            </figcaption>
            <!-- /.navbar-header --> 
            <!--<figcaption class="nav-menu-right pull-right">
                <figcaption id="mobileMenuCollapsing" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav main-menu">
                    	<li><button type="button" class="btn">Get Started</button></li>
                        <li class="get-started"><a href="#" class="search"></a></li>
                    </ul>
                </figcaption>
            	<!-- /.collapse.navbar-collapse -->
                 
            <!--</figcaption>-->
            <figcaption class="search_cover navbar-collapse">
            	<button type="button" class="btn" style="float: left; margin-right: 10px;">Filters</button></li>
                <!--<a href="#" class="userPic"></a>
                <a href="#" class="bell"><span class="badge">0</span></a>
                <a href="/client/transaction" class="puzzel"></a>
                -->               
                <a href="#" class="search marg1"></a>
            </figcaption>
            <!-- /.nav-right --> 
                      
          </figure>
          <!-- /row -->          
		</nav>
        <!-- /.container -->
    </header>
    <style type="text/css">
      
      .loader {
          border: 16px solid #f3f3f3; /* Light grey */
          border-top: 16px solid #6BC5D3; /* Blue */
          border-radius: 50%;
          width: 120px;
          height: 120px;
          animation: spin 2s linear infinite;
         position: relative;
         top: 50%;
         margin: 13% auto 13% auto;

      }

      @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
      }
    </style>
    <!-- /.shokse-header -->
  	<main class="block task_text freelancer">
        <section class="block">
        	<article class="container">
            	<figure style="position: relative;">
                    <a class="navbar-brand" href="/profile" style="vertical-align: middle; line-height: 50px;margin-left: 60px; position: absolute; left: 0;">
                        <img src="/images/left_arrow.png">
                    </a>                                                                              
                    <h1 class="text-center">
                        Find a project
                    </h1>
                    <h6 class="text-center">WEB DEVELOPMENT <span>{{count($tasks)}}</span><a href="#" class="drop"></a></h6>
                    <p id="status_message" style ='color: #F73B56;'>
                    @if ($status == 'overflow')
                        You have already joined 3 tasks. You unable to join anymore now.
                    @else
                        You have already joined {{$applied}} tasks.
                    @endif                    
                    </p>
                    <div class="clearfix"></div>
                </figure>
                <div class="loader"></div>
                <div id="project_data">

                </div>
                 
				
			</article> 
			<!-- /.container -->         
		</section>
    	<!-- /.duis-quis --> 
    </main>	
    
  	<!-- /main -->
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
    <!--<script type="text/javascript" src="assets/js/jquery.js"></script>-->
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script> 
    <script type="text/javascript" src='{{asset("js/bootstrap.min.js")}}'></script>
    <script type="text/javascript" src='{{asset("js/iscroll.js")}}'></script>
    <script type="text/javascript" src='{{asset("js/main.js")}}'></script>
    <script type="text/javascript" src='{{asset("js/slick.min.js")}}'></script> 
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
   
<script type="text/javascript">
  
  $( document ).ready(function() {
    get_projects();
});
  // to get page data from ajax
  function get_projects()
  { 
    $.ajax({
      url: 'project/get_projects',
      type:'GET',
   
      async: false,
      success: function(response)
      {  
        $('.loader').hide();
        $("#project_data").html(response);
      }
    });
  }



</script>



  </body>
</html>