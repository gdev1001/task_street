<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shokse</title>


    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="icon" href="img/ICON-shokse.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">


    <!-- Bootstrap -->
    <link href={{asset('assets/css/bootstrap.min.css')}} rel="stylesheet">

    <!-- <link rel="stylesheet" href={{asset('css/wiki/style.css')}}> -->
    <link href={{asset("assets/css/circle.css")}} rel="stylesheet">

    <!-- Style -->

    <!-- Responsive CSS -->
    <link href={{asset('assets/css/wiki.css')}} rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->


    @yield('style');
</head>

<body>
<?php
    $notif = \Notice::text()->all();
    $uid = Auth()->user()->id;
    $count = count(\Notice::text()->unread());
?>




<header id="HOME" style="background-position: 50% -125px;">
    <div class="section_overlay">
        <nav class="navbar navbar-default navbar-fixed-top" style = "background-color:white">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a  href="#" ><img class = "logo" src={{asset('/img/LOGO-shokse-web.png')}} alt="" style = "height:39px"></a>
            </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/lazy') }}">Create Project</a></li>
                        <li><a href="{{ url('/client/manage') }}">Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-bubbles4"></i>
                                <span class="visible-xs-inline-block position-right">Messages</span>
                                @if($count>0)<span class="badge bg-warning-400">{{ $count }}</span>@endif
                            </a>

                            <div class="dropdown-menu dropdown-content width-350">
                                <div class="dropdown-content-heading">
                                    Notifications
                                    <span class="pull-right">
                                        <a href="/allread/{{ Auth::user()->id }}">Mark all as read</a>
                                    </span>
                                </div>

                                <ul class="media-list dropdown-content-body">
                                    @foreach($notif as $item)
                                    <?php if ($item->status === 0) $back = '#eee'; else $back = '#fff'?>
                                    <li class="media" style="background-color: {{ $back }}">
                                        <div class="media-left">
                                            <img src="/assets/profiles/{{ $item->sender->id }}.png" class="img-circle img-sm" alt="">
                                        </div>

                                        <div class="media-body">
                                            <a href="#" class="media-heading">
                                                <span class="text-semibold">{{ $item->sender->name }}</span>
                                                <span class="media-annotation pull-right">{{ $item->created_at }}</span>
                                            </a>

                                            <span class="text-muted">{!! html_entity_decode($item->message) !!}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="dropdown-content-footer">
                                    <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                                </div>
                            </div>
                        </li>                        
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>

    </div>
</header>


    @yield('content')



            <!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>


<script>
    $("li").click(function(){
        $("li").removeClass("active")
        $(this).addClass('active');
    });
</script>

@yield('script')



</body>
</html>