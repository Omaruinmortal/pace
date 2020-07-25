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

<div id="curso1">
	<?php echo $curso1; ?>
</div>
<div id="curso2">
	<?php echo $curso2; ?>
</div>
<div id="curso3">
	<?php echo $curso3; ?>
</div>
<div id="curso4">
	<?php echo $curso4; ?>
</div>
<div id="curso5">
	<?php echo $curso5; ?>
</div>

<?php
    $inicial = $tam_reg_tabla*$veces;
    $final   = $tam_reg_tabla*($veces+1);
    $tam_array = count($instructores);
?>

<div id="instructores">
	<table border="0" id="table_instructores">
		<?php for ($i=$inicial; $i < $final; $i++):?>
			<?php if(($tam_array)>$i): ?>
			<tr id="tr_table">
				<td>
					<?php echo $instructores[$i]['nombre']; ?>
				</td>
				<td>
					<?php echo $instructores[$i]['correo']; ?>
				</td>
				<td>
					<?php echo $instructores[$i]['direccion']; ?>
				</td>
				<td>
					<?php echo $instructores[$i]['tel']; ?>
				</td>
				<td>
					<?php echo $instructores[$i]['reconocidos']; ?>
				</td>
				<td>
					<?php echo $instructores[$i]['reconocidon']; ?>
				</td>
				<td>
					<?php echo $instructores[$i]['monitoreado']; ?>
				</td>
			</tr>
		<?php endif; ?>
	<?php endfor; ?>
	</table>
</div>