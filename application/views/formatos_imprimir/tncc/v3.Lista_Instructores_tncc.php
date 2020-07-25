<?php 
switch ($option_indica) {
	case 1: $display=""; $left=320;break;
	case 2: $display=""; $left=507;break;	
	default:$display=""; $left=0;break;
}
?>
<div id="option_indica" style="display: <?php echo $display; ?>; left: <?php echo $left; ?>px">
	X	
</div>

<div id="num_curso">
	<?php echo $num_curso; ?>	
</div>
<div id="director_curso">
	<?php echo $director_curso; ?>	
</div>
<?php
    $inicial = $tam_reg_tabla*$veces;
    $final   = $tam_reg_tabla*($veces+1);
    $tam_array = count($instructor);
?>
<div id="instructor">
	<table border="0" id="table_intr">
		<?php for ($i=$inicial; $i < $final ; $i++):?>
			<?php if(($tam_array)>$i): ?>
			<tr>
				<td><?php echo $instructor[$i]['instructor']; ?></td>
				<td><?php echo $instructor[$i]['inst_candida']; ?></td>
				<td><?php echo $instructor[$i]['last_dig_social']; ?></td>
				<td><?php echo $instructor[$i]['intr_num']; ?></td>
				<td><?php echo $instructor[$i]['email']; ?></td>
			</tr>
			<?php  else: ?>
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