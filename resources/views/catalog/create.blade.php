@extends('layout.master')

@section('contenido')
    <div class="row" style="margin-top:20px">

	<div class="col-md-offset-3 col-md-6">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                    @if (isset($pelicula))
                        <h2>Editar película</h2>
                    @else
                        <h2>Añadir película</h2>
                    @endif
				</h3>
			</div>

			<div class="panel-body" style="padding:30px">

				<form action="{{ (isset($pelicula)) ? url('catalog/edit/' . $pelicula->id) : url('catalog') }}" method="POST">
					@csrf

					{{-- Cambiamos método a PUT para cuando editamos --}}
					@if(isset($pelicula))
						@method('PUT')
					@endif

                    <div class="form-group">
    					<label for="title">Título</label>
    					<input type="text" name="title" id="title" class="form-control" value="{{ $pelicula->title ?? '' }}">
					</div>

                    <div class="form-group">
						<label for="year">Año</label>
    					<input type="number" name="year" id="year" class="form-control" value="{{ $pelicula->year ?? '' }}">
					</div>

                    <div class="form-group">
						<label for="director">Director</label>
    					<input type="text" name="director" id="director" class="form-control" value="{{ $pelicula->director ?? '' }}">
					</div>

                    <div class="form-group">
						<label for="poster">Poster</label>
    					<input type="text" name="poster" id="poster" class="form-control" value="{{ $pelicula->poster ?? '' }}">
					</div>

                    <div class="form-group">
						<label for="synopsis">Resumen</label>
                    <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{ $pelicula->synopsis ?? '' }}</textarea>
					</div>

                    <div class="form-group text-center">
						@if (isset($pelicula))
							<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Modificar película</button>
						@else
							<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Añadir película</button>
						@endif
                    </div>
                </form>
			</div>
		</div>
	</div>
	<div class="col-md-offset-3 col-md-6">
		<img src="{{ $pelicula['poster'] ?? '' }}" style="height:500px; box-shadow: 0px 2px 4px gray;"/>
	</div>
</div>

@endsection