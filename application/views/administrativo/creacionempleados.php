<style type="text/css">
    .tab-pane{
        padding: 15px !important;
    }
</style>
<div class="row">
    <div class="col-md-6">
        <?php if (!empty($empleado[0]->Emp_Id)) { ?>
            <div class="circuloIcon" id="actualizar" title="Actualizar"><i class="fa fa-floppy-o fa-3x"></i></div>
            <div class="circuloIcon eliminar_usuario" title="Eliminar" emp_id="<?php echo $empleado[0]->Emp_Id ?>" planes="<?php echo $empleado[0]->planes_emp ?>" tareas="<?php echo $empleado[0]->tareas_emp ?>"><i class="fa fa-trash-o fa-3x"></i></div>
        <?php } else { ?>
            <div class="circuloIcon" id="guardar" title="Guardar"><i class="fa fa-floppy-o fa-3x"></i></div>
        <?php } ?>
        <a href="<?php echo base_url() . "index.php/administrativo/creacionempleados" ?>">
            <div class="circuloIcon" title="Nuevo Usuario" ><i class="fa fa-folder-open fa-3x"></i></div>
        </a>
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
            <span class="txtTitulo">CREACIÓN EMPLEADO</span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <div class="portlet box blue">
        <div class="portlet-body">
            <div class="tabbable tabbable-tabdrop">
                <ul class="nav nav-tabs">
                    <li class='active'>
                        <a data-toggle="tab" href="#tab1">Informacion General</a>
                    </li>
                    <?php if (!empty($empleado[0]->Emp_Id)) { ?>
                    <li>
                        <a data-toggle="tab" href="#tab2">Contratos</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab3">Incapacidades</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab4">Vacaciones</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab5">Ausentismo</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab7">Horas extras</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab6">Registro</a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <form method="post" id="f1">
                            <input type="hidden" id="emp_id" name="emp_id"  value="<?php echo (!empty($empleado[0]->Emp_Id)) ? $empleado[0]->Emp_Id : ""; ?>" />
                            <div class="row">
                                <label for="cedula" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Cédula</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" id="cedula" name="cedula" class="form-control obligatorio" value="<?php echo (!empty($empleado[0]->Emp_Cedula)) ? $empleado[0]->Emp_Cedula : ""; ?>" />
                                </div>
                                <label for="tipocontrato" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Tipo Contrato</label>  
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
                                <label for="nombre" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Nombres</label> 
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" id="nombre" name="nombre" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_Nombre)) ? $empleado[0]->Emp_Nombre : ""; ?>" />
                                </div>
                                <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3" for="horario">Jornada</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <select name="horario" id="horario" class="form-control">
                                        <option>::Seleccionar::</option>
                                        <?php foreach ($horario as $h): ?>
                                            <option <?php echo (!empty($empleado[0]->hor_id) && $empleado[0]->hor_id == $h->hor_id) ? "selected" : ""; ?> value="<?php echo $h->hor_id ?>"><?php echo $h->hor_horario . " (" . $h->hor_cantidadHoras . ")" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label for="apellidos" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Apellidos</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" id="apellidos" name="apellidos" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_Apellidos)) ? $empleado[0]->Emp_Apellidos : ""; ?>"/>
                                </div>
                                <label for="fechainiciocontrato" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Fecha Inicio Contrato</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" name="fechainiciocontrato" id="fechainiciocontrato" class="form-control fecha obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_FechaInicioContrato)) ? $empleado[0]->Emp_FechaInicioContrato : ""; ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <label for="apellidos" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Salario</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" id="salario" name="salario" class="form-control obligatorio miles"  value="<?php echo (!empty($empleado[0]->emp_salario)) ? $empleado[0]->emp_salario : ""; ?>" disabled="disabled"/>
                                </div>
                                <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3" for="fechafincontrato">Fecha Fin Contrato</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" name="fechafincontrato" id="fechafincontrato" class="form-control fecha"  value="<?php echo (!empty($empleado[0]->Emp_FechaFinContrato)) ? $empleado[0]->Emp_FechaFinContrato : ""; ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <label for="sexo" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Genero</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <select name="sexo" id="sexo" class="form-control obligatorio">
                                        <option value="">::Seleccionar::</option>
                                        <?php foreach ($sexo as $s) { ?>
                                            <option  <?php echo (!empty($empleado[0]->sex_Id) && $empleado[0]->sex_Id == $s->Sex_id) ? "selected" : ""; ?> value="<?php echo $s->Sex_id ?>"><?php echo $s->Sex_Sexo ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3" for="planobligatoriodesalud"><span class="campoobligatorio">*</span>Plan Obligatorio de Salud</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" name="planobligatoriodesalud" id="planobligatoriodesalud" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_PlanObligatorioSalud)) ? $empleado[0]->Emp_PlanObligatorioSalud : ""; ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <label for="fechadenacimiento" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Fecha Nacimiento</label> 
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                    <input type="text" id="fechadenacimiento" name="fechadenacimiento" class="form-control fecha obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_FechaNacimiento)) ? $empleado[0]->Emp_FechaNacimiento : ""; ?>"/>
                                </div>    
                                <label for="fechaafiliacionarl" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Fecha Afiliacion ARL</label> 
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" id="fechaafiliacionarl" name="fechaafiliacionarl" class="form-control fecha obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_FechaAfiliacionArl)) ? $empleado[0]->Emp_FechaAfiliacionArl : ""; ?>" />
                                </div>    
                            </div>
                            <div class="row">
                                <label for="estatura" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Estatura</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" id="estatura" name="estatura" class="form-control obligatorio float"  value="<?php echo (!empty($empleado[0]->Emp_Estatura)) ? $empleado[0]->Emp_Estatura : ""; ?>"/>
                                </div>
                                <label for="fondo" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Fondo de Pensiones</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" id="fondo" name="fondo" class="form-control"  value="<?php echo (!empty($empleado[0]->emp_fondo)) ? $empleado[0]->emp_fondo : ""; ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <label for="peso" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Peso</label>  
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                    <input type="text" id="peso" name="peso" class="form-control float"  value="<?php echo (!empty($empleado[0]->Emp_Peso)) ? $empleado[0]->Emp_Peso : ""; ?>" />
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <center><button type="button" id="aseguradora" class="btn-sst" data-toggle="modal" data-target="#myModal3">Registrar aseguradoras del empleado</button></center>
                                </div>  
                            </div>
                            <div class="row">
                                <label for="telefono" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Teléfono</label>   
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                    <input type="text" id="telefono" name="telefono" class="form-control number "  value="<?php echo (!empty($empleado[0]->Emp_Telefono)) ? $empleado[0]->Emp_Telefono : ""; ?>" />
                                </div>     
                            </div>
                            <div class="row">
                                <label for="direcion" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Dirección</label>   
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                    <input type="text" id="direcion" name="direccion" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_Direccion)) ? $empleado[0]->Emp_Direccion : ""; ?>" />
                                </div>  
                            </div>
                            <div class="row">
                                <label for="contacto" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Contacto</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                    <input type="text" id="contacto" name="contacto" class="form-control obligatorio"  value="<?php echo (!empty($empleado[0]->Emp_contacto)) ? $empleado[0]->Emp_contacto : ""; ?>" />
                                </div>  
                            </div>
                            <div class="row">
                                <label for="telefonocontacto" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Teléfono Contacto</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                    <input type="text" id="telefonocontacto" name="telefonocontacto" class="form-control number"  value="<?php echo (!empty($empleado[0]->Emp_TelefonoContacto)) ? $empleado[0]->Emp_TelefonoContacto : ""; ?>" />
                                </div>    
                                <label for="dimension1" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $empresa[0]->Dim_id ?></label>
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
                                <label for="email" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Email</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                    <input type="text" id="email" name="email" class="form-control obligatorio email"  value="<?php echo (!empty($empleado[0]->Emp_Email)) ? $empleado[0]->Emp_Email : ""; ?>" />
                                </div>    
                                <label for="dimension2" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $empresa[0]->Dimdos_id ?></label>  
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
                                <label for="estadocivil" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Estado Civil</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                    <select id="estadocivil" name="estadocivil" class="form-control obligatorio">
                                        <option value="">::Seleccionar::</option>
                                        <?php foreach ($estadocivil as $ec) { ?>
                                            <option  <?php echo (!empty($empleado[0]->EstCiv_id) && $empleado[0]->EstCiv_id == $ec->EstCiv_id) ? "selected" : ""; ?> value="<?php echo $ec->EstCiv_id ?>"><?php echo $ec->EstCiv_Estado ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label for="cargo" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span class="campoobligatorio">*</span>Cargo</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <select id="cargo" name="cargo" class="form-control obligatorio">
                                        <option value="">::Seleccionar::</option>
                                        <?php foreach ($cargo as $c) { ?>
                                            <option  <?php echo (!empty($empleado[0]->Car_id) && $empleado[0]->Car_id == $c->car_id) ? "selected" : ""; ?> value="<?php echo $c->car_id ?>"><?php echo $c->car_nombre ?></option>
                                        <?php } ?>
                                    </select>
                                </div>    
                            </div>
                        </form>
                    </div>
                    <div id="tab2" class="tab-pane"></div>
                    <div id="tab3" class="tab-pane">
                        <div class="portlet-title">
                            <div class="caption" style="padding:0;">
                                <span style="color: #0A7194;font-size: 20px" >Registro incapacidad</span>
                            </div>
                            <div class="tools">
                                <div class="circuloIcon">
                                    <i class="fa fa-folder-open fa-3x agregarIncapacidad" title="Registro incapacidad"></i>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="tablesst">
                                <thead>
                                    <tr>
                                        <th>RESPONSABLE</th>
                                        <th>FECHA INICIO</th>
                                        <th>FECHA FINAL</th>
                                        <th>TIEMPO EN DIAS</th>
                                        <th>MOTIVO DE LA CAPACIDAD</th>
                                        <th>OBSERVACIONES</th>
                                        <th>USUARIO</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaIncapacidad">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab4" class="tab-pane">
                        <div class="portlet-title">
                            <div class="caption" style="padding:0;">
                                <span style="color: #0A7194;font-size: 20px" >Vacaciones</span>
                            </div>
                            <div class="tools">
                                <div class="circuloIcon">
                                    <i class="fa fa-folder-open fa-3x agregarvacaciones" title="Registro vacaciones"></i>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="tablesst">
                                <thead>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Días</th>
                                <th>Observaciones</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                                </thead>
                                <tbody id="bodyVacation">
                                    <?php foreach ($vacaciones as $v): ?>
                                        <tr>
                                            <td><?php echo $v->vac_fechaInicio ?></td>
                                            <td><?php echo $v->vac_fechaFin ?></td>
                                            <td><?php echo $v->diferencia ?></td>
                                            <td><?php echo $v->vac_observaciones ?></td>
                                            <td class='transparent'><i class='fa fa-pencil-square-o fa-2x modifyHolidays' title='Modificar' vac_id='<?php echo $v->vac_id ?>' ></i></td>
                                            <td class='transparent'><i class='fa fa-trash-o fa-2x removeHolidays' title='Eliminar' vac_id='" + val.emp_id + "' ></i></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab5" class="tab-pane">
                        <div class="portlet-title">
                            <div class="caption" style="padding:0;">
                                <span style="color: #0A7194;font-size: 20px" >Ausentismo</span>
                            </div>
                            <div class="tools">
                                <div class="circuloIcon">
                                    <i class="fa fa-folder-open fa-3x agregarAusentismo" title="Registro vacaciones"></i>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="tablesst">
                                <thead>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Días</th>
                                <th>Observaciones</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                                </thead>
                                <tbody id="bodyAusentismo">
                                    <?php foreach ($ausentismo as $au): ?>
                                        <tr>
                                            <td><?php echo $au->empAus_fechaInicial ?></td>
                                            <td><?php echo $au->empAus_fechaFinal ?></td>
                                            <td><?php echo $au->diferencia ?></td>
                                            <td><?php echo $au->empAus_observaciones ?></td>
                                            <td class='transparent'><i class='fa fa-pencil-square-o fa-2x modificarAusentismo' title='Modificar' empAus_id='<?php echo $au->empAus_id ?>' ></i></td>
                                            <td class='transparent'><i class='fa fa-trash-o fa-2x removeHolidays' title='Eliminar' empAus_id='<?php echo $au->empAus_id ?>' ></i></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab6" class="tab-pane">
                        <div class="portlet-title">
                            <div class="caption" style="padding:0;">
                                <span style="color: #0A7194;font-size: 20px" >Registro</span>
                            </div>
                            <div class="tools">
                                &nbsp;&nbsp;
                                <div class="circuloIcon">
                                    <i class="fa fa-folder-open fa-3x agregarcarpeta"  data-toggle="modal" data-target="#myModal" title="Carpeta"></i>
                                </div>
                                <div class="circuloIcon">
                                    <i class="fa fa-pencil-square-o fa-3x" data-toggle="modal" data-target="#myModal2" title="Registro" id="agregarregistro"></i>    
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable tabbable-tabdrop">
                                <div class="tab-content">
                                    <br>
                                    <div class="panel-group accordion" id="accordion1">
                                        <?php
                                        $i = 1;
                                        foreach ($registro as $id => $nombre):
                                            foreach ($nombre as $nom => $num):
                                                ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_<?php echo $id; ?>" aria-expanded="false"> 
                                                                &nbsp;<i class="fa fa-folder-o carpeta"></i>     <?php echo $nom ?>
                                                            </a>
                                                            <div class="posicionIconoAcordeon">
                                                                <i class="fa fa-edit editarcarpeta" car_id="<?php echo $id ?>"></i>
                                                                <i class="fa fa-times eliminarcarpeta" car_id="<?php echo $id ?>"></i>
                                                            </div>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse_<?php echo $id; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <table class="table table-hover table-bordered">
                                                                <thead>
                                                                <th>Nombre archivo</th>
                                                                <th>Descripción</th>
                                                                <th>Versión</th>
                                                                <th>Responsable</th>
                                                                <th>Tamaño</th>
                                                                <th>Fecha</th>
                                                                <th>Acción</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($num as $numero => $campos):

                                                                        if (!empty($campos[1])):
                                                                            ?>
                                                                            <tr>
                                                                                <td> <a target="_blank" href="<?php echo base_url("/uploads/empleado/" . $empleado[0]->Emp_Id . "/" . $campos[4] . "/" . $campos[1]) ?>" title="descargar" ><?php echo $campos[1] ?> </a></td>
                                                                                <td><?php echo $campos[2] ?></td>
                                                                                <td><?php echo $campos[3] ?></td>
                                                                                <td><?php echo $campos[0] ?></td>
                                                                                <td><?php echo $campos[5] ?></td>
                                                                                <td><?php echo $campos[6] ?></td>
                                                                                <td>
                                                                                    <i class="fa fa-times eliminar btn-danger" title="Eliminar" empReg_id="<?php echo $campos[4] ?>"></i>
                                                                                    <i class="fa fa-pencil-square-o modificar  btn-info" title="Modificar" data-target='#myModal2' data-toggle='modal'  emp_id="<?php echo $campos[4] ?>" ></i>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                        else:
                                                                            ?>
                                                                            <tr>
                                                                                <td colspan="7"><center><b>No hay registros</b></center></td>
                                                                        </tr>    
                                                                    <?php
                                                                    endif;
                                                                endforeach;
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i++;
                                            endforeach;
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                                <p>   </p>
                                <p>   </p>
                                <div class="tabbable tabbable-tabdrop">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab7" class="tab-pane">
                        <div class="row">
                            <div class="circuloIcon guardarHorasExtra"><i class="fa fa-floppy-o fa-3x"></i></div>
                        </div>
                            <form method="post" id="FrmHorasExtras">
                                <input type="hidden" id="emp_id" name="emp_id"  value="<?php echo (!empty($empleado[0]->Emp_Id)) ? $empleado[0]->Emp_Id : ""; ?>" />
                                <div class="row">
                                    <label for="horas" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        Fecha
                                    </label>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <input type="text" name="fecha" id="fecha" class="form-control fecha obligatorioHoraExtra"/>
                                    </div>
                                    <label for="horas" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        Cantidad Horas
                                    </label>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <input type="number" name="horas" id="horas" class="form-control obligatorioHoraExtra"/>
                                    </div>
                                    <label for="horas" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        Tipo
                                    </label>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <select name="tipo" class="form-control obligatorioHoraExtra" id="tipoHoraExtra">
                                            <option value="">::Seleccionar::</option>
                                            <?php foreach ($tipoHora as $t): ?>
                                                <option value="<?php echo $t->horExtTip_id ?>"><?php echo $t->horExtTip_tipo ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        <div class="row">
                            <table class="tablesst">
                                <thead>
                                    <th>Fecha</th>
                                    <th>Cantidad de horas</th>
                                    <th>Tipo</th>
                                </thead>
                                <tbody>
                                    <?php foreach($horasExtras as $he): ?>
                                    <tr>
                                        <td><?php echo $he->empHorExt_fecha ?></td>
                                        <td><?php echo $he->empHorExt_horas ?></td>
                                        <td><?php echo $he->horExtTip_tipo ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">ASEGURADORAS</h4>
                </div>
                <div class="modal-body" id="incluiraseguradoras">
                    <div class="row" style="text-align:center">
                        <button type="button" id="agregaraseguradora" class="btn btn-success">Agregar</button>
                    </div>
                    <div id="agregarClones">
                        <?php
                        if (empty($aserguradorasxempleado)) {
                            ?>
                            <div class="row">
                                <label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Tipo Aseguradora:</label>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <select  name="tipoaseguradora[]" class="form-control tipoaseguradora">
                                        <option value="">::Seleccionar::</option>
                                        <?php
                                        $option = "";
                                        foreach ($tipoaseguradora as $ta):
                                            $option .= "<option value='" . $ta->TipAse_Id . "'>" . $ta->TipAse_Nombre . "</option>";
                                        endforeach;
                                        echo $option;
                                        ?>
                                    </select>
                                </div>
                                <label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Nombre Aseguradora:</label>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <input type="text" name="nombreaseguradora[]" class="form-control nombreaseguradora">
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                    <button type="button" class="btn btn-danger eliminaraseguradora" >X</button>
                                </div>
                            </div>
                            <?php
                        }
                        else {
                            foreach ($aserguradorasxempleado as $as):
                                ?>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label>Tipo Aseguradora:</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <select  name="tipoaseguradora[]" class="form-control tipoaseguradora">
                                            <option value="">::Seleccionar::</option>
                                            <?php
                                            $option = "";
                                            foreach ($tipoaseguradora as $ta):
                                                $selected = (($as->tipAse_id == $ta->TipAse_Id) ? "selected" : "");
                                                $option .= "<option value='" . $ta->TipAse_Id . "' " . $selected . " >" . $ta->TipAse_Nombre . "</option>";
                                            endforeach;
                                            echo $option;
                                            ?>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Nombre Aseguradora:</label>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <input type="text" name="nombreaseguradora[]" class="form-control nombreaseguradora" value="<?php echo $as->ase_id ?>">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                        <button type="button" class="btn btn-danger eliminaraseguradora" >X</button>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">AGREGAR CARPETA</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="formcarpeta">
                    <input type="hidden" id="emp_id" name="emp_id"  value="<?php echo (!empty($empleado[0]->Emp_Id)) ? $empleado[0]->Emp_Id : ""; ?>" />
                    <div class="row">
                        <label for="nombrecarpeta" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Nombre:</label>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <input type="nombre" id="nombrecarpeta" name="nombrecarpeta" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <label for="descripcioncarpeta" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Descripción:</label>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <textarea  id="descripcioncarpeta" name="descripcioncarpeta" class="form-control"></textarea>
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
<div class="modal fade" id="modalIncapacidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">AGREGAR INCAPACIDAD</h4>
            </div>
            <div class="modal-body">
                <form id="crearIncapacidad" class="form-horizontal">
                    <input type="hidden" name="motivoInc" id="idMotivo" class="incapacidadEmpleado" >
                    <div class="form-group">
                        <label for="responsable" class="col-sm-3 control-label"><span class="campoobligatorio">*</span>Responsable</label>
                        <div class="col-sm-3">
                            <select name="responsable" id="responsable" class="form-control obligatorioInc incapacidadEmpleado">
                                <option value="">::Seleccionar::</option>
                                <?php foreach ($empleadoresponsable as $index => $value): ?>
                                    <option value="<?php echo $value->empRes_id ?>"><?php echo $value->empRes_descripcion ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="motivoInc" class="col-sm-3 control-label">
                            <span class="campoobligatorio">*</span>
                            Motivo de la incapacidad
                        </label>
                        <div class="col-sm-3">
                            <input type="text" id="motivoIncapacidad" class="form-control incapacidadEmpleado"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fechaInicioInc" class="col-sm-3 control-label"><span class="campoobligatorio">*</span>Fecha Inicio</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control fecha obligatorioInc incapacidadEmpleado" id="fechaInicioInc" name="fechaInicioInc">
                        </div>
                        <label for="observacionInc" class="col-sm-3 control-label"><span class="campoobligatorio">*</span>Observaciones</label>
                        <div class="col-sm-3">
                            <textarea name="observacionInc" id="observacionInc" class="form-control obligatorioInc incapacidadEmpleado"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fechaFinalInc" class="col-sm-3 control-label"><span class="campoobligatorio">*</span>Fecha Final</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control fecha obligatorioInc incapacidadEmpleado" id="fechaFinalInc" name="fechaFinalInc">
                        </div>
                    </div>
                    <input type="hidden" id="empleadoInc" name="empleadoInc" class="obligatorioInc"  value="<?php echo (!empty($empleado[0]->Emp_Id)) ? $empleado[0]->Emp_Id : ""; ?>" />
                </form>
            </div>
            <div class="modal-footer" id="opcionescarpeta">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarInc">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="vacaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">AGREGAR VACACIONES</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="FrmVacaciones">
                    <input type="hidden" id="vac_id" name="vac_id" />
                    <input type="hidden" id="emp_id" name="emp_id"  value="<?php echo (!empty($empleado[0]->Emp_Id)) ? $empleado[0]->Emp_Id : ""; ?>" />
                    <div class="row">
                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3" for="iniciovacaciones">Fecha Inicio</label>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><input type="text" name="iniciovacaciones" id="iniciovacaciones" class="form form-control fecha"/></div>
                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3" for="finvacaciones">Fecha Fin</label>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><input type="text" name="finvacaciones" id="finvacaciones" class="form form-control fecha"/></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="observacionvacaciones">Observación</label>
                            <textarea name="observacionvacaciones" id="observacionvacaciones" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="opcionescarpeta">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarVacaciones">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ausentismo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">AGREGAR AUSENTISMO</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="FrmAusentismo">
                    <input type="hidden" id="emp_id" name="emp_id"  value="<?php echo (!empty($empleado[0]->Emp_Id)) ? $empleado[0]->Emp_Id : ""; ?>" />
                    <div class="row">
                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3" for="iniciovacaciones">Fecha Inicio</label>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><input type="text" name="iniciovacaciones" id="iniciovacaciones" class="form form-control fecha"/></div>
                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3" for="finvacaciones">Fecha Fin</label>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><input type="text" name="finvacaciones" id="finvacaciones" class="form form-control fecha"/></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="observacionvacaciones">Observación</label>
                            <textarea name="observacionvacaciones" id="observacionvacaciones" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="opcionescarpeta">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarAusentismo">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">AGREGAR REGISTRO</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="formregistro" >
                    <input type="hidden" name="empReg_id" id="empReg_id" />
                    <div class="row">
                        <label for="empReg_carpeta" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Carpeta:</label>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <select id="empReg_carpeta" name="empReg_carpeta" class="form-control">
                                <option value="">::Seleccionar::</option>
                                <?php foreach ($carpeta as $car): ?>
                                    <option value="<?php echo $car->empCar_id ?>"><?php echo $car->empCar_nombre ?> - <?php echo $car->empCar_descripcion ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="empReg_version" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Versión:</label>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <input type="text" id="empReg_version" name="empReg_version" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <label for="empReg_descripcion" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Descripción:</label>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <textarea  id="empReg_descripcion" name="empReg_descripcion" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label for="archivocarpeta" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Adjuntar archivo:</label>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <input type="file" id="archivocarpeta" name="archivo" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $empleado[0]->Emp_Id ?>" name="Emp_Id" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarRegistro">Guardar</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php
$option = "";
foreach ($tipoaseguradora as $ta):
    $option .= "<option value='" . $ta->TipAse_Id . "'>" . $ta->TipAse_Nombre . "</option>";
endforeach;
?>
<script>

    $('.guardarHorasExtra').click(function () {
        if(obligatorio('obligatorioHoraExtra') == true){
        $.post("<?php echo base_url("index.php/administrativo/guardarHorasExtras") ?>",
                $('#FrmHorasExtras').serialize()
                )
                .done(function (msg) {
                    if (!jQuery.isEmptyObject(msg.message))
                        alerta("amarillo", msg['message'])
                    else {
                        $("#fecha,#horas,#tipoHoraExtra").val();
                    }
                })
                .fail(function (msg) {
                    alerta("rojo","Error en el sistema favor comunicarse con el administrador")
                });
            }
    });

    $('#motivoIncapacidad').autocomplete({
        source: "<?php echo base_url("index.php/administrativo/autocompletarIncapacidadReferencia") ?>",
        minLength: 3,
        max: 10,
        open: function () {
            setTimeout(function () {
                $('.ui-autocomplete').css('z-index', 99999999999999);
            }, 0);
        },
        select: function (event, ui) {
            $("#idMotivo").val(ui.item.id);  // ui.item.value contains the id of the selected label
        }
    });

    $('body').delegate("#guardarVacaciones", "click", function () {
        if ($('#vac_id').length == 0)
            var ruta = "<?php echo base_url("index.php/administrativo/guardarVacaciones") ?>";
        else
            var ruta = "<?php echo base_url("index.php/administrativo/updateHolidays") ?>";
        $.post(ruta, $('#FrmVacaciones').serialize())
                .done(function (msg) {
                    if (!jQuery.isEmptyObject(msg.message))
                        alerta("rojo", msg['message'])
                    else
                        cargarTablaVacaciones(msg, "bodyVacation");

                })
                .fail(function (msg) {
                    alert("rojo", "Error, por favor comunicarse con el administrador");
                });
    });
    $('body').delegate("#guardarAusentismo", "click", function () {
        if ($('#empAus_id').length == 0)
            var ruta = "<?php echo base_url("index.php/administrativo/guardarAusentismo") ?>";
        else
            var ruta = "<?php echo base_url("index.php/administrativo/actualizarAusentismo") ?>";
        $.post(ruta, $('#FrmAusentismo').serialize())
                .done(function (msg) {
                    if (!jQuery.isEmptyObject(msg.message))
                        alerta("rojo", msg['message'])
                    else
                        cargarTablaVacaciones(msg, "bodyAusentismo");

                })
                .fail(function (msg) {
                    alert("rojo", "Error, por favor comunicarse con el administrador");
                });
    });
    function cargarTablaVacaciones(msg, body) {
        $('#' + body + ' *').remove();
        if (body == "bodyAusentismo") {
            var clase = "modificarAusentismo";
            var modal = "ausentismo";
        }
        else {
            var clase = "modifyHolidays";
            var modal = "vacaciones";
        }
        var cuerpo = "";
        $.each(msg.Json, function (key, val) {
            cuerpo += "<tr>";
            if (clase == "modifyHolidays") {
                cuerpo += "<td>" + val.vac_fechaInicio + "</td>";
                cuerpo += "<td>" + val.vac_fechaFin + "</td>";
                cuerpo += "<td>" + val.diferencia + "</td>";
                cuerpo += "<td>" + val.vac_observaciones + "</td>";
            } else {
                cuerpo += "<td>" + val.empAus_fechaInicial + "</td>";
                cuerpo += "<td>" + val.empAus_fechaFinal + "</td>";
                cuerpo += "<td>" + val.diferencia + "</td>";
                cuerpo += "<td>" + val.empAus_observaciones + "</td>";
            }
            cuerpo += "<td class='transparent'><i class='fa fa-pencil-square-o fa-2x " + clase + "' title='Modificar' vac_id='" + val.vac_id + "' ></i></td>";
            cuerpo += "<td class='transparent'><i class='fa fa-trash-o fa-2x removeHolidays' title='Eliminar' vac_id='" + val.emp_id + "' ></i></td>";
            cuerpo += "</tr>";
        });
        $('#' + body).append(cuerpo);
        alerta("verde", "Operacion realizada con exito");
        $('#' + modal).modal("hide");
    }

    $('body').delegate(".modifyHolidays", "click", function () {
        $.post(
                "<?php echo base_url('index.php/administrativo/dataHolidaysxId') ?>",
                {vac_id: $(this).attr('vac_id')}
        )
                .done(function (msg) {
                    if (!jQuery.isEmptyObject(msg.message))
                        alerta("rojo", msg['message'])
                    else {
                        $("#iniciovacaciones").val(msg.Json[0].vac_fechaInicio);
                        $("#finvacaciones").val(msg.Json[0].vac_fechaFin);
                        $("#observacionvacaciones").val(msg.Json[0].vac_observaciones);
                        $('#vacaciones').modal("show");
                        $('#FrmVacaciones').append("<input type='hidden' name='vac_id' id='vac_id' value='" + msg.Json[0].vac_id + "'>");
                        $("#vac_id").val(msg.Json[0].vac_id);
                        $('#guardarVacaciones').attr("tipo", "2");
                    }
                })
                .fail(function (msg) {
                    alert("rojo", "Error, por favor comunicarse con el administrador");
                });
    });
    $('body').delegate(".modificarAusentismo", "click", function () {
        $.post(
                "<?php echo base_url('index.php/administrativo/dataHolidaysxId') ?>",
                {vac_id: $(this).attr('vac_id')}
        )
                .done(function (msg) {
                    if (!jQuery.isEmptyObject(msg.message))
                        alerta("rojo", msg['message'])
                    else {
                        $("#iniciovacaciones").val(msg.Json[0].vac_fechaInicio);
                        $("#finvacaciones").val(msg.Json[0].vac_fechaFin);
                        $("#observacionvacaciones").val(msg.Json[0].vac_observaciones);
                        $('#vacaciones').modal("show");
                        $('#FrmVacaciones').append("<input type='hidden' name='vac_id' id='vac_id' value='" + msg.Json[0].vac_id + "'>");
                        $("#empAus_id").val(msg.Json[0].vac_id);
                        $('#guardarVacaciones').attr("tipo", "2");
                    }
                })
                .fail(function (msg) {
                    alert("rojo", "Error, por favor comunicarse con el administrador");
                });
    });


    $('body').delegate(".removeHolidays", "click", function () {
        var apuntador = $(this);
        var vac_id = $(this).attr('vac_id');
        $.post(
                "<?php echo base_url('index.php/administrativo/removeHolidays') ?>",
                {vac_id: vac_id}
        )
                .done(function (msg) {
                    if (!jQuery.isEmptyObject(msg.message))
                        alerta("rojo", msg['message'])
                    else {
                        apuntador.parent('td').parent('tr').remove();
                        alerta("verde", "Eliminado correctamente");
                    }
                })
                .fail(function (msg) {
                    alerta("rojo", "Error, por favor comunicarse con el administrador del sistema");
                });
    });

    $('.agregarvacaciones').click(function () {
        $('#iniciovacaciones,#finvacaciones,#observacionvacaciones').val('');
        $(this).attr("tipo", "1");
        $('#vac_id').remove();
        $('#vacaciones').modal("show");
    });
    $('.agregarIncapacidad').click(function () {
        $('.incapacidadEmpleado').val('');
        $('#modalIncapacidad').modal("show");
    });
    $('.agregarAusentismo').click(function () {
        $('#iniciovacaciones,#finvacaciones,#observacionvacaciones').val('');
        $(this).attr("tipo", "1");
        $('#vac_id').remove();
        $('#ausentismo').modal("show");
    });

    $(document).ready(<?php echo (!empty($empleado[0]->Emp_Id)) ? "tabla()" : "" ?>);
    $('body').delegate(".modificarcarpeta", "click", function () {

        $.post("<?php echo base_url("index.php/administrativo/modificarcarpeta") ?>",
                $('#formcarpeta').serialize()
                ).done(function (msg) {

            $('a[href="#collapse_' + msg.empCar_id + '"]').text(msg.empCar_nombre);
            $('#myModal').modal("toggle");
            alerta("verde", "Se actualizaron los datos correctamente");
        }).fail(function (msg) {
            alerta("rojo", "Error, por favor comunicarse con el administrador del sistema");
        });
    });

    $('body').delegate(".agregarcarpeta", "click", function () {
        $('#eliminarcarpeta').remove();
        $('#empCar_id').remove();
        $('#nombrecarpeta').val("");
        $('#descripcioncarpeta').val("");
        $('.modificarcarpeta').replaceWith('<button id="guardarcarpeta" class="btn btn-primary" type="button">Guardar</button>');

    });

    $('body').delegate(".eliminarcarpeta", "click", function () {
        var empCar_id = $(this).attr("car_id");
        if (confirm("Esta seguro de eliminar la carpeta")) {
            $('#empReg_carpeta option[value="' + empCar_id + '"]').remove();
            $.post("<?php echo base_url("index.php/administrativo/eliminarcarpeta") ?>",
                    {empCar_id: empCar_id}
            ).done(function (msg) {
                $('a[href="#collapse_' + empCar_id + '"]').parents('.panel-default').remove();
                alerta("verde", "Datos eliminados los datos correctamente");
            }).fail(function (msg) {
                alerta("rojo", "Error, por favor comunicarse con el administrador del sistema");
            });
        }
    });

    $('body').delegate(".editarcarpeta", "click", function () {

        $.post(
                "<?php echo base_url("index.php/administrativo/cargarempleadocarpeta") ?>",
                {carpeta: $(this).attr("car_id")}
        )
                .done(function (msg) {
                    $('#formcarpeta').append("<input type='hidden' value='" + msg.empCar_id + "' name='empCar_id' id='empCar_id' >");
                    $('#nombrecarpeta').val(msg.empCar_nombre);
                    $('#descripcioncarpeta').val(msg.empCar_descripcion);
                    $('#guardarcarpeta').replaceWith("<button type='button' empCar_id='" + msg.empCar_id + "' class='btn btn-primary modificarcarpeta'>Actualizar</button>");
                    $('#myModal').modal("show");
                })
                .fail(function (msg) {

                });

    });
    $('body').delegate('.accordion-toggle', "click", function () {
        if ($(this).attr('aria-expanded') == "true") {
            $(this).children('.carpeta').removeClass('fa fa-folder-open-o');
            $(this).children('.carpeta').addClass('fa fa-folder-o');
        } else {
            $(this).children('.carpeta').removeClass('fa fa-folder-o');
            $(this).children('.carpeta').addClass('fa fa-folder-open-o');
        }
    });
    $("#agregarregistro").click(function () {
        $('#empReg_id,#empReg_carpeta,#empReg_version,#empReg_descripcion,.archivo,#empReg_id').val("");
    });


    $('body').delegate('.modificar', 'click', function () {
        $('#guardarRegistro').text("Actualizar");
        $.post(
                "<?php echo base_url("index.php/administrativo/searchxid") ?>",
                {empReg_id: $(this).attr("emp_id")}
        ).done(function (msg) {
            $('.archivo').remove()
            $('#regEmp_id').val(msg.empReg_id);
            $('#empReg_carpeta').val(msg.empReg_carpeta);
            $('#empReg_version').val(msg.empReg_version);
            $('#empReg_descripcion').val(msg.empReg_descripcion);
            $('#empReg_id').val(msg.empReg_id);
            var div = "<div class='row archivo'>\n\
                            <label class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='color:black'>Archivo:</label>\n\
                            <div class='col-lg-10 col-md-10 col-sm-10 col-xs-10'>\n\
                            <a target='_blank' href='<?php echo base_url("/uploads/empleado/") ?>/" + msg.emp_id + "/" + msg.empReg_id + "/" + msg.empReg_archivo + "' title='descargar' >" + msg.empReg_archivo + "</a>\n\
                            </div>\n\
                           </div>";
            $('#formregistro').append(div);
        }).fail(function (msg) {
            alerta("rojo", "Error, por favor comunicarse con el administrador del sistema")
        });
    });

    $("body").delegate('.eliminar', "click", function () {
        var apuntador = $(this);
        if (confirm("Esta seguro de eliminar el registro"))
            $.post(
                    "<?php echo base_url("index.php/administrativo/eliminarregistro"); ?>"
                    , {empReg_id: $(this).attr('empreg_id')}
            ).done(function (msg) {
                apuntador.parents('tr').remove();
                alerta("verde", "Registro eliminado correctamente");
            }).fail(function (msg) {
                alerta("rojo", "Error, por favor comunicarse con el administrador del sistema")
            })
    });

    $('#cedula').change(function () {
        var data = $(this);
        $.post(
                "<?php echo base_url("index.php/administrativo/validarcedula") ?>",
                {cedula: $(this).val()}
        ).done(function (msg) {
            if (msg == 1) {
                data.val("");
                data.focus();
                alerta("amarillo", "Empleado ya existe en el sistema")
            }
        })
                .fail(function (msg) {

                });

    });

    $('body').delegate(".eliminaraseguradora", "click", function () {
        var i = 0;
        $(".eliminaraseguradora").each(function () {
            i++;
        })
        if (i == 1)
            return false;
        $(this).parent().parent().remove();
    });
    var option = "<?php echo (!empty($option)) ? $option : ""; ?>";

    function agregarClonAseguradora() {
        var cuerpo = "";
        cuerpo += '<div class="row">';
        //Campo Label
        cuerpo += '<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Tipo Aseguradora:</label>';
        //campo select
        cuerpo += '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">';
        cuerpo += '<select name="tipoaseguradora[]" class="form-control tipoaseguradora">';
        cuerpo += '<option value="">::Seleccionar::</option>' + option;
        cuerpo += '</select>'
        cuerpo += '</div>';
        //campo Label
        cuerpo += '<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Nombre Aseguradora:</label>';
        //campo select
        cuerpo += '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">';
        cuerpo += '<input type="text" name="nombreaseguradora[]" class="form-control nombreaseguradora">';
        cuerpo += '</div>';
        //campo eliminar
        cuerpo += '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">';
        cuerpo += '<button type="button" class="btn btn-danger eliminaraseguradora">X</button>'
        cuerpo += '</div>';
        cuerpo += '</div>';
        return cuerpo;
    }

    $('body').delegate("#agregaraseguradora", "click", function () {
        $('#incluiraseguradoras').find("#agregarClones").append(agregarClonAseguradora());
    });

    $(function () {
        //$("#actualizar").hide();
<?php if (!empty($empleado[0])) { ?>
            $("#btnRegistro").hide();
            $("#guardar").hide();
            $("#actualizar").show();
<?php } ?>
    });

    $('body').delegate("#guardarcarpeta", "click", function () {
        $.post("<?php echo base_url("index.php/administrativo/guardarcarpeta") ?>",
                $("#formcarpeta").serialize()
                ).done(function (msg) {

            var option = "<option value='" + msg.empCar_id + "'>" + msg.empCar_nombre + ' - ' + msg.empCar_descripcion + "</option>";
            $('#empReg_carpeta').append(option);
            var acordeon = '<div class="panel panel-default" id="' + msg.empCar_id + '">\n\
                                            <div class="panel-heading">\n\
                                                <h4 class="panel-title">\n\
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_' + msg.empCar_id + '" aria-expanded="false">\n\
                                                        ' + msg.empCar_nombre + " - " + msg.empCar_descripcion + '\n\
                                                    </a>\n\
                                                        <div class="posicionIconoAcordeon"><i class="fa fa-edit editarcarpeta" car_id="' + msg.empCar_id + '"></i>\n\
                                                        <i class="fa fa-times eliminarcarpeta" car_id="' + msg.empCar_id + '"></i></div>\n\
                                                </h4>\n\
                                            </div>\n\
                                            <div id="collapse_' + msg.empCar_id + '" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">\n\
                                                <div class="panel-body">\n\
                                                    <table class="table table-hover table-bordered">\n\
                                                        <thead>\n\
                                                            <th>Nombre archivo</th>\n\
                                                            <th>Descripción</th>\n\
                                                            <th>Versión</th>\n\
                                                            <th>Responsable</th>\n\
                                                            <th>Tamaño</th>\n\
                                                            <th>Fecha</th>\n\
                                                            <th>Acción</th>\n\
                                                        </thead> \n\
                                                        <tbody>\n\
                                                            <tr>\n\
                                                                <td colspan="7">\n\
                                                                    <center><b>No hay registros</b></center>\n\
                                                                </td>\n\
                                                            </tr>\n\
                                                        </tbody>\n\
                                                    </table>\n\
                                                </div>\n\
                                            </div>\n\
                                    </div>';
            $('#accordion1').append(acordeon);
            $("#myModal").modal("toggle");
            alerta("verde", "Datos guardados correctamente")
        })
                .fail(function (msg) {
                    alerta("rojo", "Error en el sistema por favor comunicarse con el administrador");
                });

    });

    $(".flechaHeader").click(function () {
        var url = "<?php echo base_url("index.php/administrativo/consultaempleadoflechas") ?>";
        var idEmpleadoCreado = $("#emp_id").val();
        var metodo = $(this).attr("metodo");
        var activoActualizar = $("#actualizar").attr("activo");
        $("#actualizar").show();
        $("#btnRegistro").hide();
        $("#guardar").hide();
        if (metodo != "documento") {
            $.post(url, {idEmpleadoCreado: idEmpleadoCreado, metodo: metodo})
                    .done(function (msg) {
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
                        $("#dimension1").val(msg.Dim_id);
                        $("#dimension2").val(msg.Dim_IdDos);
                        $("#cargo").val(msg.Car_id);
                        if ($("#emp_id").val() == "") {
                            $("#actualizar").hide();
                            $("#btnRegistro").show();
                            $("#guardar").show();
                        }
                        $('#incluiraseguradoras').find("#agregarClones").html("");
                        var url2 = "<?php echo base_url("index.php/administrativo/consultaempleadoflechasaseguradora") ?>";
                        $.post(url2, {idEmpleadoCreado: msg.Emp_Id})
                                .done(function (msg) {
                                    if (msg != " null") {
                                        $.each(msg, function (key, val) {
                                            $('#incluiraseguradoras').find("#agregarClones").append(agregarClonAseguradora());
                                            $('#incluiraseguradoras').find("#agregarClones").find(".tipoaseguradora:last").val(val.tipAse_id);
                                            $('#incluiraseguradoras').find("#agregarClones").find(".nombreaseguradora:last").html("<option value='" + val.ase_id + "'>" + val.ase_nombre + "</option>")
                                        });
                                    } else {
                                        $('#incluiraseguradoras').find("#agregarClones").append(agregarClonAseguradora());
                                    }
                                })
                                .fail(function () {
                                    alert("Error al traer empleado");
                                })
                    })
                    .fail(function (msg) {
                        alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
                        $("#actualizar").hide();
                        $("#btnRegistro").show();
                        $("#guardar").show();
                    })

        } else {
            window.location = "<?php echo base_url("index.php/administrativo/listadoempleados"); ?>";
        }

    });

    $('#guardar').click(function () {
        if ((obligatorio('obligatorio') == true) && (email("email") == true))
        {
            $.post("<?php echo base_url('index.php/administrativo/guardarempleado') ?>",
                    $('#f1').serialize()
                    )
                    .done(function (msg) {
                        alerta("verde", "Guardado Correctamente");
                        if (confirm("¿Desea Guardar otro Empleado?")) {
                            $('select,input').val('');
                            $('input[type="checkbox"]').attr("checked", false)
                            $('#tipoaseguradora *').remove();
                            $("#agregarClones").html(agregarClonAseguradora());
                        } else {
                            window.location.href = '<?php echo base_url("index.php/administrativo/listadoempleados") ?>';
                        }
                    }).fail(function (msg) {
                alerta("rojo", "Error en el sistema por favor comunicarse con el administrador");
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

    //--------------------------------------------------------------------------
    //                              GUARDAR REGISTR0
    //--------------------------------------------------------------------------

    $('#guardarRegistro').click(function () {

        if ($('#empReg_carpeta').val() == "") {
            alerta('rojo', 'Campo carpeta obligatorio');
            return false;
        }
        if ($('#archivocarpeta').val() == "") {
            alerta('rojo', 'Documento obligatorio');
            return false;
        }

        var file_data = $('#archivocarpeta').prop('files')[0];
        var form_data = new FormData();
        form_data.append('archivo', file_data);
        form_data.append('empReg_id', $('#empReg_id').val());
        form_data.append('empReg_carpeta', $('#empReg_carpeta').val());
        form_data.append('empReg_version', $('#empReg_version').val());
        form_data.append('empReg_descripcion', $('#empReg_descripcion').val());
        form_data.append('Emp_Id', $('#emp_id').val());
        $.ajax({
            url: '<?php echo base_url("index.php/administrativo/guardarregistroempleado") ?>',
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (result) {
                $('#archivocarpeta').val('')
                $('#collapse_' + $('#empReg_carpeta').val()).find('table tbody *').remove();
                var filas = "";
                var result = jQuery.parseJSON(result);
                $.each(result, function (key, val) {
                    filas += "<tr>";
                    filas += "<td><a target='_blank' href='<?php echo base_url("/uploads/empleado/") ?>/" + val.emp_id + "/" + val.empReg_id + "/" + val.empReg_archivo + "' title='descargar' >" + val.empReg_archivo + "</td>";
                    filas += "<td>" + val.empReg_descripcion + "</td>";
                    filas += "<td>" + val.empReg_version + "</td>";
                    filas += "<td>" + val.nombre + "</td>";
                    filas += "<td>" + val.empReg_tamano + "</td>";
                    filas += "<td>" + val.empgReg_fecha + "</td>";
                    filas += "<td>\n\
                            <i class='fa fa-times eliminar btn-danger' title='Eliminar' empReg_id='" + val.empReg_id + "'></i>\n\
                            <i class='fa fa-pencil-square-o modificar btn-info' title='Modificar' data-target='#myModal2' data-toggle='modal'  emp_id='" + val.empReg_id + "' ></i>\n\
                         </td>";
                    filas += "</tr>";
                });
                var numero = $('#empReg_carpeta').val();
                $('#collapse_' + numero).find('table tbody').append(filas);
                $('#myModal2').modal("toggle")
            }
        });
    });
    $('body').delegate('.eliminar_usuario', 'click', function () {
        var tareas = $(this).attr('tareas');
        var planes = $(this).attr('planes');
        if (planes > 0) {
            alerta('rojo', 'El usuario tiene planes asignados');
            return false;
        }
        if (tareas > 0) {
            alerta('rojo', 'El usuario tiene tareas sin finalizar');
            return false;
        }

        var boton = $(this);
        if (confirm("Esta seguro de eliminar el empleado?")) {
            $.post("<?php echo base_url("index.php/administrativo/eliminarempleado"); ?>"
                    , {id: $(this).attr('emp_id')}
            ).done(function (msg) {
                alerta("verde", "Eliminado Correctamente");
                location.href = "<?php base_url('index.php/administrativo/creacionempleados') ?>";
            }).fail(function (msg) {
                alerta("rojo", "Error en el sistema por favor verificar la conexion de internet");
            })
        }

    })
    $("body").on("click", "#guardarInc", function () {
        var url = "<?php echo base_url("index.php/administrativo/guardarincapacidad"); ?>";
        var valores = $("#crearIncapacidad").serialize();
        if (obligatorio('obligatorioInc') == true) {
            if (difFechaIncapacidad("#fechaInicioInc", "#fechaFinalInc") > 0) {
                $.post(url, valores)
                        .done(function (msg) {
                            if (!jQuery.isEmptyObject(msg.message))
                                alerta("amarillo", msg['message'])
                            else {
                                $("#crearIncapacidad").find("input[type='text']").val("");
                                $("#crearIncapacidad").find("select").val("");
                                $("#crearIncapacidad").find("textarea").val("");
                                tabla(msg.Json);
                                $('#modalIncapacidad').modal('hide');
                                alerta("verde", "Incapacidad Guardada");
                            }
                        })
                        .fail(function (msg) {
                            alerta("rojo", "Error guardar incapacidad")
                        })
            }
        }
    });
    function tabla(msg) {
        var tbody = "";
        $.each(msg, function (indice, valor) {
            tbody += "<tr>";
            tbody += "<td>" + valor.responsable + "</td>";
            tbody += "<td>" + valor.fechaInicio + "</td>";
            tbody += "<td>" + valor.fechaFinal + "</td>";
            tbody += "<td>" + valor.dias + "</td>";
            tbody += "<td>" + valor.motivo + "</td>";
            tbody += "<td>" + valor.observacion + "</td>";
            tbody += "<td>" + valor.usuario + "</td>";
            tbody += "</tr>";
        });
        $("#tablaIncapacidad *").remove();
        $("#tablaIncapacidad").html(tbody);
    }
</script>    