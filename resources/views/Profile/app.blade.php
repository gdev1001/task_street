<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shokse</title>
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="icon" href="img/ICON-shokse.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{asset('/css/landing/font.css')}}>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Preloader -->

    <!-- Icon Font-->
    <link rel="stylesheet" href={{asset('/css/landing/owl.carousel.css')}}>
    <link rel="stylesheet" href={{asset('css/landing/owl.theme.default.css')}}>
    <!-- Animate CSS-->
    <link rel="stylesheet" href={{asset('css/landing/animate.css')}}>

    <!-- Bootstrap -->

    <link rel="stylesheet" href={{asset('css/wiki/style.css')}}>
    <link href={{asset("/css/circle.css")}} rel="stylesheet">

    <!-- Style -->
    {{--<link href="css/style.css" rel="stylesheet">--}}
    @yield('addheader')
    <!-- Responsive CSS -->
    <link href={{asset('css/landing/responsive.css')}} rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/lte-ie7.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>




       <header>
            <nav class="navbar navbar-default">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button> 
                  <a class="navbar-brand" href="#" style = "margin-top:0"><img src="img/LOGO-shokse-web.png" alt="" style = "height:30px"></a>
                </div>
         
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a href="{{ url('/profile') }}">Dashboard</a></li>
                    <li><a href="{{ url('/project') }}">Find Project</a></li>
                    <li><a href="{{ url('/resume') }}">Resume</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Account setting</a></li>
                        <li><a href="/auth/logout">Logout</a></li>
                      </ul>
                    </li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>            
        </header>


    @yield('content')


            <!-- Scripts -->


<script>
    $("li").click(function(){
        $("li").removeClass("active")
        $(this).addClass('active');
    });
</script>

@yield('script')



</body>
</html>
