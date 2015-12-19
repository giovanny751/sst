<script src="<?php echo  base_url('js/jquery.js') ?>"></script>
<script src="<?php echo  base_url('js/jquery-1.9.1.js') ?>"></script>
<script src="<?php echo  base_url('js/jquery-ui.js') ?>"></script>
<link rel="stylesheet" href="<?php echo  base_url('css/jquery-ui.css') ?>" type="text/css" media="screen"/>
<h2 align="center">Administración Modulo</h2>
<br>
<table align="center">
    <thead>
    <th style="width: 200px">Menu</th>
    <th style="width: 200px">Modulo</th>
    <th style="width: 200px">Estado</th>
    <th style="width: 200px">Modificar</th>
</thead>
<tbody>
    <?php foreach ($modulo as $modulos) { ?>
        <tr>
            <td><?php echo  $modulos['NOMBRE_MENU'] ?></td>
            <td><?php echo  $modulos['NOMBRE_MODULO'] ?></td>
            <td><?php if($modulos['ESTADO'] == 1){echo "Activo";}else{echo "Inactivo";} ?></td>
            <td align="center"><button type='button' class="modulo" controlador="<?php echo  $modulos['CONTROLADOR'] ?>" estado="<?php echo  $modulos['ESTADO'] ?>" nombremenu="<?php echo  $modulos['NOMBRE_MENU'] ?>" nombremodulo="<?php echo  $modulos['NOMBRE_MODULO'] ?>" idmenu="<?php echo  $modulos['ID_MENU'] ?>" idmodulo="<?php echo  $modulos['ID_MODULO'] ?>" >Modificar</button></td>
        </tr>
    <?php } ?>
</tbody>
</table>
<div id="menumodulo">
    <table>
        <tr>
            <td style="width: 180px">MENU</td>
            <td id="menu"></td>
        </tr>
        <tr>
            <td>MODULO</td>
            <td><input type="text" id="modulo"></td>
        </tr>
        <tr>
            <td>CONTROLADOR</td>
            <td><input type="text" id="controlador"></td>
        </tr>
        <tr>
            <td>
                ESTADO
            </td>
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
    $('#menumodulo').hide();
    
    $('.modulo').click(function(){
        var idmenu = $(this).attr('idmenu');
        var idmodulo = $(this).attr('idmodulo');
        var nombremenu = $(this).attr('nombremenu');
        var nombremodulo = $(this).attr('nombremodulo');
        var controlador = $(this).attr('controlador');
        var estado = $(this).attr('estado');
        
        $('#menu').text(nombremenu);
        $('#controlador').val(controlador);
        $('#modulo').val(nombremodulo);
        $('#estado').val(estado);
        
        $('#menumodulo').dialog({
            autoOpen : true,
            width : 500,
            title : "Modulo",
            buttons : [{
                    id : "guardar",
                    text : "Guardar",
                    click : function(){
                        
                       var estadoguardado =  $('#estado').val();
                       var nombremoduloguardado = $('#modulo').val();
                       var controladorguardado = $('#controlador').val();
                       var url = "<?php echo  base_url('index.php/presentacion/guardamodulo') ?>"
                       $.post(url,{idmenu : idmenu , idmodulo : idmodulo, nombremoduloguardado : nombremoduloguardado, 
                       estadoguardado : estadoguardado,controladorguardado : controladorguardado
                            }); 
                    }
            }]
        });
    });
    
</script>    
    