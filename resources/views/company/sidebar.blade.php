<div id="menu" class="hidden-print hidden-xs sidebar-blue sidebar-brand-primary">
	<div id="sidebar-fusion-wrapper">
		<div id="brandWrapper" style="background-color: #3DDAF3">
			<a href="{!! URL::route('project')!!}"><span class="text">Expertise</span></a>
		</div>

		<div id="logoWrapper">
			<div id="logo">
				<div id="toggleNavbarColor" data-toggle="navbar-color">
					<a href="" class="not-animated color color-white"></a>

				</div>

			</div>
		</div>
	    <ul class="menu list-unstyled" id="navigation_current_page">
	       	<li class="treeview {!! ($pageNo == 1) ? 'active' : '' !!}">
				<a href="{!! URL::route('project.view',[$projectId])!!}">
                	<i class="fa fa-dashboard"></i>
                    <span>Manage Project</span>
				</a>

			</li>

			<li class="treeview {!! ($pageNo == 4) ? 'active' : '' !!}">
				<a href="{!! URL::route('project.user',[$projectId])!!}">
					<i class="fa fa-user"></i>
					<span>Team Management</span>
				</a>

			</li class="treeview {!! ($pageNo == 4) ? 'active' : '' !!}">



			<li class="treeview {!! ($pageNo == 3) ? 'active' : '' !!}">
				<a href="{{ url::action('PageController@index',[$projectId])}}">
					<i class="fa fa-bookmark-o"></i>
					<span>Agreement</span>
				</a>

			</li class="treeview {!! ($pageNo == 3) ? 'active' : '' !!}">
		</ul>
	</div>
</div>

