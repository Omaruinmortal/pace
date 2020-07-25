<?php
    $tam_array1=count($tabla1);
    $tam_array2=count($tabla2);

    $inicial = $tam_reg_tabla*$veces;
    $final   = $tam_reg_tabla*($veces+1);

    switch ($option_indica) {
    	case 1: $display=""; $left=225;break;
    	case 2: $display=""; $left=415;break;	
    	default:$display="none"; $left=0;break;
    }
?>

<?php 
switch ($opc):
	case 1:
?>
    <div id="no_curso">
    	<?php echo $no_curso; ?>	
    </div>
    <div id="director_curso">
    	<?php echo $director_curso; ?>	
    </div>
    <div id="option_indica" style="display: <?php echo $display; ?>; left: <?php echo $left; ?>px">
    	X
    </div>

    <div id="participantes1">
    	<table border="0" id="table_participantes1">
    		<?php for ($i=$inicial; $i < $final ; $i++):?>
    			<?php if(($tam_array1)>$i): ?>	
    		
    			<tr>
    				<td><?php echo "<span id='number'>".($i+1).". </span>".$tabla1[$i]['nombre']; ?></td>
    				<td><?php echo $tabla1[$i]['multiple_resultado']; ?></td>
    				<td><?php echo $tabla1[$i]['multiple_remediacion']; ?></td>
    				<td><?php echo $tabla1[$i]['trauma_resultado']; ?></td>
    				<td><?php echo $tabla1[$i]['trauma_remediacion']; ?></td>
    				<td><?php echo $tabla1[$i]['participa_via_aerea']; ?></td>
    				<td><?php echo $tabla1[$i]['participa_intervencion']; ?></td>
    				<td><?php echo $tabla1[$i]['calificacion_final']; ?></td>
    				<td><?php echo $tabla1[$i]['horas_curso']; ?></td>
    				<td><?php echo $tabla1[$i]['potencial']; ?></td>
    			</tr>
    
    	    <?php else: ?>
    			    <tr>
    			    	<td><?php echo "<span id='number'>".($i+1).".</span>"; ?></td>
    			    	<td></td>
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
<?php
	break;
	case 2:
?>
    <div id="no_curso2">
    	<?php echo $no_curso; ?>	
    </div>
    <div id="director_curso2">
    	<?php echo $director_curso; ?>	
    </div>


    <div id="participantes2">
    	<table border="0" id="table_participantes2">
    		<?php for ($i=$inicial; $i < $final ; $i++):?>
    			<?php if(($tam_array2)>$i): ?>	
    		
    			<tr>
    				<td><?php echo "<span id='number'>".($i+1).". </span>".$tabla2[$i]['nombre']; ?></td>
    				<td><?php echo $tabla2[$i]['credenciales']; ?></td>
    				<td><?php echo $tabla2[$i]['multiple_resultado']; ?></td>
    				<td><?php echo $tabla2[$i]['multiple_remediacion']; ?></td>
    				<td><?php echo $tabla2[$i]['trauma_resultado']; ?></td>
    				<td><?php echo $tabla2[$i]['trauma_remediacion']; ?></td>
    				<td><?php echo $tabla2[$i]['participa_via_aerea']; ?></td>
    				<td><?php echo $tabla2[$i]['participa_intervencion']; ?></td>
    				<td><?php echo $tabla2[$i]['calificacion_final']; ?></td>
    				<td><?php echo $tabla2[$i]['horas_curso']; ?></td>
    			</tr>
    
    	    <?php else: ?>
    			    <tr>
    			    	<td><?php echo "<span id='number'>".($i+1).".</span>"; ?></td>
    			    	<td></td>
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
<?php
	break;
endswitch;
?>