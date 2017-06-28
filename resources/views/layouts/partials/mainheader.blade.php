<!-- Main Header -->
<header class="main-header">

	<!-- Logo -->
	<a href="{{ url('/home') }}" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>E</b>PCH</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>E</b>PURCHASING</span>
	</a>

	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
		</a>
		{{-- <img src="{{asset('img/login.png')}}" alt=""> --}}
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				@if (Auth::guest())
					<li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
					<li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
				@else
					<!-- User Account Menu -->
					<li class="dropdown user user-menu">
						<!-- Menu Toggle Button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<!-- The user image in the navbar-->
							{{-- <img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="User Image"/> --}}
							<!-- hidden-xs hides the username on small devices so only the image appears. -->
							<i class="fa fa-user-circle" aria-hidden="true"></i>
							<span class="hidden-xs">{{ Auth::user()->name }}</span>
						</a>
						<ul class="dropdown-menu">
							<!-- The user image in the menu -->
							<li class="user-header">
								<img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
								<p>
									{{ Auth::user()->name }}
									<small>{{ Auth::user()->department }}</small>
								</p>
							</li>
							<!-- Menu Body -->
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-right">
									<a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
									   onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										{{ trans('adminlte_lang::message.signout') }}
									</a>

									<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										{{-- {{ csrf_field() }} --}}
										<input type="submit" value="logout" style="display: none;">
									</form>

								</div>
							</li>
						</ul>
					</li>
				@endif

				<!-- Control Sidebar Toggle Button -->
				{{-- <li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li> --}}
			</ul>
		</div>
	</nav>
</header>
