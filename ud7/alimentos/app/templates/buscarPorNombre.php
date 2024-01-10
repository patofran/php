<?php ob_start() ?>
<form name="formBusqueda" action="index.php?ctl=buscar" method="post">
	<label for="nombre">nombre alimento:</label>
	<input type="text" name="nombre" id="nombre" value="<?php echo $params['nombre'] ?>">
	<span>(puedes utilizar '%' como comodin)</span>

	<input type="submit" value="buscar">
</form>

<?php if (count($params['resultado'])>0): ?>
	<table>
		<tr>
			<th>alimento (por 100g)</th>
			<th>energia (Kcal)</th>
			<th>grasa (g)</th>
		</tr>

		<?php foreach ($params['resultado'] as $alimento) : ?>
		<tr>
			<td><a href="index.php?ctl=ver&id=<?php echo $alimento['id'] ?>"><?php echo $alimento['nombre'] ?></a></td>
			<td><?php echo $alimento['energia'] ?></td>
			<td><?php echo $alimento['grasatotal'] ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>