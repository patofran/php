<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Nuevo Contacto</title>
    </head>

    <body>
        <?php
            include_once "Contacto.php";

            $contactos = array();
            $conexion = new mysqli('localhost', 'agenda', 'agenda', 'agenda');
            $idContacto = " ";

            $consulta = $conexion->query("Select * from contactos;");
            if ($consulta->num_rows > 0) {
                while ($datos = $consulta->fetch_assoc()) {
                    $contactoActual = new Contacto($datos["nombre"], $datos["apellido1"], $datos["apellido2"], $datos["telefono"]);
                    array_push($contactos, $contactoActual);
                    $contactoActual->setId($datos["idContacto"]);
                }
            }

            echo "<h1>Eliminar un contacto.</h1>";
            echo "<h2>Lista de los contactos.</h2>";

            for ($i = 0; $i < count($contactos); $i++) { 
                $contador = $i + 1;
                echo $contactos[$i] . " <br> <br>";
            }

            if (isset($_GET['idContacto']) && $_GET['idContacto'] == "") {
                $idContacto = "Error: falta el idContacto.";
            }else {
                foreach ($contactos as $cont) {
                    if ($cont->getidContacto() == $_GET['idContacto']) {
                        $consulta = $conexion->query($cont->eliminarContacto());
                        unset($contactos[$cont->getidContacto()]);
                        $contactos = array_values($contactos);
                        $idContacto = "Info: contacto eliminado con exito.";
                        break;
                    }else{
                        $idContacto = "";
                    }
                }
                
            }

            echo '  
                <form method="get">
                    <p>indica el id del contacto a eliminar: <input type="text" name="idContacto" id="idContacto"> ' . $idContacto . '</p>
                    <input type="submit" value="Enviar" name="enviar" id="enviar">
                </form>
            ';
        ?> 


        <p>Para volver a crear contactos pulse <a href="contactonuevo.php">aqui</a></p>
    </body>
</html>