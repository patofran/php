<?php
    
    require_once('Conexion.inc.php');
    $conexion = Conexion::obtenerConexion();

    $usuario;
    $cont;
    $infoError;

    if (isset($_GET["cont"]) && isset($_GET["usu"])) {
        $cont = $_GET["cont"];
        $usu = $_GET["usu"];

        $consulta = $conexion->prepare("SELECT `pass` FROM `usuarios` WHERE `nombre` LIKE ?;");
        $consulta->execute([$usu]);
        $exsiste = $consulta->fetch();

        if ($exsiste) {
            $hashUsuario = $exsiste["pass"];
            if (password_verify($cont, $hashUsuario)) {
                setcookie("sesionUsuario", $usu, 0, "/");
                header("Location: Perfil.php");
                exit;
            }else {
                $infoError = "La contraseña no esta bien";
            }
        }else {
            $infoError = "El usuario no existe.";
        }

    }

    if (isset($_GET["respuesta"])) {
        $res = $_GET["respuesta"];
        if ($res == "no") {
            setcookie("sesionUsuario", "", -1, "/");
        } 
    }
?>                      

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de sesion</title>
        <link rel="stylesheet" href="css\style.css" type="text/css">
    </head>
    <body>
        <header id="formulario">
        
            <?php 

                if (isset($_GET["respuesta"])) {
                    $res = $_GET["respuesta"];
                    if ($res == "si") {
                        header("Location: Perfil.php");
                        exit;
                    }
                    
                }

                if (isset($_COOKIE["sesionUsuario"])) {
                    $nombreCookie = $_COOKIE["sesionUsuario"];
                    echo '
                        <h1>Ya se inicio anteriormente como ' . $nombreCookie . '</h1>
                        <form action="'. $_SERVER["PHP_SELF"] .'" method="get">
                            <p>¿Deseas entrar con ese usuario?</p>
                            <button type="submit" name="respuesta" value="si">Sí</button>
                            <button type="submit" name="respuesta" value="no">No</button>
                        </form>
                    ';
                    
                    $_SESSION['usuario'] = $nombreCookie;
                }
            ?>


            <?php 
                if (isset($_GET["nuevo"])) {
                    $nuevo = $_GET["nuevo"];
                    echo "<h1>usuario $nuevo creado con exito!!</h1>";
                }
            ?>
            <h1>Inicio de sesion</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <p>Nombre: </p>
                <input type="text" id="usu" name="usu" required><br><br>
                
                <p>Contraseña: </p>
                <input type="password" id="cont" name="cont" required><br><br>

                <input type="submit" value="Entrar">
            </form>
            
            <p>
                <?php if (isset($infoError)) {
                    echo $infoError;
                } ?>
            </p>
                <p></p>
            <p>No estas registrado, pincha <a href="registro.php">aqui</a></p>
        </header>
    </body>
</html>