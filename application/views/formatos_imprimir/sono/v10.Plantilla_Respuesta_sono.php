<div id="lugar_sede">
	<?php echo $lugar_sede; ?>
</div>
<div id="fecha">
	<?php echo $fecha; ?>
</div>
<div id="doctores">
	<?php foreach ($doctores as $data): ?>
		<span><?php echo $data['doctor']; ?></span><br>
	<?php endforeach; ?>	
</div>