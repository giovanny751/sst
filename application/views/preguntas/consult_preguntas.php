<div class="row">
    <div class="col-md-3">
        <div class="tituloCuerpo">
            <span class="txtTitulo">PREGUNTAS</span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <form action="<?php echo base_url('index.php/') . '/Preguntas/consult_preguntas'; ?>" method="post" >
        <div class="row">
            

            <div class="col-md-3">
                <label for="eva_id">
                    Evaluación                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['eva_id']) ? $post['eva_id'] : '' ) ?>" class="form-control obligatorio  " id="eva_id" name="eva_id">
                <br>
            </div>

            <div class="col-md-3">
                <label for="tem_id">
                    Tema                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['tem_id']) ? $post['tem_id'] : '' ) ?>" class="form-control obligatorio  " id="tem_id" name="tem_id">
                <br>
            </div>

            <div class="col-md-3">
                <label for="are_id">
                    Area                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['are_id']) ? $post['are_id'] : '' ) ?>" class="form-control obligatorio  " id="are_id" name="are_id">
                <br>
            </div>

            <div class="col-md-3">
                <label for="tipPre_id">
                    Tipo pregunta                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['tipPre_id']) ? $post['tipPre_id'] : '' ) ?>" class="form-control obligatorio  " id="tipPre_id" name="tipPre_id">
                <br>
            </div>

            <div class="col-md-3">
                <label for="pre_nombre">
                    pregunta                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['pre_nombre']) ? $post['pre_nombre'] : '' ) ?>" class="form-control obligatorio  " id="pre_nombre" name="pre_nombre">
                <br>
            </div>

            <div class="col-md-3">
                <label for="res_id">
                    Numero de respuestas                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['res_id']) ? $post['res_id'] : '' ) ?>" class="form-control obligatorio  " id="res_id" name="res_id">
                <br>
            </div>

        </div>
        <button class="btn btn-dcs">Consultar</button>
    </form>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <th>pre_id</th>
                <th>Evaluación</th>
                <th>Tema</th>
                <th>Area</th>
                <th>Tipo pregunta</th>
                <th>pregunta</th>
                <th>Numero de respuestas</th>
                <th>Acción</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $key => $value) {
                        echo "<tr>";
                        $i = 0;

                        foreach ($value as $key2 => $value2) {
                            
                            if ($i == 0) {
                                $campo = $key2;
                                $valor = "'" . $value->$key2 . "'";
                                echo "<td style='display:none'>" . $value->$key2 . "</td>";
                            }else{
                                echo "<td>" . $value->$key2 . "</td>";
                            }
                            $i++;
                        }
                        echo "<td>"
                        . '<a href="javascript:" class="btn btn-dcs" onclick="editar(' . $valor . ')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-danger" onclick="delete_(' . $valor . ')"><i class="fa fa-trash-o"></i></a>'
                        . "</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3" style="float:right">
        <a href="<?php echo base_url() . "/index.php/Preguntas/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Preguntas/edit_preguntas"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Preguntas/delete_preguntas"; ?>" method="post" id="delete">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
<?php } ?>
<script>
    function editar(num) {
        $('#<?php echo $campo ?>2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r = confirm('Confirma que desea eliminar el registro');
        if (r == false) {
            return false;
        }
        $('#<?php echo $campo ?>3').val(num);
        $('#delete').submit();
    }

    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({
        rtl: Metronic.isRTL(),
        autoclose: true
    });
</script>
