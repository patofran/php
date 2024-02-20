@extends('layouts.plantilla')
@section('content')

    <h1>Añadir un nuevo cliente</h1>
    <form action="{{route('clientes.store')}}" method="POST">
        @csrf
        <label>DNI: 
            <input type="text" name="dni" value="{{old('dni')}}">
        </label>
        @error('dni')
        <br>
        <span>*El campo dni no puede estar vacío</span>  
        </br> 
        @enderror
        <label>Nombre: 
            <input type="text" name="nombre" value="{{old('nombre')}}">
        </label>
        @error('nombre')
        <br>
        <span>*El campo nombre no puede estar vacío</span>  
        </br> 
        @enderror

        <p>
        <label>Apellidos: 
            <input type="text" name="apellidos" value={{old('apellidos')}}>
        </label>
        @error('apellidos')
        <br>
        <span>*El campo apellidos no puede estar vacío</span>  
        </br> 
        @enderror
        <p>
            <label>Telefono: 
                <input type="text" name="telefono" value={{old('telefono')}}>
            </label>
            @error('telefono')
            <br>
            <span>*El campo telefono no puede estar vacío</span>  
            </br> 
            @enderror
            <p>
        <button type="submit" style="padding:7px;">Añadir</button>
    </form>

@stop