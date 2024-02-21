<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Lista Vehiculos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="text-center">Listado de los Vehiculos</h1> 
    <div class="container-fluid p-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">id_cliente</th>
                    <th scope="col">marca</th>
                    <th scope="col">modelo</th>
                    <th scope="col">matricula</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $vehiculo)
                    <tr>
                        <th>{{ $vehiculo->id }}</th>
                        <th>{{ $vehiculo->id_cliente }}</th>
                        <th>{{ $vehiculo->marca }}</th>
                        <th>{{ $vehiculo->modelo }}</th>
                        <th>{{ $vehiculo->matricula }}</th>
                        <td> 
                            <form method="GET" action="{{ route('editar-vehiculo', $vehiculo) }}">
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </form>
                        </td>
                        <td> 
                            <form action="{{ route('eliminar-vehiculo', $vehiculo) }}" method="POST">
                                 @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="text-center m-5">Formulario para insertar un vehiculo</h1> 
        <form method="POST" action="{{ route('guardar-vehiculo') }}" class="row g-3">
        @csrf
        <div class="col-md-4">
            <label for="id_cliente" class="form-label">id_cliente:</label>
            <select class="form-select" name="id_cliente" aria-label="Default select example">
                <option selected>Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->dni }} - {{ $cliente->nombre }} {{ $cliente->apellidos }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="marca" class="form-label">marca:</label>
            <input type="text" name="marca" id="marca" class="form-control">
        </div>

        <div class="col-md-4">
            <label for="modelo" class="form-label">modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control">
        </div>

        <div class="col-md-4">
            <label for="matricula" class="form-label">matricula:</label>
            <input type="text" name="matricula" id="matricula" class="form-control">
        </div>

        <div class="col-12">
            <button type="submit">Agregar vehiculo</button>
        </div>
    </form>
    <br>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Salir</a>
    </div>
</body>
</html>
