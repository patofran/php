<?php ob_start() ?>
<form name="formBusqueda" action="index.php?ctl=buscarAlimentosPorEnergia" method="post">
    <label for="minEnergia">Valor Mínimo de Energía:</label>
    <input type="number" name="minE" id="minE" value="<?php echo $params['minE'] ?>" required>

    <label for="maxEnergia">Valor Máximo de Energía:</label>
    <input type="number" name="maxE" id="maxE" value="<?php echo $params['maxE'] ?>" required>
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