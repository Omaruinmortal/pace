<?php
switch ($opc):
   	case 1:
    switch ($application) {
      case 1: $display=""; $top="684px"; break;
      case 2: $display=""; $top="713px"; break;
      case 3: $display=""; $top="445px"; break;
      case 4: $display=""; $top="775px"; break;      
      default: $display="none"; $top="0px"; break;
    }
    

    function left($opc,$tipo){
    	if($tipo==1){
    		switch ($opc) {
                case 1: $display=""; $left="155px"; break;
                case 2: $display=""; $left="185px"; break;
                case 3: $display=""; $left="223px"; break;
                default: $display="none"; $left="0px"; break;
            }
    	}else{
    		switch ($opc) {
    		    case 1: $display=""; $left="159px"; break;
                case 2: $display=""; $left="195px"; break;
                default: $display="none"; $left="0px"; break;
            }
        }
    	
        return array('display' => $display, 'left' => $left);
    }

    $left_phone1=left($phone1_opc,1);
    $left_phone2=left($phone2_opc,1);
    $left_email1=left($email_opc1,2);
    $left_email2=left($email_opc2,2);
?>

    <div id="apli_dead">
    	<?php echo $apli_dead; ?>
    </div>
    <div id="send_to">
    	<?php echo $send_to; ?>
    </div>
    <div id="apli_name">
    	<?php echo $apli_name; ?>
    </div>
    <div id="address">
    	<?php echo $address; ?>
    </div>
    <div id="phone1_opc" style="left:<?php echo $left_phone1['left']; ?>; display: <?php echo $left_phone1['display']; ?>">
    </div>
    <div id="phone1_1">
    	<?php echo $phone1_1; ?>
    </div>
    <div id="phone1_2">
    	<?php echo $phone1_2; ?>
    </div>
    <div id="phone1_3">
    	<?php echo $phone1_3; ?>
    </div>
    <div id="phone2_opc" style="left:<?php echo $left_phone2['left']; ?>; display: <?php echo $left_phone2['display']; ?>">
    </div>
    <div id="phone2_1">
    	<?php echo $phone2_1; ?>
    </div>
    <div id="phone2_2">
    	<?php echo $phone2_2; ?>
    </div>
    <div id="phone2_3">
    	<?php echo $phone2_3; ?>
    </div>
    <div id="email_opc1" style="left:<?php echo $left_email1['left']; ?>; display: <?php echo $left_email1['display']; ?>">

    </div>
    <div id="email1">
    	<?php echo $email1; ?>
    </div>
    <div id="email_opc2" style="left:<?php echo $left_email2['left']; ?>; display: <?php echo $left_email2['display']; ?>">

    </div>
    <div id="email2">
    	<?php echo $email2; ?>
    </div>
    <div id="rn_licence">
    	<?Php echo $rn_licence; ?>
    </div>
    <div id="prov_course">
    	<?php echo $prov_course; ?>
    </div>
    <div id="course_director">
    	<?php echo $course_director; ?>
    </div>
    <div id="location">
    	<?php echo $location; ?>
    </div>

    <div id="application" style="top:<?Php echo $top; ?>; display: <?php echo $display; ?>">
    X
    </div>
    <div id="p1">
    	<?php echo $p1; ?>
    </div>
<?php
   	break;
    case 2:
?>
    <div id="p2">
      <?php echo $p2; ?>
    </div>
    <div id="p3">
      <?php echo $p3; ?>
    </div>
    <div id="p4">
      <?php echo $p4; ?>
    </div>
    <div id="p5">
      <?php echo $p5; ?>
    </div>
    <div id="p6">
      <?php echo $p6; ?>
    </div>

<?php
    break;  	
endswitch;
?>
