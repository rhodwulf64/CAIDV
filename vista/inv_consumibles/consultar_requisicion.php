 <?php
    require_once("../clases/clase_requisicion.php");
    $lobjrequisicion=new clsrequisicion;
    $id=(isset($_GET['id']))?$_GET['id']:"";
    $lobjrequisicion->set_Idrequisicion($id);
    $larequisicion=$lobjrequisicion->consultar_requisicion();
?>
<div style="float: left; border:none;" class="col-lg-8 span8 pull-left show">
    <h3>Atender Solicitud de Recepción</h3>
      <div class="alert alert-info">
        <ul>
            <li>En este formulario se podrán atender las Solicitudes de Recepciones de los Bienes Consumibles.</li>
            <li>Si necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
        </ul>
    </div>
    <form style="border:none;" class="formulario" action="../controlador/control_requisicion.php" method="POST" name="form_requisicion">
        <input type="hidden" value="registrar_entrada" name="operacion" />
        <input type="hidden" id="cam_contador" value="1" name="contador" />
        <input type="hidden" name="cod_persona" value="<?php print($Datos_persona[0]['cod_persona']);?>" id="cam_cod_persona0"  readonly/>
        <input type="hidden" id="idrequisicion" value="<?php echo $larequisicion[0];?>" name="idrequisicion" />        
          <input type="hidden" name="idproveedor0" value="<?php print($Datos_proveedor[0]['idproveedor']);?>" id="cam_idproveedor0"  readonly/>
        <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Número de solicitud: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Número de orden de compra."><i class="fa fa-question" ></i></span></label>
                <input type="text" autofocus name="idcompra" id="cam_idcompra" data-step="1" readonly data-intro="Ingrese el número de orden de compra" data-position="right" value="<?php echo $larequisicion[0];?>" required/> 
            </div>
            <div class="col-lg-3 span6">
                <label>RIF del proveedor: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="RIF del proveedor."><i class="fa fa-question" ></i></span></label>
                <input style="width:210px" type="text" name="rifproveedor" data-step="2" value="<?php print($Datos_proveedor[0]['idproveedor']);?>" id="cam_rifproveedor0" data-intro="Seleccione el RIF del proveedor" readonly required/>
                <button class="btn-mini btn-info" style="margin-bottom:10px" type="button" onclick="ventana('traerproveedor.php?f=0')"><i class="icon-search icon-white"></i></button>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-3 span6">
                <div class=" input-append date"  data-step="4" id="divcam_fecha" data-date="01-01-2016"  data-date-format="dd-mm-yyyy" data-date-viewmode="years" >
                <label>Fecha de la solicitud <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la solicitud."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:220px;" class="span12" name="fecha"  size="16" id="cam_fecha2" data-step="3" data-intro="Fecha de la solicitud" data-content="Fecha de la solicitud."  required value="<?php echo $larequisicion[2];?>" readonly />
            </div>
            </div>
            <div class="col-lg-3 span6">
                 <label>Nombre del proveedor: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del proveedor."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:210px" value="<?php print($Datos_proveedor[0]['nombreproveedor']);?>" data-step="4" data-intro="Nombre del proveedor" name="nombreproveedor[]" id="cam_nombreproveedor0" readonly required/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Fecha de Recepción <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la orden de entrega."><i class="fa fa-question" ></i></span></label>
                <div class=" input-append date"  data-step="5" id="divcam_fecharecepcion" data-date="01-01-2016"  data-date-format="dd-mm-yyyy" data-date-viewmode="years" >
                <input type="text" style="width:220px;" class="span12" name="fecharecepcion" data-step="5" data-intro="Fecha en la que se atiende la solicitud" size="16" id="cam_fecharecepcion" required>
                <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>

            <div class="col-lg-3 span6">
                <label>Responsable de la Recepción: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del solicitante."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:210px" value="<?php print($Datos_persona[0]['persona']);?>" data-step="4" data-intro="Seleccione el nombre del solicitante" name="persona[]" id="cam_persona0" readonly/>
                <button class="btn-mini btn-info" style="margin-bottom:10px" type="button" onclick="ventana('traerpersona.php?f=0')"><i class="icon-search icon-white"></i></button>
                 
            </div>

        </div>

        <?php
            require_once('../libreria/utilidades.php');
            require_once('../clases/clase_articulo.php');

            $ObjUtil = new clsUtil();
            $lobjarticulo = new clsarticulo;


            $laarticulos = $lobjarticulo->consultar_articulos();
           
        ?>
        <label>Detalles de los consumibles </span></label>
       

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Nombre de consumible <span class="label label-warning"  style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-step="6" data-intro="Nombre del consumible" data-content="Nombre del consumible."><i class="fa fa-question" ></i></span></th>
                <th>Cantidad Solicitada <span class="label label-warning" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-step="7" data-intro="Cantidad solicitada del consumible" data-content="Cantidad a introducir."><i class="fa fa-question" ></i></span></th>
                <th>Cantidad Recibida<span class="label label-warning" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-step="8" data-intro="Cantidad que llegó del consumible" data-content="Cantidad a introducir."><i class="fa fa-question" ></i></span></th>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_requisicion.php');
                    $lobjrequisicion=new clsrequisicion;
                    $id=(isset($_GET['id']))?$_GET['id']:"";
                    $lobjrequisicion->set_Idrequisicion($id);
                    $larequisicions=$lobjrequisicion->consultar_detalle();
                    for($i=0;$i<count($larequisicions);$i++)
                     {
                        echo '<td>'.'<input type="hidden" class="span2"  id="articulo_'.$i.'" name="articulo[]" required  value="'.$larequisicions[$i][6].'" readonly placeholder="Nombre de Consumible"/>'.'</td>';
                        $lobjrequisicion->set_Idrequisicion($larequisicions[$i][0]);
                        echo '<tr>';
                        echo '<td>'.'<input type="text" class="span2"  id="articulos_'.$i.'" name="articulos[]" required  value="'.$larequisicions[$i][4].'" readonly placeholder="Nombre de Consumible"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="cantidad_'.$i.'" name="cantidad[]" required value="'. $larequisicions[$i][5].'" readonly placeholder="Cantidad"  onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="cantidadentregada_'.$i.'" maxlength="3" name="cantidadentregada[]" onblur="validar_cantidad()" required placeholder="Cantidad recibida"  onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar"  data-step="9" data-intro='Haga clic en <button class="btn btn-success">Aceptar</button> para guardar la solicitud ingresada' id="btn_enviar" onclick="return validar();" value="Aceptar">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" data-step="10" value="Regresar" data-intro='Haga clic en <button class="btn btn-danger">Regresar</button> para regresar al listado de solicitudes' onClick="window.location.href='intranet.php?vista=inv_consumibles/requisicion ';">
        </div>
    </form>
</div>

<script type="text/javascript">
    $('#divcam_fecharecepcion').datepicker();

    $("#cam_fecharecepcion").lemez_aceptar("fecha","btn_enviar");


function ventana(e)
    {
       window.open(e, 'window', 'width=1000,height=600');
    }
    function Mensaje(e){
        swal(e)
    }
       function validar_cantidad()
    {
        cantidad=document.getElementsByName("cantidad[]");
        cantidadentregada=document.getElementsByName("cantidadentregada[]");
        var cont=0;
        for (var i = 0; i < cantidad.length; i++) 
        {
            if(cantidad[i].value<cantidadentregada[i].value)
            {
                cont++;
            }
            if(cont==1)
            {
                Mensaje('La cantidad recibida no puede ser mayor que la solicitada');
                cantidadentregada[i].value='';
                cantidadentregada.focus();
                cont=0;
                break;
            }
        };
    }

    function validar()
    {
 
        var nombreproveedor = document.getElementById('cam_nombreproveedor0');
        resultado=false;
        vInvalido=0;
        var fecha1=$("#cam_fecha2").val().split("-").reverse().join("-");
        var fecha2=$("#cam_fecharecepcion").val().split("-").reverse().join("-");

        if(nombreproveedor.value=='')
        {
            Mensaje('Debe asignar un proveedor.');
            vInvalido=1;
        }
        if(fecha2=="")
        {
            Mensaje("Disculpe, la fecha de entrega no puede quedar vacía.");
            vInvalido=1;
        }
        else if (fecha1>fecha2)
        {
            Mensaje("Disculpe, la fecha de entrega no puede ser menor a la fecha de solicitud del Consumible.");
            vInvalido=1;
        }       


        if (vInvalido==0)
        {
            resultado=true;
        }
        
        return resultado;


    }

     function SoloNumeros(e)
    {
        var tecla = (document.all) ? e.keyCode : e.which;
        if((tecla==8)||(tecla==0))return true;
        patron = /[1234567890]/;
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }
</script>
