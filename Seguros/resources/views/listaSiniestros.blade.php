<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Lista Siniestros</title>
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
    <h1 class="text-center">Listado de los siniestros</h1> 
    <div class="container-fluid p-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">id_poliza</th>
                    <th scope="col">fecha</th>
                    <th scope="col">comunidad</th>
                    <th scope="col">provincia</th>
                    <th scope="col">documento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $siniestro)
                    <tr>
                        <th>{{ $siniestro->id }}</th>
                        <th>{{ $siniestro->id_poliza }}</th>
                        <th>{{ $siniestro->fecha }}</th>
                        <th>{{ $siniestro->comunidad}}</th>
                        <th>{{ $siniestro->provincia }}</th>
                        <th>{{ $siniestro->documento }}</th>
                        <td> 
                            <form method="GET" action="{{ route('editar-siniestro', $siniestro) }}">
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </form>
                        </td>
                        <td> 
                            <form action="{{ route('eliminar-siniestro', $siniestro) }}" method="POST">
                                 @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="text-center m-5">Formulario para insertar un siniestro</h1> 
        <form method="POST" action="{{ route('guardar-siniestro') }}" class="row g-3">
        @csrf
        <div class="col-md-4">
            <label for="id_poliza" class="form-label">id_poliza:</label>
            <select class="form-select" name="id_poliza" aria-label="Default select example">
                <option selected>Seleccione una poliza</option>
                @foreach($polizas as $poliza)
                    <option value="{{ $poliza->id }}">{{ $poliza->id_vehiculo }} - {{ $poliza->importe }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" id="fecha" name="fecha">
        </div>

        <div>
            <label for="comunidad">comunidad</label>
            <input type="text" name="comunidad" id="comunidad" class="form-control">
        </div>

        <div>
            <label for="provincia">provincia</label>
            <input type="text" name="provincia" id="provincia" class="form-control">
        </div>

        <div>
            <label for="documento">documento</label>
            <input type="text" name="documento" id="documento" class="form-control">
        </div>

        <div class="col-12">
            <button type="submit">Agregar siniestro</button>
        </div>
    </form>
    <br>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Salir</a>
    </div>
</body>
</html>