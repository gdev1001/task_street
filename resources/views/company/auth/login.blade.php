@extends('company.main')

	@section('body')
		<div class="layout-app">
			<!-- row-app -->
			<div class="row row-app">
				<!-- col -->
				<!-- col-separator.box -->
				<div class="col-separator col-unscrollable box">
					<!-- col-table -->
					<div class="col-table">
						<h4 class="innerAll margin-none border-bottom text-center"><i class="fa fa-lock"></i> Login to your Account</h4>
						<!-- col-table-row -->
						<div class="col-table-row">
							<!-- col-app -->
							<div class="col-app col-unscrollable">
								<!-- col-app -->
								<div class="col-app">
									<div class="login">
										<div class="placeholder text-center">
											<i class="fa fa-lock"></i>
										</div>
										<div class="panel panel-default col-sm-6 col-sm-offset-3">
										  <div class="panel-body">
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
										  	<form role="form" action="{!! URL::route('company.doLogin')!!}" method="post">
										  		<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
											  	<div class="form-group">
												    <label for="exampleInputEmail1">Email address</label>
												    <input type="email" class="form-control" name="email" placeholder="Enter email">
												</div>
											  	<div class="form-group">
											    	<label for="exampleInputPassword1">Password</label>
											    	<input type="password" class="form-control" name="password" placeholder="Password">
											  	</div>
											  	<button type="submit" class="btn btn-primary btn-block">Login</button>
											</form>
										  </div>
										</div>
										<div class="col-sm-4 col-sm-offset-4 text-center">
											<div class="innerAll">
												<a href="{!! URL::route('company.signup')!!}" class="btn btn-info">Create a new account? <i class="fa fa-pencil"></i> </a>
												<div class="separator"></div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<!-- // END col-app -->
							</div>
							<!-- // END col-app.col-unscrollable -->
						</div>
						<!-- // END col-table-row -->
					</div>
					<!-- // END col-table -->
				</div>
				<!-- // END col-separator.box -->
			</div>
			<!-- // END row-app -->	
		</div>
	@stop

@stop