@extends('layouts.base')
@section('title','Crear Jugadores')
@section('content')
<h1>Crear Jugadores</h1>
<form action="/jugadores" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control">			
		</div>
		<div class="form-group">
			<label for="posicion">Posicion</label>
			<select class="form-control" name="posicion">
				@foreach($posiciones as $posicion)
				<option value="{{$posicion->id}}">{{$posicion->nombre}}</option>
				@endforeach
			</select>

			
		</div>
		<div class="form-group">
			<label for="numero">Numero</label>
			<input type="number" name="numero" class="form-control">
		</div>
		<div class="form-group">
			<label for="equipo">Equipo</label>	
			<select class="form-control" name="equipo">
				@foreach($equipos as $equipo)
				<option value="{{$equipo->id}}" name="equipos">{{$equipo->nombre}}</option>
				@endforeach
			</select>
			

		
			
			
		</div>
		<div class="form-group">
			<label for="foto">Foto</label>
			<input type="file" name="foto" class="form-control-file">
		</div>
		<button type="submit" class="btn btn-primary">Crear</button>
	</form>
@stop