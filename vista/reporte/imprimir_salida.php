
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
    <h3>Asignación de Consumibles</h3>
   <div class="alert alert-info">
        <ul>
            En éste módulo podrá imprimir las Solicitudes finalizadas en el sistema.
        </ul>
    </div>
    <form  name="form_salida">
        <input type="hidden"  name="idsalida" id="cam_idsalida"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                
            <th>N° de Solicitud</th><th>Fecha</th><th>Estatus</th><th>Acción</th>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_salida.php');
                    $lobjsalida=new clssalida;
                    $lasalidas=$lobjsalida->consultar_salida_listo();
                    for($i=0;$i<count($lasalidas);$i++)
                    {
                        $lobjsalida->set_Idsalida($lasalidas[$i][0]);            
                        echo '<tr>';
                        echo '<td>'.$lasalidas[$i][0].'</td>';
                        echo '<td>'.$lasalidas[$i][2].'</td>';
                        echo '<td>'.'Finalizada'.'</td>';
                        echo '<td><a class="btn btn-success" href="../reporte/imprimir_salida.php?id='.$lasalidas[$i][0].'" target="_blank"><i class="fa fa-file-text"></i></a></td>';                       
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
    </form>
</div>