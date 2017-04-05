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
                <!--create wiki page link for agreement-->
                {{-- */$wikipage = "#"/* --}}
                @if ($project->pages != "")
                    @foreach($project->pages as $page) 
                        @if ($page->title == "Agreement")
                           {{-- */$wikipage = url("/".$project->id."/wiki/".$page->id)/* --}}
                        @endif 
                    @endforeach
                @endif 

                <a class="btn" href={{$wikipage}} style="float: left; margin-right: 20px">Agreement</a>
            	<!--<a href="#" class="userPic"></a>
                <a href="#" class="bell"><span class="badge">0</span></a>
                 <a href="/client/transaction" class="puzzel"></a>
                 -->               
                <div class="dropdown user_icons user_notice">
                    <a class="dropdown-toggle bell compaby_bell" type="button" id="menu1" data-toggle="dropdown" href="#">
                        <span class="badge notice_count_badge"></span></a>
                    <div class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <div class="succes gray arrow_box"></div>
                    </div>
                </div>
                <a href="/client/transaction" class="puzzel"></a>

                <ul class="nav navbar-nav" style="float:right;  margin-left: 20px !important;">
					<li class="menu-item dropdown">
						 <a href="#" class="dropdown-toggle menu_1" data-toggle="dropdown">
							<span></span>
							<span class="mid"></span>
							<span></span>
						</a>	
						
						<ul class="dropdown-menu">
                            <li class="menu-item dropdown dropdown-submenu">
                                <a href="{{ url('/client/invite')}}" class="dropdown-toggle" >Invite Expert</a>
                            </li>
							<li class="menu-item dropdown dropdown-submenu">
								<a href="{{ url('/client/manage')}}" class="dropdown-toggle" >Account</a>
							</li>
							<li class="menu-item dropdown dropdown-submenu">
								<a href="{{ url('/auth/logout') }}" class="dropdown-toggle" >Sign Out</a>
							</li>
						</ul>
					</li>
				</ul>
                <!--
                <a href="#" class="search"></a>
                -->
            </figcaption>
            <!-- /.nav-right --> 
                      
          </figure>
          <!-- /row -->          
        </nav>
        <!-- /.container -->
    </header>
    <!-- /.shokse-header -->
    <?php 
    //echo "<pre>";
    //print_r($project);
    ?>
    <main class="block">
        <section class="block duis-quis client_page">
            <article class="container">
                <figure>
                    <h1 class="text-center">
                        <a class="navbar-brand" href="/client/manage" style="vertical-align: middle; line-height: 50px;margin-left: 60px;">
                            <img src="/images/left_arrow.png">
                        </a>                                        
                        @if(!empty($project->name)) {{ $project->name }} @endif<a href="#" class="drop"></a>
                    </h1>
                    <h6 class="text-center deco1">MILESTONE STATUS</h6>
                    <div class="progress_cover">
                        <div class="progress">
							{{-- */$pro_bar = getProgress($project->tasks()->where('status','=',1)->count(),$project->tasks()->count())/* --}}
                          <div class="progress-bar gradiante" role="progressbar" aria-valuenow="{{$pro_bar}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$pro_bar}}%;">
                            PROGRESS<span class="span1">{{$pro_bar}}</span>
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
                <div class="mid_back page_change1">
                    <div class="mid_back_in ">
                        <div class="count_round">{{$project->tasks()->count()}}</div>
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
                        <!--
                        <a href="#" class="btn2">CREATE NEW MILESTONE</a>
                        -->
                    </div>
                    
                    <div class="col-50">
                    
                    
                        <div class="click_box clr1"  id="opent1a">
                            <div class="text_cover">
                                <div class="title_name">Description</div>
                                <span>LAST UPDATE {{date('m/d/Y',strtotime(@$project->updated_at))}}</span> 
                            </div>    
                            <div class="dot_icon"> 
                                <div id="wave">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mid_other1" id="open1a" style="display:none;">
                            <div class="date">DUE DATE: 11/07/2017</div>
                            <div class="clearfix"></div>
                            <div class="milestone_cover">
                                <div class="part_left">
                                    <div class="l_milestone">Description
                                        <div class="dot_cover">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>    
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="task skills">skills</div> 
                                    <div class="tag_cover">
                                            
                                        
                                        @if ($project->skill != "")
                                          @foreach($project->skill as $info) 
                                             <div class="tag">{{$info->name}}</div>
                                          @endforeach
                                        @endif      
                                      
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="task budget">budget description</div>
                                    <div class="head_line_cover">
                                        <div class="head_line_l">
                                            <small>{!!$project->description!!}</small>    
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="part_right">
                                    <div class="r_milestone"><div class="watch_cover"></div></div>
                                    <div class="head_line_r">
                                        <div class="time_text">start time:</div>
                                        <div class="clearfix"></div>
                                        <div class="date_text">{{date('m/d/Y',strtotime(@$project->created_at))}}</div>
                                        <div class="clearfix"></div>
                                        <div class="time_text">{{date('h:i A',strtotime(@$project->created_at))}}</div>
                                    </div>
                                    <div class="head_line_r">
                                        <div class="time_text">ESTIMATED END time:</div>
                                        <div class="clearfix"></div>
                                        <div class="date_text">{{date('m/d/Y',strtotime(@$project->end_time))}}</div>
                                        <div class="clearfix"></div>
                                        <div class="time_text">{{date('h:i A',strtotime(@$project->end_time))}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="close_icon"> &nbsp;</div>
                        </div>
                        
                        <div class="click_box clr1" id="opent2a">
                            <div class="text_cover">
                                <div class="title_name">Deliverable</div>
                                <span>LAST UPDATE {{date('m/d/Y',strtotime(@$project->updated_at))}}</span> 
                            </div>    
                            <div class="dot_icon"  onClick="OpenHoverstate('1')"> 
                                <div id="wave">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mid_other1" id="open1a" style="display:none;">
                            <div class="date">DUE DATE: {{date('m/d/Y',strtotime(@$project->end_time))}}</div>
                            <div class="clearfix"></div>
                            <div class="milestone_cover">
                                <div class="l_milestone">Deliverable
                                    <div class="dot_cover">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>    
                                </div>
                                
                                @if($project->tasks()->count()> 0)
                                {{-- */$pro_com = round($project->tasks()->where('status','=',1)->count()/$project->tasks()->count(),2)*100/* --}}
                                @else
                                {{-- */$pro_com = 0/* --}}
                                @endif
                                
                                <div class="r_milestone">{{$pro_com}}%
                                    <div class="clearfix"></div>
                                    <span>COMPLETED</span></div>
                            </div>
                            <div class="clearfix"></div>
                                                     
                             
                             <div class="head_line_r">
                                <br><br>
                                {{$project->tasks()->where('status','=',1)->count()}} / <strong>@if(!empty($project->tasks)){{$project->tasks->count()}} @endif </strong>
                               
                                <div class="clearfix"></div>
                                <span>TASKS</span>
                            </div>
                            <!-- task submission start-->
                            
                            {{-- */ $countsubmission = 0/* --}}
                            @foreach($project->tasks()->get() as $tasks)
								
                                {{-- */$task_submission = $tasks->submission()->where('task_id','=',$tasks->id)->get() /* --}}
                                @if(count($task_submission)!=0)
                                <div class="clearfix"></div>
                                <div class="task">{{$tasks->name}}</div>  
                                <div class="clearfix"></div>
                                
                                
                                <div class="clearfix"></div>
                                <div class="task link">LINKS<span class="badge">{{@count($task_submission)}}</span></div>
                                
                                
                                <div class="head_line_cover">
                                    <div class="head_line_l">
                                        <div class="link_cover">
                                            {{-- */$countsub=1;/* --}}
                                            @foreach($task_submission as $submission)
                                                @if($submission)
                                                    @if($countsub<=3)
                                                    
                                                        @if($submission->validated == 2)
                                                        <a href="{!! URL::route('expertise.task.download', $tasks->id)!!}" class="link">Complete</a>
                                                        @elseif($submission->validated == 1)
                                                        <a href="{!! URL::route('expertise.task.download', $tasks->id)!!}" class="link">Validating</a>  
                                                        @endif
                                                            
                                                    @else
                                                        @if(@$countsub==4)
                                                        <div class="readmore_div">
                                                        @endif
                                                            @if($submission->validated == 2)
                                                            <a href="{!! URL::route('expertise.task.download', $tasks->id)!!}" class="link">Complete</a>
                                                            @elseif($submission->validated == 1)
                                                            <a href="{!! URL::route('expertise.task.download', $tasks->id)!!}" class="link">Validating</a>  
                                                            @endif
                                                        @if(@$countsub==count($task_submission))
                                                        </div>
                                                        @endif
                                                    @endif
                                                @endif      
                                             {{-- */$countsub++;/* --}} 
                                            @endforeach
                                            
                                            @if(@count($task_submission)>=4)
                                                <a href="#" class="link_more readmore">and {{@count($task_submission)-3}} more</a>
                                            @endif
                                            
                                        </div>                
                                    </div>
                                </div>
								{{-- */$countsubmission++/* --}}
								
                            @endif
							
                            @endforeach 
							@if($countsubmission==0)
								<div class="clearfix"></div>
								<div class="task">Nothing in deliverable</div>  
								<div class="clearfix"></div>
							 @endif
                            
                            <!-- task submission end-->
                            
                            <div class="close_icon"> &nbsp;</div>
                        </div>
                        
                        <div class="click_box clr1">
                            <div class="text_cover">
                                <div class="title_name">Documentation</div>
                                <span>LAST UPDATE {{date('m/d/Y',strtotime(@$project->updated_at))}}</span> 
                            </div>    
                            <div class="dot_icon"  onClick="OpenHoverstate('1')"> 
                                <div id="wave">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mid_other1" id="open1a" style="display:none;">
                            <div class="date">DUE DATE: {{date('m/d/Y',strtotime(@$project->end_time))}}</div>
                            <div class="clearfix"></div>
                            <div class="milestone_cover">
                                <div class="l_milestone">Documentation
                                    <div class="dot_cover">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>    
                                </div>
                                <div class="r_milestone">
                                    <div class="clearfix"></div>
                                    <span></span></div>
                            </div>
                            <div class="clearfix"></div>
                            @if(@$pages)
                            <div class="task dock">Documentation materials<span class="badge">{{@$pages->count()}}</span></div>
                            <div class="head_line_cover">
                                <div class="head_line_l">
                                    <div class="link_cover">
                                        
                                        {{-- */$count=1;/* --}}
                                        @foreach ($pages as $page)
                                        
                                            @if($count<=3)
                                            <a class="link" href={{url("/".$project->id."/wiki/".$page->id)}}>{{ $page->title }}</a>
                                                
                                            @else
                                                @if(@$count==4)
                                                <div class="readmore_div">
                                                @endif
                                                    <a class="link" href={{url("/".$project->id."/wiki/".$page->id)}}>{{ $page->title }}</a>
                                                @if(@$count==@$pages->count())
                                                </div>
                                                @endif
                                             @endif
                                            
                                             {{-- */$count++;/* --}}
                                                                                 
                                        @endforeach
                                        @if(@$pages->count()>=4)
                                            <a href="#" class="link_more readmore">and {{@$pages->count()-3}} more</a>
                                        @endif
                                                                                
                                    </div>                
                                </div>
                            </div>
                            @else
                             <div class="task dock">No document current available on this project<span class="badge"></span></div>
                             @endif
                            <div class="close_icon"> &nbsp;</div>
                        </div>
                    </div>
                    <div class="col-50 work_stat">
                        @foreach(@$project->tasks()->where('status','=',0)->get()->chunk(2) as $tasks)
                        
                        <div class="click_box active">
                            <div class="text_cover">
                                <div class="title_name">{{@$tasks[0]->name}}</div>
                                <span>LAST UPDATE {{date('m/d/Y',strtotime(@$tasks[0]->updated_at))}}</span>    
                            </div>    
                            <div class="dot_icon"  onClick="OpenHoverstate('1')"> 
                                <div id="wave">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mid_other1 " style="display:none;">
                            <div class="close_btn"></div>   
                            <div class="date">CREATED DATE {{date('m/d/Y',strtotime(@$tasks[0]->created_at))}}</div>
                            <div class="work_status">Working</div>
                            <div class="clearfix"></div>
                            <div class="milestone_cover">
                                <div class="l_milestone">{{@$tasks[0]->name}}
                                    <div class="dot_cover">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>    
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="task">TASK DETAILS</div>  
                            <div class="clearfix"></div>
                            <div class="head_line_cover">
                                <div class="head_line_l">
                                    <small>{{@$tasks[0]->description}}</small>    
                                </div>
                            </div>  
                            <!--<div class="close_icon"> &nbsp;</div>-->
                        </div>
                        @endforeach
                       
                        @foreach(@$project->tasks()->where('status','=',1)->get() as $tasks)
                        
                        <div class="click_box">
                            <div class="text_cover">
                                <div class="title_name">{{@$tasks->name}}</div>
                                <span>CREATED DATE {{date('m/d/Y',strtotime(@$tasks->created_at))}}</span>  
                            </div>    
                            <div class="dot_icon"  onClick="OpenHoverstate('1')"> 
                                <div id="wave">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>
                    </div>
                </div>
            </article> 
            <!-- /.container -->         
        </section>
    </main> 
    <!-- /main -->
    
    
    
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
    <script type="text/javascript" src="/js/iscroll.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/slick.min.js"></script> 
    <script type="text/javascript" src="/js/notification.js"></script>
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
    
    jQuery(".readmore").click(function()
    {
        var thisel = jQuery(this);
        jQuery(this).prev(".readmore_div").slideDown('slow');
        jQuery(this).fadeOut();
        return false;
    });
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

  </body>
