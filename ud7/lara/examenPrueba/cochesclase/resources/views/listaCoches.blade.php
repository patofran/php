<!DOCTYPE html>
<html>
<head>
    <title>Lista de Coches</title>
</head>
<body>
    <h1>Lista de Coches</h1>
    <ul>
        @foreach ($coches as $coche)
            <li>{{ $coche->marca }} - {{ $coche->modelo }} - {{ $coche->precio }}</li>
        @endforeach
    </ul>
    <a href="{{ url('/') }}">Volver a la Página de Inicio</a>
    <br>
    <a href="{{ url('/listaClientes') }}">Ver Lista de Clientes</a>
</body>
</html>
