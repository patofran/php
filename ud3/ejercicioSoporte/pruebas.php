<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "Soporte.php";
        include "CintaVideo.php";
        
        $miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
        echo "<strong>" . $miCinta->titulo . "</strong>";
        echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
        echo "<br>Precio IVA incluido: " .
        $miCinta->getPrecioConIva() . " euros";
        $miCinta->muestraResumen();
    ?>
</body>
</html>