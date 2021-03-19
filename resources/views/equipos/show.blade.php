@extends('layouts.base')
@section('title','Detalle equipo')
@section('content')
	<h1 class="text-center">Detalle de equipo</h1>
	<div class="row">
		<div class="col-sm-4">
		<img src="{{asset('imagenes/equipos/'.$equipo->escudo)}}" class="img-thumbnail center-block" width="300" height="300">
		</div>
	</div>
	<div class="col-sm-8 ">
		<p class="h3">{{$equipo['nombre']}}</p>
		<p class="h5">{{$equipo['dt']}}</p>
		
		<form class="delete d-inline" action="{{url('/equipos/'.$equipo->id)}}" method="post">
			@method('DELETE')
			@csrf
			<button type="submit" class="btn btn-danger">Eliminar</button>
		</form>
		<a href="/equipos/{{$equipo->id}}/edit" class="btn btn-warning">Modificar</a>
		<a href="/equipos" class="btn btn-dark">Ver Equipos</a>
	</div>
@stop