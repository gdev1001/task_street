<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Please follow the link below to verify your email address<br>
			
			Please <a href="{{ URL::to('auth/register/verify/'.$confirmation_code) }}">click here</a> verify
            
        </div>
		 <p>Best regards</p>
    </body>
</html>