@extends('layouts.plantilla')
@section('content')

<h2>Edita el vehiculo</h2>
<form action="{{route('vehiculos.update', ['id' => $vehiculo->id])}}" method="POST">

  @csrf
  @method('put')
  <div class="mb-3 col-8">
    <label class="form-label">Codigo del cliente: 
    <input type="text" class="form-control" name="idCli" value="{{$vehiculo->idCli}}">
  </label>
  </div>
  @error('idCli')
  <br>
  <span style='color:red'>*El campo del codigo del cliente no puede estar vacío</span>  
  </br> 
  @enderror
  <p>
  <div class="mb-3 col-8">
    <label class="form-label">Marca: 
    <input type="text" class="form-control" name="marca" value="{{$vehiculo->marca}}">
  </label>
  </div>
  @error('marca')
  <br>
  <span style='color:red'>*El campo marca no puede estar vacío</span>  
  </br> 
  @enderror
 
<p>
  <div class="mb-3 col-8">
    <label class="form-label">Modelo: </label>
    <input type="text"  class="form-control" name="modelo" value="{{$vehiculo->modelo}}">
  </div>
  @error('modelo')
  <br>
  <span>*El campo modelo no puede estar vacío</span>  
  </br> 
  @enderror
 
<p>
  <div class="mb-3 col-8">
      <label class="form-label">Matricula: </label>
      <input type="text" class="form-control" name="matricula" value="{{$vehiculo->matricula}}">
  </div>
  @error('matricula')
  <br>
  <span style='color:red'>*El campo matricula no puede estar vacío</span>  
  </br> 
  @enderror
  
<p>
  <button type="submit" class="btn btn-primary" style="padding:7px;">Guardar Cambios</button>
</form>

    
@stop