<?php
    //include_once("../clases/cls_Listado_Cronograma.php");
   // $listar= new cls_Listado_Cronograma();
    //$Cronogramas=$listar->Listado_Cronograma();

    require_once("../clases/clsFuncionesGlobales.php");
    $loFuncion = new clsFunciones;
    
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Historial de Actividad por Empresa</h3>
   <div class="alert alert-info">
        <ul>
            En este módulo podrá generar visualizar el historial de actividades realizadas por una empresa. 
        </ul>
    </div>
    <div class="col-md-8" style='min-height:330px'>
        <form name="form1" action="../reporte/reporte_historial_empresa.php" method="POST">
            <div id="containerActividad2" >
                <label>Empresa</label>
                <select name="empresa" onblur="">
                    <option value="-">Seleccione</option>
                        <?php 
                            echo utf8_decode($loFuncion->fncreateComboSelect("am_tempresa", "","idEmpresa","", ' ',"","nombre", $selecttipo_actividad,"", "", ""));
                        ?>
                   </select>
                   <input class="btn btn-primary" type="button" value="Generar Historial" onclick="f_enviar();">
                <br>
            </div>
        </form>
    </div>
</div>
<script>
    function f_enviar(){
        if(document.form1.empresa.value=='-'){
            Notifica_Error("Debe seleccionar una Empresa");
        }else{
            document.form1.submit();
        }
    }
</script>