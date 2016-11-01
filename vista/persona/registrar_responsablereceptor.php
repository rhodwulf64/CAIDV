<?php
include('../clases/update2016/clase_responsablereceptor.php');
$lobjresponsablereceptor = NEW clsResponsablereceptor();
$id=(isset($_GET['id']))?$_GET['id']:"";
$lobjresponsablereceptor->set_responsablereceptor($id);
$Datos_Instrumento = $lobjresponsablereceptor->consultar_responsablereceptor_especifico();
$OnKey='';
if($Datos_Instrumento)
{
    $operacion='editar_responsablereceptor';
    $titulo   ='Consultar Responsable Receptor';
}
else
{
    $operacion='registrar_responsablereceptor';
    $titulo   ='Registrar Responsable Receptor';
}

?> 
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3><?php print($titulo); ?></h3>
    <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá registrar el Responsable Receptor que utilizará el sistema..</li>
            <li>Sí necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
    <form class="formulario" action="../controlador/control_responsablereceptor.php" method="POST" name="form_responsablereceptor">
        <input type="hidden" value="<?php print($operacion);?>" name="operacion" />
        <input type="hidden" value="<?php print($Datos_Instrumento['idTresponsableente']);?>" name="idinstrumento" />
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Nacionalidad <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nacionalidad a la cual pertenece el responsables receptor."><i class="fa fa-question" ></i></span></label>
                <select name="txtNacionalidadper" id="txtNacionalidadper">
                    <option value="V" <?php if($Datos_Instrumento['nacionalidadper']=="V"){print('SELECTED');}?>>VENEZOLANO/A</option>
                    <option value="E" <?php if($Datos_Instrumento['nacionalidadper']=="E"){print('SELECTED');}?>>EXTRANJERO/A</option>
                </select>
            </div>
            <div class="col-lg-6 span6">
                <label>Cédula <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cédula de el responsables receptor."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12" maxlength="9" minlength="6" name="txtCedula" id="txtCedula"  <?php print($OnKey); ?> value="<?php print($Datos_Instrumento['cedula']);?>" required/>
                <div style="float:right" id="status"></div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Nombres <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Primer nombre del responsables receptor."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12"  name="txtNombrefull" id="txtNombrefull" required value="<?php print($Datos_Instrumento['nombrefull']);?>"/>
            </div>
            <div class="col-lg-6 span6">
                <label>Apellidos <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Primer apellido del responsables receptor."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12"  name="txtApellidofull" id="txtApellidofull" required value="<?php print($Datos_Instrumento['apellidofull']);?>"/>
            </div>
        </div> 
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Ente Receptor <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Asignatura para la cual se usará el instrumento."><i class="fa fa-question" ></i></span></label>
                
               <select name="txtEnteExterno" id="txtEnteExterno" class="span12" required>
                    <option value="">SELECCIONE UN ENTE RECEPTOR</option>
                    <?php 
                    print $loFuncGenerales->fnComboEnteReceptor($Datos_Instrumento['idFenteExterno']);
                    ?>
                </select>
            </div>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Aceptar" onclick="return validar();">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=persona/responsablereceptor';">
        </div>
    </form>
</div>
<script type="text/javascript">
    $('#dp3').datepicker();
    $(function(){
    $("#txtCedula").lemez_aceptar("numero","btn_enviar");
    $("#txtNombrefull").lemez_aceptar("texto","btn_enviar");
    $("#txtApellidofull").lemez_aceptar("texto","btn_enviar");
    });

    $("#txtCedula").change(function() { 

    var valor = $("#txtCedula").val();

            $("#status").html('<img src="../media/img/loader.gif" align="absmiddle">&nbsp;Analizando...');

                $.ajax({  
                    type: "POST",  
                    url: "../controlador/control_responsablereceptor.php",  
                    data: {txtCedula:valor,operacion:"verificar"},  
                    success: function(msg){
                            if(msg == '1')
                            {
                                $("#status").hide();
                                $("#txtCedula").val('');
                                $("#btn_enviar").prop( "disabled", true );
                                Notifica_Error('Ya existe un Responsable Receptor con esta cedula.');                              
                            }
                            else
                            {
                                $("#status").hide();
                                $("#btn_enviar").prop( "disabled", false );
                                $(this).html(msg);
                            }
                    }
                });
        });

    function validar()
    {
        var fecha_nacimiento = $("#cam_fechanacimientoper").val();
        var cedula = $("#txtCedula").val();
        var telefono = $("#cam_telefonoper").val();
        var fechaActual = new Date()
        var diaActual = fechaActual.getDate();
        var mmActual = fechaActual.getMonth() + 1;
        var yyyyActual = fechaActual.getFullYear();
        FechaNac = fecha_nacimiento.split("-");
        var diaCumple = FechaNac[0];
        var mmCumple = FechaNac[1];
        var yyyyCumple = FechaNac[2];
        //retiramos el primer cero de la izquierda
        if (mmCumple.substr(0,1) == 0) {
        mmCumple= mmCumple.substring(1, 2);
        }
        //retiramos el primer cero de la izquierda
        if (diaCumple.substr(0, 1) == 0) {
        diaCumple = diaCumple.substring(1, 2);
        }
        var edad = yyyyActual - yyyyCumple;

        //validamos si el mes de cumpleaños es menor al actual
        //o si el mes de cumpleaños es igual al actual
        //y el dia actual es menor al del nacimiento
        //De ser asi, se resta un año
        if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
        edad--;
        }
        
        if(cedula.length<6)
        {
            Notifica_Error('Cédula invalida, debe ingresar una cédula valida.');
            $("#txtCedula").focus();
            return false;
        }
        else if(telefono.length<11)
        {
            Notifica_Error('Telefono invalido, debe ingresar un telefono valido de 11 caracteres.');
            $("#cam_telefonoper").focus();
            return false;
        }
        else if((edad>=18) && (edad<=90))
        {
            return true;
        }
        else
        {
            Notifica_Error('El personal es menor de edad o tiene una fecha de nacimiento incorrecta, debe indicar una fecha de nacimiento valida.');
            $("#cam_fechanacimientoper").focus();
            return false;
        }
    }
</script>