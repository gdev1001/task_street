@extends('expertise.main')
	@section('content')

<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Tasks Details
				</div>
			</div>
			<header>
				<a href="#" onclick="history.go(-1);return false;">
					← Back
				</a>
				<!-- <a class="pull-right" href="edit-task.html">Edit</a> -->
			</header>
			<div class="content-wrapper clearfix">
				<div class="row">
					<div class="col-md-12 task-view">
						<div class="task-name">
							<h3>Task Name:</h3>
							<h4>{{$task->name}}</h4>
						</div>
						<hr />
						<div class="task-spf-description">
							<h3>Task Specific Description:</h3>
							<p>{{$task->description}}</p>
						</div>
						<hr />
						<div class="task-details">
							<h3>Task Input:</h3>
							<p>{{$task->input}}</p>

							
						</div>

						<div class="task-details">
							<h3>Task Output:</h3>
							<p>{{$task->output}}</p>

							
						</div>

						<hr />
						<div class="task-developers">
							<h3>Developer:</h3>
							<div class="members">
						<!-- 		<a href="#"><img src="images/avatars/3.jpg" alt="Developers Name" class="img-circle" title="John Doe"/></a>
								<a href="#"><img src="images/avatars/7.jpg" alt="Developers Name" class="img-circle" title="John Doe"/></a>
								<a href="#"><img src="images/avatars/14.jpg" alt="Developers Name" class="img-circle" title="John Doe"/></a>
								<a href="#"><img src="images/avatars/15.jpg" alt="Developers Name" class="img-circle" title="John Doe"/></a> -->
							</div>
						</div>
						<hr />
						<div class="task-docs">
							<h3>Task Documentation:</h3>
							<a href="{{url("/".$task->id."/wiki")}}">View Documentation</a>
						</div>
						<div class="task-action">

						</div>
					</div>
				</div>
			</div>
		</div>

	@endsection