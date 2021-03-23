@extends('layouts.base')
@section('title','Editar Jugadores')
@section('content')
<h1>Modificar jugadores</h1>
<form action="{{url('/jugadores/'.$jugador->id)}}" method="post" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" class="form-control" value="{{$jugador->nombre}}">		
	</div>
	<div class="form-group">
		<label for="posicion">Posicion</label>
		<select class="form-control" name="posicion">
				@foreach($posiciones as $posicion)
					@if($jugador->posicion_id==$posicion->id)
						<option selected value="{{$posicion->id}}">{{$posicion->nombre}}</option>
					@else
						<option value="{{$posicion->id}}">{{$posicion->nombre}}</option>
					@endif
				@endforeach
		</select>		
	</div>
	<div class="form-group">
		<label for="numero">Numero</label>
		<input type="text" name="numero" class="form-control" value="{{$jugador->numero}}">		
	</div>
	<div class="form-group">
		<label for="foto">Foto</label>
		<input type="file" name="foto" class="form-control-file">
	</div>
	<div class="form-group">
		<label for="equipo">Equipo</label>
		<select class="form-control" name="equipo">
			@foreach($equipos as $equipo)
				@if($jugador->equipo_id==$equipo->id)
					<option selected value="{{$equipo->id}}">{{$equipo->nombre}}</option>
				@else
					<option value="{{$equipo->id}}">{{$equipo->nombre}}</option>					
				@endif
			@endforeach
		</select>	
	</div>
	<button type="submit" class="btn btn-primary">Crear</button>
</form>
@stop

