<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <nav style="background-color:rgb(238, 236, 236)">
                <form method="GET" action="{{ route('clientes.index') }}" style="display: inline-block; margin-top: 1%; margin-left: 3%;padding-bottom:2%; padding-top:1%;">
                    <button type="submit" style="width: 150%; border: none; outline: none; font-size:larger; padding:12%; font-weight:bold;">Clientes</button>
                </form>
           
                <form method="GET" action="{{ route('vehiculos.index') }}" style="display: inline-block;margin-top: 1%; margin-left:30px; padding-bottom:2%; padding-top:1%;">
                    <button type="submit" style="width: 150%; border: none; outline: none; font-size:larger; padding:10%; font-weight:bold">Vehículos</button>
                </form>
            
                <form method="GET" action="{{ route('siniestros.index') }}" style="display: inline-block; margin-top: 1%;margin-left:30px; padding-bottom:2%; padding-top:1%;">
                    <button type="submit" style="width: 150%; border: none; outline: none; font-size:larger; padding:10%; font-weight:bold">Siniestros</button>
                </form>
            
                <form method="GET" action="{{ route('polizas.index') }}" style="display: inline-block; margin-top: 1%;margin-left:30px; padding-bottom:2%; padding-top:1%;">
                    <button type="submit" style="width: 150%; border: none; outline: none; font-size:larger; padding:12%; font-weight:bold">Pólizas</button>
                </form>
                <form action="{{ url('/logout') }}" method="POST" style="display:inline ">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer; width: 10%; border: none; outline: none; font-size:larger; padding:8px; margin-left:25px; font-weight:bold">
                        Cerrar sesión
                    </button>
                </form>
    </nav>
</header>

<body style="background-color:rgb(228, 226, 226);">

   @yield('content')
</body>

</html>
