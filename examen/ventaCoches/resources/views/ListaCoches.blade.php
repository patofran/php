<!DOCTYPE html>
<html>
<head>
    <title>Lista Coches</title>
</head>
<body>
    <h1>Listado de los coches en la base de Datos</h1>
    @foreach($datos as $coche)
            <li>Marca: {{ $coche->marca }} Modelo: {{ $coche->modelo }} Precio: {{ $coche->precio }} €</li><br>
    @endforeach
    <form method="POST" action="{{ route('guardar-coche') }}">
        @csrf

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca">

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo">

        <label for="fecha">Precio:</label>
        <input type="number" name="precio" id="precio">

        <button type="submit">Agregar Coche</button>
    </form>

</body>
</html>