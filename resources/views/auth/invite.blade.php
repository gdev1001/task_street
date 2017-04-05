<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Shokse Registration</title>
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
		<link rel="stylesheet" type="text/css" href="/css/select2.min.css"/>

		<link href="/css/bootstrap.min.css" rel="stylesheet">
	</head>
    
	<body>
		<div class="registry">
			<header class="shokse-header block">
				<nav class="navbar container">
					<figure class="row">

						<figcaption class="navbar-header pull-left">
							<a class="navbar-brand" href="/"><img src="/images/shokse-footer-logo.png" class="img-responsive" alt="logo"/></a>
							<button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target="#mobileMenuCollapsing">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</button>
						</figcaption>
						<!-- /.navbar-header --> 
            
						<figcaption class="nav-menu-right pull-right">
            
							<figcaption id="mobileMenuCollapsing" class="collapse navbar-collapse">
								<ul class="nav navbar-nav main-menu">
									<li class="get-started"><button type="button" class="btn">My Account</button></li>
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
					<p>
						A platform that allows the companies and developers to work together seamlessly and happily. 
					</p>
					@if (Session::has('alert-email-activate'))
						<div><h4>{{ Session::get('alert-email-activate') }}</h4></div>
					@endif
					<div class="row">

						<div class="col-md-8 col-md-offset-4 thumb_sec2">
							<div id="carousel2" class="carousel slide reg_slide" data-ride="carousel">
								<!-- Indicators -->
								<!--
								<ol class="carousel-indicators">
									<li data-target="#carousel2" data-slide-to="0" class="active"></li>
									<li data-target="#carousel2" data-slide-to="1"></li>
									<li data-target="#carousel2" data-slide-to="2"></li>
								</ol>
								-->

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<div class="img12"><img src="/images/C54E7583-BC1A-468F-AAA3-71C009AB3826@3x.png"></div>
										<h3>Expert</h3>
										<p>Start working on projects you are interested in!</p>
										<a href="javascript:void(0)" class="get_s">Start</a>
									</div>
								</div>
							</div>


							<div class="dev_form_right">
								<h3>REGISTER</h3><div class="clearfix"></div>
								<p class="plz_fill">Please fill the form below.</p>
								<form class="form-horizontal" id ="form2" role="form" method="POST" action="{{ url('/auth/register') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">   
									<input type="hidden" name = "state" value = "expertise">
									<input type="hidden" name = "unique_key" value = "{{$unique_key}}">
									
									<div class="form-group">
										<label>NAME</label>
										<input type="text" name ="name" id ="exampleInputName1" class="in12" placeholder="We are Designers Design Studio">
										{!! $errors->first('name', '<label class="error" for="exampleInputName1">:message</label>') !!}
									</div>
									<div class="form-group">
										<label>EMAIL</label>
										<input type="email" name ="email" id ="exampleInputEmail2" class="in12" placeholder="info@companyname.com">
										{!! $errors->first('email', '<label class="error" for="exampleInputEmail1">:message</label>') !!}
										<p class="error" id="errEmail2"></p>
									</div>
									<div class="form-group">
										<label>PASSWORD</label>
										<input type="password" name ="password" id ="studentInputPassword1" class="in12" placeholder="*****">
										{!! $errors->first('password', '<label class="error" for="exampleInputPassword1">:message</label>') !!}
									</div>
									<div class="form-group">
										<label>CONFIRM PASSWORD</label>
										<input type="password" name ="password_confirmation" id ="exampleInputPassword2" class="in12" placeholder="*****">
									</div>
									<!--<div class="form-group">
										<label>SELECT SKILL SET</label>
										<input type="text" name ="skill" id ="skill_list" class="in12" placeholder="Web Design, Web Development, SEO">
										{!! $errors->first('skill', '<label class="error" for="skill_list">:message</label>') !!}
									</div>-->
									<div class="form-group">
										<label class="drop-select">SELECT SKILL SET</label>
										<select class="form-control m-bot15 js-example-basic-multiple" multiple="multiple" name="skill[]">

										    @if ($skill->count())

										        @foreach($skill as $skil)
										            <option value="{{ $skil->id }}">{{ $skil->name }}</option>    
										        @endforeach
										    @endif

										</select>
										<label class="error" for="skill[]"></label>
									</div>
									
									<div >
										<input class="get_submit" type="submit" value="Register">
									</div>
								
								</form>
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
    
    <script type="text/javascript">
       
	     jQuery("#carousel2 a.get_s").click(function(){
            jQuery(".thumbox1").addClass("devl");
            jQuery(".overlay123").show()
        });

        jQuery(".overlay123").click(function(){
          jQuery(".thumbox1").removeClass("devl");
          jQuery(".overlay123").hide()

        });
    </script>    
	</body>
</html>
<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="/js/select2.min.js"></script>
<script type="text/javascript">
	$(".js-example-basic-multiple").select2();
</script>
<!-- form validation script for student-->
<script>

$(document).ready(function() {	
 	
	$('#form2').validate({
			
			focusInvalid: false, 
		   
			rules: {
				name: {
					required: true
				},
				email: {
					required: true
				},
				password: {
					required: true,
					pass:true
				},
				password_confirmation: {
					required: true,
					pass:true,
					equalTo: "#studentInputPassword1"
				},
				"skill[]": {
					required: true
				},
						
			},
			 messages: {
				name: {
					required: 'Please enter name'
				},
				 
				email: {
					required: 'Please enter email'
				},
				
				password: {
					required: 'Please enter password'
				},
				"skill[]": {
					required: 'Please enter skill set'
				},
				password_confirmation: {
					required: 'Please enter confirm password',
					equalTo: 'Please enter same as password'
				},	
			}
		});	
	});
	
</script>
<!-- Ajax function to check unique email id-->

<script type="text/javascript">
   
	var emailflag = true;
				
		var email_val ="";	
		
		$('#exampleInputEmail1').keyup(function(e){
			$('#errEmail1').html('').html("The email has already been taken.").hide();
		});
		
		$('#exampleInputEmail2').keyup(function(e){
			$('#errEmail2').html('').html("The email has already been taken.").hide();
		});
		
		
		$('#exampleInputEmail1').blur(function(e){
			email_val = $("#exampleInputEmail1").val();
			check_email(email_val);
			
			if(emailflag==false){
				$('#errEmail1').html('').html("The email has already been taken.").show();
				return false;
			}
			else{
				$('#errEmail1').hide();
			}
		});
		$('#exampleInputEmail2').blur(function(e){
			email_val = $("#exampleInputEmail2").val();
			check_email(email_val);
			if(emailflag==false){
				$('#errEmail2').html('').html("The email has already been taken.").show();
				return false;
			}
			else{
				$('#errEmail2').hide();
			}
			
		});
		$("#form1").submit(function(e){
			email_val = $("#exampleInputEmail1").val();
			check_email(email_val);
			
			if(emailflag==false){
				e.preventDefault();
				$('#errEmail1').html('').html("The email has already been taken.").show();
				return false;
			}
			else{
				$('#errEmail1').hide();
			}
			
		});
		$("#form2").submit(function(e){
			email_val = $("#exampleInputEmail2").val();
			check_email(email_val);
			if(emailflag==false){
				e.preventDefault();
				$('#errEmail2').html('').html("The email has already been taken.").show();
				return false;
			}
			else{
				$('#errEmail1').hide();
			}
			
		});
	
	
	function check_email(email_val)
	{	
		$.ajax({
			url: '/auth/email_check/{email_val}',
			type:'GET',
			data:{email: email_val},
			async: false,
			success: function(response)
			{  
				if(response=="true"){
					emailflag =false;
					
				}
				else{
					emailflag =true;
				}
			}
		});
	}
	
	
</script>
