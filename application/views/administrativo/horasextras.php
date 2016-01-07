<div class="row">
    <div class="circuloIcon guardar"><i class="fa fa-floppy-o fa-3x"></i></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tituloCuerpo">
            <span class="txtTitulo">
                <a href="<?php echo base_url("index.php/presentacion/principal") ?>">EMPLEADO</a>/
                <a href="<?php echo base_url("index.php/administrativo/empresa") ?>">HORAS EXTRAS</a>/
            </span>
        </div>
    </div>
</div>
<div class='cuerpoContenido'>
    <div class="row">
        <label>Empleado</label>
        <div class="">
            <select name="empleado" id="empleado" class="form-control">
                <option>::Seleccionar::</option>
                <?php foreach($empleados as $e): ?>
                <option value="<?php echo $e->Emp_Id ?>"><?php echo $e->Emp_Nombre." ".$e->Emp_Apellidos ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <label for="horas">
            Fecha
        </label>
        <div class="">
            <input type="text" name="fecha" id="fecha" class="form-control fecha"/>
        </div>
        <label for="horas">
            Cantidad Horas
        </label>
        <div class="">
            <input type="number" name="horas" id="horas" class="form-control"/>
        </div>
        <label for="horas">
            Tipo
        </label>
        <div class="">
            <select name="">
                <option value="">::Seleccionar::</option>
                <?php foreach($tipo as $t): ?>
                <option value="<?php echo $t->horExtTip_id ?>"><?php echo $t->horExtTip_tipo ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>