<div id="datos">
	<table border="1">
		<?php foreach ($datos as $data):?>
			<tr>
				<td><?php echo $data['nombre']; ?></td>
				<td><?php echo $data['curso_or_fecha_sede']; ?></td>
				<td><?php echo $data['curso_rem_fecha_sede']; ?></td>
				<td><?php echo $data['resultado']; ?></td>
				<td></td>
			</tr>
		<?php endforeach; ?>		
	</table>	
</div>
<div id="folio">
	<?php echo $folio; ?>	
</div>