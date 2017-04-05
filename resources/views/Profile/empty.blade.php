@extends('Profile.app')
@section('content')
	
	<link href="{{ asset('css/bootstrap-flatly.css') }}" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src={{asset('js/bootbox.min.js')}}></script>
	
	@if ($user->projects)

		<div class="row" style="margin-top:10%">
			@foreach ($user->projects as $project)

			@if (App\userProject::where('student_id',$user->id)->where('project_id',$project->id)->get()->last()->status)
					<div class="col-sm-12">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="alert alert-success text-center"><b>{{$project->name }}</b> is allowed. Click <a data-id="{!! $project->project_id !!}" onclick="startProject(this);" style="cursor: pointer;">here</a> to start project.</div>
						</div>
					</div>
				@else
					<div class="col-sm-12">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="alert alert-danger text-center">{{ $project->name }} is not allowed yet.</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	@endif
	<div class="row">
		<div class="col-md-12" style = "text-align:center" >

			<img src="{{asset('img/lock.png')}}" style = "opacity:0.6;margin-top:2%">
			<h3> Start working on projects now!</h3>
				<a href = "{{url('/project')}}">
			<button class="btn btn-default btn-lg" style = "margin-top:1%">Look for projects</button>
			</a>

		</div>
	</div>



@endsection

