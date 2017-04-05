@extends('app')

@section('addheader')
    <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Raleway:200,300' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="{{asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-2.1.3.min.js') }}"></script>

@stop

@section('content')
<div class="container" style = "margin-top:5%;">


	<div class="row">
			<div class = "col-xs-12" style ="text-align:-webkit-center;">
				<h1 style = "font-family:Raleway;font-size:-webkit-xxx-large;">Adam Republic</h1>
			</div>
    </div>
    <div class="row" style = "margin-bottom:8%">
			<div class = "col-xs-12" style ="text-align:-webkit-center">
				<h3 style = "text-transform: uppercase;font-size: small;font-weight:100;">
					A place connecting 
					talents . company . innovation
				</h3> 
       		</div>
    </div>

    <div class="row" style = "margin-left:30%">
        <a href="project">
    		<div class = "col-xs-2" id = "student">
    			<img src="{{asset('img/TestIcon.png')}}">
    		</div>
        </a>
    		<div class = "col-xs-2 col-xs-offset-2">
    			<img src="{{asset('img/TestIcon2.png')}}">
    		</div>

    		<div class = "col-xs-4" id = "description" style="margin-top: -3%;">
    			<div class = "col-xs-4">
    				<img src="{{asset('img/NewSkill.png')}}">
    				<img src ="{{asset('img/feedback.png')}}" style="margin-top: 14%;margin-left: 10%;">
    				<img src="{{asset('img/Resume.png')}}" style="margin-top: 14%;margin-left: 10%;">
    			</div>
    			<div class = "col-xs-8">
    				<h4>Learn by doing</h4>
    				<h4 style="margin-top: 30%;">Experience new trends</h4>
    				<h4 style="margin-top: 30%;">Building your resume</h4>
    			</div>
    		</div>
    </div>



    <div class="row" style = "margin-top:8%"> 
       		<div class = "col-xs-12 center">
       			<div style ="border: solid 1px;display: inline; font-weight:100">
       				<h2><a href="{{ url('project') }}">Welcome {{Auth::user()->name}}</a></h2>
       			</div>
       		</div>
	</div>

</div>

<script>
$(document).ready(function(){
	
   $("#student").hover(function(){
        $('#description').animate({opacity:1});
    },

    function(){
	$("#description").animate({opacity:0});
	});
	

});
</script>

@endsection