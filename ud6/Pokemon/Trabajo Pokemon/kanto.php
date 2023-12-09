<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pokemon</title>
	<link rel="stylesheet" type="text/css" href="examen.css">
</head>
<body>
 
<header> Mi blog de &nbsp;&nbsp; <img src="img/International_Pokémon_logo.svg.png"></header>

<div></div>

<nav><strong>G1 Kanto &nbsp;&nbsp; G2 Johto &nbsp;&nbsp; G3 Hoenn  &nbsp;&nbsp; G4 Sinnoh  &nbsp;&nbsp; G5 Unova  &nbsp;&nbsp; G6 Kalos  &nbsp;&nbsp; G7 Alola &nbsp;&nbsp; G8 Galar &nbsp;&nbsp; G9 Paldea &nbsp;&nbsp; Búsqueda</strong> </nav>

<div id="iniciales">
<?php
	$ch = curl_init(); 
	$url = "https://pokeapi.co/api/v2/pokemon/?limit=1";
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$json_data = curl_exec($ch);
	curl_close($ch);

	$arrayPokemon = json_decode($json_data);

	foreach ($arrayPokemon->results as $pokemon) {
        echo "<div id='entrada'><img src='" . ucfirst($pokemon->sprites->) . "' alt='' <br> <p>" . ucfirst($pokemon->name) . " </p></div>";
    }
?>
</div>
<div class="abajo"></div>

<footer> Trabajo &nbsp;<strong> Desarrollo Web en Entorno Servidor </strong>&nbsp; 2023/2024 IES Serra Perenxisa.</footer>

</body>
</html>