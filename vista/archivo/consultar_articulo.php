<?php
    require_once("../clases/clase_articulo.php");
    $lobjarticulo=new clsarticulo;
    $id=(isset($_GET['id']))?$_GET['id']:"";
    $lobjarticulo->set_articulo($id);
    $laarticulo=$lobjarticulo->consultar_articulo();
    $articulos= $lobjarticulo->consultar_articulos_inactivos();
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Modificar Bien Consumible</h3>
    <div class="alert alert-info">
        <ul>
            <li>En este módulo podrá Modificar los Bienes Consumibles.</li>
            <li>Si necesitas ayuda para usar este módulo haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
    <form class="formulario" action="../controlador/control_articulo.php" method="POST" name="form_articulo">
        <input type="hidden" value="editar_articulo" name="operacion" />
        <input type="hidden"  name="idarticulo" id="cam_idarticulo" value="<?php echo $laarticulo[0];?>"/>
        <input type="hidden"  name="igual" id="cam_igual" value="<?php echo $laarticulo[1];?>"/>
         <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del insumo."><i class="fa fa-question" ></i></span></label>
                <input  type="text" data-step="1" maxlength="20" data-intro="Ingrese el nombre del insumo"  data-position="right" name="descripcionart" id="cam_descripcionart" value="<?php echo $laarticulo[1];?>" required/>            
            </div>
            <div class="col-lg-6 span6">
                <label>Unidad de medida <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Unidad de medida del insumo."><i class="fa fa-question" ></i></span></label>
                <select class="span7" name="idunidadmedida" data-step="2" style="width:220px;" data-intro="Seleccione la unidad de medida del insumo" data-position="right" id="cam_idunidadmedida" required>
                <option value="">-</option>
                <?php 
                    include('../clases/clase_unidad_medida.php');
                    $objUnidad_medida = new clsUnidad_medida();
                    $listado_unidad_medida = $objUnidad_medida->consultar_unidad_medidas();
                    for($i=0;$i<count($listado_unidad_medida);$i++)
                        {
                         ?><option <?php if($laarticulo[2]==$listado_unidad_medida[$i][1]){print('SELECTED');}?> value="<?php print($listado_unidad_medida[$i][0])?>"><?php print($listado_unidad_medida[$i][1])?></option>                        <?php }?>
                </select>   
            </div>
               <div class="row-fluid">
                <div class="col-lg-6 span6">
                <label>Presentación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Presentación del insumo."><i class="fa fa-question" ></i></span></label>
                <select class="span7" name="idpresentacion" data-step="3" style="width:220px;" data-intro="Seleccione la presentación del insumo" data-position="right" id="cam_idpresentacion" required>
                    <option value="">-</option>
                        <?php 
                        include('../clases/clase_presentacion.php');
                        $objpresentacion = new clspresentacion();
                        $listado_presentacion = $objpresentacion->consultar_presentacions();
                
                        for($i=0;$i<count($listado_presentacion);$i++)
                        {
                         ?><option <?php if($laarticulo[3]==$listado_presentacion[$i][1]){print('SELECTED');}?> value="<?php print($listado_presentacion[$i][0])?>"><?php print($listado_presentacion[$i][1])?></option>                        <?php }?>
                </select>   
                </div>
                <div class="col-lg-6 span6">
                <label>Categoría <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Grupo del insumo."><i class="fa fa-question" ></i></span></label>
                <select class="span7" name="idgrupo" data-step="4" style="width:220px;" data-intro="Seleccione el grupo del insumo" data-position="right" id="cam_idgrupo" required>
                    <option value="">-</option>
                        <?php 
                        include('../clases/clase_grupo.php');
                        $objgrupo = new clsGrupo();
                        $listado_grupo = $objgrupo->consultar_grupos();
                
                        for($i=0;$i<count($listado_grupo);$i++)
                        {
                         ?><option <?php if($laarticulo[4]==$listado_grupo[$i][1]){print('SELECTED');}?> value="<?php print($listado_grupo[$i][0])?>"><?php print($listado_grupo[$i][1])?></option>                        <?php }?>
                </select>   
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Stock mínimo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Stock mínimo del articulo."><i class="fa fa-question" ></i></span></label>
                <input type="text" maxlength="5" name="stockminimo" id="cam_stockminimo" data-step="5" value="<?php echo $laarticulo[6];?>" data-intro="Ingrese el stock mínimo del insumo" data-position="right" required/> 
            </div>
        </div>
            <div class="botonera">
            <input type="submit" class="btn btn-success" onclick="return validar_nombre();" data-step="6" data-intro='Haga clic en <button class="btn btn-success">Aceptar</button> para guardar el insumo ingresado' data-position="top" name="btn_enviar" id="btn_enviar" value="Guardar">
            <input type="button" class="btn btn-danger" data-step="7" data-intro='Haga clic en <button class="btn btn-danger">Regresar</button> para regresar al listado de insumos' data-position="top" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=inv_consumibles/articulo';">
        </div>
    </form>
</div>

<?php
        
    for($i=0;$i<count($articulos);$i++)
    {
    ?>
        <input type="hidden" value="<?php print($articulos[$i][1]);?>" name="nombres[]" />
    <?php 
    }
?>
<script type="text/javascript">
$(function(){
$("#cam_descripcionart").lemez_aceptar("texto","btn_enviar");
$("#cam_stockminimo").lemez_aceptar("numero","btn_enviar");
});
function Mensaje(e){
    swal(e);
}
function validar_nombre()
{
    nombre_articulo=document.getElementById('cam_descripcionart');
    nom_articulos = document.getElementsByName('nombres[]');
    comparar=document.getElementById('cam_igual');
    stockminimo=document.getElementById('cam_stockminimo');
        for(i=0;i<nom_articulos.length;i++)
        {
            if(nom_articulos[i].value.toUpperCase()==nombre_articulo.value.toUpperCase()  && nom_articulos[i].value.toUpperCase()!==comparar.value.toUpperCase() )
            {
                Mensaje('Debe ingresar un nombre distinto, este ya se encuentra registrado.');
                nombre_articulo.value='';
                nombre_articulo.focus();
                return false;
            }
        }
        if((nombre_articulo.value[0] == ' ' || nombre_articulo.value[nombre_articulo.value.length-1] == ' ') || nombre_articulo.value.match(/\s\s/ )){
            Mensaje('No puede escribir solo espacios en insumo.');
            return false;
        }
        if((stockminimo.value[0] == ' ' || stockminimo.value[stockminimo.value.length-1] == ' ') || stockminimo.value.match(/\s\s/ )){
            Mensaje('No puede escribir solo espacios en el stock mínimo.');
            return false;
        }
} 
</script>