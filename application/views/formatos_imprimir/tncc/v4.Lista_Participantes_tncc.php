<div id="no_curso">
	<?php echo $no_curso; ?>
</div>
<div id="fecha">
	<?php echo $fecha; ?>
</div>
<div id="datos">
	<table border="1">
		<?php for ($i=1; $i <19 ; $i++):?>
		    <?php foreach ($participantes as $data):?>
		    	<tr>
		    		<td><?php echo $i; ?></td>
		    		<td><?php echo $data['participante']; ?></td>
		    		<td><?php echo $data['email']; ?></td>				
		    	</tr>
		    <?php endforeach; ?>
		<?php endfor; ?>		
	</table>	
</div>
