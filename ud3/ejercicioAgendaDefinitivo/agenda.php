<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contactos</title>
</head>
<body>
    <h1>Manejo de los contactos.</h1>
    <?php
        //primero acedemos a los contactos en la base de datos
        $conexion = new mysqli('localhost', 'agenda', 'agenda', 'agenda');

        //mostramos los contactos con una tabla
    ?>

    <table>
        <tr>
            <td>Id Contacto</td>
            <td>Nombre</td>
            <td>Apellido 1</td>
            <td>Apellido 2</td>
            <td>Telefono</td>
        </tr>
    </table>
</body>
</html>