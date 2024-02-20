@extends('layouts.plantilla')
@section('content')

<h1>Listado de Polizas</h1>

<table style="border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 8px;">Codigo del Vehiculo</th>
            <th style="border: 1px solid black; padding: 8px;">Importe</th>
            <th style="border: 1px solid black; padding: 8px;">Fecha de caducidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach($polizas as $poliza)
            <tr>
                <td style="border: 1px solid black; padding: 8px;">{{ $poliza->id }}</a></td>
                <td style="border: 1px solid black; padding: 8px;">{{ $poliza->importe }}</a></td>
                <td style="border: 1px solid black; padding: 8px;">{{ $poliza->fecha_cad }}</td>
                <td><form method="GET" action="{{route('polizas.edit', $poliza)}}">
                    <button type="submit" style="padding:7px;margin:2%; background-color:rgb(210, 238, 196);">Editar</button>
                </form></td>
                <td> <form method="GET" action="{{route('polizas.show', $poliza)}}">
                    <button type="submit" style="padding:7px; margin:2%; background-color:rgb(238, 202, 196);">Eliminar</button>
                </form></td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>
    <h3 style="margin:1%; margin-top:2%;">Añadir una nueva poliza</h3>
    <form method="GET" action="{{route('polizas.create')}}">
        <button type="submit" style="padding:7px; margin:1%; width:10%; background-color:rgb(238, 235, 196);">Añadir</button>
    </form>
              


@stop