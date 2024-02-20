@extends('layouts.plantilla')
@section('content')

    <h1>Añadir un nuevo vehiculo</h1>
    <form action="{{route('vehiculos.store')}}" method="POST">
        @csrf
        <label>Codigo del cliente: 
            <input type="text" name="idCli" value="{{old('idCli')}}">
        </label>
        @error('idCli')
        <br>
        <span style='color:red'>*El campo del codigo del cliente no puede estar vacío</span> 
        </br> 
        @enderror
        <label>Marca: 
            <input type="text" name="marca" value="{{old('marca')}}">
        </label>
        @error('marca')
        <br>
        <span>*El campo marca no puede estar vacío</span>  
        </br> 
        @enderror

        <p>
        <label>Modelo: 
            <input type="text" name="modelo" value={{old('modelo')}}>
        </label>
        @error('modelo')
        <br>
        <span>*El campo modelo no puede estar vacío</span>  
        </br> 
        @enderror
        <p>
            <label>Matricula: 
                <input type="text" name="matricula" value={{old('matricula')}}>
            </label>
            @error('matricula')
            <br>
            <span>*El campo matricula no puede estar vacío</span>  
            </br> 
            @enderror
            <p>
        <button type="submit" style="padding:7px; ">Añadir</button>
    </form>

@stop