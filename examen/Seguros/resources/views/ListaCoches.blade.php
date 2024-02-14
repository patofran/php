<!DOCTYPE html>
<html>
<head>
    <title>Lista Coches</title>
</head>
<body>
    <h1>Listado de los coches en la base de Datos</h1>
    @foreach($datos as $coche)
            <li>id_cliente: {{ $coche->id_cliente }} Marca: {{ $coche->marca }} Modelo: {{ $coche->modelo }} matricula: {{ $coche->matricula }}</li><br>
    @endforeach
    <form method="POST" action="{{ route('guardar-coche') }}">
        @csrf

        <label for="id_cliente">id_cliente:</label>
        <input type="number" name="id_cliente" id="id_cliente">

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca">

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo">

        <label for="fecha">matricula:</label>
        <input type="text" name="matricula" id="matricula">

        <button type="submit">Agregar Coche</button>
    </form>

</body>
</html>