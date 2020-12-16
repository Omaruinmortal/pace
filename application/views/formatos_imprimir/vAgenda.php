<?php
switch ($veces+1):
    case 1:
?>
<div class="principal_div">
  <h2 class="titulo_agenda">Agenda del curso de <?=$nombre_agenda;?></h2><hr>
  <table style="width: 100%">
    <tr>
      <td class="trans_border"><strong>Fecha del curso: </strong></td>
      <td class="trans_border"><?=$fecha_solicitud_curso;?></td>
      <td class="trans_border"><strong>Sede del curso: </strong></td>
      <td class="trans_border"><?=$sede;?></td>
    </tr>
    <tr>
      <td class="trans_border"><strong>Lugar del curso: </strong></td>
      <td class="trans_border"><?=$municipio.", ".$estado;?></td>
      <td class="trans_border"><strong>Número de participantes: </strong></td>
      <td class="trans_border"><?=$numero_participantes;?></td>
    </tr>
  </table>
  <table border="1" class="principal_div-table">
    <tr class="primer_tr">
      <td colspan="4"><center class="titulo_tabla">Primer día</center></td>
    </tr>
    <tr class="primer_tr">
      <td class="titulo_tabla">Horario</td>
      <td class="titulo_tabla">Tema</td>
      <td class="titulo_tabla">Instructor</td>
      <td class="titulo_tabla">Material y observaciones</td>
    </tr>
  <?php
  foreach ($agenda as $datos):
    $dia= $datos->tema_dia;

    if ($dia == 1) :
      $desc_title  = $datos->desc_title;
      $desc_tema   = $datos->desc_tema;
      $hora_ini    = $datos->hora_ini;
      $hora_fin    = $datos->hora_fin;
      $mat_obs     = $datos->mat_obs;  
      $responsable = $datos->responsable;
      $array_subtemas=json_decode($datos->subtemas, true);
      $subtemas_find = $array_subtemas['subtemas']['name_subtema'];?>
      
        <tr>
          <td><?=$hora_ini." -<br> ".$hora_fin; ?></td>
          <td>
            <?php echo "<strong>".$desc_title."</strong>: ".$desc_tema;
            if ($subtemas_find!=""):
              $array_subtemas = explode(',', $subtemas_find);
              foreach ($array_subtemas as $key => $index):?>
                <?="<br><span>- ".$index."</span>";?>
              <?php endforeach; endif; ?>            
          </td>
          <td><?=$responsable;?></td>
          <td><?=$mat_obs;?></td>
        </tr> 

    <?php endif;
  endforeach;?>     
  </table>
  <span>(continuación)</span>
  
</div>
<?php
    break;
    case 2:
?>
<div class="principal_div">
  <span>(continuación)</span>
  <table border="1" class="principal_div-table">
    <tr class="primer_tr">
      <td colspan="4"><center class="titulo_tabla">Segundo día</center></td>
    </tr class="primer_tr">
    <tr>
      <td class="titulo_tabla">Horario</td>
      <td class="titulo_tabla">Tema</td>
      <td class="titulo_tabla">Instructor</td>
      <td class="titulo_tabla">Material y observaciones</td>
    </tr>
  <?php
  foreach ($agenda as $datos):
    $dia= $datos->tema_dia;

    if ($dia == 2) :
      $desc_title  = $datos->desc_title;
      $desc_tema   = $datos->desc_tema;
      $hora_ini    = $datos->hora_ini;
      $hora_fin    = $datos->hora_fin;
      $mat_obs     = $datos->mat_obs;  
      $responsable = $datos->responsable;
      $array_subtemas=json_decode($datos->subtemas, true);
      $subtemas_find = $array_subtemas['subtemas']['name_subtema'];?>
      
        <tr>
          <td><?=$hora_ini." -<br> ".$hora_fin; ?></td>
          <td>
            <?php echo "<strong>".$desc_title."</strong>: ".$desc_tema;
            if ($subtemas_find!=""):
              $array_subtemas = explode(',', $subtemas_find);
              foreach ($array_subtemas as $key => $index):?>
                <?="<br><span>- ".$index."</span>";?>
              <?php endforeach; endif; ?>            
          </td>
          <td><?=$responsable;?></td>
          <td><?=$mat_obs;?></td>
        </tr> 

    <?php endif;
  endforeach;?>     
  </table>
</div>
<?php
    break;    
endswitch;
?>
<div class="qr">
  <barcode code="<?php echo $qr_nac;?>" type="QR" class="barcode" size="0.7" error="M" disableborder="1" />

</div>


