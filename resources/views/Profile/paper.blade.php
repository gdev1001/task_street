@extends('app')

@section('addheader')
    <link href="{{ asset('css/xlab.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap-flatly.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flex.css') }}" rel="stylesheet">

    <link href="{{ asset('css/resume.css') }}" rel="stylesheet">


    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300' rel='stylesheet' type='text/css'>

@endsection


@section('content')
    <div class = "page">

        <div class = "container">

            <div class = "row">

                <div class = "col-md-5 personal">
                    <div>
                        <h4 class = "subtitle">PERSONAL STATEMENT</h4>
                        <p style = "text-align: justify">
                           Resume is current locked till your first task completed.
                        </p>
                    </div>

                    <div style ="margin-top:14%">
                        <h4 class = "subtitle">SKILL SET</h4>
                        @include('Profile.skills')
                    </div>

                    <div style = "margin-top:14%">
                        <h4 class = "subtitle">TEAM REVIEW</h4>
                            <div class = "col-md-4 col-md-offset-1" style = "text-align: center">
                                <img src="{{asset('img/smile.png')}}" style = "opacity: 0.5">
                                <h5>Friendly</h5>
                                <p>0</p>

                                <img src="{{asset('img/excellent.png')}}" style = "opacity: 0.5">
                                <h5>Excellent</h5>
                                <p>0</p>

                            </div>
                            <div class = "col-md-4 col-md-offset-1" style = "text-align: center">
                                <img src="{{asset('img/friendly.png')}}" style = "opacity: 0.5">
                                <h5>Teamwork</h5>
                                <p>0</p>

                                <img src="{{asset('img/oppsite.png')}}" style = "opacity: 0.5">
                                <h5>Oppsite</h5>
                                <p>0</p>


                            </div>
                    </div>



                </div>

                <div class = "col-md-6 col-md-offset-1 experience">
                    <h4 class = "subtitle" >EXPERIENCE</h4>
                    <div class = "col-md-1 side">
                        <img class = "arrow" src="{{asset('img/arrow-up.png')}}">
                        <br>
                        <img class = "point" src="{{asset('img/point.png')}}">
                        <br>
                        <svg height="20" width="5" style = "margin-left: 2px;margin-top: -6px;">
                            <line x1="0" y1="0" x2="0" y2="20" style="stroke:rgb(99,99,99);stroke-width:4" />
                        </svg>
                        <br>

                    </div>

                    <div class = "col-md-10">
                        @include('Profile.experience')
                    </div>

                    <div class = "header" style = "cursor:pointer">
                        <span class = "glyphicon glyphicon-chevron-down"></span>
                    </div>

                    <div class = "col-md-10 col-md-offset-1 content" style = "display:none">
                        @include('Profile.experience')
                    </div>



                </div>

                <div class = "col-md-6 col-md-offset-1 education">
                    <h4 class = "subtitle" >EDUCATION</h4>
                    <div class = "col-md-1 education-arrow">
                        <span class ="glyphicon glyphicon-chevron-right"></span>
                    </div>

                    <div class = "col-md-5">
                        <h5>University Of California Irvine</h5>
                    </div>
                </div>

                <div class = "col-md-6 col-md-offset-1 reference">
                    <h4 class = "subtitle" >REFERENCE</h4>
                    <div class = "col-md-12">
                        {{--<div class = "col-md-4 reference-text">--}}
                            {{--<h4>Michle Mah</h4>--}}
                            {{--<p>Project Management at Accenture</p>--}}
                        {{--</div>--}}

                        {{--<div class = "col-md-8 reference-content">--}}
                            {{--<p>"Muamer is an extraordinary freelancer with great skills. Done 4-5 Projects with him, never had a complaint"</p>--}}
                        {{--</div>--}}


                    </div>

                    {{--<div class = "col-md-12">--}}
                        {{--<div class = "col-md-4 reference-text">--}}
                            {{--<h4>Michle Mah</h4>--}}
                            {{--<p>Project Management at Accenture</p>--}}
                        {{--</div>--}}

                        {{--<div class = "col-md-8 reference-content">--}}
                            {{--<p>"Muamer is an extraordinary freelancer with great skills. Done 4-5 Projects with him, never had a complaint"</p>--}}
                        {{--</div>--}}


                    {{--</div>--}}

                    {{--<div class = "col-md-12">--}}
                        {{--<div class = "col-md-4 reference-text">--}}
                            {{--<h4>Michle Mah</h4>--}}
                            {{--<p>Project Management at Accenture</p>--}}
                        {{--</div>--}}

                        {{--<div class = "col-md-8 reference-content">--}}
                            {{--<p>"Muamer is an extraordinary freelancer with great skills. Done 4-5 Projects with him, never had a complaint"</p>--}}
                        {{--</div>--}}


                    {{--</div>--}}

                    <P>Q</P>


                </div>



            </div>

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


    <script>
        $(".header").click(function () {

            $header = $(this);
            //getting the next element
            $content = $header.next();
            //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
            $content.slideToggle(500, function () {
                //execute this after slideToggle is done
                //change text of header based on visibility of content div
                $header.text(function () {
                    //change text based on condition
                });
            });

        });

    </script>

@endsection
