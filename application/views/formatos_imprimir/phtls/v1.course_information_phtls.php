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

<div id="instructores">
	<table border="" id="table_instructores">
		<?php for ($i=0; $i < 13; $i++):?>
		<?php foreach ($instructores as $inst): ?>
			<tr id="tr_table">
				<td>
					<?php echo $inst['nombre']; ?>
				</td>
				<td>
					<?php echo $inst['correo']; ?>
				</td>
				<td>
					<?php echo $inst['direccion']; ?>
				</td>
				<td>
					<?php echo $inst['tel']; ?>
				</td>
				<td>
					S<span id="s"><?php echo $inst['reconocidos']; ?></span>
				</td>
				<td>
					N<span id="n"><?php echo $inst['reconocidon']; ?></span>
				</td>
				<td>
					<?php echo $inst['monitoreado']; ?>
				</td>


			</tr>
		<?php endforeach; ?>
	<?php endfor; ?>
	</table>
	<?php  






	?>
</div>