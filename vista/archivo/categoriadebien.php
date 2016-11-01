<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
         
        $laServicios=$lobjRol->consultar_servicios_menu($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='archivo/consultar_categoriadebien')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='archivo/registrar_categoriadebien')
            {
                $registrar=true;
            }
            if($laServicios[$j][2]=='archivo/eliminar_categoriadebien')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=archivo/registrar_categoriadebien&id="+id;
 }
    function eliminar(id)
  {
      document.getElementById("cam_idinstrumento").value=id;
  }


  function descativar()
  {
    if (document.getElementById("cam_razondesactiva").value!="")
    {
        if(confirm("¿Esta seguro que desea desactivar la categoría seleccionada?"))
        {
          document.form_config.submit();
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
     if(confirm("¿Esta seguro que desea restaurar la Categoría de Bien seleccionada?"))
    {
      document.getElementById("cam_idinstrumento").value=id;
      document.getElementById("cam_operacion").value='restaurar_categoriadebien';
      document.form_config.submit();
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
<div style="float: left" class="col-lg-10 span10 pull-left">
    <h3>Categoría de Bien</h3>
    <div class="alert alert-info">
        <ul>
            En este módulo podrá registrar, consultar, editar, desactivar y activar las distintas categorías de los diferentes Bienes.
        </ul>
    </div>
    <form action="../controlador/control_categoriadebien.php" method="POST" name="form_config">
        <input type="hidden" value="eliminar_categoriadebien" name="operacion" id="cam_operacion"/>
        <input type="hidden"  name="idinstrumento" id="cam_idinstrumento"/>        
        <?php
        if($registrar)
        {
            echo '<a id="btn_registrar" class="btn btn-success" href="?vista=archivo/registrar_categoriadebien"><i class="icon-plus icon-white"></i> Registrar Categoría de Bien</a>';
        }
        ?>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Código</th><th>Descripción</th><th>Estatus</th><?php if($consultar || $eliminar)
                        { echo '<th>Acción</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/Update2016/clase_categoriadebien.php');
                    $loCategoriadebien=new clsCategoriadebien;
                    $lsCategoriadebien=$loCategoriadebien->consultar_categoriadebien_bitacora();
                    for($i=0;$i<count($lsCategoriadebien);$i++)
                    {
                        $dependencia=false;
                        $loCategoriadebien->set_categoriadebien($lsCategoriadebien[$i][0]);
                        $dependencia=$loCategoriadebien->consultar_dependencia();
                        if($lsCategoriadebien[$i][3])
                        {
                            $lsCategoriadebien[$i][3]='Activo';
                        }
                        elseif(!$lsCategoriadebien[$i][3]) 
                        {
                            $lsCategoriadebien[$i][3]='Inactivo';
                        }
                        echo '<tr>';
                        echo '<td>'.$lsCategoriadebien[$i][0].'</td>';
                        echo '<td>'.$lsCategoriadebien[$i][1].'</td>';
                        echo '<td>'.$lsCategoriadebien[$i][3].'</td>';
                        if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar && $lsCategoriadebien[$i][3]=='Activo')
                            {
                                echo '<a class="btn btn-info" href="#" title="Consultar" onclick="buscar('.$lsCategoriadebien[$i][0].')"><i class="icon-search icon-white"></i></a> ';
                            }
                            if($eliminar)
                            {
                                if($lsCategoriadebien[$i][3]=='Activo')
                                {
                                    echo '<a class="btn btn-danger" href="#" title="Desactivar" data-toggle="modal" data-target="#myModal" onclick="eliminar('.$lsCategoriadebien[$i][0].')" ><i class="icon-remove icon-white"></i></a> ';
                                }
                                elseif ($lsCategoriadebien[$i][3]=='Inactivo') 
                                {
                                    echo '<a class="btn btn-warning" title="Restaurar" href="#" onclick="restaurar('.$lsCategoriadebien[$i][0].')" ><i class="icon-refresh icon-white"></i></a>';
                                }
                            }
                            echo "</td>";
                        }
                       
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
         <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Desactivar Categoría de Bien</h4>
              </div>
              <div class="modal-body">
                   <div class="row">
                        <div class="col-lg-3 span3">
                            <label>Razón <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Razón por la cual desea desactivar la asignatura."><i class="fa fa-question" ></i></span></label>
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