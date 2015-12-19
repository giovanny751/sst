<div class="row" align="center">
    <h3>CREACION DE AREAS</h3>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label>Nombre Area</label><input type="text" class="form-control" id="area" name="area">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button type="button" class="btn btn-success" id="guardararea">Guardar</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label>Area</label>
        <select class="form-control" id="areascreadas">
            <?php foreach ($cargos as $cargo) { ?>
                <option value="<?php echo $cargo['are_id'] ?>"><?php echo $cargo['are_area'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label>Cargo</label><input type="text" class="form-control" id="cargo" name="cargo">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button type="button" class="btn btn-success" id="guardarcargo">Guardar</button>
    </div>
</div>
<div class="row" align="center">
    <h3>CREACION DE PAISES</h3>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label>Nombre Pais</label><input type="text" class="form-control" id="pais" name="pais">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button type="button" class="btn btn-success" id="guardarpais">Guardar</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label>Pais</label>
        <select class="form-control" id="paiscreadas">
            <?php foreach ($pais as $paises) { ?>
                <option value="<?php echo $paises['pai_id'] ?>"><?php echo $paises['pai_nombre'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label>Ciudad</label><input type="text" class="form-control" id="ciudad" name="ciudad">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button type="button" class="btn btn-success" id="guardarciudad">Guardar</button>
    </div>
</div>

<div class="row" align="center">
    <h3>TIPO PRODUCTO</h3>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label>Tipo Producto</label><input type="text" class="form-control" id="producto" name="producto">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button type="button" class="btn btn-success" id="guardarproducto">Guardar</button>
    </div>
</div>

<script>

    $('#guardararea').click(function () {

        var area = $('#area').val();

        var url = "<?php echo base_url('index.php/presentacion/guardararea'); ?>";

        $.post(url, {area: area}, function (data) {

            $('#areascreadas *').remove();

            var areas = '';

            $.each(data, function (key, val) {
                areas += "<option values='" + val.are_id + "'>" + val.are_area + "</option>";
            });

            $('#areascreadas').append(areas);
        });

    });
    $('#guardarcargo').click(function () {

        var area = $('#areascreadas').val();
        var cargo = $('#cargo').val();

        var url = "<?php echo base_url('index.php/presentacion/guardarcargo'); ?>";
        $.post(url, {area: area, cargo: cargo}, function (data) {



        });
    });

    $('#guardarpais').click(function () {

        var pais = $('#pais').val();

        var url = "<?php echo base_url('index.php/presentacion/guardarpais'); ?>";
        $.post(url, {pais: pais}, function (data) {
            $('#paiscreadas *').remove();

            var areas = '';

            $.each(data, function (key, val) {
                areas += "<option values='" + val.pai_id + "'>" + val.pai_nombre + "</option>";
            });

            $('#paiscreadas').append(areas);
        });
    });

    $('#guardarciudad').click(function () {

        var pais = $('#paiscreadas').val();
        var ciudad = $('#ciudad').val();

        var url = "<?php echo base_url('index.php/presentacion/guardarciudad'); ?>";
        $.post(url, {pais: pais, ciudad: ciudad}, function (data) {



        });
    });

    $('#guardarproducto').click(function () {

        var tipoproducto = $('#producto').val();
        //                                        / Controlador/Funcion
        var url = "<?php echo base_url('index.php/presentacion/guardartipoproducto'); ?>";
        $.post(url, {tipoproducto: tipoproducto}, function (data) {
            
        });
    });

</script>