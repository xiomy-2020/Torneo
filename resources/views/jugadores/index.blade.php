@extends('layouts.base')
@section('title','Listado de Jugadores')
@section('content')
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
					<a href="{{url('jugadores/'.$jugador)}}">
					<img src="{{asset('imagenes/jugadores/'.$jugador->foto)}}"class="img-thumbnail center-block" width="200" height="100" />

					</a>
				</th>
				<th>	
					<h4>
						{{$jugador['nombre']}}
					</h4>
				</th>
				<th>
					<h5>
						{{$jugador['posicion']}}
					</h5>
				</th>
				<th>
					<h5>{{$jugador['numero']}}</h5>
				</th>
				<th>
					<h5>{{$jugador['equipo']}}</h5>
				</th>
				<th>
					<a href="{{url('jugadores/'.$jugador)}}" type="submit" class="btn btn-primary">Ver</a>
					<a href="" type="submit" class="btn btn-success">Modificar</a>
					<a href="" type="submit" class="btn btn-danger">Eliminar</a>
				</th>

				
			</tr>								
			@endforeach	
		</table>
					
	</div>		
</div>
@stop

