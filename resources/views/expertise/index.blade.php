@extends('admin.main')
	@section('body')
		<div class="container-fluid menu-hidden">
			@include('admin.sidebar')
			<div id="content">
				@include('admin.header')
				
			</div>
		</div>
	@stop
	
	@section('custom-scripts')
		
	@stop
@stop
