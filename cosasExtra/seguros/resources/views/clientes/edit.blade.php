@extends('layouts.plantilla')
@section('content')

<h2>Edita el cliente</h2>
<form action="{{route('clientes.update', ['id' => $cliente->id])}}" method="POST">

  @csrf
  @method('put')
  <div class="mb-3 col-8">
    <label class="form-label">DNI: 
    <input type="text" class="form-control" name="dni" value="{{$cliente->dni}}">
  </label>
  </div>
  @error('dni')
  <br>
  <span style='color:red'>*El campo dni no puede estar vacío</span>  
  </br> 
  @enderror
  <p>
  <div class="mb-3 col-8">
    <label class="form-label">Nombre: 
    <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}">
  </label>
  </div>
  @error('nombre')
  <br>
  <span style='color:red'>*El campo nombre no puede estar vacío</span>  
  </br> 
  @enderror
 
<p>
  <div class="mb-3 col-8">
    <label class="form-label">Apellidos: </label>
    <input type="text"  class="form-control" name="apellidos" value="{{$cliente->apellidos}}">
  </div>
  @error('apellidos')
  <br>
  <span>*El campo apellidos no puede estar vacío</span>  
  </br> 
  @enderror
 
<p>
  <div class="mb-3 col-8">
      <label class="form-label">Telefono: </label>
      <input type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}">
  </div>
  @error('telefono')
  <br>
  <span style='color:red'>*El campo telefono no puede estar vacío</span>  
  </br> 
  @enderror
  
<p>
  <button type="submit" class="btn btn-primary" style="padding:7px;">Guardar Cambios</button>
</form>

    
@stop