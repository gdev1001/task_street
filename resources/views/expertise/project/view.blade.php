<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Shokse client project</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="icon" type="image/png" href="/images/favicon-icon.png" sizes="16x16">
<!--Bootstrap-->
<link href="/css/bootstrap.min.css" rel="stylesheet">
<!--font-awesome CSS-->
<link href="/css/font-awesome.min.css" rel="stylesheet">
<!--Custom Template CSS-->
<link href="/css/main-expert-view.css" rel="stylesheet" type="text/css">
<!--Media Query CSS-->
<link href="/css/media-query-all.css" rel="stylesheet" type="text/css">
<!--slick CSS-->
<link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="/css/slick.css"/>

<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/select2.css")}} >
<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/select2-bootstrap.css")}} >

<link rel="stylesheet" href="/css/jquery.orgchart.css">
<link rel="stylesheet" href="/css/custom.css"/>
</head>
<body onload="prettyPrint();">
<header class="shokse-header block">
  <nav class="navbar container">
    <figure class="row">
      <figcaption class="navbar-header pull-left"> <a class="navbar-brand" href="#"><img src="/images/shokse-logo.png" class="img-responsive" alt="logo"/></a>
        <button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target="#mobileMenuCollapsing"> <i class="fa fa-bars" aria-hidden="true"></i> </button>
      </figcaption>
      <figcaption class="search_cover navbar-collapse">
        <button type="button" class="btn add_task">Add Task</button>
        </li>
      </figcaption>
      <!-- /.nav-right --> 
      
    </figure>
    <!-- /row --> 
  </nav>
  <!-- /.container --> 
</header>
<!-- /.shokse-header -->
<main class="block">
  <section class="block right_left_page">
    <article class="container">
      <figure class="upper"> <a href="/expertise" class="back_btn"><span></span></a>
        <h1 class="text-center">
					{{$project->name}}
					<a href="#" class="drop"></a>
				</h1>
        <a href="#" class="status">ACTIVE</a> </figure>
      <figure>
     <div class="tabbingRight"> 
      <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tree" aria-controls="tree" role="tab" data-toggle="tab">TREE VIEW</a></li>
            <li role="presentation"><a href="#board" aria-controls="board" role="tab" data-toggle="tab">BOARD VIEW</a></li>
          </ul>
      <!-- Nav tabs --> 
             
      </div>  
      <figure>
    </article>
    <!-- /.container --> 
  </section>
  <!-- /.duis-quis -->
  <section class="block right_left_page_down">
    <article class="container-fluid">
      <div class="row">
        <div class="l_page">
          <div class="box_set">
            <div class="box1">
              <div class="title"> <i class="menu_icon" id="leftright_menuicon"></i><span>Project Timeline</span> </div>
            </div>
            <div class="box2">
              <div class="select_cover12">
                <select id="project_select">
									@foreach ($project_list as $key => $item)
                  	<option value="{{$item->id}}" {{($item->id == $projectId) ? 'selected' : ''}}>{{$item->name}}</option>
									@endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="togglw_sec">
					@foreach ($week_tasks as $key => $week_items)
            @if(count($week_items) == 0)
              <?php continue; ?>
            @endif
						<label>WEEK {{$key + 1}}</label>
						@foreach ($week_items as $key => $item)						            
							@if($item->page_id)
							{{-- */$pageid = $item->page_id/* --}}
							@else
							{{-- */$pageid = 0/* --}}
							@endif						
							<div class="box_lower" id="leftBox_{{$item->id}}">
								<div class="l_user"><img src="/images/user.png" alt="icon"/></div>
								<div class="r_user"> <a href="{{url('/'.$projectId.'/wiki/'.$pageid)}}" class="head12">{{$item->name}}</a>
									<div class="clearfix"></div>
									<small>Due in {{$item->estimateTime}} days</small>
									<div class="clearfix"></div>
                  <!--
									<p><span>Dave Davis</span> sed do eiusmod  tempoincididunt ut labore</p>
                  -->
								</div>
							</div>
						@endforeach
					@endforeach
				</div>

        </div>
        
        
        <div class="r_page">
            <div class="tabbingRight"> 
          	<!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tree">
								@foreach ($root_tasks as $key => $item)
									<div id="chart-container_{{$item->id}}" class="task-chart-container"></div>
								@endforeach
                    <div class="clearfix"></div>
                    <div class="zoomBtn">
                    	<button class="zoonIn" id="btn_ZoomIn" >+</button>
                        <button class="zoonOut" id="btn_ZoomOut" >-</button>
                    </div>
                    <button class="addBox" data-toggle="modal" data-target="#myModal1" data-backdrop="static"  aria-hidden="true" role="dialog" onClick="blankTaskId();">+</button>     
                </div>
                <div role="tabpanel" class="tab-pane" id="board">
                	<section class="boardView">
                    <div class="zoomBtn">
                    	<button class="zoonIn" id="btn_ZoomIn" >+</button>
                        <button class="zoonOut" id="btn_ZoomOut" >-</button>
                    </div>
                    	<artical class="boardCol">
                        	<div class="headCol">URGENT</div>
                            <div class="bodyCol">
															@foreach ($board_tasks['urgent'] as $key => $item)
                                <div class="col_box urgent">
                                        <label>{{$item->name}}</label>
                                        <div class="clearfix"></div>
                                        <div class="btn_cover1">
                                            <div class="status">URGENT</div>
                                            <div class="dot_icon2"> 
                                                <div id="wave">
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
															@endforeach
                                <button class="addBox boardView" data-toggle="modal" data-target="#myModal1"  data-backdrop="static"  aria-hidden="true" role="dialog" onClick="blankTaskId();">+</button>
                			</div>
                        </artical>
                        <artical class="boardCol">
                        	<div class="headCol">LATE</div>
                            <div class="bodyCol">
															@foreach ($board_tasks['late'] as $key => $item)
                                <div class="col_box late">
                                        <label>{{$item->name}}</label>
                                        <div class="clearfix"></div>
                                        <div class="btn_cover1">
                                            <div class="status">LATE</div>
                                            <div class="dot_icon2"> 
                                                <div id="wave">
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
															@endforeach
                			</div>
                        </artical>
                        <artical class="boardCol">
                        	<div class="headCol">ON TIME</div>
                            <div class="bodyCol">
															@foreach ($board_tasks['ontime'] as $key => $item)
																<div class="col_box">
																		<label>{{$item->name}}</label>
																		<div class="clearfix"></div>
																		<div class="btn_cover1">
																			<div class="status">ON TIME</div>
																			<div class="dot_icon2">
																				<div id="wave"> <span class="dot"></span> <span class="dot"></span> <span class="dot"></span> </div>
																			</div>
																		</div>
																	</div>
															@endforeach
		                			</div>
                        </artical>
                        <artical class="boardCol">
                        	<div class="headCol">COMPLETE & CONFIRMED</div>
                            <div class="bodyCol">
															@foreach ($board_tasks['complete'] as $key => $item)
			                        	<div class="col_box complete">
                                    <label>{{$item->name}}</label>
                                    <div class="clearfix"></div>
                                    <div class="btn_cover1">
                                        <div class="status">COMPLETE & CONFIRMED</div>
                                        <div class="dot_icon2"> 
                                            <div id="wave">
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
															@endforeach
														</div>                			
                        </artical>

                	</section>
                </div>
              </div>
            </div>
        </div>
      
      </div>
    </article>
  
    <!-- /.container --> 
  </section>
	<input type="hidden" value="{{$projectId}}" id="project_id"/>
</main>
<!-- /main -->

    <!-- Modal -->
                <div class="modal fade pop_up1 pop2" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <div class="taskPop">   
                              <form method="post" action="{!! URL::route('expertise.task.store') !!}" id="form_task">
                                        <input type = "hidden" name = "_token" id = "_token" value = "{{ csrf_token() }}">
                                        <input type = "hidden" name = "projectId" value = "{!! $projectId !!}">
                                        <input type="hidden" name="_method" value="post">
                                        <input type="hidden" name="task_id" value="" id="task_id"/>
                                        <label class="img1">Task Title</label>
                                        <input type="text" class="inputPop1" placeholder="Write Task Title..." name="name" id="task_name"/>
                                        <div class="clearfix"></div>

                                        <div class="clearfix"></div>
                                        <label class="img1" >Parent Task</label>
                                        <select  name="parent_id" id="parent_tasks">
                                        	<option value="0">Choose Parent Task...</option>
                                          @foreach ($parent_tasks as $key => $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
															            @endforeach                                          
                                        </select>

                                        <label class="img2">Task Description</label>
                                        <textarea type="text"  class="inputPop1" placeholder="Write Task Description..." name="description" id="task_description"></textarea>

                                        <label class="img2">Input</label>
                                        <textarea type="text"  class="inputPop1" placeholder="Write Task Inputs..." name="input" id="task_input"></textarea>

                                        <label class="img2">Output</label>
                                        <textarea type="text"  class="inputPop1" placeholder="Write Task outputs..." name="output" id="task_output"></textarea>

                                        <div class="clearfix"></div>
                                        <label class="img6">Task Tags</label>
                                        <input type="hidden" style="width:100%;" placeholder="Task Tags..." name="tags" id="task_tags"/>
                                        
                                        <div class="clearfix"></div>
                                        <label class="img5">Scope</label>
                                        <select name="scope" id="task_scope">
                                        	<option value="0">Choose Task Scope...</option>
                                            <option value="5">1 Day</option>
                                            <option value="16">3 Days</option>
                                            <option value="40">1 Week</option>
                                            <option value="80">2 Weeks</option>
                                        </select>

                                        <div class="clearfix"></div>
                                        <label class="img3">Due date</label>
                                        <input type="text" class="inputPop1" name="estimateTime" id="estimate_time" readonly/>

                                        <div class="clearfix"></div>
                                        <label class="img8">Difficult Level</label>
                                        <select name="difficult" id="task_difficult">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>

                                        <div class="clearfix"></div>
                                        <label class="img7">Task Budget</label>
                                        <input type="text" class="inputPop1" placeholder="Task Budget" readonly name="budget" id="task_budget"/>

                                        <div class="clearfix"></div>
                                        <div class="bottom_buttons">
                                            <a href="#" class="save" id="task_submit">CREATE</a>
                                            <a href="#" class="cancel" data-dismiss="modal">CANCEL</a>
                                        </div>  
                                   </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade pop_up1" id="myValidateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                    <input type = "hidden" name = "_token" id = "_token" value = "{{ csrf_token() }}">
                                    <input type = "hidden" name = "projectId" value = "{!! $projectId !!}">
                                    <input type="hidden" name="_method" value="post">
                                    <input type="hidden" name="task_id" value="" id="vd_task_id"/>

                                    <div class="mid_other1">
                                          <div class="date">
                                            <span id="vd_task_complete_date">DUE DATE 01/01/17</span>
                                            <div class="status" id="vd_task_status">on time</div>
                                          </div>
                                          <div class="clearfix"></div>
                                          <div class="milestone_cover">
                                              <div class="l_milestone">
                                                <div class="text_cover" id="vd_task_name"></div>
                                                  <div class="dot_icon2"> 
                                                      <div id="wave">
                                                          <span class="dot"></span>
                                                          <span class="dot"></span>
                                                          <span class="dot"></span>
                                                      </div>
                                                  </div>    
                                              </div>
                                          </div>
                                          <div class="clearfix"></div>
                                          <div class="task">TASK DETAILS</div>  
                                          <div class="clearfix"></div>
                                          <div class="head_line_cover" id="vd_task_description">
                                          </div>
                                          <a href="#" class="download" id="vd_task_download">DOWNLOAD</a>
                                          <div class="inner_box">
                                            <div class="freelancer2">FREELANCER</div>
                                              <div class="head_line_cover" id="vd_task_developer"></div>
                                              <div class="freelancer2 task_tag">TASK TAG</div>
                                              <div class="head_line_cover" id="vd_task_tag"></div>
                                          </div>
                                          <div class="bottom_buttons">
                                            <a href="#" class="save" id="vd_task_confirm">CONFIRM</a>
                                              <a href="#" class="cancel" id="vd_task_deny" data-dismiss="modal">DENY</a>
                                          </div>  
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade pop_up1" id="myAcceptModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="taskPop">   

                                    <input type = "hidden" name = "_token" id = "_token" value = "{{ csrf_token() }}">
                                    <input type = "hidden" name = "projectId" value = "{!! $projectId !!}">
                                    <input type="hidden" name="_method" value="post">
                                    <input type="hidden" name="task_id" value="" id="ac_task_id"/>

                                    <div class="clearfix"></div>
                                    <label class="img8">Requested Developer</label>
                                    <select id="ac_task_deveoper">
                                    </select>

                                    <div class="clearfix"></div>
                                    <div class="bottom_buttons">
                                        <a href="#" class="save" id="ac_task_accept">ACCEPT</a>
                                        <a href="#" class="cancel" data-dismiss="modal">CANCEL</a>
                                    </div>  
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>

    <!---Modal---->


<script type="text/javascript" src="/js/jquery.js"></script> 
<script type="text/javascript" src="/js/jquerymigrate 1.4.1.js"></script> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js"></script> 
<script type="text/javascript" src="/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="/js/iscroll.js"></script> 
<script type="text/javascript" src="/js/main-expert-view.js"></script> 
<script type="text/javascript" src="/js/slick.min.js"></script> 
<script type="text/javascript" src="/js/prettify.js"></script> 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src={{asset("js/expertise/vendor/select2.min.js")}}></script>

<script src="/js/jquery.orgchart.js"></script> 
<script src="/js/l2r.js"></script> 

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

  <?php 
		$skillset = '';
		foreach($project->skill as $item){
			$skillset .= '"'.$item->name . '", ';
		}		
		$skillset = substr($skillset, 0, -2);
  
  ?>

  var skillset = [
    <?php echo $skillset; ?>
  ];
  function blankTaskId(){
    jQuery('#task_id').val('');

    jQuery('#task_name').val('');
    jQuery('#parent_tasks').val('0');
    jQuery('#task_description').val('');
    jQuery('#task_input').val('');
    jQuery('#task_output').val('');
    jQuery('#estimate_time').val('');
    jQuery('#task_scope').val('');
    jQuery('#task_difficult').val('');
    jQuery('#task_budget').val('');

    jQuery("#task_tags").val('');    
    jQuery("#task_tags").select2({
      placeholder: 'Select tags or add new ones',
      tags:skillset,
      tokenSeparators: [",", " "]
    });

    jQuery('#task_submit').text('CREATE');
  }

  function setModalTaskId(id){

    jQuery('#task_id').val(id);

    jQuery.ajax({
        url: '/expertise/task_detail/' + id,
        type:'GET',
        success: function(response){
          if(response.status == "ok"){          
            jQuery('#task_name').val(response.task.name);
            jQuery('#parent_tasks').val(response.task.parent_id);
            jQuery('#task_description').val(response.task.description);
            jQuery('#task_input').val(response.task.input);
            jQuery('#task_output').val(response.task.output);
            jQuery('#estimate_time').val(response.task.estimateTime);
            jQuery('#task_scope').val(response.task.scope);
            jQuery('#task_difficult').val(response.task.difficult);
            jQuery('#task_budget').val(response.task.budget);

            jQuery("#task_tags").val(response.task.skills);

            jQuery("#task_tags").select2({
              placeholder: 'Select tags or add new ones',
              tags:response.skillset,
              tokenSeparators: [",", " "]
            });
          }
        }
    });

    jQuery('#task_submit').text('UPDATE');
  }

  function setModalTaskIdValidate(id){
    jQuery('#vd_task_id').val(id);

    jQuery.ajax({
        url: '/expertise/task_detail/' + id,
        type:'GET',
        success: function(response){
          if(response.status == "ok"){          
            jQuery('#vd_task_name').text(response.task.name);
            jQuery('#vd_task_description').text(response.task.description);
            jQuery('#vd_task_complete_date').html(response.task.end_date);
            jQuery('#vd_task_status').html(response.task.task_status);            
            jQuery('#vd_task_download').attr('href','/expertise/project/download/'+id);
            jQuery('#vd_task_developer').text(response.task.developer);
            jQuery('#vd_task_tag').text(response.task.skills);
            jQuery('#vd_task_confirm').attr('href','/expertise/project/validate/'+id);
            //jQuery('#vd_task_deny').attr('href','/expertise/project/delete/'+id);
          }
        }
    });    
  }

  function setModalTaskIdAccept(id){
    jQuery('#ac_task_id').val(id);
    jQuery.ajax({
        url: '/expertise/task_developer/' + id,
        type:'GET',
        success: function(response){
          if(response.status == "ok"){             
            var selection_template = '';
            for(i = 0; i < response.developer.length; i++){
              selection_template += '<option value="'+response.developer[i].id+'">'+response.developer[i].name+'</option>';
            }
            jQuery('#ac_task_deveoper').html(selection_template);
            if(response.developer.length){
              jQuery('#ac_task_accept').attr('href','/expertise/project/accept/'+id + '/' +response.developer[0].id);                            
            }
          }
        }
    });    
  }

  function getMonitorAppliedTask(){
    var project_id = jQuery('#project_id').val();
    jQuery.ajax({
        url: '/expertise/task_applied/' + project_id,
        type:'GET',
        success: function(response){
          if(response.status == "ok"){             
            for(i = 0; i < response.task.length; i++){
              if(!$('#'+ response.task[i]).hasClass('highlight')){
                location.reload();
              }
            }
          }
        }
    });        
  }

  setInterval(function () {
      getMonitorAppliedTask();
  }, 30000);
  

	jQuery( "#ac_task_deveoper" ).on('change', function() {
    var selected_id = jQuery( "#ac_task_deveoper option:selected" ).val();
    jQuery('#ac_task_accept').attr('href','/expertise/project/accept/'+jQuery('#ac_task_id').val() + '/' +selected_id);
  });
  
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

   jQuery(document).ready(function($) {
     
     jQuery('#task_scope').click(function(){
       var scope_day = $('#task_scope option:selected').val();
       var difficult = $('#task_difficult option:selected').val();
       difficult = difficult ? difficult : 0;     
       scope_day = scope_day ? scope_day : 0;
       var budget = scope_day * 15 * difficult;
       jQuery('#task_budget').val(budget);

       switch(scope_day){
       case '5':
          jQuery('#estimate_time').val(1);
          break;
       case '16':
          jQuery('#estimate_time').val(3);
         break;
       case '40':
          jQuery('#estimate_time').val(7);
         break;
       case '80':
          jQuery('#estimate_time').val(14);
         break;
       }
     });

     jQuery('#task_difficult').click(function(){
       var scope_day = $('#task_scope option:selected').val();
       var difficult = $('#task_difficult option:selected').val();
       var budget = scope_day * 15 * difficult;

       difficult = difficult ? difficult : 0;     
       scope_day = scope_day ? scope_day : 0;
       jQuery('#task_budget').val(budget);
     });

     jQuery('#task_submit').click(function(){       
        if( jQuery('#task_name').val() == '' ){
          jQuery('#task_name').addClass('invalid');
        } else if( jQuery('#task_scope').val() == 0 ){
          jQuery('#task_scope').addClass('invalid');
        } else if( jQuery('#task_difficult').val() == 0 ){
          jQuery('#task_difficult').addClass('invalid');
        } else if( jQuery('#task_tags').val() == '' ){
          jQuery('#task_tags').addClass('invalid');
        } else {
          jQuery('#task_name').removeClass('invalid');
          jQuery('#task_scope').removeClass('invalid');
          jQuery('#task_tags').removeClass('invalid');
          jQuery('#task_difficult').removeClass('invalid');

          jQuery('#form_task').submit();
        }              
     });
   });

$("#leftright_menuicon").click(function(){
    $(".togglw_sec").slideToggle();
});




  </script>
</body>
</html>