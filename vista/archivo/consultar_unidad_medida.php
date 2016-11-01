<?php

    require_once("../clases/clase_unidad_medida.php");
    $lobjunidad_medida=new clsUnidad_Medida;
    $id=(isset($_GET['id']))?$_GET['id']:"";
    $lobjunidad_medida->set_unidad_medida($id);
    $launidad_medida=$lobjunidad_medida->consultar_unidad_medida();
    $Unidad_Medidas= $lobjunidad_medida->consultar_unidad_medidas_inactivos();
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Modificar unidad de medida</h3>
    <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá consultar y editar la unidad de medida en el sistema.</li>
            <li>Si necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
    <form class="formulario" action="../controlador/control_unidad_medida.php" method="POST" name="form_unidad_medida">
        <input type="hidden"  name="idunidad_medida" id="cam_idunidad_medida" value="<?php echo $launidad_medida[0];?>"/>
        <input type="hidden"  name="compararnom" id="cam_compararnom" value="<?php echo $launidad_medida[1];?>"/>
        <input type="hidden"  name="compararabr" id="cam_compararabr" value="<?php echo $launidad_medida[2];?>"/>
         <div class="row-fluid">
        <div class="col-lg-6 span6">
        <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del unidad de medida."><i class="fa fa-question" ></i></span></label>
        <input type="text" name="nombreunidad_medida" maxlength="15" id="cam_nombreunidad_medida" data-step="1" data-intro="Ingrese el nombre de la unidad de medida" data-position="right" value="<?php echo $launidad_medida[1];?>" required/>
        </div>
         <div class="col-lg-6 span6">
        <label>Abreviatura <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Abreviatura de la Unidad de Medida."><i class="fa fa-question" ></i></span></label>
        <input type="text" name="abrunidad_medida" id="cam_abrunidad_medida" maxlength="8" data-step="2" data-intro="Ingrese la abreviatura de la unidad de medida" data-position="right" value="<?php echo $launidad_medida[2];?>" required/>
        </div>
    </div>
        <div class="botonera">
        <input type="submit" class="btn btn-success" onclick="return validar_todo()" data-step="3" data-intro='Haga clic en <button class="btn btn-success">Guardar</button> para guardar la unidad de medida ingresada' data-position="top" name="btn_enviar" id="btn_enviar" value="Guardar">
        <input type="button" class="btn btn-danger" data-step="4" data-intro='Haga clic en <button class="btn btn-danger">Regresar</button> para regresar al listado de unidades de medidas' data-position="top" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=archivo/unidad_medida';">
        </div>
        <input type="hidden" value="editar_unidad_medida" name="operacion" />
    </form>
</div>
<?php
            for($i=0;$i<count($Unidad_Medidas);$i++)
            {
                ?>
                    <input type="hidden" value="<?php print($Unidad_Medidas[$i][1]);?>" name="nombres[]" />
                    <input type="hidden" value="<?php print($Unidad_Medidas[$i][2]);?>" name="abreviaturas[]" />
                <?php
            }
        ?>
<script type="text/javascript">
$(function(){
$("#cam_nombreunidad_medida").lemez_aceptar("texto","btn_enviar");
$("#cam_abrunidad_medida").lemez_aceptar("texto","btn_enviar");
});

function Mensaje(e){
    swal(e);
}

function validar_todo()
{
    abreviatura_unidad_medida=document.getElementById('cam_abrunidad_medida');
    abr_unidad_medidas = document.getElementsByName('abreviaturas[]');
    nombre_unidad_medida=document.getElementById('cam_nombreunidad_medida');
    nom_unidad_medidas = document.getElementsByName('nombres[]');
    compararnom=document.getElementById('cam_compararnom');
    compararabr=document.getElementById('cam_compararabr');
        for(i=0;i<nom_unidad_medidas.length;i++)
        {
            if(abr_unidad_medidas[i].value.toUpperCase()==abreviatura_unidad_medida.value.toUpperCase()  && abr_unidad_medidas[i].value.toUpperCase()!==compararabr.value.toUpperCase())
            {
                Mensaje('Debe ingresar una abreviatura distinta, esta ya se encuentra registrada.');
                abreviatura_unidad_medida.value='';
                abreviatura_unidad_medida.focus();
            }
            if(nom_unidad_medidas[i].value.toUpperCase()==nombre_unidad_medida.value.toUpperCase()  && nom_unidad_medidas[i].value.toUpperCase()!==compararnom.value.toUpperCase())
            {
                Mensaje('Debe ingresar un nombre distinto, este ya se encuentra registrado.');
                nombre_unidad_medida.value='';
                nombre_unidad_medida.focus();
            }
        }
         if((abreviatura_unidad_medida.value[0] == ' ' || abreviatura_unidad_medida.value[abreviatura_unidad_medida.value.length-1] == ' ') || abreviatura_unidad_medida.value.match(/\s\s/ )){
            Mensaje('No puede escribir solo espacios en la abreviatura.');
            return false;
        }
        if((nombre_unidad_medida.value[0] == ' ' || nombre_unidad_medida.value[nombre_unidad_medida.value.length-1] == ' ') || nombre_unidad_medida.value.match(/\s\s/ )){
            Mensaje('No puede escribir solo espacios en el nombre de de la unidad de medida.');
            return false;
        }
} 
</script>