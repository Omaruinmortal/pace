<?php 
switch ($option_indica) {
	case 1: $display=""; $left=280;break;
	case 2: $display=""; $left=470;break;
	case 3: $display=""; $left=10;break;	
	default:$display=""; $left=0;break;
}
?>
<div id="option_indica" style="display: <?php echo $display; ?>; left: <?php echo $left; ?>px">
	X	
</div>

<div id="no_curso">
	<?php echo $no_curso; ?>
</div>
<div id="fecha">
	<?php echo $fecha; ?>
</div>
<?php
    $inicial = $tam_reg_tabla*$veces;
    $final   = $tam_reg_tabla*($veces+1);
    $tam_array = count($participantes);
?>
<div id="datos">
	<table border="1">
		<?php for ($i=$inicial; $i < $final ; $i++):?>
			<?php if(($tam_array)>$i): ?>
		    	<tr>
		    		<td><?php echo $i+1; ?></td>
		    		<td><?php echo $participantes[$i]['participante']; ?></td>
		    		<td><?php echo $participantes[$i]['email']; ?></td>				
		    	</tr>
		    	<?php else: ?>
		    		<tr>
		    		    <td></td>
		    		    <td></td>
		    		    <td></td>
		    		</tr>
		    <?php endif; ?>
		<?php endfor; ?>		
	</table>	
</div>
