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
							<h2 class="heading">Create Project</h2>
						</div>
						<!-- // Widget heading END -->
						
						<div class="widget-body">
							<div class="innerLR">
								<form class="form-horizontal" action="{!! URL::route('project.store') !!}" role="form" method="post">
								<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
								    <div class="form-group">
								        <label for="name" class="col-sm-2 control-label">Name</label>
								        <div class="col-sm-10">
								            <input type="text" class="form-control" name="name" placeholder="Project name">
								        </div>
								    </div>
								    <div class="form-group">
								        <label for="" class="col-sm-2 control-label">Description</label>
								        <div class="col-sm-10">
								            <textarea name="description" cols="95" rows="5" placeholder="Description"></textarea>
								        </div>
								    </div>
								    <div class="form-group">
								        <label for="" class="col-sm-2 control-label">Skills</label>
								        <div class="col-sm-10">
								            <input type="text" class="form-control" name="skills" placeholder="Skills">
								        </div>
								    </div>
								    <div class="form-group">
								        <label for="" class="col-sm-2 control-label">Environment</label>
								        <div class="col-sm-10">
								            <input type="text" class="form-control" name="environment" placeholder="Environment">
								        </div>
								    </div>
								    <div class="form-group">
								        <label for="" class="col-sm-2 control-label">Difficulty</label>
								        <div class="col-sm-10">
								            <input type="text" class="form-control" name="difficulty" placeholder="Difficulty">
								        </div>
								    </div>
								    
								    <div class="form-group">
								        <label for="" class="col-sm-2 control-label">Status</label>
								        <div class="col-sm-10">
								            <input type="text" class="form-control" name="status" placeholder="Status">
								        </div>
								    </div>
								    <div class="form-group">
								        <div class="col-sm-4 col-sm-offset-4">
								            <button type="submit" class="btn btn-primary">Register</button>
								            <a href="{!! URL::route('project') !!}" class="btn btn-info pull-right margin-bottom-xs">Cancel</a>
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
	
	@section('custom-scripts')
		
	@stop
@stop
