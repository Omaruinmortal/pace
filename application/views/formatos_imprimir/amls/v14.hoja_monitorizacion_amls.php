<?php
switch ($opc):
    case 1:
    switch ($program_moni) {
        	case 1: $left=230; $display=""; break;
        	case 2: $left=291; $display=""; break;
        	case 3: $left=351; $display=""; break;//351
        	case 4: $left=410; $display=""; break;
        	case 5: $left=470; $display=""; break;
        	case 6: $left=530; $display=""; break;
        	case 7: $left=590; $display=""; break;
        	case 8: $left=650; $display=""; break;        	
        	default:$left=0; $display="none";break;
        }    
?>

<div id="name_candidate">
	<?php echo $name_candidate; ?>
</div>

<div id="address">
	<?php echo $address; ?>
</div>

<div id="city">
	<?php echo $city; ?>
</div>

<div id="state">
	<?php echo $state; ?>
</div>

<div id="cp">
	<?php echo $cp; ?>
</div>

<div id="tel">
	<?php echo $tel; ?>
</div>

<div id="email">
	<?php echo $email; ?>
</div>

<div id="facultad">
	<?php echo $facultad; ?>
</div>

<div id="date_moni">
	<?php echo $date_moni; ?>
</div>

<div id="program_moni" style="left: <?php echo $left; ?>px; display: <?php echo $display; ?>">
	x
</div>

<div id="no_provider">
	<?php echo $no_provider; ?>
</div>

<div id="date_provider">
	<?php echo $date_provider; ?>
</div>

<div id="no_monito">
	<?php echo $no_monito; ?>
</div>

<div id="date_monito">
	<?php echo $date_monito; ?>
</div>

<div id="comments_lecture">
	<?php echo $comments_lecture; ?>
</div>

<div id="appro">
	<?php echo $appro; ?>
</div>

<div id="remoni">
	<?php echo $remoni; ?>
</div>

<div id="date1">
	<?php echo $date; ?>
</div>
<div id="date2">
	<?php echo $date; ?>
</div>

<?php
    break; 
endswitch;
?>
