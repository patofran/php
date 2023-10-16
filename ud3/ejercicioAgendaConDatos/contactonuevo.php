<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Nuevo Contacto</title>
    </head>

    <body>
    <h1>Manejo de los contactos.</h1>

    <?php
        include_once "Contacto.php";

        $contactos = array();
        $conexion = new mysqli('localhost', 'agenda', 'agenda', 'agenda');


        $consulta = $conexion->query("Select * from contactos;");
        if ($consulta->num_rows > 0) {
            while ($datos = $consulta->fetch_assoc()) {
                $contactoActual = new Contacto($datos["nombre"], $datos["apellido1"], $datos["apellido2"], $datos["telefono"]);
                array_push($contactos, $contactoActual);
                $contactoActual->setId($datos["idContacto"]);
            }
        }


        $nombre = " ";
        $apellido1 = " ";
        $apellido2 = " ";
        $telefono = " ";
        $dentroTelefono = 0;

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
        }else{
            $dentroTelefono = $_GET['telefono'];
        }

        foreach ($contactos as $cont) {
            if ($cont->getTelefono() == $dentroTelefonos) {
                $telefono = "Error: el telefono ya existe.";
                break;
            }else {
                $telefono = "";
            }
        }
        
        if ($nombre == "" && $apellido1 == "" && $apellido2 == "" && $telefono == "") {
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

            if (isset($_GET['nombre']) && isset($_GET['apellido1']) && isset($_GET['apellido2']) && isset($_GET['telefono'])) {
                if (empty($contactos)) {
                    $contactoNuevo = new Contacto($_GET['nombre'], $_GET['apellido1'], $_GET['apellido2'], $_GET['telefono']); 
                    $conexion->query($contactoNuevo->guardarDatosDeCero());

                    $consulta = $conexion->query("SELECT * FROM `contactos` WHERE `telefono` LIKE " . $contactoNuevo->getTelefono() . ";");
                    if ($consulta->num_rows > 0) {
                        while ($datos = $consulta->fetch_assoc()) {
                            array_push($contactos, $contactoNuevo);
                            $contactoNuevo->setId($datos["idContacto"]);
                        }
                    }
                }else {
                    $contactoNuevo = new Contacto($_GET['nombre'], $_GET['apellido1'], $_GET['apellido2'], $_GET['telefono']); 
                    $conexion->query($contactoNuevo->guardarDatos());

                    $consulta = $conexion->query("SELECT * FROM `contactos` WHERE `telefono` LIKE " . $contactoNuevo->getTelefono() . ";");
                    if ($consulta->num_rows > 0) {
                        while ($datos = $consulta->fetch_assoc()) {
                            array_push($contactos, $contactoNuevo);
                            $contactoNuevo->setId($datos["idContacto"]);
                        }
                    }
                }
            }

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
        
        echo '<h2>Lista de los contactos actuales.</h2>';

        for ($i = 0; $i < count($contactos); $i++) { 
            $contador = $i + 1;
            echo $contactos[$i] . " <a href='borrarcontacto.php'><img src='css/7602028.png' alt='Eliminar'></a> <br> <br>";
        }

        $consulta->close();
        $conexion->close();
    ?>
    </body>
</html>