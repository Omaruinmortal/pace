<?php
if($opc<9){
  switch ($opc):
     	case 1:
  ?>
      <div id="nombre_estudiante">
        <?php echo $nombre_estudiante; ?>       
       </div>

       <div id="fecha_prueba">
        <?php echo $fecha_prueba;?>       
       </div>
            
       <div id="instructor_iniciales">
        <?php echo $instructor_iniciales;?>
      </div>

       <div id="instructor_num">
        <?php echo $instructor_num;?>
      </div>

       <div id="fecha_actual">
        <?php echo $fecha_actual;?>
      </div>

  <?php
     	break;
      case 2:
  ?>
      <div id="nombre_estudiante1">
        <?php echo $nombre_estudiante; ?>       
       </div>

       <div id="fecha_prueba1">
        <?php echo $fecha_prueba;?>       
       </div>
            
       <div id="instructor_iniciales1">
        <?php echo $instructor_iniciales;?>
      </div>

       <div id="instructor_num1">
        <?php echo $instructor_num;?>
      </div>

       <div id="fecha_actual1">
        <?php echo $fecha_actual;?>
      </div>

  <?php
      break;
      case 8:
  ?>
      <div id="nombre_estudiante1">
        <?php echo $nombre_estudiante; ?>       
       </div>

       <div id="fecha_prueba1">
        <?php echo $fecha_prueba;?>       
       </div>
            
       <div id="instructor_iniciales1">
        <?php echo $instructor_iniciales;?>
      </div>

       <div id="instructor_num1">
        <?php echo $instructor_num;?>
      </div>

       <div id="fecha_actual1">
        <?php echo $fecha_actual;?>
      </div>

  <?php
      break;
      default:
  ?>
      <div id="nombre_estudiante2">
        <?php echo $nombre_estudiante; ?>       
       </div>

       <div id="fecha_prueba2">
        <?php echo $fecha_prueba;?>       
       </div>
            
       <div id="instructor_iniciales2">
        <?php echo $instructor_iniciales;?>
      </div>

       <div id="instructor_num2">
        <?php echo $instructor_num;?>
      </div>

       <div id="fecha_actual2">
        <?php echo $fecha_actual;?>
      </div>

  <?php
      break;   	
  endswitch;
}
?>
<barcode code="<?php echo $qr_nac;?>" type="QR" class="barcode" size="0.5" error="M" disableborder="1" />

