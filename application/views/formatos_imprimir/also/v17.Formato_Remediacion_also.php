<div id="datos">
	<table border="">
		<?php foreach ($datos as $data):?>
			<tr>
				<td><?php echo $data['nombre']; ?></td>
				<td><?php echo $data['curso_or_fecha_sede']; ?></td>
				<td><?php echo $data['curso_rem_fecha_sede']; ?></td>
				<td><?php echo $data['resultado']; ?></td>
			</tr>
		<?php endforeach; ?>		
	</table>	
</div>
<div id="folio">
	<?php echo $folio; ?>	
</div>