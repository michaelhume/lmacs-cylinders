<header>
  <!-- Fixed navbar -->
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item {{ Request::is('cylinders*') ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('cylinders.index') }}">Cylinders</a>  
				</li>
				<li class="nav-item {{ Request::is('gases*') ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('gases.index') }}">Gasses</a>
				</li>
				<li class="nav-item dropdown {{ Request::is('charts*') ? 'active' : '' }}">
					<a class="nav-link" dropdown-toggle data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{ route('charts.index') }}">Charts</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('charts.show', 'bar') }}">Bar</a>
						<a class="dropdown-item" href="{{ route('charts.show', 'line') }}">Line</a>
					</div>
				</li>
			</ul>
      
			<!-- to sort out later - auth login -->
			@if (Route::has('login'))
				<div class="top-right links">
			    @auth
			        <a href="{{ url('/home') }}">Home</a>
			    @else
			        <a href="{{ route('login') }}">Login</a>
			
			        @if (Route::has('register'))
			            <a href="{{ route('register') }}">Register</a>
			        @endif
			    @endauth
			</div>
			@endif
	  
			<!-- more for later - searching?  
			<form class="form-inline mt-2 mt-md-0">
			<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
			-->
		</div>
  </nav>
</header>