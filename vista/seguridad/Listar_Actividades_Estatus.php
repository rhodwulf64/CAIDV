<?php
    //include_once("../clases/cls_Listado_Cronograma.php");
   // $listar= new cls_Listado_Cronograma();
    //$Cronogramas=$listar->Listado_Cronograma();

    require_once("../clases/clsFuncionesGlobales.php");
    $loFuncion = new clsFunciones;
    
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Actividades Por Estatus</h3>
   <div class="alert alert-info">
        <ul>
            En este módulo podrá generar listados de las actividades realizadas dependiendo de su estatus o proceso. 
        </ul>
    </div>
    <div class="row-fluid" >
        <form name="form1" action="../reporte/reporte_listar_actividades_estatus.php" method="POST">
            <div class="col-lg-4 span4" >
                <label>Estatus</label>
                <select name="estatus" >
                    <option value="-">Seleccione</option>
                    <option value="A">Anuladas</option>
                    <option value="C">Completadas</option>
                    <option value="E">En Ejecucion</option>
                    <option value="P">Planificadas</option>
                   </select>
            </div>

             <div class="col-lg-4 span4" >
                <label>Fecha Inicio</label>
                <input type="text" name="fecha_ini" placeholder="Ej: 2012-12-29">
            </div>

            <div class="col-lg-4 span4" >
                <label>Fecha Fin</label>
                <input type="text" name="fecha_fin" placeholder="Ej: 2016-12-29">
                
            </div>

             
            
    </div>
    <div class="row-fluid">
        <div class="col-lg-4 span4" >
        </div>
        <div class="col-lg-4 span4" >
        </div>
        <div class="col-lg-4 span4" >
                <label for=""></label>
               <input class="btn btn-primary" type="button" value="Buscar Actividades" onclick="f_enviar();">
         </div>
    </div>
        </form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


</div>
<script>
    function f_enviar(){
        if(document.form1.estatus.value=='-'){
            alert("Debe seleccionar una Estatus para realizar busqueda");
        }else if(document.form1.fecha_ini.value==''){
            alert("Debe ingresar una fecha de inicio");
            document.form1.fecha_ini.focus();
        }else if(document.form1.fecha_fin.value==''){
            alert("Debe una fecha final");
            document.form1.fecha_fin.focus();
        }else{
            document.form1.submit();
        }
    }
</script>