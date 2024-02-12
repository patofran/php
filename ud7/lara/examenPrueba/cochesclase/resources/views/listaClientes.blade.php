<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <ul>
        @foreach ($clientes as $cliente)
            <li>{{ $cliente->nombre }} {{ $cliente->apellido }} - {{ $cliente->telefono }}</li>
        @endforeach
    </ul>
    <a href="{{ url('/') }}">Volver a la Página de Inicio</a>
    <br>
    <a href="{{ url('/listaCoches') }}">Ver Lista de Coches</a>
</body>
</html>
