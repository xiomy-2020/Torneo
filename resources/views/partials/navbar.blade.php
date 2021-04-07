<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="{{url('/')}}">TORNEO</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" arial-label="Toggle navigation"><span class="navbar-togller-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarNavDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EQUIPOS</a>
					<div class="dropdown-menu" aria-labelledby="navbarNavDropdownMenuLink">
						<a class="dropdown-item" href="{{url('/equipos')}}">Ver Equipos</a>
						@if(Auth::user()->rol ==1)
						<a class="dropdown-item" href="{{url('/equipos/create')}}">Nuevo Equipo</a>
						@endif
					</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarNavDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">JUGADORES</a>
					<div class="dropdown-menu" aria-labelledby="navbarNavDropdownMenuLink">
						<a class="dropdown-item" href="{{url('/jugadores')}}">Ver Jugadores</a>
						@if(Auth::user()->rol==1)
						<a class="dropdown-item" href="{{url('/jugadores/create')}}">Nuevo Jugador</a>
						@endif
					</div>
				</li>
			</ul>

			<a href="#" class="nav-link disabled">{{Auth::user()->name}}</a>
			<form class="form-inine my-2 my-lg-0" action="{{route('logout')}}" method="post">
				@csrf
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerrar Sesión</button>
			</form>

	</div>
	
</nav>