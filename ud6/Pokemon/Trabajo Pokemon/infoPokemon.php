<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>info Pokemon</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
 
<header> Mi blog de &nbsp;&nbsp; <img src="img/International_Pokémon_logo.svg.png"></header>

<nav><strong>G1 Kanto &nbsp;&nbsp; G2 Johto &nbsp;&nbsp; G3 Hoenn  &nbsp;&nbsp; G4 Sinnoh  &nbsp;&nbsp; G5 Unova  &nbsp;&nbsp; G6 Kalos  &nbsp;&nbsp; G7 Alola &nbsp;&nbsp; G8 Galar &nbsp;&nbsp; G9 Paldea &nbsp;&nbsp; Búsqueda</strong> </nav>

<section id="contenido">
	<?php         
        if (isset($_GET["nombre"])) {
            $nombre = $_GET["nombre"];
            
            $url = "https://pokeapi.co/api/v2/pokemon/{$nombre}";
            
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $json_data = curl_exec($ch);
            curl_close($ch);
        
            $pokemonData = json_decode($json_data);

            echo "<div id='info'> <h1>Información de " . ucfirst($pokemonData->name) . "</h1>
                <div id='ult_entradas'>
                    <img src='{$pokemonData->sprites->front_default}' alt='{$pokemonData->name}'>
                </div>
                <p>Nombre: " . ucfirst($pokemonData->name) . "</p> <br>
                <p>Número de Pokédex: " . $pokemonData->order . "</p> <br>
                <p>Altura: " . $pokemonData->height . "</p> <br>
                <p>peso: " . $pokemonData->weight ."</p> <br>
                <p>Habilidades:</p> <br>
                <ul>";
            foreach ($pokemonData->abilities as $ability) {
                echo "<li>" . ucfirst($ability->ability->name) . "</li> <br> ";
            }
            echo "</ul> </div>";
        }     
	?>
</section>

<footer> Trabajo &nbsp;<strong> Desarrollo Web en Entorno Servidor </strong>&nbsp; 2023/2024 IES Serra Perenxisa.</footer>

</body>
</html>