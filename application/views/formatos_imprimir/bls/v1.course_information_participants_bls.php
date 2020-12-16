   <?php
   $type_course=$type_course;

   switch ($type_course) {
      case 1:
        $curso="ACLS Course";
        $top_curso=177;
      break;
      case 2:
        $curso="ACLS Update Course";
        $top_curso=209;      
      break;
      case 3:
        $curso="HeartCode® ACLS";
        $top_curso=240;      
      break;
      case 4:
        $curso="ACLS EP";
        $top_curso=273;      
      break;
      case 5:
        $curso="ACLS Instructor";
        $top_curso=305;      
      break;
      case 6:
        $curso="ACLS EP Instructor";
        $top_curso=338;      
      break;
   }
   switch ($opc):
   	case 1:
   	?>
    <div id="lead_instructor">
      <?php echo $lead_instructor; ?>
    </div>
    <div id="id_lead_instructor">
      <?php echo $id_lead_instructor; ?>
    </div>
    <div id="exp_card_date">
      <?php echo $exp_card_date; ?>
    </div>
    <div id="tra_center">
      <?php echo $tra_center; ?>
    </div>
    <div id="id_tra_center">
      <?php echo $id_tra_center; ?>
    </div>
    <div id="name_tra_center">
      <?php echo $name_tra_center; ?>
    </div>
    <div id="adress">
      <?php echo $adress; ?>
    </div>
    <div id="city_sz">
      <?php echo $city_sz; ?>
    </div>
    <div id="location_course">
      <?php echo $location_course; ?>
    </div>   	
    <div id="type_course" style="top: <?php echo $top_curso; ?>px">
        X      
    </div>
    <div id="course_start">
      <?php echo $course_start; ?>
    </div>
    <div id="course_end">
      <?php echo $course_end; ?>
    </div>
    <div id="time_inst">
      <?php echo $time_inst; ?>
    </div>
    <div id="cards_iss">
      <?php echo $cards_iss; ?>
    </div>
    <div id="ratio">
      <?php echo $ratio; ?>
    </div>
    <div id="iss_date_card">
      <?php echo $iss_date_card; ?>
    </div>
    <div id="instructores_1">
      <table id="table_instructores">
      <?php
          $i=0;
          foreach ($instructores as $dato) {

            if ($i<4) {
              echo "<tr><td>".$dato['name']."</td><td> ".$dato['vencimiento']."</td></tr>";
            }
            $i++;
          }
        ?>
        </table>
    </div>
    <div id="instructores_2">
        <table id="table_instructores">
      <?php
          $i=0;
            foreach ($instructores as $dato) {
              if ($i>3 and $i<8) {
                echo "<tr><td>".$dato['name']."</td><td>".$dato['vencimiento']."</td></tr>";
              }
              $i++;           
            }
        ?>
        </table>
    </div>
    
    <div id="fecha_actual">
      <?php echo $fecha_actual; ?>
    </div>

   	<?php
   	break;
   	case 2:

    $inicial = $tam_reg_tabla_2*$veces;
    $final   = $tam_reg_tabla_2+$inicial;
    $tam_array = count($participantes);
    if($inicial!=0){
      $inicial=$inicial;           
    }else{
      $final=$final+1;
      $final=$final-1;
    }
   	?>
   	<div id="fecha_actual_2">
      <?php echo $fecha_actual; ?>
    </div>
    <div id="curso">
      <?php echo $curso; ?>
    </div>
    <div id="lead_instructor_2">
      <?php echo $lead_instructor; ?>
    </div>
    <div id="id_lead_instructor_2">
      <?php echo $id_lead_instructor; ?>
    </div>
    <div id="participantes">
      <table id="table_participantes" border="0">
      <?php
          $i=0;
            foreach ($participantes as $dato) {             
              if ($i>=$inicial and $i<$final) {
                echo "<tr>";
                echo "<td><span>".($i+1).".</span>&nbsp;&nbsp;".$dato['name']."</td><td rowspan='2'>".$dato['cp_tel']."</td><td rowspan='2'>".$dato['completed']."</td><td rowspan='2'>".$dato['remed_date']."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>".$dato['email']."</td>";
                echo "</tr>";
              }
              $i++;           
            }
        ?>
        </table>  
    </div>

   	<?php
   	break;
   endswitch;
   ?>
   <barcode code="<?php echo $qr_nac;?>" type="QR" class="barcode" size="0.5" error="M" disableborder="1" />

