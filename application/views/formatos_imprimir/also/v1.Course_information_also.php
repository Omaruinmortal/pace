<div id="instructores_1">
	<table id="table_instructores">
	<?php
	    $i=0;
        foreach ($instructores as $dato) {
        	if ($i<6) {
        		echo "<tr><td>".$dato['name']." ".$dato['vencimiento']."</td></tr>";
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
        	if ($i>6 and $i<11) {
        		echo "<tr><td>".$dato['name']." ".$dato['vencimiento']."</td></tr>";
        	}
        	$i++;           
        }
    ?>
    </table>
</div>
<div id="coordinator">
    <?php echo $coordinator; ?>	
</div>
<div id="dir_medico">
    <?php echo $dir_medico; ?>	
</div>
<div id="center_enter">
    <?php echo $center_enter; ?>	
</div>
<div id="site_cap">
    <?php echo $site_cap; ?>	
</div>
<div id="nombre_sede">
    <?php echo $nombre_sede; ?>	
</div>
<div id="date_ini_curse">
    <?php echo $date_ini_curse; ?>	
</div>
<div id="time_ini_curse">
    <?php echo $time_ini_curse; ?>	
</div>
<div id="students">
    <?php echo $students; ?>	
</div>
<div id="date_fin_curse">
    <?php echo $date_fin_curse; ?>	
</div>
<div id="time_fin_curse">
    <?php echo $time_fin_curse; ?>	
</div>
<div id="time_inst">
    <?php echo $time_inst; ?>	
</div>
<div id="cards">
    <?php echo $cards; ?>	
</div>
<div id="date">
    <?php echo $date; ?>	
</div>
<div id="folio">
    <?php echo $folio; ?>	
</div>
<barcode code="<?php echo $qr_nac;?>" type="QR" class="barcode" size="0.5" error="M" disableborder="1" />















