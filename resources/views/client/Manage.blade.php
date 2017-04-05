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
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <!--Media Query CSS-->
    <link href="/css/media-query-all.css" rel="stylesheet" type="text/css"> 
    <!--slick CSS-->
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>    
    <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
    <!--Bootstrap-select-->
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">
    <!--jQuery DateTimePicker-->
    <link href="/css/jquery.datetimepicker.min.css" rel="stylesheet">

    <style>
    .modal-backdrop {
        opacity: 0 !important;
    }
    .modal-content{
        border: none !important;
        box-shadow: none !important;
        background: transparent !important;            
    }
    .modal-header{
        border: 0 !important;
        display: none !important;            
    }
    .modal-open .modal{
        padding-right: 15px !important;
        background: rgba(255, 255, 255, 0.5) !important;            
    }

    .modal-content .block.client_page{
        background: transparent;
    }
    </style>
  </head>
  <body>
    <header class="shokse-header block logged_header profile-notice">
        <nav class="navbar container">
          <figure class="row">
            <figcaption class="navbar-header pull-left">
              <a class="navbar-brand" href="#"><img src="/images/shokse-logo.png" class="img-responsive" alt="logo"/></a>
              <button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target="#mobileMenuCollapsing">
                 <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
            </figcaption>
            <!-- /.navbar-header --> 
            <!--<figcaption class="nav-menu-right pull-right">
                <figcaption id="mobileMenuCollapsing" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav main-menu">
                        <li><button type="button" class="btn">Get Started</button></li>
                        <li class="get-started"><a href="#" class="search"></a></li>
                    </ul>
                </figcaption>
                <!-- /.collapse.navbar-collapse -->  
            <!--</figcaption>-->
            <figcaption class="search_cover navbar-collapse">
                <!--<button type="button" class="btn">Agreement</button>-->
            	<!--<a href="#" class="userPic"></a>-->               
                <div class="dropdown user_icons user_notice">
                    <a class="dropdown-toggle bell compaby_bell" type="button" id="menu1" data-toggle="dropdown" href="#">
                        <span class="badge notice_count_badge"></span></a>
                    <div class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <div class="succes gray arrow_box"></div>
                    </div>
                </div>
                 <a href="/client/transaction" class="puzzel"></a>
                            
               <ul class="nav navbar-nav" style="float:right; margin-left: 20px !important;">
					<li class="menu-item dropdown">
						 <a href="#" class="dropdown-toggle menu_1" data-toggle="dropdown">
							<span></span>
							<span class="mid"></span>
							<span></span>
						</a>	
						
						<ul class="dropdown-menu">
							<li class="menu-item dropdown dropdown-submenu">
								<a href="{{ url('/client/transaction')}}" class="dropdown-toggle" >Transaction</a>
							</li>
                            <li class="menu-item dropdown dropdown-submenu">
                                <a href="{{ url('/client/invite')}}" class="dropdown-toggle" >Invite Expert</a>
                            </li>
							<li class="menu-item dropdown dropdown-submenu">
								<a href="{{ url('/client/profile')}}" class="dropdown-toggle" >Account</a>
							</li>
							<li class="menu-item dropdown dropdown-submenu">
								<a href="{{ url('/auth/logout') }}" class="dropdown-toggle" >Sign Out</a>
							</li>
						</ul>
					</li>
				</ul>
                <!--<a href="#" class="search"></a>-->
            </figcaption>
            <!-- /.nav-right --> 
                      
          </figure>
          <!-- /row -->          
        </nav>
        <!-- /.container -->
    </header>
    <!-- /.shokse-header -->
    <main class="block">
        <section class="block duis-quis client_page">
            <article class="container">
                <figure>

                    @if (Session::has('delete-success'))
                            <div class="alert alert-info alert-top">{{ Session::get('delete-success') }}</div>
                    @endif
                    
                    @if (Session::has('delete-error'))
                            <div class="alert alert-danger alert-top">{{ Session::get('delete-error') }}</div>
                    @endif
                    <h1 class="text-center">Project in Progress<a href="#" class="drop"></a></h1>
                    <h6 class="text-center deco1">MILESTONE STATUS</h6>
                    <div class="progress_cover">
                        <div class="progress">
						 {{-- */$pro_bar = 0 /* --}}
						 @foreach($projects as $project)
																		
							{{-- */$pro_bar += getProgress($project->tasks()->where('status','=','1')->count(),$project->tasks()->count())/* --}}
								
						@endforeach
						@if($projects->count()>0)
							{{-- */$pro_bar = round($pro_bar/$projects->count(),2) /* --}}
						@endif
                          <div class="progress-bar" role="progressbar" aria-valuenow="{{$pro_bar }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$pro_bar }}%;">
                            PROGRESS<span class="span1">{{$pro_bar}}</spn>
                          </div>
                        </div>
                    </div>
                </figure>
            </article> 
            <!-- /.container -->         
        </section>
        <!-- /.duis-quis --> 
        <section class="block">
            <article class="container">
                <div class="mid_back">
                    <div class="mid_back_in ">
                        <div class="count_round">7</div>
                       <div class="clearfix"></div> 
                        <span>MILESTONES</span>                        
                        <div class="clearfix"></div>
                        <ul>
                            <li><div class="filter_pic"></div>Filter:</li>
                            <li><a href="#">All</a></li>  
                            <li><a href="#">Newest</a></li>
                            <li><a href="#">Completed</a></li> 
                            <li><a href="#">Not completed</a></li>
                        </ul>
                        <div class=" clearfix"></div>
                        <a href="{{ url('/lazy') }}" class="btn2">CREATE NEW MILESTONE</a>
                    </div>
                    
                    {{-- */ $count = 0  /* --}}
                @if(count(@$projects))
                    @foreach($projects as $project)

                    {{-- */ $count+=1 /* --}}

						
						{{-- */$pro_com = getProgress($project->tasks()->where('status','=','1')->count(),$project->tasks()->count())/* --}}


                    <div class="mid_other1" id="open_{!!$count!!}">
                        <div class="date">DUE DATE: {{date('F d, Y',strtotime($project->end_time))}}</div>
                        <div class="clearfix"></div>
                        <div class="milestone_cover">
                            <div class="l_milestone">@if(!empty($project->name)) {{ $project->name }} @endif</div>
                            <div class="r_milestone">{{$pro_com}} %
                                <div class="clearfix"></div>
                                <span>COMPLETED</span></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="task">CURRENT TASK</div>  
                        <div class="clearfix"></div>
                        <div class="head_line_cover">
                            <div class="head_line_l">
                                <h2>
                                    @if(!empty($project->tasks->first())) 
                                    {{$project->tasks->first()->name}} 
                                    @endif
                                </h2>
                                <small>
                                        @if(empty($project->tasks->first()))
                                            Thank you for submitting your project. Your project specialist will be reviewing the project and will turn your project into mini-task
                                        @else 
                                            {{$project->tasks->first()->description}}
                                        @endif
                                </small>    
                            </div>


                            <div class="head_line_r">

                                {{$project->tasks()->where('status','=',1)->count()}} / @if(!empty($project->tasks)){{$project->tasks->count()}} @endif 
                                <div class="clearfix"></div>
                                <span>TASKS</span>
                            </div>
                        </div>  
                        <div class="dot_icon"  onClick="OpenHoverstate('{!!$count!!}')"> 
                            <div id="wave">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </div>
                        </div>
                    </div>
                        
                    
                    <div class="mid_other2" style="display:none; left:885px;" id="close_{!!$count!!}" >
                        <h2>@if(!empty($project->name)) {{ $project->name }} @endif</h2>
                        <div class="clearfix"></div>
                        <div class="date_white">DUE DATE: {{date('F d, Y',strtotime($project->end_time))}}</div>
                        <div class="clearfix"></div>
                        <div class="pic_cover">
                            <a href="/client/progress/{!!$project->id!!}" class="pic_box">
                                <div class="pic_box_cover">
                                    <img src="/images/view.png" alt="image"/>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pic_text">View</div>
                            </a>
                            <a data-toggle="modal" href="/{!!$project->id!!}/wiki" class="pic_box" data-target="#ajaxModal" onClick="makeMainBlur()" data-backdrop="true">
                            <!--<a data-toggle="modal" href="/{!!$project->id!!}/wiki" class="pic_box"> -->
                                <div class="pic_box_cover second">
                                    <img src="/images/edit.png" alt="image"/>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pic_text">Edit</div>
                            </a>
                            <a href="#" class="pic_box">
                                <div class="pic_box_cover third">
                                    <img src="/images/share.png" alt="image"/>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pic_text">Share</div>
                            </a>
                            <a href="#" class="pic_box" data-toggle="modal" data-target="#exampleModal" onClick="deletemodal('{{$project->id}}'); makeMainBlur();"> 
                                <div class="pic_box_cover fourth">
                                    <img src="/images/delet.png" alt="image"/>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pic_text">Delete</div>
                            </a>
                        </div>
                            <div class="close_icon" onClick="CloseHoverstate('{!!$count!!}')"> &nbsp;</div> 
                    </div>
                    @endforeach
                @endif
                </div>
               
            </article> 
            <!-- /.container -->         
        </section>
    </main> 
    <!-- /main -->
   <!-- Modal -->
    <!--modal window code-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Do you want to end this project?</h4>
                </div>
                <div class="modal-body">
                <form id="form2" method="POST"  action="{{ url('/client/delete') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                        <input type="hidden" name = "id" id="exampleprojectid">
                    <div class="form-group">
                        <label for="message-text" class="control-label">Reason:</label>
                        <textarea class="form-control" name="delete_reason" id="delete_reason" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" >
                    </div>
                                    
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value="Delete" id="projectdelete" >
                    </div>
                
                </form>
                </div>
                
            </div>
            </div>
        </div>
        <!--End modal window code-->

<div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">            
            <div class="modal-body"><div class="te"></div></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="interviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">            
            <div class="modal-body">
                    <div class="tabbingPop col100">
                    	<div class="tabbing liTwo"> 
                        	<!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                            	<li role="presentation" class="active">
                                	<a href="#gotMatch" aria-controls="home" role="tab" data-toggle="tab" id="gotMatchLink">YOU'VE GOT A MATCH!</a>
                                </li>
                                <li role="presentation">
                                	<a href="#intProp" aria-controls="profile" role="tab" data-toggle="tab" id="intPropLink">INTERVIEW PROPOSAL</a>
                                </li>
                            </ul>
                              <!-- Tab panes -->
                            <div class="tab-content">
                              	<div role="tabpanel" class="tab-pane active" id="gotMatch">
                                	<div class="titleNew" id="i_expert_name">MARK JOHNSSON</div>
                            	<div class="upBox">
                                    	<div class="img_box">
                                    	<img src="/images/acc.png" alt="user image" id="i_expert_avatar"/>
                                    </div>
                                    	<div class="text1"></div>
                                        <div class="text2" id="i_expert_type">Android Developer</div>
                                        <div class="text2" id="i_project_name"></div>
                                        <input type="hidden" id="i_project_id" value="">
                                        <input type="hidden" id="i_user_id" value="">
                                     	<div class="text3">DESCRIPTION</div>
                                        <p id="i_project_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ullamcorper enim non mattis dapibus. Nullam justo augue, interdum eget ullamcorper a, tristique eget nulla. In sit amet felis a nulla fermentum posuere. Vivamus et dictum felis. Vivamus interdum dolor felis, quis mattis quam varius sed.</p>
                                    </div>
                                    <div class="downBox">
                                    	<div class="text3">GENERAL INFORMATION</div>                                    
                                    	<ul>
                                        	<li>SKILL LEVEL <span>53.3</span></li>
                                            <li>EXPERIENCE <span>34 hours</span></li>
                                            <li>EDUCATION<span>BA in CS</span></li>
                                            <li>EXPERTISE <span>Android</span></li>
                                    	</ul>
                                    </div>
                                    <input type="submit" class="btn compInfo noAr" id="btn_skip" value="SKIP"  onClick="onSkip();">
                                    <input type="submit" class="btn compInfo noAr" value="INTERVIEW" onClick="onInterview();">
                                </div>
                                <div role="tabpanel" class="tab-pane" id="intProp">
                        			<div class="pro_info" style="min-height: 500px;">
                                        <div class="pro_info_box">
                                            <label>INTERVIEW</label>
                                            <div class="select_cover">
                                                <select id="i_interview_type" class="selectpicker red_drop" data-hide-disabled="true">
                                                 	<option value="" selected>Select Type Of Interview</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="coverWidth">
                                            <div class="pro_info_box interview-time-box">
                                                <label>INTERVIEW TIME</label>
                                                <div class="select_cover">
                                                    <input type="text" class="" value="" id="i_interview_time"/>
                                                </div>
                                            </div>                                        
                                        </div>    
                                        <div class="clearfix"></div>
                                        <div class="pro_info_box">
                                            <label>REPLY MESSAGE</label>
                                            <div class="select_cover">
                                                <textarea style="display: block;" id="message_content"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn compInfo noAr" value="INTERVIEW" onClick="onInterview();">
                        		</div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

    <input type="hidden" id="company_id" value="{{$company->id}}">
    <footer class="block shokse-footer">
        <article class="container">
            <figure class="shokse-footer-top col-md-16 col-sm-16 col-xs-16">
                <figcaption class="col-md-8 col-sm-8 col-xs-16 footer-left">
                    <a href="#" class="footer-logo"><img src="/images/shokse-footer-logo.png" alt="footer-img" /></a>
                    <p class="primary-color shokse-matche">Shokse matches the perfect candidate to your projects in need. No matter how complicated, the Shokse management system gets your project done faster and bettter.</p>
                </figcaption>
                <!-- /figcaption col -->
                
                <figcaption class="col-md-8 col-sm-8 col-xs-16 footer-right">
                    <ul>
                        <li>
                            <h6>About us</h6>
                            <a href="#">Who We Are</a>
                        </li>
                        <li>
                            <h6>Quick Links</h6>
                            <a href="#">Register</a>
                        </li>
                        <li>
                            <h6>Supports</h6>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                    
                </figcaption>
                <!-- /figcaption col -->
                
            </figure>
            <!-- /.footer-top -->    
            <figure class="shokse-footer-bottom col-md-16 col-sm-16 col-xs-16">
                <figcaption class="col-md-8 col-sm-8 col-xs-16 social-link">
                	<a href="http://www.facebook.com/Shokse"><img src='{{asset("images/fb-icon.png")}}' alt="icon" /></a>
                  <a href="http://www.twitter.com/devshokse"><img src='{{asset("images/twiter-icon.png")}}' alt="icon" /></a>
                  <a href="http://www.linkedin.com/company/shokse"><img src='{{asset("images/link-in-icon.png")}}' alt="icon" /></a>
                </figcaption>
                <!-- /figcaption col -->
                
                <figcaption class="col-md-8 col-sm-8 col-xs-16 copyWrite">
                    <a href="#">© 2016 Shokse Ltd </a>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Privacy Policy</a>
                </figcaption>
                <!-- /figcaption col -->
                
            </figure>
            <!-- /.footer-bottom --> 
        
        </article>

        <!-- /article -->        
    </footer>
    <!-- /footer.shokse-footer -->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="/js/iscroll.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/notification.js"></script>
    <script type="text/javascript" src="/js/slick.min.js"></script> 
    
    <!--<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>-->
    <script type="text/javascript" src="/js/jquery.datetimepicker.full.min.js"></script> 

    <script src="{{asset('js/jquery.validate.js') }}"></script>
    <!-- form validation script for delete modal-->
    <script>
        function deletemodal(id){
            jQuery("#exampleprojectid").val(id);
            jQuery('label[for="delete_reason"]').hide();
            jQuery('label[for="password"]').hide();
            
        }

        function makeMainBlur()   {
            jQuery("main.block").addClass("blur");        
        }

        function removeMainBlur()   {
            jQuery("main.block").removeClass("blur");
        }
        
        jQuery(document).ready(function() { 

            jQuery("#ajaxModal").on("hidden.bs.modal", function () {
                removeMainBlur();
            });

            jQuery("#exampleModal").on("hidden.bs.modal", function () {
                removeMainBlur();
            });

            jQuery("#interviewModal").on("hidden.bs.modal", function () {
                removeMainBlur();
            });


            // jQuery.datetimepicker.setLocale('en');
            jQuery("#i_interview_time").datetimepicker({
                formatTime:'H:i',
                formatDate:'d/m/Y'
            });

            jQuery('#i_interview_type').on('change', function(){
                var selected = jQuery(this).find("option:selected").val();
                if(selected != ''){
                    jQuery('.interview-time-box').hide();
                } else {
                    jQuery('.interview-time-box').show();
                }
            });

            /******4-3-2017-notifications*****/
            company_notificationscount(); 
            
            jQuery('#form2').validate({
                    
                    focusInvalid: false, 
                
                    rules: {
                        delete_reason: {
                            required: true
                        },
                        password: {
                            required: true,
                            
                        }
                                
                    },
                    messages: {
                        delete_reason: {
                            required: 'Please enter reason'
                        },
                        
                        password: {
                            required: 'Please enter password to confirm'
                        },
                        
                    }
                }); 
            });
            
        </script>
        
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
    // Implement Interview Logic
    setInterval(getInterviewProject, 30000);    
    function getInterviewProject(){
        if(jQuery('#interviewModal').css('display') == 'block'){
            return;
        }
            
        jQuery.ajax({
            type: "GET",
            url: "/client/interview/"+jQuery('#company_id').val(),
            success: function (response) { // this happen after we get result
                if(response.project){
                    jQuery('#i_expert_name').html(response.expertise.name);
                    if(response.expertise.avatar){
                        jQuery('#i_expert_avatar').attr('src', response.expertise.avatar);
                    }                        
                    jQuery('#i_project_name').html(response.project.name);
                    jQuery('#i_project_description').html(response.project.description);
                    jQuery('#i_project_id').val(response.project.id);
                    jQuery('#i_user_id').val(response.expertise.id);
                    jQuery('#i_interview_time').val('')
                    jQuery('#message_content').val('');

                    var template = '<option value="" selected >Select Interview Time</option>';
                    template += '<option value="'+response.interview.interview_time+'">'+response.interview.interview_time+'</option>';
                    jQuery('#i_interview_type').html(template);
                    jQuery('#i_interview_type').selectpicker('refresh');

                    makeMainBlur();
                    jQuery('#interviewModal').modal('show');
                }                
            }
        });        
    }

    function onInterview(){
        if(jQuery('#gotMatch').hasClass('active')){
            jQuery('#intPropLink').trigger('click');
        } else {
            jQuery.ajax({
                type: "POST",
                url: "/client/interview/accept/"+jQuery('#company_id').val() + "/" + jQuery('#i_project_id').val(),
                data: {
                    _token: '<?php echo csrf_token(); ?>',
                    interview_time:  (jQuery('#i_interview_type').val() == '') ? jQuery('#i_interview_time').val() : jQuery('#i_interview_type').val(),
                    message: jQuery('#message_content').val(),
                    user_id: jQuery('#i_user_id').val()                    
                },
                success: function (response) { // this happen after we get result
                    jQuery('#interviewModal').modal('hide');                
                },
                error: function(){
                    jQuery('#interviewModal').modal('hide');                
                }
            });
        }
    }

    function onSkip(){
        jQuery.ajax({
            type: "POST",
            url: "/client/interview/skip/"+jQuery('#i_user_id').val() + "/"  + jQuery('#i_project_id').val(),
            data: {
                _token: '<?php echo csrf_token(); ?>'
            },
            success: function (response) { // this happen after we get result
                jQuery('#interviewModal').modal('hide');                
            },
            error: function(){
                jQuery('#interviewModal').modal('hide');                
            }
        });
    }
    </script> 
 
  </body>
</html>