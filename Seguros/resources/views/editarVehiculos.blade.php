<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Editar vehiculos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-around">
            <h3>Manejo de los seguros</h3>
            <a href="{{ route('listaClientes') }}" class="btn btn-primary">Listado de los Clientes</a>
            <a href="{{ route('listaVehiculos') }}" class="btn btn-primary">Listado de los Vehiculos</a>
            <a href="{{ route('listaPolizas') }}" class="btn btn-primary">Listado de las Polizas</a>
            <a href="{{ route('listaSiniestros') }}" class="btn btn-primary">Listado de los siniestros</a>
        </div>
  </nav>
    <h1 class="text-center">Editar Vehículo</h1>

    <div class="container-fluid p-5">  
        <form method="POST" action="{{ route('actualizar-vehiculo', $vehiculo) }}" class="row g-3">
            @csrf
            @method('PATCH')
            <div class="col-md-4">
                <label for="id_cliente" class="form-label">ID Cliente:</label>
                <input type="text" id="id_cliente" class="form-control" name="id_cliente" value="{{ $vehiculo->id_cliente }}" readonly>
            </div>
            <div class="col-md-4">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" id="marca" class="form-control" name="marca" value="{{ $vehiculo->marca }}">
            </div>
            <div class="col-md-4">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" id="modelo" class="form-control" name="modelo" value="{{ $vehiculo->modelo }}">
            </div>
            <div class="col-md-4">
                <label for="matricula" class="form-label">Matrícula:</label>
                <input type="text" id="matricula" class="form-control" name="matricula" value="{{ $vehiculo->matricula }}">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
        <br>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Salir</a>
    </div>
</body>
</html>

