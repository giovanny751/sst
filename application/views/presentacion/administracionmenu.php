<script src="<?php echo  base_url('js/jquery.js') ?>"></script>
<script src="<?php echo  base_url('js/jquery-1.9.1.js') ?>"></script>
<script src="<?php echo  base_url('js/jquery-ui.js') ?>"></script>
<link rel="stylesheet" href="<?php echo  base_url('css/jquery-ui.css') ?>" type="text/css" media="screen"/>
<style>
    th{
        width: 200px
    }
</style>    
<h2 align="center">ADMINISTRADOR MENU</h2>
<br>
<table align="center">
    <thead>
        <th>Nombre Menu</th>
        <th>Estado</th>
        <th align="center">Modificar</th>
    </thead>
    <tbody>
        <?php foreach($menu as $principal){?>
        <tr>
            <td><?php echo  $principal['NOMBRE_MENU'] ?></td>
            <td><?php  if($principal['ESTADO'] == 1){echo "Activo";}else{ echo "Inactivo";} ?></td>
            <td align="center"><button type="button" estado="<?php echo  $principal['ESTADO'] ?>" class="btn btn-success menu" nombre="<?php echo  $principal['NOMBRE_MENU'] ?>" idmenu="<?php echo  $principal['ID_MENU'] ?>">Modificar</button></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div id="alerta" class='modal hide fade modal-body'>
    <table>
        <tr>
            <td style="width: 180px">Nombre</td>
            <td><input type="text" id="nombremenu"></td>
        </tr>
        <tr>     
            <td style="width: 180px">Estado</td> 
            <td>
                <select id="estado">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </td> 
        </tr>
    </table>
</div>
<script>
    
    $('#alerta').hide();
    
    $('.menu').click(function(){
        var nombre = $(this).attr('nombre');
        var estado = $(this).attr('estado');
        $('#estado').val(estado);
        $('#nombremenu').val(nombre);
        $('#alerta').dialog({
            autoOpen : true,
            modal : true,
            width : 500,
            title : "Menu",
            buttons : [{
                    id : "guardar",
                    text : "Actualizar",
                    click : function(){
                        var nombreactualizado = $('#nombremenu').val();
                        var estado = $('#estado').val();
                        $.post("<?php echo  base_url('index.php/presentacion/guardarmenu') ?>",
                        {estado : estado,id : $(this).attr('idmenu') , nombreactualizado : nombreactualizado},function(data){
                              location.reload(true);
                        });
                    }
            }]
        });
    });
</script>    
