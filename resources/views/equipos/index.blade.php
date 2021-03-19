@extends('layouts.base')
@section('title','Equipos')
@section('content')

@if(session('status'))
<div class="alert alert-success">
	{{session('status')}}
</div>
@endif
<h1 class="text-center">Listado de quipos</h1>
	<div class="row">
		@foreach($equipos as $equipo)
		<div class="col-xs-6 col-sm-4 col-md-3 text-center">
			<a href="{{url('equipos/'.$equipo->id)}}">
				<img src="{{asset('imagenes/equipos/'.$equipo->escudo)}}" style="width:100%" height="200"/>
				<h4>
					{{$equipo->nombre}}
				</h4>
			</a>
		</div>
		@endforeach
	</div>
	@stop