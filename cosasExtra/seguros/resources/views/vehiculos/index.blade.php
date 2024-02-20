@extends('layouts.plantilla')
@section('content')

<h1>Listado de Vehiculos</h1>

<table style="border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 8px;">Codigo del Cliente</th>
            <th style="border: 1px solid black; padding: 8px;">Marca</th>
            <th style="border: 1px solid black; padding: 8px;">Modelo</th>
            <th style="border: 1px solid black; padding: 8px;">Matricula</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehiculos as $vehiculo)
            <tr>
                <td style="border: 1px solid black; padding: 8px;"><a href="{{route('vehiculos.show', $vehiculo->id)}}">{{ $vehiculo->idCli }}</a></td>
                <td style="border: 1px solid black; padding: 8px;">{{ $vehiculo->marca }}</a></td>
                <td style="border: 1px solid black; padding: 8px;">{{ $vehiculo->modelo }}</td>
                <td style="border: 1px solid black; padding: 8px;">{{ $vehiculo->matricula }}</td>
                <td> <form method="GET" action="{{route('vehiculos.edit', $vehiculo)}}">
                    <button type="submit" style="padding:7px;margin:2%; background-color:rgb(210, 238, 196);">Editar</button>
                </form></td>
                <td> <form method="GET" action="{{route('vehiculos.show', $vehiculo)}}">
                    <button type="submit" style="padding:7px; margin:2%; background-color:rgb(238, 202, 196);">Eliminar</button>
                </form></td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>
    <h3 style="margin:1%; margin-top:2%;">Añadir un nuevo Vehiculo</h3>
    <form method="GET" action="{{route('vehiculos.create')}}">
        <button type="submit" style="padding:7px; margin:1%; width:10%; background-color:rgb(238, 235, 196);">Añadir</button>
    </form>
  


@stop