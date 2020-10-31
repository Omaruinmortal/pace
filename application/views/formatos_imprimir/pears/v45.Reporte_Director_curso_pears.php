<?php
switch ($opc):
   	case 1:
?>
    <div id="fecha_curso">
      <?php echo $fecha_curso; ?>
    </div>

    <div id="sede_curso">
      <?php echo $sede_curso; ?>
    </div>

    <div id="lugar_curso">
      <?php echo $lugar_curso; ?>
    </div>

<div id="tabla1">
    <div id="instructores">
      <table id="table_instructores">
        <thead>
          <tr>
            <td>No.</td>
            <td>Nombre del Instructor</td>
            <td>Residencia</td>
            <td>Especialidad</td>
            <td>Cargo</td>
          </tr>
        </thead>
      <?php
          $i=0;
          foreach ($instructores as $dato) {
            if ($i<8) {            
              echo "<tr><td>".($i+1)."</td><td>".$dato['name']."</td><td> ".$dato['residencia']."</td><td>".$dato['especidalidad']."</td><td> ".$dato['cargo']."</td></tr>";
            }
            $i++;
          }
        ?>
        </table>
    </div>

    <div id="proveedores">
      <span>Proveedores</span>
      <table id="table_proveedores" border="1">      
        <tr>
          <td>Total de proveedores a capacitar</td>
          <td><?php echo $Proveedores_capacitar; ?></td>         
        </tr>
        <tr>
          <td>Total de proveedores capacitados</td>
          <td><?php echo $Proveedores_capacitados; ?></td>         
        </tr> 
        </table>
    </div>

    <div id="perfil_pro">
      <span>Proveedores</span>
      <table id="table_perfil_pro" border="1">      
        <tr>
          <td>Gineco- Obstetras</td>
          <td><?php echo $capa_gineco; ?></td>         
        </tr>
        <tr>
          <td>Médicos generales</td>
          <td><?php echo $capa_generales; ?></td>         
        </tr>
        <tr>
          <td>Urgenciologos</td>
          <td><?php echo $capa_urgen; ?></td>         
        </tr>
        <tr>
          <td>Enfermeras</td>
          <td><?php echo $capa_enferm; ?></td>         
        </tr>
        <tr>
          <td>Internista</td>
          <td><?php echo $capa_intern; ?></td>         
        </tr>
        <tr>
          <td>intensivista</td>
          <td><?php echo $capa_inten; ?></td>         
        </tr>
        <tr>
          <td>Anestesiólogo</td>
          <td><?php echo $capa_anes; ?></td>         
        </tr>
        <tr>
          <td>TUM</td>
          <td><?php echo $capa_tum; ?></td>         
        </tr>
        <tr>
          <td>TEM</td>
          <td><?php echo $capa_tem; ?></td>         
        </tr>
        </table>
    </div>

    <div id="eva_prov">
      <span>Evaluación de los proveedores</span>
      <table id="table_eva" border="1">      
        <tr>
          <td>Concepto </td>
          <td>Examen teórico</td>
          <td>%</td>
          <td>Examen practico</td>
          <td>%</td>         
        </tr>
        <tr>
          <td>Proveedores aprobados</td>
          <td><?php echo $provee_apro_tteorico; ?></td>
          <td><?php echo $provee_aprob_pteorico; ?></td>
          <td><?php echo $provee_apro_tpractico; ?></td>
          <td><?php echo $provee_aprob_ppractico; ?></td>        
        </tr>
        <tr>
          <td>Proveedores reprobados </td>
          <td><?php echo $provee_repro_tteorico; ?></td>
          <td><?php echo $provee_reprob_pteorico; ?></td> 
          <td><?php echo $provee_repro_tpractico; ?></td>
          <td><?php echo $provee_reprob_ppractico; ?></td>       
        </tr> 
        </table>
    </div>


    <div id="candidatos">
      <span>Candidatos a instructor</span>
      <table id="table_candidatos" border="1">
        <thead>
          <tr>
            <td>Nombre del Candidato a Instructor </td>
            <td>Puntaje en el examen teórico</td>
            <td>Puntaje en el examen práctico</td>           
          </tr>
        </thead>
      <?php
          $i=1;
          $inicia=1;
          $termina=3;

          foreach ($candidatos_inst as $dato) {
            if ($i>=$inicia and $i<=$termina) {            
              echo "<tr><td>".$dato['name']."</td><td> ".$dato['puntajet']."</td><td>".$dato['puntajep']."</td></tr>";
            }
            $i++;
          }
        ?>
        </table>
    </div>

</div>
<?php
   	break;
    case 2:
    $tam=count($candidatos_inst);    
    if ($tam>3):       
?>   
    <div id="candidatos2">     
      <table id="table_candidatos" border="1">      
      <?php
          $i=1;
          $inicia=4;
          $termina=5;

          foreach ($candidatos_inst as $dato) {
            if ($i>=$inicia and $i<=$termina) {            
              echo "<tr><td>".$dato['name']."</td><td> ".$dato['puntajet']."</td><td>".$dato['puntajep']."</td></tr>";
            }
            $i++;
          }
        ?>
        </table>
    </div>

<?php endif; ?>

<div id="aulas_a">
  <?php echo $controller->opcion($aulas,1) ?>
</div>
<div id="aulas_i">
  <?php echo $controller->opcion($aulas,0)." ".$aulas_obs ?>
</div>

<div id="proy_a">
  <?php echo $controller->opcion($proy,1) ?>
</div>
<div id="proy_i">
  <?php echo $controller->opcion($proy,0)." ".$proy_obs ?>
</div>

<div id="seña_a">
  <?php echo $controller->opcion($seña,1) ?>
</div>
<div id="seña_i">
  <?php echo $controller->opcion($seña,0)." ".$seña_obs ?>
</div>

<div id="venti_a">
  <?php echo $controller->opcion($venti,1) ?>
</div>
<div id="venti_i">
  <?php echo $controller->opcion($venti,0)." ".$venti_obs ?>
</div>

<div id="compu_c_a">
  <?php echo $controller->opcion($compu_c,1) ?>
</div>
<div id="compu_c_i">
  <?php echo $controller->opcion($compu_c,0) ?>
</div>

<div id="compu_f_a">
  <?php echo $controller->opcion($compu_f,1) ?>
</div>
<div id="compu_f_i">
  <?php echo $controller->opcion($compu_f,0) ?>
</div>

<div id="pape_a">
  <?php echo $controller->opcion($pape,1) ?>
</div>
<div id="pape_i">
  <?php echo $controller->opcion($pape,0) ?>
</div>

<div id="manual_ent_a">
  <?php echo $controller->opcion($manual_ent,1) ?>
</div>
<div id="manual_ent_i">
  <?php echo $controller->opcion($manual_ent,0) ?>
</div>

<div id="nemo_a">
  <?php echo $controller->opcion($nemo,1) ?>
</div>
<div id="nemo_i">
  <?php echo $controller->opcion($nemo,0) ?>
</div>

<div id="nemo_falt">
  <?php echo $nemo_falt; ?>
</div>

<div id="ponencias">     
      <table id="table_ponencias" border="0">      
      <?php
          $i=1;         
          foreach ($ponencias as $dato) {
            echo "<tr>
                      <td>".$i.". ".$dato['nombre']."</td>
                      <td> ".$controller->opcion($dato['apegado'],1)."</td>
                      <td> ".$controller->opcion($dato['apegado'],0)."</td>
                      <td> ".$controller->opcion($dato['calidad'],2)."</td>
                      <td> ".$controller->opcion($dato['calidad'],1)."</td>
                      <td> ".$controller->opcion($dato['calidad'],0)."</td>
                  </tr>";
            $i++;           
          }
        ?>
        </table>
    </div>
    <div id="obs_ponen">
      <?php echo $obs_ponen; ?>      
    </div>
<?php
    break;
    case 3:       
?>   
    <div id="mat_taller">     
      <table id="table_mat_taller" border="0">      
      <?php 
          $i=1;
          foreach ($mat_taller as $dato) {                       
              echo "<tr>
                      <td>".$i.". ".$dato['nombre']."</td>
                      <td> ".$controller->opcion($dato['completo'],1)."</td>
                      <td> ".$controller->opcion($dato['completo'],0)."</td>
                      <td> ".$dato['faltante']."</td>
                  </tr>";            
            $i++;
          }
        ?>
        </table>
    </div>
    <div id="coffee_e">
      <?php echo $controller->opcion($coffee,2) ?>
    </div>
    <div id="coffee_r">
      <?php echo $controller->opcion($coffee,1) ?>
    </div>
    <div id="coffee_d">
      <?php echo $controller->opcion($coffee,0) ?>
    </div>

    <div id="comida_e">
      <?php echo $controller->opcion($comida,2) ?>
    </div>
    <div id="comida_r">
      <?php echo $controller->opcion($comida,1) ?>
    </div>
    <div id="comida_d">
      <?php echo $controller->opcion($comida,0) ?>
    </div>

    <div id="hotel_e">
      <?php echo $controller->opcion($hotel,2) ?>
    </div>
    <div id="hotel_r">
      <?php echo $controller->opcion($hotel,1) ?>
    </div>
    <div id="hotel_d">
      <?php echo $controller->opcion($hotel,0) ?>
    </div>

    <div id="viaticos">     
      <table id="table_viaticos" border="0">      
      <?php 
          $i=1;
          foreach ($viaticos as $dato) {                       
              echo "<tr>
                      <td>".$i.". ".$dato['nombre']."</td>
                      <td> ".$controller->opcion($dato['viaticos'],1)."</td>
                      <td> ".$controller->opcion($dato['viaticos'],0)."</td>
                      <td> ".$controller->opcion($dato['viaticos'],2)."</td>
                  </tr>";            
            $i++;
          }
        ?>
        </table>
    </div>

<div id="lugar_inst">
  <?php echo $lugar_inst; ?>
</div>

<div id="fecha_inst">
  <?php echo $fecha_inst; ?>
</div>

<div id="hora_inst">
  <?php echo $hora_inst; ?>
</div>
<div id="concepto">     
      <table id="table_concepto" border="0">      
      <?php 
          $i=1;
          foreach ($concepto as $dato) {
              switch ($i) { 
                case 1: $htd=21; break; 
                case 2: $htd=20; break; 
                case 3: $htd=20; break;
                case 4: $htd=40; break;
                case 5: $htd=40; break;
                case 6: $htd=39; break;
                case 7: $htd=21; break;
                case 8: $htd=20; break;
                default: $htd=""; break;}

              echo "<tr>                     
                      <td style='height: ".$htd."px'> ".$controller->opcion($dato,1)."</td>
                      <td> ".$controller->opcion($dato,0)."</td>
                  </tr>";            
            $i++;
          }
        ?>
        </table>
    </div>


<?php
    break;
    case 4:       
?>   
  
    <div id="comentarios">
      <?php echo $comentarios; ?>
    </div>
    

<?php
    break;
    case 5:       
?>   
  
    <div id="des_curso">
      <?php echo $des_curso; ?>
    </div>
    <div id="dir_curso">
      <?php echo $dir_curso; ?>
    </div>
    <div id="dir_esp">
      <?php echo $dir_esp; ?>
    </div>
    <div id="fecha_actual">
      <?php echo $fecha_actual; ?>
    </div>
    
<?php
    break; 	
endswitch;
?>
