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
    <barcode code="<?php echo $qr_nac;?>" type="QR" class="barcode" size="0.5" error="M" disableborder="1" />