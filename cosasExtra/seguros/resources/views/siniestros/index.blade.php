@extends('layouts.plantilla')
@section('content')

<h1>Listado de Siniestros</h1>

<table style="border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 8px;">Codigo de la poliza</th>
            <th style="border: 1px solid black; padding: 8px;">Comunidad</th>
            <th style="border: 1px solid black; padding: 8px;">Provincia</th>
            <th style="border: 1px solid black; padding: 8px;">Documento</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siniestros as $siniestro)
            <tr>
                <td style="border: 1px solid black; padding: 8px;">{{ $siniestro->idPol }}</a></td>
                <td style="border: 1px solid black; padding: 8px;">{{ $siniestro->comunidad }}</a></td>
                <td style="border: 1px solid black; padding: 8px;">{{ $siniestro->provincia }}</td>
                <td style="border: 1px solid black; padding: 8px;">{{ $siniestro->documento }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>
    <h3>¿Deseas añadir un siniestro nuevo?</h3>
    <a href="{{route('siniestros.create')}}">Añadir un siniestro nuevo</a><p>



@stop