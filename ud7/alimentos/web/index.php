<?php
// web/index.php
// carga del modelo y los controladores
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';
// enrutamiento
/* array asociativo cuya función es definir una tabla para mapear
* (asociar), rutas en acciones de un controlador.
* Esta tabla será utilizada para saber qué acción se debe disparar */
$map = array(
	'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
	'listar' => array('controller' =>'Controller', 'action' =>'listar'),
	'insertar' => array('controller' =>'Controller', 'action' =>'insertar'),
	'buscar'=>array('controller' =>'Controller', 'action' =>'buscarPorNombre'),
	'ver' => array('controller' =>'Controller', 'action' =>'ver')
);

// Parseo de la ruta
if (isset($_GET['ctl'])) {
	if (isset($map[$_GET['ctl']])) {
		$ruta = $_GET['ctl'];
	}
	else {
		header('Status: 404 Not Found');
		echo '<html><body>Error 404: No existe la ruta '. $_GET['ctl'] .'.</body></html>';
		exit;
	}
}
else {
	// ruta por defecto, por si la query string llega vacía
	$ruta = 'inicio';
}

$controlador = $map[$ruta];
// Ejecucion del controlador asociado a la ruta
if (method_exists($controlador['controller'], $controlador['action'])) {
	call_user_func(array(new $controlador['controller'], $controlador['action']));
}
else {
	header('Status: 404 Not Found');
	echo '<html><body>Error 404: El controlador '. $controlador['controller'].'->'.$controlador['action'] .'no existe.</body></html>';
}