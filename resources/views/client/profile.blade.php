<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Shokse</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="{{asset("images/favicon-icon.png")}}" sizes="16x16">
	<!--Bootstrap-->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">
    
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <!--font-awesome CSS-->
    <link href="{{asset("css/font-awesome.min.css")}}" rel="stylesheet">    
    <!--Custom Template CSS-->
    <link href="{{asset("css/main-account.css")}}" rel="stylesheet" type="text/css">
    <!--Media Query CSS-->
    <link href="{{asset("css/media-query-all.css")}}" rel="stylesheet" type="text/css"> 
    <!--slick CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("css/slick-theme.css")}}"/>    
    <link rel="stylesheet" type="text/css" href="{{asset("css/slick.css")}}"/>
    <!--Bootstrap-select-->
    <link href="{{asset("css/bootstrap-select.min.css")}}" rel="stylesheet">
  </head>
  
  <body>
    <header class="shokse-header block logged_header profile-notice">
    	<nav class="navbar container">
          <figure class="row">
            <figcaption class="navbar-header pull-left">
              <a class="navbar-brand" href="#"><img src="{{asset("images/shokse-logo.png")}}" class="img-responsive" alt="logo"/></a>
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
            <figcaption class="search_cover post_page1 navbar-collapse acCreation">
            	<!--<a href="#" class="userPic"></a>-->               
                <div class="dropdown user_icons user_notice">
                    <a class="dropdown-toggle bell compaby_bell" type="button" id="menu1" data-toggle="dropdown" href="#">
                        <span class="badge notice_count_badge"></span></a>
                    <div class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <div class="succes gray arrow_box"></div>
                    </div>
                </div>
                 <a href="/client/transaction" class="puzzel"></a>
               <ul class="nav navbar-nav" style="float:right">
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
            </figcaption>
            <!-- /.nav-right --> 
                      
          </figure>
          <!-- /row -->          
		</nav>
        <!-- /.container -->
    </header>
    <!-- /.shokse-header -->
  	<main class="block accCreation">
        <section class="block post_page2 ">
        	<article class="container">
            	<figure>
                    <h1 class="text-center">
                        <a class="navbar-brand" href="/client/manage" style="vertical-align: middle; line-height: 50px;margin-left: 60px;">
                            <img src="/images/left_arrow.png">
                        </a>                                        
                        
                        Complete Profile</h1>
                </figure>
            </article> 
    		<!-- /.container -->         
        </section>
    	<!-- /.duis-quis --> 
        <section class="block">
        	<article class="container">
            	<div class="mid_back post_page_content">
                	<div class="col100">
                        <div class="tabbing"> 
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                        	<a href="#perInfo" aria-controls="home" role="tab" data-toggle="tab" id="personal_link">PERSONAL INFORMATION</a>
                        </li>
                        <li role="presentation">
                        	<a href="#compInfo" aria-controls="profile" role="tab" data-toggle="tab" id="company_link">COMPANY INFORMATION</a>
                        </li>
                        <li role="presentation">
                        	<a href="#billInfo" aria-controls="home" role="tab" data-toggle="tab" id="bill_link">BILL INFORMATION</a>
                        </li>
                      </ul>
                      <!-- Tab panes -->
                      <form action="/client/profile" method="post" type="" enctype="multipart/form-data" id="form_profile">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="perInfo">
                                <div class="uploadImage">                           	
                                    <a href="javascript:;" id="broImg">
                                        @if ($user->avatar)
                                            <img src="{{$user->avatar}}" alt="upload image"/>
                                        @else
                                            <img src="{{asset("images/uploadImg.png")}}" alt="upload image"/>
                                        @endif
                                    </a>
                                    <div class="browsPic"><input id="broPic" type="file" name="avatar"/></div>
                                    <div class="errorText">UPLOAD FAILED</div>
                                    <div class="errorText1">Must be at least 200 x 200 px.</div>
                                </div>
                                <div class="pro_info">
                                    <div class="pro_info_box">
                                        <label>PERSONAL NAME</label>
                                        <input type="text" class="input1" placeholder="Enter Peronal Name" name="personal_name" value="{{$user->name}}"/>
                                    </div>
                                    <div class="pro_info_box">
                                        <label>COMPANY NAME</label>
                                        <input type="text" class="input1" placeholder="Enter Company name"  name="company_name" value="{{$user->company_name}}"/>
                                    </div>
                                    <div class="pro_info_box">
                                        <label>SELECT COUNTRY</label>
                                        <div class="select_cover">
                                            <select id="user_country" class="selectpicker red_drop" data-hide-disabled="true"  name="country">
                                                <option value="" selected>Select Country Here</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Canada">Canada</option>
                                                <option value="China">China</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="South Korea">South Korea</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="USA">USA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="pro_info_box">
                                        <label>E-MAIL</label>
                                        <input type="text" class="input1" placeholder="Enter email here" name="email" value="{{$user->email}}"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    <input type="button" class="btn cancelGrey" value="Cancel" id="cancel_button">
                                    <input type="button" class="btn compInfo" value="Company Info" id="company_info_button">
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="compInfo">
                                <div class="pro_info">
                                    <div class="pro_info_box">
                                        <label>COMPANY NAME</label>
                                        <input type="text" class="input1" placeholder="Company Name"  name="name" value="{{$company->name}}"/>
                                    </div>
                                    <div class="pro_info_box">
                                        <label>COMPANY ADRESS</label>
                                        <input type="text" class="input1" placeholder="Enter Company Adress"  name="address" value="{{$company->address}}"/>
                                    </div>
                                    <div class="pro_info_box">
                                        <label>COMPANY VAT NUMBER</label>
                                        <input type="text" class="input1" placeholder="Enter VAT Number"  name="vat_number" value="{{$company->vat}}"/>
                                    </div>
                                    <div class="pro_info_box">
                                        <label>INDUSTRY</label>
                                        <input type="text" class="input1" placeholder="Enter Industry"  name="industry" value="{{$company->industry}}"/>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <input type="button" class="btn compInfo rever" value="Personal Info" id="personal_info_back_button">
                                    <input type="button" class="btn compInfo" value="Bill Info" id="bill_info_button">
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="billInfo">
                                <div class="pro_info">
                                    <div class="pro_info_box">
                                        <label>BANK ACCOUNT NUMBER</label>
                                        <input type="text" class="input1" placeholder="Enter Back Account Number" name="bank_account" value="{{$company->bank_account}}"/>
                                    </div>
                                    <div class="pro_info_box">
                                        <label>BANK NAME</label>
                                        <input type="text" class="input1" placeholder="Enter Bank Name" name="bank_name" value="{{$company->bank_name}}"/>
                                    </div>
                                    <div class="pro_info_box">
                                        <label>BANK VAT NUMBER</label>
                                        <input type="text" class="input1" placeholder="Enter VAT Number" name="bank_vat" value="{{$company->bank_vat}}"/>
                                    </div>
                                    
                                    
                                    <div class="clearfix"></div>
                                    <input type="button" class="btn compInfo rever" value="Company Info" id="company_info_back_button">
                                    <input type="button" class="btn compInfo noAr" value="Save" id="save_button">
                                </div>
                            </div>
                        </div>
                      </form>
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
                	<a href="#" class="footer-logo"><img src="{{asset("images/shokse-footer-logo.png")}}" alt="footer-img" /></a>
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
                	<a href="#"><img src="{{asset("images/fb-icon.png")}}" alt="icon" /></a>
                    <a href="#"><img src="{{asset("images/twiter-icon.png")}}" alt="icon" /></a>
                    <a href="#"><img src="{{asset("images/link-in-icon.png")}}" alt="icon" /></a>
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
    <script type="text/javascript" src="{{asset("js/jquery.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/bootstrap.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/bootstrap-select.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/iscroll.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/main.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/slick.min.js")}}"></script> 
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
  
  <script type="text/javascript">
	jQuery(function($)
	{
        jQuery("#user_country").val("{{$user->country}}");
    	jQuery('#company_info_button').click(function(){
            jQuery('#company_link').trigger('click');    
	  	});

    	jQuery('#company_info_back_button').click(function(){
            jQuery('#company_link').trigger('click');    
	  	});

    	jQuery('#bill_info_button').click(function(){
            jQuery('#bill_link').trigger('click');    
	  	});

    	jQuery('#personal_info_back_button').click(function(){
            jQuery('#personal_link').trigger('click');    
	  	});

    	jQuery('#cancel_button').click(function(){
            window.location.href="/client/manage";
	  	});

    	jQuery('#save_button').click(function(){
            jQuery('#form_profile').submit();
	  	});

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
		
		$('#broImg').click(function(){
			
			$('#broPic').trigger('click')
			});
	  });
    /******4-3-2017-notifications*****/
     jQuery(document).ready(function() { 
        company_notificationscount();
	 }); 
  </script> 

  </body>
</html>