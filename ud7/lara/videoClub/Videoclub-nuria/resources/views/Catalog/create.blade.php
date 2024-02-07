@extends('layout.master')
@section('content')
<form>
    <div class="mb-3 col-8">
      <label for="exampleInputEmail1" class="form-label">Título: </label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 col-8">
      <label for="exampleInputPassword1" class="form-label">Año: </label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 col-8">
        <label for="exampleInputPassword1" class="form-label">Director: </label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 col-8">
        <div class="form-floating">
            <label for="floatingTextarea2">Resumen</label>
            <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            
          </div>
    </div>
    <div class="mb-3 col-8">
        <label for="exampleInputPassword1" class="form-label">Estado: </label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
  
    <button type="submit" class="btn btn-primary">Crear Película</button>
  </form>
@stop