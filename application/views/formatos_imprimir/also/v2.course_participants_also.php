
<?php
    $inicial = $tam_reg_tabla*$veces;
    $final   = $tam_reg_tabla*($veces+1);
    $tam_array = count($participantes);
?>

<div id="participantes">
	<table border="0" id="table_participantes">
		<?php for ($i=$inicial; $i < $final ; $i++):?>
			<?php if(($tam_array)>$i): ?>	
		
			<tr>
				<td><span id="number"><?php echo $i+1; ?></span></td>
				<td><?php echo $participantes[$i]['nombre']; ?></td>
				<td><?php echo $participantes[$i]['correo']; ?></td>
				<td></td>				
				<td><?php echo $participantes[$i]['escrito']; ?></td>
				<td><?php echo $participantes[$i]['practico']; ?></td>
				<td><?php echo $participantes[$i]['aprueba']; ?></td>
				<td><?php echo $participantes[$i]['pi']; ?></td>				
			</tr>

	    <?php else: ?>
			    <tr>
			    	<td><span id="number"><?php echo $i+1; ?></span></td>
			    	<td></td>
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
<div id="folio">
	<?php echo $folio; ?>	
</div>
<barcode code="<?php echo $qr_nac;?>" type="QR" class="barcode" size="0.5" error="M" disableborder="1" />