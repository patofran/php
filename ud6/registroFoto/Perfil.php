<?php

    require_once('Conexion.php');
    $conexion = Conexion::obtenerConexion();

    echo '
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>albums</title>
            <link rel="stylesheet" href="css/style.css" type="text/css">
        </head>
        <body>
    ';

    //primero hacemos la conexion

    $consulta = $conexion->query("SELECT * FROM `album` ORDER BY `album`.`codigo` ASC");
    echo "
        <table>
            <legend></legend>
            <tr>
                <td>Codigo</td>
                <td>titulo</td>
                <td>discografia</td>
                <td>Formato</td>
                <td>Fecha de lanzamiento</td>
                <td>Fecha de compra</td>
                <td>Precio</td>
                <td>Borrar album</td>
            </tr> ";

            while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "
                        <tr> 
                            <td>" . $datos['codigo'] . "</td> 
                            <td><a href='disco.php?cod=" . $datos['codigo'] . "'>" . $datos['titulo'] . "</a></td>
                            <td>" . $datos['discografia'] . "</td> 
                            <td>" . $datos['formato'] . "</td> 
                            <td>" . $datos['fechaLanzamiento'] . "</td>
                            <td>" . $datos['fechaCompra'] . "</td>
                            <td>" . $datos['precio'] . "</td>
                            <td><a href='borrarDisco.php?cod=" . $datos['codigo'] . "'>Borrar</a></td>
                        </tr>
                    ";  

                $ultimoCodigo = $datos['codigo'];
            }
    echo "</table>";

    $ultimoCodigo++;

    echo "<br><br>Para poner algun album nuevo pulsa <a href='discoNuevo.php?cod=$ultimoCodigo'>aquí</a>";

    echo "<br><br>Para buscar alguna cancion o album pulsa <a href='canciones.php'>aquí</a>";

    echo '<form method="get" action="">
                <br><input type="submit" name="cerrarSesion" value="Cerrar Sesión">
            </form>';

    echo '
            </body>
        </html>
    ';
?>