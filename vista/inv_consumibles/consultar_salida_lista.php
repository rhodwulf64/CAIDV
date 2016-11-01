 <?php
    require_once("../clases/clase_salida.php");
    $lobjsalida=new clssalida;
    $id=(isset($_GET['id']))?$_GET['id']:"";
    $lobjsalida->set_Idsalida($id);
    $lasalida=$lobjsalida->consultar_salida_fin();
    $lapersona=$lobjsalida->consultar_persona();
?>
<div style="float: left; border:none;" class="col-lg-8 span8 pull-left show">
    <h3>Solicitud de Asignación de Bienes Consumibles</h3>
        </ul>
    </div>
    <form style="border:none;" class="formulario" action="../controlador/control_salida.php" method="POST" name="form_salida">
        <input type="hidden" value="registrar_entrega" name="operacion" />
        <input type="hidden" id="cam_contador" value="1" name="contador" />
          <input type="hidden" name="cod_tdepartamento" value="<?php print($Datos_departamento[0]['cod_tdepartamento']);?>" id="cam_cod_tdepartamento0"  readonly/>
          <input type="hidden" id="idsalida" value="<?php echo $lasalida[0];?>" name="idsalida" />   
        <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Número de Solicitud de consumibles: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Número de Solicitud de consumibles."><i class="fa fa-question" ></i></span></label>
                <input type="text" autofocus name="idcompra" id="cam_idcompra" data-step="1" readonly data-intro="Ingrese el número de orden de compra" data-position="right" value="<?php echo $lasalida[0];?>" readonly/> 
            </div>
            <div class="col-lg-3 span6">
                <label>Nombre del coordinador: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del coordinador."><i class="fa fa-question" ></i></span></label>
                  <input style="width:210px" type="text" name="rifdepartamento" value="<?php echo $lasalida[8].' '.$lasalida[5];?>" id="cam_rifdepartamento0"  readonly/>
            </div>
        </div>
        <div class="row-fluid">
             <div class="col-lg-3 span6">
                <label>Fecha de Solicitud de consumibles: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de Solicitud de consumibles."><i class="fa fa-question" ></i></span></label>
                <div class=" input-append date"  data-step="3" id="divcam_fecha" data-date="01-01-2016"  data-date-format="dd-mm-yyyy" data-date-viewmode="years" >
                <input type="text" style="width:220px;" class="span12" name="fecha" size="16" id="cam_fecha2" readonly value="<?php echo $lasalida[3];?>" readonly/>
                
                </div>
            </div>
            <div class="col-lg-3 span6">
                <div class="col-lg-3 span6">
                <label>Nombre del departamento: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="RIF del departamento."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:210px" value="<?php echo $lasalida[2];?>" name="nombredepartamento[]" id="cam_nombredepartamento0" readonly/>
                </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Fecha de la Asignación: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la orden de entrega."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:220px;" class="span12" name="fechaentrega" value="<?php echo $lasalida[9];?>" size="16" id="cam_fechaentrega" readonly  value="" />
            </div>
            <div class="col-lg-3 span6">
                <div class="col-lg-3 span6">
                <label>Responsable de la Asignación: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="RIF del departamento."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:210px" value="<?php echo $lasalida[11];?>" name="responsable" id="cam_responsable" readonly/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="col-lg-3 span6">
                <label>Observación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Observación de la entrega."><i class="fa fa-question" ></i></span></label>
                <textarea name="observacion" id="cam_observacion" value="<?php echo $lasalida[11];?>" class="span6" readonly><?php echo $lasalida[10];?></textarea>
                </div>
                <div class="col-lg-3 span6">
                <label>Solicitante: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="RIF del departamento."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:210px" value="<?php echo $lapersona[1].' '.$lapersona[0];?>" name="persona[]" id="cam_persona0" readonly/>
            </div>
            </div>
        </div>
        <label>Detalles de los consumibles </span></label>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Nombre del consumible <span class="label label-warning"  style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del artículo."><i class="fa fa-question" ></i></span></th>
                <th>Existencia <span class="label label-warning" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Existencia del artículo."><i class="fa fa-question" ></i></span></th>
                <th>Cantidad solicitada <span class="label label-warning" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad que fue solicitada."><i class="fa fa-question" ></i></span></th>
                <th>Cantidad entregada<span class="label label-warning" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad a entregar."><i class="fa fa-question" ></i></span></th>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_salida.php');
                    $lobjsalida=new clssalida;
                    $id=(isset($_GET['id']))?$_GET['id']:"";
                    $lobjsalida->set_Idsalida($id);
                    $lasalidas=$lobjsalida->consultar_detalle_finalizado();
                    for($i=0;$i<count($lasalidas);$i++)
                     {
                        echo '<td>'.'<input type="hidden" class="span2"  id="articulo_'.$i.'" name="articulo[]" readonly  value="'.$lasalidas[$i][7].'" readonly placeholder="Nombre artículo"/>'.'</td>';
                        $lobjsalida->set_Idsalida($lasalidas[$i][0]);
                        echo '<tr>';
                        echo '<td>'.'<input type="text" class="span2"  id="articulos_'.$i.'" name="articulos[]" readonly  value="'.$lasalidas[$i][4].'" readonly placeholder="Nombre artículo"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="existencia'.$i.'" name="existencia[]" readonly value="'. $lasalidas[$i][6].'" readonly placeholder="Existencia"  onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="cantidad_'.$i.'" name="cantidad[]" readonly value="'. $lasalidas[$i][5].'" readonly placeholder="Cantidad"  onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="cantidadentregada_'.$i.'" name="cantidadentregada[]" value="'.$lasalidas[$i][7].'" readonly placeholder="Cantidad Entregada"  onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
        <div class="botonera">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='intranet.php?vista=inv_consumibles/salida ';">
        </div>
    </form>
</div>