@extends('expertise.main')
	@section('body')
		<div class="container-fluid menu-hidden">
			@include('expertise.sidebar')
			<div id="content">
				@include('expertise.header')
				<div class="col-sm-10 col-sm-offset-1" >
					<div class="widget row widget-inverse">
	
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading">Edit Task</h4>
						</div>
						<!-- // Widget heading END -->
						
						<div class="widget-body">
							<div class="innerLR">
								<form class="form-horizontal" action="{!! URL::route('expertise.task.update') !!}" role="form" method="post">
								<input type="hidden" name="task_id" value="{!! $tasks->id !!}">
								<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
			                       @foreach ([
			                       		'name' => 'Task Name',
			                            'description' => 'Description',
			                            'start_time' => 'Start Time',
			                            'end_time' => 'End Time',
			                            'sequence' => 'Sequence',
			                            'skill' => 'Skill',
			                        ] as $key => $value)
			                        <div class="form-group">
		                                <div class="col-sm-2">
		                                    <label class="col-sm-2 control-label">{!! Form::label($key, $value) !!}</label>
		                                </div>
		                                <div class="col-sm-10">
		                                	@if ($key === 'description') 
		                                		{!! Form::textarea($key, $tasks->{$key}, ['class' => 'form-control'], ['size' => '95x5']) !!}
		                                	@elseif ($key === 'skill')
		                                		{!! Form::select($key, array(
		                                			'Frontend development' => array('Javascript','Css','Angular js','Ember.js','Vue.js'), 
		                                			'Backend develoment' => array('Node.js','Python','Ruby','Laravel')),
		                                			$tasks->{$key}, ['class' => 'form-control']) !!}                         
		                                    @elseif ($key === 'sequence')
		                                        {!! Form::text($key, $tasks->{$key}, ['class' => 'form-control']) !!}
		                                    @elseif ($key === 'name')
		                                        {!! Form::text($key, $tasks->{$key}, ['class' => 'form-control']) !!}
		                                
		                                	@elseif ($key === 'start_time')
		                                		<div class="input-group">
													{!! Form::text($key, $tasks->{$key}, ['class' => 'form-control']) !!}
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
		                                    @elseif ($key === 'end_time')
		                                		<div class="input-group">
													{!! Form::text($key, $tasks->{$key}, ['class' => 'form-control']) !!}
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div> 
		                                    @endif
		                                </div>
			                        </div>
			                        @endforeach
			                        <div class="row margin-bottom-xs">
			                            <div class="col-sm-4 col-sm-offset-4">
			                                <button type="submit" class="btn btn-default margin-bottom-xs" style="margin-left: 34%;" >Register</button>
			                                <a href="{!! URL::route('expertise', $tasks->project_id) !!}" class="btn btn-info pull-right margin-bottom-xs">Cancel</a>
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
		<script src="/assets/plugins/forms_elements_bootstrap-datepicker/js/bootstrap-datepicker.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		
		<script type="text/javascript">
			if (typeof $.fn.bdatepicker == 'undefined')
				$.fn.bdatepicker = $.fn.datepicker.noConflict();
	
			$(function()
			{
	
				/* DatePicker */
				// default
				$("#datepicker1").bdatepicker({
					format: 'yyyy-mm-dd',
					startDate: "2013-02-14"
				});
	
				// component
				$("#datepicker2").bdatepicker({
					format: 'yyyy-mm-dd',
					startDate: "2013-02-14"
				});
	
				// other
				if ($('#datepicker').length) $("#datepicker").bdatepicker({ showOtherMonths:true });
				if ($('#datepicker-inline').length) $('#datepicker-inline').bdatepicker({ inline: true, showOtherMonths:true });
	
			});
		</script>
	@stop
