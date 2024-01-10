<?php ob_start() ?>
<h1>Inicio</h1>
<time>Fecha: <?php echo $params['fecha'] ?></time>
<p><?php echo $params['mensaje'] ?></p>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>