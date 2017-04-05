<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Shokse</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href='{{asset("images/favicon-icon.png")}}' sizes="16x16">
	<!--Bootstrap-->
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
	 <link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/datepicker.css")}} >
    <!--Bootstrap-select-->
    <link href='{{asset("css/bootstrap-select.min.css")}}' rel="stylesheet">
	
	
  </head>
  <?php
    $notif = \Notice::text()->all();
    $uid = Auth()->user()->id;
    $count = count(\Notice::text()->unread());
?>
  <body>
    <header class="shokse-header block logged_header profile-notice">
    	<nav class="navbar container">
          <figure class="row">
            <figcaption class="navbar-header pull-left">
              <a class="navbar-brand" href="#"><img src='{{asset("images/shokse-logo.png")}}' class="img-responsive" alt="logo"/></a>
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
            <figcaption class="search_cover post_page1 navbar-collapse">

                <a class="btn " href="{{ url('/client/manage')}}">Management</a>
                <!--<a href="#" class="bell"><span class="badge">{{ $count }}</span></a>-->
                <div class="dropdown user_icons user_notice">
                    <a class="dropdown-toggle bell compaby_bell lazylogin_bell" type="button" id="menu1" data-toggle="dropdown" href="#">
                        <span class="badge notice_count_badge">{{ $count }}</span></a>
                    <div class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <div class="succes gray arrow_box"></div>
                    </div>
                </div>
                <a href="{{ url('/auth/logout') }}" class="logout_btn">Logout</a>
                
            </figcaption>
            <!-- /.nav-right --> 
                      
          </figure>
          <!-- /row -->          
		</nav>
        <!-- /.container -->
    </header>
    <!-- /.shokse-header -->
<main class="block">
    <section class="block post_page2">
        <article class="container">
            <figure>
                <h1 class="text-center nonotexttransform">
                    <a class="navbar-brand" href="/client/manage" style="vertical-align: middle; line-height: 50px;margin-left: 60px;">
                        <img src="/images/left_arrow.png">
                    </a>                                                            
                    Post project</h1>
                <h6 class="text-center">Describe your project. Please be as thorough as possible. Based upon your description, Shokse will assign <span>you a project manager that specializes in your project.</span></h6>

            </figure>
        </article> 
        <!-- /.container -->         
    </section>
    <!-- /.duis-quis --> 
    <section class="block">
        <article class="container">
            <div class="mid_back post_page_content">
                <div class="col100">
                    <div class="head_cover">
                        <h3>PROJECT INFORMATION</h3>
                        <div class="clearfix"></div>
                        <small>Please fill the form below.</small>
                    </div>    
                    <form id="projectform" class="form-horizontal" action="{{ URL('/client/store') }}" role="form" method="post">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                        <div class="pro_info">
                            <div class="pro_info_box">
                                <label>PROJECT NAME</label>
                                <input type="text" class="input1" name='name' placeholder="This is a project name"/>
                                {!! $errors->first('name', '<label class="error" for="name">:message</label>') !!}

                            </div>
                            <div class="pro_info_box">
                                <label>TYPE OF WORK (Mobile, Web, etc.)</label>
                                <input type="text" class="input1" placeholder="Type of work" name="type"/>
                                {!! $errors->first('type', '<label class="error" for="type">:message</label>') !!}

                            </div>
                            <div class="pro_info_box">
                                <label>BUDGET ($)</label>
                                <input type="text" class="input1" placeholder="Budget information"  name="budget"  />
                                {!! $errors->first('budget', '<label class="error" for="budget">:message</label>') !!}

                            </div>
                            <div class="pro_info_box">
                                <label>COMPLETED IN</label>
                                <div class="select_cover">

                                    <small class="red_drop click_here1 enddate1">Enter completion date in calendar</small> 
                                    <input type="hidden" class="input1" placeholder="Enter completion date in calendar"  name="Endtime" id='Endtime' /> 

                                    <div class="calender" id='datepicker' style='width:70%;float:left;'>


                                    </div>
                                    <div class='calender redtextcls enddate2 ' style='width:30%;float:right;'>
                                    </div>
                                </div>
                                {!! $errors->first('Endtime', '<label class="error" for="Endtime">:message</label>') !!}

                            </div>
                            <div class="pro_info_box">
                                <label>TALENT ACQUIRED</label>
                                <div class="select_cover">
                                    <select id="first-disabled"  multiple="" name="tags[]" class="selectpicker red_drop" data-hide-disabled="true" >
                                        <option>Select skill set</option>
                                        <optgroup label="Web">
                                            <option value = "1">PHP</option>
                                            <option value = "2">JavaScript</option>
                                            <option value = "3">HTML5</option>
                                            <option value = "4">CSS</option>
                                            <option value = "5">UI/UX</option>
                                        </optgroup>
                                        <optgroup label="App">
                                            <option value = "6">Java</option>
                                            <option value = "7">Andriod development</option>
                                            <option value = "8">IOS development</option>
                                            <option value = "9">Swift</option>
                                        </optgroup>  
                                        <optgroup label="Database">
                                            <option value = "10">MongoDB</option>
                                            <option value = "11">Mysql</option>
                                            <option value = "12">Spark</option>
                                            <option value = "13">Hadoop</option>
                                        </optgroup>  
                                        <optgroup label="Machine learning">
                                            <option value = "14">Data analistics</option>
                                            <option value = "15">Data classering</option>
                                            <option value = "16">computer ration</option>
                                            <option value = "17">Data mining</option>
                                            <option value = "18">Natural launguage proccessing</option>
                                            <option value = "19">Rbotics</option>
                                        </optgroup>     

                                    </select>
                                    {!! $errors->first('tags', '<label class="error" for="skill_list">:message</label>') !!} 

                                </div>
                            </div> 


                            <div class="pro_info_box">
                                <label>PROJECT DESCRIPTION</label>
                                <div class="select_cover">
                                    <small class="click_here">Tell us more details about your project</small>
                                    <textarea name="description" placeholder="DESCRIPTION" ></textarea>
                                    {!! $errors->first('description', '<label class="error" for="description">:message</label>') !!}

                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <input type="submit" class="btn post_now" value="Post now">
                            <a href="/client/manage" class="btn post_now" >Cancel</a>

                        </div>
                    </form>
                </div>
            </div>
        </article> 
        <!-- /.container -->         
    </section>
	
	

</main><!-- /main -->

<footer class="block shokse-footer">
    	<article class="container">
        	<figure class="shokse-footer-top col-md-16 col-sm-16 col-xs-16">
            	<figcaption class="col-md-8 col-sm-8 col-xs-16 footer-left">
                	<a href="#" class="footer-logo"><img src='{{asset("images/shokse-footer-logo.png")}}' alt="footer-img" /></a>
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

<!-- <script src='{{asset("js/jquery.js")}}'></script> -->




<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- bootstrap v3.3.7 js -->
<script src="{!! Request::root().'/assets/js/bootstrap.min.js' !!}"></script>
<!-- Select2 4.0.3 js -->
<script src="{!! Request::root().'/assets/js/select2.min.js' !!}"></script>

<script src='{{asset("js/bootstrap-select.min.js")}}'></script>
<script src='{{asset("js/iscroll.js")}}'></script>
<script src='{{asset("js/main.js")}}'></script>
<script src='{{asset("js/slick.min.js")}}'></script> 
<script src='{{asset("js/expertise/vendor/bootstrap-datepicker.js")}}'></script>
<script type="text/javascript" src="/js/notification.js"></script>


<style>
    .select2-container--default .select2-selection--multiple,
    .select2-container--default.select2-container--focus .select2-selection--multiple{
        border: none;
        outline: 0;
        font-size: 16px;
    }
    .datepicker-inline {
        width: 100%;
    }
    .datepicker table {
        width: 100%;
    }
    .datepicker table tr td.today {
        background-color:#f83958 !important;
        background-image:none !important;
        color:#FFFFFF;

    }
    .datepicker table tr td.today:hover {
        color:#FFFFFF !important;

    }
</style>
 <script>
    var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var monthNames = ["January", "February", "March", "April", "May", "June",
                         "July", "August", "September", "October", "November", "December"];
    jQuery('#datepicker').datepicker({
        format: 'dd-mm-yyyy',
                startDate: '-0d',
                inline: true,
                sideBySide: true,
                todayHighlight: true,
        }).on('changeDate', function(e){
        $('#Endtime').val(e.format('dd-mm-yyyy'));
        var d = new Date(e.date);
        $(".enddate1").html(weekday[d.getDay()] + " " + monthNames[d.getMonth()] + " " + d.getDate() + " " + d.getFullYear());
        $(".enddate2").html(weekday[d.getDay()] + " </br> " + monthNames[d.getMonth()] + " " + d.getDate() + " " + d.getFullYear());
    
        $('#Endtime').valid();  
        jQuery('.calender').slideToggle();
        });
   </script>
<script type='text/javascript'>
    function OpenHoverstate(id) {

    jQuery("#open_" + id).hide();
    jQuery("#open_" + id).animate({"left":"810px"}, "slow");
    jQuery("#close_" + id).show();
    jQuery("#close_" + id).animate({"left":"0px"}, "slow");
    }

    function CloseHoverstate(id) {
    jQuery("#close_" + id).hide();
    jQuery("#close_" + id).animate({"left":"810px"}, "slow");
    jQuery("#open_" + id).show();
    jQuery("#open_" + id).animate({"left":"0px"}, "slow");
    }

</script> 

<script type="text/javascript">
    jQuery("#opent1a .dot_icon").click(function() {});
    jQuery("#open1a .close_icon").click(function() {});
    jQuery('.dot_icon').click(function(){
    //alert(jQuery(this).parent().attr('class'));
    jQuery('.mid_other1').fadeOut("slow");
    jQuery(this).parent().next().fadeIn("slow", function() {
    // Animation complete.
    });
    });
    jQuery('.close_icon').click(function(){
    jQuery(this).parent().fadeOut("slow", function() {
    // Animation complete.
    });
    });
    jQuery(document).on('click', '.close_btn', function(){
    jQuery(this).parent().fadeOut("slow", function(){});
    });</script> 


<script type="text/javascript">
    jQuery(function()
    {
    jQuery('.click_here').click(function(){
    //alert(jQuery(this).parent().attr('class'));
    jQuery('textarea').slideToggle();
    // Animation complete.
    });
    jQuery('.click_here1').click(function(){
    //alert(jQuery(this).parent().attr('class'));
    jQuery('.calender').slideToggle();
    // Animation complete.
    });
    });</script> 

<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('js/jquery.validate.js') }}"></script>
<!-- form validation script-->
<script>
    $(document).ready(function() {
    
    /******3-3-2017-notifications*****/
    company_notificationscount();

    $('#projectform').validate({
    //focusInvalid: false, 
            ignore: [],
            //    ignore: ':not(select:hidden, input:visible, textarea:visible)',
            //ignore: ":hidden:not(.selectpicker)",
            rules: {
            name: {
            required: true
            },
                    type: {
                    required: true
                    },
                    budget: {
                    required: true,
					number:true
                    },
                    Endtime: {
                    required: true
                    },
                    description: {
                    required: true
                    },
                    'tags[]': {
                    required: true
                    },
            },
            messages: {
            name: {
            required: 'Please enter project name'
            },
                    type: {
                    required: 'Please enter type'
                    },
                    budget: {
                    required: 'Please enter budget',
					 number: 'Please enter proper value'
                    },
                    'tags[]': {
                    required: 'Please enter tags'
                    },
                    description: {
                    required: 'Please enter description'
                    },
                    Endtime	: {
                    required: 'Please enter end date'
                    },
            },
            errorPlacement: function(error, element) {
            if (element.attr("name") == "tags[]") {
                error.insertAfter(".select_cover .bootstrap-select");
            } else {
                error.insertAfter(element);
            }
            },
    });
    });
    (function ($) {
    $.fn.toggleDisabled = function () {
    return this.each(function () {
    var $this = $(this),
        id = $this.attr('id'),
        label = $this.next('label[for="' + id + '"]');
    if ($this.prop('disabled')) {
        label.show();
        $this.prop('disabled', false).show();
    } else {
        label.hide();
        $this.prop('disabled', true).hide();
    }
    });
    };
    })(jQuery);
</script>

