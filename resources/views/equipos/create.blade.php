@extends('layouts.base')
@section('title','Crear Equipo')
@section('content')
	<h1>Crear equipo</h1>
	@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="/equipos" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control">			
		</div>
		<div class="form-group">
			<label for="dt">D.T.</label>
			<input type="text" name="dt" class="form-control">
		</div>
		<div class="form-group">
			<label for="escudo">Escudo</label>
			<input type="file" name="escudo" class="form-control-file">
		</div>
		<button type="submit" class="btn btn-primary">Crear</button>		
	</form>
@stop