<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
         
        $laServicios=$lobjRol->consultar_servicios_menu($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='archivo/consultar_presentacion')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='archivo/registrar_presentacion')
            {
                $registrar=true;
            }
            if($laServicios[$j][2]=='archivo/eliminar_presentacion')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>

 function buscar(id)
 {
    window.location.href="?vista=archivo/consultar_presentacion&id="+id;
 }
  function eliminar(id)
  {
    swal({   title: "Desactivar presentacion",   
    text: "¿Está seguro que desea desactivar la presentación seleccionada?",   
    type: "warning",   showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "¡Si, estoy seguro!",   
    cancelButtonText: "Cancelar",
    closeOnConfirm: false }, 
    function(){
        document.getElementById("cam_idpresentacion").value=id;
        document.form_presentacion.submit();   
       
   });
  }
    function restaurar(id)
  {
     swal({   title: "Restaurar presentacion",   
    text: "¿Está seguro que desea restaurar la presentación seleccionada?",   
    type: "warning",   showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    cancelButtonText: "Cancelar",
    confirmButtonText: "¡Si, estoy seguro!",   
    closeOnConfirm: false }, 
    function(){
      document.getElementById("cam_idpresentacion").value=id;
      document.getElementById("cam_operacion").value='restaurar_presentacion';
      document.form_presentacion.submit();
       
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
    <h3>Presentación</h3>
   <div class="alert alert-info">
        <ul>
            En este módulo podrá registrar, consultar, editar, desactivar y/o activar las presentaciones en el sistema.
        </ul>
    </div>
    <form action="../controlador/control_presentacion.php" method="POST" name="form_presentacion">
        <input type="hidden" value="eliminar_presentacion" name="operacion" id="cam_operacion"/>
        <input type="hidden"  name="idpresentacion" id="cam_idpresentacion"/>
        <?php
        if($registrar)
        {
            echo '<a id="btn_registrar" class="btn btn-success" href="?vista=archivo/registrar_presentacion"><i class="icon-plus icon-white"></i> Registrar </a>';
        }
        ?>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Código</th><th>Nombre</th><th>Estatus</th><?php if($consultar || $eliminar)
                        { echo '<th>Acción</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_presentacion.php');
                    $lobjpresentacion=new clspresentacion;
                    $lapresentacions=$lobjpresentacion->consultar_presentacions_inactivos();
                    for($i=0;$i<count($lapresentacions);$i++)
                    {
                      $dependencia=false;
                        $lobjpresentacion->set_presentacion($lapresentacions[$i][0]);
                        $dependencia=$lobjpresentacion->consultar_dependencia();
                        if($lapresentacions[$i][2])
                        {
                            $lapresentacions[$i][2]='Activo';
                        }
                        elseif(!$lapresentacions[$i][2]) 
                        {
                            $lapresentacions[$i][2]='Inactivo';
                        }

                        echo '<tr>';
                        echo '<td>'.$lapresentacions[$i][0].'</td>';
                        echo '<td>'.$lapresentacions[$i][1].'</td>';
                        echo '<td>'.$lapresentacions[$i][2].'</td>';

                        if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar && $lapresentacions[$i][2]=='Activo')
                            {
                                echo '<a class="btn btn-info" href="#" title="Consultar" onclick="buscar('.$lapresentacions[$i][0].')"><i class="icon-search icon-white"></i></a> ';
                            }
                            if($eliminar && $dependencia==false)
                            {
                                if($lapresentacions[$i][2]=='Activo')
                                {
                                    echo '<a class="btn btn-danger" href="#" title="Desactivar" onclick="eliminar('.$lapresentacions[$i][0].')" ><i class="icon-remove icon-white"></i></a> ';
                                    
                                }
                                elseif ($lapresentacions[$i][2]=='Inactivo') 
                                {
                                    echo '<a class="btn btn-warning" title="Restaurar" href="#" onclick="restaurar('.$lapresentacions[$i][0].')" ><i class="icon-refresh icon-white"></i></a>';
                                }
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