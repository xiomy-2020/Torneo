@extends('layouts.base')
@section('title','Listado de Jugadores')
@section('content')
@if(session('status'))
<div class="alert alert-success">
	{{session('status')}}	
</div>
@endif
<h1 class="text-center">Listado de jugadores</h1>
<div class="row">		
	<div class="col-xs-6 col-sm-4 col-md-12 text-center">				
		<table class="table table-dark table-striped">

			<tr>
				<th>
					Foto
				</th>
				<th>Nombre</th>
				<th>Puesto</th>
				<th>Numero</th>
				<th>Equipo</th>
				<th>Accion</th>
			</tr>
			@foreach($jugador as $jugador)
			<tr>
				<th>
					<a href="{{url('jugadores/'.$jugador->id)}}">
					<img src="{{asset('imagenes/jugadores/'.$jugador->foto)}}"class="img-thumbnail center-block" width="200" height="100" />
					</a>
				</th>
				<th>	
					<h4>
						{{$jugador['nombre']}}
					</h4>
				</th>
				<th>
				@foreach($posiciones as $posicion)
					@if($jugador->posicion_id==$posicion->id)
						<strong >{{$posicion->nombre}}</strong>
					@endif
				@endforeach	
				</th>
				<th>
					<h5>{{$jugador['numero']}}</h5>
				</th>
				<th>										
					@foreach($equipos as $equipo)
						@if($jugador->equipo_id==$equipo->id)
							<strong>{{$equipo->nombre}}</strong>									
						@endif
					@endforeach
					
					
				</th>
				<th>
					<a href="{{url('jugadores/'.$jugador->id)}}" type="submit" class="btn btn-primary">Ver</a>
					@if(Auth::user()->rol == 1)	
					<a href="/jugadores/{{$jugador->id}}/edit" type="submit" class="btn btn-success">Modificar</a>
					<form class="delete d-inline" action="{{url('/jugadores/'.$jugador->id)}}" method="post">
						@method('DELETE')
						@csrf
						<button type="submit" class="btn btn-danger">Eliminar</button>
					</form>
					@endif
				</th>

				
			</tr>								
			@endforeach	
		</table>
					
	</div>		
</div>
@stop

