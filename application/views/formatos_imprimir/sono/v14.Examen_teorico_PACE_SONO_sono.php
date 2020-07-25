
<?php
switch ($opc):
   	case 1:
   	if ($veces==0) {$inicio=0; $fin=$inicio+3;}
   	else {$inicio=$veces*2; $fin=$inicio+3;}
?>

<?php
	$y=1;
	$i=1;

	foreach ($nombre_participante as $value):
		if ($y>$inicio && $y<$fin) :?>
			
			<div id="nombre_participante<?php echo $i; ?>">
				<?php echo $value; ?>
				
			</div>	
		
		<?php $i++; endif; ?>
	<?php $y++;
	endforeach;
?>	
<?php
   	break; 	
endswitch;
?>

