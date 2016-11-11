<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
         
        $laServicios=$lobjRol->consultar_servicios_menu($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='inv_consumibles/consultar_requisicion')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='inv_consumibles/registrar_requisicion')
            {
                $registrar=true;
            }
            if($laServicios[$j][2]=='inv_consumibles/eliminar_requisicion')
            {
                $eliminar=true;
            }
             if($laServicios[$j][2]=='inv_consumibles/consultar_entrada')
            {
                $consultarfin=true;
            }
            if($laServicios[$j][2]=='inv_consumibles/eliminar_entrada')
            {
                $eliminarfin=true;
            }
        }
    }
?>
<script>
function Mensaje(e){
    swal(e);
  }
 function buscar(id)
 {
    window.location.href="?vista=inv_consumibles/consultar_requisicion&id="+id;
 }
  function buscarfin(id)
 {
    window.location.href="?vista=inv_consumibles/consultar_entrada&id="+id;
 }
  function eliminar(id)
  {
     swal({   title: "Desactivar solicitud",   
    text: "¿Está seguro que desea desactivar la solicitud seleccionada?  \n ¡El proceso no podrá ser revertido!",   
    type: "warning",   showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "¡Si, estoy seguro!",   
    cancelButtonText: "Cancelar",
    closeOnConfirm: false }, 
    function(){
      document.getElementById("cam_idrequisicion").value=id;
      document.form_requisicion.submit();
     });
  }
  function eliminarfin(id)
  {
     swal({   title: "Desactivar solicitud",   
    text: "¿Está seguro que desea desactivar la solicitud seleccionada?  \n ¡El proceso no podrá ser revertido!",   
    type: "warning",   showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "¡Si, estoy seguro!",   
    cancelButtonText: "Cancelar",
    closeOnConfirm: false }, 
    function(){
      document.getElementById("cam_idrequisicion").value=id;
      document.getElementById("cam_operacion").value='eliminar_entrada';
      document.form_requisicion.submit();
     });
  }
    function restaurar(id){
    Mensaje('No puede restaurar una solicitud.');
  }
  function Mensaje(e){
    swal(e);
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
    <h3>Solicitud de recepción de bienes consumibles</h3>
   <div class="alert alert-info">
        <ul>
            En éste módulo podrá registrar, consultar, desactivar y/o activar las solicitudes de recepciones de bienes consumibles.
        </ul>
    </div>
    <form action="../controlador/control_requisicion.php" method="POST" name="form_requisicion">
        <input type="hidden" value="eliminar_requisicion" name="operacion" id="cam_operacion"/>
        <input type="hidden"  name="idrequisicion" id="cam_idrequisicion"/>
        <?php
        if($registrar)
        {
            echo '<a id="btn_registrar" class="btn btn-success" href="?vista=inv_consumibles/registrar_requisicion"><i class="icon-plus icon-white"></i> Solicitar Recepción</a>';
        }
        ?>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                
            <th>N° de Solicitud</th><th>Fecha de Solicitud</th><th>Fecha de Recepción</th><th>Estado</th>

                <?php if($consultar || $eliminar)
                        { echo '<th>Acción</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_requisicion.php');
                    $lobjrequisicion=new clsrequisicion;
                    $larequisicions=$lobjrequisicion->consultar_requisicions_inactivos();
                    for($i=0;$i<count($larequisicions);$i++)
                    {
                        $dependencia=false;
                        $lobjrequisicion->set_Idrequisicion($larequisicions[$i][0]);
                      //  $dependencia=$lobjrequisicion->consultar_dependencia();
                        if($larequisicions[$i][3]=='1')
                        {
                            $larequisicions[$i][3]='Pendiente';
                        }
                        if($larequisicions[$i][3]=='0') 
                        {
                            $larequisicions[$i][3]='Inactivo';
                        }
                         if($larequisicions[$i][3]=='2') 
                        {
                            $larequisicions[$i][3]='Finalizada';
                        }

                        echo '<tr>';
                        echo '<td>'.$larequisicions[$i][0].'</td>';
                        echo '<td>'.$larequisicions[$i][2].'</td>';
                        echo '<td>'.$larequisicions[$i][4].'</td>';
                        echo '<td>'.$larequisicions[$i][3].'</td>';

                   
                        if($consultar || $eliminar || $consultarfin )
                        {
                            echo '<td>';
                            if($consultar && $larequisicions[$i][3]=='Pendiente')
                            {
                                echo '<a class="btn btn-warning" href="#" title="Atender" onclick="buscar('.$larequisicions[$i][0].')"><i class="icon-search icon-white"></i></a> ';
                            }
                             if($consultarfin && $larequisicions[$i][3]=='Finalizada')
                            {
                                echo '<a class="btn btn-info" href="#" title="Consultar" onclick="buscarfin('.$larequisicions[$i][0].')"><i class="icon-lock icon-white"></i></a> ';
                            }
                            if($eliminar && $dependencia==false)
                            {
                                if($larequisicions[$i][3]=='Pendiente')
                                {
                                    echo '<a class="btn btn-danger" href="#" title="Desactivar" onclick="eliminar('.$larequisicions[$i][0].')" ><i class="icon-remove icon-white"></i></a> ';
                                    
                                }
                                if ($larequisicions[$i][3]=='Inactivo') 
                                {
                                    echo '<a class="btn btn-danger" title="Restaurar" href="#" onclick="restaurar('.$larequisicions[$i][0].')" ><i class="icon-refresh icon-white"></i></a>';
                                }

                            }
                            /*
                            if($eliminarfin && $dependencia==false)
                            {
                                if($eliminarfin && $larequisicions[$i][3]=='Finalizada')
                                {
                                    echo '<a class="btn btn-warning" href="#" title="Eliminar Acción" onclick="eliminarfin('.$larequisicions[$i][0].')"><i class="icon-remove icon-white"></i></a> ';
                                }
                            }
                            */
                            if ($larequisicions[$i][3]=='Finalizada')
                            {
                                echo '<a class="btn btn-success" href="../reporte/imprimir_entrada.php?id='.$larequisicions[$i][0].'" target="_blank"><i class="fa fa-file-text"></i></a>';                                      
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