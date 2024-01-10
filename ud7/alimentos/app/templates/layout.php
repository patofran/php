<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Desarrollo web en entorno servidor - tema 10 - MVC</title>
	
	<link rel="stylesheet" href="<?php echo 'css/'.Config::$mvc_vis_css ?>"/>
</head>
<body>
	<header>
		<h1>Información de alimentos</h1>
	</header>

	<nav>
		<ul>
			<li><a href="index.php?ctl=inicio">inicio</a></li>
			<li><a href="index.php?ctl=listar">ver alimentos</a></li>
			<li><a href="index.php?ctl=insertar">insertar alimento</a></li>
			<li><a href="index.php?ctl=buscar">buscar por nombre</a></li>
			<li><a href="index.php?ctl=buscarAlimentosPorEnergia">buscar por energía</a></li>
			<li><a href="index.php?ctl=buscarAlimentosCombinada">búsqueda combinada</a></li>
		</ul>
	 </nav>

	<main>
		<?php echo $contenido ?>
	</main>

	<footer id="pie"> - Desarrollo Web en Entorno Servidor -</footer>
</body>
</html>