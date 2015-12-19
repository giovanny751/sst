<script src="<?php echo  base_url('js/jquery.js') ?>"></script>
<script src="<?php echo  base_url('js/jquery-1.9.1.js') ?>"></script>
<script src="<?php echo  base_url('js/jquery-ui.js') ?>"></script>


<table cellspacing="9" cellpadding="4">
    <tr>
        <td>Usuario</td>
        <td colspan="3"><input type="text" id="usuario" name="usuario" placeholder="Usuario"></td>
    <tr>    
    <tr>
        <td>Contraseña</td>
        <td><input type="text" id="contrasena" name="contrasena" placeholder="Contraseña"></td>
        <td>Repetir Contraseña</td>
        <td><input type="text" id="segundacontrasena" name="segundacontrasena" placeholder="Contraseña"></td>
    <tr>    
    <tr>
        <td>Primer Nombre</td>
        <td><input type="text" id="nombre" name="nombre" placeholder="Primer Nombre"></td>
        <td>Segundo Nombre</td>
        <td><input type="text" id="segundonombre" name="segundonombre" placeholder="Segundo Nombre"></td>
    <tr>    
    <tr>
        <td>Primer Apellido</td>
        <td><input type="text" id="apellido" name="apellido" placeholder="Primer Apellido"></td>
        <td>Segundo Apellido</td>
        <td><input type="text" id="segundoapellido" name="segundoapellido" placeholder="Segundo Apellido"></td>
    <tr>    
    <tr>
        <td>Correo Electronico</td>
        <td><input type="text" id="correo" name="correo" placeholder="Correo"></td>
        <td>Otro Correo</td>
        <td><input type="text" id="otrocorreo" name="otrocorreo" placeholder="Correo"></td>
    <tr>
    <tr>
        <td colspan="4" align="right"><button type="button" id="guardar">Guardar</button></td>
    </tr>    
</table>
<script>
    $('#guardar').click(function(){
        var nombre = $('#nombre').val();
        var usuario = $('#usuario').val();
        var contrasena = $('#contrasena').val();
        var segundacontrasena = $('#segundacontrasena').val();
        var segundonombre = $('#segundonombre').val();
        var apellido = $('#apellido').val();
        var segundoapellido = $('#segundoapellido').val();
        var correo = $('#correo').val();
        var otrocorreo = $('#otrocorreo').val();
        
        if(contrasena == segundacontrasena){
        
        var url = "<?php echo  base_url('index.php/presentacion/guardausuario') ?>";
        
        $.post(url,{contrasena : contrasena,usuario : usuario,nombre : nombre,segundonombre : segundonombre, apellido : apellido, segundoapellido : segundoapellido,
            correo : correo,otrocorreo : otrocorreo
        },function(data){
            window.location.href = "<?php echo  base_url('index.php/presentacion/index') ?>"; 
        });
        }else{
            
        }
    });
</script>    