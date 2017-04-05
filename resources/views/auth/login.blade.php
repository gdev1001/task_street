
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

              <!-- Collect the nav links, forms, and other content for toggling -->

                 <div class="col-xs-12 my-account pull-rigth">
                   <a href="/auth/register" class="btn btn-my-account sign-up-btn">Sign Up</a>
                 </div>
                </div><!-- /.navbar-collapse -->
              </div>
            </div><!-- /.container-fluid -->
          </nav>
        </header><!-- header -->
		@if (count($errors) > 0)
			<div class="alert alert-danger alert-top">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if (Session::has('alert-error'))
				<div class="alert alert-danger alert-top">{{ Session::get('alert-error') }}</div>
		@endif
		
		@if (Session::has('alert-success'))
				<div class="alert alert-info alert-top">{{ Session::get('alert-success') }}</div>
		@endif
		
		
		
		@if (Session::has('alert-email-verify'))
			<div class="alert alert-danger alert-top">
				{{ Session::get('alert-email-verify') }} 
				<a href="{{ url('/auth/resend_activation') }}" class="dropdown-toggle" ><strong>Click Here</strong></a> to Resend Activation email
			</div>
		@endif
		
		@if (Session::has('alert-email-activate'))
			<div class="alert alert-danger alert-top">{{ Session::get('alert-email-activate') }}</div>
		@endif
		
		
        <main class="register login">
          <div class="container clearfix">
            <div class="col-xs-12 col-sm-6 login-container">
             <div class="form-block form-block-login">
                <h3>Login</h3>
				<form class="form-horizontal" id="loginform" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">                  
						<div class="form-group">
                    		<label for="exampleInputEmail1">Email Address</label>
                    		<input type="email" class="form-control" id="exampleInputEmail1" placeholder="info@domain.com"  name="email" value="{{ old('email') }}">
                  		</div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control reguired" placeholder="******" type="password" name="password" id="exampleInputPassword1" name="password">
                  </div>
                  <div class="form-group">
                    <div class="checkbox-inline checkbox_f"> 
                      <input id="checkbox1" class="checkbox-custom" name="remember" type="checkbox" checked="">
                      <label for="checkbox1" class="checkbox-custom-label">Remember Me</label> 
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 sign-up ">
                    <button type="submit" class="btn submit-btn">Login</button>
                  </div> 
                  <div class="col-xs-12 col-md-8 sign-up">
                    <p>Don’t have an account? <a href="/auth/register">Sign Up Now</a></p>
                  </div> 
                </form>
              </div><!-- form-block -->
            </div>

            <div class="col-xs-12 col-sm-6">
              <div class="form-block form-block-login">
                <h3>Forgot Your Password?</h3>
                <span>Reset Here</span>
				@if (session('status'))
					<div class="alert alert-success alert-top">{{ session('status') }}</div>
				  
				@endif
				<!-- validate email and send reset password to user-->
                <form id="forgetpassword" class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email"  name="email" class="form-control" id="exampleInputEmail1" placeholder="info@domain.com">
					
                  </div>
                  <div class="col-xs-12 sign-up ">
                    <button type="submit" class="btn submit-btn">Reset</button>
                  </div> 
                </form>
              </div><!-- form-block -->
            </div>
          </div>

        </main><!-- main -->

        

      </div><!-- container-fluid -->
	     <script src="{{asset('js/landing/jquery-1.12.2.min.js') }}"></script>
      <script src="{{asset('js/landing/bootstrap.min.js') }}"></script>
      <script src="{{asset('js/landing/owl.carousel.min.js') }}"></script>
      <script src="{{asset('js/landing/jquery.scrollTo-1.4.3.1.js')}}"></script>
	    <script src="{{asset('js/landing/script.js') }}"></script>
    </body>
</html>
<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('js/jquery.validate.js') }}"></script>
<script>

$(document).ready(function() {		
	$('#loginform').validate({

			focusInvalid: false, 
		   
			rules: {
				
				email: {
					required: true
				},
				password: {
					required: true,
				}
						
			},
			 messages: {
				
				email: {
					required: 'Please enter email'
				},
				password: {
					required: 'Please enter password'
				}
			}
		});	
	});
	
$(document).ready(function() {		
	$('#forgetpassword').validate({

			focusInvalid: false, 
		   
			rules: {
				
				email: {
					required: true
				}
						
			},
			 messages: {
				
				email: {
					required: 'Please enter register email'
				}
			}
		});	
	});	
</script>