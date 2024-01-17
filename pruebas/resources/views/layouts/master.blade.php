<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('menu')
        Contenido del menu
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>