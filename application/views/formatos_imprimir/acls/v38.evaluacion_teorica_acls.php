

<?php
switch ($opc):
   	case 1:
?>
    <div id="fecha">
    	<?php echo $fecha; ?>
    </div>
    <div id="nombre">
    	<?php echo $nombre; ?>
    </div>
    <div id="version">
    	<?php echo $version; ?>
    </div>

<?php
   	break;   	
endswitch;
?>
<barcode code="<?php echo $qr_nac;?>" type="QR" class="barcode" size="0.5" error="M" disableborder="1" />
