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
					
					<select class="form-group" name="posicion">
						@foreach($posiciones as $posicion)
							@if($jugador->posicion_id==$posicion->id)
								<option selected value="{{$posicion->id}}">{{$posicion->nombre}}</option>
							@else
								<option value="{{$posicion->id}}">{{$posicion->nombre}}</option>
							@endif
						@endforeach
					</select>
					
				</th>
				<th>
					<h5>{{$jugador['numero']}}</h5>
				</th>
				<th>
					<h5>
						<select class="form-control" name="equipo">
							@foreach($equipos as $equipo)
									@if($equipo->equipo_id==$equipo->id)
											<option selected value="{{$equipo->id}}">{{$equipo->nombre}}</option>
									@else
											<option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
									@endif
							@endforeach
						</select>
					</h5>
				</th>
				<th>
					<a href="{{url('jugadores/'.$jugador->id)}}" type="submit" class="btn btn-primary">Ver</a>
					<a href="/jugadores/{{$jugador->id}}/edit" type="submit" class="btn btn-success">Modificar</a>
					<a href="/jugadores" type="submit" class="btn btn-danger">Eliminar</a>
				</th>

				
			</tr>								
			@endforeach	
		</table>
					
	</div>		
</div>
@stop

