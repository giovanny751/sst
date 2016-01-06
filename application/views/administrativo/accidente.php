<style type="text/css">
    #clasificacionRiesgo{
        background-color: #D7EBFC;
    }
    #clasificacionRiesgo > .hijoCategoria:hover{
        background-color: #C2E0FA;
    }
    
</style>
<div class="row">
    <div class="col-md-6">
        <div class="circuloIcon" id="guardarAccidente" title="Guardar"><i class="fa fa-floppy-o fa-3x"></i></div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tituloCuerpo">
            <span class="txtTitulo">
                <a href="<?php echo base_url("index.php/presentacion/principal") ?>">HOME</a>/
                <a href="<?php echo base_url("index.php/administrativo/empresa") ?>">EMPRESA</a>/
                ACCIDENTES</span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <form id="formAccidente" method="post">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <center>
                    <label><b>A. INFORMACIÓN GENERAL</b></label>
                </center>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <label for="empresa"><span class="campoobligatorio">*</span>Empleado:</label>  
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select name="empleado" id="empleado" class="form-control obligatorio">
                    <option value="">::Seleccionar::</option>
                    <?php foreach($empleados as $empleado): ?>
                        <option value="<?php echo $empleado->Emp_Id ?>"><?php echo $empleado->Emp_Nombre." ".$empleado->Emp_Apellidos ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <label for="lugar"><span class="campoobligatorio">*</span>Lugar</label>  
            </div>
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <input type="text" name="lugar" id="lugar" class="form-control obligatorio">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <label for="dimension1"><span class="campoobligatorio">*</span><?php echo $empresa->Dim_id ?></label>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <select name="dimension1" id="dimension1" class="form-control obligatorio">
                    <option value="">::Seleccionar::</option>
                    <?php foreach($dimension as $d): ?>
                        <option value="<?php echo $d->dim_id; ?>"><?php echo $d->dim_descripcion ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <label for="dimension2"><?php echo $empresa->Dimdos_id ?></label>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <select name="dimension2" id="dimension2" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach($dimension2 as $d2): ?>
                        <option value="<?php echo $d2->dim_id; ?>"><?php echo $d2->dim_descripcion ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="zona" class="col-sm-1 control-label"><span class="campoobligatorio">*</span>Zona</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control obligatorio" id="zona" name="zona" />
                </div>
                <label for="jefe" class="col-sm-1 control-label">Jefe Inmediato</label>
                <div class="col-sm-5">
                    <input type="text" name="jefe" id="jefe" class="form-control">
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <center>
                    <label><b>INCAPACIDAD</b></label>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="responsable" class="col-sm-1 control-label">Responsable</label>
                <div class="col-sm-2">
                    <select name="responsable" id="responsable" class="form-control">
                        <option value="">::Seleccionar::</option>
                        <?php foreach ($responsables as $responsable): ?>
                            <option value="<?php echo $responsable->empRes_id ?>"><?php echo $responsable->empRes_descripcion ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <label for="fechaInicioIncapacidad" class="col-sm-1 control-label">Fecha Inicio</label>
                <div class="col-sm-2">
                    <input type="date" class="fecha form-control" id="fechaInicioIncapacidad" name="fechaInicioIncapacidad" />
                </div>
                <label for="fechaFinIncapacidad" class="col-sm-1 control-label">Fecha Final</label>
                <div class="col-sm-2">
                    <input type="date" class="fecha form-control" id="fechaFinIncapacidad" name="fechaFinIncapacidad" />
                </div>
                <label for="diasIncapacidad" class="col-sm-1 control-label">Dias Incapacidad</label>
                <div class="col-sm-2">
                    <input style="text-align: center;" type="text" class="form-control" id="diasIncapacidad" disabled="" />
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label><span class="campoobligatorio">*</span>1. Tipo de Evento:</label>
            </div>
        </div>
        <?php 
        $i = 0; 
        $j = 0;
        foreach($tipo_eventos as $tipo_evento): 
            echo ($i == 0) ? "<div class='row'><div class='col-sm-offset-1 form-group'>":""; ?>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label>
                        <input type="radio" class="radioObligatorio" name="tipo" value="<?php echo $tipo_evento->tipEve_id; ?>"> <b><?php echo $tipo_evento->tipEve_descripcion;  ?></b>
                    </label>
                </div>
            </div>
            <?php 
            $i = (($i == 3) ? 0 : $i+1);
            $j++;
            echo ($i == 0 || count($tipo_eventos) == $j) ? "</div></div>":""; 
        endforeach; ?>
        <hr />
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label>2. Clase de Eventos:</label>
            </div>
        </div>
        <?php 
        $i = 0; 
        $j = 0;
        foreach($clases_eventos as $clase_evento): 
            echo ($i == 0) ? "<div class='row'><div class='col-sm-offset-1 form-group'>":""; ?>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="claseEventos[]" value="<?php echo $clase_evento->claEve_id; ?>"> <b><?php echo $clase_evento->claEve_descripcion;  ?></b>
                    </label>
                </div>
            </div>
            <?php 
            $i = (($i == 3) ? 0 : $i+1);
            $j++;
            echo ($i == 0 || count($clases_eventos) == $j) ? "</div></div>":""; 
        endforeach; ?>
        <hr />
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <center>
                    <label><b>B. DESCRIPCIÓN DEL ACCIDENTE</b></label>
                </center>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label>6. Parte del Cuerpo Afectada:</label>
            </div>
        </div>
        <?php 
        $i = 0; 
        $j = 0;
        foreach($partes_del_cuerpo as $parte_del_cuerpo): 
            echo ($i == 0) ? "<div class='row'><div class='col-sm-offset-1 form-group'>":""; ?>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="parteCuerpo[]" value="<?php echo $parte_del_cuerpo->parCue_id; ?>"> <b><?php echo $parte_del_cuerpo->parCue_descripcion;  ?></b>
                    </label>
                </div>
            </div>
            <?php 
            $i = (($i == 3) ? 0 : $i+1);
            $j++;
            echo ($i == 0 || count($partes_del_cuerpo) == $j) ? "</div></div>":""; 
        endforeach; ?>
        <hr />
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="sitio"><span class="campoobligatorio">*</span>7. Sitio o Lugar del Accidente: </label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" name="sitio" id="sitio" class="form-control obligatorio">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-3 control-label"><span class="campoobligatorio">*</span>8. Hora y Fecha del Accidente</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control fecha obligatorio" name="accidenteFecha" placeholder="Fecha">
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control obligatorio" name="accidenteHora" placeholder="HH:MM" >
                </div>
                <label class="col-sm-2 control-label" for="accidenteReportado"><span class="campoobligatorio">*</span>10. Accidente reportado por(nombre):</label>
                <div class="col-sm-4">
                    <input type="text" name="accidenteReportado" id="accidenteReportado" class="form-control obligatorio" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="descripcion"><span class="campoobligatorio">*</span>11. Descripción de lo ocurrido:<i>(posición,personas,partes,documentos)</i></label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <textarea id="descripcion" name="descripcion" class="form-control obligatorio"></textarea>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label>12. Tipo de Riesgo:</label>
            </div>
        </div>
        <?php 
        $i = 0; 
        $j = 0;
        foreach($tipo_riesgos as $tipo_riesgo): 
            echo ($i == 0) ? "<div class='row'><div class='col-sm-offset-1 form-group'>":""; ?>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label>
                        <input class="tipoRiesgo" type="checkbox" name="tipoRiesgo[]" value="<?php echo $tipo_riesgo->rieCla_id; ?>"> <b><?php echo $tipo_riesgo->rieCla_categoria;  ?></b>
                    </label>
                </div>
            </div>
            <?php 
            $i = (($i == 3) ? 0 : $i+1);
            $j++;
            echo ($i == 0 || count($tipo_riesgos) == $j) ? "</div></div>":""; 
        endforeach; ?>
        <hr />
        <div id="clasificacionRiesgo"></div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <center>
                    <label><b>C. INFORMACIÓN DEL REPORTE</b></label>
                </center>
            </div> 
        </div>
        <hr />
        <div id="correoAdicional">
            <div class="row">
                <div class="form-group">
                    <label for="correo" class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="correo[]" id="correo" placeholder="Correo">
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-success agregarCorreo"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<br>
<br>
<br>
<script type="text/javascript">
    $("#guardarAccidente").click(function(){
        
        var radio = false;
        $(".radioObligatorio").each(function(indice,campo){
            if($(this).is(':checked')){
                radio = true;
            }
        });
        
        if(obligatorio("obligatorio") && radio ){
            var url = "<?php echo base_url("index.php/Administrativo/guardarAccidente"); ?>";
            var datos = $("#formAccidente").serialize();
            $(".radioObligatorio").parent().removeClass("obligado");
            $.post(url,datos)
                    .done(function(msg){
                        alerta("verde","Guardado");
                        if(confirm("Desea generar otro accidente?")){
                            //window.location.href = "<?php echo base_url("index.php/Administrativo/accidente") ?>";
                            $(":input","#formAccidente").not(":button, :submit, :reset, :hidden").val("").removeAttr("checked").removeAttr("selected")
                        }
                    })
                    .fail(function(msg){
                        alerta("rojo","Error");
                    })
        }else if(radio == false){
            $(".radioObligatorio").parent().addClass("obligado");
        }else{
            $(".radioObligatorio").parent().removeClass("obligado");
        }
        
    });
    $("body").on("click",".agregarCorreo",function(){
        var html = "";
        html += "<div class='row'>";
        html += "<div class='form-group'>";
        html += "<label for='correo' class='col-sm-2 control-label'>Correo</label>";
        html += "<div class='col-sm-9'>";
        html += "<input type='email' class='form-control' name='correo[]' id='correo' placeholder='Correo'>";
        html += "</div>";
        html += "<div class='col-sm-1'>";
        html += "<button type='button' class='btn btn-danger eliminarCorreo'><i class='fa fa-times'></i></button>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        $("#correoAdicional").append(html);
    });
    $("body").on("click",".eliminarCorreo",function(){
        $(this).parents("div.row")[0].remove();
    });
    
    var numFila = 0;
    
    $("body").on("click",".tipoRiesgo",function(){
        if($(this).is(":checked")){
            var check = $(this);
            var url = "<?php echo base_url("index.php/Administrativo/consultaClasificacion"); ?>";
            var datos = {riesgo:$(this).val()};
            var html = "";
            $.post(url,datos)
                    .done(function(msg){
                        var i = 0;
                        var j = 0;
                        numFila++;
                        check.attr("fila",numFila);
                        if(msg.length > 0){
                            html += "<div class='hijoCategoria' fila='"+numFila+"'>"
                            html += "<div class='row'>";
                            html += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                            html += "<center><label>"+msg[0]["categoria"]+"</label></center>";
                            html += "</div>";
                            html += "</div>";
                            $.each(msg,function(index,valor){
                                html += ((i == 0) ? "<div class='row'><div class='col-sm-offset-1 form-group'>":"");
                                html += "<div class='col-sm-3'>";
                                html += "<div class='checkbox'>";
                                html += "<label>"
                                html += "<input type='checkbox' name='dato"+valor.clasificacion+"[]' value='" + valor.clasificacion_id +"'> <b>"+ valor.tipo +"</b>";
                                html += "</label>";
                                html += "</div>";
                                html += "</div>";
                                i = ((i == 3) ? 0 : (i+1))
                                j++;
                                html += (( (i == 0) || (msg.length == j) ) ? "</div></div>" : "" );
                            });
                            html += "<hr />"
                            html += "</div>"
                            $("#clasificacionRiesgo").append(html);
                        }else{
                            console.info("No hay Datos")
                        }
                    })
                    .fail(function(msg){
                        alerta("rojo","error")
                    })
        }else{
            var posicion = $(this).attr("fila");
            $(".hijoCategoria[fila='"+posicion+"']").remove();
        }
    });
    
    
</script>