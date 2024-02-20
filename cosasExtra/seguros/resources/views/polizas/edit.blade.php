@extends('layouts.plantilla')
@section('content')

<h2>Edita el cliente</h2>
<form action="{{route('polizas.update', $poliza)}}" method="POST">

  @csrf
  @method('put')
  <div class="mb-3 col-8">
    <label class="form-label">Codigo del vehiculo: 
    <input type="text" class="form-control" name="idVehi" value="{{$poliza->idVehi}}">
  </label>
  </div>
  @error('idVehi')
  <br>
  <span style='color:red'>*El campo del codigo del vehiculo no puede estar vacío</span>  
  </br> 
  @enderror
  <p>
  <div class="mb-3 col-8">
    <label class="form-label">Importe: 
    <input type="text" class="form-control" name="importe" value="{{$poliza->importe}}">
  </label>
  </div>
  @error('importe')
  <br>
  <span style='color:red'>*El campo importe no puede estar vacío</span>  
  </br> 
  @enderror
 
<p>
  <div class="mb-3 col-8">
    <label class="form-label">Fecha de caducidad: </label>
    <input type="text"  class="form-control" name="fecha_cad" value="{{$poliza->fecha_cad}}">
  </div>
  @error('fecha_cad')
  <br>
  <span style='color:red'>*El campo de fecha de caducidad no puede estar vacío</span> 
  </br> 
  @enderror
 
  
<p>
  <button type="submit" class="btn btn-primary" style="padding:7px;">Guardar Cambios</button>
</form>

    
@stop