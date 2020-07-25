
<?php
switch ($opc):
    case 1:
    switch ($course_rev) {
      case 1: $left=193; $display=""; break;
      case 2: $left=313; $display=""; break;
      case 3: $left=391; $display=""; break;
      case 4: $left=469; $display=""; break;
      case 5: $left=583; $display=""; break;
      case 6: $left=657; $display=""; break;  
      default: $left=0;  $display="none"; break;
    }
    switch ($course_purpo) {
      case 1: $leftp=203; $displayp=""; break;
      case 2: $leftp=373; $displayp=""; break;
      case 3: $leftp=548; $displayp=""; break;  
      default: $leftp=0;  $displayp="none"; break;
    }
?>
    <div id="instructor">
      <?php echo $instructor; ?>
    </div>
    <div id="id_instructor">
      <?php echo $id_instructor; ?>
    </div>
    <div id="exp_card_date">
      <?php echo $exp_card_date; ?>
    </div>
    <div id="course_rev" style="left: <?php echo $left; ?>px; display: <?php echo $display; ?>">
      <?php echo "X"; ?>
    </div>
    <div id="course_purpo" style="left: <?php echo $leftp; ?>px; display: <?php echo $displayp; ?>">
      <?php echo "X"; ?>
    </div>

<?php
    break;   
    case 5:   
?>
    <div id="name_rf">
      <?php echo $name_rf; ?>
    </div>
    <div id="fecha_actual">
      <?php echo $fecha_actual; ?>
    </div>

<?php
    break;
    case 6:   
?>
    <div id="instructor2">
      <?php echo $instructor; ?>
    </div>
    <div id="fecha_actual2">
      <?php echo $fecha_actual; ?>
    </div>
    <div id="coordinator">
      <?php echo $coordinator; ?>
    </div>
    <div id="fecha_actual3">
      <?php echo $fecha_actual; ?>
    </div>

<?php
    break;   
endswitch;
?>
