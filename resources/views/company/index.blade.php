@extends('main')
	@section('body')
		<div class="container-fluid menu-hidden main" style = "height:100%">
			@include('admin.sidebar')
			<div id="content" style = "height:100%">
				@include('header')

			</div>
		</div>
	@stop
	
	@section('custom-scripts')
		
	@stop
@stop
