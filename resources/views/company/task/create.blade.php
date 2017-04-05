@extends('company.main')
	@section('body')
		<div class="container-fluid menu-hidden">
			@include('company.sidebar')
			<div id="content">
				@include('company.header')
				<div class="col-sm-10 col-sm-offset-1" >
					<div class="widget row widget-inverse">
	
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading">Create Task</h4>
						</div>
						<!-- // Widget heading END -->
						
						<div class="widget-body">
							<div class="innerLR">
								<form class="form-horizontal" action="{!! URL::route('task.store') !!}" role="form" method="post">
								<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="projectId" value="{!! $projectId !!}">
								    <div class="form-group">
								        <label for="name" class="col-sm-2 control-label">Task Name</label>
								        <div class="col-sm-10">
								            <input type="text" class="form-control" name="name" placeholder="Task name">
								        </div>
								    </div>

								    <div class="form-group">
								        <label for="" class="col-sm-2 control-label">Description</label>
								        <div class="col-sm-10">
								            <textarea name="description" cols="95" rows="5" placeholder="Description"></textarea>
								        </div>
								    </div>

								    <div class="form-group">
								        <label for="" class="col-sm-2 control-label">Start Time</label>
								        <div class="col-sm-3">
								            <input type="date" class="form-control" name="Start Time" placeholder="Estimate Time">

								        </div>
										<label for="" class="col-sm-2 control-label">End Time</label>
										<div class="col-sm-3">
											<input type="date" class="form-control" name="Ending time" placeholder="Estimate Time">
										</div>
								    </div>



								    <div class="form-group">
								        <label for="" class="col-sm-2 control-label">Sequence</label>
								        <div class="col-sm-10">
								            <input type="number" class="form-control" min = "1" name="sequence" placeholder="Sequence">
								        </div>
								    </div>

									<div class = "form-group">
										<label for="" class="col-sm-2 control-label">Skill</label>
										<div class="col-sm-10">
											<select type="text" multiple = "multiple" id = "skill_list" class="form-control" name="skill" placeholder="select the skills">
											<option disabled = "disabled" value = "FrontEnd">Frontend development</option>
												<option value = "5">javascript</option>
												<option value = "3">Html</option>
												<option value = "6">Python</option>
												<option value = "7">PHP</option>
											<option disabled = "disabled" value = "FrontEnd">Frontend development</option>
												<option value = "3">Mysql</option>
												<option value = "4">C</option>
												<option value = "1">Java</option>
											</select>
										</div>
									</div>
								    
								    <div class="form-group">
								        <div class="col-sm-4 col-sm-offset-4">
								            <button type="submit" class="btn btn-primary">Register</button>
								            <a href="{!! URL::route('task') !!}" class="btn btn-info pull-right margin-bottom-xs">Cancel</a>
								        </div>
								    </div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@stop

	@section('footer')
		<script>
			$('#skill_list').select2({
				placeholder:'Choose the talents',
				tags:true
			});
		</script>


	@stop

	@section('custom-scripts')
		
	@stop
@stop
