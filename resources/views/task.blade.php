<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shokes</title>

	<!--Css-->

	<link href="{{ asset('/css/welcome1.css') }}" rel="stylesheet">
	<link href = "{{asset('css/chart/chart.css')}}" rel="stylesheet">


	<link href="/css/post/bootstrap.min.css" rel="stylesheet">
	<link href="/css/post/font-awesome.min.css" rel="stylesheet">
	<link href="/css/post/animate.min.css" rel="stylesheet">
	<link href="/css/post/lightbox.css" rel="stylesheet">
	<link href="/css/post/main.css" rel="stylesheet">
	<link href="/css/post/responsive.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/repsond.min.js"></script>
	<![endif]-->

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:200,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
	<script type="text/javascript" src="{{asset('js/chart/ReactBarChart.js') }}"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>



	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class = "page">
		<header id="header">

		<div class="navbar navbar-inverse" role="banner">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="#">
						<h1><img src="{{url('img/shokse.jpg')}}" alt="logo" style = "height:120px;opacity:0.5"></h1>
					</a>

				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li ><a href={{url('/login')}}>Login</a></li>


						<li><a href={{url('auth/register')}}>SIGN UP</a></li>
					</ul>
				</div>

			</div>
		</div>
		</header>
		<!--/#header-->

		<section id="home-slider">
			<div class="container" style ="text-align: center">
				<div class="main-slider">
					<div class="slide-text" style = "width:100%">
						<h1 style = "font-size:40px">Program on your spare time, get paid, get experience</h1>
						<h2>Tap into the crowdsourced community to develop your software.</h2>
						<a href={{url('auth/register')}} class="btn btn-common">SIGN UP</a>
					</div>
					{{--<img src="img/vector_251_03-512.png" class="img-responsive slider-house" alt="slider image">--}}
					{{--<img src="img/home/slider/slide1/house.png" class="img-responsive slider-house" alt="slider image">--}}
					{{--<img src="img/home/slider/slide1/circle1.png" class="slider-circle1" alt="slider image">--}}
					{{--<img src="img/home/slider/slide1/circle2.png" class="slider-circle2" alt="slider image">--}}
					{{--<img src="img/home/slider/slide1/cloud1.png" class="slider-cloud1" alt="slider image">--}}
					{{--<img src="img/home/slider/slide1/cloud2.png" class="slider-cloud2" alt="slider image">--}}
					{{--<img src="img/home/slider/slide1/cloud3.png" class="slider-cloud3" alt="slider image">--}}
					{{--<img src="img/home/slider/slide1/sun.png" class="slider-sun" alt="slider image">--}}
					{{--<img src="img/home/cycle.png" class="slider-cycle" alt="">--}}
				</div>
			</div>
			<div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
		</section>
		<!--/#home-slider-->

		{{--<div class = "cover">--}}

			{{--<canvas id="myCanvas" width = "1200px" height="720px"></canvas>--}}


			{{--<div class = "container intro">--}}


					{{--<div class = "navbar_container">--}}


						{{--<nav class="navbar  space">--}}
							{{--<div class="container-fluid">--}}

								{{--<div class="navbar-header">--}}
									{{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">--}}
										{{--<a class="navbar-brand logo" href="#" style = "height:40px"></a> Menu--}}
									{{--</button>--}}
									{{--<a class="navbar-brand" href="#"> </a>--}}
								{{--</div>--}}


								{{--<div class="collapse navbar-collapse" id="myNavbar">--}}
									{{--<a class="navbar-brand logo" href="#" style = "height:40px"></a>--}}
									{{--<ul class="nav navbar-nav">--}}
										{{--<li role="presentation" class= "companyLogin box"><a href={{url('/login')}} >Login</a></li>--}}
										{{--<li class = "sep">--}}
										{{--<li role="presentation " class = "studentLogin box"><a href={{url('/lazy')}}>POST PROJECT</a></li>--}}

									{{--</ul>--}}
								{{--</div>--}}
						{{--</div>--}}
					{{--</nav>--}}
				{{--</div>--}}
				{{--<div class = "row">--}}
					{{--<div class = "col-xs-12 text"style = "margin-top:10%">--}}
						{{--<h1 class ="h1-black">--}}
							{{--Explore your passion by working on it--}}
						{{--</h1>--}}
						{{--<h3 class = "h3-black" style = "margin-bottom:4%">--}}
							{{--Develop your potential by your passion and our techology--}}
						{{--</h3>--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class="row center col-lg-8 col-lg-offset-4 text-center">--}}

					{{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}" id="loginform">--}}
						{{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

						{{--<div class = "col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-lg-4 col-lg-offset-0  " style=" ">--}}
							{{--<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email"--}}
								   {{--autofocus=""--}}
								   {{--style="height:50px; background-color: transparent;">--}}
						{{--</div>--}}


						{{--<div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-lg-1 col-lg-offset-0" style="text-align: center; ">--}}
							{{--<a href={{url('auth/register/student')}} class="btn btt btn-primary btn-block" style="min-height: 50px;min-width:100px; background-color: transparent;float:left; font-family:'Roboto'">Sign Up</a>--}}
						{{--</div>--}}

					{{--</form>--}}

					{{--<div class="clear"></div>--}}
				{{--</div>--}}
				{{--<div class="clear"></div>--}}




			{{--</div>--}}

			<section class = "center content" style = "border-bottom:solid 1px #eee">
				<h1 class ="h1-black-solid">Let the job find you!</h1>
				<p class = "subtitle">
					Showcase your pontential to the world
				</p>
				<div class="container">
					<div class = "row"  >
						<!-- arrow -->
					</div>
					<div class="row">
						<div class = "col-lg-12" style = "margin-top:5%;/*height:800px*/;">

							<div class = "col-lg-3   col-xs-12 hiden" style = "  ">
								<img src = "img/Target.png">
								<h3>Job Assignment</h3>
								<p>
									Your will be assigned a project based on your current skill sets.
								</p>
							</div>

							<div class = "col-lg-4 col-lg-offset-1 col-xs-12 hiden" style = " ">
								<img src = "img/resumes.png">
								<h3>Resume Building</h3>
								<p>
									The projects you complete will be apart of your portfolio for employers to see.
								</p>
							</div>

							<div class = "col-lg-3 col-lg-offset-1 col-xs-12 hiden" style = " ">
								<img src = "img/Mentorship.png">
								<h3>Mentorship</h3>
								<p>
									Obtain guidance by our seasoned software developers.
								</p>
							</div>


						</div>
					</div>
					<div class="row" style = "margin-top:5%">
						<div class = "col-lg-12" >

							<div class="col-xs-8 col-xs-offset-2 frame">
								<div class = "col-xs-10 col-xs-offset-1 col-lg-10 ">
									<div id="drawcanvas" class="screen">&nbsp;</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>



			<section class = "content">

				<div>

					<div style = "min-height:300px;padding-top:3%">


						<div class = "col-xs-12 col-lg-12" style = "text-align:center">
							<h1 class = "bigfont">
								JOIN US NOW
							</h1>

							<p style = "color:grey;text-align:center">

							</p>

							<a href={{url('auth/register')}} class = "start"><h3>Click Start</h3><a/>

						</div>
					</div>
				</div>


			</section>
			<footer>
				<small style = "font-size: 15px;">©2015 by Shokse</small>
				{{--<img src = "img/wheelbarrow.png" style = "height: 40px;margin-left: 30%;">--}}
				{{--<small style = "font-size: 15px;margin-left:1%">Shokse 2015</small>--}}
			</footer>
		</div>

	</div>
	<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/post/jquery.js"></script>
	<script type="text/javascript" src="/js/post/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/post/lightbox.min.js"></script>
	<script type="text/javascript" src="/js/post/wow.min.js"></script>
	<script type="text/javascript" src="/js/post/main.js"></script>
</body>
</html>
