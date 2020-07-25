<?php
switch ($opc):
   	case 1:
    switch ($expe_moni) {
      case 1: $display=""; $left="330px"; break;
      case 2: $display=""; $left="380px"; break;
      case 3: $display=""; $left="425px"; break;      
      default: $display="none"; $left="0px"; break;
    }
?>

    <div id="no_curso">
      <?php echo $no_curso; ?>
    </div>
    <div id="name">
      <?php echo $name; ?>
    </div>
    <div id="dig">
      <?php echo $dig; ?>
    </div>
    <div id="name_evaluador">
      <?php echo $name_evaluador; ?>
    </div>
    <div id="date_ic">
      <?php echo $date_ic; ?>
    </div>
    <div id="date_course">
      <?php echo $date_course; ?>
    </div>
    <div id="date_ic_original">
      <?php echo $date_ic_original; ?>
    </div>
    <div id="expe_moni" style="display: <?php echo $display;?>; left: <?php echo $left; ?>">

    </div>
<?php
   	break;
    case 2:
?>
    <div id="name2">
      <?php echo $name; ?>
    </div>
    
    <div id="fecha_actual1">
      <?php echo $fecha_actual; ?>
    </div>
    <div id="fecha_actual2">
      <?php echo $fecha_actual; ?>
    </div>

<?php
    break;  	
endswitch;
?>
