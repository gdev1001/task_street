<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shokse</title>
    <meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
    <meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
    <meta name="author" content="Codrops" />

    <link href="{{ asset('css/bootstrap-flatly.css') }}" rel="stylesheet">

    <script src="{{asset('js/projectView/jquery.js')}}" ></script>


    <link rel="stylesheet" type="text/css" href="{{ asset('css/post/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/post/main.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/post/demo.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/post/component.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/post/cs-select.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/post/cs-skin-boxes.css') }}" />
    <script src="{{asset('js/post/modernizr.custom.js') }}" ></script>

</head>
<body>

<div class="container choice">

<div class="col-md-12 text-center fs-form-wrap">
    <div class="fs-title ">
       	<img src = "{{asset('img/Logo.png')}}" style = "height:80px;opacity:0.6"></img>

        <h1>Account</h1>
    </div>
    <div class="col-md-5 fs-form" style = "top: 32%;margin: 0 auto;text-align:center">
        <div class="text-muted">
        	
             <div><img src = "{{asset('img/home/clients.png')}}" style = "height:150px;"></img></div>
            <div class="o-user-type-selection"><h2>I do not have an account yet</h2></div>
        </div>
        <p style = "font-size:20px">
            Register an account now
        </p>
        <a id = "register" class="btn btn-warming text-capitalize m-0" style = "margin-top:8%;font-weight:600">REGISTER</a>
    </div>

    <div class="col-md-2 o-or-divider fs-form" style = "top: 32%;margin: 0 auto;"></div>

    <div class="col-md-5 fs-form" style = "top: 32%;margin: 0 auto;text-align:center">
        <div class="text-muted">
                	
            <div><img src = "{{asset('img/home/fly.png')}}" style = "height:150px;"></img></div>
            <div class="o-user-type-selection"><h2>I am already a shokse user</h2></div>
        </div>
        <p style = "font-size:20px">
           Login into my account
        </p>
        <a id = "loginto" class="btn text-capitalize m-0" style = "margin-top:8%;font-weight:600">LOGIN</a>
    </div>
</div>

</div>

<div class="container hide register">

    <div class="fs-form-wrap" id="fs-form-wrap">
        <div class="fs-title ">
            <h1>Project Worksheet</h1>
        </div>
        <form id="register" action="{{ url('/auth/register') }}" role="form" method="post" class="fs-form fs-form-full" autocomplete="off">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" name = "state" value = "company">


            <ol class="fs-fields">
                <li>
                    <label class="fs-field-label fs-anim-upper" for="q1">Enter your email address</label>
                    <input class="fs-anim-lower" id="username" name="email" type="email" placeholder="Email address" required/>
                </li>
                <li>
                    <label class="fs-field-label fs-anim-upper" for="q2">Enter your a user name</label>
                    <input class="fs-anim-lower" id="q2" name="name" type="text" placeholder="User name" required/>
                </li>
                <li>
                    <label class="fs-field-label fs-anim-upper" for="q3" data-info="We won't send you spam, we promise...">Enter your password</label>
                    <input class="fs-anim-lower" id="password" name="password" type="password" placeholder="password" required/>
                    <input class="fs-anim-lower" id="confirm_password" name="password_confirmation" type="password" placeholder="confirm password" required style = "margin-top:3%"/>
                    <span id='message'></span>
                </li>

            </ol><!-- /fs-fields -->
            <button class="fs-submit fs-continue" id="registersubmit" type="submit" style = "position:fixed;right:10%;bottom:10%">register</button>
        </form><!-- /fs-form -->
    </div><!-- /fs-form-wrap -->

    <!-- Related demos -->

</div><!-- /container -->


<div class="container hide login">

    <div class="fs-form-wrap" id="fs-form-login">
        <div class="fs-title ">
            <h1>Project Worksheet</h1>
        </div>
        <form id="login" action="{{ url('/auth/login') }}" role="form" method="post" class="fs-form fs-form-full" autocomplete="off">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" name = "state" value = "company">


            <ol class="fs-fields">
                <li>
                    <label class="fs-field-label fs-anim-upper" for="q1">Enter your email address</label>
                    <input class="fs-anim-lower" id="q1" name="email" type="email" placeholder="Machine Learning" required/>
                </li>
                <li>
                    <label class="fs-field-label fs-anim-upper" for="q3" data-info="We won't send you spam, we promise...">Enter your password</label>
                    <input class="fs-anim-lower" id="password" name="password" type="password" placeholder="password" required/>
                </li>

            </ol><!-- /fs-fields -->
            <button class="fs-submit fs-continue" id="loginsubmit" type="submit" style = "position:fixed;right:10%;bottom:10%">login</button>
        </form><!-- /fs-form -->
    </div><!-- /fs-form-wrap -->

    <!-- Related demos -->

</div><!-- /container -->


<script src="{{asset('js/post/fullscreenFormReg.js')}}"></script>
<script src="{{asset('js/post/selectFx.js')}}"></script>
<script src="{{asset('js/post/classie.js')}}"></script>


<script>
    (function() {
        formWrap = document.getElementById( 'fs-form-wrap' );
        formWrap2 = document.getElementById( 'fs-form-login' );


        [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
            new SelectFx( el, {
                stickyPlaceholder: false,
                onChange: function(val){
                    document.querySelector('span.cs-placeholder').style.backgroundColor = val;
                }
            });
        } );


    })();
</script>

<script>
    $(document).ready(function() {
        $("#register").click(function(){
            if($(".register").hasClass("hide")){
                $(".register").removeClass("hide");
                window.globalVar = "register";
                new FForm( formWrap, {
                    onReview : function() {
                    }
                });
            }

            $(".choice").addClass("hide");
        });

        $("#loginto").click(function(){
            if($(".login").hasClass("hide")){
                $(".login").removeClass("hide");
                window.globalVar = "login";
                new FForm( formWrap2, {
                    onReview : function() {
                    }
                });
            }

            $(".choice").addClass("hide")
        });

        $('#confirm_password').on('keyup', function () {
            if ($(this).val() == $('#password').val()) {
                $('#message').html('matching').css('color', '#fff');
            } else $('#message').html('not matching').css('color', '#eb7e7f');
        });
    });

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $(function() {
        $("#username").keyup(function() {
            // getting the value that user typed
            var checkString    = $("#username").val();
            // forming the queryString
            var data            = 'user='+ checkString;
            if(validateEmail(checkString)) {
                // if checkString is not empty
                if (checkString) {
                    // ajax call
                    $.ajax({
                        type: "GET",
                        url: "/checked/{email}",
                        data: {email: checkString},
                        success: function (response) { // this happen after we get result
                            $(".fs-message-error").html(response.result);
                            $(".fs-message-error").addClass('fs-show');

                        }
                    });
                }
            }
            return false;
        });
    });



</script>


</body>
</html>
