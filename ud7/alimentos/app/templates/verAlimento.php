<?php ob_start() ?>
<h1><?php echo strtoupper($params['nombre']) ?></h1>

<table>
	<tr>
		<td>Energia</td>
		<td><?php echo $params['energia'] ?></td>
	</tr>

	<tr>
		<td>Proteina</td>
		<td><?php echo $params['proteina']?></td>
	</tr>

	<tr>
		<td>Hidratos de Carbono</td>
		<td><?php echo $params['hidratocarbono']?></td>
	</tr>

	<tr>
		<td>Fibra</td>
		<td><?php echo $params['fibra']?></td>
	</tr>

	<tr>
		<td>Grasa total</td>
		<td><?php echo $params['grasatotal']?></td>
	</tr>
</table>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>