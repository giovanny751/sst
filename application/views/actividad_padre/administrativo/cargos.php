<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>CARGOS
    </h5>
</div>
<div class='well'>
    <div class="row">
        <div class="form-inline">
            <form method="post" id="formcargos">
                <div class="form-group">
                    <label for="cargo"><span class="campoobligatorio">*</span>Cargo</label><input type="text" name="cargo[]" id="cargo" class="form-control obligatorio" />
                    <label for="cargojefe">Cargo jefe directo</label>
                    <select name="cargojefe[]" id="cargojefe" class="form-control" >
                        <option value="">::Seleccionar::</option>
                        <?php foreach ($cargo as $d) { ?>
                            <option value="<?php echo $d->car_id ?>"><?php echo $d->car_nombre ?></option>
                        <?php } ?>
                    </select>
                    <label for="porcentaje"><span class="campoobligatorio">*</span>%Cotizacion ARL</label><input type="text" name="porcentaje[]" id="porcentaje" class="form-control obligatorio number" />
                    <!--<i class="fa fa-plus-circle fa-2x mas btn btn-info"></i>-->
                    <button type="button" class="btn btn-success guardarcargo">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
            <th>Cargo</th>
            <th>Cargo Jefe Directo</th>
            <th>% Cotización ARL</th>
            <th>Riesgos</th>
            <th>Opciones</th>
            </thead>
            <tbody id="bodycargo">
                <?php foreach ($cargo as $c) { ?>
                    <tr>
                        <td><?php echo $c->car_nombre ?></td> 
                        <td><?php echo $c->jefe ?></td> 
                        <td><?php echo $c->car_porcentajearl ?></td> 
                        <td style="text-align: center"><i class="fa fa-child fa-2x riesgo btn btn-default" title="Eliminar" car_id="<?php echo $c->car_id ?>" data-toggle="modal" data-target="#riesgo"></i></td>
                        <td>
                            <i class="fa fa-times fa-2x eliminar btn btn-danger" title="Eliminar" car_id="<?php echo $c->car_id ?>"></i>
                            <i class="fa fa-pencil-square-o fa-2x modificar btn btn-info" title="Modificar" car_id="<?php echo $c->car_id ?>"  data-toggle="modal" data-target="#myModal"></i>
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
                    <h4 class="modal-title" id="myModalLabel">Modificación de Cargo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-8">
                            <center>
                                <input type="hidden" value="" name="car_id" id="idcargo">
                                <label for="cargo2">Cargo</label>
                                <input type="text" name="cargo" id="cargo2" class="form-control" />
                                <label for="cargojefedir">Cargo Jefe Directo</label>
                                <select name="cargojefedir" id="cargojefedir" class="form-control" >
                                    <option value="">Sin Jefe</option>
                                    <?php foreach ($cargo as $d) { ?>
                                        <option value="<?php echo $d->car_id ?>"><?php echo $d->car_nombre ?></option>
                                    <?php } ?>
                                </select>
                                <label for="cotizacion">%Cotizacion ARL</label>
                                <input type="text" name="cotizacion" id="cotizacion" class="form-control" />
                            </center>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success guardarmodificacion">Guardar</button>
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
                    <h4 class="modal-title" id="myModalLabel">RIESGOS ASOCIADOS AL CARGO</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <th>RIESGOS</th>
                            </thead>
                            <tbody id="riesgocargo">
                                
                            </tbody>
                        </table>
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
    $('body').delegate(".riesgo","click",function(){
        
        var car_id = $(this).attr("car_id");
        $.post(
                "<?php echo base_url("index.php/administrativo/cargoriesgo") ?>",
                {
                    car_id:car_id,
                }
        ).done(function (msg) {
            $("#riesgocargo *").remove();
            var body = "";
            $.each(msg,function(key,val){
                body += "<tr>";
                body += "<td>"+val.rie_descripcion+"</td>";
                body += "</tr>";
            });
            $("#riesgocargo").append(body);
        }).fail(function (msg) {
            alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
        });
    });
    $('.guardarmodificacion').click(function () {
        $.post(
                "<?php echo base_url("index.php/administrativo/modificacioncargo") ?>",
                {
                    cargo: $('#cargo2').val(),
                    jefe: $('#cargojefedir').val(),
                    cotizacion: $('#cotizacion').val(),
                    car_id: $('#idcargo').val()
                }
        ).done(function (msg) {
            alerta("verde", "Modificado correctamente");
            window.location.href = '';
        }).fail(function (msg) {
            alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
        });
    });

    $('body').delegate(".modificar", "click", function () {
        $.post(
                "<?php echo base_url("index.php/administrativo/consultacargoxid") ?>",
                {
                    car_id: $(this).attr('car_id')
                }
        ).done(function (msg) {
            $('#idcargo').val(msg.car_id);
            $('#cargo2').val(msg.car_nombre);
            $('#cargojefedir').val(msg.idjefe);
            $('#cotizacion').val(msg.car_porcentajearl);
        }).fail(function (msg) {
            alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
        })

    });

    $('body').delegate(".eliminar", "click", function () {
        var fila = $(this);
        if (confirm("Esta seguro de eliminar el cargo") == true) {
            $.post("<?php echo base_url('index.php/administrativo/eliminarcargo') ?>", {id: $(this).attr('car_id')})
                    .done(function (msg) {
                        if (msg == 1) {
                            alerta("rojo", "Tiene personas a cargo");
                        } else {
                            $('select *').remove();
                            var select = "";
                            $.each(msg, function (key, val) {
                                select += "<option value='" + val.car_id + "'>" + val.car_nombre + "</option>";
                            });
                            $('select').append(select);
                            fila.parents('tr').remove();
                            alerta("verde", "Eliminado Correctamente");
                        }
                    })
                    .fail(function (msg) {
                        alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                    });
        }
    });
    var agregar = '<div class="form-group" style="margin-top:10px">\n\
                <label for="cargo">Cargo</label><input type="text" name="cargo[]" id="cargo" class="form-control obligatorio" />\n\
                <label for="cargojefe">Cargo jefe directo</label><input type="text" name="cargojefe[]" id="cargojefe" class="form-control" />\n\
                <label for="porcentaje">%Cotizacion ARL</label><input type="text" name="porcentaje[]" id="porcentaje" class="form-control obligatorio number" />\n\
                <i class="fa fa-plus-circle fa-2x mas btn btn-info" style="cursor:pointer"></i>\n\
                <i class="fa fa-minus-circle fa-2x menos btn btn-danger"  style="cursor:pointer"></i>\n\
            </div>';
    $("body").delegate(".mas", "click", function () {
        $("#formcargos").append(agregar);
    });

    $('body').delegate(".menos", "click", function () {
        $(this).parents('.form-group').remove();
    });
    $('.guardarcargo').click(function () {
        if (obligatorio('obligatorio') == true) {
            $.post("<?php echo base_url('index.php/administrativo/guardarcargo') ?>",
                    $("#formcargos").serialize())
                    .done(function (msg) {
                        $('#bodycargo *').remove()
                        $('#cargojefe *').remove()
                        var body = "";
                        var option = "";
                        $.each(msg, function (key, val) {
                            body += "<tr>";
                            body += "<td>" + val.car_nombre + "</td>";
                            body += "<td>" + val.jefe + "</td>";
                            body += "<td>" + val.car_porcentajearl + "</td>";
                            body += '<td><i class="fa fa-times fa-2x eliminar btn btn-danger" title="Eliminar" car_id="' + val.car_id + '"></i><i class="fa fa-pencil-square-o fa-2x modificar btn btn-info" title="Modificar" car_id="' + val.car_id + '"  data-toggle="modal" data-target="#myModal"></i></td>';
                            body += "</tr>";
                            option += "<option value='" + val.car_id + "'>" + val.car_nombre + "</option>";
                        });
                        $('#bodycargo').append(body);
                        $('#cargojefe').append(option);
                        alerta("verde", "Guardado Correctamente");
                    })
                    .fail(function (msg) {

                    })

        }
    })

</script>    