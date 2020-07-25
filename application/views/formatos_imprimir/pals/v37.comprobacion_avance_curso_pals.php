<?php
switch ($opc):
    case 1:
       if ($veces==0) { $inicial=0; $final=6; }
       else{$inicial=$veces*6+1; $final=($veces*6)+6;}
?>
    <div id="grupo_a">
      <?php 
        $i=1;
        foreach ($grupo_a as $value) :
          if($i>=$inicial && $i<=$final): ?>

            <div id="p_line"><?php echo $i.". ".$value; ?></div> 

        <?php 
          endif;
          $i++;
        endforeach;?>
    </div>

    <div id="grupo_b">
      <?php         
        $y=1;

        foreach ($grupo_b as $value) :
          if($y>=$inicial && $y<=$final): ?>

            <div id="p_line"><?php echo $y.". ".$value; ?></div>
        <?php 
          endif;
          $y++;
        endforeach;?>
    </div>
<?php
    break; 
endswitch;
?>
