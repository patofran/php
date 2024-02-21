<x-app-layout>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title>Bootstrap Example</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Menu Inicial Seguros
        </h2>
    </x-slot>

    <div class="container-fluid d-flex justify-content-around m-5">
    <a href="{{ route('listaClientes') }}" class="btn btn-primary">Listado de los Clientes</a>
    <a href="{{ route('listaVehiculos') }}" class="btn btn-primary">Listado de los Vehiculos</a>
    <button type="button" class="btn btn-primary">Listado de los Polizas</button>
    <button type="button" class="btn btn-primary">Listado de los Siniestros</button>
    </div>

    
</x-app-layout>
