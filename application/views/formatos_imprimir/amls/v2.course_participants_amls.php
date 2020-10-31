<?php
    switch ($tipo_curso) {
        	case 1: $left=278; $display=""; break;
        	case 2: $left=480; $display=""; break;
        	case 3: $left=620; $display=""; break;
        	case 4: $left=738; $display=""; break;
        	case 5: $left=965; $display=""; break;        	
        	default:$left=0; $display="none";break;
    }    
?>


<div id="curso_nacional">
	<?php echo $curso_nacional; ?>
</div>

<div id="fecha_curso">
	<?php echo $fecha_curso; ?>
</div>

<div id="coordinador_curso">
	<?php echo $coordinador_curso; ?>
</div>

<div id="Localidad">
	<?php echo $Localidad; ?>
</div>

<div id="facultad_afiliada">
	<?php echo $facultad_afiliada; ?>
</div>

<div id="tipo_curso" style="display:<?php echo $display; ?> ;left: <?php echo $left; ?>px ">
	x
</div>


<?php
    $inicial = $tam_reg_tabla*$veces;
    $final   = $tam_reg_tabla*($veces+1);
    $tam_array = count($participantes);
?>

<div id="participantes">
	<table border="0" id="table_participantes">
		<?php for ($i=$inicial; $i < $final; $i++):?>
			<?php if(($tam_array)>$i): ?>
			<tr id="tr_table">
				<td><span id="number"><?php echo $i+1; ?></span></td>
				<td>
					<?php echo $participantes[$i]['nombre']; ?>
				</td>
				<td>
					<?php echo $participantes[$i]['direccion']; ?>
				</td>
				<td>
					<?php echo $participantes[$i]['tel']; ?>
				</td>
				<td>
					<?php echo $participantes[$i]['miembro']; ?>
				</td>
				<td>
					<?php echo $participantes[$i]['nivel']; ?>
				</td>
				<td>
					<?php echo $participantes[$i]['escrito']; ?>
				</td>
				<td>
					<?php echo $participantes[$i]['estacion_final']; ?>
				</td>
				<td>
					<?php echo $participantes[$i]['aprueba']; ?>
				</td>
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
			    	<td></td>
			    	<td></td>
			    </tr>
		    <?php endif; ?>
		<?php endfor; ?>
	</table>
</div>