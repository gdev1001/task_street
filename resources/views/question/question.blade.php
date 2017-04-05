														
@extends('company.main')
	@section('body')
		<div class="container-fluid menu-hidden">
			@include('company.sidebar')
			<div id="content">
				@include('company.header')
				<div class="col-table-row">
					<div class="col-app col-unscrollable">
						<div class="col-app">
							<div class="col-table">
								<div class="col-separator-h box"></div>	
								<div>   
	                                @if ($errors -> has())
	                                    <div class="alert alert-danger alert-dismissibl fade in">
	                                        <button type="button" class="close" data-dismiss="alert">
	                                            <span aria-hidden="true">&times;</span>
	                                            <span class="sr-only">Close</span>
	                                        </button>
	                                        @foreach ($errors -> all() as $error)
	                                            <p>{{ $error }}</p>		
	                                        @endforeach
	                                    </div>
	                                @endif 
	            			        
	                                @if (isset($alert)) 
	                                    <div class="alert alert-{!! $alert['type'] !!} alert-dismissibl fade in">
	                                        <button type="button" class="close" data-dismiss="alert">
	                                            <span aria-hidden="true">&times;</span>
	                                                <span class="sr-only">Close</span>
	                                        </button>
	                                        <p>
	                                            {!! $alert['msg'] !!}
	                                        </p>
	                                    </div>
	                                @endif 
	                            </div>
								<div class="col-table-row">
									<div class="row-app">
										<div class="col-md-12">
											<div class="col-separator box bg-gray">
												<div class="innerAll bg-white">
													<!-- Total bookings & sort by options -->
													<h4 class="margin-none innerTB pull-left">Question and Answer</h4>
													<div class="user-action user-action-btn-navbar pull-right">
														<div class="heading-buttons innerLR box">
															<a href="{!! URL::route('company.question')!!}" class="btn btn-sm btn-navbar-right btn-primary">
																<i class="fa fa-fw fa-arrow-right"></i>
																<span class="menu-left-hidden-xs"> Back</span>
															</a>
															<div class="clearfix"></div>
														</div>
													</div>
													<!-- // Total bookings & sort by options END -->
													
													<!-- Table -->
													<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
														<thead>
															<tr>
																<th class="center">Number</th>
																<th class="center">Question</th>
																<th class="center">Answer</th>
															</tr>
														</thead>
														<tbody>
															@foreach ($answers as $key => $answer)
					                                            <tr>
					                                                <td class="center">{{ $key + 1 }}</td>
					                                                <td class="center">{{ $answer->project_question->question }}</td>
					                                                <td class="center">{{ $answer->answer }}</td>
					                                            </tr>
                                       					 	@endforeach	
														</tbody>
													</table>
													<!-- // Table END -->
													<!-- Pagination -->
													<div class="row center">
														<form role="form" action="{!! URL::route('company.question.store')!!}" method="POST" >
															<input type="hidden" name="project_id" value="{{ $projectId }}"/>
															<input type="hidden" name="user_id" value="{{ $userId }}"/>
															<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
															<button class="btn btn-primary">
																<i class="fa fa-fw fa-check-square-o"></i> I agree
															</button>
														</form>
													</div>
															
													<div class="clearfix"></div>
													<!-- // Pagination END -->
												</div>
												<div class="col-separator-h box"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@stop
	
	@section ('scripts') 
        <script type="text/javascript">
            function deleteProject(obj) {
                bootbox.confirm('Are you sure?', function(result) {
                    if (result) {
                        location.href=$(obj).attr('data-url');
                    }
                });    
            }
        </script>
    @stop
    
@stop
														