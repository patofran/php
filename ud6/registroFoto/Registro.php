<?php
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'disco', 'disco', $opc);
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    }

    $usuario;
    $cont;

    if (isset($_GET["cont"]) && isset($_GET["usu"])) {
        $cont = password_hash($_GET["cont"], PASSWORD_DEFAULT);
        $usuario = $_GET["usu"];
        $conexion->query("INSERT INTO `tabla_usuarios` (`id`, `usuario`, `password`) VALUES (NULL, '$usuario', '$cont')");
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <p>Usuario: </p>
                <input type="text" id="usu" name="usu" required><br><br>
                
                <p>Contraseña: </p>
                <input type="password" id="cont" name="cont" required><br><br>

                <input type="submit" value="Registro">
        </form>

        <p>Si ya estas registrado, pincha <a href="logIn.php">aqui</a></p>
    </section>
</body>
</html>