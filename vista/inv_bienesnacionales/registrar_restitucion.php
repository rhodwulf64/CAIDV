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
    $titulo   ='Consultar Restitución de Prestamo';
    $OnKey='readOnly';
}
else
{
    $operacion='registrar_restitucion';
    $titulo   ='Registrar Nueva Restitución de Prestamo';
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
                <label>Número de Documento<span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Número de Documento."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12" maxlength="9"  name="txtNroDocumento" id="txtNroDocumento" onblur="BuscarRestitucionporCodigo(this.value)" <?php print($OnKey); ?> value="<?php print($Datos_Docente['iddocente']);?>" required/>

            </div>

            <div class="col-lg-6 span6">
                <label>Fecha de la Restitución<span class="asterisco">*</span><span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la Restitución."><i class="fa fa-question" ></i></span></label>
                <div class="span10 input-append date"  id="dp3" data-date="<?php print $fechaHoy; ?>"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                    <input type="text" class="span12"  name="txtFechaLlegada" size="16" id="txtFechaLlegada" required value="<?php print($Datos_Consultados['FechaLlegada']);?>" required/>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>

        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Responsable<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Responsable de la Restitución."><i class="fa fa-question" ></i></span></label>
                <select name="txtResponsable" id="txtResponsable" class="span12" required>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosPersonalActivos($selectedPersonal); ?>
                </select>
            </div>
            <div class="col-lg-6 span6">
                <label>Fecha de la Restitución Acordada<span class="asterisco">*</span><span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la Restitución Acordada."><i class="fa fa-question" ></i></span></label>
                <div class="span10 input-append date"  id="dp4" data-date="<?php print $fechaHoy; ?>"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                    <input type="text" class="span12"  name="txtFechaRestitucion" size="16" id="txtFechaRestitucion" disabled="" required value="<?php print($Datos_Consultados['FechaLlegada']);?>" required/>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Ente Externo<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Ente Externo."><i class="fa fa-question" ></i></span></label>
                <select name="txtEnte" id="txtEnte" class="span12" disabled="" required>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosEntesExternos($selectedEntesExternos); ?>
                </select>
            </div>
            <div class="col-lg-6 span6">
                <label>Responsable del Ente Externo<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Responsable del Ente Externo."><i class="fa fa-question" ></i></span></label>
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
                <label>Observación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Observación."><i class="fa fa-question" ></i></span></label>
                <textarea class="span12" maxlength="120"  name="txtObservacion" id="txtObservacion" ></textarea>
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
                    <th id="n1" >Nro Prestamo<hr id="barra_vertical"></th>
                    <th id="n2" >Fecha Pestamo<hr id="barra_vertical"></th>
                    <th id="n4" >Ente Beneficiado<hr id="barra_vertical"></th>
                    <th id="n5" >Responsable Ente<hr id="barra_vertical"></th>
                    <th id="n6" >Responsable Caidv<hr id="barra_vertical"></th>
                    <th id="n7" >Fecha Acordada<hr id="barra_vertical"></th>
                    <th id="n8" >Usuario<hr id="barra_vertical"></th>
                    <th id="n10" >Observación<hr id="barra_vertical"></th>
                    <th id="n10" >Consultar Prestamo<hr id="barra_vertical"></th>
                </tr>
                <tr>
                    <td style="padding:1px;"><input type="hidden" id="txtIDprestamo" name="txtIDprestamo" value=""><textarea disabled style="resize: none;width:60px;font-size:8pt;margin:0px;" cols="5" rows="2" id="txtNroPresta" name="txtNroPresta"></textarea></td>
                    <td style="padding:1px;"><textarea disabled style="resize: none;width:60px;font-size:8pt;margin:0px;" cols="5" rows="2" id="txtFechaPesta" name="txtFechaPesta"></textarea></td>
                    <td style="padding:1px;"><textarea disabled style="resize: none;width:60px;font-size:8pt;margin:0px;" cols="5" rows="2" id="txtEnteBene" name="txtEnteBene"></textarea></td>
                    <td style="padding:1px;"><textarea disabled style="resize: none;width:60px;font-size:8pt;margin:0px;" cols="5" rows="2" id="txtRespEnte" name="txtRespEnte"></textarea></td>
                    <td style="padding:1px;"><textarea disabled style="resize: none;width:60px;font-size:8pt;margin:0px;" cols="5" rows="2" id="txtRespCaidv" name="txtRespCaidv"></textarea></td>
                    <td style="padding:1px;"><textarea disabled style="resize: none;width:60px;font-size:8pt;margin:0px;" cols="5" rows="2" id="txtFechaAcorda" name="txtFechaAcorda"></textarea></td>
                    <td style="padding:1px;"><textarea disabled style="resize: none;width:60px;font-size:8pt;margin:0px;" cols="5" rows="2" id="txtUsuario" name="txtUsuario"></textarea></td>
                    <td style="padding:1px;"><textarea disabled style="resize: none;width:60px;font-size:8pt;margin:0px;" cols="5" rows="2" id="txtObservBN" name="txtObservBN"></textarea></td>
                    <td style="padding:1px;"><button class="btn btn-info" id="btn_buscarPrestamo" href="#" title="Consultar" disabled=""><i class="icon-search icon-white"></i></button></td>
                </tr>
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
                                        <th>N° Prest.</th><th>Fecha Prest.</th><th>Fecha de Registro</th><th>ENTE Beneficiado</th><th>Resp. ENTE</th><th>Resp. CAIDV</th><th>Fecha Acordada</th><th>Usuario</th><th>Motivo</th><th>Observación</th><th>Selección</th>
                                    </thead>
                                    <tbody>
                                   <?php

                                    require_once('../clases/update2016/clase_prestamobn.php');
                                    $loPrestamo=new clsPrestamo;
                                    $laArticulosBN=$loPrestamo->listarPrestamoSinRestituir();
                                   
                                    for($i=0;$i<count($laArticulosBN);$i++)
                                    {
                                        if($laArticulosBN[$i][29]=="1")
                                        {
                                            $laArticulosBN[$i][29]='Activo';
                                        }
                                        else 
                                        {
                                            $laArticulosBN[$i][29]='Inactivo';
                                        }
                                        if (is_null($laArticulosBN[$i][32]))
                                        {
                                            $colorFila="";
                                        }
                                        else
                                        {
                                            $colorFila="success";
                                        }
                                        echo '<tr class="'.$colorFila.'">';
                                        echo '<td>'.$laArticulosBN[$i][1].'</td>';
                                        echo '<td>'.$laArticulosBN[$i][25].'</td>';
                                        echo '<td>'.$laArticulosBN[$i][26].'<br>'.$laArticulosBN[$i][3].'</td>';
                                        echo '<td>'.$laArticulosBN[$i][34].'</td>';
                                        echo '<td>'.$laArticulosBN[$i][36].'</td>';
                                        echo '<td>'.$laArticulosBN[$i][27].'</td>';
                                        echo '<td>'.$laArticulosBN[$i][31].'</td>';
                                        echo '<td>'.$laArticulosBN[$i][28].'</td>';
                                        echo '<td>'.$laArticulosBN[$i][20].'</td>';
                                        echo '<td>'.$laArticulosBN[$i][11].'</td>';
                                       if($consultar || $eliminar)
                                        {
                                            echo '<td>';

                                            echo '<input type="radio" name="modoSeleccionPrestamo" id="modoSeleccionPrestamo" value="'.$laArticulosBN[$i][0].'" onclick="fpSeleccionaBienNacional(this.id,this.value,'.$laArticulosBN[$i][37].',$(this).parent().parent().index())" style="transform: scale(2);" title="Haga Click Aquí para seleccionar este Prestamo">';
                                    
                                            echo "</td>";
                                        }
                                        
                                       
                                        echo '</tr>';
                                    }

                                   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <center><button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Cerrar Modal</button></center>
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


    function MostrarSeleccionBN()
    {
        $('#ModalSeleccionaBienes').modal('show');  
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


    function fpSeleccionaBienNacional(idobjeto,valorIDmov,valorIDente,filaNro)
    {
       
        var liFila=Number(loF.txtFila.value);
        var FilaObjeto=$('#TablaPrestamos >tbody >tr').eq(filaNro);

        $(FilaObjeto).each(function(index, element)
            {
         
            var NroPresta = $(element).find("td").eq(0).html();
            var FechaPesta = $(element).find("td").eq(1).html();
            var FechaReg = $(element).find("td").eq(2).html();
            var EnteBene = $(element).find("td").eq(3).html();
            var RespEnte = $(element).find("td").eq(4).html();
            var RespCaidv = $(element).find("td").eq(5).html();
            var FechaAcorda = $(element).find("td").eq(6).html();
            var Usuario = $(element).find("td").eq(7).html();
            var MotivoPres = $(element).find("td").eq(8).html();
            var ObservBN = $(element).find("td").eq(9).html();

                 
            NroPresta=evalCampoBN(NroPresta);
            FechaPesta=evalCampoBN(FechaPesta);
            FechaReg=evalCampoBN(FechaReg);
            EnteBene=evalCampoBN(EnteBene);
            RespEnte=evalCampoBN(RespEnte);
            RespCaidv=evalCampoBN(RespCaidv);
            FechaAcorda=evalCampoBN(FechaAcorda);
            Usuario=evalCampoBN(Usuario);
            MotivoPres=evalCampoBN(MotivoPres);
            ObservBN=evalCampoBN(ObservBN);

            document.getElementById("txtEnte").value=valorIDente;
            document.getElementById("txtFechaRestitucion").value=FechaAcorda;




            document.getElementById("txtIDprestamo").value=valorIDmov;
            document.getElementById("txtNroPresta").value=NroPresta;
            document.getElementById("txtFechaPesta").value=FechaPesta;
            document.getElementById("txtEnteBene").value=EnteBene;
            document.getElementById("txtRespEnte").value=RespEnte;
            document.getElementById("txtRespCaidv").value=RespCaidv;
            document.getElementById("txtFechaAcorda").value=FechaAcorda;
            document.getElementById("txtUsuario").value=Usuario;
            document.getElementById("txtObservBN").value=ObservBN;

            document.getElementById("btn_buscarPrestamo").setAttribute("onclick","buscar("+valorIDmov+");");
            document.getElementById("btn_buscarPrestamo").disabled=false;

            });

        loF.txtFila.value=1;
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
                    
                    
                    Notifica_Logro("Este Restitución fue guardada con éxito.");
                   
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
        oTable = $('#TablaPrestamos').dataTable({
            'bJQueryUI': true,
            'sPaginationType': 'full_numbers',
            'iDisplayLength': 10
            });
    


        $("#txtNroDocumento").focus();
           
      
    }
</script>