@extends('layout.master')

@section('contenido')
    <br>
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ $pelicula->poster }}" style="height:340px; box-shadow: 0px 2px 4px gray;"/>
    </div>
    <div class="col-sm-8">
        <h2>{{ $pelicula->title }}</h2>
        <h5>Año: {{ $pelicula->year }}</h5>
        <h5>Director: {{ $pelicula->director }}</h5>
        <br>
        <p><strong>Resumen: </strong>{{ $pelicula->synopsis }}</p>
        <br>
        <p><strong>Estado: </strong> {{ ($pelicula->rented) ? 'Película alquinada.' : 'Película disponible.' }}</p>

        <div class="row">
            {{-- Tiene que estar dentro de un form para poder hacer peticiones PUT --}}
            <form action="{{ url('catalog/rented/' . $pelicula->id)}}" method="POST">
                @csrf

                @method('PUT')

                @if (!$pelicula->rented)
                    <button type="submit" class="btn btn-success">Alquilar película</button>
                @else
                    <button type="submit" class="btn btn-danger">Devolver película</button>
                @endif
            </form>

            <a href="{{ url('catalog/edit/' . $pelicula->id) }}" class="btn btn-warning ml-2">Editar película</a>
            <a href="{{ url('/') }}" class="btn btn-info ml-2">Volver al listado</a>

            <form action="{{ url('catalog/' . $pelicula->id) }}" method="POST">
                @csrf

                @method('DELETE')

                    <button type="submit" class="btn btn-danger ml-2">Borrar película</button>
            </form>
        </div>

    </div>
    </div>
@endsection