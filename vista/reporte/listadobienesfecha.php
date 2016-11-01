<?php

    $operacion='listadobienesfecha';
    $titulo   ='Listar Bienes Nacionales Por Rango de Fecha';
	$fechaHoy=date("d-m-Y");

?>

<script type="text/javascript" charset="utf-8">
    
</script>  
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3><?php print($titulo); ?></h3>
    <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá imprimir el reporte de Bienes Nacionales Por Rango de Fecha .</li>
           
        </ul>
    </div>
    <form class="formulario" target="ventanaForm" onsubmit="abrir('ventanaForm');return true" action="../reporte/listadobienesfecha.php" method="POST" id="f_formulario" name="f_formulario">
        <legend class="label label-info"><h4>Reporte: Selección de Parametros</h4></legend>
        <input type="hidden" value="Devoluciones" name="txtSegmento" id="txtSegmento"/>
        <input type="hidden" value="nulo" name="txtAccion" id="txtAccion"/>
        <input type="hidden" value="0" name="txtExito" id="txtExito"/>
        <input type="hidden" value="0" name="txtTipoBNAlistar" id="txtTipoBNAlistar"/>
        <input type="hidden"  name="txtCodeInsti" id="txtCodeInsti"/>
        <input type="hidden"  name="txtMoviObjeto" id="txtMoviObjeto"/>
        <input type="hidden"  name="txtFila" id="txtFila"/>
        <div class="row-fluid">
            <div class="col-lg-12 span12">
            	<center>
            	<table class="table table-inverse" style="width:30%">
				  	<thead class="thead-inverse">
				  	<tr>
            			<th>Seleccione uno o varios elementos</th>
            		</tr>
				  	</thead>
            		<tr>
            			<td><input type="checkbox" id="txtCheckMovi1" style="transform: scale(1.5); margin:5px;" name="txtCheckMovi[0]" value="1"><label onclick="$('#txtCheckMovi1').click();" style="display: inline;">Recepciones</label></td>
            		</tr>            		
            		<tr>
            			<td><input type="checkbox" id="txtCheckMovi2" style="transform: scale(1.5); margin:5px;" name="txtCheckMovi[1]" value="2"><label onclick="$('#txtCheckMovi2').click();" style="display: inline;">Asignaciones</label></td>
            		</tr>            		
            		<tr>
            			<td><input type="checkbox" id="txtCheckMovi3" style="transform: scale(1.5); margin:5px;" name="txtCheckMovi[2]" value="3"><label onclick="$('#txtCheckMovi3').click();" style="display: inline;">Devoluciones</label></td>
            		</tr>
	               	
					<tr>
            			<td><input type="checkbox" id="txtCheckMovi4" style="transform: scale(1.5); margin:5px;" name="txtCheckMovi[3]" value="4"><label onclick="$('#txtCheckMovi4').click();" style="display: inline;">Desincorporaciones</label></td>
            		</tr>
	               	
					<tr>
            			<td><input type="checkbox" id="txtCheckMovi5" style="transform: scale(1.5); margin:5px;" name="txtCheckMovi[4]" value="5"><label onclick="$('#txtCheckMovi5').click();" style="display: inline;">Prestamos</label></td>
            		</tr>
	               	
					<tr>
            			<td><input type="checkbox" id="txtCheckMovi6" style="transform: scale(1.5); margin:5px;" name="txtCheckMovi[5]" value="6"><label onclick="$('#txtCheckMovi6').click();" style="display: inline;">Restituciones de Prestamo</label></td>
            		</tr>
				</table>
				</center>
            </div>  
        </div>
        <br>
        <div class="row-fluid">          
            <div class="col-lg-6 span6">
                <label>Fecha Inicial<span class="asterisco">*</span><span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de nacimiento del docente."><i class="fa fa-question" ></i></span></label>
                <div class="span10 input-append date"  id="dp3" data-date="<?php print $fechaHoy; ?>"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                    <input type="text" class="span12"  name="txtFechaInicio" size="16" id="txtFechaInicio" required value="<?php print($Datos_Consultados['FechaLlegada']);?>" required/>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
            <div class="col-lg-6 span6">
                <label>Fecha Final<span class="asterisco">*</span><span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de nacimiento del docente."><i class="fa fa-question" ></i></span></label>
                <div class="span10 input-append date"  id="dp4" data-date="<?php print $fechaHoy; ?>"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                    <input type="text" class="span12"  name="txtFechaFin" size="16" id="txtFechaFin" required value="<?php print($Datos_Consultados['FechaLlegada']);?>" required/>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>

        </div>                           

        
<!-- ******************************************* Detalle del bien nacional *************************************************-->
    <input type="hidden" id="validarCaberaLlena" name="validarCaberaLlena"> <!-- variable para validar la cabecera -->
 
           
        <div class="botonera">
            <input type="button" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Aceptar" onclick="GuardarCambios();">
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


    function abrir(pagina) {
     	tope = screen.height / 2 - 100;
		izqui = screen.width / 2 - 200;
		opciones = 'width=400,height=200,scrollbars=yes,top=' + tope + ',left=' + izqui;
		window.open('',pagina);
	}


    function GuardarCambios()
    {
        if (ValidarEnvioForm())
        {

	      	$("#f_formulario").submit();  

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
        var varRandom=Math.floor((Math.random() * 6) + 1);
        var vResult=false;
        var fFechaInicio = $("#txtFechaInicio").val();
        var fFechaFinal = $("#txtFechaFin").val();
        var fCheckB1 = $("#txtCheckMovi1").prop('checked');
        var fCheckB2 = $("#txtCheckMovi2").prop('checked');
        var fCheckB3 = $("#txtCheckMovi3").prop('checked');
        var fCheckB4 = $("#txtCheckMovi4").prop('checked');
        var fCheckB5 = $("#txtCheckMovi5").prop('checked');
        var fCheckB6 = $("#txtCheckMovi6").prop('checked');
	    var fechaActual = "<?php print $fechaHoy; ?>";

        if(fFechaInicio=="")
        {
            Notifica_Error("El campo Fecha no puede quedar vacío.");
            $("#txtFechaInicio").focus();
            vInvalido=1;
        }

        else if(fFechaFinal=="")
        {
            Notifica_Error("El campo Fecha no puede quedar vacío.");
            $("#txtFechaFin").focus();
            vInvalido=1;
        }

        else if((fCheckB1==false)&&(fCheckB2==false)&&(fCheckB3==false)&&(fCheckB4==false)&&(fCheckB5==false)&&(fCheckB6==false))
        {
            Notifica_Error("Seleccione al menos un elemento para listar.");
            $("#txtCheckMovi"+varRandom).focus();
            vInvalido=1;
        }

        else if(fFechaInicio>fechaActual)
        {
            Notifica_Error("No se puede ingresar una fecha futura.");
            $("#txtFechaInicio").focus();
            vInvalido=1;
        }
       
        if (vInvalido==0)
        {
            vResult=true;
        }
        return vResult;
       
    }


    function fpInicio()
    {
        var varRandom=Math.floor((Math.random() * 6) + 1);
        $('#dp3').datepicker();
        $('#dp4').datepicker();
		$("#txtCheckMovi"+varRandom).focus();
     
    }
</script>