@extends('layouts.plantilla')
@section('content')

    <h1>¿Desea eliminar el vehiculo?</h1>
    <h3>Codigo del cliente: {{$vehiculo->idCli}}</h3>
    <h3>Marca: {{$vehiculo->marca}}</h3>
    <h3>Modelo: {{$vehiculo->modelo}}</h3>
    <h3>Matricula: {{$vehiculo->matricula}}</h3>
  
    
        <form action="{{route('vehiculos.delete', $vehiculo)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" style="padding:7px;">Eliminar</button>
        </form>
        <p>
        <form action="{{route('vehiculos.index')}}">
            <button type="submit" style="padding:7px;"> << Volver</button>
        </form>
    
@stop