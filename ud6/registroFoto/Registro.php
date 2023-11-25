<?php

    require_once('Conexion.inc.php');
    $conexion = Conexion::obtenerConexion();

    $usuario;
    $cont;
    $todoBien = false; 
    $errorFoto;
    $rutaFoto;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["fotoPerfil"]) && isset($_POST["cont"]) && isset($_POST["usu"])) {
            $fotoPerfil = $_FILES["fotoPerfil"];
            $cont = password_hash($_POST["cont"], PASSWORD_DEFAULT);
            $usuario = $_POST["usu"];
            
            $directorioImagenes = "img/usuarios/$usuario";
            if (!is_dir($directorioImagenes)) {
                mkdir($directorioImagenes, 0777, true);
            }

            list($ancho, $alto) = getimagesize($fotoPerfil["tmp_name"]);
            if ($ancho > 360 || $alto > 480) {
                $errorFoto = "Error: La imagen debe tener un tamaño máximo de 360x480px.";
            } else {
                $rutaFoto =  $directorioImagenes . "/" . $fotoPerfil["name"];
                move_uploaded_file($fotoPerfil["tmp_name"], $rutaFoto);
                $conexion->query("INSERT INTO `usuarios` (`idUsuario`, `nombre`, `pass`, `urlFoto`) VALUES (NULL, '$usuario', '$cont', '$rutaFoto')");
                header("Location: LogIn.php?nuevo=$usuario");
                $errorFoto = "";
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

                <p>Foto de perfil (Importante tiene que ser de 360 pixeles de ancho x 480 pixeles de largo)</p>
                <input type="file" name="fotoPerfil" required><br><br>

                <p><?php if (isset($errorFoto)) { echo $errorFoto; } ?></p>

                <input type="submit" value="Registro">
        </form>

        <p>Si ya estas registrado, pincha <a href="logIn.php">aqui</a></p>
    </section>
</body>
</html>