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
        //$insertar = $conexion->query("INSERT INTO `contactos` (`idContacto`, `nombre`, `apellido1`, `apellido2`, `telefono`) VALUES (NULL, '', '', '', '')");
        //$borrar = $conexion->query("DELETE FROM contactos WHERE `contactos`.`idContacto` = ");
        //mostramos los contactos con una tabla con una condiciom que cada vez que se hace el post se actualiza

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            echo "
                <table>
                    <legend>Lista de los contactos</legend>
                    <tr>
                        <td>Id Contacto</td>
                        <td>Nombre</td>
                        <td>Apellido 1</td>
                        <td>Apellido 2</td>
                        <td>Telefono</td>
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
                                    </tr>
                                ";  
                        }
                    }
            echo "</table>";
        }
        
        //comprovamos que los datos del formulario estan correctos
        
        $infoNombre = " ";
        $infoApellido1 = " ";
        $infoApellido2 = " ";
        $infoTelefono = " ";

        if (isset($_GET["nombre"]) && $_GET["nombre"] == "") {
            $infoNombre = "Error: falta el nombre.";
        }else {
            $infoNombre = "";
        }

        if (isset($_GET["apellido1"]) && $_GET["apellido1"] == "") {
            $infoApellido1 = "Error: falta el primer apellido.";
        }else {
            $infoApellido1 = "";
        }

        if (isset($_GET["apellido2"]) && $_GET["apellido2"] == "") {
            $infoApellido2 = "Error: falta el segundo apellido.";
        }else {
            $infoApellido2 = "";
        }

        //para el telefono nos tenemos que asegurar de que no exista en la tabla 

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $telefono = $conexion->real_escape_string($_GET['telefono']);
            $verTelefono = $conexion->query("SELECT * FROM contactos WHERE telefono = " . $telefono . ";");

            if (isset($_GET["telefono"]) && $_GET["telefono"] == "") {
                $infoTelefono = "Error: falta el telefono.";
            }elseif ($verTelefono->num_rows > 0) {
                $infoTelefono = "Error: el telefono ya existe.";
            }else {
                $infoTelefono = "";
            }
        }


        echo "
            <h2>Nuevo contacto.</h2>
            <form action = '" . $_SERVER["PHP_SELF"] . "' method = 'get'>
                <p>idContacto: </p>
                <input type = 'text' name = 'idContacto' id = 'idContacto' disabled>
                        
                <p>nombre: " . $infoNombre . " </p>
                <input type = 'text' name = 'nombre' id = 'nombre'>
        
                <p>Apellido 1: " . $infoApellido1 . " </p>
                <input type = 'text' name = 'apellido1' id = 'apellido1'>
        
                <p>Apellido 2: " . $infoApellido2 . " </p>
                <input type = 'text' name = 'apellido2' id = 'apellido2'>
        
                <p>Telefono: " . $infoTelefono . " </p>
                <input type = 'text' name = 'telefono' id = 'telefono'>
                
                <br><br>
                <input type = 'submit' value = 'Enviar'>
            </form>
        ";

    ?>
</body>
</html>