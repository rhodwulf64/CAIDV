<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        oTable = $('#filtro').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayLength": 10               
        });
    } );
</script> 
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Hoja de vida del Bien Nacional</h3>
        <table class="table table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>CÓDIGO BN</th><th>CÓDIGO INST.</th><th>SERIAL</th><th>TIPO DE BIEN</th><th>MARCA</th><th>MÓDELO</th><th>DESCRIPCIÓN</th><th>Estado Actual</th><th>FECHA DE RECEPCIÓN</th><th>ACCIÓN</th>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/update2016/clase_reportesbienes.php');
                    $lobjParticipante=new clsReportesBienes;
                    $laParticipantes=$lobjParticipante->listarBienesNacionalesDataTable();
                    for($i=0;$i<count($laParticipantes);$i++)
                    {
                        echo '<tr class="'.$laParticipantes[$i][19].'">';
                        echo '<td>'.$laParticipantes[$i][1].'</td>';
                        echo '<td>'.$laParticipantes[$i][0].'</td>';
                        echo '<td>'.$laParticipantes[$i][4].'</td>';
                        echo '<td>'.$laParticipantes[$i][17].' '.$laParticipantes[$i][18].'</td>';
                        echo '<td>'.$laParticipantes[$i][15].'</td>';
                        echo '<td>'.$laParticipantes[$i][16].'</td>';
                        echo '<td>'.$laParticipantes[$i][7].'</td>';
                        echo '<td>'.$laParticipantes[$i][14].'</td>';
                        echo '<td>'.$laParticipantes[$i][10].'</td>';
                        echo '<td><a class="btn btn-success" href="../reporte/hojadevidabienes.php?objektBN='.$laParticipantes[$i][0].'" target="_blank"><i class="fa fa-file-text"></i></a></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
        <br>
    <br>
</div>