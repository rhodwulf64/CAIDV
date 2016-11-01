<?php
    session_start();
    include('../clases/clase_articulo.php');
    $lobjarticulo = NEW clsarticulo();
    $id=(isset($_GET['id']))?$_GET['id']:"";
    $fila=(isset($_GET['f']))?$_GET['f']:"";
     $msj=(isset($_SESSION['msj']))?$_SESSION['msj']:"";
    $lobjarticulo->set_articulo($id);
    $Datos_articulo = $lobjarticulo->consultar_articulos();
    $OnKey='';
    if($Datos_articulo)
    {
        $operacion='editar_articulo';
        $titulo   ='Consultar articulo';
        $OnKey='readOnly';
    }
    else
    {
        $operacion='registrar_articulo';
        $titulo   ='Registrar articulo';
    }

?>
<html lang="es" class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="SHORT ICON" href="../media/img/ico.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../bootstrap/css/main.css">
        <link rel="stylesheet" href="../media/css/style.css">
        <link href="../libreria/css/datatable/jquery-ui-1.8.4.custom.css" rel="stylesheet" type="text/css" />
        <link href="../libreria/css/formularios.css" rel="stylesheet" type="text/css" />
        <link href="../libreria/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
        <script src="../bootstrap/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../bootstrap/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="../bootstrap/js/vendor/bootstrap.min.js"></script>
        <script src="../libreria/datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../bootstrap/js/plugins.js"></script>
        <script src="../bootstrap/js/main.js"></script>

        <script type="text/javascript" language="javascript" src="../libreria/js/datatable/jquery.dataTables.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
                    <div class="container">        
                        <header class="navbar navbar-fixed-top" style="
                margin: 0 auto;position:absolute">
                            <div id="row"  style="height:115px">
                                <img style="width:100%; height:50px" src="../media/images/cintillo.jpg">
                            </div>
                            <div class="navbar-inner">
                                <div class="container">
                                   

                                </div>
                            </div>
                        </header>

                        <section class="container-fluid">
                            
                            <script>
                             function buscar(id)
                             {
                                window.location.href="?vista=persona/registrar_articulo&id="+id;
                             }
                              function eliminar(id)
                              {
                                 if(confirm("¿Está seguro que desea eliminar el articulo seleccionado?"))
                                {
                                  document.getElementById("cam_cod_tarticulo").value=id;
                                  document.form_articulo.submit();
                                }
                              }
                            </script>
                            <script type="text/javascript" charset="utf-8">
                                $(document).ready(function() {
                                    oTable = $('#filtro').dataTable({
                                        "bJQueryUI": true,
                                        "sPaginationType": "full_numbers",
                                        "iDisplayLength": 10                    
                                    });
                                } );
                            </script>  
                            <div class="span12" style="margin: 150px auto 0 auto;display:block;">
                            <div style="float: left" class="col-lg-8 span8 pull-left">
                                <h3>Listado de articulos</h3>
                                <form action="../controlador/control_articulo.php" method="POST" name="form_articulo">
                                    <input type="hidden" value="eliminar_articulo" name="operacion" />
                                    <input type="hidden"  name="cod_tarticulo" id="cam_cod_tarticulo"/>
                                    <a class="btn btn-danger" onclick="window.close();"  name="btn_regresar" id="btn_registrar" ><i class="icon-remove icon-white"></i> Cerrar Ventana</a>

                                    <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
                                        <thead>
                                            <th>Descripción</th><th>Presentación</th><th>Unidad de medida</th><th>Grupo</th><th>Acción</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                                require_once('../clases/clase_articulo.php');
                                                $lobjarticulo=new clsarticulo;
                                                $laarticuloes=$lobjarticulo->consultar_articulos();
                                                for($i=0;$i<count($laarticuloes);$i++)
                                                {
                                                    echo '<tr>';
                                                    echo '<td>'.$laarticuloes[$i][1].'</td>';
                                                    echo '<td>'.$laarticuloes[$i][3].'</td>';
                                                    echo '<td>'.$laarticuloes[$i][2].'</td>';
                                                    echo '<td>'.$laarticuloes[$i][4].'</td>';
                                                    echo '<td><a class="btn btn-info" onclick="';
                                                    echo "traer('".$laarticuloes[$i][0]."','".$laarticuloes[$i][5]."','".$laarticuloes[$i][4]."','".$laarticuloes[$i][1]."','".$fila."')";
                                                    echo '"><i class="icon-arrow-left icon-white"></i></a></td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                            </tbody>
                                    </table>
                                </form>
                                
                            </div>
                            </div>

         

        </section> <!-- /container -->

    </div> 
    </body>
</html>
<script type="text/javascript">
    $('#dp3').datepicker();            
    function traer(id,cedula,nombre,apellido,fila)
    {   
        cam_cod_tarticulo=opener.document.getElementById("cam_cod_tarticulo"+fila);
        cam_cod_tarticulo.value=id;
        cam_rifarticulo=opener.document.getElementById("cam_rifarticulo"+fila);
        cam_rifarticulo.value=cedula+" "+nombre;
        cam_nombrearticulo=opener.document.getElementById("cam_nombrearticulo"+fila);
        cam_nombrearticulo.value=apellido;
        window.close();
    }
</script>