<div id="num_curso">
	<?php echo $num_curso; ?>	
</div>
<div id="director_curso">
	<?php echo $director_curso; ?>	
</div>
<div id="instructor">
	<table border="0" id="table_intr">
		<?php for ($i=1; $i<14; $i++):?>			
		<?php foreach ($instructor as $dato): ?>
		
			<tr>
				<td><?php echo $dato['instructor']; ?></td>
				<td><?php echo $dato['inst_candida']; ?></td>
				<td><?php echo $dato['last_dig_social']; ?></td>
				<td><?php echo $dato['intr_num']; ?></td>
				<td><?php echo $dato['email']; ?></td>
			</tr>

	    <?php endforeach; ?>
	    <?php endfor; ?>
	</table>	
</div>