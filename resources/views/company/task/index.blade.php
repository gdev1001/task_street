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
														<h4 class="margin-none innerTB pull-left">Task</h4>
														<a href="{!! URL::route('task.create')!!}" class="btn-xs pull-right btn btn-primary"><i class="fa fa-fw fa-plus"></i> Add task</a>
														<div class="clearfix"></div>
													</div>
													<!-- // Total bookings & sort by options END -->
													
													<!-- Table -->
													<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
														<thead>
															<tr>
																<th class="center">Number</th>
																<th class="center">Name</th>
																<th class="center">Description</th>
																<th class="center">EstimateTime</th>
																<th class="center">Sequence</th>
																<th class="center" style="width: 150px;">Actions</th>
															</tr>
														</thead>
														<tbody>
															@foreach ($tasks as $key => $task)
					                                            <tr>
					                                                <td>{{ $key + 1 }}</td>
					                                                <td>{{ $task->name }}</td>
					                                                <td>{{ $task->description }}</td>
					                                                <td>{{ $task->estimateTime }}</td>
					                                                <td>{{ $task->sequence }}</td>
					                                                
					                                                <td class="center">
																		<div class="btn-group btn-group-sm">
																			<a href="{!! URL::route('task.edit', $task['id']) !!}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
																			<a data-url="{!! URL::route('task.delete', $task->id)!!}" onclick="deleteTask(this);" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
																		</div>
																	</td>
					                                            </tr>
                                       					 	@endforeach
														</tbody>
													</table>
													<!-- // Table END -->
													<!-- Pagination -->
													
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
