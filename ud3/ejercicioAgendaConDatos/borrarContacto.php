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
            $telefono = " ";

            $consulta = $conexion->query("Select * from contactos;");
            if ($consulta->num_rows > 0) {
                while ($datos = $consulta->fetch_assoc()) {
                    array_push($contactos, new Contacto($datos["nombre"], $datos["apellido1"], $datos["apellido2"], $datos["telefono"]));
                }
            }

            echo "<h1>Eliminar un contacto.</h1>";
            echo "<h2>Lista de los contactos.</h2>";

            for ($i = 0; $i < count($contactos); $i++) { 
                $contador = $i + 1;
                echo "id: " . $contador . " | " . $contactos[$i] . " <br> <br>";
            }

            if (isset($_GET['telefono']) && $_GET['telefono'] == "") {
                $telefono = "Error: falta el telefono.";
            }else {
                foreach ($contactos as $cont) {
                    if ($cont->getTelefono() == $_GET['telefono']) {
                        $telefono = "Error: el telefono ya existe.";
                        break;
                    }else {
                        $telefono = "";
                    }
                }
                
            }

            echo '  
                <form method="get">
                    <p>indica el telefono del contacto a eliminar: <input type="text" name="telefono" id="telefono"> ' . $telefono . '</p>
                    <input type="submit" value="Enviar" name="enviar" id="enviar">
                </form>
            ';
        ?> 
    </body>
</html>