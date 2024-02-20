@extends('layouts.plantilla')
@section('content')

    <h1>Añadir una nueva poliza</h1>
    <form action="{{route('polizas.store')}}" method="POST">
        @csrf
        <label>Codigo del vehiculo: 
            <input type="text" name="idVehi" value="{{old('idVehi')}}">
        </label>
        @error('idVehi')
        <br>
        <span style='color:red'>*El campo del codigo del vehiculo no puede estar vacío</span> 
        </br> 
        @enderror
        <label>Importe: 
            <input type="text" name="importe" value="{{old('importe')}}">
        </label>
        @error('importe')
        <br>
        <span>*El campo importe no puede estar vacío</span>  
        </br> 
        @enderror

        <p>
        <label>Fecha de caducidad: 
            <input type="text" name="fecha_cad" value={{old('fecha_cad')}}>
        </label>
        @error('fecha_cad')
        <br>
        <span>*El campo fecha_cad no puede estar vacío</span>  
        </br> 
        @enderror
        <p>
         
            <p>
        <button type="submit">Añadir</button>
    </form>

@stop