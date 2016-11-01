<?php

    $operacion='listadobienesdepartamento';
    $titulo   ='Listar Bienes Nacionales Por Departamentos';
	$fechaHoy=date("d-m-Y");

?>

<script type="text/javascript" charset="utf-8">
    
</script>  
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3><?php print($titulo); ?></h3>
    <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá imprimir el reporte de Bienes Nacionales Por Departamentos .</li>
           
        </ul>
    </div>

        <div class="row-fluid">          
            <div class="col-lg-12 span12">
              <a style="margin:50px;" class="btn btn-success" href="../reporte/listadobienesdepartamento.php" target="_blank"> Reporte<i class="fa fa-file-text"></i></a>
            </div>

        </div>                           

        
<!-- ******************************************* Detalle del bien nacional *************************************************-->
       
     
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

        else if(fFechaInicio>fechaActual)
        {
            Notifica_Error("No se puede ingresar una fecha futura.");
            $("#txtFechaInicio").focus();
            vInvalido=1;
        }

        else if(fFechaFinal>fechaActual)
        {
            Notifica_Error("No se puede ingresar una fecha futura.");
            $("#txtFechaFin").focus();
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
     
    }
</script>