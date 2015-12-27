<div class="row">
    <div class="col-md-3">
        <div class="tituloCuerpo">
            <span class="txtTitulo">PREGUNTAS</span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <form action="<?php echo base_url('index.php/') . "/Preguntas/save_preguntas"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
            <?php $id = (isset($datos[0]->pre_id) ? $datos[0]->pre_id : '' ) ?>
            <input type="hidden" value="<?php echo (isset($datos[0]->pre_id) ? $datos[0]->pre_id : '' ) ?>" class=" form-control   " id="pre_id" name="pre_id">

            <div class="col-md-3">
                <label for="eva_id">
                    *                             Evaluación                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("eva_id", "eva_id", "form-control obligatorio", "evaluacion", "eva_id", "eva_nombre", (isset($datos[0]->eva_id) ? $datos[0]->eva_id : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                <br>
            </div>
            <div class="col-md-3">
                <label for="tem_id">
                    *                             Tema                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("tem_id", "tem_id", "form-control obligatorio", "tema", "tem_id", "tem_nombre", (isset($datos[0]->tem_id) ? $datos[0]->tem_id : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                <br>
            </div>



            <div class="col-md-3">
                <label for="are_id">
                    *                             Area                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("are_id", "are_id", "form-control obligatorio", "area", "are_id", "are_nombre", (isset($datos[0]->are_id) ? $datos[0]->are_id : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                <br>
            </div>



            <div class="col-md-3">
                <label for="tipPre_id">
                    *                             Tipo pregunta                        </label>
            </div>
            <div class="col-md-3">
                <?php echo lista("tipPre_id", "tipPre_id", "form-control obligatorio", "tipoPregunta", "tipPre_id", "tipPre_nombre", (isset($datos[0]->tipPre_id) ? $datos[0]->tipPre_id : '2'), array("ACTIVO" => "S"), /* readOnly? */ false); ?>

                <br>
            </div>



            <div class="col-md-3">
                <label for="pre_nombre">
                    *                             pregunta                        </label>
            </div>
            <div class="col-md-9">
                <textarea style="width: 100%" class=" form-control obligatorio  " id="pre_nombre" name="pre_nombre"><?php echo (isset($datos[0]->pre_nombre) ? $datos[0]->pre_nombre : '' ) ?></textarea>
                <br>
            </div>



            <div class="col-md-3">
                <label for="res_id">
                    *                             Numero de respuestas                        </label>
            </div>
            <div class="col-md-3">
                <select class=" form-control obligatorio  " id="res_num_pre" name="res_num_pre">
                    <option value="">Seleccione</option>
                    <?php for ($i = 1; $i < 10; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <br>
            </div>
        </div>
        <div class="row respuestas">

        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="res_id">
                    *                             Respuesta Correcta                        </label>
            </div>
            <div class="col-md-3">
                <select class=" form-control obligatorio  number" id="res_id" name="res_id">
                    <option value="">Seleccione</option>
                </select>
                <br>
            </div>

        </div>
        <?php if (isset($post['campo'])) { ?>
            <input type="hidden" name="<?php echo $post['campo'] ?>" value="<?php echo $post[$post['campo']] ?>">
            <input type="hidden" name="campo" value="<?php echo $post['campo'] ?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-dcs" >Guardar</button> 
                <input class="btn btn-dcs" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php') . "/Preguntas/consult_preguntas" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
<script>
    cantidad = 0;
    function campos() {
        $('input[type="file"]').each(function (key, val) {
            var img = $(this).val();
            if (img != "") {
                var r = (img.indexOf('jpg') != -1) ? '' : ((img.indexOf('png') != -1) ? '' : ((img.indexOf('gif') != -1) ? '' : false))
                if (r === false) {
                    alert('Tipo de archivo no valido');
                    return false;
                }
            }
        });
        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            $('#boton_guardar').hide();
            $('#boton_cargar').show();
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({dateFormat: 'yy-mm-dd'});

    $('#res_num_pre').change(function () {
        var r = $('.respuestas').html();
        var da1=$(this).val();
        if (da1 > cantidad) {
            agregar(cantidad, $(this).val())
        } else if (r != '') {
                var h = confirm('¿Desea borrar el contenido actual?');
                if (h == false)
                    return false;
                $('.respuestas').html('');
                agregar(0, $(this).val())
            
        }

    });
    function agregar(num1, num2) {
        var html = '';
        cantidad = num2;
        for (i = num1; i < num2; i++) {
            result=(parseInt(i)+1);
            html += '<div class="row">';
            html += '<div class="col-md-3">';
            html += '<label><span class="labe"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* Respuesta ' + result + '</b><span></label>';
            html += '</div>';
            html += '<div class="col-md-8">';
            html += '<textarea class=" form-control obligatorio " id="respuesta[]" name="respuesta[]"></textarea>';
            html += '</div>';
            html += '<div class="col-md-1">';
            html += '<a href="javascript:" class="eliminar" title="Eliminar"><i class="fa fa-trash-o fa-2x"></i></a>';
            html += '</div>';
            html += '</div>';
        }
        $('.respuestas').append(html)
    }
    $('body').delegate('.eliminar','click',function(){
        $(this).parent().parent().remove();
        cantidad = cantidad-1;
        var j=1;
        $('.labe').each(function(){
            $(this).html('<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* Respuesta '+j+'</b>');
            j++;
        })
        result=parseInt(j)-1;
        $('#res_num_pre').val( (result==0?'':result) )
    })
</script>
