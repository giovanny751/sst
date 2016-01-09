<div class="row">
    <div class="col-md-12">
        <div class="tituloCuerpo">
            <span class="txtTitulo">MATRIZ DE RIESGO</span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <table class="tablesst">
        <thead>
        <th>Plan</th>
        <th>Actividad Padre</th>
        <th>Actividad</th>
        <th>Tarea</th>
        <th>Riesgo</th>
        <th>Riesgo Clasificación</th>
        <th>Tipo</th>
        </thead>
        <?php foreach ($matriz as $plan => $actP): ?>
            <tr>
                <td rowspan="<?php echo count($actP) ?>"><?php echo $plan ?></td>  
                <?php
                $i = 0;
                foreach ($actP as $actividadPadre => $actH):
                    if ($i == 0) {
                        if (!empty($actividadPadre)) {
                            ?>
                            <td rowspan="<?php echo count($actH) ?>"><?php echo $actividadPadre; ?></td>
                            <?php
                        }
                    } else {
                        ?>
                        <td><?php echo $actividadPadre; ?></td>
                        <?php
                    }
                    $i++;
                    $d = 0;
                    foreach ($actH as $actividadHijo => $tar):
                        if ($d == 0) {
                            if (!empty($actividadHijo)) {
                                ?>
                                <td rowspan="<?php echo count($tar) ?>"><?php echo $actividadHijo; ?></td>
                            <?php }
                        } else { ?>
                            <td><?php echo $actividadHijo; ?></td>
                            <?php
                        }
                        $d++;
                        $m = 0;
                        foreach ($tar as $tarea => $rie):
                            if ($m == 0) {
                                if (!empty($tarea)) {
                                    ?>
                                    <td rowspan="<?php echo count($rie) ?>"><?php echo $tarea . "oooooo"; ?></td>
                                    <?php
                                }
                            } else {
                                ?>
                                <td><?php echo $tarea . "pppppp"; ?></td>
                                <?php
                            }
                            $m++;
                            $l = 0;
                            foreach ($rie as $riesgo => $cla):
                                if ($l == 0) {
                                    if (!empty($riesgo)) {
                                        ?>
                                        <td rowspan="<?php echo count($cla) ?>"><?php echo $riesgo; ?></td>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <td><?php echo $riesgo; ?></td>
                                    <?php
                                }
                                $l++;
                                $z = 0;
                                foreach ($cla as $clasificacion => $num):
                                    if ($z == 0) {
                                        if (!empty($clasificacion)) {
                                            ?>
                                            <td rowspan="<?php echo count($num) ?>"><?php echo $clasificacion; ?></td>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <td><?php echo $clasificacion; ?></td>
                                        <?php
                                    }
                                    $z++;
                                    foreach ($num as $tipo):
                                        
                                    endforeach;
                                endforeach;
                            endforeach;
                        endforeach;
                    endforeach;
                    ?></tr><?php
                endforeach;
            endforeach;
            ?>
    </table>  
</div>
