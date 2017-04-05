<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Shokse Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- stylesheets -->
    <link rel="stylesheet" type="text/css" href={{asset("css/expertise/compiled/theme.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/animate.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/brankic.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/ionicons.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/font-awesome.min.css")}}>
     <link rel="stylesheet" type="text/css" href={{asset("/fonts/fontawesome-webfont.woff?v=4.0.3 ")}}>
          <link rel="stylesheet" type="text/css" href={{asset("/fonts/fontawesome-webfont.woff?v=4.0.3 ")}}>


    <!-- javascript -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src={{asset("js/expertise/vendor/jquery-1.12.3.min.js")}}></script>
    <script src={{asset("js/expertise/bootstrap/bootstrap.min.js")}}></script>
    <script src={{asset("js/expertise/vendor/jquery.cookie.js")}}></script>
    <script src={{asset("js/expertise/theme.js")}}></script>
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/select2.css")}} >
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/select2-bootstrap.css")}} >
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/datepicker.css")}} >
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/jquery.minicolors.css")}} >
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/summernote.css")}} >

	<!-- javascript -->
	
	<script src={{asset("js/expertise/vendor/select2.min.js")}}></script>
	<script src={{asset("js/expertise/vendor/bootstrap-datepicker.js")}}></script>
	<script src={{asset("js/expertise/vendor/jquery.validate.min.js")}}></script>
	<script src={{asset("js/expertise/vendor/summernote.min.js")}}></script>
	<script src={{asset("js/expertise/vendor/jquery.raty.js")}}></script>
	<script src={{asset("js/expertise/vendor/jquery.minicolors.min.js")}}></script>
	<script src={{asset("js/expertise/vendor/jquery.maskedinput.js")}}></script>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @yield('header')
</head>



<body id="projects">
    <div id="wrapper">
        <div id="sidebar-default" class="main-sidebar">
            <div class="current-user">
                <a href="index.html" class="name">
                    <span class="avatar letter">{{Auth::user()->name[0]}}</span>
                    <span>
                        {{Auth::user()->name}}
                    </span>
                </a>
            </div>
            <div class="menu-section">
                <h3>General</h3>
                <ul>
                    <li>
                        <a href="{!! URL::route('expertise')!!}">
                            <i class="ion-android-earth"></i>
                            <span>Manage Project</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-section">
                <h3>Account</h3>
                <ul class="menu">
                    <li>
                        <a href="account-profile.html">Account settings</a>
                    </li>
                    <li>
                        <a href="account-billing.html">Billing</a>
                    </li>
                    <li>
                        <a href="account-notifications.html">Notifications</a>
                    </li>
                    <li>
                        <a href="account-support.html">Help / Support</a>
                    </li>
                    <li>
                        <a href="/auth/logout">Sign out</a>
                    </li>
                </ul>
            </div>
            <div class="bottom-menu hidden-sm">
                <ul>
                    <li><a href="#"><i class="ion-help"></i></a></li>
                    <li>
                        <a href="#">
                            <i class="ion-archive"></i>
                            <span class="flag"></span>
                        </a>
                        <ul class="menu">
                            <li><a href="#">5 unread messages</a></li>
                            <li><a href="#">12 tasks completed</a></li>
                            <!-- <li><a href="#">3 features added</a></li> -->
                        </ul>
                    </li>
                    <li><a href="signup.html"><i class="ion-log-out"></i></a></li>
                </ul>
            </div>
        </div>

        @if(Session::has('flash_message'))
            <div class="alert alert-warning fade in" style = "text-align:center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>{{Session::get('flash_message')}}!</p>
            </div>
        @endif

        <div id="content">@yield('content')</div>

        </div>


         <script type="text/javascript">
		    $(function() {
		        var $projects = $(".project");

		        $projects.each(function(index, el) {
		            var $btn = $(el).find(".add-more");
		            var $menu = $btn.siblings(".menu");
		            var timeout;

		            $btn.click(function(e) {
		                e.preventDefault();
		            });

		            $(el).on("mouseenter", ".add-more, .menu", function() {
		                clearTimeout(timeout);
		                timeout = null;
		                $menu.addClass("active");
		            });

		            $(el).on("mouseleave", ".add-more, .menu", function() {
		                timeout = setTimeout(function() {
		                    $menu.removeClass("active");
		                }, 400);
		            });
		        })
		    });
		</script>


    </body>

</html>

