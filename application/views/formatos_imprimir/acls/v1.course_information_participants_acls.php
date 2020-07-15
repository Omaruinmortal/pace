<div style="position: absolute; background: white; width: 100%">
   <?php

   switch ($opc):
   	case 1:
   	?>
   	<?php echo $pages[0]['lead_instructor'] ?>;
   	<?php echo $pages[0]['id_lead_instructor'] ?>;   	

   	<?php
   	break;
   	case 2:
   	?>
   	<?php echo $pages[1]['fecha_actual'] ?>;

   	<?php
   	break;
   endswitch;
   ?>
</div>

<?php
    $id_lead_instructor;
    $exp_card_date;
    $tra_center;
    $name_tra_center;
    $adress;
    $city_sz;
    $location_course;
?>