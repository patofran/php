@extends('layouts.master')
@section('content')
<form class="row g-3 needs-validation" novalidate>
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Titulo:</label>
        <input type="text" class="form-control" id="validationCustom01" value="" required>
    </div>
    <div class="col-md-4">
        <label for="validationCustom03" class="form-label">Año:</label>
        <input type="text" class="form-control" id="validationCustom02" value="" required>
    </div>
    <div class="col-md-4">
        <label for="validationCustom04" class="form-label">director:</label>
        <input type="text" class="form-control" id="validationCustom02" value="" required>
    </div>
    <div class="col-md-4">
        <label for="validationCustom05" class="form-label">url poster:</label>
        <input type="text" class="form-control" id="validationCustom02" value="" required>
    </div>
    
    <div class="col-md-4">
        <div class="form-floating m-3">
            <label for="floatingTextarea">Resumen:</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary m-3" type="submit">Editar pelicula</button>
    </div>
</form>
@stop