<div class="cta-sidebar">
	<div class="cta-menu-bar">
		
		<a href="{{url('/')}}/dashboard" class="brand-link">
		<span style="font-size: 18px;" class="brand-text font-weight-light">Welcome {{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
		</a><br><br>

		<ul class="cta-menu">
			<li><a class="{{ Route::currentRouteName() === 'dashboard.index' ? 'nav-active' : '' }}" href="{{route('dashboard.index')}}">Profile</a></li>
			<li><a class="" href="{{route('track')}}">Track</a></li>
			<li><a class="{{ Route::currentRouteName() === 'plans' ? 'nav-active' : '' }}" href="{{route('plans')}}">Edit Plan</a></li>
			<li style="display:none;"><a class="{{ Route::currentRouteName() === 'myalerts' || Route::currentRouteName() === 'editalert' ? 'nav-active' : '' }}" href="{{route('myalerts')}}">My Alerts</a></li>
			<li><a class="{{ Route::currentRouteName() === 'logout' ? 'nav-active' : '' }}" href="{{route('logout')}}">Logout</a></li>
		</ul>
	</div>
</div>