 <?php
    require_once("../clases/clase_requisicion.php");
    $lobjrequisicion=new clsrequisicion;
    $id=(isset($_GET['id']))?$_GET['id']:"";
    $lobjrequisicion->set_Identrada($id);
    $larequisicion=$lobjrequisicion->consultar_entrada();
?>
<div style="float: left; border:none;" class="col-lg-8 span8 pull-left show">
    <h3>Solicitud de Recepción de Bienes Consumibles</h3>
        </ul>
    </div>
    <form style="border:none;" class="formulario" action="../controlador/control_requisicion.php" method="POST" name="form_requisicion">
        <input type="hidden" value="registrar_entrada" name="operacion" />
        <input type="hidden" id="cam_contador" value="1" name="contador" />
        <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Número de Solicitud: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Número de orden de compra."><i class="fa fa-question" ></i></span></label>
                <input type="text" autofocus name="idcompra" id="cam_idcompra" data-step="1" disabled data-intro="Ingrese el número de orden de compra" data-position="right" value="<?php echo $larequisicion[0];?>" required/> 
            </div>
            <div class="col-lg-3 span6">
                <label>RIF del proveedor: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la orden de entrega."><i class="fa fa-question" ></i></span></label>
                <input style="width:210px" type="text" name="rifproveedor" value="<?php echo $larequisicion[10];?>" id="cam_rifproveedor0"  disabled/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Fecha de la Solicitud: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la orden de entrega."><i class="fa fa-question" ></i></span></label>
                <div class=" input-append date"  data-step="3" id="cam_fecha" data-date="1991-01-01"  data-date-format="yyyy-mm-dd" data-date-viewmode="years" >
                <input type="text" style="width:220px;" class="span12" name="fecha" size="16" id="cam_fecha" required value="<?php echo $larequisicion[2];?>" disabled/>
                </div>
            </div>
            <div class="col-lg-3 span6">
                 <label>Nombre del proveedor: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="RIF del proveedor."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:210px" value="<?php echo $larequisicion[9];?>" name="nombreproveedor[]" id="cam_nombreproveedor0" disabled/>
            </div>
        </div>
         <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Fecha de Recepción <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la orden de entrega."><i class="fa fa-question" ></i></span></label>
                <div class=" input-append date"  data-step="4" id="cam_fecharecepcion" data-date="1991-01-01"  data-date-format="yyyy-mm-dd" data-date-viewmode="years" >
                <input type="text" style="width:220px;" class="span12" name="fecharecepcion" size="16" id="cam_fecharecepcion" value="<?php echo $larequisicion[8];?>" readonly>"/>
                </div>
            </div>
            <div class="col-lg-3 span6">
                <label>Responsable: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del coordinador."><i class="fa fa-question" ></i></span></label>
                  <input style="width:210px" type="text" name="rifdepartamento" data-step="2" data-intro="Nombre del coordinador" value="<?php echo $larequisicion[11].' '.$larequisicion[12];?>" id="cam_rifdepartamento0"  readonly/>
            </div>

        </div>
        <label>Detalles de los consumibles </span></label>
       

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Nombre de Consumible <span class="label label-warning"  style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del artículo."><i class="fa fa-question" ></i></span></th>
                <th>Cantidad Solicitada <span class="label label-warning" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad a introducir."><i class="fa fa-question" ></i></span></th>
                <th>Cantidad Recibida<span class="label label-warning" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad a introducir."><i class="fa fa-question" ></i></span></th>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_requisicion.php');
                    $lobjrequisicion=new clsrequisicion;
                    $id=(isset($_GET['id']))?$_GET['id']:"";
                    $lobjrequisicion->set_Identrada($id);
                    $larequisicions=$lobjrequisicion->consultar_detalle_finalizado();
                    for($i=0;$i<count($larequisicions);$i++)
                     {
                        echo '<td>'.'<input type="hidden" class="span2"  id="articulo_'.$i.'" name="articulo[]" required  value="'.$larequisicions[$i][6].'" disabled placeholder="Nombre artículo"/>'.'</td>';
                        $lobjrequisicion->set_Idrequisicion($larequisicions[$i][0]);
                        echo '<tr>';
                        echo '<td>'.'<input type="text" class="span2"  id="articulos_'.$i.'" name="articulos[]" required  value="'.$larequisicions[$i][4].'" disabled placeholder="Nombre artículo"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="cantidad_'.$i.'" name="cantidad[]" required value="'.$larequisicions[$i][5].'" disabled placeholder="Cantidad"  onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="cantidadentregada_'.$i.'" name="cantidadentregada[]" required placeholder="Cantidad recibida" value="'.$larequisicions[$i][7].'" disabled onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
        <div class="botonera">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='intranet.php?vista=inv_consumibles/requisicion ';">
        </div>
    </form>
</div>