<!DOCTYPE html>
<html lang="en">
<!-- use @section('title') to add page title -->
<title>@yield('title', 'Shokes')</title>
<!-- page header section start -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- bootstrap v3.3.7 css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- font awesome 4.6.3 css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('img/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('img/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('img/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('img/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('img/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!-- page header section end -->

<!-- header notification count start -->
<?php
    $notif = \Notice::text()->all();
    $uid = Auth()->user()->id;
    $count = count(\Notice::text()->unread());
?>
<!-- header notification count end -->

<!-- page body start -->
<body class="management-page">
	<!-- header managment start -->
	<header class="header-management">
		<!-- container-fluid start -->
		<div class="container-fluid">
			<div class="col-xs-12 col-sm-4">
				<div class="header-right">
				<!-- header logo start -->
				<div class="header-right-img hidden-xs">
					<img class="management-header-img" src="{{asset('img/management-header-img.png')}}">
				</div>
				<!-- header logo end -->
				</div>
			</div>
		</div>
		<!-- navigation bar start -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="col-xs-12 col-sm-4 header-right">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-management-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span></button>
						<a class="navbar-brand" href="#"><img src="{{asset('img/logo.png')}}" alt="Logo"></a>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="col-xs-12 col-sm-8">
					<!-- navbar-collapse start -->
					<div class="collapse navbar-collapse" id="bs-management-navbar-collapse-1">
						<div class="col-xs-12 col-sm-6 menu-list-container menu-right-list">
							<ul class="nav navbar-nav">
								<li><a href="{{ url('/client/manage')}}">MANAGEMENT</a></li>
								<!-- header notification start -->
								<li class="management-message"> <span id="bell" class="count-message-wrapper"><span class="count-message">{{ $count }}</span> <i class="fa fa-bell-o" aria-hidden="true"></i> </span>
									<ul class="new-message" style="display:none">
										@foreach($notif as $item)
										<?php if ($item->status === 0) $back = '#eee'; else $back = '#fff'?>
										<li class="new-message-item" style="background-color: {{ $back }}">
											<div class="col-xs-2 pensil"><img src="{{asset('img/pen-2.png')}}" alt=""></div>
											<div class="col-xs-10 new-message-item-content">
												<p>
													<span>{{ $item->sender->name }}</span>{!! html_entity_decode($item->message) !!}
												</p>
												<span>{{ $item->created_at }}</span>
											</div>
											<i class="fa new-message-close fa-times" aria-hidden="true"></i>
										</li>
										@endforeach
									</ul>
								</li>
								<!-- header notification end -->
								<li><a href="{{ url('/auth/logout') }}"><img src="{{asset('img/logout-icon.png')}}" alt="logout-icon"> LOGOUT</a></li>
							</ul>
						</div>
					</div>
					<!-- navbar-collapse end -->
				</div>
			</div>
			<!-- container-fluid end -->
		</nav>
		<!-- navigation bar end -->
	</header>
	<!-- header management end -->

<!-- use @section('content') to add page contents -->
@yield('content')

<!-- javascript block start -->
<script type="text/javascript">
    $("li").click(function(){
        $("li").removeClass("active");
        $(this).addClass('active');
    });
</script>
<!-- javascript block end -->

<!-- jquery-2.1.3.min js -->
<script src="{!! Request::root().'/assets/js/jquery-2.1.3.min.js' !!}"></script>
<!-- bootstrap v3.3.7 js -->
<script src="{!! Request::root().'/assets/js/bootstrap.min.js' !!}"></script>
<!-- Select2 4.0.3 js -->
<script src="{!! Request::root().'/assets/js/select2.min.js' !!}"></script>
<!-- custom script js -->
<script src="{!! Request::root().'/assets/js/script.js' !!}"></script>

<!-- use @section('script') to add page contents -->
@yield('script')

</body>
<!-- page body end -->
</html>
