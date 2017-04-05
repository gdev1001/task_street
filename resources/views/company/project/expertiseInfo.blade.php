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
													<div class="heading-buttons innerLR box">
														<h4 class="margin-none innerTB pull-left">Expertise Information</h4>
														<a href="{!! URL::route('project')!!}" class="btn-xs pull-right btn btn-primary" style="margin-right: 10px;">
															<i class="fa fa-fw icon-turn-back-left"></i> Go project
														</a>
														<div class="clearfix"></div>
													</div>
													<!-- // Total bookings & sort by options END -->
													
													<!-- Table -->
													<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
														<thead>
															<tr>
																<th class="center">Number</th>
																<th class="center">Name</th>
																<th class="center">Email</th>
																<th class="center" style="width: 150px;">Actions</th>
															</tr>
														</thead>
														<tbody>
															@foreach ($expertises as $key => $expertise)
					                                            <tr>
					                                                <td class="center">{{ $key + 1 }}</td>
					                                                <td class="center">{{ $expertise->expertise->name }}</td>
					                                                <td class="center">{{ $expertise->expertise->email }}</td>
					                                                
					                                                <td class="center">
																		<div class="btn-group btn-group-sm">
																			<a href="{!! URL::route('project.expertiseTask', array($projectId,$expertise['expertise_id'])) !!}" class="btn btn-default"><i class="fa fa-eye"></i></a>
																		</div>
																	</td>
					                                            </tr>
                                       					 	@endforeach
														</tbody>
													</table>
													<!-- // Table END -->
													<!-- Pagination -->
													<div class="row center">
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
