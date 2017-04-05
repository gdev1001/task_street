<link href='{{asset("css/bootstrap.min.css")}}' rel="stylesheet">
    <!--font-awesome CSS-->
    <link href='{{asset("css/font-awesome.min.css")}}' rel="stylesheet">    
    <!--Custom Template CSS-->
    <link href='{{asset("css/main.css")}}' rel="stylesheet" type="text/css">
    <!--Media Query CSS-->
    <link href='{{asset("css/media-query-all.css")}}' rel="stylesheet" type="text/css"> 
    <!--slick CSS-->
    <link rel="stylesheet" type="text/css" href='{{asset("css/slick-theme.css")}}'/>    
    <link rel="stylesheet" type="text/css" href='{{asset("css/slick.css")}}'/>
<style type="text/css">
	.modal-backdrop{ background-color: transparent!important;}
</style>

@if($tasks->count()>0)
    <div class="page_rotate_cover">
        <div class="container_rotate">
			{{-- */$count = $tasks->count()/* --}}
			@foreach($tasks as $task)
			
			<div data-card="{{-- */$count-- /* --}}" class="card">
				<div class="detail_cover">
				<div class="upper_part {{($task->available()) ? '' : 'inactive'}}">
					<div class="l_upper_part">
						<a href="#" class="active_btn">ACTIVE</a>
						<div class="clearfix"></div>
						<label>{{$task->name}}</label>
						<div class="clearfix"></div>
						<p>{{$task->description}}</p>
						<div class="clearfix"></div>
					</div>
					<div class="r_upper_part">
						<div class="small_box">
							<div class="img_cover">
								<img src="/images/budget_round.png" alt="image"/>
							</div>
							<div class="text_cover1">
								<small>BUDGET</small>
								<div class="clearfix"></div>
								<div class="price">${{$task->budget}}</div>
							</div>
						</div>
						<div class="small_box">
							<div class="img_cover">
								<img src="/images/hourse.png" alt="image"/>
							</div>
							<div class="text_cover1">
								<small>HOURS</small>
								<div class="clearfix"></div>
								<div class="price">{{$task->estimateTime}} hours</div>

							</div>
						</div>
						<div class="small_box">
							<div class="img_cover">
								<img src="/images/views.png" alt="image"/>
							</div>
							<div class="text_cover1">
								<small>VIEWS</small>
								<div class="clearfix"></div>
								<div class="price">245</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>  
				<div class="lower_part"> 
					<div class="upper_box1">	 
						<label class="skils">SKILLS</label>
						<div class="tags_cover">
							@foreach($task->skill as $skill)
								<span>{{$skill->name}}</span>
							 @endforeach
						
						</div>
					</div>
					<div class="upper_box2">	 
						<label class="input_pic">INPUT</label>
						<p>{{$task->input}}
						</p>
					</div>
					<div class="upper_box3">	 
						<label class="output_pic">OUTPUT</label>
						<p>{{$task->output}}</p>
					</div>
				</div>                    
				<div class="bottom_buttons">
					 
					<a id = "{{$task->id}}" href="#" class="save with_rel active {{($task->available()) ? 'open_popup' : 'inactive'}} " >
						<span>APPLY</span>
                        <small>0 remaining</small>
                        <div class="time1">34 min</div>
					</a>
					
					<a href="#" class="cancel skip_project" >SKIP</a>
				</div>
			</div>	
         </div>
         
		 @endforeach
		 
	</div>
	</div>
	@else
	<h2 class="text-center not-available">New Task is not Available</h2>
	
@endif

<!-- Modal code-->
<div class="modal fade freelanacer-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
       	<div class="modal-content" id="appendModelContent">
       		<section class="mid_back_new alert1">
				<artical class="alert_box">
			    	<div class="upper_box confirmation-modal">
			        	Are you sure you want to apply this project ?
			      </div>
			        <input type="hidden" id="taskid" value="">
			        <div class="lower_box bottom_buttons">
			        	<a href="#" class="save apply_project">YES</a>
			            <a href="#" class="cancel " data-dismiss="modal">CANCEL</a>
			        </div>
			    </artical> 	           
			</section>
       	</div>
    </div>
</div>

<!-- Modal code-->
<div class="modal fade freelanacer-modal" id="myAlertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
       	<div class="modal-content" id="appendModelContent">
       		<section class="mid_back_new alert1">
				<artical class="alert_box">
			    	<div class="upper_box confirmation-modal" id="alert_message">
			        	
			      </div>
			        <div class="lower_box bottom_buttons">
			            <a href="#" class="save " data-dismiss="modal">OK</a>
			        </div>
			    </artical> 	           
			</section>
       	</div>
    </div>
</div>

<!-- Modal code-->
<div class="modal fade freelanacer-modal" id="myConfirmSkipModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
       	<div class="modal-content" id="appendModelContent">
       		<section class="mid_back_new alert1">
				<artical class="alert_box">
			    	<div class="upper_box confirmation-modal" id="alert_message">
			        	You really want skip this project?
			      </div>
			        <div class="lower_box bottom_buttons">
			        	<a href="#" class="save" id="confirm_skip">YES</a>
			            <a href="#" class="cancel " data-dismiss="modal">CANCEL</a>
			        </div>
			    </artical> 	           
			</section>
       	</div>
    </div>
</div>
<!-- End Modal code-->				

	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script> 

    <script type="text/javascript" src='{{asset("js/bootstrap.min.js")}}'></script>
    <script type="text/javascript" src='{{asset("js/iscroll.js")}}'></script>
    <script type="text/javascript" src='{{asset("js/main.js")}}'></script>
    <script type="text/javascript" src='{{asset("js/slick.min.js")}}'></script> 
    <script type="text/javascript">
	function OpenHoverstate(id) {	
 
		 jQuery("#open_"+id).hide();
		  jQuery("#open_"+id).animate({"left":"810px"}, "slow");
		    jQuery("#close_"+id).show();
			 jQuery("#close_"+id).animate({"left":"0px"}, "slow");
	}
	function CloseHoverstate(id) {	
   jQuery("#close_"+id).hide();
   jQuery("#close_"+id).animate({"left":"810px"}, "slow");
		 jQuery("#open_"+id).show();
		   jQuery("#open_"+id).animate({"left":"0px"}, "slow");
	}
	</script> 
<script type="text/javascript">
	jQuery( "#opent1a .dot_icon" ).click(function() {});
	jQuery( "#open1a .close_icon" ).click(function() {});

	jQuery('.dot_icon').click(function(){
		//alert(jQuery(this).parent().attr('class'));
		jQuery('.mid_other1').fadeOut( "slow");
	  	jQuery(this).parent().next().fadeIn( "slow", function() {
		// Animation complete.
	  	});
	  });
	  jQuery('.close_icon').click(function(){
		jQuery(this).parent().fadeOut( "slow", function() {
		// Animation complete.
	  });
		});
		  jQuery(document).on('click','.close_btn',function(){
		  jQuery(this).parent().fadeOut("slow",function(){});
		});
  </script> 
  <script>
(function($) {
	$=jQuery;
  var rotate, timeline;

  rotate = function() {
    return $('.card:first-child').fadeOut(400, 'swing', function() {
      return $('.card:first-child').appendTo('.container_rotate').hide();
    }).fadeIn(400, 'swing');
  };

	var confirm_status, confirm_status_time;
	confirm_status = function(){
		$.ajax({
				url: '/project/checkMessages',
				type:'GET',
				data:{type: 'pending_task'},
				success: function(response){
						if(response=="redirect"){
							window.location.href = '/profile';
						}
					}
				});		
	}

	confirm_status_time = setInterval(confirm_status, 5000);

  timeline = setInterval(rotate, 1200);

  $('body').hover(function() {
    return clearInterval(timeline);
  });

  /*$('.card').click(function() {
	  //alert("fhdjfhjdhf");
    return rotate();
  });*/

  	
  	$(".apply_project").click(function(){
    	

		   $.ajax({
            url: '/project/testUrl/{id}',
            type:'GET',
            data:{id:$('#taskid').val()},
            success: function(response)
                {
                    if(response.status=="fail"){
											openAlertModal("You have already joined this task");
										}else if(response.status=="overflow"){
											openAlertModal("You have already joined 3 tasks. You unable to join anymore now.");
                    } else if (response.status == "full"){
											openAlertModal("2 users have already applied this task. You unable to join this task now.");
										}else {
											var available_task = 2 - response.applied;
											if (available_task > 0){
												$('#status_message').text('You joined the task successfully. You are able to join ' + available_task + ' task more.');
											} else {
												$('#status_message').text('You joined the task successfully. You are unable to join the task anymore.');
											}
                    	openAlertModal("You joined the task successful");											
                    }
                    $('#myModal').hide();
                    return rotate();
                }
            });
		
    	
	});

	$("#confirm_skip").click(function(){
		$('.modal').modal('hide');
		return rotate();
	});

	$(".skip_project").click(function(){
		$(".page_rotate_cover").addClass("blur");
		$('#myConfirmSkipModal').modal('show');

	  //return rotate();
		/*
		if (confirm("You really want skip this project?")) {
         	return rotate();
         
		} else {
		   return false;
		}
		*/
	});
	// open confirmation window
	$(".open_popup").click(function(){
		
        $("#taskid").val(this.id);  
      	$(".page_rotate_cover").addClass("blur");
        $('#myModal').modal('show');
           
  	});

  
	$(".modal").on("hidden.bs.modal", function () {
   		$(".page_rotate_cover").removeClass("blur");
	});


	function openAlertModal(message){
			$("#alert_message").html(message);
			$(".page_rotate_cover").addClass("blur");
			$('#myAlertModal').modal('show');			
	}

}).call(this);


</script>


