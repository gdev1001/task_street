@extends('app')
@section('content')

    <style>
        html{height:100%}
        body{height:100%;background:white !important;}
        .navbar-default{background-color:transparent !important;}
    </style>



    {{--<link href="/css/progress/bootstrap.min.css" rel="stylesheet">--}}
    <link href="/css/progress/font-awesome.min.css" rel="stylesheet">
    <link href="/css/progress/lightbox.css" rel="stylesheet">
    <link href="/css/progress/main.css" rel="stylesheet">
    <link href="/css/progress/responsive.css" rel="stylesheet">
    <link href="/css/progress/animate.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/projectView/html5shiv.js"></script>
    <script src="js/projectViewrespond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="img/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">

    <!--/#header-->


    {
            <!--/#action-->

    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">


                <div class="col-sm-4 col-sm-offset-2">
                    <div class="project-name overflow">
                        <h2 class="bold">{{$task->name}}</h2>
                        <hr>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-clock-o"></i>{{$task->created_at->diffForHumans()}}</a></li>
                            <li><a href="#"><i class="fa fa-tag"></i>Branding</a></li>
                        </ul>
                    </div>
                    <div class="project-info overflow">
                        <h3>Project Info</h3>
                        <p>{{$task->description}}</p>
                        <ul class="elements" style = "margin-left:5%">
                            {{--@foreach($project->tasks as $task)--}}
                                {{--<li><i class="fa fa-angle-right"></i>Description</li>--}}
                            {{--@endforeach--}}
                        </ul>
                    </div>
                    <div class="skills overflow">
                        <h3>Skills:</h3>
                        <ul class="nav navbar-nav navbar-default">
                            @foreach($task->skill as $skill)
                            <li><a href="#"><i class="fa fa-check-square">  {{$skill->name}}</i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="client overflow">
                        <h3>Client:</h3>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-bolt"></i>Post person</a></li>
                        </ul>
                    </div>
                    @if(!$user->tasks->contains($task->id))
                    <div class="live-preview">
                        <a id = {{$task->id}} href="#" class="btn btn-common uppercase join">Apply</a>
                    </div>
                   @endif

            </div>

                <div class="col-sm-4 col-sm-offset-1 ">
                    <div class="project-info overflow">
                        <h3>Input</h3>
                        <hr>
                        <p  style = "color:gray">
                        {{$task->input}}
                        </p>

                    </div>
                    <div class="project-info overflow">
                        <h3>Onput</h3>
                        <hr>
                        <p  style = "color:gray">
                            {{$task->output}}
                        </p>
                    </div>

                    @if($user->tasks->contains($task->id))

                    <hr>
                    <div class="project-info overflow ">
                        <a class = "btn btn-common uppercase join" href ={{ url("/". $task->id. "/wiki")}}><h4>Project Detail</h4><img src="{{asset('img/wiki.png')}}" style = "height:50px"></a>
                    </div>
                    @endif
                   
                </div>
        </div>
    </section>
    <!--/#portfolio-information-->

   

    <script>
        $(function(){
            var $ppc = $('.progress-pie-chart'),
                    percent = parseInt($ppc.data('percent')),
                    deg = 360*percent/100;
            if (percent > 50) {
                $ppc.addClass('gt-50');
            }
            $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
            $('.ppc-percents span').html(percent+'%');
        });
    </script>


    <script type="text/javascript" src="/js/projectView/jquery.js"></script>
    <script type="text/javascript" src="/js/projectView/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/projectView/lightbox.min.js"></script>
    <script type="text/javascript" src="/js/projectView/wow.min.js"></script>
    <script type="text/javascript" src="/js/projectView/main.js"></script>

    <script>

    $(function(){
    $('.join').click(function(){
        $.ajax({
            url: '/project/testUrl/{id}',
            type:'GET',
            data:{id:this.id},
            success: function(response)
                {
                    location.reload()
                }
            });

        });
    });

    </script>
    </div >


@endsection
