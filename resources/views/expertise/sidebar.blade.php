<div id="menu" class="hidden-print hidden-xs sidebar-blue sidebar-brand-primary">
	<div id="sidebar-fusion-wrapper">
		<div id="brandWrapper">
			<a href="{!! URL::route('project')!!}"><span class="text">Expertise</span></a>
		</div>
		<div id="logoWrapper">
			<div id="logo">
				<div id="toggleNavbarColor" data-toggle="navbar-color">
					<a href="" class="not-animated color color-blue active"></a>
					<a href="" class="not-animated color color-white"></a>
					<a href="" class="not-animated color bg-primary"></a>
					<a href="" class="not-animated color color-inverse"></a>
				</div>
			</div>
		</div>
	    <ul class="menu list-unstyled" id="navigation_current_page">
	       	<li class="treeview {!! ($pageNo == 1) ? 'active' : '' !!}">
				<a href="{!! URL::route('expertise')!!}">
                	<i class="fa fa-circle-o"></i>
                    <span>Manage Project</span>
				</a>
			</li>
<!-- 			<li class="treeview {!! ($pageNo == 2) ? 'active' : '' !!}"> -->
<!-- 				<a href="{!! URL::route('company.question')!!}"> -->
<!--                 	<i class="fa fa-circle-o"></i> -->
<!--                     <span>Check Question</span> -->
<!-- 				</a> -->
<!-- 			</li> -->
	    </ul>
	</div>
</div>

<div id="menu_kis" class="hidden-print sidebar-light">

	<div>
		<ul class="list-unstyled">
	
			<li><a href="index.html" class="glyphicons globe"><i></i><span>Social</span></a></li>
	
			<li><a href="realestate_listing_map.html" class="glyphicons home"><i></i> Estate</a></li>
			
			<li><a href="events.html" class="glyphicons google_maps"><i></i> Events</a></li>
			
			<li><a href="news.html" class="glyphicons notes"><i></i> Content</a></li>
			
			<li><a href="gallery_video.html" class="glyphicons picture"><i></i><span>Media</span></a></li>
			
			<li><a href="tasks.html" class="glyphicons share_alt"><i></i><span>Tasks</span></a></li>
			
			<li><a href="support_tickets.html" class="glyphicons life_preserver"><i></i><span>Support</span></a></li>
			
			<li><a href="medical_overview.html" class="glyphicons circle_plus"><i></i><span>Medical</span></a></li>
			
			<li><a href="courses_2.html" class="glyphicons crown"><i></i> Learning</a></li>
			
			<li><a href="finances.html" class="glyphicons calculator"><i></i> Finance</a></li>
			
			<li><a href="shop_products.html" class="glyphicons shopping_cart"><i></i><span>Shop</span></a></li>
			
			<li><a href="survey.html" class="glyphicons turtle no-ajaxify"><i></i><span>Surveys</span></a></li>
			
			<li><a href="dashboard_analytics.html" class="glyphicons plus"><i></i><span>Other</span></a></li>
			
			<li><a href="../front/index.html" class="glyphicons leather" target="_blank"><i></i><span>Website</span></a></li>		
		</ul>
	</div>
</div>
