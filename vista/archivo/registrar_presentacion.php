<?php

    require_once("../clases/clase_presentacion.php");
    $lobjpresentacion=new clspresentacion;
    $id=(isset($_GET['id']))?$_GET['id']:"";
    $lobjpresentacion->set_presentacion($id);
    $presentacions= $lobjpresentacion->consultar_presentacions_inactivos();
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Registrar presentación</h3>
        <div class="alert alert-info">
            <ul>
                <li>En este formulario podrá registrar la presentación.</li>
                <li>Si necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
            </ul>
        </div>
    <form class="formulario" action="../controlador/control_presentacion.php" method="POST" name="form_presentacion">
        <input type="hidden" value="registrar_presentacion" name="operacion" />
        <input type="hidden"  name="idpresentacion" id="cam_idpresentacion"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
            <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre de la presentación."><i class="fa fa-question" ></i></span></label>
            <input type="text" name="nombrepresentacion" maxlength="30" id="cam_nombrepresentacion" data-step="1" data-intro="Ingrese el nombre de la presentación" data-position="right" required/>
            </div>
        </div>
        <div class="botonera">
        <input type="submit" data-step="2" onclick="return validar_todo()" data-intro='Haga clic en <button class="btn btn-success">Aceptar</button> para guardar la presentación ingresada' data-position="top" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Aceptar">
        <input type="button" data-step="3" data-intro='Haga clic en <button class="btn btn-danger">Regresar</button> para regresar al listado de presentaciones' data-position="top" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=archivo/presentacion';">
        </div>
    </form>
</div>

<?php
            for($i=0;$i<count($presentacions);$i++)
            {
                ?>
                    <input type="hidden" value="<?php print($presentacions[$i][1]);?>" name="nombres[]" />
                <?php
            }
        ?>
<script type="text/javascript">
$(function(){
$("#cam_nombrepresentacion").lemez_aceptar("texto","btn_enviar");
$("#cam_abrpresentacion").lemez_aceptar("texto","btn_enviar");
});

function Mensaje(e){
    swal(e);
}
function validar_todo()
{

    nombre_presentacion=document.getElementById('cam_nombrepresentacion');
    nom_presentacions = document.getElementsByName('nombres[]');
        for(i=0;i<nom_presentacions.length;i++)
        {
            if(nom_presentacions[i].value.toUpperCase()==nombre_presentacion.value.toUpperCase())
            {
                Mensaje('Debe ingresar un nombre distinto, este ya se encuentra registrado.');
                nombre_presentacion.value='';
                nombre_presentacion.focus();
                return false;
            }
        }
         if((nombre_presentacion.value[0] == ' ' || nombre_presentacion.value[nombre_presentacion.value.length-1] == ' ') || nombre_presentacion.value.match(/\s\s/ )){
            Mensaje('No puede escribir solo espacios en el nombre.');
            return false;
        }
       
} 
</script>
