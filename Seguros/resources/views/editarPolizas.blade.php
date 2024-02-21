<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Editar poliza</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="text-center">Editar poliza</h1>

    <div class="container-fluid p-5">  
        <form method="POST" action="{{ route('actualizar-poliza', $poliza) }}" class="row g-3">
            @csrf
            @method('PATCH')
            <div class="col-md-4">
                <label for="id_vehiculo" class="form-label">ID Cliente:</label>
                <input type="text" id="id_vehiculo" class="form-control" name="id_vehiculo" value="{{ $poliza->id_vehiculo }}" readonly>
            </div>
            <div class="col-md-4">
                <label for="importe" class="form-label">importe:</label>
                <input type="text" id="importe" class="form-control" name="importe" value="{{ $poliza->importe }}">
            </div>

            <div>
            <label for="fecha_caducidad">Fecha de caducidad:</label>
            <input type="date" id="fecha_caducidad" name="fecha_caducidad" value="{{ $poliza->fecha_caducidad }}">
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
