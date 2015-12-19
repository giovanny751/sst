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
<div class='cuerpoContenido container'>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label><b>A. INFORMACIÓN GENERAL</b></label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Empresa:</label>  
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" name="empresa" id="empresa" class="form-control">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Pais:</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" name="pais" id="pais" class="form-control">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Reporte No.</label>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <input type="text" name="reporte" id="reporte" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Lugar:</label>  
        </div>
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
            <input type="text" name="lugar" id="lugar" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Area:</label>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <input type="text" name="area" id="area" class="form-control">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Zona:</label>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <input type="text" name="zona" id="zona" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Jefe Inmediato:</label>
        </div>
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
            <input type="text" name="jefe" id="jefe" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label>1. Tipo de Evento: </label>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Accidente</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="checkbox" name="evento" id="accidento">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Incidente</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="checkbox" name="evento" id="incidente">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label>2. Clase de Eventos: </label>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Lesión Personal</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="checkbox" name="claseEven" id="lesion">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Daño a la Propiedad</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
           <input type="checkbox" name="claseEven" id="daño"> 
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Agente de Riesgo Cod.</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="checkbox" name="claseEven" id="agente">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Impacto Ambiental</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="checkbox" name="claseEven" id="impacto">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Seguridad Víal</label> 
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="checkbox" name="claseEven" id="seguridad">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Incendio</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="checkbox" name="claseEven" id="incendio">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label><b>B. DESCRIPCIÓN DEL ACCIDENTE</b></label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>3. Lesionado:</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" name="lesionado" id="lesionado" class="form-control">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>4. Cédula No.</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" name="cedula" id="cedula" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>5. Ocupación</label> 
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <input type="text" name="ocupacion" id="ocupacion" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>6. Parte del Cuerpo Afectada:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="cuerpo" id="cabeza">  
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
           <label>Cabeza</label> 
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="cuerpo" id="torax">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Torax</label> 
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
           <input type="checkbox" name="cuerpo" id="abdomen"> 
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Abdomen</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
           <input type="checkbox" name="cuerpo" id="brazo"> 
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Brazo</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="cuerpo" id="mano">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Mano</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="cuerpo" id="ojos">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Ojos</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="cuello" id="cuello">  
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Cuello</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="espalda" id="espalda">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Espalda</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="pierna" id="pierna">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Pierna</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="pie" id="pie">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Pie</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="partesmul" id="partesmul">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Partes Multiples</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label>7. Sitio o Lugar del Accidente: </label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <input type="text" name="sitio" id="sitio" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <label>8. Hora y Fecha del Accidente</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label>9. Accidente reportado por(nombre):</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label>10. Cargo de quien reporto</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="center">
            <label>Hr</label>
            <input type="text" name="hora" id="hora" class="form-control">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="center">
            <label>Min</label>
            <input type="text" name="minutos" id="minutos" class="form-control">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
            <label>Fecha</label>
            <input type="date" name="fecha" id="fecha" class="fecha form-control">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" name="accidenterepo" id="accidenterepo" class="form-control">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" name="cargorepo" id="cargorepo" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>11. Descripción de lo ocurrido:<i>(posición,personas,partes,documentos)</i></label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <textarea id="descripcion" class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>12. Tipo de Riesgo:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="fisico" id="fisico">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Fisico</label>  
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="explocion" id="explocion">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Incendio y Exploción</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
           <input type="checkbox" name="biologico" id="biologico"> 
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Biologico</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="locativo" id="locativo">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Locativos</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="mecanico" id="mecanico">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Mecanico</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="quimico" id="quimico">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Quimico</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="psicosociales" id="psicosociales">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <label>Psicosociales</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="ergonomico" id="ergonomico">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Ergonomico</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="electrico" id="electrico">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Electrico</label>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" align="right">
            <input type="checkbox" name="trafico" id="trafico">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <label>Trafico</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label><b>C. INFORMACIÓN DEL REPORTE</b></label>
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <label>13. Fecha del Reporte</label>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label>14. Reporte Elaborado por(nombre):</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <label>15. Cargo de quien elaboro el reporte</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" align="center">
            <label>Fecha</label>
            <input type="date" name="fecharep" id="fecharep" class="fecha form-control">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <input type="text" name="reporteelabor" id="reporteelabor" class="form-control">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input type="text" name="cargoeleb" id="cargoeleb" class="form-control">
        </div>
    </div>
</div>
<br>
<br>
<br>
