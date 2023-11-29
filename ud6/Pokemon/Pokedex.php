<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>
<body>

<?php
    $enlace = "https://pokeapi.co/api/v2/pokemon/?limit=151";
    $json_data = file_get_contents($enlace);
    $pokemon_list = json_decode($json_data);

    echo "<h2>Lista de los 10 primeros Pokémon:</h2>";
    echo "<ul>";

    foreach ($pokemon_list->results as $pokemon) {
        echo "<li>Nombre: " . ucfirst($pokemon->name) . "</li>";
    }

    echo "</ul>";
?>


</body>
</html>