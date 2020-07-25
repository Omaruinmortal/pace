
<div id="sede">
    <?php echo $sede; ?>    
</div>
<div id="lugar">
    <?php echo $lugar; ?>    
</div>
<div id="date_course">
    <?php echo $date_course; ?>    
</div>
<div id="provee">
    <?php echo $provee; ?>    
</div>

<div id="div_table_agenda">
    <table id="table_agenda" border="0">
            <?php $i=0; foreach ($agenda as $array):?>
                <?php if ($i==0): ?>
                <tr>                    
                    <td id="titulo"><span id="fecha_inicial"><?php echo $array['fecha']; ?></span></td>
                    
                </tr>
                <tr>
                    <td id="td_title">HORA</td>
                    <td id="td_title" style="font-size: 11px">ACTIVIDAD</td>
                    <td id="td_title" style="font-size: 11px">RESPONSABLE</td>
                    <td id="td_title" style="font-size: 11px; padding-right: 105px">MATERIAL Y OBSERVACIONES</td>
                    <td></td>
                </tr>
               
                <?php endif; ?>

                <?php 
                    foreach ($array as $key => $value):
                        if (is_array($value)):
                            foreach ($value as $key):
                ?>
                <tr>
                    <td style="color: <?php echo $key['color_hora'];?>; font-weight: <?php echo $key['weight_hora'];?>; text-align:left;"><?php echo $key['hora']; ?></td>

                    <td style="color: <?php echo $key['color_actividad'];?>; font-weight: <?php echo $key['weight_actividad'];?>;"><?php echo $key['actividad']; ?></td>

                    <td style="font-weight: <?php echo $key['weight_responsable'];?>"><?php echo $key['responsable']; ?></td>
                    <td colspan="2"><?php echo $key['mat_obs'];?></td>
                </tr>

                <?php endforeach; ?>
                <?php endif; ?>
                <?php endforeach; $i++; ?>
            <?php endforeach;?>
        </table>    
</div>

<div id="recomendaciones">
    <?php foreach ($recomendaciones as $recom):?>
        <span><?php echo $recom['dia']." ".$recom['recom']; ?></span>
    <?php  endforeach;?>    
</div>

<div id="instructores">
    <span id="instructores_name">INSTRUCTORES:</span>
    <table id="instructores_table">

        <?php $y=0;foreach ($instructores as $inst):?>
            <tr>
                <td width="220px">
                    <?php echo mb_strtoupper($inst['abrev_prof']." ".$inst['instructor']); ?>                    
                </td>
                <?php if($y==0){$bold="bold";} else{$bold="normal";} ?>
                    <td style="text-align: center; font-weight: <?php echo $bold; ?> ">
                        <?php echo mb_strtoupper($inst['puesto']); ?>
                    </td>
            </tr>
        <?php $y++;  endforeach;?> 
    </table>   
</div>

        