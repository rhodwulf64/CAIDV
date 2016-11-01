<form method="POST" action="../reporte/articulos_departamento.php" target="_blank" name="form_reporte">

<div style="float: left" class="col-lg-8 span8 pull-left">

		<div class="col-lg-6 span6">
		<h3>Consumibles Asignados Por departamento</h3>
		</div>
		<div class="col-lg-6 span6">
            <label>Busqueda por Departamento (*)  </label>
            <select name="nomgrupo" id="cam_nomgrupo" required>
            <option value="">Selecciona un departamento</option>
            <?php 
            	include('../clases/clase_Departamento.php');
	            $objDepartamento = new clsDepartamento();
	            $listado_Departamento = $objDepartamento->consultar_departamento_select();   
	            for($i=0;$i<count($listado_Departamento);$i++)
	            {
	                    ?><option value="<?php print($listado_Departamento[$i][0])?>"><?php print($listado_Departamento[$i][1])?></option>
	            <?php }?>
                </select>
            </div>
		<div class="col-lg-6 span6">
		<input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Reporte">
		<br><br><br>
		</div>

</form>
<div>
</div>


<!--

<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Listado de insumos faltantes</h3>
        <a style="margin:50px;" class="btn btn-success" href="../reporte/articulos_faltantes.php" target="_blank"> Reporte <i class="fa fa-file-text"></i></a>
</div>
-->
