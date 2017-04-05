@extends('expertise.main') 
	@section('content')
	<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Project Tasks
				</div>
				<a href="new-task.html" class="btn btn-success pull-right">
					<span>Add Task</span>
				</a>
			</div>

			<div class="content-wrapper clearfix">
			<?php if(isset($message)) { ?>
				<div class="row alert alert-info">
						<span><?php echo $message;?></span>
				</div>
			<?php } ?>
				<div class="row project-list">
					<div class="project new">
						<a href="{!! URL::route('expertise.task.create', $projectId) !!}">
							<i class="ion-ios7-plus-outline"></i>
							<span class="info">
								Create a New Task
							</span>
						</a>
					</div>


					@foreach ($tasks as $key => $task)
					@if($task->pages->where("main","1")->first())
					{{-- */$pageid = $task->pages->where("main","1")->first()->id/* --}}
					@else
					{{-- */$pageid = 0/* --}}
					@endif
					<div class="project">
						<div class="info">
							<div class="name"><a href="{{url('/'.$projectId.'/wiki/'.$pageid)}}">{{ $task->name }}</a></div>
<!-- 							<div class="category">Design & Development</div>
 -->							<div class="last-update">
								Last updated 3 hours ago
							</div>

							<br/>
							<p>{{ $task->description }}</p>
							<div class="project-budget">
								<p><strong>Budget:&nbsp;&nbsp;</strong>${{$task->budget}}</p>
							</div>
							<div class="project-done-date">
								<p><strong>Completion Date:&nbsp;&nbsp;</strong>{{date('F d, Y',strtotime($task->created_at)+172800)}}</p>
							</div>
							<div class="project-status">
								<strong>Status:&nbsp;&nbsp;</strong>
								<label class="label label-primary">Working</label>
								@if($task->submission->last())
									@if($task->submission->last()->validated == 1)
										<label class="label label-warning">Waiting for approval</label>
									@else
									<label class="label label-primary">In Progress</label>
									@endif
								@endif				
								@if($task->status == 1)
									<label class="label label-warning">Waiting for accept</label>
								@endif				
							</div>
							<br/>
							
						</div>
						<div class="members">
							<a href="#" class="add-more">
								<i class="fa fa-plus"></i>
							</a>
							<ul class="menu">
								<li><a href="{!! URL::route('expertise.task.edit', $task['id']) !!}"> Edit</a></li>
								<li><a href="{!! URL::route('expertise.task.delete', $task->id)!!}">Delete</a></li>
								@if($task->submission->last())
									@if($task->submission->last()->validated == 1)
								<li> <a href="{!! URL::route('expertise.task.download', $task->id)!!}">Download</a></li>
								<li> <a href="{!! URL::route('expertise.task.validate', $task->id)!!}">Validating</a></li>
								<li> <a data-url="{!! URL::route('expertise.task.delete', $task->id)!!}">Deny</a></li>
									@endif
								
								@endif							
								@if($task->status == 1)
									@foreach ($task->applied_students()->get() as $app_user)
									<li> <a href="{!! URL::route('expertise.task.accept', [$task->id, $app_user->id])!!}">Accept For {{$app_user->user->name}}</a></li>
									@endforeach
									<li> <a href="{!! URL::route('expertise.task.reject', $task->id)!!}">Reject</a></li>
								@endif							
							</ul>
						</div>
					</div>
					@endforeach					
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$(function () {
			var $projects = $(".project");

			$projects.each(function (index, el) {
				var $btn = $(el).find(".add-more");
				var $menu = $btn.siblings(".menu");
				var timeout;

				$btn.click(function (e) { e.preventDefault(); });

				$(el).on("mouseenter", ".add-more, .menu", function () {
					clearTimeout(timeout);
					timeout = null;
					$menu.addClass("active");
				});

				$(el).on("mouseleave", ".add-more, .menu", function () {
					timeout = setTimeout(function () {
						$menu.removeClass("active");
					}, 400);
				});
			})
		});
	</script>

	@endsection
