@extends('layout.master')
@section('content')

<div class="row">
    <div class="col-sm-4">
            <img src="{{ $arrayPeliculas['poster']}}">

    </div>
    <div class="col-sm-8">

            <h2>{{ $arrayPeliculas['title']}}</h2>
            <h4>Año: {{ $arrayPeliculas['year']}}</h4>
            <h4>Director: {{ $arrayPeliculas['director']}}</h4>
            <p><strong>Resumen:</strong> {{ $arrayPeliculas['synopsis']}}</p>
            <p><strong>Estado:</strong> 
                @if($arrayPeliculas['rented'] == true)
                    Película disponible
                @else
                    Película alquilada
                @endif
            </p>
            <p>
                <button type="button" class="btn btn-danger">Devolver Película</button>
                <a href="{{ url('/catalog/edit') }}"><button type="button" class="btn btn-warning">Editar Película</button>
                <a href="{{ url('/catalog') }}"><button type="button" class="btn btn-light"> < Volver al listado</button>
            
           

     
    

    </div>
</div>
@stop
