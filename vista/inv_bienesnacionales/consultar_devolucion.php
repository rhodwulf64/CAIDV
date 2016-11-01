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

include('../clases/update2016/clase_devolucionbn.php');
$loClasePrimera = new clsDevolucion();

$fechaHoy=date("d-m-Y");

$id=(isset($_GET['id']))?$_GET['id']:"";
$loClasePrimera->set_NroDocumento($id);
$Datos_Consultados = $loClasePrimera->consultar_devolucion_bitacora();
$OnKey='';

if($Datos_Consultados)
{
    $operacion='editar_docente';
    $titulo   ='Consultar Devolución';
    $OnKey='readOnly';
}
else
{
    $operacion='registrar_articulobn';
    $titulo   ='Consultar Devolución';
}

?>

<script type="text/javascript" charset="utf-8">
    
</script>  
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3><?php print($titulo); ?></h3>
    <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá devolver bienes nacionales a los diferentes Dptos.</li>
            <li>Sí necesitas ayuda para usar este formulario haga click en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
    <form class="formulario" action="../controlador/control_docente.php" method="POST" id="f_formulario" name="f_formulario">
        <legend class="label label-info"><h4>Devolución: Datos de la Operación</h4></legend>
        <input type="hidden" value="Devoluciones" name="txtSegmento" id="txtSegmento"/>
        <input type="hidden" value="nulo" name="txtAccion" id="txtAccion"/>
        <input type="hidden" value="0" name="txtExito" id="txtExito"/>
        <input type="hidden" value="0" name="txtTipoBNAlistar" id="txtTipoBNAlistar"/>
        <input type="hidden"  name="txtCodeInsti" id="txtCodeInsti"/>
        <input type="hidden"  name="txtMoviObjeto" id="txtMoviObjeto"/>
        <input type="hidden"  name="txtFila" id="txtFila"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Numero de Devolución <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cédula de identidad del docente."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12" maxlength="9"  name="txtNroDocumento" id="txtNroDocumento" <?php print($OnKey); ?> value="<?php print($Datos_Consultados['0']['nro_document']);?>" required/>

            </div>

            <div class="col-lg-6 span6">
                <label>Fecha de Devolución<span class="asterisco">*</span><span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de nacimiento del docente."><i class="fa fa-question" ></i></span></label>
                <div class="span10 input-append date"  id="dp3" data-date="<?php print $fechaHoy; ?>"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                    <input type="text" class="span12"  name="txtFechaLlegada" size="16" id="txtFechaLlegada" value="<?php print($Datos_Consultados['0']['fecha_mov']);?>"  <?php print($OnKey); ?> required/>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>

        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Responsable de la Devolución<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                <select name="txtResponsable" id="txtResponsable"  <?php print($OnKey); ?> class="span12" required>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosPersonalActivos($Datos_Consultados['0']['id_per']); ?>
                </select>
            </div>
        </div>
       
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Departamento<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                <select name="txtDepartamento" id="txtDepartamento" <?php print($OnKey); ?> class="span12" required>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosGeneralesActivos("tasignatura","idasignatura","nombreasi","","estatusasi",$Datos_Consultados['0']['id_dep']); ?>
                </select>
            </div>
            <div class="col-lg-6 span6">
                <label>Responsable del Departamento<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del docente."><i class="fa fa-question" ></i></span></label>
                <select name="txtResponsableDto" id="txtResponsableDto" <?php print($OnKey); ?> class="span12" required>
                    <option value="0">SELECCIONE UNA OPCION</option>
                    <?php print $loFuncGenerales->fnCombosPersonalActivos($Datos_Consultados['0']['id_resp_dep']); ?>
                </select>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Motivo<span class="asterisco">*</span>  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Motivo de la operación."><i class="fa fa-question" ></i></span></label>
                <select name="txtMotivo" id="txtMotivo" class="span12" <?php print($OnKey); ?> required>
                    <option value="0">SELECCIONE UN MOTIVO</option>
                    <?php 
                    print $loFuncGenerales->fnComboMotivosGeneral($Datos_Consultados['0']['id_motivo_mov'],"6");
                    ?>
                </select>
            </div>
           <div class="col-lg-6 span6">
                <label>Observación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Código del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                <textarea class="span12" maxlength="9" <?php print($OnKey); ?> name="txtObservacion" id="txtObservacion" ><?php print($Datos_Consultados['0']['observacion_mov']);?></textarea>
            </div>
        </div>
            <br>
              <div id="detalle_bn" class="row-fluid" border="2" class="label label-info">       
                <legend class="label label-info">
                    <h4>Devolución: Bienes Nacionales Seleccionados</h4>
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
            <input type="button" class="btn btn-warning" name="btn_enviar" id="btn_enviar" value="Imprimir" onclick="print();">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=inv_bienesnacionales/ver_devolucion'">
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
                                <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="TablaBienesN">
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


    function MostrarSeleccionBN()
    {
        $('#ModalSeleccionaBienes').modal('show');  
    }


    function ConsultarDocumento(id)
    {
        window.location.href="?vista=persona/consultar_docente&id="+id;
    }

    function BuscarDevolucionporCodigo(VarlorObj)
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
                document.getElementById("txtAccion").value="BuscarDevolucionExiste";
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

    function fpListaBienesPorTipo()
    {

        document.getElementById("txtAccion").value="ListarBNporTipo";
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

                        ListarBienesN(ListaBN);               
         
                }
                else
                {
                    Notifica_Error("No se pudo listar los bienes nacionales.");
                }
               
                
            }
        });


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
           
                
            oTable = $('#TablaBienesN').dataTable({
            'bJQueryUI': true,
            'sPaginationType': 'full_numbers',
            'iDisplayLength': 10
            });
    

    }

    function fpSeleccionaBienNacional(idobjeto,filaNro)
    {
        var liFila=Number(loF.txtFila.value);
        var FilaObjeto=$('#TablaBienesN >tbody >tr').eq(filaNro);

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



        document.getElementById("txtAccion").value="incluirDevolucion";
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
                    
                    
                    Notifica_Logro("Esta Devolución fué guardada con éxito.");
                   
                    setTimeout(function()
                    {
                        if (confirm("Desea registrar una nueva Devolución?"))
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
                    Notifica_Error("Esta Devolución no se pudo guardar, verifique los datos ingresados.");  
                }
               
                
            }
        });

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
            }

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
        var fProveedor = $("#txtProveedor").val();
        var fResponsable = $("#txtResponsable").val();
        var fDepartamento= $("#txtDepartamento").val();
        var fRespDpto = $("#txtResponsableDto").val();
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

        else if(fDepartamento=="0")
        {
            Notifica_Error("Seleccione un Departamento.");
            $("#txtDepartamento").focus();
            vInvalido=1;
        }

        else if(fRespDpto=="0")
        {
            Notifica_Error("Seleccione un Responsable del Departamento.");
            $("#txtResponsableDto").focus();
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
            Notifica_Error("Debe agregar al menos un Bien Nacional para realizar una devolución.");
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
    
        fpListaBienesPorTipo();


     
           
      
    }
</script>