<div class="row">
    <div class="col-md-6">
        <div class="circuloIcon" id="<?php echo (empty($rie_id)) ? "guardar" : "actualizar"; ?>" title="<?php echo (empty($rie_id)) ? "Guardar" : "Actualizar"; ?>"><i class="fa fa-floppy-o fa-3x"></i></div>
        <!-- <div class="circuloIcon" title="Actualizar "><i class="fa fa-pencil-square-o fa-3x"></i></div>-->
        <!--<div class="circuloIcon" ><i class="fa fa-trash-o fa-3x"></i></div>-->
        <a href="<?php echo base_url() . "/index.php/riesgo/nuevoriesgo" ?>"><div class="circuloIcon" title="Nuevo Riesgo" ><i class="fa fa-folder-open fa-3x"></i></div></a>
    </div>
    <div class="col-md-6">
        <div id="posicionFlecha">
            <div class="flechaHeader IzquierdaDoble" metodo="flechaIzquierdaDoble"><i class="fa fa-step-backward fa-2x"></i></div>
            <div class="flechaHeader Izquierda" metodo="flechaIzquierda"><i class="fa fa-arrow-left fa-2x"></i></div>
            <div class="flechaHeader Derecha" metodo="flechaDerecha"><i class="fa fa-arrow-right fa-2x"></i></div>
            <div class="flechaHeader DerechaDoble" metodo="flechaDerechaDoble"><i class="fa fa-step-forward fa-2x"></i></div>
            <div class="flechaHeader Archivo" metodo="documento"><i class="fa fa-sticky-note fa-2x"></i></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tituloCuerpo">
            <span class="txtTitulo">RIESGO</span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <div class="row">
        <form method="post" id="riesgos">
            <div class="col-lg-6 col-md-6 col-sx-6 col-sm-6 ">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="descripcion"><span class="campoobligatorio">*</span>Descripción</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 "> 
                        <input type="text" name="descripcion" id="descripcion" class="form-control obligatorio" value="<?php echo ((!empty($riesgo->rie_descripcion)) ? $riesgo->rie_descripcion : ""); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="categoria"><span class="campoobligatorio">*</span>Clasificación</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">
                        <select name="categoria" id="categoria" class="form-control obligatorio">
                            <option value="">::Seleccionar::</option>
                            <?php foreach ($categoria as $ca) { ?>
                                <option <?php echo (!empty($riesgo->rieCla_id) && $riesgo->rieCla_id == $ca->rieCla_id) ? "selected" : ""; ?> value="<?php echo $ca->rieCla_id ?>"><?php echo $ca->rieCla_categoria ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="tipo"><span class="campoobligatorio">*</span>Tipo</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">
                        <select class="form-control obligatorio" id="tipo" name="tipo" >
                            <option value="">::Seleccionar::</option>
                            <?php
                            if (!empty($rie_id)):
                                foreach ($tipo as $t):
                                    ?>
                                    <option <?php echo ((!empty($riesgo->rieClaTip_id)) && ($t->rieClaTip_id == $riesgo->rieClaTip_id)) ? "selected" : ""; ?> value="<?php echo $t->rieClaTip_id ?>"><?php echo $t->rieClaTip_tipo ?></option> <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="dimensionuno"><?php echo $empresa[0]->Dim_id ?></label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">
                        <select type="text" name="dimensionuno" id="dimensionuno" class="form-control" >
                            <option value="">::Seleccionar::</option>
                            <?php foreach ($dimension as $d1) { ?>
                                <option <?php echo ((!empty($riesgo->dim1_id)) && ($d1->dim_id == $riesgo->dim1_id)) ? "selected" : ""; ?> value="<?php echo $d1->dim_id; ?>"><?php echo $d1->dim_descripcion; ?></option>
<?php } ?>
                        </select> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="dimensiondos"><?php echo $empresa[0]->Dimdos_id ?></label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">
                        <select type="text" name="dimensiondos" id="dimensiondos" class="form-control" >
                            <option value="">::Seleccionar::</option>
                            <?php foreach ($dimension2 as $d2) { ?>
                                <option <?php echo ((!empty($riesgo->dim2_id)) && ($d2->dim_id == $riesgo->dim2_id) ? "selected" : "") ?> value="<?php echo $d2->dim_id ?>"><?php echo $d2->dim_descripcion ?></option>
<?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="zona">Lugar/Zona</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">
                        <input type="text" name="zona" id="zona" class="form-control" value="<?php echo ((!empty($riesgo->rie_zona)) ? $riesgo->rie_zona : ""); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="requisito">Requisito legal asociado</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">
                        <input type="text" name="requisito" id="requisito" class="form-control" value="<?php echo ((!empty($riesgo->rie_requisito)) ? $riesgo->rie_requisito : ""); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="observaciones">Observaciones</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">
                        <textarea name="observaciones" id="observaciones" class="form-control"><?php echo ((!empty($riesgo->rie_observaciones)) ? $riesgo->rie_observaciones : ""); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="estado">Estado aceptacion del riesgo</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">
                        <select name="estado" id="estado" class="form-control">
                            <option value="">::Seleccionar::</option>
                            <?php foreach ($estadoaceptacionxcolor as $ec): ?>
                                <option <?php echo ((!empty($riesgo->estAce_id)) && ($ec->estAce_id == $riesgo->estAce_id) ? "selected" : "") ?> value="<?php echo $ec->estAce_id ?>"><?php echo $ec->estAce_estado ?></option>
<?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="color">Color</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">
                        <select name="color" id="color" class="form-control">
                            <option value="">::Seleccionar::</option>
                            <?php
                            if (!empty($rie_id)):
                                foreach ($color as $co):
                                    ?>
                                    <option <?php echo ((!empty($riesgo->col_id)) && ($co->estAceCol_id == $riesgo->col_id) ? "selected" : "") ?> value="<?php echo $co->estAceCol_id; ?>"><?php echo $co->rieCol_color; ?></option> 
                                    <?php endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sx-6 col-sm-6 ">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="actividades"><span class="campoobligatorio">*</span>Actividades</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 ">   
                        <textarea name="actividades" id="actividades" class="form-control obligatorio"><?php echo ((!empty($riesgo->rie_actividad)) ? $riesgo->rie_actividad : ""); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="cargos">Cargos</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 "> 
                        <?php
                        if (!empty($rie_id)) {
                            foreach ($cargoId as $value) {
                                $select[] = $value->car_id;
                            }
                        } else {
                            $select[] = 0;
                        }
                        ?>
<?php echo listaMultiple2("cargo[]", "cargo", "form-control", "cargo", "car_id", "car_nombre", $select, array("cargo.est_id"=>1), null) ?> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sx-4 col-sm-4 ">
                        <label for="fecha">Fecha</label>
                    </div>    
                    <div class="col-lg-8 col-md-8 col-sx-8 col-sm-8 "> 
                        <input type="text" name="fecha" id="fecha" class="form-control fecha" value="<?php echo ((!empty($riesgo->rie_fecha)) ? $riesgo->rie_fecha : date("Y-m-d")); ?>">
                    </div>
                </div>
            </div>
            <input type="hidden" name="rie_id" id="rie_id" value="<?php echo (!empty($rie_id)) ? $rie_id : ""; ?>" />
        </form>
    </div>
<?php if (!empty($rie_id)): ?>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable tabbable-tabdrop">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#tab1">Tareas</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab2">Tareas inactivas</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab3">Avance de tareas</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab4">Gráfica de Grantt</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab4">Registros</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane active">
                            <table class="tablesst" id="datatable_ajax">
                                <thead >
                                <th>Editar</th>
                                <th>Nuevo avance</th>
                                <th>Avance</th>
                                <th>Tipo</th>
                                <th>Nombre de la Tarea</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Duración presupuestada (Horas)</th>
                                <th>Responsables</th>
                                </thead> 
                                <tbody>
    <?php if (empty($tareas)) { ?>
                                        <tr>
                                            <td colspan="9">
                                    <center>
                                        <b>
                                            No hay tareas asociadas al plan
                                        </b>
                                    </center>
                                    </td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($tareas as $tar) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center"><i class='fa fa-pencil btn btn-default editartarea' tar_id='<?php echo $tar->tar_id ?>' ></i></td>
                                            <td style="text-align: center"><i class='fa fa-bookmark-o btn btn-default nuevoavance' tar_id='<?php echo $tar->tar_id ?>' ></i></td>
                                            <td><?php echo $tar->progreso ?></td>
                                            <td><?php echo $tar->tip_tipo ?></td>
                                            <td><?php echo $tar->tar_nombre ?></td>
                                            <td><?php echo $tar->tar_fechaInicio ?></td>
                                            <td><?php echo $tar->tar_fechaFinalizacion ?></td>
                                            <td style="text-align:center"><?php echo $tar->diferencia ?></td>
                                            <td><?php echo $tar->Emp_Nombre ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab2" class="tab-pane">
                            <table class="tablesst" id="datatable_ajax2">
                                <thead>
                                <th>Nuevo Historial</th>
                                <th>Avance</th>
                                <th>Tipo</th>
                                <th>Nombre de la tarea</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Duración presupuestada</th>
                                <th>Responsables</th>
                                </thead>
                                <tbody >
    <?php foreach ($tareasinactivas as $ti): ?>
                                        <tr>
                                            <td><i class='fa fa-pencil btn btn-default editartarea' tar_id='<?php echo $ti->tar_id ?>' ></i></td>
                                            <td></td>
                                            <td><?php echo $ti->tip_tipo ?></td>
                                            <td><?php echo $ti->tar_nombre ?></td>
                                            <td><?php echo $ti->tar_fechaInicio ?></td>
                                            <td><?php echo $ti->tar_fechaFinalizacion ?></td>
                                            <td><?php echo $ti->diferencia ?>&nbsp;Días</td>
                                            <td><?php echo $ti->nombre ?></td>
                                        </tr>
    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab3" class="tab-pane">

                            <table class="tablesst">
                                <thead>
                                <th>Acción</th>
                                <th>Fecha</th>
                                <th>Resumen</th>
                                <th>Usuario</th>
                                <th>Horas</th>
                                <th>Costo</th>
                                <th>Comentarios</th>
                                </thead>
                                <tbody class="datatable_ajax12">
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                </tbody>
                            </table>   

                        </div>
                        <div id="tab4" class="tab-pane">
                            <div class="portlet box blue" style="margin-top: 30px;">
                                <div class="portlet-title">
                                    <div class="caption">

                                    </div>
                                    <div class="tools">
                                        <i class=" btn btn-default fa fa-folder-o carpeta" data-toggle="modal" data-target="#myModal4" ></i>

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tabbable tabbable-tabdrop">
                                        <div class="tab-content">
                                            <br>
                                            <div class="panel-group accordion" id="accordion5">
                                                <?php
                                                $o = 1;
                                                foreach ($carpeta as $idcar => $nomcar):
                                                    foreach ($nomcar as $nombrecar => $numcar):
                                                        ?>
                                                        <div class="panel panel-default" id="<?php echo $idcar ?>">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_<?php echo $idcar . 'r'; ?>" aria-expanded="false" id=""> 
                                                                        <i class="fa fa-folder-o carpeta"></i>&nbsp;<?php echo $nombrecar ?>
                                                                    </a>
                                                                    <div class="posicionIconoAcordeon">
                                                                        <i class="fa fa-file-archive-o nuevoregistro"  data-toggle="modal" data-target="#myModal15" car_id="<?php echo $idcar ?>"></i>
                                                                        <i class="fa fa-edit editarcarpeta" car_id="<?php echo $idcar ?>"></i>
                                                                        <i class="fa fa-times eliminarcarpeta" tipo="r" title="Eliminar" car_id="<?php echo $idcar ?>"></i>
                                                                    </div>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse_<?php echo $idcar . 'r'; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                                <div class="panel-body">
                                                                    <table class="tablesst">
                                                                        <thead>
                                                                        <th>Nombre de archivo</th>
                                                                        <th>Descripción</th>
                                                                        <th>Versión</th>
                                                                        <th>Responsable</th>
                                                                        <th>Tamaño</th>
                                                                        <th>Fecha</th>
                                                                        <th>Acción</th>
                                                                        </thead>
                                                                        <tbody>
            <?php foreach ($numcar as $numerocar => $campocar): ?>
                                                                                <tr>
                                                                                    <td><?php echo $campocar[0] ?></td>
                                                                                    <td><?php echo $campocar[1] ?></td>
                                                                                    <td><?php echo $campocar[2] ?></td>
                                                                                    <td><?php echo $campocar[3] ?></td>
                                                                                    <td><?php echo $campocar[4] ?></td>
                                                                                    <td><?php echo $campocar[5] ?></td>
                                                                                    <td>
                                                                                        <i class="fa fa-times fa-2x eliminarregistro btn btn-danger" title="Eliminar" reg_id="<?php echo $campocar[6] ?>"></i>
                                                                                        <i class="fa fa-pencil-square-o fa-2x modificarregistro btn btn-info" title="Modificar" reg_id="<?php echo $campocar[6] ?>" data-target="#myModal15" data-toggle="modal"></i>
                                                                                    </td>
                                                                                </tr>   
            <?php endforeach; ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $o++;
                                                    endforeach;
                                                endforeach;
                                                ?>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab5" class="tab-pane">

                        </div>
                        <div id="tab6" class="tab-pane">
                            <table class="tablesst">
                                <thead>
                                <th>Nombre archivo</th>
                                <th>Descripción</th>
                                <th>Versión</th>
                                <th>Responsable</th>
                                <th>Tamaño</th>
                                <th>Fecha</th>
                                <th>Accion</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p>   </p>
                <p>   </p>
                <div class="tabbable tabbable-tabdrop">
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">NUEVA CARPETA</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frmcarpetaregistro">
                            <input type="hidden" value="<?php echo (!empty($riesgo->rie_id)) ? $riesgo->rie_id : ""; ?>" name="rie_id" id="rie_id"/>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <label for="nombrecarpeta">Nombre</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <input type="text" id="nombrecarpeta" name="nombrecarpeta" class="form-control carbligatorio">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <label for="descripcioncarpeta">Descripción:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <input type="text" id="descripcioncarpeta" name="descripcioncarpeta" class="form-control carbligatorio">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" id="opcionescarpeta">
                        <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="guardarcarpeta">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="myModal15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">NUEVO REGISTRO</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="frmagregarregistro">
                                <input type="hidden" value="<?php echo (!empty($riesgo->rie_id)) ? $riesgo->rie_id : ""; ?>" name="rie_id" id="rie_id"/>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label for="idactividad">Carpeta:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <select id="carpeta" name="carpeta" class="form-control ">
                                            <option value="">::Seleccionar::</option>
                                            <?php foreach ($carpetas as $carp): ?>
                                                <option value="<?php echo $carp->regCar_id ?>"><?php echo $carp->regCar_nombre." ".$carp->regCar_descripcion ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label for="version">Versión:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <input type="text" id="version" name="version" class="form-control ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label for="reg_descripcion">Descripción:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <textarea id="reg_descripcion" name="reg_descripcion" class="form-control "></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label for="archivo">Adjuntar archivo:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <input type="file" id="archivo" name="archivo" class="form-control ">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnguardarregistro">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
<?php endif; ?>
</div>
<script>

    $('body').delegate(".eliminarcarpeta", "click", function() {
        if (confirm("Confirma la eliminación")) {
            var carpeta = $(this).attr("car_id");
            var tipo = $(this).attr("tipo");
            if ($(this).attr('tipo') == "r")
                var url = "<?php echo base_url("index.php/planes/eliminarcarpeta") ?>";
            else if ($(this).attr('tipo') == "c")
                var url = "<?php echo base_url("index.php/planes/eliminaractividad") ?>";
            $.post(url,
                    {carpeta: carpeta}
            ).done(function(msg) {
                $('a[href="#collapse_' + carpeta + tipo + '"]').parents('.panel-default').remove();
            }).fail(function(msg) {
                alerta("rojo", "Error, por favor comunicarse con el administrador del sistema");
            });
        }
    });
    $('body').delegate(".editarcarpeta", "click", function() {
        $.post(
                "<?php echo base_url("index.php/planes/cargarplanescarpeta") ?>",
                {carpeta: $(this).attr("car_id")}
        )
                .done(function(msg) {
                    if ($('#plaCar_id').length == 0)
                        $('#frmcarpetaregistro').append("<input type='hidden' value='" + msg.regCar_id + "' name='plaCar_id' id='plaCar_id' >");
                    $('#nombrecarpeta').val(msg.regCar_nombre);
                    $('#descripcioncarpeta').val(msg.regCar_descripcion);
                    $('#guardarcarpeta').replaceWith("<button type='button' empCar_id='" + msg.regCar_id + "' class='btn btn-primary modificarcarpeta'>Actualizar</button>");
                    $('#myModal4').modal("show");
                })
                .fail(function(msg) {
                    alerta("rojo", "Error,por favor comunicarse con el administrador del sistema");
                });

    });
    $('#guardarcarpeta').click(function() {
        if (obligatorio("carbligatorio")) {
            $.post("<?php echo base_url("index.php/planes/guardarcarpetaregistroriesgo") ?>",
                    $('#frmcarpetaregistro').serialize()
                    ).done(function(msg) {
                var option = "<option value='" + msg.uno + "'>" + msg.dos +" "+msg.tres+"</option>"
                var contenido = "<table class='tablesst'>\n\
                                        <thead>\n\
                                            <th>Nombre de archivo</th>\n\
                                            <th>Descripción</th>\n\
                                            <th>Versión</th>\n\
                                            <th>Responsable</th>\n\
                                            <th>Tamaño</th>\n\
                                            <th>Fecha</th>\n\
                                            <th>Acción</th>\n\
                                        </thead>\n\
                                        <tbody>\n\
                                            <tr>\n\
                                            <td colspan='6'>\n\
                                            <center><b>No hay registros asociados</b></center>\n\
                                            </td>\n\
                                            </tr>\n\
                                        </tbody>\n\
                                </table>";
                $('#carpeta').append(option);
                agregarregistro('accordion5', msg, contenido, 'r', 'editarcarpeta');
                $('.carbligatorio').val("");
                $('#myModal4').modal("toggle")
                alerta("verde", "Carpeta agregada con exito")
            }).fail(function(msg) {
                alerta("rojo", "ha ocurrido un error por favor cumunicarse con el administrador del sistema")
            });
        }
    });
    $('#btnguardarregistro').click(function() {
        var file_data = $('#archivo').prop('files')[0];
        var form_data = new FormData();
        form_data.append('archivo', file_data);
        form_data.append('rie_id', $('#rie_id').val());
        form_data.append('regCar_id', $('#carpeta').val());
        form_data.append('reg_version', $('#version').val());
        form_data.append('reg_descripcion', $('#reg_descripcion').val());
        $.ajax({
            url: '<?php echo base_url("index.php/planes/guardarregistroriesgo") ?>',
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(result) {

                $("#myModal15").modal("toggle");
                result = jQuery.parseJSON(result);
                var idcarpeta = $('#carpeta').val()
                $('#collapse_' + idcarpeta + 'r').find('table tbody *').remove();
                var filas = "";
                $.each(result, function(key, val) {
                    filas += "<tr>";
                    filas += "<td>" + val.reg_archivo + "</td>";
                    filas += "<td>" + val.reg_descripcion + "</td>";
                    filas += "<td>" + val.reg_version + "</td>";
                    filas += "<td>" +val.usu_nombre +" "+val.usu_apellido +"</td>";
                    filas += "<td>" + val.reg_tamano + "</td>";
                    filas += "<td>" + val.reg_fechaCreacion + "</td>";
                    filas += "<td>";
                    filas += "<i class='fa fa-times fa-2x eliminarregistro btn btn-danger' title='Eliminar' reg_id='" + val.reg_id + "'></i>";
                    filas += "<i class='fa fa-pencil-square-o fa-2x modificarregistro btn btn-info' title='Modificar' reg_id='" + val.reg_id + "'  data-target='#myModal15' data-toggle='modal'></i>";
                    filas += "</td>";
                    filas += "</tr>";
                });
                $('#collapse_' + idcarpeta + 'r').find('table tbody').append(filas)
                $('#carpeta').val('');
                $('#version').val('');
                $('#reg_descripcion').val('');
                $('#archivo').val('');
                alerta('verde', 'Registro guardado con exito.');
            }
        });
    });
    function agregarregistro(tabla, msg, contenido, destino, clase) {
        var acordeon = '<div class="panel panel-default" id="' + msg.uno + '">\n\
                                            <div class="panel-heading">\n\
                                                <h4 class="panel-title">\n\
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_' + msg.uno + destino + '" aria-expanded="false">\n\
                                                        <i class="fa fa-folder-o carpeta"></i> ' + msg.dos + " - " + msg.tres + '\n\
                                                    </a>\n\
                                                    <div class="posicionIconoAcordeon">';
                                                        if (destino == 'c')
                                                            acordeon += '<i class="fa fa-file-o carpeta nuevo_hijo" data-toggle="modal" data-target="#myModal8" title="ACTIVIDAD HIJO" car_id="' + msg.uno + '"></i> ';
                                                        if (destino == 'r')
                                                            acordeon += '<i class="fa fa-file-archive-o nuevoregistro"   data-toggle="modal" data-target="#myModal15" car_id="' + msg.uno + '"></i> ';

                                                        acordeon += '<i class="fa fa-edit ' + clase + '" car_id="' + msg.uno + '"></i>\n\
                                                        <i class="fa fa-times eliminarcarpeta" title="Eliminar" tipo="' + destino + '" car_id="' + msg.uno + '"></i>\n\
                                                    </div>\n\
                                                </h4>\n\
                                            </div>\n\
                                            <div id="collapse_' + msg.uno + destino + '" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">\n\
                                                <div class="panel-body">\n\
                                                    ' + contenido + '\n\
                                                </div>\n\
                                            </div>\n\
                                    </div>';
        $('#' + tabla).append(acordeon);
    }
    
    $('document').ready(function () {
        $('body').delegate(".editarhistorial", "click", function () {

            var form = "<form method='post' id='frmFormAvance' action='<?php echo base_url("index.php/tareas/nuevatarea") ?>'>";
            form += "<input type='hidden' name='avaTar_id' value='" + $(this).attr("avaTar_id") + "'>"
            form += "<input type='hidden' name='tar_id' value='" + $(this).attr("tar_id") + "'>"
            form += "</form>";
            $("body").append(form);
            $('#frmFormAvance').submit();
        })
        $('body').delegate(".eliminaravance", "click", function () {
            var puntero = $(this);
            $.post(
                    "<?php echo base_url("index.php/tareas/eliminaravance") ?>",
                    {avaTar_id: $(this).attr("avaTar_id")}
            ).done(function (msg) {
                puntero.parents("tr").remove();
                alerta("verde", "Avance eliminado correctamente");
            }).fail(function (msg) {
                alerta("rojo", "Error, por favor comunicarse con el administrador del sistema")
            });
        });

        function tabla() {
            var url = '<?php echo base_url("index.php/riesgo/listadoavance2") ?>';
            var clasificacionriesgo = $('#categoria').val();
            $.post(url, {clasificacionriesgo: clasificacionriesgo})
                    .done(function (msg) {
                        $('.datatable_ajax12').html('');
                        var html = "";
                        var totalhoras = 0;
                        var costo = 0;
                        $.each(msg, function (key, val) {
                            totalhoras += parseInt(val.avaTar_horasTrabajadas);
                            costo += parseInt(val.avaTar_costo);
                            html += "<tr>"
                                    + "<td>"
                                    + "<a href='javascript:' class='editarhistorial fa fa-pencil-square-o fa-2x btn btn-info' avaTar_id='" + val.avaTar_id + "' tar_id='" + val.tar_id + "' ></a>"
                                    + "<i class='fa fa-times btn btn-danger eliminaravance'  avaTar_id='" + val.avaTar_id + "'></i></td>"
                                    + "<td>" + val.avaTar_fecha + "</td>"
                                    + "<td>" + val.tar_nombre + "</td>"
                                    + "<td>" + val.nombre + "</td>"
                                    + "<td>" + val.avaTar_horasTrabajadas + "</td>"
                                    + "<td>" + val.avaTar_costo + "</td>"
                                    + "<td>" + val.avaTar_comentarios + "</td>"
                                    + "</tr>";
                        });
                        html += "<tr>\n\
                                        <td colspan='4' style='text-align:right;'><b>Total</b></td>\n\
                                        <td>" + totalhoras + "</td>\n\
                                        <td>" + costo + "</td>\n\
                                        <td></td>\n\
                                        </tr>"
                        $('.datatable_ajax12').html(html);
                    })
                    .fail(function () {
                        alerta("rojo", "Error, comunicarse con el administrador del sistema")
                    })
        }
        tabla();
        $('#estado').change(function () {

            $.post(
                    "<?php echo base_url("index.php/riesgo/consultaestadoxcolor") ?>",
                    {estado: $(this).val()}
            ).done(function (msg) {
                $('#color *').remove();
                var option = "";
                $.each(msg, function (key, val) {
                    option += "<option value='" + val.estAceCol_id + "'>" + val.rieCol_color + "</option>";
                })
                $('#color').append(option);
            }).fail(function (msg) {
                alerta("rojo", "Error en el sistema por favor comunicarse con el administrador del sistema");
            });

        });
        $('#categoria').change(function () {

            $.post(
                    "<?php echo base_url("index.php/riesgo/consultatiporiesgo") ?>",
                    {categoria: $(this).val()}
            ).done(function (msg) {
                $('#tipo *').remove();
                var option = "<option value=''>::Seleccionar::</option>"
                $.each(msg, function (key, val) {
                    option += "<option value='" + val.rieClaTip_id + "'>" + val.rieClaTip_tipo + "</option>";
                })
                $('#tipo').append(option);
            }).fail(function (msg) {
                alerta("rojo", "Error en el sistema por favor comunicarse con el administrador del sistema");
            });

        });
    });





    $(".flechaHeader").click(function () {
        var url = "<?php echo base_url("index.php/riesgo/consultaRiesgoFlechas") ?>";
        var idRiesgo = $("#rie_id").val();
        var metodo = $(this).attr("metodo");
        if (metodo != "documento") {
            $.post(url, {idRiesgo: idRiesgo, metodo: metodo})
                    .done(function (msg) {
                        $("#riesgos").find("#tipo,#color").html("<option value=''>::Seleccionar::</option>");
                        $("#riesgos").find("input[type='text']").val("");
                        $("#riesgos").find("select").val("");
                        $("#rie_id").val(msg.campos.rie_id);
                        $("#descripcion").val(msg.campos.rie_descripcion);
                        $("#categoria").val(msg.campos.cat_id);
                        $("#dimensionuno").val(msg.campos.dim1_id);
                        $("#dimensiondos").val(msg.campos.dim2_id);
                        $("#zona").val(msg.campos.rie_zona);
                        $("#requisito").val(msg.campos.rie_requisito);
                        $("#observaciones").val(msg.campos.rie_observaciones);
                        $("#fecha").val(msg.campos.rie_fecha);
                        $("#estado").val(msg.campos.estAce_id);
                        var selectTipo = "";
                        $.each(msg.tipo, function (indice, val) {
                            selectTipo += "<option " + ((val.rieClaTip_id == msg.campos.rieClaTip_id) ? "selected" : "") + " value='" + val.rieClaTip_id + "'>" + val.rieClaTip_tipo + "</option>";
                        });
                        $("#tipo").append(selectTipo);
                        var selectColor = "";
                        $.each(msg.color, function (indice, val) {
                            selectColor += "<option " + ((val.col_id == msg.campos.col_id) ? "selected" : "") + " value='" + val.col_id + "'>" + val.col_color + "</option>";
                        });
                        $("#color").append(selectColor);
                        $.each(msg.cargoId, function (indice, val) {
                            $('#cargo option[value=' + val.car_id + ']').attr('selected', true);
                        });
                        //pendiente actividades
                        //$("#actividades").val(msg.act_id);
                    })
                    .fail(function (msg) {
                        alerta("rojo", "Error en el sistema por favor comunicarse con el administrador del sistema");
                        $("input[type='text'], select").val();
                    })
        } else {
            window.location = "<?php echo base_url("index.php/riesgo/listadoriesgo"); ?>";
        }
    });
    $("body").on("click", "#guardar", function () {
        if (obligatorio("obligatorio")) {
            $.post("<?php echo base_url("index.php/riesgo/guardarriesgo") ?>"
                    , $("#riesgos").serialize()
                    ).done(function (msg) {
                alerta("verde", "Guardado");
                if (confirm("Desea guardar otro riesgo?")) {
                    $("#riesgos").find("input").val("");
                    $("#riesgos").find("textarea").val("");
                    $("#riesgos").find("select").val("");
                    $("#riesgos").find("#tipo").html("<option>::Seleccionar::</option>");
                } else {
                    window.location = "<?php echo base_url("index.php/riesgo/listadoriesgo"); ?>";
                }
            })
                    .fail(function (msg) {
                        alerta("rojo", "Error en el sistema por favor comunicarse con el administrador del aplicativo");
                    });
        }
    });
    $("body").on("click", "#actualizar", function () {
        if (obligatorio("obligatorio")) {
            $.post("<?php echo base_url("index.php/riesgo/actualizarriesgo") ?>"
                    , $("#riesgos").serialize()
                    ).done(function (msg) {
                alerta("verde", "Actualizado");
            })
                    .fail(function (msg) {
                        alerta("rojo", "Error en el sistema por favor comunicarse con el administrador del aplicativo");
                    });
        }
    });
</script>    