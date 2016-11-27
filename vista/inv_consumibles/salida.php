<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
         
        $laServicios=$lobjRol->consultar_servicios_menu($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='inv_consumibles/consultar_salida')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='inv_consumibles/registrar_salida')
            {
                $registrar=true;
            }
            if($laServicios[$j][2]=='inv_consumibles/eliminar_salida')
            {
                $eliminar=true;
            }
            if($laServicios[$j][2]=='inv_consumibles/consultar_salida_lista')
            {
                $consultarfin=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=inv_consumibles/consultar_salida&id="+id;
 }
  function eliminar(id)
  {
     swal({   title: "Desactivar solicitud",   
    text: "¿Está seguro que desea desactivar la Asignación seleccionada?",   
    type: "warning",   showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "¡Si, estoy seguro!",   
    cancelButtonText: "Cancelar",
    closeOnConfirm: false }, 
    function(){
        document.getElementById("cam_idsalida").value=id;
        document.form_salida.submit();
     });
  }
  function buscarfin(id)
 {
    window.location.href="?vista=inv_consumibles/consultar_salida_lista&id="+id;
 }
function restaurar(id)
  {
    swal({   title: "Restaurar solicitud",   
    text: "¿Está seguro que desea restaurar la Asignación seleccionada?",   
    type: "warning",   showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "¡Si, estoy seguro!",   
    cancelButtonText: "Cancelar",
    closeOnConfirm: false }, 
    function(){
      document.getElementById("cam_idsalida").value=id;
      document.getElementById("cam_operacion").value='restaurar_salida';
      document.form_salida.submit();
     });
  }
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        oTable = $('#filtro').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayLength": 5                    
        });
    } );
</script>  
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Solicitud de Asignación de Bienes Consumibles</h3>
   <div class="alert alert-info">
        <ul>
            En éste módulo podrá registrar, consultar, desactivar y activar las Solicitudes de asignaciones de Bienes Consumibles.
        </ul>
    </div>
    <form action="../controlador/control_salida.php" method="POST" name="form_salida">
        <input type="hidden" value="eliminar_salida" name="operacion" id="cam_operacion"/>
        <input type="hidden"  name="idsalida" id="cam_idsalida"/>
        <?php
        if($registrar)
        {
            echo '<a id="btn_registrar" class="btn btn-success" href="?vista=inv_consumibles/registrar_salida"><i class="icon-lock icon-white"></i> Solicitar</a>';
        }
        ?>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                
            <th>N° de Solicitud</th><th>departamento</th><th>Fecha de Solicitud</th><th>Fecha de Asignación</th><th>Estado</th>

                <?php if($consultar || $eliminar)
                        { echo '<th>Acción</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_salida.php');
                    $lobjsalida=new clssalida;
                    $lasalidas=$lobjsalida->consultar_salidas_inactivos();
                    for($i=0;$i<count($lasalidas);$i++)
                    {
                        $dependencia=false;
                        $lobjsalida->set_Idsalida($lasalidas[$i][0]);
                      //  $dependencia=$lobjsalida->consultar_dependencia();
                        if($lasalidas[$i][4]=='1')
                        {
                            $lasalidas[$i][4]='Pendiente';
                        }
                        if($lasalidas[$i][4]=='0') 
                        {
                            $lasalidas[$i][4]='Inactivo';
                        }
                         if($lasalidas[$i][4]=='2') 
                        {
                            $lasalidas[$i][4]='Finalizada';
                        }

                        echo '<tr>';
                        echo '<td>'.$lasalidas[$i][0].'</td>';
                        echo '<td>'.$lasalidas[$i][2].'</td>';
                        echo '<td>'.$lasalidas[$i][3].'</td>';
                        echo '<td>'.$lasalidas[$i][5].'</td>';
                        echo '<td>'.$lasalidas[$i][4].'</td>';

                   
                            if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar && $lasalidas[$i][4]=='Pendiente')
                            {
                                echo '<a class="btn btn-warning" href="#" title="Atender" onclick="buscar('.$lasalidas[$i][0].')"><i class="icon-search icon-white"></i></a> ';
                            }
                             if($consultarfin && $lasalidas[$i][4]=='Finalizada')
                            {
                                echo '<a class="btn btn-info" href="#" title="Consultar" onclick="buscarfin('.$lasalidas[$i][0].')"><i class="icon-lock icon-white"></i></a> ';
                            }
                            if($eliminar && $dependencia==false)
                            {
                                if($lasalidas[$i][4]=='Pendiente')
                                {
                                    echo '<a class="btn btn-danger" href="#" title="Desactivar" onclick="eliminar('.$lasalidas[$i][0].')" ><i class="icon-remove icon-white"></i></a> ';
                                    
                                }
                                if ($lasalidas[$i][4]=='Inactivo') 
                                {
                                    echo '<a class="btn btn-warning" title="Restaurar" href="#" onclick="restaurar('.$lasalidas[$i][0].')" ><i class="icon-refresh icon-white"></i></a>';
                                }

                            }
                            if ($lasalidas[$i][4]=='Finalizada')
                            {
                            echo '<a class="btn btn-success" href="../reporte/imprimir_salida.php?id='.$lasalidas[$i][0].'" target="_blank"><i class="fa fa-file-text"></i></a>'; 
                            }       


                            echo "</td>";
                        }
                       
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
    </form>
     
</div>