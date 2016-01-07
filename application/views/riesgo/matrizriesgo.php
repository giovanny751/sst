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
            ?><tr><td rowspan="<?php echo count($matriz[$plan])+count($actP) ?>"><?php echo $plan; ?></td><?php
                $h = 0;
                echo ($h != 0 ) ? "<tr>" : ""; 
                if(is_array($actP))
                foreach ($actP as $actividadPadre => $actH):
                    ?>
                    <td rowspan="<?php echo count($actP[$actividadPadre])+count($actH) ?>"><?php echo $actividadPadre ?></td>
                    <?php
                    $i = 0;
                    echo ($i != 0 ) ? "<tr>" : ""; 
                    if(is_array($actH))
                    foreach ($actH as $actividadHijo => $tar):
                        ?>
                        <td rowspan="<?php echo count($actH[$actividadHijo])+count($tar) ?>"><?php echo $actividadHijo ?></td>
                        <?php
                        $j = 0;
                        echo ($j != 0 ) ? "<tr>" : ""; 
                        if(is_array($tar))
                        foreach ($tar as $tarea => $rie):
                            ?>
                            <td rowspan="<?php echo count($tar[$tarea])+count($rie); ?>" ><?php echo $tarea ?></td>
                            <?php
                            $k = 0;
                            echo ($k != 0 ) ? "<tr>" : "";
                            if(is_array($rie))
                            foreach ($rie as $riesgo => $cla):
                                ?>
                                <td rowspan="<?php echo count($rie[$riesgo])+count($cla); ?>"><?php echo $riesgo ?></td>
                                <?php
                                $n = 0;
                                echo ($n != 0 ) ? "<tr>" : ""; 
                                if(is_array($cla))
                                foreach ($cla as $clasificacion => $num):
                                    ?>
                                    <td rowspan="<?php echo count($cla[$clasificacion])+count($num) ?>"><?php echo $clasificacion ?></td>
                                    <?php
                                    $m = 0;
                                    foreach ($num as $tipo):
                                        ?>
                                        <?php echo ($m == 0 ) ? "<tr>" : ""; ?>
                                            <td><?php echo $tipo ?></td>
                                        <?php echo ($m != 0 ) ? "</tr>" : ""; 
                                        $m++;
                                        ?>
                                <?php endforeach;
                                echo ($n > count($cla[$clasificacion]) ) ? "</tr>" : "";
                                $n++;
                            endforeach;
                            echo ($k > count($rie[$riesgo]) ) ? "</tr>" : "";
                            $k++;
                        endforeach;
                        echo ($j > count($tar[$tarea]) ) ? "</tr>" : "";
                        $j++;
                    endforeach;
                    echo ($i > count($actH[$actividadHijo]) ) ? "</tr>" : "";
                    $i++;
                endforeach;
                echo ($h > count($actP[$actividadPadre]) ) ? "</tr>" : "";
                $h++;
            endforeach;
            ?></tr><?php
        endforeach;
        ?>
    </table>              

</div>
