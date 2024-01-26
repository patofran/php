@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-4">
        <img src="{{$infoPelicula['poster']}}" alt="">
    </div>
    <div class="col-sm-8">
        <h1>{{$infoPelicula['title']}}</h1>
        <p><b>Año:</b> {{$infoPelicula['year']}}</p>
        <p><b>Director:</b> {{$infoPelicula['director']}}</p>
        <p><b>Resumen:</b> {{$infoPelicula['synopsis']}}</p>
        <p><b>Alquilada:</b> {{$infoPelicula['rented'] ? 'Sí' : 'No'}}</p>
        <button type="button" class="btn btn-danger">Devolver pelicula</button>
        <a href="{{ url('/catalog/edit/')}}"><button type="button" class="btn btn-warning" >Editar pelicula</button></a>
        <a href="{{ url('/catalog/')}}"><button type="button" class="btn btn-light">Volver al listado</button></a>
    </div>
</div>
@stop