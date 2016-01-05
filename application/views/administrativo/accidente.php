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
                <label for="empresa">Empleado:</label>  
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <select name="empleado" id="empleado" class="form-control">
                    <option value="">::Seleccionar::</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <label for="lugar">Lugar:</label>  
            </div>
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <input type="text" name="lugar" id="lugar" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <label for="area">Area:</label>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <input type="text" name="area" id="area" class="form-control">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <label for="zona">Zona:</label>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <input type="text" name="zona" id="zona" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <label for="jefe">Jefe Inmediato:</label>
            </div>
            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <input type="text" name="jefe" id="jefe" class="form-control">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label>1. Tipo de Evento:</label>
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
                        <input type="radio" name="tipo" value="<?php echo $tipo_evento->tipEve_id; ?>"> <b><?php echo $tipo_evento->tipEve_descripcion;  ?></b>
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
                <label for="sitio">7. Sitio o Lugar del Accidente: </label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" name="sitio" id="sitio" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-3 control-label">8. Hora y Fecha del Accidente</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="accidenteHora" placeholder="HH:MM" >
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control fecha" name="accidenteFecha" placeholder="Fecha" readonly="">
                </div>
                <label class="col-sm-2 control-label" for="accidenteReportado">10. Accidente reportado por(nombre):</label>
                <div class="col-sm-4">
                    <select name="accidenteReportado" class="form-control" id="accidenteReportado">
                        <option value="">::Seleccionar::(empleado)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="descripcion">11. Descripción de lo ocurrido:<i>(posición,personas,partes,documentos)</i></label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
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
                        <input type="checkbox" name="tipoRiesgo[]" value="<?php echo $tipo_riesgo->rieCla_id; ?>"> <b><?php echo $tipo_riesgo->rieCla_categoria;  ?></b>
                    </label>
                </div>
            </div>
            <?php 
            $i = (($i == 3) ? 0 : $i+1);
            $j++;
            echo ($i == 0 || count($tipo_riesgos) == $j) ? "</div></div>":""; 
        endforeach; ?>
        <hr />
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
        <div class="row">
            <div class="form-group">
                <label for="fecharep" class="col-sm-2 control-label">13. Fecha del Reporte</label>
                <div class="col-sm-9">
                    <input type="date" name="fecharep" class="fecha form-control" placeholder="Fecha" readonly="readonly">
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
        var url = "";
        var datos = $("#formAccidente").serialize();
        
        $.post(url,datos)
                .done(function(msg){
                    alerta("verde","Guardado");
                    if(confirm("Desea generar otro accidente?")){
                        //window.location.href = "<?php echo base_url("index.php/Administrativo/accidente") ?>";
                    }
                })
                .fail(function(msg){
                    alerta("rojo","Error");
                })
        
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
    
</script>