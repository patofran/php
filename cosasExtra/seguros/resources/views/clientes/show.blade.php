@extends('layouts.plantilla')
@section('content')

    <h1>¿Desea eliminar el registro?</h1>
    <h3>Nombre: {{$cliente->nombre}}</h3>
    <h3>Apellido: {{$cliente->apellidos}}</h3>
    <h3>Telefono: {{$cliente->telefono}}</h3>
  
    
 
        <form action="{{route('clientes.delete', $cliente)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" style="padding:7px;">Eliminar</button>
        </form>
        <p>
            <form action="{{route('clientes.index')}}">
                <button type="submit" style="padding:7px;"> << Volver</button>
            </form>


    
@stop