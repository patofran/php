<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuevo Contacto</title>
    </head>

    <body>
    <?php

        include_once "Contacto.php";

        $nombre = " ";
        $apellido1 = " ";
        $apellido2 = " ";
        $telefono = " ";

        if (isset($_GET['nombre']) && $_GET['nombre'] == "") {
            $nombre = "Error: falta el nombre.";
        }else {
            $nombre = "";
        }

        if (isset($_GET['apellido1']) && $_GET['apellido1'] == "") {
            $apellido1 = "Error: falta el primer apellido.";
        }else {
            $apellido1 = "";
        }

        if (isset($_GET['apellido2']) && $_GET['apellido2'] == "") {
            $apellido2 = "Error: falta el segundo apellido.";
        }else {
            $apellido2 = "";
        }

        if (isset($_GET['telefono']) && $_GET['telefono'] == "") {
            $telefono = "Error: falta el telefono.";
        }else {
            $telefono = "";
        }


        
        if ($nombre == "" && $apellido1 == "" && $apellido2 == "" && $telefono == "") {
            $contactoNuevo = new Contacto($_GET['nombre'], $_GET['apellido1'], $_GET['apellido2'], $_GET['telefono']);
            echo $contactoNuevo->toString();
        }else {
            echo '  
            <form method="get">
            <p>nombre: <input type="text" name="nombre" id="nombre"> ' . $nombre . '
            </p>

            <p>primer apellido: <input type="text" name="apellido1" id="apellido1"> ' . $apellido1 . '
            </p>

            <p>segundo apellido: <input type="text" name="apellido2" id="apellido2"> ' . $apellido2 . '
            </p>

            <p>Telefono: <input type="text" name="telefono" id="telefono"> ' . $telefono . '
            </p>

            <input type="submit" value="Enviar" name="enviar" id="enviar">
            </form>
        ';

        $nombre = " ";
        $apellido1 = " ";
        $apellido2 = " ";
        $telefono = " ";
        }

    ?>
    </body>
</html>