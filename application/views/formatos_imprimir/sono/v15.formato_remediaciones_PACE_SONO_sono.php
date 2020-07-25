
<?php
    $inicial = $tam_reg_tabla*$veces;
    $final   = $tam_reg_tabla*($veces+1);
    $tam_array = count($datos);
?>
<div id="datos">
	<table border="1">
		<?php for ($i=$inicial; $i < $final ; $i++):?>
			<?php if(($tam_array)>$i): ?>
			    <tr>
			    	<td><?php echo $datos[$i]['nombre']; ?></td>
			    	<td><?php echo $datos[$i]['curso_or_fecha_sede']; ?></td>
			    	<td><?php echo $datos[$i]['curso_rem_fecha_sede']; ?></td>
			    	<td><?php echo $datos[$i]['resultado']; ?></td>
			    	<td></td>
			    </tr>
			    <?php else: ?>
			    	<tr>
			    		<td></td>
			    	    <td></td>
			    	    <td></td>
			    	    <td></td>
			    	    <td></td>			    		
			    	</tr>			    	
		    <?php endif; ?>
		<?php endfor; ?>		
	</table>	
</div>


