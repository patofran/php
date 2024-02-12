<!DOCTYPE html>
<html>
<head>
    <title>Datos de la API</title>
</head>
<body>
    <h1>Datos de la API</h1>
    <ul>
        @foreach($datos as $vehiculo)
            <li>
                Marca: {{ $vehiculo['marca'] }} <br>
                Modelo: {{ $vehiculo['modelo'] }} <br>
                Fecha: {{ $vehiculo['tipo'] }} <br>
            </li>
        @endforeach

    </ul>
    <h1>Datos de la base de datos</h1>
    @foreach($datos as $coche)
            <li>{{ $coche->marca }} - {{ $coche->modelo }} ({{ $coche->fecha }})</li>
    @endforeach

    <p>para salir pulsa <a href="{{route('inicio')}}">aqui</a></p>
    <form method="POST" action="{{ route('guardar-coche') }}">
        @csrf

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca">

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo">

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha">

        <button type="submit">Agregar Coche</button>
    </form>

</body>
</html>
