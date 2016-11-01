
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
    <h3>Reporte Solicitud de Consumibles</h3>
   <div class="alert alert-info">
        <ul>
            En éste módulo podrá imprimir las Solicitudes finalizadas en el sistema.
        </ul>
    </div>
    <form  name="form_requisicion">
        <input type="hidden"  name="idrequisicion" id="cam_idrequisicion"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                
            <th>N° de Solicitud</th><th>Fecha</th><th>Estatus</th><th>Acción</th>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_requisicion.php');
                    $lobjrequisicion=new clsrequisicion;
                    $larequisicions=$lobjrequisicion->consultar_requisicion_pendiente();
                    for($i=0;$i<count($larequisicions);$i++)
                    {
                        $lobjrequisicion->set_Idrequisicion($larequisicions[$i][0]);            
                        echo '<tr>';
                        echo '<td>'.$larequisicions[$i][0].'</td>';
                        echo '<td>'.$larequisicions[$i][2].'</td>';
                        echo '<td>'.'Pendiente'.'</td>';
                        echo '<td><a class="btn btn-success" href="../reporte/imprimir_solicitud.php?id='.$larequisicions[$i][0].'" target="_blank"><i class="fa fa-file-text"></i></a></td>';                       
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
    </form>
</div>