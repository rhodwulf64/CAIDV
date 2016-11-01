 <?php
    require_once("../clases/clase_salida.php");
    $lobjsalida=new clssalida;
    $id=(isset($_GET['id']))?$_GET['id']:"";
    $lobjsalida->set_Idsalida($id);
    $lasalida=$lobjsalida->consultar_salida();
    $lapersona=$lobjsalida->consultar_persona();
?>
<div style="float: left; border:none;" class="col-lg-8 span8 pull-left show">
    <h3>Atender Solicitud de Asignación</h3>
      <div class="alert alert-info">
        <ul>
            <li>En este formulario se podrán atender las Solicitudes de Asignaciones.</li>
            <li>Si necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
        </ul>
    </div>
    <form style="border:none;" class="formulario" action="../controlador/control_salida.php" method="POST" name="form_salida">
        <input type="hidden" value="registrar_entrega" name="operacion" />
        <input type="hidden" id="cam_contador" value="1" name="contador" />
          <input type="hidden" name="cod_tdepartamento" value="<?php print($Datos_departamento[0]['cod_tdepartamento']);?>" id="cam_cod_tdepartamento0"  readonly/>
          <input type="hidden" id="idsalida" value="<?php echo $lasalida[0];?>" name="idsalida" />   
        <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Número de Solicitud del consumible: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Número de orden de salida."><i class="fa fa-question" ></i></span></label>
                <input type="text" autofocus name="idcompra" id="cam_idcompra" data-step="1" readonly data-step="1" data-intro="Número de Solicitud del consumible" data-position="right" value="<?php echo $lasalida[0];?>" required/> 
            </div>
            <div class="col-lg-3 span6">
                <label>Nombre del coordinador: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del coordinador."><i class="fa fa-question" ></i></span></label>
                  <input style="width:210px" type="text" name="rifdepartamento" data-step="2" data-intro="Nombre del coordinador" value="<?php echo $lasalida[10].' '.$lasalida[11];?>" id="cam_rifdepartamento0"  readonly/>
            </div>
        </div>
        <div class="row-fluid">
             <div class="col-lg-3 span6">
                <label>Fecha de solicitud de los consumibles: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la petición de consumibles."><i class="fa fa-question" ></i></span></label>
                <div class=" input-append date"  data-step="3" id="divcam_fecha" data-date="01-01-2016"  data-date-format="dd-mm-yyyy" data-date-viewmode="years" >
                <input type="text" style="width:220px;" class="span12" data-step="3" data-intro="Fecha de la solicitud de los consumibles" name="fecha" size="16" id="cam_fecha2" required value="<?php echo $lasalida[3];?>" readonly/>
                
                </div>
            </div>
            <div class="col-lg-3 span6">
                <div class="col-lg-3 span6">
                <label>Nombre del departamento: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del departamento."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:210px" value="<?php echo $lasalida[2];?>" data-step="4" data-intro="Nombre del departamento" name="nombredepartamento[]" id="cam_nombredepartamento0" readonly/>
                </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Fecha de la Asignación: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la orden de entrega."><i class="fa fa-question" ></i></span></label>
                <div class=" input-append date" id="divcam_fechaentrega" data-step="5" data-intro="Ingrese la fecha de la salida"  data-date="14-05-2016"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                <input type="text" style="width:220px;" class="span12" name="fechaentrega" size="16" id="cam_fechaentrega" required value="" />
                <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
            <div class="col-lg-3 span6">
                <div class="col-lg-3 span6">
                <label>Responsable de la Asignación: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Persona que entrega."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:210px" value="<?php echo ($_SESSION['nombreusu']); ?>" data-step="6" data-intro="Responsable de la entrega" name="responsable" id="cam_responsable" readonly/>
                </div>
            </div>
            <div class="row-fluid">
                <div class="col-lg-3 span6">
                <label>Observación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Observación de la entrega."><i class="fa fa-question" ></i></span></label>
                <textarea name="observacion" id="cam_observacion" class="span6" data-step="7" data-intro="Ingrese una observación para la entrega" required></textarea>
                </div>
                <div class="col-lg-3 span6">
                <label>Solicitante: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Persona que solicita."><i class="fa fa-question" ></i></span></label>
                <input type="text" style="width:210px" value="<?php echo $lapersona[1].' '.$lapersona[0];?>" data-step="8" data-intro="Persona que solicita la entrega" name="persona[]" id="cam_persona0" readonly/>
            </div>
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
                <th>Nombre del consumible <span class="label label-warning"  data-step="9" data-intro="Seleccione el nombre del consumible" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del consumible."><i class="fa fa-question" ></i></span></th>
                <th>Existencia <span class="label label-warning" data-step="10" data-intro="Aquí va la existencia del consumible" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Existencia del consumible."><i class="fa fa-question" ></i></span></th>
                <th>Cantidad solicitada <span class="label label-warning" data-step="11" data-intro="Cantidad solicitada del consumible" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad solicitada del consumible."><i class="fa fa-question" ></i></span></th>
                <th>Cantidad entregar <span class="label label-warning" data-step="12" data-intro="Cantidad a entregar del consumibles" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad a entregar del consumible."><i class="fa fa-question" ></i></span></th>           </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_salida.php');
                    $lobjsalida=new clssalida;
                    $id=(isset($_GET['id']))?$_GET['id']:"";
                    $lobjsalida->set_Idsalida($id);
                    $lasalidas=$lobjsalida->consultar_detalle();
                    for($i=0;$i<count($lasalidas);$i++)
                     {
                        echo '<td>'.'<input type="hidden" class="span2"  id="articulo_'.$i.'" name="articulo[]" required  value="'.$lasalidas[$i][7].'" readonly placeholder="Nombre artículo"/>'.'</td>';
                        $lobjsalida->set_Idsalida($lasalidas[$i][0]);
                        echo '<tr>';
                        echo '<td>'.'<input type="text" class="span2"  id="articulos_'.$i.'" name="articulos[]" required  value="'.$lasalidas[$i][4].'" readonly placeholder="Nombre artículo"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="existencia'.$i.'" name="existencia[]" required value="'. $lasalidas[$i][6].'" readonly placeholder="Existencia"  onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="cantidad_'.$i.'" name="cantidad[]" required value="'. $lasalidas[$i][5].'" readonly placeholder="Cantidad"  onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '<td>'.'<input type="text" class="span2"  id="cantidadentregada_'.$i.'" maxlength="3" name="cantidadentregada[]" onblur="validar_cantidad()" required placeholder="Cantidad Entregada"  onkeypress="return SoloNumeros(event)"/>'.'</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
        <div class="botonera">
            <input type="submit" class="btn btn-success" data-step="13" data-intro='Haga clic en <button class="btn btn-success">Aceptar</button> para guardar la solicitud ingresada' name="btn_enviar" id="btn_enviar" onclick="return validar_fecha();" value="Aceptar">
            <input type="button" class="btn btn-danger" data-step="14" data-intro='Haga clic en <button class="btn btn-danger">Regresar</button> para regresar al listado de las solicitudes' name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='intranet.php?vista=inv_consumibles/salida ';">
        </div>
    </form>
</div>

<script type="text/javascript">
    $('#divcam_fechaentrega').datepicker();
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
        existencia2=document.getElementsByName("existencia[]");
        var cont=0;

        for (var i = 0; i < cantidad.length; i++) 
        {
            if(parseInt(cantidad[i].value)<parseInt(cantidadentregada[i].value))
            {
                cont++;
            }
            if(cont==1)
            {
                Mensaje('La cantidad entregada no puede ser mayor que la solicitada');
                cantidadentregada[i].value='';
                cont=0;
                break;
            }
            if(parseInt(existencia2[i].value)<parseInt(cantidadentregada[i].value))
            {
                cont++;
            }
            if(cont==1)
            {
                Mensaje('La cantidad entregada no puede ser mayor que la existencia');
                cantidadentregada[i].value='';
                cont=0;
                break;
            }
        };
    }

function validar_fecha()
    {
        resultado=false;
        vInvalido=0;
        var fecha1=$("#cam_fecha2").val().split("-").reverse().join("-");
        var fecha2=$("#cam_fechaentrega").val().split("-").reverse().join("-");


        if(fecha2=="")
        {
            Mensaje("Disculpe, la fecha de entrega no puede quedar vacía.");
            vInvalido=1;
        }
        else if (fecha2<fecha1)
        {
            Mensaje("Disculpe, la fecha de entrega no puede ser menor a la fecha de solicitud del consumible.");
            vInvalido=1;
        }       


        if (vInvalido==0)
        {
            resultado=true;
        }
        
        return resultado;
    }
    function guardaActualizacion()
    {
        if (validar())
        {
            $("#form_salida").submit();



        }
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