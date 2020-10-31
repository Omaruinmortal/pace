
<div id="ciudad">
    <?php echo mb_strtoupper($ciudad); ?>
</div>
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
                <tr id="titulo">
                    <td>DURACION</td>
                    <td><span id="fecha_inicial"><?php echo $array['fecha']; ?></span></td>
                    <td colspan='3' id="fecha_cardinal"><?php echo mb_strtoupper($array['dia']); ?> DIA</td>
                </tr>
                <tr>
                    <td id="td_title" colspan="2">HORA</td>
                    <td id="td_title">ACTIVIDAD</td>
                    <td id="td_title">RESPONSABLE</td>
                    <td id="td_title">MATERIAL Y OBSERVACIONES</td>
                </tr>
                <?php else:; ?>
                    <tr id="titulo">
                    <td id="fecha_siguiente"></td>
                    <td id="fecha_siguiente_pos"><?php echo $array['fecha']; ?></td>
                    <td colspan='3' id="fecha_cardinal"><?php echo strtoupper($array['dia']); ?> DIA</td>
                </tr>
                <?php endif; ?>

                <?php 
                    foreach ($array as $key => $value):
                        if (is_array($value)):
                            foreach ($value as $key):
                ?>
                <tr>
                    <td width="6%" height="16px"><?php echo $key['duracion'];?></td>
                    <td width="6%" style="color: <?php echo $key['color_hora'];?>; font-weight: <?php echo $key['weight_hora'];?>; text-align:right;"><?php echo $key['hora']; ?></td>

                    <td width="30%" style="color: <?php echo $key['color_actividad'];?>; font-weight: <?php echo $key['weight_actividad'];?>;"><?php echo $key['actividad']; ?></td>

                    <td width="20%" style="font-weight: <?php echo $key['weight_responsable'];?>"><?php echo $key['responsable']; ?></td>
                    <td width="20%"><?php echo $key['mat_obs'];?></td>
                </tr>

                <?php endforeach; ?>
                <?php endif; ?>
                <?php endforeach; $i++; ?>
            <?php endforeach;?>
        </table>    
</div>
<div id="hospedaje">
    <?php echo $hospedaje; ?>    
</div>
<div id="recomendaciones">
    <?php foreach ($recomendaciones as $recom):?>
        <span><?php echo $recom['dia']." ".$recom['recom']; ?></span>
    <?php  endforeach;?>    
</div>
<div id="instructores">
    <table id="instructores_table">
        <?php foreach ($instructores as $inst):?>
            <tr>
                <td>
                    <?php echo $inst['abrev_prof']." ".$inst['instructor']; ?>                    
                </td>
                <td>
                    <?php echo $inst['puesto']; ?>
                </td>
            </tr>
        <?php  endforeach;?> 
    </table>   
</div>

        