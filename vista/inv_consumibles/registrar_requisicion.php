<div style="float: left; border:none;" class="col-lg-8 span8 pull-left show">
    <h3>Registrar Nueva Solicitud de Recepción </h3>
      <div class="alert alert-info">
        <ul>
            <li>En este formulario se registrará la nueva Solicitud de Recepción.</li>
            <li>Si necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
        </ul>
    </div>
    <form style="border:none;" class="formulario" action="../controlador/control_requisicion.php" method="POST" name="form_requisicion">
        <input type="hidden" value="registrar_requisicion" name="operacion" />
        <input type="hidden" id="cam_contador" value="1" name="contador" />
        <div class="row-fluid">
            <div class="col-lg-3 span6">
                <label>Fecha de la solicitud: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la solicitud."><i class="fa fa-question" ></i></span></label>
                <div class=" input-append date"  data-step="1" id="cam_fecha" data-date="01-01-2016"  data-intro="Ingrese la fecha de la solicitud" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                <input type="text" style="width:220px;" class="span12" name="fecha" size="16" id="cam_fecha2" required value="" />
                <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
        </div>
        <div class="row-fluid">
           
        </div>


        <?php
            require_once('../libreria/utilidades.php');
            require_once('../clases/clase_articulo.php');

            $ObjUtil = new clsUtil();
            $lobjarticulo = new clsarticulo;


            $laarticulos = $lobjarticulo->consultar_articulos();
           
        ?>
        <label>Detalles de los Consumibles </span></label>
       
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Nombre de Consumible <span class="label label-warning" data-step="2" data-intro="Ingrese el nombre del insumo" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del insumo."><i class="fa fa-question" ></i></span></th>
                <th>Cantidad <span class="label label-warning" data-step="3" data-intro="Ingrese la cantidad del insumo" style="width:10px; display:inline;color:#fff;" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad a introducir."><i class="fa fa-question" ></i></span></th>
                <th>Operación <span class="label label-warning" data-step="4" data-intro="Permite agregar o quitar consumibles en la lista" style="width:10px; display:inline;;color:#fff" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Agregar o quitar consumibles."><i class="fa fa-question" ></i></span></th>
            </thead>
            <tbody id="filas">
                <tr>
                    <td>

                        <select class="span2" id="articulo_0" name="articulo[]"  required onchange="validar_articulos(this)" >
                            <option value="">SELECCIONE UNA OPCIÓN</option>
                            <?php
                                for($i=0;$i<count($laarticulos);$i++)
                                {
                                 ?>
                                    <option id="<?php print($laarticulos[$i][0]);?>" value="<?php print($laarticulos[$i][0]); ?>"><?php print($laarticulos[$i][1]);?></option>
                                 <?php
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                    <input type="text" class="span2"  id="cantidad_0" name="cantidad[]" maxlength="3" required  placeholder="Cantidad" onblur="validar_cantidad()" onkeypress="return SoloNumeros(event)"/>
                </td>

                    <td>
                        <button type="button" class="btn-mini btn-success" id="btn_sumar" onclick="agregar()" ><i class="icon-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="botonera">
            <input type="submit" class="btn btn-success" data-step="5" data-intro='Haga clic en <button class="btn btn-success">Aceptar</button> para guardar el insumo ingresado'  name="btn_enviar" id="btn_enviar" onclick="return validar();" value="Aceptar">
            <input type="button" class="btn btn-danger" data-intro='Haga clic en <button class="btn btn-danger">Regresar</button> para regresar al listado de consumibles' data-step="6" name="btn_regresar" id="btn_regresar" value="Regresar"onclick="window.location.href='intranet.php?vista=inv_consumibles/requisicion ';">
        </div>
    </form>
</div>

<script type="text/javascript">
    $('#cam_fecha').datepicker();

    $("#cam_fecha2").lemez_aceptar("fecha","btn_enviar");

    function Mensaje(e){
        swal(e)
    }

function ventana(e)
    {
       window.open(e, 'window', 'width=1000,height=600');
    }

    function validar_articulos(e)
    {
        articulo=document.getElementsByName("articulo[]");
        var cont=0;
        for (var i = 0; i < articulo.length; i++) 
        {
            if(articulo[i].value==e.value)
            {
                cont++;
            }
            if(cont==2)
            {
                Mensaje('No se puede repetir los consumibles');
                // Notifica_Error('No se pueden repetir los insumos');
                e.value='';
                break;
            }
        };
    }
     function validar_cantidad()
    {
        cantidad=document.getElementsByName("cantidad[]");
        var cont=0;
        for (var i = 0; i < cantidad.length; i++) 
        {
            if(cantidad[i].value=='0')
            {
                cont++;
            }
            if(cont==1)
            {
                Mensaje('La cantidad no puede ir en 0');
                cantidad[i].value='';
                break;
            }
        };
    }   
     function agregar()    
   {     

    var articulo = document.getElementById("articulo_0");
    
    
    var cam_contador = document.getElementById("cam_contador");
      contador=parseInt(cam_contador.value)+1;

      var filas = document.getElementById("filas");
      var nueva_fila =document.createElement("tr");
      var articulo_select = articulo.cloneNode(true);
      var columna0 =document.createElement("td");
      var columna1 =document.createElement("td");
      var columna2 =document.createElement("td");
  
        nueva_fila.setAttribute("id", "filas");
        articulo_select.setAttribute("id", "cam_idarticulo_"+contador+"");
        columna0.appendChild(articulo_select);
        columna1.innerHTML='<input type="text" class="span2" id="cantidad_'+contador+'" maxlength="3" onkeypress="return SoloNumeros(event)" onblur="validar_cantidad(this)" name="cantidad[]"  required  placeholder="Cantidad" />';
        columna2.innerHTML='<button type="button" class="btn-mini btn-danger" onclick="quitar(this)"><i class="icon-remove"></i></button>';

      nueva_fila.appendChild(columna0);
      nueva_fila.appendChild(columna1);
      nueva_fila.appendChild(columna2);
   
      filas.appendChild(nueva_fila);
      cam_contador.value=contador;
   }
   function quitar(e)
     {
        var filas = document.getElementById("filas");          
        var td = e.parentNode;
        var tr = td.parentNode;
        filas.removeChild(tr);
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

<!--
        <div class="col-lg-3 span6">
                <label>RIF del proveedor: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de la orden de entrega."><i class="fa fa-question" ></i></span></label>
                  <input style="width:210px" type="text" name="rifproveedor" value="<?php print($Datos_proveedor[0]['idproveedor']);?>" id="cam_rifproveedor0"  readonly/>
                  <button class="btn-mini btn-info" style="margin-bottom:10px" type="button" onclick="ventana('traerproveedor.php?f=0')"><i class="icon-search icon-white"></i></button>
        </div>
   <div class="col-lg-3 span6">
        <div class="col-lg-3 span6">
        <label>Nombre del proveedor: <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="RIF del proveedor."><i class="fa fa-question" ></i></span></label>
        <input type="text" style="width:210px" value="<?php print($Datos_proveedor[0]['nombreproveedor']);?>" name="nombreproveedor[]" id="cam_nombreproveedor0" readonly/>
    </div>
    -->