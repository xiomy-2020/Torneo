@extends('layouts.base')
@section('title','Detalle de Jugadores')
@section('content')
<h1>Detalle de jugadores</h1>
<div class="row">
	<div class="col-sm-4">
		
		<img src="{{asset('imagenes/jugadores/'.$jugador->foto)}}">
	</div>
	<div class="col-sm-8">
		<p class="h3"><strong>{{$jugador['nombre']}}</strong></p>
		<p class="h5">
			
			<strong>{{$jugador['posicion']}}</strong>
		</p>
		<p class="h5"><strong>{{$jugador['numero']}}</strong></p>
		<p class="h5">{{$jugador['equipo']}}</p>
		<form class="delete d-inline" action="{{url('/jugadores/'.$jugador->id)}}" method="post">
			@method('DELETE')
			@csrf
			<button type="submit" class="btn btn-danger">Eliminar</button>
		</form>
		
		<a href="/jugadores/{{$jugador->id}}/edit" type="submit" class="btn btn-success">Modificar</a>
		<a href="/jugadores" type="submit" class="btn btn-info">Ver Jugadores</a>
	</div>
</div>
@stop

