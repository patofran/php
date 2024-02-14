<!DOCTYPE html>
<html>
<head>
    <title>Lista Clientes</title>
</head>
<body>
    <h1>Listado de los clientes en la base de Datos</h1>
    @foreach($datos as $cliente)
            <li>dni: {{ $cliente->dni }} nombre: {{ $cliente->nombre }} apellido: {{ $cliente->apellidos }} telefono: {{ $cliente->telefono }}</li><br>
    @endforeach
    <form method="POST" action="{{ route('guardar-cliente') }}">
        @csrf
        <label for="dni">dni:</label>
        <input type="text" name="dni" id="dni">

        <label for="nombre">nombre:</label>
        <input type="text" name="nombre" id="nombre">

        <label for="apellidos">apellido:</label>
        <input type="text" name="apellidos" id="apellidos">

        <label for="telefono">telefono:</label>
        <input type="number" name="telefono" id="telefono">

        <button type="submit">Agregar cliente</button>
    </form>

</body>
</html>