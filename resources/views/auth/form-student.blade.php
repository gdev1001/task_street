<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="{{asset('css/landing/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href=" {{asset('css/landing/style.css') }}">
        <link rel="stylesheet" href="{{asset('css/landing/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{asset('css/landing/owl.theme.default.min.css') }}">
	</head>
  	<body class="inner">
      <div class="container-fluid">

        <header>
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="col-xs-12 col-sm-4 header-right">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="/"><img src="/img/LOGO-shokse-web.png" alt="Logo"></a>
                </div>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="col-xs-12 col-sm-8">
                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <div class="col-xs-12 col-sm-6 menu-list-container">
                    
                 </div>

                 <div class="col-xs-12 col-sm-6 my-account">
                   <a href="/auth/login" class="btn btn-my-account">My Account</a>
                 </div>
                </div><!-- /.navbar-collapse -->
              </div>
            </div><!-- /.container-fluid -->
          </nav>
        </header><!-- header -->

        <main class="register">
          <div class="container">
            <div class="col-xs-12 headingTop">
              <h3 class="col-sm-6 ">Start working on cool projects</h3>
			 @if (Session::has('alert-error'))
				<div class="alert alert-info col-sm-6 spacing">{{ Session::get('alert-error') }}</div>
			@endif
			
            </div>
						
			
            <div class="col-sm-6 hidden-xs">
             <div class="developer-block">
                <img class="img-responsive" src="/img/developer.png" alt="">
                <div class="description">
                  <h2>Developer</h2>
                  <p></p>
                </div><!-- description -->
             </div>
            </div><!-- developer-block -->
           		
            <div class="col-xs-12 col-sm-6 form-container">
              <div class="form-block">
                <h2>Register</h2>
                <span>Please fill the form below</span>
               <form class="form-horizontal" id = "form2" role="form" method="POST" action="{{ url('/auth/register') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                    <input type="hidden" name = "state" value = "student">                  
                   <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="We’re Designers Design Studio" name="name">
					{!! $errors->first('name', '<label class="error" for="exampleInputEmail1">:message</label>') !!}
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control reguired" id="exampleInputEmail1" placeholder="info@dom|" name="email">
					{!! $errors->first('email', '<label class="error" for="exampleInputEmail1">:message</label>') !!}
					
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" placeholder="******" type="password" name="password" id="exampleInputPassword1"  name="password">
					{!! $errors->first('password', '<label class="error" for="exampleInputEmail1">:message</label>') !!}
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="******" name="password_confirmation">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputSkillSet1">Select Skill Set</label>
                    <select class="form-control" type="text" multiple = "multiple" id = "skill_list" name="skill">
                      <option value = "FrontEnd">Web development</option>
                      <option value = "FrontEnd">Frontend development</option>
                      <option value = "machine learning">Machine Learning</option>
                    </select>
					
					{!! $errors->first('skill', '<label class="error" for="exampleInputEmail1">:message</label>') !!}
					
                  </div>
                  <button type="submit" class="btn submit-btn">Register</button>
                </form>
              </div>
            </div><!-- form-block -->
          </div>

        </main><!-- main -->

        

      </div><!-- container-fluid -->
	  <script src="{{asset('js/landing/jquery-1.12.2.min.js') }}"></script>
      <script src="{{asset('js/landing/bootstrap.min.js') }}"></script>
      <script src="{{asset('js/landing/owl.carousel.min.js') }}"></script>
      <script src="{{asset('js/landing/jquery.scrollTo-1.4.3.1.js')}}"></script>
       <script src="{{asset('js/landing/script.js') }}"></script>
	   <script src="{{asset('js/jquery.validate.js') }}"></script>
    </body>
</html>

<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('js/jquery.validate.js') }}"></script>
<!-- form validation script-->
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
					//minlength : 6
				},
				password_confirmation: {
					required: true,
					pass:true,
					equalTo: "#exampleInputPassword1"
				},
				skill: {
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
				skill: {
					required: 'Please select option'
				},
				password_confirmation: {
					required: 'Please enter confirm password',
					equalTo: 'Please enter same as password'
				},	
			}
		});	
	});
</script>