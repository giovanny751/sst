<div class="row">
    <div class="col-md-6">
        <!-- <div class="circuloIcon" id="guardartarea"><i class="fa fa-floppy-o fa-3x"></i></div>
        <div class="circuloIcon" id="guardartarea" ><i class="fa fa-pencil-square-o fa-3x"></i></div>
        <div class="circuloIcon" ><i class="fa fa-trash-o fa-3x"></i></div> -->
        <a href="<?php echo base_url()."/index.php/tareas/nuevatarea" ?>"><div class="circuloIcon" title="Nueva Tarea" ><i class="fa fa-folder-open fa-3x"></i></div></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tituloCuerpo">
            <span class="txtTitulo">LISTADO TAREAS</span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <div class="row">
        <form method="post" id="f9">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="Plan">Plan</label>
                <select name="Plan" id="Plan" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($planes as $p) { ?>
                        <option value="<?php echo $p->pla_id ?>"><?php echo $p->pla_nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="filtrotarea">Filtro Tareas</label>
                <select name="filtrotarea" id="filtrotarea" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($tareas as $t) { ?>
                        <option value="<?php echo $t->tar_id ?>"><?php echo $t->tar_nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="responsable">Responsable</label>
                <select name="responsable" id="responsable" class="form-control">
                    <option value="">::Seleccionar::</option>
                    <?php foreach ($responsables as $r) { ?>
                        <option value="<?php echo $r->emp_id ?>"><?php echo $r->Emp_Nombre . " " . $r->Emp_Apellidos ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label for="responsable">Tipo Riesgo</label>
                <select name="responsable" id="responsable" class="form-control">
                    <option value="">::Seleccionar::</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div style="margin-top: 28px"><button type="button" class="btn-sst" id="consultar">Consultar</button></div>
            </div>
        </form>
    </div>
    <div class="row" id='filtroconsulta'>
        
    </div>
</div>
<form method="post" id="f13" action="<?php echo base_url("index.php/tareas/nuevatarea") ?>">
    <input type="hidden" name="tar_id" id="tar_id">
</form>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Riesgos</h4>
      </div>
      <div class="modal-body">
          <div class="resultado"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
    $('body').delegate('.modificar', "click", function () {
        $('#tar_id').val($(this).attr('tar_id'));
        $('#f13').submit();
    });
    $('.limpiar').click(function () {
        $('select,input').val("");
    });
    
    $('body').delegate(".nuevoavance","click",function(){
        var form = "<form method='post' id='frmFormAvance' action='<?php echo base_url("index.php/tareas/nuevatarea")?>'>";
            form += "<input type='hidden' name='tar_id' value='"+$(this).attr("tar_id")+"'>"
            form += "<input type='hidden' name='nuevoavance' value='"+$(this).attr("tar_id")+"'>"
            form += "</form>";
            $("body").append(form);
            $('#frmFormAvance').submit();
    });
    
    $('#consultar').click(function () {
        $.post("<?php echo base_url("index.php/tareas/consultatareas") ?>",
                $('#f9').serialize()
                ).done(function (msg) {
                    $('#filtroconsulta *').remove();
            var table = "";        
            $.each(msg, function (idplan, nombreplan) {
                table += "<table class='tablesst'>";
                $.each(nombreplan, function (nombre, tareaid) {
                    table += "<thead><tr><th colspan='12'>"+nombre+"</th></tr>";
                        table += "<tr>";
                        table += "<th>AGREGAR AVANCE</th>"
                        table += "<th>AVANCE</th>"
                        table += "<th>TIPO</th>"
                        table += "<th>NOMBRE DE LA TAREA</th>"
                        table += "<th>FECHA INICIO</th>"
                        table += "<th>FECHA FIN</th>"
                        table += "<th>DURACIÓN PRESUPUESTADA</th>"
                        table += "<th>RESPONSABLES</th>"
                        table += "<th># RIESGOS</th>"
                        table += "<th>RIESGOS</th>"
                        table += "<th>EDITAR</th>"
                        table += "<th>ELIMINAR</th>"
                        table += "</tr>";
                        table += "</thead>";
                        table += "<tbody>";
                    $.each(tareaid, function (idtar, detalle) {
                        if(idtar != ""){
                        $.each(detalle, function (nombre, numeracion) {
                            if (typeof numeracion != "string"){
                                    table += "<tr>";
                                    table += '<td style="text-align:center"><i class="fa fa-bookmark-o btn btn-default nuevoavance" title="Nuevo avance" tar_id="'+ idtar+'" ></i></td>';
                                    table += "<td></td>";
                                    table += "<td>"+numeracion.tipo+"</td>";
                                    table += "<td>"+numeracion.nombretarea+"</td>";
                                    table += "<td>"+numeracion.fechainicio+"</td>";
                                    table += "<td>"+numeracion.fechafinalizacion+"</td>";
                                    table += "<td style='text-align:center;'>"+numeracion.diferencia+"</td>";
                                    table += "<td>"+numeracion.nombre+"</td>";
                                    table += "<td>"+numeracion.cantidadriesgo+"</td>";
                                    table += '<td class="transparent">';
                                    table += '<center><i class="fa fa-file-text-o fa-2x  riesgos" title="Riesgos" tar_id="'+ idtar+'"  data-toggle="modal" data-target="#myModal"></i>';
                                    table += "</td>";
                                    table += '<td class="transparent">';
                                    table += '<i class="fa fa-pencil-square-o fa-2x  modificar" title="Modificar" tar_id="'+ idtar+'" ></i>';
                                    table += "</td>";
                                    table += '<td class="transparent">';
                                    table += '<i class="fa fa-trash-o fa-2x eliminar" title="Eliminar" tar_id="'+ idtar+'" ></i>';
                                    table += "</td>";
                                    table += "</tr>";
                            }
                        });
                        }else{
                            table += "<tr>";
                            table += "<td colspan='12'><center><b>No hay tareas asociadas al plan</b></center></td>";
                            table += "</tr>";
                        }
                    });
                });
                table += "</tbody>";
                table += "</table>"
            });
            $('#filtroconsulta').append(table);
        }).fail(function (msg) {
            alerta("rojo", "Error, por favor comunicarse con el administrador del sistema");
        });
    });
    
    $('body').delegate(".riesgos","click",function(){
        var seleccion = $(this)
        $.post(
                "<?php echo base_url("index.php/tareas/obtener_riesgos") ?>",
                {tar_id : $(this).attr("tar_id")}
                ).done(function(msg){
                    if(msg==1){
                        $('.resultado').html('No se encontraron riesgos para esta tarea');
                    }else{
                        var datos=JSON.parse(msg);
                        var  html="<ul>";
                        $.each(datos,function(key,val){
                            html+="<li>"+val.rie_descripcion+"</li>";
                        })
                        html+="</ul>";
                        $('.resultado').html(html);
                    }
                    
                }).fail(function(msg){
                    alerta("rojo","Error, por favor comunicarse con el administrador del sistema")
                });
    
    });
    $('body').delegate(".eliminar","click",function(){
        var seleccion = $(this)
        $.post(
                "<?php echo base_url("index.php/tareas/eliminartarea") ?>",
                {tarea : $(this).attr("tar_id")}
                ).done(function(msg){
                    seleccion.parents("tr").remove();
                    alerta("verde","Tarea eliminada correctamente")
                }).fail(function(msg){
                    alerta("rojo","Error, por favor comunicarse con el administrador del sistema")
                });
    
    });
</script>