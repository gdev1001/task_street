@extends('company.main') 
	@section('body')
	<div class="container-fluid menu-hidden">
		@include('company.sidebar')
		<div id="content">
			@include('company.header')
			<div class="innerLR">
				<div class="separator"></div>
				<div class="lead center innerTB">
					<h2>Applications</h2>
				</div>
				<div class="heading-buttons innerLR box">
					<h4 class="margin-none innerTB pull-left">Applicants</h4>

					<div class="clearfix"></div>
				</div>
				<div class="row">
					@if(is_array($userProjects) || is_object($userProjects))

						@foreach($userProjects as $user)

							<div class="col-md-4 detail" >
							<div class="innerAll">
								<div class="widget widget-body-gray margin-none">	
									<div class="widget-body ">
										<div class="innerL">
											<div class="separator bottom"></div>
											<div class="glyphicons glyphicon-large group">
												<i></i>
												<h4>{{ $user->user->name }}</h4>
												<h5>{{ $user->user->email }}</h5>
												<h5>{{ App\userProject::where('student_id',$user->id)->where('project_id',$project->id)->get()->last()->status == "true" ? 'Not Allowed' : 'Allowed' }}</h5>
												
												<div class="row">
													<form role="form" action="{!! URL::route('company.question.store')!!}" method="POST" >
														<input type="hidden" name="project_id" value="{{ $project->id }}"/>
														<input type="hidden" name="user_id" value="{{ $user->id }}"/>
														<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
														
														<p id="desc">
														--------------------------------------------------------------------------------<br></br>
														@if($project->questions !== null)
															@foreach ($project->questions as $key => $questionItem)
																<b>Question{{ $key + 1 }}:</b>&nbsp;&nbsp;{{ $questionItem->question }}<br></br>
																<b>Answer{{ $key+ 1 }}:</b>&nbsp;&nbsp;{{ $questionItem->answers()->where('user_id', $user->id)->firstOrFail()->answer }}<br></br>
															@endforeach
														@endif
															<button class="btn btn-primary">
																<i class="fa fa-fw fa-check-square-o"></i> I agree
															</button>
														</p>
														
													</form>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach

					@else
					<h3>No user applied to this task<h3>
					@endif
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

			$(document).ready(function(){
                
            	$('p').hide();
                
                $('.detail').click(function(){
                    $(this).toggleClass("expand");
                    $(this).find("#desc").toggle();
                });
                
            });
            
        </script>
