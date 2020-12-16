<?php
switch ($opc):
   	case 1:
?>
<div class="principal_div">

  <table border="1" class="principal_div-table">
    <tr>
      <td colspan="4"><center class="titulo_tabla">Primer día</center></td>
    </tr>
    <tr>
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
                <li>
                  <ol>
                    <?=$index;?>                      
                  </ol>
                </li>
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

  <table border="1" class="principal_div-table">
    <tr>
      <td colspan="4"><center class="titulo_tabla">Segundo día</center></td>
    </tr>
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
                <li>
                  <ol>
                    <?=$index;?>                      
                  </ol>
                </li>
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

