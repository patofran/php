<?php

    require_once('Conexion.inc.php');
    $conexion = Conexion::obtenerConexion();

    $usuario;
    $cont;
    $todoBien = false; 
    $errorFoto;
    $rutaFotoGrande;
    $rutaFotoPeque;

    if (isset($_FILES["fotosPerfil"]) && isset($_POST["cont"]) && isset($_POST["usu"])) {

        $cont = password_hash($_POST["cont"], PASSWORD_DEFAULT);
        $usuario = $_POST["usu"];

        $directorioImagenes = "img/usuarios/$usuario";
        if (!is_dir($directorioImagenes)) {
            mkdir($directorioImagenes, 0777, true);
        }

        $fotoPerfil = $_FILES["fotoPerfil"];

        print $fotoPerfil["size"];
        $errorFoto = $fotoPerfil["size"];
    }

    if ($todoBien) {
        $conexion->query("INSERT INTO `usuarios` (`idUsuario`, `nombre`, `pass`, `urlFotoGrande`, `urlFotosPeque`) VALUES (NULL, '$usuario', '$cont', $rutaFotoGrande, $rutaFotoPeque)");
        header("Location: LogIn.php?nuevo=$usuario");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css" type="text/css">
    <title>Nuevo usuario</title>
</head>
<body>
    <section id="formulario">
        <h2>Registro de Nuevo Usuario</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <p>Usuario: </p>
                <input type="text" id="usu" name="usu" required><br><br>
                
                <p>Contraseña: </p>
                <input type="password" id="cont" name="cont" required><br><br>

                <p>Foto de perfil (Importante tiene que ser de 360 pixeles de ancho x 480 pixeles de largo)</p>
                <input type="file" name="fotoPerfil" accept="image/png, image/jpg" required><br><br>

                <p><?php if (isset($errorFoto)) { echo $errorFoto; } ?></p>

                <input type="submit" value="Registro">
        </form>

        <p>Si ya estas registrado, pincha <a href="logIn.php">aqui</a></p>
    </section>
</body>
</html>