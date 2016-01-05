<div class="row">
    <div class="col-md-12">
        <div class="tituloCuerpo">
            <span class="txtTitulo"><?php echo $nombre_evaluacion[0]->eva_nombre ?></span>
        </div>
    </div>
</div>
<div class="cuerpoContenido">
    <div class="container">
        <?php
        $area = '';
        $tema = '';
        $tipo = '';
        foreach ($preguntas_evaluacion as $key => $value) {
            echo '<span style="float:right">Tipo pregunta: ' . $value->tipPre_nombre . '</span><br><hr>';
            if ($value->are_nombre != $area) {
                echo '<b>Area: ' . $value->are_nombre . '</b><p>';
                $area = $value->are_nombre;
            }
            if ($value->tem_nombre != $tema) {
                echo '<b>Tema: ' . $value->tem_nombre . '</b><p>';
                $tema = $value->tem_nombre;
            }
            echo '<b>Contexto:</b> <br>' . $value->pre_contexto . '<p>';
            echo '<b>Pregunta:</b> <br>' . $value->pre_nombre . '<p>';

            @$datos = Evaluacion::obtener_respuestas($value->pre_id);
            foreach ($datos as $value2) {
                ?>
                <div class="col-md-12">
                    <div class="col-md-1">
                        <input type="radio" name="<?php echo $value2->pre_id ?>" value="<?php echo $value2->res_id  ?>" >
                    </div>
                    <div class="col-md-10">
                        <?php echo $value2->res_nombre ?>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>