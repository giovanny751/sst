<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>CREACIÓN EMPLEADO
    </h5>
</div>
<div class='well'>
    <form method="post" id="f1">
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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <input type="text" id="cedula" name="cedula" class="form-control obligatorio" value="<?php echo (!empty($empleado[0]->Emp_Cedula)) ? $empleado[0]->Emp_Cedula : ""; ?>" />
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="tipocontrato"><span class="campoobligatorio">*</span>Tipo Contrato</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select id="tipocontrato" name="tipocontrato" class="form-control obligatorio"  >
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($tipocontrato as $tp) { ?>
                        <option <?php echo (!empty($empleado[0]->TipCon_Id) && $empleado[0]->TipCon_Id == $tp->TipCon_Id) ? "selected" : ""; ?> value="<?php echo $tp->TipCon_Id ?>"><?php echo $tp->TipCon_Descripcion; ?></option>
                    <?php } ?>
                </select>
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="nombre"><span class="campoobligatorio">*</span>Nombres</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <input type="text" id="nombre" name="nombre" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_Nombre)) ? $empleado[0]->Emp_Nombre : ""; ?>" />
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="fechainiciocontrato"><span class="campoobligatorio">*</span>Fecha Inicio Contrato</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <input type="text" name="fechainiciocontrato" id="fechainiciocontrato" class="form-control fecha obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_FechaInicioContrato)) ? $empleado[0]->Emp_FechaInicioContrato : ""; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="apellidos"><span class="campoobligatorio">*</span>Apellidos</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <input type="text" id="apellidos" name="apellidos" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_Apellidos)) ? $empleado[0]->Emp_Apellidos : ""; ?>"/>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="fechafincontrato">Fecha Fin Contrato</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <input type="text" name="fechafincontrato" id="fechafincontrato" class="form-control fecha"  value="<?php echo (!empty($empleado[0]->Emp_FechaFinContrato)) ? $empleado[0]->Emp_FechaFinContrato : ""; ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="sexo"><span class="campoobligatorio">*</span>Genero</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select name="sexo" id="sexo" class="form-control obligatorio">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($sexo as $s) { ?>
                        <option  <?php echo (!empty($empleado[0]->sex_Id) && $empleado[0]->sex_Id == $s->Sex_id) ? "selected" : ""; ?> value="<?php echo $s->Sex_id ?>"><?php echo $s->Sex_Sexo ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="planobligatoriodesalud"><span class="campoobligatorio">*</span>Plan Obligatorio de Salud</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <input type="text" name="planobligatoriodesalud" id="planobligatoriodesalud" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_PlanObligatorioSalud)) ? $empleado[0]->Emp_PlanObligatorioSalud : ""; ?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="fechadenacimiento"><span class="campoobligatorio">*</span>Fecha Nacimiento</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="fechadenacimiento" name="fechadenacimiento" class="form-control fecha obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_FechaNacimiento)) ? $empleado[0]->Emp_FechaNacimiento : ""; ?>"/>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="fechaafiliacionarl"><span class="campoobligatorio">*</span>Fecha Afiliacion ARL</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <input type="text" id="fechaafiliacionarl" name="fechaafiliacionarl" class="form-control fecha obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_FechaAfiliacionArl)) ? $empleado[0]->Emp_FechaAfiliacionArl : ""; ?>" />
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="estatura"><span class="campoobligatorio">*</span>Estatura</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <input type="text" id="estatura" name="estatura" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_Estatura)) ? $empleado[0]->Emp_Estatura : ""; ?>"/>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="fondo">Fondo de Pensiones</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <input type="text" id="fondo" name="fondo" class="form-control"  value="<?php echo (!empty($empleado[0]->emp_fondo)) ? $empleado[0]->emp_fondo : ""; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="peso">Peso</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="peso" name="peso" class="form-control"  value="<?php echo (!empty($empleado[0]->Emp_Peso)) ? $empleado[0]->Emp_Peso : ""; ?>" />
            </div> 
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="nombreaseguradora">Nombre Aseguradora</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <select id="nombreaseguradora" name="nombreaseguradora" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach($aseguradoras as $a){ ?>
                    <option <?php echo (!empty($datos[0]->ase_id) && $a->ase_id == $datos[0]->ase_id )?"selected":"";?>  value="<?php echo $a->ase_id ?>"><?php echo $a->ase_nombre ?></option>
                    <?php } ?>
                </select>
            </div>  
                
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="telefono">Teléfono</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="telefono" name="telefono" class="form-control number "  value="<?php echo (!empty($empleado[0]->Emp_Telefono)) ? $empleado[0]->Emp_Telefono : ""; ?>" />
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="tipoaseguradora">Tipo Aseguradora</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select id="tipoaseguradora" name="tipoaseguradora" class="form-control">
                    <option value="">::Seleccionar::</option>
                </select>
            </div>   
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="direcion"><span class="campoobligatorio">*</span>Dirección</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="direcion" name="direccion" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_Direccion)) ? $empleado[0]->Emp_Direccion : ""; ?>" />
            </div>  
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="contacto"><span class="campoobligatorio">*</span>Contacto</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="contacto" name="contacto" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_Contacto)) ? $empleado[0]->Emp_Contacto : ""; ?>" />
            </div>  
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="telefonocontacto">Teléfono Contacto</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="telefonocontacto" name="telefonocontacto" class="form-control number"  value="<?php echo (!empty($empleado[0]->Emp_TelefonoContacto)) ? $empleado[0]->Emp_TelefonoContacto : ""; ?>" />
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="dimension1">Dimensión1</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select id="dimension1" name="dimension1" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($dimension as $d) { ?>
                        <option  <?php echo (!empty($empleado[0]->Dim_id) && $empleado[0]->Dim_id == $d->dim_id) ? "selected" : ""; ?> value="<?php echo $d->dim_id ?>"><?php echo $d->dim_descripcion ?></option>
                    <?php } ?>
                </select>
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="email"><span class="campoobligatorio">*</span>Email</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" id="email" name="email" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_Email)) ? $empleado[0]->Emp_Email : ""; ?>" />
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="dimension2">Dimensión2</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select id="dimension2" name="dimension2" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($dimension2 as $d2) { ?>
                        <option  <?php echo (!empty($empleado[0]->Dim_IdDos) && $empleado[0]->Dim_IdDos == $d2->dim_id) ? "selected" : ""; ?> value="<?php echo $d2->dim_id ?>"><?php echo $d2->dim_descripcion ?></option>
                    <?php } ?>
                </select>
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="estadocivil"><span class="campoobligatorio">*</span>Estado Civil</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <select id="estadocivil" name="estadocivil" class="form-control obligatorio">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($estadocivil as $ec) { ?>
                        <option  <?php echo (!empty($empleado[0]->EstCiv_id) && $empleado[0]->EstCiv_id == $ec->EstCiv_id) ? "selected" : ""; ?> value="<?php echo $ec->EstCiv_id ?>"><?php echo $ec->EstCiv_Estado ?></option>
                    <?php } ?>
                </select>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="cargo"><span class="campoobligatorio">*</span>Cargo</label>
            </div>    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select id="cargo" name="cargo" class="form-control obligatorio">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($cargo as $c) { ?>
                        <option  <?php echo (!empty($empleado[0]->Car_id) && $empleado[0]->Car_id == $c->car_id) ? "selected" : ""; ?> value="<?php echo $c->car_id ?>"><?php echo $c->car_nombre ?></option>
                    <?php } ?>
                </select>
            </div>    
        </div>
        <input type="hidden" id="emp_id" name="emp_id"  value="<?php echo (!empty($empleado[0]->Emp_Id)) ? $empleado[0]->Emp_Id : ""; ?>" />
    </form>
    <div class="row" style="text-align:center">
            <button type="button" id="actualizar"  class="btn btn-success">Actualizar</button>   
            <button type="button" id="btnRegistro" class="btn btn-info registro">Registro exámenes</button>
            <button type="button" id="guardar" class="btn btn-success">Guardar</button>
    </div>
</div>
<script>
    $(function(){
        //$("#actualizar").hide();
        <?php if (!empty($empleado[0])) { ?>
            $("#btnRegistro").hide();
            $("#guardar").hide();
            $("#actualizar").show();
        <?php }else{ ?>
            $("#actualizar").hide();
        <?php } ?>
    });
    $(".flecha").click(function(){
        var url = "<?php echo base_url("index.php/administrativo/consultaempleadoflechas") ?>";
        var idEmpleadoCreado = $("#emp_id").val();
        var metodo = $(this).attr("metodo");
        var activoActualizar = $("#actualizar").attr("activo");
        $("#actualizar").show();
        $("#btnRegistro").hide();
        $("#guardar").hide();
        if(metodo != "documento"){
            $.post(url,{idEmpleadoCreado:idEmpleadoCreado,metodo:metodo})
                    .done(function(msg){
                        console.log(msg);
                        $("input[type='text'], select").val();
                        $("#emp_id").val(msg.Emp_Id);
                        $("#cedula").val(msg.Emp_Cedula);
                        $("#nombre").val(msg.Emp_Nombre);
                        $("#apellidos").val(msg.Emp_Apellidos);
                        $("#sexo").val(msg.sex_Id);
                        $("#fechadenacimiento").val(msg.Emp_FechaNacimiento);
                        $("#estatura").val(msg.Emp_Estatura);
                        $("#peso").val(msg.Emp_Peso);
                        $("#telefono").val(msg.Emp_Telefono);
                        $("#direcion").val(msg.Emp_Direccion);
                        $("#contacto").val(msg.Emp_contacto);
                        $("#telefonocontacto").val(msg.Emp_TelefonoContacto);
                        $("#email").val(msg.Emp_Email);
                        $("#estadocivil").val(msg.EstCiv_id);
                        $("#tipocontrato").val(msg.TipCon_Id);
                        $("#fechainiciocontrato").val(msg.Emp_FechaInicioContrato);
                        $("#fechafincontrato").val(msg.Emp_FechaFinContrato);
                        $("#planobligatoriodesalud").val(msg.Emp_PlanObligatorioSalud);
                        $("#fechaafiliacionarl").val(msg.Emp_FechaAfiliacionArl);
                        $("#fondo").val(msg.emp_fondo);
                        $("#nombreaseguradora").val(msg.Ase_Id);
                        $("#tipoaseguradora").val(msg.TipAse_Id);
                        $("#dimension1").val(msg.Dim_id);
                        $("#dimension2").val(msg.Dim_IdDos);
                        $("#cargo").val(msg.Car_id);
                        if($("#emp_id").val() == ""){
                            $("#actualizar").hide();
                            $("#btnRegistro").show();
                            $("#guardar").show();
                        }

                    })
                    .fail(function(msg){
                        alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                        $("input[type='text'], select").val();
                        $("#actualizar").hide();
                        $("#btnRegistro").show();
                        $("#guardar").show();
                    })
        }else{
            window.location = "<?php echo  base_url("index.php/administrativo/listadoempleados"); ?>";
        }   
        
    });
    
    
    $('#nombreaseguradora').change(function(){
        var id = $(this).val();
        $.post("<?php echo base_url("index.php/administrativo/consultatipoaseguradoras") ?>",
        { id : id })
                .done(function(msg){
                    $('#tipoaseguradora *').remove();
                    var aseguradora = "";
                    $.each(msg,function(key,val){
                        aseguradora += "<option value='"+val.TipAse_Id+"'>"+val.TipAse_Nombre+"</option>"
                    });
                    $('#tipoaseguradora').append(aseguradora);
                })
                .fail(function(msg){
            
        });
        
    });
    
    $('#guardar').click(function () {

        if (obligatorio('obligatorio') == true)
        {
            $.post("<?php echo base_url('index.php/administrativo/guardarempleado') ?>",
                    $('#f1').serialize()
                    )
                    .done(function (msg) {
                        alerta("verde", "Guardado Correctamente");
//                        if (confirm("¿Desea Guardar otro Empleado?")) {
//                            $('select,input').val('');
//                            $('input[type="checkbox"]').attr("checked", false)
//                            $('#tipoaseguradora *').remove();
//                        } else {
//                            window.location.href = '<?php echo base_url("index.php/administrativo/listadoempleados") ?>';
//                        }
                    }).fail(function (msg) {
                alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
            });
        }
    });
    $('#actualizar').click(function () {

        if (obligatorio('obligatorio') == true)
        {
            $.post("<?php echo base_url('index.php/administrativo/guardaractualizacion') ?>",
                    $('#f1').serialize()
                    )
                    .done(function (msg) {
                        alerta("verde", "Guardado Correctamente");
                    }).fail(function (msg) {
                alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
            });
        }
    });
</script>    