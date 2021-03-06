<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
         
        $laServicios=$lobjRol->consultar_servicios_menu($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='persona/consultar_docente')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='persona/registrar_docente')
            {
                $registrar=true;
            }
            if($laServicios[$j][2]=='persona/eliminar_docente')
            {
                $eliminar=true;
            }
        }
    }

include('../clases/update2016/clase_restitucion.php');
$loClasePrimera = new clsRestitucion();

$fechaHoy=date("d-m-Y");

$id=(isset($_GET['id']))?$_GET['id']:"";
//$lobjDocente->set_Docente($id);
//$Datos_Docente = $lobjDocente->consultar_docente_bitacora();
$OnKey='';

if($Datos_Docente)
{
    $operacion='editar_restitucion';
    $titulo   ='Consultar Restitución';
    $OnKey='readOnly';
}
else
{
    $operacion='registrar_restitucion';
    $titulo   ='Registrar Restitución de Restitución';
}

?>

<script type="text/javascript" charset="utf-8">
    
</script>  
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3><?php print($titulo); ?></h3>
    <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá restituir bienes nacionales a los diferentes entes externos.</li>
            <li>Sí necesitas ayuda para usar este formulario haga click en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
    <form class="formulario" action="../controlador/control_docente.php" method="POST" id="f_formulario" name="f_formulario">
        <legend class="label label-info"><h4>Restitución: Datos de la Operación</h4></legend>
        <input type="hidden" value="Restituciones" name="txtSegmento" id="txtSegmento"/>
        <input type="hidden" value="nulo" name="txtAccion" id="txtAccion"/>
        <input type="hidden" value="0" name="txtExito" id="txtExito"/>
        <input type="hidden" value="0" name="txtTipoBNAlistar" id="txtTipoBNAlistar"/>
        <input type="hidden"  name="txtCodeInsti" id="txtCodeInsti"/>
        <input type="hidden"  name="txtMoviObjeto" id="txtMoviObjeto"/>
        <input type="hidden"  name="txtFila" id="txtFila"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Numero de Restitución <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cédula de identidad del docente."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12" maxlength="9"  name="txtNroDocumento" id="txtNroDocumento" onblur="BuscarRestitucionporCodigo(this.value)" <?php print($OnKey); ?> value="<?php print($Datos_Docente['iddocente']);?>" required/>

            </div>

            <div class="col-lg-6 span6">
                <label>Fecha de Restitución<span class="asterisco">*</span><span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de nacimiento del docente."><i class="fa fa-question" ></i></span></label>
                <div class="span10 input-append date"  id="dp3" data-date="<?php print $fechaHoy; ?>"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                    <input type="text" class="span12"  name="txtFechaLlegada" size="16" id="txtFechaLlegada" required value="<?php print($Datos_Consultados['FechaLlegada']);?>" required/>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>

        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Responsable de la Restitución<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                <select name="txtResponsable" id="txtResponsable" class="span12" required>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosPersonalActivos($selectedPersonal); ?>
                </select>
            </div>
            <div class="col-lg-6 span6">
                <label>Fecha de Restitución Acordada<span class="asterisco">*</span><span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de Restitución Acordada."><i class="fa fa-question" ></i></span></label>
                <div class="span10 input-append date"  id="dp4" data-date="<?php print $fechaHoy; ?>"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                    <input type="text" class="span12"  name="txtFechaRestitucion" size="16" id="txtFechaRestitucion" disabled="" required value="<?php print($Datos_Consultados['FechaLlegada']);?>" required/>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Ente Externo<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                <select name="txtEnte" id="txtEnte" class="span12" required>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosEntesExternos($selectedEntesExternos); ?>
                </select>
            </div>
            <div class="col-lg-6 span6">
                <label>Responsable Receptor<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                <select name="txtResponsableEnte" id="txtResponsableEnte" class="span12" required>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosResponsablesEnte($selectedResponsaEnte); ?>
                </select>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Motivo<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Motivo de la operación."><i class="fa fa-question" ></i></span></label>
                <select name="txtMotivo" id="txtMotivo" class="span12" required>
                    <option value="0">SELECCIONE UN MOTIVO</option>
                    <?php 
                    print $loFuncGenerales->fnComboMotivosGeneral($selectMotivo,"12");
                    ?>
                </select>
            </div>
           <div class="col-lg-6 span6">
                <label>Observación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Código del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                <textarea class="span12" maxlength="9"  name="txtObservacion" id="txtObservacion" ></textarea>
            </div>
        </div>
         <legend class="label label-info" >
         <h4>Restitución: Selección de Prestamo</h4>
         </legend>
            <div class="row-fluid">
                <div class="col-lg-12 span12">
                   <center> <button type="button" class="btn btn-success" style="border-radius: 0;font-family: \"Courier New\", Courier, monospace;" name="btn_agregar" id="btn_agregar" onclick="MostrarSeleccionBN();"><b>Haga Click Aquí para <br>Seleccionar Un Prestamo <br></b><i class="icon-search icon-white"></i></button></center>
                </div>
            </div>
            <br>
              <div id="detalle_bn" class="row-fluid" border="2" class="label label-info">       
                <legend class="label label-info">
                    <h4>Restitución: Prestamo Seleccionado</h4>
                </legend>
            </div>

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

            </table>
                                

        
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
    </tr>
           
        <div class="botonera">
            <input type="button" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Aceptar" onclick="GuardarCambios();">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=inv_bienesnacionales/ver_restitucion'">
        </div>
      
        <div class="modal fade" id="ModalSeleccionaBienes" tabindex="-1" style="position:absolute;left:300px;width: 95%;height: 90%;display: none;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Selecciona Bienes Nacionales</h4>
                    </div>
                    <div class="modal-body" style="max-height: 500px;">
                        <div class="row">
                            <div class="col-lg-12 span12">
                            <br>
                            <center><div class="TituloInformativoModal"><font>Departamento de: </font><font id="ElementoTituloDepartamento"></font></div></center>
                                <label>Tipo de Bien<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                                <select name="txtTipoBN" id="txtTipoBN" class="span12" onchange="fpFiltraBienesPorTipo(this.value);">
                                    <option value="0">SELECCIONE UNA OPCIÓN</option>
                                    <?php
                                        print $loFuncGenerales->fnCombosGeneralesActivos("tipobn","des_tbien","des_tbien","cod_tbien","status",$selectedTipoBN); 
                                    ?> 
                                </select>
                                <br>
                                <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="TablaPrestamos">
                                    <thead>
                                        <th>Código BN</th><th>Código Inst.</th><th>Serial</th><th>Tipo de Bien</th><th>Marca</th><th>Módelo</th><th>Descripción</th><th>Observación</th><th>Acción</th>
                                    </thead>
                                    <tbody id="tbodyResulta">
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">

var loF=document.f_formulario;

    $( document ).ready(function()
    {
        fpInicio();
    });

    function buscar(id)
    {
    window.open("?vista=inv_bienesnacionales/consultar_prestamo&id="+id);
    }


    function fpAgregar(IDmodalFila) 
    {
            var liFila=Number(loF.txtFila.value);
       
            var loTabla = document.getElementById("tabBienNacional");


            var loFila = loTabla.insertRow(liFila);
            var loCelda1 = loFila.insertCell(0);
            var loCelda2 = loFila.insertCell(1);
            var loCelda3 = loFila.insertCell(2);
            var loCelda4 = loFila.insertCell(3);
            var loCelda5 = loFila.insertCell(4);
            var loCelda6 = loFila.insertCell(5);
            var loCelda7 = loFila.insertCell(6);
            var loCelda8 = loFila.insertCell(7);
            var loCelda9 = loFila.insertCell(8);
            var loCelda10 = loFila.insertCell(9);

            liFila=liFila+1;
            loF.txtFila.value=liFila;
            loFila.setAttribute('id','estadoTR'+liFila);
            loFila.setAttribute('class','active');
            loFila.setAttribute('data-IDfilaModalBN',IDmodalFila);

            var lotxtNumeFila = document.createElement("textarea");
            lotxtNumeFila.setAttribute('class',"form-control");
            lotxtNumeFila.setAttribute('name',"txtNumeFila"+liFila);
            lotxtNumeFila.setAttribute('id',"txtNumeFila"+liFila);
            lotxtNumeFila.setAttribute('style',"resize: none;width:8px;");
            lotxtNumeFila.setAttribute('cols',"1");
            lotxtNumeFila.setAttribute('rows',"2");
            lotxtNumeFila.setAttribute('disabled',"true");
            lotxtNumeFila.innerHTML=liFila;

            var lotxtCodBN = document.createElement("textarea");
            lotxtCodBN.setAttribute('class',"form-control");
            lotxtCodBN.setAttribute('name',"txtCodBN"+liFila);
            lotxtCodBN.setAttribute('id',"txtCodBN"+liFila);
            lotxtCodBN.setAttribute('style',"resize: none;width:55px;");
            lotxtCodBN.setAttribute('onblur',"this.value=this.value.toUpperCase();");
            lotxtCodBN.setAttribute('cols',"1");
            lotxtCodBN.setAttribute('rows',"2");
            lotxtCodBN.setAttribute('disabled',"true");


            var lotxtCodeInsti = document.createElement("textarea");
            lotxtCodeInsti.setAttribute('class',"form-control");
            lotxtCodeInsti.setAttribute('name',"txtCodeInsti"+liFila);
            lotxtCodeInsti.setAttribute('id',"txtCodeInsti"+liFila);
            lotxtCodeInsti.setAttribute('style',"resize: none;width:55px;");
            lotxtCodeInsti.setAttribute('cols',"1");
            lotxtCodeInsti.setAttribute('rows',"2");
            lotxtCodeInsti.setAttribute('disabled',"true");

            var lotxtSerialBN = document.createElement("textarea");
            lotxtSerialBN.setAttribute('class',"form-control");
            lotxtSerialBN.setAttribute('name',"txtSerialBN"+liFila);
            lotxtSerialBN.setAttribute('id',"txtSerialBN"+liFila);
            lotxtSerialBN.setAttribute('style',"resize: none;width:60px;");
            lotxtSerialBN.setAttribute('onblur',"this.value=this.value.toUpperCase();");
            lotxtSerialBN.setAttribute('cols',"1");
            lotxtSerialBN.setAttribute('rows',"2");
            lotxtSerialBN.setAttribute('disabled',"true");
           
            var lotxtTipoBN = document.createElement("textarea");
            lotxtTipoBN.setAttribute('class',"form-control");
            lotxtTipoBN.setAttribute('name',"txtTipoBN"+liFila);
            lotxtTipoBN.setAttribute('id',"txtTipoBN"+liFila);
            lotxtTipoBN.setAttribute('style',"resize: none;width:60px;font-size:8pt;");
            lotxtTipoBN.setAttribute('cols',"1");
            lotxtTipoBN.setAttribute('rows',"2");
            lotxtTipoBN.setAttribute('disabled',"true");
            lotxtTipoBN.setAttribute('title',"Tipo de Bien Nacional");

            var lotxtMarcaBN = document.createElement("textarea");
            lotxtMarcaBN.setAttribute('class',"form-control");
            lotxtMarcaBN.setAttribute('name',"txtMarcaBN"+liFila);
            lotxtMarcaBN.setAttribute('id',"txtMarcaBN"+liFila);
            lotxtMarcaBN.setAttribute('style',"resize: none;width:60px;font-size:8pt;");
            lotxtMarcaBN.setAttribute('cols',"1");
            lotxtMarcaBN.setAttribute('rows',"2");
            lotxtMarcaBN.setAttribute('disabled',"true");
            lotxtMarcaBN.setAttribute('title',"Marca del Bien Nacional");

            var lotxtModeloBN = document.createElement("textarea");
            lotxtModeloBN.setAttribute('class',"form-control");
            lotxtModeloBN.setAttribute('name',"txtModeloBN"+liFila);
            lotxtModeloBN.setAttribute('id',"txtModeloBN"+liFila);
            lotxtModeloBN.setAttribute('style',"resize: none;width:60px;font-size:8pt;");
            lotxtModeloBN.setAttribute('cols',"1");
            lotxtModeloBN.setAttribute('rows',"2");
            lotxtModeloBN.setAttribute('disabled',"true");
            lotxtModeloBN.setAttribute('title',"Módelo del Bien Nacional");

            var lotxtDescripcionBN = document.createElement("textarea");
            lotxtDescripcionBN.setAttribute('class',"form-control");
            lotxtDescripcionBN.setAttribute('name',"txtDescripcionBN"+liFila);
            lotxtDescripcionBN.setAttribute('id',"txtDescripcionBN"+liFila);
            lotxtDescripcionBN.setAttribute('style',"resize: none;width:78px;font-size:8pt;");
            lotxtDescripcionBN.setAttribute('cols',"1");
            lotxtDescripcionBN.setAttribute('rows',"2");
            lotxtDescripcionBN.setAttribute('disabled',"true");

            var lotxtObservacionBN = document.createElement("textarea");
            lotxtObservacionBN.setAttribute('class',"form-control");
            lotxtObservacionBN.setAttribute('name',"txtObservacionBN"+liFila);
            lotxtObservacionBN.setAttribute('id',"txtObservacionBN"+liFila);
            lotxtObservacionBN.setAttribute('style',"resize: none;width:78px;font-size:8pt;");
            lotxtObservacionBN.setAttribute('cols',"1");
            lotxtObservacionBN.setAttribute('rows',"2");
            lotxtObservacionBN.setAttribute('disabled',"true");

            var lotxtIDBN = document.createElement("input");
            lotxtIDBN.setAttribute('type',"hidden");
            lotxtIDBN.setAttribute('name',"txtIDBN"+liFila);
            lotxtIDBN.setAttribute('id',"txtIDBN"+liFila);

            var lobtnQuitar = document.createElement("button");
            lobtnQuitar.setAttribute('type',"button");
            lobtnQuitar.setAttribute('name',"btnQuitar"+liFila);
            lobtnQuitar.setAttribute('id',"btnQuitar"+liFila);
            lobtnQuitar.setAttribute('class',"btn btn-default btn-circle");
            lobtnQuitar.setAttribute('style',"margin:10px 8px; width: 30px; height: 30px; padding: 6px 0px; border-radius: 15px; text-align: center; font-size: 12px; line-height: 1.428571429");
            lobtnQuitar.setAttribute('onclick',"fpQuitarDesdeDetalles("+liFila+");");

            var lobtnMinus = document.createElement("i");
            lobtnMinus.setAttribute('class',"fa fa-minus");
            
             // CON EL METODO appendChild(); LOS AGREGO A LA CELDA QUE QUIERO

            loCelda1.appendChild(lotxtNumeFila).appendChild(lotxtIDBN);
            loCelda2.appendChild(lotxtCodBN);
            loCelda3.appendChild(lotxtCodeInsti);
            loCelda4.appendChild(lotxtSerialBN);
            loCelda5.appendChild(lotxtTipoBN);
            loCelda6.appendChild(lotxtMarcaBN);
            loCelda7.appendChild(lotxtModeloBN);
            loCelda8.appendChild(lotxtDescripcionBN);
            loCelda9.appendChild(lotxtObservacionBN);
            loCelda10.appendChild(lobtnQuitar).appendChild(lobtnMinus);
  
    }

    function fpQuitarDesdeDetalles(NroFila)
    {
        var IDCheckbox=$('#estadoTR'+NroFila).attr('data-IDfilaModalBN');
        $("#"+IDCheckbox).prop("checked", false);
        fpQuitar(NroFila);
    }

    function fpQuitar(NroFila)
    {
        var liFila=Number(loF.txtFila.value);
        liLinea=NroFila;
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
            document.getElementById("btnQuitar"+liY).setAttribute("onclick","fpQuitarDesdeDetalles("+liA+");");
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

            document.getElementById("estadoTR"+liY).id="estadoTR"+liA;
        }
        liFila=liFila-1;
        loF.txtFila.value=liFila;
    }



    function MostrarSeleccionBN()
    {
        fEnte=$('#txtEnte').val();
        if(fEnte!="0")
        {
            fpListaBienesPorTipo();
            $('#ModalSeleccionaBienes').modal('show');  
        }
        else
        {
            Notifica_Error("Lo siento, debe seleccionar un Ente Externo antes de mostrar los bienes prestados.");
            loF.txtEnte.focus();
        }
    }

    function fpListaBienesPorTipo()
    {

        document.getElementById("txtAccion").value="ListarBNporEnte";
        document.getElementById("txtExito").value="0";

        var $forme = $("#f_formulario");

        $.ajax({
            url: '../controlador/cConsultasAjaxBN.php',
            dataType: 'json',
            type: 'post',
            data: $forme.serialize(),
            success: function(data)
            {
                var Confi=data['Master'];
                var ListaBN=data['ListadoBN'];

                if(Confi.lsExito==1)
                {
                    var DepartamentoNombre = $('#txtDepartamento option:selected').text();
                    var NroElmts = ListaBN.length;
                    var textoTitulo = DepartamentoNombre+', '+NroElmts+' Bien'+tplural(NroElmts,'','es')+' asignado'+tplural(NroElmts,'','s')+'.';

                        $("#ElementoTituloDepartamento").text(textoTitulo);

                        ListarBienesN(ListaBN);               
         
                }
                else
                {
                    Notifica_Error("No fue posible listar los bienes nacionales.");
                }
               
                
            }
        });


    }

     function ListarBienesN(arre)
    {
     

        var loTabla = document.getElementById('tbodyResulta');
        document.getElementById('tbodyResulta').innerHTML='';
        $.each(arre, function(a, BienesN) {
        i=a+1;

        var loFila = loTabla.insertRow(a);
        var loCelda1 = loFila.insertCell(0);
        var loCelda2 = loFila.insertCell(1);
        var loCelda3 = loFila.insertCell(2);
        var loCelda4 = loFila.insertCell(3);
        var loCelda5 = loFila.insertCell(4);
        var loCelda6 = loFila.insertCell(5);
        var loCelda7 = loFila.insertCell(6);
        var loCelda8 = loFila.insertCell(7);
        var loCelda9 = loFila.insertCell(8);





            var lomodoSeleccionaBN = document.createElement('input');
            lomodoSeleccionaBN.setAttribute('type','checkbox');
            lomodoSeleccionaBN.setAttribute('class','form-control');
            lomodoSeleccionaBN.setAttribute('name','modoSeleccionaBN'+i);
            lomodoSeleccionaBN.setAttribute('id','modoSeleccionaBN'+i);
            lomodoSeleccionaBN.setAttribute('data-IDfilaDetalle','');
            lomodoSeleccionaBN.setAttribute('onclick','fpSeleccionaBienNacional(this.id,$(this).parent().parent().index())');
            lomodoSeleccionaBN.setAttribute('style','transform: scale(2);');
            lomodoSeleccionaBN.setAttribute('title','Haga Click Aquí para seleccionar este bien nacional');


            loCelda1.innerHTML=BienesN.cod_bien;
            loCelda2.innerHTML=BienesN.id_bien;
            loCelda3.innerHTML=BienesN.serial_bien;
            loCelda4.innerHTML=BienesN.des_tbien;
            loCelda5.innerHTML=BienesN.nom_marca;
            loCelda6.innerHTML=BienesN.nom_modelo;
            loCelda7.innerHTML=BienesN.des_bien;
            loCelda8.innerHTML=BienesN.observacion_bien;
            loCelda9.appendChild(lomodoSeleccionaBN);



        });
           
          
             oTable = $('#TablaPrestamos').dataTable({
            'bJQueryUI': true,
            'sPaginationType': 'full_numbers',
            'iDisplayLength': 10
            });
    
    

    }



    function ConsultarDocumento(id)
    {
        window.location.href="?vista=inv_bienesnacionales/consultar_restitucion&id="+id;
    }


    function BuscarRestitucionporCodigo(VarlorObj)
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
                document.getElementById("txtAccion").value="BuscarRestitucionExiste";
                document.getElementById("txtExito").value="0";
                document.getElementById("txtNroDocumento").value=document.getElementById("txtNroDocumento").value.toUpperCase();

                var $forme = $("#f_formulario");

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

    function fpFiltraBienesPorTipo(valor)
    {
        if(valor=="0")
        {
            valor="";
        }

        $('#buscadorCampoDT').val(valor);
        $('#buscadorCampoDT').focus();
    }

    function fpSeleccionaBienNacional(idobjeto,filaNro)
    {
        var liFila=Number(loF.txtFila.value);
        var FilaObjeto=$('#TablaPrestamos >tbody >tr').eq(filaNro);

        if( $('#'+idobjeto).prop('checked') ) {

        $(FilaObjeto).each(function(index, element)
            {
         
            var CodBN = $(element).find("td").eq(0).html();
            var CodIns = $(element).find("td").eq(1).html();
            var Serial = $(element).find("td").eq(2).html();
            var TipoBN = $(element).find("td").eq(3).html();
            var MarcaBN = $(element).find("td").eq(4).html();
            var ModeloBN = $(element).find("td").eq(5).html();
            var DescriBN = $(element).find("td").eq(6).html();
            var ObservBN = $(element).find("td").eq(7).html();

            fpAgregar(idobjeto);

            liFila=Number(loF.txtFila.value);   

            
            CodBN=evalCampoBN(CodBN);
            CodIns=evalCampoBN(CodIns);
            Serial=evalCampoBN(Serial);
            TipoBN=evalCampoBN(TipoBN);
            MarcaBN=evalCampoBN(MarcaBN);
            ModeloBN=evalCampoBN(ModeloBN);
            DescriBN=evalCampoBN(DescriBN);
            ObservBN=evalCampoBN(ObservBN);


            document.getElementById("txtCodBN"+liFila).value=CodBN;
            document.getElementById("txtCodeInsti"+liFila).value=CodIns;
            document.getElementById("txtSerialBN"+liFila).value=Serial;
            document.getElementById("txtTipoBN"+liFila).value=TipoBN;
            document.getElementById("txtMarcaBN"+liFila).value=MarcaBN;
            document.getElementById("txtModeloBN"+liFila).value=ModeloBN;
            document.getElementById("txtDescripcionBN"+liFila).value=DescriBN;
            document.getElementById("txtObservacionBN"+liFila).value=ObservBN;


            $('#'+idobjeto).attr('data-IDfilaDetalle',liFila);

            });
        }
        else
        {
            var FilaGuardada=$('#'+idobjeto).attr('data-IDfilaDetalle');
            var FilaFinal="";
            var Diferencial="";
            if(liFila<FilaGuardada)
            {
                Diferencial=FilaGuardada-liFila;
                FilaFinal=FilaGuardada-Diferencial;
            }
            else
            {
                FilaFinal=FilaGuardada;
            }

            if(FilaGuardada!="")
            {
                fpQuitar(FilaFinal);           
            }
        
        }
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



    function GuardarCambios()
    {
        if (ValidarEnvioForm())
        {
            var liFila=Number(loF.txtFila.value);

            document.getElementById("txtAccion").value="incluirRestitucion";
            document.getElementById("txtExito").value="0";

        var $forme = $("#f_formulario");

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
                    
                    
                    Notifica_Logro("Este Restitución fué guardada con éxito.");
                   
                    setTimeout(function()
                    {
                        if (confirm("Desea registrar una nueva Restitución?"))
                        {
                           location.reload();
                        }
                        else
                        {
                            ConsultarDocumento(Confi.lsIDdocumento);
                        }
                    }, 2000);                   
                }
                else
                {
                    Notifica_Error("Este Restitución no se pudo guardar, verifique los datos ingresados.");  
                }
               
                
            }
        });

        }
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
        var fFechaAcordada = $("#txtFechaRestitucion").val();
        var fResponsable = $("#txtResponsable").val();
        var fEnte = $("#txtEnte").val();
        var fResponsableEnte = $("#txtResponsableEnte").val();
        var fMotivo = $("#txtMotivo").val();
        var fFilaBN = parseInt($("#txtFila").val());
        var fechaActual = "<?php print $fechaHoy; ?>";

        if(fNroDocumento.length<3)
        {
            Notifica_Error("Nro Documento inválido, debe ingresar un Nro Documento con mas de 2 digitos.");
            $("#txtNroDocumento").focus();
            vInvalido=1;
        }

        else if(fFechaLlegada=="")
        {
            Notifica_Error("El campo Fecha no puede quedar vacío.");
            $("#txtFechaLlegada").focus();
            vInvalido=1;
        }

        else if(fFechaLlegada>fechaActual)
        {
            Notifica_Error("No se puede ingresar una fecha futura.");
            $("#txtFechaLlegada").focus();
            vInvalido=1;
        }

        else if(fResponsable=="0")
        {
            Notifica_Error("Seleccione un Responsable de la operación.");
            $("#txtResponsable").focus();
            vInvalido=1;
        }

        else if(fFechaAcordada=="")
        {
            Notifica_Error("Seleccione un prestamo para poder continuar.");
            $("#btn_agregar").focus();
            vInvalido=1;
        }

        else if(fFechaAcordada<=fechaActual)
        {
            Notifica_Error("No se puede ingresar una fecha pasada.");
            $("#txtFechaRestitucion").focus();
            vInvalido=1;
        }


        else if(fEnte=="0")
        {
            Notifica_Error("Seleccione un prestamo para poder continuar.");
            $("#btn_agregar").focus();
            vInvalido=1;
        }

        else if(fResponsableEnte=="0")
        {
            Notifica_Error("Seleccione un Responsable del Ente externo.");
            $("#txtResponsableEnte").focus();
            vInvalido=1;
        }

        else if(fMotivo=="0")
        {
            Notifica_Error("Seleccione el Motivo de la operación.");
            $("#txtMotivo").focus();
            vInvalido=1;
        }

        else if((fFilaBN=="")||(isNaN(fFilaBN))||(fFilaBN<1))
        {
            Notifica_Error("Debe agregar al menos un Bien Nacional para realizar una Restitución.");
            vInvalido=1;
        }


        if (vInvalido==0)
        {
            vResult=true;
        }
        return vResult;
       
    }


    function AgregarBienesSeleccionados()
    {
      

    }

    function fpInicio()
    {
        $('#dp3').datepicker();
        $('#dp4').datepicker();
        $("#txtNroDocumento").focus();
           
      
    }
</script>