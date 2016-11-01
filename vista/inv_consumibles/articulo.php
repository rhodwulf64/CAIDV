<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
         
        $laServicios=$lobjRol->consultar_servicios_menu($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='archivo/consultar_articulo')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='archivo/registrar_articulo')
            {
                $registrar=true;
            }
            if($laServicios[$j][2]=='archivo/eliminar_articulo')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=archivo/consultar_articulo&id="+id;
 }
  function eliminar(id)
  {
     swal({   title: "Desactivar insumo",   
    text: "¿Está seguro que desea desactivar el insumo seleccionado?",   
    type: "warning",   showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "¡Si, estoy seguro!",   
    cancelButtonText: "Cancelar",
    closeOnConfirm: false }, 
    function(){
      document.getElementById("cam_idarticulo").value=id;
      document.form_articulo.submit();
   });
  }
    function restaurar(id)
  {
    swal({   title: "Restaurar insumo",   
    text: "¿Está seguro que desea restaurar el insumo seleccionado?",   
    type: "warning",   showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    cancelButtonText: "Cancelar",
    confirmButtonText: "¡Si, estoy seguro!",   
    closeOnConfirm: false }, 
    function(){
      document.getElementById("cam_idarticulo").value=id;
      document.getElementById("cam_operacion").value='restaurar_articulo';
      document.form_articulo.submit();
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
    <h3>Catálogo de Bienes Consumibles</h3>
   <div class="alert alert-info">
        <ul>
            En éste módulo podrá registrar, consultar, editar, desactivar y activar los Bienes Consumibles.
        </ul>
    </div>
    <form action="../controlador/control_articulo.php" method="POST" name="form_articulo">
        <input type="hidden" value="eliminar_articulo" name="operacion" id="cam_operacion"/>
        <input type="hidden"  name="idarticulo" id="cam_idarticulo"/>
        <?php
        if($registrar)
        {
            echo '<a id="btn_registrar" class="btn btn-success" href="?vista=archivo/registrar_articulo"><i class="icon-plus icon-white"></i> Registrar Nuevo Bien Consumible</a>';
        }
        ?>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                
               <th>N°</th><th>Descripción</th><th>Unidad de medida</th><th>Presentación</th><th>Categoría</th><th>Existencia</th><th>Estado</th>

                <?php if($consultar || $eliminar)
                        { echo '<th>Acción</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_articulo.php');
                    $lobjarticulo=new clsarticulo;
                    $laarticulos=$lobjarticulo->consultar_articulos_inactivos();
                    $anda=0;
                    for($i=0;$i<count($laarticulos);$i++)
                    {
                        $anda++;
                        $dependencia=false;
                        $lobjarticulo->set_articulo($laarticulos[$i][0]);
                        $dependencia=$lobjarticulo->consultar_dependencia();
                        if($laarticulos[$i][6])
                        {
                            $laarticulos[$i][6]='Activo';
                        }
                        elseif(!$laarticulos[$i][6]) 
                        {
                            $laarticulos[$i][6]='Inactivo';
                        }

                        echo '<tr>';
                        echo '<td>'.$anda.'</td>';
                        echo '<td>'.$laarticulos[$i][1].'</td>';
                        echo '<td>'.$laarticulos[$i][2].'</td>';
                        echo '<td>'.$laarticulos[$i][3].'</td>';
                        echo '<td>'.$laarticulos[$i][4].'</td>';
                        echo '<td>'.$laarticulos[$i][5].'</td>';
                        echo '<td>'.$laarticulos[$i][6].'</td>';
                   
                            if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar && $laarticulos[$i][6]=='Activo')
                            {
                                echo '<a class="btn btn-info" href="#" title="Modificar" onclick="buscar('.$laarticulos[$i][0].')"><i class="icon-search icon-white"></i></a> ';
                            }
                            if($eliminar && $dependencia==false)
                            {
                                if($laarticulos[$i][6]=='Activo')
                                {
                                    echo '<a class="btn btn-danger" href="#" title="Desactivar" onclick="eliminar('.$laarticulos[$i][0].')" ><i class="icon-remove icon-white"></i></a> ';
                                    
                                }
                                elseif ($laarticulos[$i][6]=='Inactivo') 
                                {
                                    echo '<a class="btn btn-warning" title="Restaurar" href="#" onclick="restaurar('.$laarticulos[$i][0].')" ><i class="icon-refresh icon-white"></i></a>';
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