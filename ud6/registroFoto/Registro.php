<?php

    require_once('Conexion.inc.php');
    $conexion = Conexion::obtenerConexion();

    $usuario;
    $cont;
    $errorFoto;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["cont"]) && isset($_POST["usu"])) {
            $cont = password_hash($_POST["cont"], PASSWORD_DEFAULT);
            $usuario = $_POST["usu"];
    
            $directorioImagenes = "img/usuarios/$usuario";
            if (!is_dir($directorioImagenes)) {
                mkdir($directorioImagenes, 0777, true);
            }
    
            $fotoPerfil = $_FILES["fotoPerfil"];
    
            if ($fotoPerfil["error"] === UPLOAD_ERR_OK) {
                $fotoGrande = imagecreatefrompng($fotoPerfil["tmp_name"]);
                $rutaFotoGrande = "$directorioImagenes/{$usuario}_grande.png";
    
                list($ancho, $alto) = getimagesize($fotoPerfil["tmp_name"]);
                if ($ancho > 360 || $alto > 480) {
                    $errorFoto = "Error: La imagen debe tener un tamaño máximo de 360x480px.";
                } else {
                    imagepng($fotoGrande, $rutaFotoGrande);
    
                    $fotoPeque = imagescale($fotoGrande, 72, 96);
                    $rutaFotoPeque = "$directorioImagenes/{$usuario}_pequena.png";
                    imagepng($fotoPeque, $rutaFotoPeque);
    
                    imagedestroy($fotoGrande);
                    imagedestroy($fotoPeque);
    
                    $conexion->query("INSERT INTO `usuarios` (`idUsuario`, `nombre`, `pass`, `urlFotoGrande`, `urlFotosPeque`) VALUES (NULL, '$usuario', '$cont', '$rutaFotoGrande', '$rutaFotoPeque')");
                    header("Location: LogIn.php?nuevo=$usuario");
                    exit(); 
                }
            } else {
                $errorFoto = "Error al cargar la imagen.";
            }
        }
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

                <p>Foto de perfil (Importante tiene que ser de 360 pixeles de anncho x 480 pixeles de largo)</p>
                <input type="file" name="fotoPerfil" accept="image/png, image/jpg" required><br><br>

                <p><?php if (isset($errorFoto)) { echo $errorFoto; } ?></p>

                <input type="submit" value="Registro">
        </form>

        <p>Si ya estas registrado, pincha <a href="logIn.php">aqui</a></p>
    </section>
</body>
</html>