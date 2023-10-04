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
        $soporte1 = new Soporte("Tenet", 22, 3);
        echo "<strong>" . $soporte1->titulo . "</strong>";
        echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
        echo "<br>Precio IVA incluido: " .
        $soporte1->getPrecioConIVA() . " euros";
        $soporte1->muestraResumen();
    ?>
</body>
</html>