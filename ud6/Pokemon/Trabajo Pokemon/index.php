<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pokemon</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
 
<header> Mi blog de &nbsp;&nbsp; <img src="img/International_Pokémon_logo.svg.png"></header>

<nav><strong>G1 Kanto &nbsp;&nbsp; G2 Johto &nbsp;&nbsp; G3 Hoenn  &nbsp;&nbsp; G4 Sinnoh  &nbsp;&nbsp; G5 Unova  &nbsp;&nbsp; G6 Kalos  &nbsp;&nbsp; G7 Alola &nbsp;&nbsp; G8 Galar &nbsp;&nbsp; G9 Paldea &nbsp;&nbsp; Búsqueda</strong> </nav>

<section id="contenido">
	<br>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
		<label for="nombre">Buscar por nombre:</label>
		<input type="text" id="nombre" name="nombre" placeholder="Nombre del Pokémon">
		<br> <br>
		<label for="tipo">Buscar por tipo:</label>
		<select id="tipo" name="tipo">
			<option value="">Selecciona un tipo</option>
			<option value="normal">Normal</option>
			<option value="fighting">Lucha</option>
			<option value="flying">Volador</option>
			<option value="poison">veneno</option>
			<option value="ground">Tierra</option>
			<option value="rock">Roca</option>
			<option value="bug">Bicho</option>
			<option value="ghost">Fantasma</option>
			<option value="steel">Acero</option>
			<option value="fire">Fuego</option>
			<option value="grass">Planta</option>
			<option value="water">Agua</option>
			<option value="electric">Electrico</option>
			<option value="psychic">Psiquico</option>
			<option value="ice">Hielo</option>
			<option value="dragon">Dragon</option>
			<option value="dark">Siniestro</option>
			<option value="fairy">Hada</option>
		</select>

		<button type="submit">Buscar</button>
	</form>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			if (isset($_GET["tipo"])) {
				$tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : "";

				$url = "https://pokeapi.co/api/v2/type/$tipo";
				$json_data = file_get_contents($url);

				if ($json_data !== false) {
					$tipoData = json_decode($json_data);

					foreach ($tipoData->pokemon as $pokemon) {
						$ch = curl_init($pokemon->pokemon->url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$datosPokemon = json_decode(curl_exec($ch));
						curl_close($ch);

						echo "<div id='ult_entradas'><img src='" . $datosPokemon->sprites->front_default . "' alt=''><p>" . ucfirst($pokemon->pokemon->name) . "</p></div>";
					}
				} else {
					echo "Error al decodificar los datos JSON para el tipo $tipo.";
				}
			}
		}
	?>
</section>

<footer> Trabajo &nbsp;<strong> Desarrollo Web en Entorno Servidor </strong>&nbsp; 2023/2024 IES Serra Perenxisa.</footer>

</body>
</html>