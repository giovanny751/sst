<div class="row">
    <div class="circuloIcon guardar"><i class="fa fa-floppy-o fa-3x"></i></div>
<!--    <div class="circuloIcon" ><i class="fa fa-trash-o fa-3x"></i></div>
    <div class="circuloIcon" ><i class="fa fa-pencil-square-o fa-3x"></i></div>
    <div class="circuloIcon" ><i class="fa fa-folder-open fa-3x"></i></div>-->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tituloCuerpo">
            <span class="txtTitulo">
                <a href="<?php echo base_url("index.php/presentacion/principal") ?>">HOME</a>/
                <a href="<?php echo base_url("index.php/administrativo/empresa") ?>">EMPRESA</a>/
                <?php echo $empresa[0]->Dim_id ?>
            </span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <div class="row">
        <div class="form-inline">
            <div class="form-group">
                <label for="descripcion"><span class="campoobligatorio">*</span>Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control obligatorio"/>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="tablesst">
            <thead>
            <th style="width: 75%">Descripción</th>
            <th>Riesgos</th>
            <th>Editar</th>
            <th>Eliminar</th>
            </thead>
            <tbody id="bodydimension">
                <?php foreach ($dimension as $d) { ?>
                    <tr>
                        <td><?php echo $d->dim_descripcion ?></td>
                        <td class="transparent"><i class="fa fa-child fa-2x riesgo btn btn-default" title="Eliminar" dim_id="<?php echo $d->dim_id ?>" data-toggle="modal" data-target="#riesgo"></i></td>
                        <td class="transparent">
                            <i class="fa fa-pencil-square-o fa-2x modificar" title="Modificar" dim_id="<?php echo $d->dim_id ?>" data-toggle="modal" data-target="#myModal"></i>
                        </td>
                        <td class="transparent">
                            <i class="fa fa-trash-o fa-2x eliminar" title="Eliminar" dim_id="<?php echo $d->dim_id ?>" ></i>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Dimensión</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-8">
                            <center>
                                <input type="hidden" name="dimid" id="dimid">
                                <label for="descripcion2">Descripción</label>
                                <input type="text" name="descripcion2" id="descripcion2" class="form-control" />
                                <br>
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary guardarmodificacion">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="riesgo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">RIESGOS ASOCIADOS</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-2 col-sx-offset-2 col-md-8 col-sx-8">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <th>RIESGOS</th>
                                </thead>
                                <tbody id="riesgodimension">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('body').delegate(".riesgo", "click", function() {

        var dim_id = $(this).attr("dim_id");
        $.post(
                "<?php echo base_url("index.php/administrativo/dimensionunoriesgo") ?>",
                {
                    dim_id: dim_id,
                }
        ).done(function(msg) {
            $("#riesgodimension *").remove();
            var body = "";
            $.each(msg, function(key, val) {
                body += "<tr>";
                body += "<td>" + val.rie_descripcion + "</td>";
                body += "</tr>";
            });
            $("#riesgodimension").append(body);
        }).fail(function(msg) {
            alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
        });
    });
    $('.guardarmodificacion').click(function() {

        $.post(
                "<?php echo base_url("index.php/administrativo/guardarmodificaciondimension") ?>",
                {
                    dimid: $('#dimid').val(),
                    descripcion: $('#descripcion2').val()
                }
        ).done(function() {
            alerta("verde", "Modificado correctamente");
            window.location.href = '';
        }).fail(function() {
            alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
        })

    });

    $('body').delegate(".modificar", "click", function() {

        $.post(
                "<?php echo base_url("index.php/administrativo/consultadimensionxid") ?>",
                {dim_id: $(this).attr('dim_id')}
        ).done(function(msg) {
            $('#dimid').val(msg.dim_id);
            $('#descripcion2').val(msg.dim_descripcion);
        }).fail(function(msg) {

        });

    });

    var res = function(valor,callback){
        callback(valor);
    }

    $('body').delegate(".eliminar", "click", function() {
        var eliminar = $(this);
        if (confirm("Esta seguro de eliminar la dimension") == true) {
            $.post("<?php echo base_url('index.php/administrativo/eliminardimension') ?>",
                    {id: $(this).attr('dim_id')}
            ).done(function(msg) {
                if(!jQuery.isEmptyObject(msg.message))alerta("rojo",msg['message']);
                else {eliminar.parents('tr').remove();
                    alerta("verde", "Eliminado Correctamente");
                }
            }).fail(function(msg) {
                alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
            });
        }
    });
    $('.guardar').click(function() {
        if (obligatorio('obligatorio') == true) {
            $.post("<?php echo base_url("index.php/administrativo/guardardimension") ?>"
                    , {
                        descripcion: $('#descripcion').val()
                    })
                    .done(function(msg) {
                       if(!jQuery.isEmptyObject(msg.message))alerta("amarillo",msg['message'])
                       else{
                            $('#bodydimension *').remove();
                            var bodydimension = "";
                            $.each(msg, function(key, val) {
                                bodydimension += "<tr>";
                                bodydimension += "<td>" + val.dim_descripcion + "</td>";
                                bodydimension += "<td class='transparent'><i class='fa fa-child fa-2x riesgo btn btn-default' title='Eliminar' dim_id='" + val.dim_id + "' data-toggle='modal' data-target='#riesgo'></i></td>";
                                bodydimension += '<td class="transparent">\n\
                                                    <i class="fa fa-pencil-square-o fa-2x modificar" title="Modificar"  dim_id="' + val.dim_id + '" data-toggle="modal" data-target="#myModal"></i>\n\
                                                </td>';
                                bodydimension += '<td class="transparent">\n\
                                                    <i class="fa fa-trash-o fa-2x eliminar" title="Eliminar" dim_id="' + val.dim_id + '" ></i>\n\
                                                </td>';
                                bodydimension += "</tr>";
                            });
                            $('#bodydimension').append(bodydimension);
                            alerta("verde", "Guardado Correctamente");
                        } 
                    })
                    .fail(function(msg) {
                        alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                    })
        }
    });
</script>