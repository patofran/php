<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pokemon G5 Unova</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
 
<header> Mi blog de &nbsp;&nbsp; <img src="img/International_Pokémon_logo.svg.png"></header>

<nav><strong><a href="kanto.php">G1 Kanto</a>&nbsp;&nbsp; <a href="johto.php">G2 Johto</a> &nbsp;&nbsp; <a href="hoenn.php">G3 Hoenn</a>  &nbsp;&nbsp; <a href="sinnoh">G4 Sinnoh</a> &nbsp;&nbsp; <a href="unova.php">G5 Unova</a> &nbsp;&nbsp; <a href="kalos.php">G6 Kalos</a> &nbsp;&nbsp;<a href="alola.php">G7 Alola</a> &nbsp;&nbsp; <a href="galar.php">G8 Galar</a> &nbsp;&nbsp;<a href="paldea.php">G9 Paldea</a> &nbsp;&nbsp; <a href="index.php">Búsqueda</a></strong> </nav>

<section id="contenido">
	<?php
			$ch = curl_init(); 
			$url = "https://pokeapi.co/api/v2/pokemon/?limit=155&offset=494";
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$json_data = curl_exec($ch);
			curl_close($ch);

			$arrayPokemon = json_decode($json_data);

			foreach ($arrayPokemon->results as $pokemon) {
				$ch = curl_init($pokemon->url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$datosPokemon = json_decode(curl_exec($ch));
				curl_close($ch);
				echo "<div id='ult_entradas'><img src='" . $datosPokemon->sprites->front_default . "' alt=''><p>" . ucfirst($pokemon->name) . " </p>
				<a href='infoPokemon.php?nombre=$pokemon->name'>info</a></div>";
			}
	?>
</section>

<footer> Trabajo &nbsp;<strong> Desarrollo Web en Entorno Servidor </strong>&nbsp; 2023/2024 IES Serra Perenxisa.</footer>

</body>
</html>