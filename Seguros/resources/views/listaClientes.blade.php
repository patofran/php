<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Lista Clientes</title>
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
    <h1 class="text-center">Listado de los clientes</h1> 
    <div class="container-fluid p-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">dni</th>
                    <th scope="col">nombre</th>
                    <th scope="col">apellidos</th>
                    <th scope="col">telefono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $cliente)
                    <tr>
                        <th>{{ $cliente->id }}</th>
                        <th>{{ $cliente->dni }}</th>
                        <th>{{ $cliente->nombre }}</th>
                        <th>{{ $cliente->apellidos }}</th>
                        <th>{{ $cliente->telefono }}</th>
                        <td> 
                            <form method="GET" action="{{ route('editar-cliente', $cliente) }}">
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </form>
                        </td>
                        <td> 
                            <form action="{{route('borrar-cliente', $cliente)}}" method="POST">
                                 @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="text-center m-5">Formulario para insertar un cliente</h1> 
        <form method="POST" action="{{ route('guardar-cliente') }}" class="row g-3">
        @csrf
        <div class="col-md-4">
            <label for="dni" class="form-label">dni:</label>
            <input type="text" name="dni" id="dni" class="form-control">
        </div>

        <div class="col-md-4">
            <label for="nombre" class="form-label">nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>

        <div class="col-md-4">
            <label for="apellidos" class="form-label">apellido:</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control">
        </div>

        <div class="col-md-4">
            <label for="telefono" class="form-label">telefono:</label>
            <input type="number" name="telefono" id="telefono" class="form-control">
        </div>

        <div class="col-12">
            <button type="submit">Agregar cliente</button>
        </div>
    </form>
    <br>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Salir</a>
    </div>
</body>
</html>
