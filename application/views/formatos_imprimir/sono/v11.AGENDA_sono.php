<?php
switch ($opc):
   	case 1:
?>
    <div id="sede">
        <?php echo $sede; ?>
    </div>
    <div id="fechas">
        <?php echo $fechas; ?>
    </div>
    <div id="n_participantes">
        <?php echo $n_participantes; ?>
    </div>  

    <div id="agenda">
    	<?php
        $y=0;
        $dia=0;
        ?>
        <table id="table_agenda_1" border="1">
            <?php
            foreach ($agenda as $agenda) :
                $dia_nuevo = $agenda['dia'];                

                if ($y<=11):
                    if ($y==0):
                ?>

                        <tr id="title">
                            <td>
                                TPO. MIN.                            
                            </td>
                            <td>
                                HORARIO
                            </td>
                            <td>
                                ACTIVIDADES                            
                            </td>
                            <td>
                                RESPONSABLE
                            </td>
                            <td>
                                MATERIAL Y OBSERVACIONES
                            </td>
                        </tr>
                <?php
                    endif;
                    if ($dia_nuevo!=$dia):               
                        
            ?>
                    <tr id="dia">
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            <?php echo mb_strtoupper($controller->cardinales($dia_nuevo))." DIA";?>                           
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>                       

                    </tr>

            <?php
                        $dia=$dia_nuevo;
                    endif;
                    if($agenda['responsable']!=""){$title="actividad";}
                    else{$title="noactividad";}

                    ?>
                    <tr id="<?php echo $title; ?>">
                        <td>
                            <?php echo $agenda['min']; ?>
                        </td>
                        <td>
                            <?php echo $agenda['horario']; ?>
                        </td>
                        <td>
                            <?php echo $agenda['actividad']; ?>                            
                        </td>
                        <td>
                            <?php echo $agenda['responsable']; ?>
                        </td>
                        <td>
                            <?php echo $agenda['mat_obs']; ?>
                        </td>                       

                    </tr>

                    <?php 
                endif;
                $y++;
            endforeach;
            ?>
        </table>
    </div>


<?php
   	break;
    case 2:
?>
    
    <div id="agenda2">
        <?php
        $y=0;
        $dia=1;
        ?>
        <table id="table_agenda_1" border="1">
            <?php
            foreach ($agenda as $agenda) :
                $dia_nuevo = $agenda['dia'];

                if ($y>=12):

                    if ($y==0):
                ?>

                        <tr id="title">
                            <td>
                                TPO. MIN.                            
                            </td>
                            <td>
                                HORARIO
                            </td>
                            <td>
                                ACTIVIDADES                            
                            </td>
                            <td>
                                RESPONSABLE
                            </td>
                            <td>
                                MATERIAL Y OBSERVACIONES
                            </td>
                        </tr>
                <?php
                    endif;
                    if ($dia_nuevo!=$dia):               
                        
            ?>
                    <tr id="dia">
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            <?php echo mb_strtoupper($controller->cardinales($dia_nuevo))." DIA";?>                           
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>                       

                    </tr>

            <?php
                        $dia=$dia_nuevo;
                    endif;
                    if($agenda['responsable']!=""){$title="actividad";}
                    else{$title="noactividad";}

                    ?>
                    <tr id="<?php echo $title; ?>">
                        <td>
                            <?php echo $agenda['min']; ?>
                        </td>
                        <td>
                            <?php echo $agenda['horario']; ?>
                        </td>
                        <td>
                            <?php echo $agenda['actividad']; ?>                            
                        </td>
                        <td>
                            <?php echo $agenda['responsable']; ?>
                        </td>
                        <td>
                            <?php echo $agenda['mat_obs']; ?>
                        </td>                       

                    </tr>

                    <?php 
                endif;
                $y++;
            endforeach;
            ?>
        </table>
        <span id="title_span">Uniforme sábado:</span>

    </div>


<?php
    break;
    case 3:
?>  

    <div id="observaciones">
        <span id="title_span_s">Voluntarios a rastrear</span><br><br>

            <?php 
            foreach ($observaciones['voluntarios'] as $obs) :
            ?>
                <span id="span_s"><?php echo $obs; ?></span><br>        
            <?php
            endforeach;
             ?>
        <br><br><br>
        <span id="title_span_s">Muebles para talleres.</span><br>

            <?php 
            foreach ($observaciones['muebles'] as $muebles) :
            ?>
                <span id="span_s"><?php echo $muebles; ?></span><br>        
            <?php
            endforeach;
             ?>            
    </div>    
<?php
    break;  	
endswitch;
?>
