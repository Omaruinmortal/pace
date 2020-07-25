<?php
switch ($opc):
   	case 1:
?>
    <div id="estudiante">
      <?php echo "Estudiante: ".$estudiante; ?>
    </div>

<?php
   	break;
   	case 13:
?>
    <div id="estudiante1">
      <?php echo $estudiante; ?>
    </div>
    <div id="evaluador">
      <?php echo $evaluador; ?>
    </div>

<?php
   	break;   	
endswitch;
?>