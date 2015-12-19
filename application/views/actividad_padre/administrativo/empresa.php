<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>EMPRESA
    </h5>
</div>
<div class='well'>
    <div class="row">
        <form method="post" id="f5" enctype="multipart/form-data" action="<?php echo base_url("index.php/administrativo/guardarempresa") ?>" >
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="row">
                    <label for="nit">
                        <span class="campoobligatorio">*</span>Nit
                    </label>
                    <input type="text" id="nit" name="nit"  class="form-control obligatorio" value="<?php echo $informacion[0]->emp_nit ?>"/>

                </div>
                <div class="row">
                    <label for="razonsocial">
                        <span class="campoobligatorio">*</span>Razón social</label>
                    <input type="text" id="razonsocial" name="razonsocial" class="form-control obligatorio" value="<?php echo $informacion[0]->emp_razonSocial ?>"/>
                </div>
                <div class="row">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $informacion[0]->emp_direccion ?>" />
                </div>
                <div class="row">
                    <label for="ciudad">Ciudad</label>
                    <select id="ciudad" name="ciudad" class="form-control" >
                        <option value="">::Seleccionar::</option>
                        <?php foreach($ciudad as $c){?>
                        <option value="<?php echo $c->ciu_id?>"><?php echo $c->ciu_nombre ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="row">
                    <label for="tamano">
                        <span class="campoobligatorio">*</span>Tamaño</label>
                    <select id="tamano" name="tamano" class="form-control obligatorio" >
                        <option value="">::Seleccionar::</option>
                        <?php foreach ($tamano as $t) { ?>
                            <option <?php echo ($t->TamEmp_tamano == $informacion[0]->tam_id ) ? "selected" : ""; ?>  value="<?php echo $t->TamEmp_tamano ?>"><?php echo $t->TamEmp_descripcion ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row">
                    <label for="empleados">
                        <span class="campoobligatorio">*</span>Numero de empleados</label>
                    <input type="text" id="empleados" name="empleados" class="form-control obligatorio" >
<!--                    <select id="empleados" name="empleados" class="form-control obligatorio" >
                        <option value="">::Seleccionar::</option>
                        <?php // foreach ($numero as $n) { ?>
                            <!--<option <?php echo ($n->numEmp_id == $informacion[0]->numEmp_id ) ? "selected" : ""; ?> value="<?php echo $n->numEmp_id ?>"><?php echo $n->numEmp_descripcion ?></option>-->
                        <?php // } ?>
                    <!--</select>-->
                </div>
                <div class="row">
                    <label for="actividadeconomica">
                        <span class="campoobligatorio">*</span>Actividad Economica</label>
                    <input type="text" id="actividadeconomica" name="actividadeconomica" class="form-control obligatorio"  value="<?php echo $informacion[0]->actEco_id ?>"/>
                </div>
            </div>
            <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-5">  
                <div class="row">
                    <label for="dimension1">Dimensión 1</label>
                    <input type="text" id="dimension1" name="dimension1" class="form-control" /> 
                </div>
                <div class="row">
                    <label for="dimension2">Dimensión 2</label>
                    <input type="text" id="dimension2" name="dimension2" class="form-control" >
                </div>
                <div class="row">
                    <label for="representante">Representante</label>
                    <input type="text" checked="" id="representante" name="representante" class="form-control"  value="<?php echo $informacion[0]->emp_representante ?>"/>
                </div>
                <div class="row">
                    <label for="representante">Logo</label>
                    <input type="file" id="userfile" name="userfile" class="form-control" />
                </div>
            </div>
            <div class="row">
                
            </div>
            <div class="row" style="text-align:center">
                <input type="submit" id="guardar" class="btn btn-success" value="Guardar">
            </div>
        </form>
    </div>
    <div class="row" style="text-align: center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Empresa</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" >Empleados</button>
        <button type="button" class="btn btn-primary" >Tipos de Contrato</button>
        <a href="<?php echo base_url("index.php/administrativo/dimension") ?>"><button type="" class="btn btn-info">Dimensión 1</button></a>
        <a href="<?php echo base_url("index.php/administrativo/dimension") ?>"><button type="" class="btn btn-info">Dimensión 2</button></a>
        <button type="button" id="guardar" class="btn btn-success">Guardar</button>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Empresa</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label>Dirigir a:</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <select class="form-control" id="direccionar">
                            <option value="1">Ver cargos</option>
                            <option value="2">Ver organigrama</option>
                            <option value="3">Ver empleados</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary dirigir">Dirigir</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Empleados:</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label>Dirigir a:</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <select class="form-control" id="direccionar">
                            <option value="1">Ver Empleados</option>
                            <option value="2">Importar empleados</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary dirigir">Dirigir</button>
            </div>
        </div>
    </div>
</div>
<script>

    $('.dirigir').click(function(){
        
        if($('#direccionar').val() == 1) window.location.href = '<?php echo base_url("index.php/administrativo/cargos") ?>';
        if($('#direccionar').val() == 2) window.location.href = '<?php echo base_url("index.php/administrativo/organigrama") ?>';
        if($('#direccionar').val() == 3) window.location.href = '<?php echo base_url("index.php/administrativo/creacionempleados") ?>';
        
    });

    $('#guardar').click(function () {
        return obligatorio('obligatorio') == true
    });

</script>