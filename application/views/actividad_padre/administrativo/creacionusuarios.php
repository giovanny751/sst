<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>CREACIÓN USUARIOS
    </h5>
</div>
<div class='well'>
    <form id="f3" method="post">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <center>
                    <div class="flecha flechaIzquierdaDoble" metodo="flechaIzquierdaDoble"></div>
                    <div class="flecha flechaIzquierda" metodo="flechaIzquierda"></div>
                    <div class="flecha flechaDerecha" metodo="flechaDerecha"></div>
                    <div class="flecha flechaDerechaDoble" metodo="flechaDerechaDoble"></div>
                    <div class="flecha documento" metodo="documento"></div>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="cedula"><span class="campoobligatorio">*</span>Cédula</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="cedula" name="cedula" class="form-control obligatorio" value="<?php echo (!empty($usuario[0]->usu_cedula)) ? $usuario[0]->usu_cedula : ""; ?>" />
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="nombres">
                    <span class="campoobligatorio">*</span>Nombres</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="nombres" name="nombres" class="form-control obligatorio"  value="<?php echo (!empty($usuario[0]->usu_nombre)) ? $usuario[0]->usu_nombre : ""; ?>" />
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="apellidos">Apellidos</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo (!empty($usuario[0]->usu_apellido)) ? $usuario[0]->usu_apellido : ""; ?>" />
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="usuario"><span class="campoobligatorio">*</span>Usuario</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="usuario" name="usuario" class="form-control obligatorio"  value="<?php echo (!empty($usuario[0]->usu_usuario)) ? $usuario[0]->usu_usuario : ""; ?>" />
            </div> 
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="usuario">Cambio contraseña inicial</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="checkbox" id="cambiocontrasena" name="cambiocontrasena" class="form-control" <?php echo (!empty($usuario[0]->usu_cambiocontrasena) && $usuario[0]->usu_cambiocontrasena == 1) ? "checked" : ""; ?> />
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="contrasena"><span class="campoobligatorio">*</span>Contraseña</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="password" id="contrasena" name="contrasena" class="form-control obligatorio" value="<?php echo (!empty($usuario[0]->usu_contrasena)) ? $usuario[0]->usu_contrasena : ""; ?>" />
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="estado">Estado</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select id="estado" name="estado" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($estado as $e) { ?>
                        <option <?php echo (!empty($usuario[0]->est_id) && $usuario[0]->est_id == $e->est_id) ? "selected" : ""; ?> value="<?php echo $e->est_id ?>"><?php echo $e->est_nombre ?></option>
                    <?php } ?>
                </select>
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="email">Email</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="email" id="email" name="email" class="form-control" value="<?php echo (!empty($usuario[0]->usu_email)) ? $usuario[0]->usu_email : ""; ?>" />
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="cargo"><span class="campoobligatorio">*</span>Cargo</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select id="cargo" name="cargo" class="form-control obligatorio">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($cargo as $c) { ?>
                        <option <?php echo (!empty($usuario[0]->car_id) && $usuario[0]->car_id == $c->car_id) ? "selected" : ""; ?> value="<?php echo $c->car_id ?>"><?php echo $c->car_nombre ?></option>
                    <?php } ?>
                </select>
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="genero"><span class="campoobligatorio">*</span>Genero</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <select id="genero" name="genero" class="form-control obligatorio">
                    <option value="">::Seleccionar::</option> 
                    <?php foreach ($sexo as $s) { ?>
                        <option <?php echo (!empty($usuario[0]->sex_id) && $usuario[0]->sex_id == $s->Sex_id) ? "selected" : ""; ?> value="<?php echo $s->Sex_id ?>"><?php echo $s->Sex_Sexo ?></option>
                    <?php } ?>
                </select>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="empleado"><span class="campoobligatorio">*</span>Empleado</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select id="empleado" name="empleado" class="form-control obligatorio">
                    <option value="">::Seleccionar::</option>
                </select>
            </div>    
        </div>
        <input type="hidden" name="usuid" id="usuid" value="<?php echo (!empty($usuario[0]->usu_id)) ? $usuario[0]->usu_id: "" ; ?>">
    </form>
    <div class="row" style="text-align:center">
        <button type="button" class="btn btn-success" id="guardar"><?php echo (!empty($usuario[0]->usu_id)) ? "Actualizar" : "Guardar"; ?></button>
    </div>    
</div>    
<script>
    $(".flecha").click(function(){
        var url = "<?php echo base_url("index.php/administrativo/consultausuariosflechas") ?>";
        var idUsuarioCreado = $("#usuid").val();
        var metodo = $(this).attr("metodo");
        if(metodo != "documento"){
            $.post(url,{idUsuarioCreado:idUsuarioCreado,metodo:metodo})
                    .done(function(msg){
                        $("input[type='text'],select").val("");
                        $("#usuid").val(msg.usu_id);
                        $("#cedula").val(msg.usu_cedula);
                        $("#nombres").val(msg.usu_nombre);
                        $("#apellidos").val(msg.usu_apellido);
                        $("#usuario").val(msg.usu_usuario);
                        $("#contrasena").val(msg.usu_contrasena);
                        $("#email").val(msg.usu_email);
                        $("#genero").val(msg.sex_id);
                        $("#estado").val(msg.est_id);//estado
                        $("#cargo").val(msg.car_id);//cargo
                        $("#empleado").val(msg.emp_id);//empleado
                        if(msg.cambiocontrasena == "1"){
                            $("#cambiocontrasena").is(":checked");
                        }
                    })
                    .fail(function(msg){
                        alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                        $("input[type='text'], select").val();
                    })
        }else{
            window.location = "<?php echo  base_url("index.php/administrativo/listadousuarios"); ?>";
        }   
        
    });

    $('#cargo').change(function () {

        $.post(
                "<?php echo base_url("index.php/administrativo/consultausuarioscargo") ?>",
                {
                    cargo: $(this).val()
                }
        ).done(function (msg) {
            var data = "";
            $('#empleado *').remove();
            $.each(msg, function (key, val) {
                data += "<option value='" + val.Emp_Id + "'>" + val.Emp_Nombre + " " + val.Emp_Apellidos + "</option>"
            });
            $('#empleado').append(data);
        }).fail(function (msg) {

        })
    });

    $('#guardar').click(function () {
        var campousuid = $("#usuid").val();
        if(campousuid == ""){
            var url = "<?php echo base_url('index.php/administrativo/guardarusuario'); ?>";
        }else{
            var url = "<?php echo base_url('index.php/administrativo/actualizarusuario'); ?>";
        }
        if (obligatorio('obligatorio') == true) {
            $.post(url,$('#f3').serialize()).
                done(function (msg) {
                    alerta("verde", "Datos guardados correctamente");
                    if (confirm("¿Desea Guardar otro usuario?")) {
                        $('select,input').val('');
                        $('input[type="checkbox"]').attr("checked", false)
                        $('#empleado *').remove();
                    } else {
                        window.location.href = '<?php echo base_url("index.php/administrativo/listadousuarios") ?>';
                    }
                })
                .fail(function (msg) {
                    alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                });
        }
    });
</script>    