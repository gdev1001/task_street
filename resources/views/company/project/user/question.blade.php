@extends('company.main') 
	@section('body')
	<div class="container-fluid menu-hidden">
		@include('company.sidebar')
		<div id="content">
			@include('company.header')
			<div class="innerLR">
				<div class="separator"></div>
				<div class="lead center innerTB">
					<h2>User</h2>
				</div>
		
				<div class="row"><?php print_r($answers);exit;?>
					@foreach ($answers as $key => $answer)
						<div class="col-md-4">
							<div class="innerAll bg-white">
								<div class="widget widget-body-gray margin-none">
									<div class="widget-body ">
										<div class="innerL">
											<div class="separator bottom"></div>
											<div class="glyphicons glyphicon-large group">
												<i></i>
												<h4>{{ $answer->answer }}</h4>
												<h5>{{ $answer->project_question->question}}</h5>
												<p><br> <a href=""></a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				
			</div>
		</div>
	</div>
	@stop 
	@section ('scripts')
	<script type="text/javascript">
	            function deleteTask(obj) {
	                bootbox.confirm('Are you sure?', function(result) {
	                    if (result) {
	                        location.href=$(obj).attr('data-url');
	                    }
	                });    
	            }
	        </script>
	@stop 
@stop
