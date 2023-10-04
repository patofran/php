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
        
        $soporte1 = new Soporte("Tenet", 22, 3);
        echo "<strong>" . $soporte1->titulo . "</strong>";
        echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
        echo "<br>Precio IVA incluido: " .
        $soporte1->getPrecioConIVA() . " euros<br>";
        echo $soporte1->muestraResumen() . "<br>";

        $miCinta = new CintaVideo("Los cazafantasmas", 23, 5, 107);
        echo "<strong>" . $miCinta->titulo . "</strong>";
        echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
        echo "<br>Precio IVA incluido: " .
        $miCinta->getPrecioConIva() . " euros <br>";
        echo $miCinta->muestraResumen() . "<br>";
    ?>
</body>
</html>