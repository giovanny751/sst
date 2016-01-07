<div class="row">
    <div class="col-md-12">
        <div class="tituloCuerpo">
            <span class="txtTitulo">MATRIZ DE RIESGO</span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <?php var_dump($matriz); ?>
    <table class="tablesst">
        <?php
        foreach ($matriz as $plan => $actP):
            ?><tr><td rowspan="<?php echo count($matriz[$plan]) ?>"><?php echo $plan; ?></td><?php
                $h = 0;
                foreach ($actP as $actividadPadre => $actH):
                    ?>
                    <td rowspan="<?php echo count($actP[$actividadPadre]) ?>"><?php echo $actividadPadre ?></td>
                    <?php
                    $i = 0;
                    foreach ($actH as $actividadHijo => $tar):
                        ?>
                        <?php echo ($i != 0 ) ? "<tr>" : ""; ?>
                        <td rowspan="<?php echo count($actH[$actividadHijo]) ?>"><?php echo $actividadHijo ?></td>
                        <?php
                        $j = 0;
                        foreach ($tar as $tarea => $rie):
                            ?>
                            <?php echo ($j != 0 ) ? "<tr>" : ""; ?>
                            <td rowspan="<?php echo count($tar[$tarea]); ?>" ><?php echo $tarea ?></td>
                            <?php
                            $k = 0;
                            foreach ($rie as $riesgo => $cla):
                                ?>
                                <?php echo ($k != 0 ) ? "<tr>" : ""; ?>
                                <td rowspan="<?php echo count($rie[$riesgo]) ?>"><?php echo $riesgo ?></td>
                                <?php
                                $n = 0;
                                foreach ($cla as $clasificacion => $num):
                                    ?>
                                    <?php echo ($n != 0 ) ? "<tr>" : ""; ?>
                                    <td rowspan="<?php echo count($cla[$clasificacion]) ?>"><?php echo $clasificacion ?></td>
                                    <?php
                                    $m = 0;
                                    foreach ($num as $tipo):
                                        ?>
                                        <?php echo ($m != 0 ) ? "<tr>" : ""; ?>
                                            <td><?php echo $tipo ?></td>
                                        <?php echo ($m != 0 ) ? "</tr>" : ""; ?>
                                <?php endforeach;
                                   
                                ?> 
                                <?php
                                echo ($n > count($cla[$clasificacion]) ) ? "</tr>" : $h++;
                            endforeach;
                            echo ($k > count($rie[$riesgo]) ) ? "</tr>" : $k++;
                        endforeach;
                        echo ($j > count($tar[$tarea]) ) ? "</tr>" : $j++;
                    endforeach;
                    echo ($i > count($actH[$actividadHijo]) ) ? "</tr>" : $i++;
                endforeach;
                echo ($h > count($actP[$actividadPadre]) ) ? "</tr>" : $i++;
            endforeach;
            ?></tr><?php
        endforeach;
        ?>
    </table>              

</div>
