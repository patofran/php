@extends('layouts.master')
@section('content')
    <div class="row">
       @foreach ($peliculas as $key => $pelicula)
            <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                <a href="{{ url('/catalog/show/' . ($key + 1)) }}">
                    <img src="{{ $pelicula['poster'] }}" style="height:200px" />
                    <span style="min-height:45px;margin:5px 0 10px 0">
                        {{ $pelicula['title'] }}
                    </span>
                </a>
            </div>
        @endforeach
    </div>
@stop
