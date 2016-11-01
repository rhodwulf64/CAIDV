<?php
include('../clases/update2016/clase_recepcionbn.php');
$loRecepcion = new clsRecepcion();

$fechaHoy=date("d-m-Y");

$id=(isset($_GET['id']))?$_GET['id']:"";
$loRecepcion->set_NroDocumento($id);
$Datos_Consultados = $loRecepcion->consultar_recepcion_bitacora();
$OnKey='';
if($Datos_Consultados)
{
    $operacion='consultar_recepcion';
    $titulo   ='Consultar Recepción';
    $OnKey='readOnly';
}
else
{
    $operacion='recepcion_articulobn';
    $titulo   ='Consultar Recepción';
    $alertaPrimera="Notifica_Error('No se encontró la recepción consultada, intentelo nuevamente.')";
}

?>

<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3><?php print($titulo); ?></h3>
    <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá registrar los bienes recibidos.</li>
            <li>Sí necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
    <form class="formulario" action="../controlador/control_docente.php" method="POST" id="f_recepcion" name="f_recepcion">
    <legend class="label label-info"><h4>Recepción: Datos de Entrada</h4></legend>
    <input type="hidden" value="Recepciones" name="txtSegmento" id="txtSegmento"/>
    <input type="hidden" value="nulo" name="txtAccion" id="txtAccion"/>
    <input type="hidden" value="0" name="txtExito" id="txtExito"/>
    <input type="hidden"  name="txtCodeInsti" id="txtCodeInsti"/>
    <input type="hidden"  name="txtMoviObjeto" id="txtMoviObjeto"/>
    <input type="hidden"  name="txtFila" id="txtFila" value="<?php print count($Datos_Consultados); ?>" />
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Numero de Documento<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cédula de identidad del docente."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12" maxlength="9"  name="txtNroDocumento" id="txtNroDocumento" <?php print($OnKey); ?> value="<?php print($Datos_Consultados['0']['nro_document']);?>" disabled/>
            </div>
                        <div class="col-lg-6 span6">
                <label>Fecha de Llegada<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de nacimiento del docente."><i class="fa fa-question" ></i></span></label>
                <div class="span10 input-append date"  id="dp3" data-date="<?php print $fechaHoy; ?>"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                    <input type="text" class="span12"  name="txtFechaLlegada" size="16" id="txtFechaLlegada" disabled value="<?php print($Datos_Consultados['0']['fecha_mov']);?>" disabled/>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Proveedor<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                <select name="txtProveedor" id="txtProveedor" class="span12" disabled>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosGeneralesActivos("proveedores","id_prov","des_prov","rif_prov","status",$selectedTipoBN); ?>
                </select>
            </div>
            <div class="col-lg-6 span6">
                <label>Responsable de la Recepción<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                <select name="txtResponsable" id="txtResponsable" class="span12" disabled>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosPersonalActivos($selectedPersonal); ?>
                </select>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Motivo<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Motivo de la operación."><i class="fa fa-question" ></i></span></label>
                <select name="txtMotivo" id="txtMotivo" class="span12" disabled>
                    <option value="0">SELECCIONE UN MOTIVO</option>
                    <?php 
                    print $loFuncGenerales->fnComboMotivosGeneral($selectMotivo,"1");
                    ?>
                </select>
            </div>
           <div class="col-lg-6 span6">
                <label>Observación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Código del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                <textarea class="span12" maxlength="9"  name="txtObservacion" id="txtObservacion" disabled><?php print($Datos_Consultados['0']['observacion_mov']);?></textarea>
            </div>
        </div>
    <div> 

         <legend class="label label-success" >
          <button type="button" class="btn btn-success" mame="REFmodoDetalle" id="REFmodoDetalle" data-ModoAejecutar="muestra" onclick="despliegaDetalleBN(this);" disabled><i id="REFmodoDetalleIcon" class="icon-plus icon-white"></i></button>
         <h4 style="display:inline;">Recepción: Detalles del Bien Nacional</h4>
         </legend>
        <div id="bloqueDetalles" style="display: none;">
            <br>
            <div class="row-fluid" id="datos-entrada-bien4">
                <div class="col-lg-6 span6">
                    <label>Codigo del Bien Nac. <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cédula de identidad del docente."><i class="fa fa-question" ></i></span></label>
                    <input type="text" class="span12" maxlength="9"  name="txtCodBN" id="txtCodBN" <?php print($OnKey); ?> value="<?php print($Datos_Consultados['0']['iddocente']);?>"/>
                </div>
                <div class="col-lg-6 span6">
                    <label>Tipo de Bien<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                    <select name="txtTipoBN" id="txtTipoBN" class="span12">
                        <option value="0">SELECCIONE UNA OPCIÓN</option>
                        <?php

                            print $loFuncGenerales->fnCombosGeneralesActivos("tipobn","id_tbien","des_tbien","cod_tbien","status",$selectedTipoBN); 

                        ?> 
                    </select>
                </div>
            </div>
            <div class="row-fluid" id="datos-entrada-bien5">       
                <div class="col-lg-6 span6">
                    <label>Serial. <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cédula de identidad del docente."><i class="fa fa-question" ></i></span></label>
                    <input type="text" class="span12" maxlength="50"  name="txtSerialBN" id="txtSerialBN" <?php print($OnKey); ?> value=""/>
                </div>
                <div class="col-lg-6 span6">
                    <label>Marca <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                    <select name="txtMarcaBN" id="txtMarcaBN" class="span12">
                        <option value="0">SELECCIONE UNA OPCION</option>
                        <?php print $loFuncGenerales->fnComboDependiente("marcabn","id_marca","nom_marca",$selectedMarca,"","","status"); ?>

                    </select>
                </div>
            </div>
            <div class="row-fluid" id="datos-entrada-bien6">        
                <div class="col-lg-6 span6">
                    <label>Modelo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                    <select name="txtModeloBN" id="txtModeloBN" class="span12">
                        <option value="0">SELECCIONE UNA OPCION</option>
                        <?php print $loFuncGenerales->fnComboDependiente("modelobn","id_modelo","nom_modelo",$selectedModelo,"Mo","idFmarca","status"); ?>

                       
                    </select>
                </div>
               <div class="col-lg-6 span6">
                    <label>Descripción <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Código del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                    <textarea class="span12" maxlength="300"  name="txtDescripcionBN" id="txtDescripcionBN"></textarea>
                </div>
            </div>
                    <div class="row-fluid" id="datos-entrada-bien6">
               <div class="col-lg-6 span6">
                    <label>Observación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Código del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                    <textarea class="span12" maxlength="400"  name="txtObservacionBN" id="txtObservacionBN"></textarea>
                </div>
            </div>
                     <div class="row-fluid">
                <div class="col-lg-6 span6">
                    <button type="button" class="btn btn-success" name="btn_agregar" id="btn_agregar" onclick="Agregar();">Agregar <i class="icon-plus icon-white"></i></button>
                </div>
            </div>
            <br>
            <div id="detalle_bn" class="row-fluid" border="2" class="label label-info">       
                <legend class="label label-success">
                    <h4>Recepción: Detalle del Bien Nacional</h4>
                </legend>
            </div>
        </div>
            <!-- <tr><td colspan="3" >-->
            <table cellspacing="5" cellpadding="6%" width="" class="row-fluid" border="0" style="color:#808080">
                <tr>
                    <th id="n1" >N°<hr id="barra_vertical"></th>
                    <th id="n2" >Código BN<hr id="barra_vertical"></th>
                    <th id="n3" >Código Inst.<hr id="barra_vertical"></th>
                    <th id="n4" >Serial del Bien<hr id="barra_vertical"></th>
                    <th style="width: 80px;" id="n5" >Tipo de Bien<hr id="barra_vertical"></th>
                    <th style="width: 60px;" id="n6" >Marca del Bien<hr id="barra_vertical"></th>
                    <th style="width: 60px;" id="n7" >Módelo del Bien<hr id="barra_vertical"></th>
                    <th id="n9" >Descripción<hr id="barra_vertical"></th>
                    <th id="n10" ><?php if(isset($_SESSION["GlobalDetalleDesin"])) echo "Condición"; else echo "Observación"; ?><hr id="barra_vertical"></th>
                    <th id="n11" >Acción<hr id="barra_vertical"></th>
                </tr>
            </table>
            <table border="1" id="tabBienNacional" class="tablaItems">
            <?php 
           $conta=0;
            if (count($Datos_Consultados)>0)
            {
                foreach ($Datos_Consultados AS $bienesN) {
                    $conta++;
                print ('    
                <tr id="estadoTR1" class="active">
                    <td>
                        <textarea class="form-control" name="txtNumeFila'.$conta.'" id="txtNumeFila'.$conta.'" style="resize: none;width:8px;" cols="1" rows="1" disabled="true">'.$conta.'</textarea>

                        </td>
                    <td>
                        <textarea class="form-control" name="txtCodBN'.$conta.'" id="txtCodBN'.$conta.'" style="resize: none;width:55px;" onblur="this.value=this.value.toUpperCase();" cols="1" rows="1" disabled="true">'.$bienesN['cod_bien'].'</textarea>

                        </td>
                    <td>
                        <textarea class="form-control" name="txtCodeInsti'.$conta.'" id="txtCodeInsti'.$conta.'" style="resize: none;width:55px;" cols="1" rows="1" disabled="true">'.$bienesN['id_bien'].'</textarea>

                        </td>
                    <td>
                        <textarea class="form-control" name="txtSerialBN'.$conta.'" id="txtSerialBN'.$conta.'" style="resize: none;width:60px;" onblur="this.value=this.value.toUpperCase();" cols="1" rows="1" disabled="true">'.$bienesN['serial_bien'].'</textarea>

                        </td>
                    <td>
                        <select name="txtTipoBN'.$conta.'" id="txtTipoBN'.$conta.'" data-valorReal="'.$bienesN['id_tbien'].'" class="form-control" style="padding:0px;font-size:8pt;display:block;width:90px;" disabled="true" title="Tipo de Bien Nacional">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>');
                        print $loFuncGenerales->fnCombosGeneralesActivos("tipobn","id_tbien","des_tbien","cod_tbien","status",$bienesN['id_tbien']);                 
                        
                        print ('
                        </select>

                        </td>
                        <td>
                            <select name="txtMarcaBN'.$conta.'" id="txtMarcaBN'.$conta.'" data-valorReal="'.$bienesN['id_marca'].'" class="form-control" disabled="true" title="Marca del Bien Nacional" style="padding:0px;font-size:8pt;display:block;width:70px;">
                            <option value="0">SELECCIONE UNA OPCION</option>');
                        print $loFuncGenerales->fnComboDependiente("marcabn","id_marca","nom_marca",$bienesN['id_marca'],"","","status");                        
                        
                        print ('</select>

                        </td>
                        <td>
                            <select name="txtModeloBN'.$conta.'" id="txtModeloBN'.$conta.'" data-valorReal="'.$bienesN['id_modelo'].'" class="form-control" disabled="true" title="Módelo del Bien Nacional" style="padding:0px;font-size:8pt;display:block;width:70px;">
                            <option value="0">SELECCIONE UNA OPCION</option>');
                        print $loFuncGenerales->fnComboDependiente("modelobn","id_modelo","nom_modelo",$bienesN['id_modelo'],"Mo","idFmarca","status");                        
                        
                        print ('</select>

                        </td>
                        <td>
                            <textarea class="form-control" name="txtDescripcionBN'.$conta.'" id="txtDescripcionBN" style="resize: none;width:78px;" cols="1" rows="1" disabled="true">'.$bienesN['des_bien'].'</textarea>

                            </td>
                        <td>
                            <textarea class="form-control" name="txtObservacionBN'.$conta.'" id="txtObservacionBN" style="resize: none;width:78px;" cols="1" rows="1" disabled="true">'.$bienesN['observacion_bien'].'</textarea>

                            </td>
                        <td>
                        <textarea class="form-control" style="resize: none;width:28px;" cols="1" rows="1" disabled="true"></textarea>
                        </td>
                </tr>

                ');

                }
            }

            ?>
            </table>
            <!--<div  class="span30" id="cabecera-detalle">
                    <span id="n1">N°</span>
                    <span id="n2">Código</span>
                    <span id="n3">Tipo Bien</span>
                    <span id="n4">Descripción</span>
                    <span id="n5">Serial</span>
                    <span id="n6">Marca</span>
                    <span id="n7">Modelo</span>
                    <span id="n8">Precio</span>
                    <span id="n9"><?php if(isset($_SESSION["GlobalDetalleDesin"])) echo "Observación"; else echo "Ubicación"; ?></span>
                    <span id="n10"><?php if(isset($_SESSION["GlobalDetalleDesin"])) echo "Condición"; else echo "Observación"; ?></span>
                    <span id="n"></span>
            </div>-->
        
<!-- ******************************************* Detalle del bien nacional *************************************************-->
    <input type="hidden" id="validarCaberaLlena" name="validarCaberaLlena"> <!-- variable para validar la cabecera -->
    <tr>
        <td colspan="3">
            <div id="topLink">
                <table id="detalle" style="text-align:center;">
                    <!-- pintar detalle dinamico -->
                        <?php if(isset($_SESSION["GlobalDetalleDesin"])) echo $_SESSION["GlobalDetalleDesin"]; ?>
                </table>
            </div> 
        </td>
    </tr><br>
        <div class="botonera">
            <input type="button" class="btn btn-warning" name="btn_enviar" id="btn_enviar" value="Imprimir" onclick="print();">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=inv_bienesnacionales/ver_inventario'">
        </div>
    </div>
    </form>
</div>
<script type="text/javascript">
    var loF=document.f_recepcion;


    $('#dp3').datepicker();
    $(function(){

    $("#txtNroDocumento").lemez_aceptar("todo","btn_enviar");
    $("#txtFechaLlegada").lemez_aceptar("fecha","btn_enviar");
    $("#txtProveedor").lemez_aceptar("numero","btn_enviar");
    $("#txtResponsable").lemez_aceptar("numero","btn_enviar");
    $("#txtMotivo").lemez_aceptar("numero","btn_enviar");

    });

    function BuscarRecepcionporCodigo(VarlorObj)
    {

        if (VarlorObj!="")
        {
            if(VarlorObj.length<3)
            {
                Notifica_Error("Nro Documento inválido, debe ingresar un Nro Documento con mas de 2 digitos.");
            }
            else
            {
                var moviobjeto=document.getElementById("txtMoviObjeto").value;
                document.getElementById("txtAccion").value="BuscarRecepcionExiste";
                document.getElementById("txtExito").value="0";
                document.getElementById("txtNroDocumento").value=document.getElementById("txtNroDocumento").value.toUpperCase();

                var $forme = $("#f_recepcion");

                $.ajax({
                    url: '../controlador/cConsultasAjaxBN.php',
                    dataType: 'json',
                    type: 'post',
                    data: $forme.serialize(),
                    success: function(data)
                    {
                        var Confi=data['Master'];
                        if(Confi.lsExito==1)
                        {
                            Notifica_Error("El Número de Documento '"+document.getElementById("txtNroDocumento").value+"' ya se encuentra registrado.");   
                            document.getElementById("txtNroDocumento").value="";                      
                            document.getElementById("txtNroDocumento").focus();                      
                            document.getElementById("txtNroDocumento").style="border:1px solid red;"; 
                        }
                        else
                        {
                           document.getElementById("txtNroDocumento").style="border:1px solid green;"; 

                        }               
                    }
                });
            }

        }
        else
        {
            document.getElementById("txtNroDocumento").style="border:1px solid red;"; 
            Notifica_Error("No ha ingresado Número de Documento válido.");   
           
        }

    }

    function despliegaDetalleBN(Objeto)
    {
        var modoAejecutar=$(Objeto).attr('data-ModoAejecutar');
        if (Objeto.id=='REFmodoDetalle')
        {
            if (modoAejecutar=='muestra')
            {   

                $('#REFmodoDetalleIcon').attr('class','icon-minus icon-white');
                $(Objeto).attr('data-ModoAejecutar','oculta');
                document.getElementById('bloqueDetalles').style='display:block;';
            }
            if (modoAejecutar=='oculta')
            {
                $('#REFmodoDetalleIcon').attr('class','icon-plus icon-white');
                $(Objeto).attr('data-ModoAejecutar','muestra');
                document.getElementById('bloqueDetalles').style='display:none;';
            }
        }
    }

    function BuscarBNporCodigo(VarlorObj)
    {
        if (VarlorObj!="")
        {

        var moviobjeto=document.getElementById("txtMoviObjeto").value;
        document.getElementById("txtAccion").value="BuscarBNExiste";
        document.getElementById("txtExito").value="0";
        document.getElementById("txtCodBN").value=document.getElementById("txtCodBN").value.toUpperCase();

        var $forme = $("#f_recepcion");

        $.ajax({
            url: '../controlador/cConsultasAjaxBN.php',
            dataType: 'json',
            type: 'post',
            data: $forme.serialize(),
            success: function(data)
            {
                var Confi=data['Master'];
                if(Confi.lsExito==1)
                {
                    Notifica_Error("Este Bien Nacional ya se encuentra registrado.");   
                    document.getElementById("txtCodBN").value="";                      
                    document.getElementById("txtCodBN").focus();                      
                    document.getElementById("txtCodBN").style="border:1px solid red;"; 
                }
                else
                {
                   document.getElementById("txtCodBN").style="border:1px solid green;"; 
                }
               
                
            }
    });

        }
        else
        {
            document.getElementById("txtCodBN").style="border:1px solid orange;"; 
            Notifica_Alerta("No ha ingresado un codigo de BN válido. Este bien se gestionará con su codigo intitucional");     
        }

    }

    function Agregar()
    {
        if (validaBNAgregar()==true)
        {
            fpAgregar();
        }
    }

  


    function fpQuitar(poB)
    {
        var liFila=Number(loF.txtFila.value);
        liLinea=poB.name.substring(9);
        liN=Number(liLinea);
        liN=liN-1;
        document.getElementById("tabBienNacional").deleteRow(liN);
        liN=liN+2
        for(liY=liN;liY<=liFila;liY++)
        {
            liA=liY-1;
            document.getElementById("txtNumeFila"+liY).name="txtNumeFila"+liA;
            document.getElementById("txtCodBN"+liY).name="txtCodBN"+liA;
            document.getElementById("txtCodeInsti"+liY).name="txtCodeInsti"+liA;
            document.getElementById("txtSerialBN"+liY).name="txtSerialBN"+liA;
            document.getElementById("txtTipoBN"+liY).name="txtTipoBN"+liA;
            document.getElementById("txtMarcaBN"+liY).name="txtMarcaBN"+liA;
            document.getElementById("txtModeloBN"+liY).name="txtModeloBN"+liA;
            document.getElementById("txtDescripcionBN"+liY).name="txtDescripcionBN"+liA;
            document.getElementById("txtObservacionBN"+liY).name="txtObservacionBN"+liA;
            document.getElementById("btnQuitar"+liY).name="btnQuitar"+liA;
            document.getElementById("txtNumeFila"+liY).id="txtNumeFila"+liA;
            document.getElementById("txtCodBN"+liY).id="txtCodBN"+liA;
            document.getElementById("txtCodeInsti"+liY).id="txtCodeInsti"+liA;
            document.getElementById("txtSerialBN"+liY).id="txtSerialBN"+liA;
            document.getElementById("txtTipoBN"+liY).id="txtTipoBN"+liA;
            document.getElementById("txtMarcaBN"+liY).id="txtMarcaBN"+liA;
            document.getElementById("txtModeloBN"+liY).id="txtModeloBN"+liA;
            document.getElementById("txtDescripcionBN"+liY).id="txtDescripcionBN"+liA;
            document.getElementById("txtObservacionBN"+liY).id="txtObservacionBN"+liA;
            document.getElementById("btnQuitar"+liY).id="btnQuitar"+liA;
        }
        liFila=liFila-1;
        loF.txtFila.value=liFila;
    }

    function limpiarCamposBN()
    {
       loF.txtCodBN.value=""; 
       loF.txtCodeInsti.value=""; 
       loF.txtSerialBN.value=""; 
       loF.txtTipoBN.value=""; 
       loF.txtMarcaBN.value=""; 
       loF.txtModeloBN.value=""; 
       loF.txtDescripcionBN.value=""; 
       loF.txtObservacionBN.value=""; 
    }


    function evalCampoBN(valor)
    {
        var resulta=false;
        if (valor=="")
        {
            resulta="N/A";
        }
        else
        {
            resulta=valor;
        }
        return resulta;

    }

    function validaBNAgregar()
    {
        var resultado=false;
        var eValidacion=0;

        document.getElementById("txtTipoBN").style="border:1px solid green;"; 

        if(document.getElementById("txtTipoBN").value == "0")
        {
            eValidacion=1;
            document.getElementById("txtTipoBN").style="border:1px solid red;";
            Notifica_Alerta("Seleccione una opción válida"); 
            document.getElementById("txtTipoBN").focus(); 

        }
      
        if (eValidacion==0)
        {
            resultado=true;
        }

        return resultado;

    }

    function GuardarCambios()
    {
        if (ValidarEnvioForm())
        {
            var liFila=Number(loF.txtFila.value);

            for(liY=1;liY<=liFila;liY++)
            {
                document.getElementById("txtCodBN"+liY).disabled=false;
                document.getElementById("txtCodeInsti"+liY).disabled=false;
                document.getElementById("txtSerialBN"+liY).disabled=false;
                document.getElementById("txtTipoBN"+liY).disabled=false;
                document.getElementById("txtMarcaBN"+liY).disabled=false;
                document.getElementById("txtModeloBN"+liY).disabled=false;
                document.getElementById("txtDescripcionBN"+liY).disabled=false;
                document.getElementById("txtObservacionBN"+liY).disabled=false;
            }



        document.getElementById("txtAccion").value="incluirRecepcion";
        document.getElementById("txtExito").value="0";

        var $forme = $("#f_recepcion");

        $.ajax({
            url: '../controlador/cConsultasAjaxBN.php',
            dataType: 'json',
            type: 'post',
            data: $forme.serialize(),
            success: function(data)
            {
                var Confi=data['Master'];
                if(Confi.lsExito==1)
                {
                    
                    
                      Notifica_Logro("Esta Recepción fué guardada con éxito.");
                   

                    for(liY=1;liY<=liFila;liY++)
                    {
                        document.getElementById("txtCodBN"+liY).disabled=true;
                        document.getElementById("txtCodeInsti"+liY).disabled=true;
                        document.getElementById("txtSerialBN"+liY).disabled=true;
                        document.getElementById("txtTipoBN"+liY).disabled=true;
                        document.getElementById("txtMarcaBN"+liY).disabled=true;
                        document.getElementById("txtModeloBN"+liY).disabled=true;
                        document.getElementById("txtDescripcionBN"+liY).disabled=true;
                        document.getElementById("txtObservacionBN"+liY).disabled=true;
                        document.getElementById("btnQuitar"+liY).disabled=true;
                    }

                    setTimeout(function()
                    {
                        if (confirm("Desea registrar una nueva Recepción?"))
                        {
                            fpLimpiarForm();
                        }
                        else
                        {
                            fpDesactivaForm();
                            $("#REFmodoDetalle").attr('data-ModoAejecutar','oculta');
                            $("#REFmodoDetalle").click();
                            $("#REFmodoDetalle").attr('disabled','true');

                        }
                    }, 2000);


                   
                }
                else
                {
                    Notifica_Error("Esta Recepción no se pudo guardar, verifique los datos ingresados.");  
                }
               
                
            }
        });


        }
    }

    function fpDesactivaForm()
    {
            document.getElementById("txtNroDocumento").disabled=true;
            document.getElementById("txtFechaLlegada").disabled=true;
            document.getElementById("txtProveedor").disabled=true;
            document.getElementById("txtResponsable").disabled=true;
            document.getElementById("txtMotivo").disabled=true;
            document.getElementById("txtObservacion").disabled=true;

            document.getElementById("txtCodBN").disabled=true;
            document.getElementById("txtSerialBN").disabled=true;
            document.getElementById("txtTipoBN").disabled=true;
            document.getElementById("txtMarcaBN").disabled=true;
            document.getElementById("txtModeloBN").disabled=true;
            document.getElementById("txtDescripcionBN").disabled=true;
            document.getElementById("txtObservacionBN").disabled=true;

            document.getElementById("btn_agregar").disabled=true;
            document.getElementById("btn_enviar").disabled=true;
    }

    function fpLimpiarForm()
    {
            document.getElementById("txtNroDocumento").value="";
            document.getElementById("txtFechaLlegada").value="";
            document.getElementById("txtProveedor").value="";
            document.getElementById("txtResponsable").value="";
            document.getElementById("txtMotivo").value="";
            document.getElementById("txtObservacion").value="";

            limpiarCamposBN();

            var liFila=Number(loF.txtFila.value);
           
            document.getElementById("tabBienNacional").deleteRow(0);
            document.getElementById("txtFila").value="";


            document.getElementById("txtNroDocumento").focus();

    }

    function dameMes(objeto)
    {
        var mesNumero=objeto.getMonth()+1;
        var mesFull = "";
        if (mesNumero<10)
        {
            mesFull="0"+mesNumero;
        }
        else
        {
            mesFull=mesNumero;
        }
        return mesFull;
    }

    function ValidarEnvioForm()
    {
        var vInvalido=0;
        var vResult=false;
        var fNroDocumento = $("#txtNroDocumento").val();
        var fFechaLlegada = $("#txtFechaLlegada").val();
        var fProveedor = $("#txtProveedor").val();
        var fResponsable = $("#txtResponsable").val();
        var fMotivo = $("#txtMotivo").val();
        var fFilaBN = parseInt($("#txtFila").val());
        var fechaActual = "<?php print $fechaHoy; ?>";

        if(fNroDocumento.length<3)
        {
            Notifica_Error("Nro Documento inválido, debe ingresar un Nro Documento con mas de 2 digitos.");
            $("#txtNroDocumento").focus();
            //vInvalido=1;
        }

        if(fProveedor=="0")
        {
            Notifica_Error("Seleccione un Proveedor.");
            $("#txtProveedor").focus();
           // vInvalido=1;
        }

        if((fFilaBN=="")||(isNaN(fFilaBN))||(fFilaBN<1))
        {
            Notifica_Error("Debe agregar al menos un Bien Nacional para realizar una recepción.");
            vInvalido=1;
        }


        if(fFechaLlegada>fechaActual)
        {
            Notifica_Error("No se puede ingresar una fecha futura.");
            $("#txtFechaLlegada").focus();
            vInvalido=1;
        }

        if (vInvalido==0)
        {
            vResult=true;
        }
        return vResult;
       
    }
</script>
<script>

var loF=document.f_recepcion;

    $( document ).ready(function() {
    fpInicio();

    });

    function fpInicio()
    {
        var liFila=Number(loF.txtFila.value);
        loF.txtProveedor.value='<?php print ($Datos_Consultados['0']['id_prov']);?>';
        loF.txtResponsable.value='<?php print ($Datos_Consultados['0']['id_per']);?>';
        loF.txtMotivo.value='<?php print ($Datos_Consultados['0']['id_motivo_mov']);?>';

        for(liY=1;liY<=liFila;liY++)
        {
            $('#txtTipoBN'+liY).val($('#txtTipoBN'+liY).attr('data-valorReal'));
            $('#txtMarcaBN'+liY).val($('#txtMarcaBN'+liY).attr('data-valorReal'));
            $('#txtModeloBN'+liY).val($('#txtModeloBN'+liY).attr('data-valorReal'));

        }
        <?php print $alertaPrimera; ?>
    }


    
</script>
