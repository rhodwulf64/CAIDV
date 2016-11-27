<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
         
        $laServicios=$lobjRol->consultar_servicios_menu($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='persona/consultar_responsablereceptor')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='persona/registrar_responsablereceptor')
            {
                $registrar=true;
            }
            if($laServicios[$j][2]=='persona/eliminar_responsablereceptor')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=persona/registrar_responsablereceptor&id="+id;
 }
    function eliminar(id)
  {
      document.getElementById("cam_idinstrumento").value=id;
  }

  function descativar()
  {
    if (document.getElementById("cam_razondesactiva").value!="")
    {
        if(confirm("¿Esta seguro que desea desactivar el Ente Receptor seleccionado?"))
        {
          document.form_responsablereceptor.submit();
        }      
    }
    else
    {
        Notifica_Error("Disculpe, debe ingresar una razón para desactivar este registro.");
        document.getElementById("cam_razondesactiva").focus();
    }

  }
  
  function restaurar(id)
  {
     if(confirm("¿Esta seguro que desea restaurar el Ente Receptor seleccionado?"))
    {
      document.getElementById("cam_idinstrumento").value=id;
      document.getElementById("cam_operacion").value='restaurar_responsablereceptor';
      document.form_responsablereceptor.submit();
    }
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
    <h3>Responsable Receptor</h3>
    <div class="alert alert-info">
        <ul>
            En este módulo podrá registrar, consultar, editar, desactivar y activar el Responsable Receptor que utilizará el sistema.
        </ul>
    </div>
    <form action="../controlador/control_responsablereceptor.php" method="POST" name="form_responsablereceptor">
        <input type="hidden" value="eliminar_responsablereceptor" name="operacion" id="cam_operacion"/>
        <input type="hidden"  name="idinstrumento" id="cam_idinstrumento"/>        
        <input type="hidden"  name="idpersonal" id="cam_idpersonal"/>
        <?php
        if($registrar)
        {
            echo '<a id="btn_registrar" class="btn btn-success" href="?vista=persona/registrar_responsablereceptor"><i class="icon-plus icon-white"></i> Registrar</a>';
        }
        ?>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Cédula</th><th>Nombre Y Apellido</th><th>Ente Receptor</th><th>Telefono del Ente</th><th>Estatus</th><?php if($consultar || $eliminar)
                        { echo '<th>Acción</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/update2016/clase_responsablereceptor.php');
                    $lobjPersonal=new clsResponsablereceptor;
                    $laPersonales=$lobjPersonal->consultar_responsablereceptor_bitacora();
                    for($i=0;$i<count($laPersonales);$i++)
                    {
                        if($laPersonales[$i][6])
                        {
                            $laPersonales[$i][6]='Activo';
                        }
                        elseif(!$laPersonales[$i][6]) 
                        {
                            $laPersonales[$i][6]='Inactivo';
                        }

                        echo '<tr>';
                        echo '<td>'.$laPersonales[$i][2].'</td>';
                        echo '<td>'.$laPersonales[$i][4].' '.$laPersonales[$i][5].'</td>';
                        echo '<td>'.$laPersonales[$i][7].'</td>';
                        echo '<td>'.$laPersonales[$i][8].'</td>';
                        echo '<td>'.$laPersonales[$i][6].'</td>';
                        if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar && $laPersonales[$i][6]=='Activo')
                            {
                                echo '<a class="btn btn-info" href="#" title="Consultar" onclick="buscar('.$laPersonales[$i][0].')"><i class="icon-search icon-white"></i></a> ';
                            }
                            if($eliminar)
                            {
                                if($laPersonales[$i][6]=='Activo')
                                {
                                    echo '<a class="btn btn-danger" href="#" title="Desactivar" data-toggle="modal" data-target="#myModal" onclick="eliminar('.$laPersonales[$i][0].')" ><i class="icon-remove icon-white"></i></a> ';
                                }
                                elseif ($laPersonales[$i][6]=='Inactivo') 
                                {
                                    echo '<a class="btn btn-warning" title="Restaurar" href="#" onclick="restaurar('.$laPersonales[$i][0].')" ><i class="icon-refresh icon-white"></i></a>';
                                }
                            }
                            echo "</td>";
                        }

                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Desactivar Responsable Receptor</h4>
              </div>
              <div class="modal-body">
                   <div class="row">
                        <div class="col-lg-3 span3">
                            <label>Razón <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Razón por la cual desea desactivar a esta persona."><i class="fa fa-question" ></i></span></label>
                            <input type="text" class="span3"  name="razondesactiva" id="cam_razondesactiva" value=""/>
                        </div>
                   </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="descativar()">Desactivar</button>
              </div>
            </div>
          </div>
      </div>
    </form>

</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      })
</script>