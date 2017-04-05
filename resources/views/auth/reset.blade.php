<!DOCTYPE html>
<html lang="en">
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href=" {{asset('css/landing/style.css') }}">
		
		
		
        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
       
		<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300' rel='stylesheet' type='text/css'>


		@yield('addheader')

     
    </head>
	<body>

		



<div class="container-fluid">
	<div class="row" style="margin: 10% 0 0 0;">
		<div class="col-md-8 col-md-offset-2">
			<div class="">
				<h2>Reset Password</h2>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.
							
						</div>
					@endif

					<form id="resetform" class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								{!! $errors->first('email', '<label class="error" for="email">:message</label>') !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" id="password">
								{!! $errors->first('password', '<label class="error" for="password">:message</label>') !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						<div class="form-group">
							<div class ="col-md-12" style = "margin-top:3%; text-align: center;">
								<button type="submit" class="btn submit-btn">Reset</button>
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script src="{{asset('js/jquery.validate.js') }}"></script>
</body>
</html>
<!-- form validation script-->
<script>

$(document).ready(function() {		
	$('#resetform').validate({

			focusInvalid: false, 
		   
			rules: {
				
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
					equalTo: "#password"
				}
						
			},
			 messages: {
				
				email: {
					required: 'Please enter email'
				},
				password: {
					required: 'Please enter password'
				},
				password_confirmation: {
					required: 'Please enter confirm password',
					equalTo: 'Please enter same as password'
				},	
			}
		});	
	});
</script>

