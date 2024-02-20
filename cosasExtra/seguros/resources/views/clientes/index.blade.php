@extends('layouts.plantilla')
@section('content')

<h1>Listado de Clientes</h1>

<table style="border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 8px;">DNI</th>
            <th style="border: 1px solid black; padding: 8px;">Nombre</th>
            <th style="border: 1px solid black; padding: 8px;">Apellidos</th>
            <th style="border: 1px solid black; padding: 8px;">Telefono</th>
       
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td style="border: 1px solid black; padding: 8px;">{{ $cliente->dni }}</td>
                <td style="border: 1px solid black; padding: 8px;">{{ $cliente->nombre }}</a></td>
                <td style="border: 1px solid black; padding: 8px;">{{ $cliente->apellidos }}</td>
                <td style="border: 1px solid black; padding: 8px;">{{ $cliente->telefono }}</td>
                <td> <form method="GET" action="{{route('clientes.edit', $cliente)}}">
                    <button type="submit" style="padding:7px;margin:2%; background-color:rgb(210, 238, 196);">Editar</button>
                </form></td>
                <td> <form method="GET" action="{{route('clientes.show', $cliente)}}">
                    <button type="submit" style="padding:7px; margin:2%; background-color:rgb(238, 202, 196);">Eliminar</button>
                </form></td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>
    <h3 style="margin:1%; margin-top:2%;">Añadir un nuevo cliente</h3>
    <form method="GET" action="{{route('clientes.create')}}">
        <button type="submit" style="padding:7px; margin:1%; width:10%; background-color:rgb(238, 235, 196);">Añadir</button>
    </form>




@stop