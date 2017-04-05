<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Fullscreen Form Interface</title>
		<meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
		<meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
		<meta name="author" content="Codrops" />


		<link rel="shortcut icon" href="../favicon.ico">

		<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/css/select2.min.css" rel="stylesheet" />

		<link rel="stylesheet" type="text/css" href="{{ asset('css/post/normalize.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/post/demo.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/post/component.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/post/cs-select.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/post/cs-skin-boxes.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/post/cs-skin-circular.css') }}" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

		<script src="{{asset('js/post/modernizr.custom.js') }}"></script>
	</head>
	<body>
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>Project Worksheet</h1>
				</div>
				<form id="myform" action="{{ URL('/client/store') }}" role="form" method="post" class="fs-form fs-form-full" autocomplete="off">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">What type of work do you require?</label>
							<input class="fs-anim-lower" id="q1" name="type" type="text" placeholder="Machine Learning" required/>

						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="We won't send you spam, we promise...">Name your project</label>
							<input class="fs-anim-lower" id="q2" name="name" type="text" placeholder="name" required/>
						</li>

						<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" data-info="We'll make sure to use it all over">Choose talent required for your project.</label>

							<select class="cs-select cs-skin-circular _position fs-anim-lower" type="text" multiple = "multiple" id = "skill_list"  name="skills">

								<span class="cs-placeholder">Select an activity</span>
								<option value="" disabled selected>?</option>

								<option value="SharePoint">1</option>
								<option value="joomla">2</option>
								<option value="_Java">3</option>
								<option value="_my_sql">4</option>
								<option value="_php">5</option>
								<option value="node_js">6</option>
								<option value="_Liferay">7</option>
								<option value="Html5">8</option>
							</select>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Describe your new project</label>
							<textarea class="fs-anim-lower" id="q4" name="description" placeholder="Describe here"></textarea>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q5">What's your budget?</label>
							<input class="fs-mark fs-anim-lower" id="q5" name="budget" type="number" placeholder="1000" step="100" min="100"/>
						</li>

						<li>
							<label class="fs-field-label fs-anim-upper">Start At</label>
							<input id = "starttime" class = "fs-mark fs-anim-lower"  name="Starttime" placeholder="Estimate Time">
						</li>


						<li>
							<label class="fs-field-label fs-anim-upper">End At</label>
							<input id = "endtime" class = "fs-mark fs-anim-lower" name="Endtime" placeholder="Estimate Time">
						</li>

					</ol><!-- /fs-fields -->
					<button class="fs-submit" type="submit">Send answers</button>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->

			<!-- Related demos -->

		</div><!-- /container -->
		<script src="{{asset('js/post/classie.js')}}"></script>
		<script src="{{asset('js/post/selectFx.js')}}"></script>
		<script src="{{asset('js/post/fullscreenForm.js')}}"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
					new SelectFx(el, {
						stickyPlaceholder: false,
						onChange: function(val){
							var img = document.createElement('img');
							{{--console.log({{ asset('img')}}/'+val+'.png);--}}
									img.src = '/img/'+val+'.png';
							img.onload = function() {
								$(".cs-placeholder").removeAttr("box-shadow");
								document.querySelector('span.cs-placeholder').style.backgroundImage = 'url(/img/'+val+'.png)';
								document.querySelector('span.cs-placeholder').css('box-shadow','none')
							};
						}
					});
				} );
			})();
		</script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>

		<script type="text/javascript">
			// When the document is ready
			$(document).ready(function () {

				$('#starttime').datepicker({
					format: "dd/mm/yyyy"
				});

			});

			$(document).ready(function () {

				$('#endtime').datepicker({
					format: "dd/mm/yyyy"
				});

			});


		</script>




	</body>
</html>