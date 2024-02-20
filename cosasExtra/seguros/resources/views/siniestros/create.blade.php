@extends('layouts.plantilla')
@section('content')

    <h1>Añadir un nuevo siniestro</h1>
    <form action="{{route('siniestros.store')}}" method="POST">
        @csrf
        <label>Codigo de la poliza: 
            <input type="text" name="idPol" value="{{old('idPol')}}">
        </label>
        @error('idPol')
        <br>
        <span style='color:red'>*El campo del codigo del vehiculo no puede estar vacío</span> 
        </br> 
        @enderror
        <label>Comunidad: 
            <input type="text" name="comunidad" value="{{old('comunidad')}}">
        </label>
        @error('comunidad')
        <br>
        <span>*El campo comunidad no puede estar vacío</span>  
        </br> 
        @enderror

        <p>
        <label>Provincia: 
            <input type="text" name="provincia" value={{old('provincia')}}>
        </label>
        @error('provincia')
        <br>
        <span>*El campo provincia no puede estar vacío</span>  
        </br> 
        @enderror
        <p>

            <p>
                <label>Documento: 
                    <input type="text" name="documento" value={{old('documento')}}>
                </label>
                @error('documento')
                <br>
                <span>*El campo provincia no puede estar vacío</span>  
                </br> 
                @enderror
                <p>
         
            <p>
        <button type="submit">Añadir</button>
    </form>

@stop