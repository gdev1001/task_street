@if(isset($popup) && $popup == 1)
<div class="modal-header" style="border: 0">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: static;" onClick="removeMainBlur();">&times;</button>   
</div>
@endif
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Shokse client project</title>
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
  </head>
  <body>
  @if(!isset($popup))
    <header class="shokse-header block">
    	<nav class="navbar container">
          <figure class="row">
            <figcaption class="navbar-header pull-left">
              <a class="navbar-brand" href="#"><img src='{{asset("images/shokse-logo.png")}}' class="img-responsive" alt="logo"/></a>
              <button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target="#mobileMenuCollapsing">
                 <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
            </figcaption>
            <figcaption class="search_cover navbar-collapse">
                <a class="btn" href="" style="float: left; margin-right: 10px" id="agreement_button">Agreement</a>
               <ul class="nav navbar-nav" style="float:right; margin-left: 20px;">
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
								<a href="{{ url('/client/manage')}}" class="dropdown-toggle" >Account</a>
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
	@endif
   <!-- /.shokse-header -->
    <main class="block">
        <section class="block duis-quis client_page">
            <!-- <article class="container" > -->
                <article>
                <figure>
                    <h1 class="text-center"> 
                        @if($isCompany && !isset($popup))
                            <a class="navbar-brand" href="/client/manage" style="vertical-align: middle; line-height: 50px;margin-left: 50px;">
                                <img src="/images/left_arrow.png">
                            </a>  
                        @endif
                    
                        {{ $projectname }}  <a href="#" class="drop"></a></h1>
                    <h6 class="text-center deco1">MILESTONE STATUS</h6>
                </figure>
            </article> 
            <!-- /.container -->         
        </section>
        <!-- /.duis-quis --> 
        <section class="block">
            <!-- <article class="container"> -->
                <article class="">
                <div class="mid_back_new">
                    <div class="col-50">
                       
                        @foreach($pages as $page)
                        <div class="click_box clr1" id="opent2a">
                            <div class="text_cover">
                                <div class="title_name">{{ $page->title }}</div>

                               <span>Update at: {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$page->updated_at)->diffForHumans()}}</span>   

                            </div> 
                                @if ($page->title == 'Agreement')
                                    <input type="hidden" id="agreement_url" value="{{url("/".$name."/wiki/".$page->id)}}">
                                @endif
                               <a href={{url("/".$name."/wiki/".$page->id)}}><div class="dot_icon"  onClick="OpenHoverstate('1')"> 
                                <div id="wave">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                                </div></a>
							@if($page->isCheck==1)
							<div class="counter"><i class="fa fa-check" aria-hidden="true"></i></div>
							@endif	
                        </div>
                        @endforeach
                    </div>
                    </div>
                
            </article> 
            <!-- /.container -->         
        </section>
    </main> 
    <!-- /main -->
        
<div class="container-fluid">
    <div class="col-md-12">
    </div>
</div>
@if(!isset($popup))
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
@endif	
  	<!-- /footer.shokse-footer -->
    <script type="text/javascript" src='{{asset("js/jquery.js")}}'></script>
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

  </body>
</html>


<script>
jQuery(document).ready(function() {
    jQuery('#agreement_button').attr('href', jQuery('#agreement_url').val());
});
    function goBack(){
        window.history.back();
    }
</script>
