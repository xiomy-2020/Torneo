@extends('layouts.base')
@section('title','Editar equipo')
@section('content')
	<h1>editar equipos</h1>

	<form action="{{url('/equipos/'.$equipo->id)}}" method="post" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{$equipo->nombre}}">
		</div>
		<div class="form-group">
			<label for="dt">D.T.</label>
			<input type="text" name="dt" class="form-control" value="{{$equipo->dt}}">			
		</div>
		<div class="form-group">
			<label for="escudo">Escudo</label>
			<input type="file" name="escudo" class="form-control-file">
		</div>
		<button type="submit" class="btn btn-primary">Crear</button>		
	</form>
@stop