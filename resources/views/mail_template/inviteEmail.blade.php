<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>You're invited to join the Shoke team for {{$company_name}}</h2>

        <h4>Shokse is a messaging app for teams. It brings all your communication into one place, and it's available on both mobile and desktop.</h4>
        <h4>Also, it's fun to use!</h4>
        <h4>{{$client_name}} ({{$client_email}}) sent you this invitation.</h4>

        <a href="{{ URL::to('auth/auth/invite/'.$invitation_code) }}">Join Team</a>
        <p>You may copy/paste this link into your browser:</p>
        <a href="{{ URL::to('auth/auth/invite/'.$invitation_code) }}">{{ URL::to('auth/auth/invite/'.$invitation_code) }}</a>
    </body>
</html>