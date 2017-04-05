@extends('question.main')
	@section('body')
		<div class="layout-app">

			<!-- row-app -->
			<div class="row row-app">
				<!-- col -->
				<!-- col-separator.box -->
				<div class="col-separator col-unscrollable box">
					
					<!-- col-table -->
					<div class="col-table">
						
		
						<!-- col-table-row -->
						<div class="col-table-row">
		
							<!-- col-app -->
							<div class="col-app col-unscrollable">
		
								<!-- col-app -->
								<div class="col-app">
		
									<div class="login">
										
										<div class="placeholder text-center"><i class="fa fa-pencil"></i></div>
										<div class="col-sm-6 col-sm-offset-3">
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
						                </div>
										<div class="panel panel-default col-sm-6 col-sm-offset-3">
		
										  	<div class="panel-body">
										  		
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
		</div>
	@stop
@stop