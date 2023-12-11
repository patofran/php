<?php
    require_once('Conexion.inc.php');
    $conexion = Conexion::obtenerConexion();

    if (isset($_COOKIE["sesionUsuario"])) {
        $nombre = $_COOKIE["sesionUsuario"];

        $consulta = $conexion->prepare("SELECT * FROM `usuarios` WHERE `nombre` LIKE ?;");
        $consulta->execute([$nombre]);
        $usuario = $consulta->fetch();
        
        if ($usuario) {
            echo $nombre . " <img src='" . $usuario["urlFoto"] . "' alt='' style='width: 72px; height: 96px;'>";
            echo "<br><br><br><br><br><br>Tu nombre se perfil es: " . $usuario["nombre"] . "<br> Tu foto de perfil es: <br>" . " <img src='" . $usuario["urlFoto"] . "' alt='' style='width: 360px; height: 480px;'>";
            echo "<br>Y tu id es el: " . $usuario["idUsuario"];
        }
        
    }
?>