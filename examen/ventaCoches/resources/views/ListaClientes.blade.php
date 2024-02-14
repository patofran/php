<!DOCTYPE html>
<html>
<head>
    <title>Lista Clientes</title>
</head>
<body>
    <h1>Listado de los clientes en la base de Datos</h1>
    @foreach($datos as $cliente)
            <li>nombre: {{ $cliente->nombre }} apellido: {{ $cliente->apellido }} telefono: {{ $cliente->telefono }}</li><br>
    @endforeach
    <form method="POST" action="{{ route('guardar-cliente') }}">
        @csrf

        <label for="nombre">nombre:</label><br>
        <input type="text" name="nombre" id="nombre">

        <label for="apellido">apellido:</label>
        <input type="text" name="apellido" id="apellido">

        <label for="telefono">Precio:</label>
        <input type="number" name="precio" id="precio">

        <button type="submit">Agregar cliente</button>
    </form>

</body>
</html>