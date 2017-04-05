<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Shokse Welcome</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="icon" type="image/png" href="/images/favicon-icon.png" sizes="16x16">

		<!--Bootstrap-->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		
		<!--font-awesome CSS-->
		<link href="/css/font-awesome.min.css" rel="stylesheet">    
		
		<!--Custom Template CSS-->
		<link href="/css/main.css" rel="stylesheet" type="text/css">
	   
		<!--Media Query CSS-->
		<link href="/css/media-query-all.css" rel="stylesheet" type="text/css"> 
	   
		<!--slick CSS-->
		<link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>    
		<link rel="stylesheet" type="text/css" href="/css/slick.css"/>
  	</head>

	<body>
		<div class="registry">
			<header class="shokse-header block">
				<nav class="navbar container">
					<figure class="row">
           
						<figcaption class="navbar-header pull-left">
							 <a class="navbar-brand" href="#"><img src="/images/shokse-footer-logo.png" class="img-responsive" alt="logo"/></a>
							  
							<button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target="#mobileMenuCollapsing">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</button>
              
						</figcaption>
						<!-- /.navbar-header --> 
            
						<figcaption class="nav-menu-right pull-right">
            
							<figcaption id="mobileMenuCollapsing" class="collapse navbar-collapse">
								<ul class="nav navbar-nav main-menu">
									<li class="get-started"><a href="/auth/login"><button type="button" class="btn">My Account</button></a></li>
								</ul>
							</figcaption>
						<!-- /.collapse.navbar-collapse -->
                 
						</figcaption>
						<!-- /.nav-right --> 
                    </figure>
					<!-- /row -->          
				</nav>
				<!-- /.container -->
			</header>
			<!-- /.shokse-header -->
			<div class="clearfix"></div>
				<div class="thumbox1">
					<div class="overlay123"></div>
					<div class="container">
						
						<h1>I am looking to work as...</h1>
						@if (Session::has('alert-email-activate'))
							<div><p>{{ Session::get('alert-email-activate') }}</p></div>
						@endif					
						<div class="row">

							<div class="col-md-11 regs_c">
								<div id="carousel2" class="carousel slide reg_slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#carousel2" data-slide-to="0" class="active"></li>
									<li data-target="#carousel2" data-slide-to="1"></li>
									<li data-target="#carousel2" data-slide-to="2"></li>
								</ol>
								
								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
								
									<div class="item active">
										<div class="img12"><img src="/images/C54E7583-BC1A-468F-AAA3-71C009AB3826@3x.png"></div>
										<h3>Welcome {{ Session::get('username')}}!</h3>
										<p>Congratulations! You are now a member of a growing community.</p>
										<!-- <a href="javascript:void(0)" class="get_s">Help me get around</a>
										<div class="clearfix"></div>
										<a href="#" class="no_thank">No thanks! I don't need any help.</a> -->
									</div>
									<div class="item">
										<div class="img12"><img src="/images/C54E7583-BC1A-468F-AAA3-71C009AB3826@3x.png"></div>
										<h3>Welcome {{ Session::get('username')}}!</h3>
										<p>Congratulations! You are now a member of a growing community.</p>

										<!-- <a href="javascript:void(0)" class="get_s">Help me get around</a>

										<div class="clearfix"></div>
										<a href="#" class="no_thank">No thanks! I don't need any help.</a> -->
									</div>
									<div class="item">
										<div class="img12"><img src="/images/C54E7583-BC1A-468F-AAA3-71C009AB3826@3x.png"></div>
										<h3>Welcome {{ Session::get('username')}}!</h3>
										<p>Congratulations! You are now a member of a growing community.</p>

<!-- 										<a href="javascript:void(0)" class="get_s">Help me get around</a>
										<div class="clearfix"></div>
										<a href="#" class="no_thank">No thanks! I don't need any help.</a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
       
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/iscroll.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/slick.min.js"></script>  
 
    
  </body>
</html>