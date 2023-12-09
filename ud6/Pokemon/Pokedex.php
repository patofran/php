<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pokedex</title>
    </head>
    <body>

        <?php

            $ch = curl_init(); 
            $url = "https://pokeapi.co/api/v2/pokemon/?limit=151";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $json_data = curl_exec($ch);
            curl_close($ch);

            $arrayPokemon = json_decode($json_data);

            echo "<h2>Lista de los Pokemon:</h2>";
            echo "<ul>";

            foreach ($arrayPokemon->results as $pokemon) {
                echo "<li>" . ucfirst($pokemon->name) . "</li>";
            }

            echo "</ul>";
        ?>

    </body>
</html>