<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contactos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Manejo de los contactos.</h1>
    <?php
        //primero acedemos a los contactos en la base de datos
        $conexion = new mysqli("localhost", "agenda", "agenda", "agenda");
        $consulta = $conexion->query("Select * from contactos;");
        //comprovamos que los datos del formulario estan correctos
        
        $infoIdContacto = " ";
        $infoNombre = " ";
        $infoApellido1 = " ";
        $infoApellido2 = " ";
        $infoTelefono = " ";


        if (isset($_GET["idContacto"])) {
            if ($_GET["idContacto"] == "") {
                $infoIdContacto = " ";
            }else {
                $infoIdContacto= "";
                $idContacto = $_GET["idContacto"];
            }
        }else {
            $idContacto = "";
            $nombre = "";
            $apellido1 = "";
            $apellido2 = "";
            $telefono = "";
        }


        if (isset($_GET["nombre"])) {
            if ($_GET["nombre"] == "") {
                $infoNombre = "Error: falta el nombre.";
            }else {
                $infoNombre = "";
                $nombre = $_GET["nombre"];
            }
        }

        if (isset($_GET["apellido1"])) {
            if ($_GET["apellido1"] == "") {
                $infoApellido1 = "Error: falta el primer apellido.";
            }else {
                $infoApellido1 = "";
                $apellido1 = $_GET["apellido1"];
            }
        }

        if (isset($_GET["apellido2"])) {
            if ($_GET["apellido2"] == "") {
                $infoApellido2 = "Error: falta el segundo apellido.";
            }else {
                $infoApellido2 = "";
                $apellido2 = $_GET["apellido2"];
            }
        }

        //para el telefono nos tenemos que asegurar de que no exista en la tabla 

        if (isset($_GET["telefono"])) {
            if ($_GET["telefono"] == "") {
                $infoTelefono = "Error: falta el telefono.";
            }elseif (!is_numeric($_GET["telefono"])) {
                $infoTelefono = "Error: formato del telefono incorrecto.";
            }else {
                $telefono = (int) $_GET["telefono"];
                $infoTelefono = "";
            }
        }

         //si todo esta correcto lo metemos en la base de datos

         if ($infoNombre == "" && $infoApellido1 == "" && $infoApellido2 == "" && $infoTelefono == "" && $infoIdContacto == "") {
            $conexion->query("UPDATE `contactos` SET `nombre` = '$nombre', `apellido1` = '$apellido1', `apellido2` = '$apellido2', `telefono` = '$telefono' WHERE `contactos`.`idContacto` = '$idContacto'");
    
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;

            exit;
        }
        
        if ($infoNombre == "" && $infoApellido1 == "" && $infoApellido2 == "" && $infoTelefono == ""){
            $conexion->query("INSERT INTO `contactos` (`idContacto`, `nombre`, `apellido1`, `apellido2`, `telefono`) VALUES (NULL, '$nombre', '$apellido1', '$apellido2', '$telefono')");

            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        //mostramos los contactos con una tabla con una condiciom que cada vez que se hace el post se actualiza

        if ($_SERVER["REQUEST_METHOD"] == "GET" || $ContactoNuevo) {
            echo "
                <table>
                    <legend>Lista de los contactos</legend>
                    <tr>
                        <td>Id Contacto</td>
                        <td>Nombre</td>
                        <td>Apellido 1</td>
                        <td>Apellido 2</td>
                        <td>Telefono</td>
                        <td>Eliminar</td>
                        <td>Modificar</td>
                    </tr> ";

                    if ($consulta->num_rows > 0) {
                        while ($datos = $consulta->fetch_assoc()) {
                            echo "
                                    <tr> 
                                        <td>" . $datos['idContacto'] . "</td> 
                                        <td>" . $datos['nombre'] . "</td> 
                                        <td>" . $datos['apellido1'] . "</td> 
                                        <td>" . $datos['apellido2'] . "</td> 
                                        <td>" . $datos['telefono'] . "</td>
                                        <td><a href='" . $_SERVER['PHP_SELF'] . "?eliminar=" . $datos['idContacto'] . "'><img src='css/7602028.png' alt='Eliminar'></a></td>
                                        <td><a href='" . $_SERVER['PHP_SELF'] . "?idContacto=" . $datos['idContacto'] . "'><img src='css/lapiz.png' alt='Eliminar'></a></td>
                                    </tr>
                                ";  
                        }
                    }
            echo "</table>";
        }

        //aqui podemos eliminar el contacto

        if (isset($_GET['eliminar'])) {
            $idEliminar = $_GET['eliminar'];

            $eliminado = $conexion->prepare("DELETE FROM contactos WHERE idContacto = ?");
            $eliminado->bind_param("i", $idEliminar);
            $eliminado->execute();
            $eliminado->close();

            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        //en caso de querer modificar un contacto ponemos los datos en el form

        if (isset($_GET['idContacto'])) {
            $idEditar = $_GET['idContacto'];
        
            $stmt = $conexion->prepare("SELECT * FROM contactos WHERE idContacto = ?");
            $stmt->bind_param("i", $idEditar);
            $stmt->execute();
            $stmt->bind_result($idContacto, $nombre, $apellido1, $apellido2, $telefono);
            $stmt->fetch();
            $stmt->close();
        }

        echo "
            <h2>Nuevo contacto.</h2>
            <form action = '" . $_SERVER["PHP_SELF"] . "' method = 'get'>
                <p>idContacto: </p>
                <input type = 'text' name = 'idContacto' id = 'idContacto' value = '$idContacto' readonly>
                        
                <p>nombre: " . $infoNombre . " </p>
                <input type = 'text' name = 'nombre' id = 'nombre' value = '$nombre'>
        
                <p>Apellido 1: " . $infoApellido1 . " </p>
                <input type = 'text' name = 'apellido1' id = 'apellido1' value = '$apellido1'>
        
                <p>Apellido 2: " . $infoApellido2 . " </p>
                <input type = 'text' name = 'apellido2' id = 'apellido2' value = '$apellido2'>
        
                <p>Telefono: " . $infoTelefono . " </p>
                <input type = 'text' name = 'telefono' id = 'telefono' value = '$telefono'>
                
                <br><br>
                <input type= 'submit' value = 'Enviar'> 
            </form>";
        
        $conexion->close();
    ?>
    
</body>
</html>