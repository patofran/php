<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "Dvd.php";
        include_once "Soporte.php";

        $miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
        echo "<strong>" . $miDvd->titulo . "</strong>";
        echo "<br>Precio: " . $miDvd->getPrecio() . " euros";
        echo "<br>Precio IVA incluido: " .
        $miDvd->getPrecioConIva() . " euros";
        echo $miDvd->muestraResumen();
    ?>
</body>
</html>