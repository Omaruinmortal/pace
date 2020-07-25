
<div id="fecha_curso">
	<?php echo $fecha_curso; ?>
</div>
<div id="dir_curso">
	<?php echo $dir_curso; ?>
</div>
<div id="no_curso">
	<?php echo $no_curso; ?>
</div>


<?php
switch ($opc):
   	case 1:
   	$i=0;
?>

<div id="contenedor_tb1">
	<table id="tb1" border="1">
    	<?php foreach ($agenda as $value) : 
    		    if ($i<10) : ?>
    		    	<tr>
    		    		<td><?php echo $value['horario']; ?></td>
    		    		<td><?php echo $value['actividad']; ?></td>
    		    		<td><?php echo $value['min']; ?></td>
    		    		<td><?php echo $value['responsable']; ?></td>
    		    	</tr>
    		    <?php endif; $i++;
    		endforeach; ?>
    </table>	
</div>

<div id="contenedor_tb2">
	<table id="tb2" border="1">
    	<?php $i=0; foreach ($agenda as $value) : 
    		    if ($i>9 and $i<13) : ?>
    		    	<tr>
    		    	    <?php $y=1; foreach ($value as $dato) :
    		    	    	if ($y==1) : ?>
    		    	    		<td>
    		    	    			<?php echo $dato['horario']; ?>		    	    			
    		    	    		</td>		    	    		
    
    		    	        <?php endif; ?>		    	        	
    		    	        	<td>   		    	        		
    		    	    			Grupo <?php echo $y; ?><br>
    		    	    			<?php echo $dato['actividad']; ?><br>
    		    	    			<?php echo $dato['responsable']; ?><br>
    		    	    			Rm: <?php echo $dato['rm']; ?>    	        		
    		    	        	</td>                     
    		    	    <?php  
    		    	    $y++; endforeach; ?>
    		        </tr>
    		    <?php endif; $i++;
    		endforeach; ?>
    </table>	
</div>

<?php
   	break;
    case 2:
    $i=0;
?>
<div id="contenedor_tb3">
	<table id="tb3" border='0'>
    	<?php foreach ($agenda as $value) :

    		    if ($i>12):
    		    if ($i==29 || $i==30 || $i==32) { $style="style='color:#d9d9d9;'";}else{$style="";} 
    		    	?>    		    	
    		    	<tr>
    		    		<td <?php echo $style; ?>><?php echo $value['horario']; ?></td>
    		    		<td><?php echo $value['actividad']; ?></td>
    		    		<td><?php echo $value['min']; ?></td>
    		    		<td><?php echo $value['responsable']; ?></td>
    		    	</tr>
    		    <?php endif; $i++;
    		endforeach; ?>
    </table>	
</div>    
<?php
    break;     	
endswitch;
?>
