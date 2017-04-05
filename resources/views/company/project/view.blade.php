@extends('company.main')
@section('body')

	<div class="container-fluid menu-hidden" style = "height:100%">
		@include('company.sidebar',[[$projectId]])
		<div id="content" style = "height:100%">
			@include('company.header')
			<div class="innerLR" style = "padding-left:5%;height:60%;overflow: auto">
				<div class="separator"></div>
				<div class="lead center innerTB">
					<div class="row col-offset-2" >

						<h4 style = "color:grey;text-align:left"><span style = "font-weight:700;padding-bottom: 1%;border-bottom: grey 3px solid;">ON GOING</span> TASKS</h4>

						<div class="grid" >
							@foreach ($tasks as $key => $task)
								<div class="grid-item" style = "margin-top:5%">
									<div id ={{$task->id}} class="grid-item-content" style = "margin-top:0">
										<div style = "height: 30%;text-align: left;padding: 6%;">
											<div style = "border-bottom: solid #F1F3F2;position: absolute;top: 5%;height: 40px;left: 10%;width: 40%;">
												<h4 style = "font-weight:700;height:20px;color:gray;text-transform: UPPERCASE;">{{$task->type}}</h4>
												{{--<h5 style = margin-bottom:5%>Expire on 5 days</h5>--}}
											</div>
											<div class = "col-md-2 col-md-offset-5" style = "
                                             background-color: #F1F3F2;
                                             right: 0;
                                             position: absolute;
                                             top: 0;
                                             height: 25%;
                                             width: 19%;
                                             vertical-align: middle;
                                          ">
												<a href="/company/project/{{$projectId}}/task/edit/{{ $task->id }}"><h2 style = "text-align: center; padding: 16%; color: white; font-weight: 200; font-size: 40px;">+</h2></a>
											</div>

										</div>

										<div style = "height:40%">
											<h4 style = "
                                 /* padding: 5%; */
                                 left: 10%;
                                 position: absolute;
                                 color: #557586;
                              ">{{ $task->name }}</h4>
										</div>

										<div style = "height: 30%;background: #3DDAF3;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;text-align: left;color: white;font-weight: 500;padding: 5%;text-align: center;">
											<span class ="glyphicon glyphicon-send"> </span>
											<h5 style = "color:white;margin-left: 3%;display: inline;">Comment</h5>
										</div>

									</div>

								</div>


							@endforeach

						</div>
					</div>
				</div>
			</div>

			<h4 style = "margin-left: 5%;margin-top:4%;border-bottom: solid gray 3px;display: inline;position:fixed">DEVELOPER</h4>
		@foreach($tasks as $task)
				<div class = {{$task->id}} style = "position: FIXED;bottom:0;height: 19%;width: 100%;display:none;white-space: nowrap;overflow: scroll;padding-left: 1%;">
					<div>
					</div>
				@foreach($task->students as $student)
					<div class = "col-md-3" style = "margin-top:2%;margin-left:3%">
						<div class = "col-md-4">
							<img src="{{asset('img/profile1.png')}}" align="left" style="height:80px; width:80px">
						</div>
						<div class = "col-md-7">
							<h4 style = "margin-top: 10%;font-weight: 400;">{{$student->id}}</h4>
							<h5"> Computer science Major</h5>
						</div>
					</div>
				@endforeach

			</div>
			@endforeach


			@section ('scripts')

				<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.js"></script>

				<script type="text/javascript">
					function deleteTask(obj) {
						bootbox.confirm('Are you sure?', function(result) {
							if (result) {
								location.href=$(obj).attr('data-url');
							}
						});
					}

					$(document).ready(function() {

						$('.blog').click(function(){
							$(this).find("div.detail").toggleClass("show");
							$(this).find("div.detail_right").toggleClass("show");
						});

					});


					// external js: masonry.pkgd.js

					$(document).ready( function() {

						var $grid = $('.grid').masonry({
							columnWidth: 120,
							itemSelector: '.grid-item'
						});


					});


				</script>

				<script>
					$(document).ready(function(){
						$('.grid-item-content').click(function(){
							console.log("."+this.id);
							$(".show").toggleClass("show");
							$("."+this.id).toggleClass("show");
						})

					})
				</script>


@stop
	@stop