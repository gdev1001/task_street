@extends('wiki.tmp_header')
@section('content')



        <title>Shokse</title>
        <link rel="stylesheet" type="text/css" href="/animate.css">
<!--        <link rel="stylesheet" type="text/css" href="/css/wiki/app.css">
 -->        <link rel="stylesheet" type="text/css" href={{asset('css/wiki/wiki.css')}}>
<!--                <link rel="stylesheet" type="text/css" href={{asset('css/wiki/animate.css')}}>
 -->
<!--        <link href="{{ asset('css/bootstrap-flatly.css') }}" rel="stylesheet">
 --><!--     <link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/font-awesome.min.css")}}>
     <link rel="stylesheet" type="text/css" href={{asset("/fonts/fontawesome-webfont.woff?v=4.0.3 ")}}> -->
        <link href="{{ asset('css/wiki/style.css') }}" rel="stylesheet">
        @yield('styles')



        <script src="/pace.min.js"></script>
        <script src="{!! url('js/landing/jquery-1.12.2.min.js') !!}"></script>
        <script src="{!! url('js/expertise/bootstrap/bootstrap.min.js') !!}"></script>

        

        <div class="container-fluid fill" style = "margin-top:10%">
                <h1 style = "font-family:'Dosis',sans-serif;text-transform:uppercase;letter-spcacing:5px;font-weight:500;text-align:center">{{$projectname}}</h1>
        <div class = "col-md-10 col-md-offset-1">
            <div class="col-sm-3 col-md-2 navigation-bar" style = "padding-top:10%;background-color:transparent">
<!--                <h3>Documentation</h3>
 -->
                <nav style = "color:rgba(48, 111, 167, 0.88)">
                    <ul class="nav nav-pills nav-stacked">
                        <li>                    
                            <div class="single_progress_bar">

                            @if($name[0] == "1")
                                <a href={{url("/".$name."/wiki")}} style = "font-size:17px;color:#777"><p>Mini-Task</p></a>     
                            @else
                                <a href={{url("/".$name."/wiki")}} style = "font-size:17px;color:#777"><p>Project</p></a>   
                            @endif
                            <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @foreach($pages as $orphan)
                        <li>
                            <a href= {{url("/".$name."/wiki/".$orphan->id)}} style = "font-size:15px;color:#777">{{ $orphan->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-sm-9 col-md-10 fill content animated fadeIn" style = "padding-top:3%">
                @yield('contentPane')
            </div>
        </div>  
        </div>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
        <!-- <script src="{!! url('libs/summernote/summernote.js') !!}"></script> -->
        @yield('scripts')
@endsection