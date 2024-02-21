<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Editar Cliente</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="text-center">Editar Cliente</h1> 
    <div class="container-fluid p-5">
        <form method="POST" action="{{ route('actualizar-cliente', $cliente) }}" class="row g-3">
            @csrf
            @method('PATCH')
            <div class="col-md-4">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" name="dni" id="dni" class="form-control" value="{{ $cliente->dni }}">
            </div>

            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $cliente->nombre }}">
            </div>

            <div class="col-md-4">
                <label for="apellidos" class="form-label">Apellido:</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ $cliente->apellidos }}">
            </div>

            <div class="col-md-4">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="number" name="telefono" id="telefono" class="form-control" value="{{ $cliente->telefono }}">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            </div>
        </form>
        <br>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Salir</a>
    </div>
</body>
</html>
