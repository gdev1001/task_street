<!DOCTYPE html>
<html>
	<head>
	    <title>CORAL (v2.0.0-rc1)</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	    
	    <link rel="stylesheet" href="/assets/css/admin/module.admin.stylesheet-complete.min.css" />
		
		
		<script src="/assets/library/jquery/jquery.min.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/library/jquery/jquery-migrate.min.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/library/modernizr/modernizr.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/plugins/core_less-js/less.min.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/plugins/charts_flot/excanvas.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/plugins/core_browser/ie/ie.prototype.polyfill.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script> 
		<script>
			if (/*@cc_on!@*/false && document.documentMode === 10) { 
				document.documentElement.className+=' ie ie10'; 
			}
		</script>
		
		@yield('styles')
		@yield('custom-styles')
	</head>
	
	<body>
	    <div class="container-fluid">
	    	<div id="menu-top">
				<div class="container">
					<ul class="main pull-left">
						
					</ul>
					<ul class="colors pull-right hidden-xs">
						
						
					</ul>
				</div>
			 </div>
			 <!-- Nav Bar -->   
			 <div class="navbar navbar-coral navbar-fixed-top">
			    <!-- Nav Bar Header -->       
			    <div class="container">
			        <div class="navbar-header">
			            <button type="button" class="navbar-toggle " data-toggle="collapse" data-target=".navbar-collapse">
			                <span class="icon-bar "></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			            </button>
			            <a class="navbar-brand" href="">Question</a>
			            
			        </div>
			        <!-- Nav Bar Right -->  
			        <ul class="nav navbar-nav navbar-right right-side">
			            <!-- User LogIn Button -->
			            <li> 
			                <div class="btn-group">
			                    <a href="{!! URL::route('user.profile') !!}" class="btn btn-signup glyphicons user_add"><i></i>Go Task</a>
			                </div>
			            </li>
			        </ul>        
			        <ul class="nav navbar-nav navbar-right right-side">
			            <!-- User LogIn Button -->
			            <li> 
			                <div class="btn-group">
			                    <a href="{!! URL::route('project') !!}" class="btn btn-signup glyphicons user_add"><i></i>Go Project</a>
			                </div>
			            </li>
			        </ul>
			    </div>
			 </div>
	    
		     @yield('body')
		    
		     <div id="footer" class="hidden-print">
		     </div>
		</div>
		<!-- Global -->
	    <script data-id="App.Config">
	        var App = {};        var basePath = '',
	            commonPath = '/assets/',
	            rootPath = '../',
	            DEV = false,
	            componentsPath = '/assets/components/';
	
	        var primaryColor = '#eb6a5a',
	            dangerColor = '#b55151',
	            successColor = '#609450',
	            infoColor = '#4a8bc2',
	            warningColor = '#ab7a4b',
	            inverseColor = '#45484d';
	
	        var themerPrimaryColor = primaryColor;
	    </script>
	    
	    
		<script src="/assets/library/bootstrap/js/bootstrap.min.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/plugins/core_nicescroll/jquery.nicescroll.min.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/plugins/core_breakpoints/breakpoints.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/plugins/core_preload/pace.min.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/components/core_preload/preload.pace.init.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2"></script>
		<script src="/assets/components/core/core.init.js?v=v2.0.0-rc1"></script>
		<script src="/assets/js/bootbox.min.js"></script>
		
		@yield('scripts')
		@yield('custom-scripts')
	</body>

</html>