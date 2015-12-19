<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>REGISTRO USUARIO
    </h5>
</div>
<div class='well'>
    <div class="row">
        <div class="table-responsive ">
            <table class="table table-responsive table-striped table-bordered">
                <thead>
                <th style="width: 220px">Usuario</th>
                <th style="width: 220px">Email</th>
                <th style="width: 220px">Numero Celular</th>
                <th style="width: 220px">Estado</th>
                <th style="width: 220px">Roles</th>
                </thead>
                <tbody>
                    <?php foreach ($usaurios as $todosusuarios) { ?>
                        <tr>
                            <td><?php echo $todosusuarios['usu_nombre'] . " " . $todosusuarios['usu_apellido']; ?></td>
                            <td><?php echo $todosusuarios['usu_email']; ?></td>
                            <td><?php
                                if (!empty($todosusuarios['phone'])) {
                                    echo $todosusuarios['phone'];
                                } else {
                                    echo 0;
                                }
                                ?></td>
                            <td><?php
                                if ($todosusuarios['est_id'] == 1)
                                    echo "Activo";
                                else {
                                    echo "Inactivo";
                                }
                                ?></td>
                            <td align="center"><button type="button"  data-toggle="modal" data-target="#myModal3"   class="btn btn-info permiso" usuarioid="<?php echo $todosusuarios['usu_id']; ?>">Roles</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="alerta"></div>
        </div>
    </div>
</div>

<!--Modal-->

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Permisos</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Asignacion de Rol</h5>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="form-group has-success has-feedback">
                                <form method="post" id="f15">
                                    <input type="hidden" value="" id="idusuario" name="idusuario" />
                                <table class="table table-hover table-bordered"> 
                                    <thead>
                                    <th>Rol</th><th>Asignación</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($roles as $rol) { ?>
                                            <tr>
                                                <td><?php echo $rol['rol_nombre']; ?></td>
                                                <td style="text-align:center">
                                                    <input type="checkbox" value="<?php echo $rol['rol_id']; ?>" id="idrol" name="idrol[]">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>    
                                
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <form method="post" id="formulariopermisos">
                                <input type="hidden" name="usuarioid" id="usuarioid">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12 permisomenu">

                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 col-md-offset-8 col-lg-offset-8 col-sm-offset-8 col-sx-offset-8 margenlogo' align='center' >
                        <button type="button" class="btn btn-success insertarrol">Asignar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .error{
        border: 2px solid #7d7d7d;
        background-color: lightgoldenrodyellow;
    }
</style>
<script>
    $('#ingresousuario').hide();

    $('.insertarrol').click(function(){
        $("#idusuario").val($(this).attr('usuarioid'));
        $.post("<?= base_url('index.php/presentacion/guardarpermisos') ?>", 
                    $('#f15').serialize()
                ).done(function(){
                    
                }).fail(function(){
                    
                })

        
    });

    $('.modificar').click(function () {
        $('.obligatorio').val('');
        $.post("<?= base_url('index.php/presentacion/consultausuario') ?>",
                {id: $(this).attr('idpadre')},
        function (data) {
            $('#usuario').val(data.usu_nombres_apellido);
            $('#email').val(data.usu_correo);
            $('#celular').val(data.usu_telF);
        });
    });

    $('body').delegate('.permiso', 'click', function () {
        var id = $(this).attr('usuarioid');
        $('#usuarioid').val(id);
        $('.insertarrol').attr('usuarioid', id);
    });

       
    $('#insertarusuario').click(function () {
        $('.obligatorio').val('');
    });


</script>    