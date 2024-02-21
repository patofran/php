<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Lista Polizas</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="text-center">Listado de las polizas</h1> 
    <div class="container-fluid p-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">id_vehiculo</th>
                    <th scope="col">importe</th>
                    <th scope="col">fecha de cadicudad</th>
                    <th scope="col">matricula</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $poliza)
                    <tr>
                        <th>{{ $poliza->id }}</th>
                        <th>{{ $poliza->id_vehiculo }}</th>
                        <th>{{ $poliza->importe }}</th>
                        <th>{{ $poliza->fecha_caducidad }}</th>
                        <td> 
                            <form method="GET" action="{{ route('editar-poliza', $poliza) }}">
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </form>
                        </td>
                        <td> 
                            <form action="{{ route('eliminar-poliza', $poliza) }}" method="POST">
                                 @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="text-center m-5">Formulario para insertar una poliza</h1> 
        <form method="POST" action="{{ route('guardar-poliza') }}" class="row g-3">
        @csrf
        <div class="col-md-4">
            <label for="id_vehiculo" class="form-label">id_vehiculo:</label>
            <select class="form-select" name="id_vehiculo" aria-label="Default select example">
                <option selected>Seleccione un vehiculo</option>
                @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo->id }}">{{ $vehiculo->marca }} - {{ $vehiculo->modelo }} - {{ $vehiculo->matricula }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="importe" class="form-label">importe:</label>
            <input type="text" name="importe" id="importe" class="form-control">
        </div>

        <div>
            <label for="fecha_caducidad">Fecha de caducidad:</label>
            <input type="date" id="fecha_caducidad" name="fecha_caducidad">
        </div>

        <div class="col-12">
            <button type="submit">Agregar poliza</button>
        </div>
    </form>
    </div>
</body>
</html>