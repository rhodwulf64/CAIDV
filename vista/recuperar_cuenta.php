<?php
if($_POST)
{
	include('../clases/clase_pregunta.php');
	$lobjPregunta = new clsPregunta();
	$lsOperacion=addslashes($_POST['operacion']);

	$lsCuenta=addslashes($_POST['cuenta']);
	if($lsOperacion=='recuperar_cuenta')
	{
		$lsCorreo=addslashes($_POST['correo']);
		$lobjPregunta->set_Correo($lsCorreo);
		$Pregunta = $lobjPregunta->consultar_pregunta_correo();
		if(!$Pregunta[0]['idpregunta'])
		{
			$msj='Correo invalido, intente nuevamente';
			$form1=true;
			$form2=false;
			$form3=false;
		}
		else
		{
			$msj='Responda la siguiente pregunta.';
			$form1=false;
			$form2=true;
			$form3=false;
		}
	}
	else if($lsOperacion=='ingrese_pregunta')
	{
		$lobjPregunta->set_IDTUsuario($lsCuenta);
		$lsNombreFull=addslashes($_POST["nombreFull"]);
		$preguntas= $_POST['pregunta'];
		$respuestas= $_POST['respuesta'];
		for($i=0;$i<count($preguntas);$i++)
		{
			$pregunta=$preguntas[$i];
			$respuesta=$respuestas[$i];
			$lobjPregunta->set_IdPregunta($pregunta);
			$lobjPregunta->set_Respuesta($respuesta);
			$llHecho = $lobjPregunta->validar();
			if(!$llHecho)
				break;
		}
		$Pregunta = $lobjPregunta->consultar_pregunta_rand();
		if(!$llHecho)
		{
			$msj='Respuesta incorrecta, intente nuevamente';
			$form1=false;
			$form2=true;
			$form3=false;
		}
		else
		{
			//$msj='Responda la siguiente pregunta.';
			$form1=false;
			$form2=false;
			$form3=true;
		}
	}
	else if($lsOperacion=='ingrese_clave')
	{
		$lsClave=addslashes($_POST['clave']);
		$lsRecuperador=addslashes($_POST['recuperador']);
		$lobjPregunta->set_IDTUsuario($lsCuenta);
		$llHecho = $lobjPregunta->cambio_clave($lsClave,$lsRecuperador);

		if($llHecho)
		{
			$msj='Su clave ha sido modificada exitosamente.';
			$form1=true;
			$form2=false;
			$form3=false;
		}
		else
		{
			$msj='La clave ingresada ya ha sido utilizada anteriormente, inténtelo de nuevo.';
			$form1=true;
			$form2=false;
			$form3=false;
		}
	}


}
else
{
	$form1=true;
	$form2=false;
	$form3=false;
}

?>
<html lang="es" class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="SHORT ICON" href="../media/img/ico.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CAIDV | Intranet</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../bootstrap/css/main.css">
        <link rel="stylesheet" href="../media/css/style.css">
				<link rel="stylesheet" type="text/css" href="../libreria/sweetalert-master/dist/sweetalert.css">
				<script src="../libreria/sweetalert-master/dist/sweetalert.min.js"></script>
        <link href="../libreria/css/datatable/jquery-ui-1.8.4.custom.css" rel="stylesheet" type="text/css" />
        <link href="../libreria/css/formularios.css" rel="stylesheet" type="text/css" />
        <link href="../libreria/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
        <script src="../bootstrap/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
				<script type="text/javascript" src="../libreria/validacion/js/lemez_validacion1.1.js"></script>
        <script>window.jQuery || document.write('<script src="../bootstrap/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="../bootstrap/js/vendor/bootstrap.min.js"></script>
        <script src="../libreria/datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../bootstrap/js/plugins.js"></script>
        <script src="../bootstrap/js/main.js"></script>
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
                                <img style="width:100%; height:50px" src="../media/images/cintillo-caidv.jpg">
                                <a href="../vista/intranet.php"><img width="250" height="65" src="../media/images/CAIDV.png"></a>
                            </div>
                            <div class="navbar-inner">
                                <div class="container">


                                </div>
                            </div>
                        </header>

        <section class="container-fluid" <?php if($msj=='')?>>

         <div class="span12" style="margin: 150px auto;display:block;">
            <div class="span8" style="margin-left:0;">
		        <div style="float: left" class="col-lg-8 span8 pull-left">
		            <h3>Recuperar cuenta</h3>
								<?php if($form1){?>
		            <form class="formulario" action="recuperar_cuenta.php" method="POST" name="form_recupera">
		                <input type="hidden" value="recuperar_cuenta" name="operacion" />
		                <div class="row-fluid">
		                    <div class="col-lg-1 span6">
		                        <label>Correo electronico </label>
		                        <input type="email" class="span6"  name="correo" id="cam_correo"  value="" required/>
		                        <div class="alert alert-error <?php if($msj) print('show'); else print('hide'); ?>"><span><?php print($msj);?></span></div>
		                    </div>
		                </div>
		                <div class="botonera">
		                    <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Aceptar">
		                    <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Cerrar Ventana" onclick="window.close();">
		                </div>
		            </form>
								<?php } if($form2){ ?>
		            <form class="formulario" action="recuperar_cuenta.php" method="POST" name="form_recupera">
		                <input type="hidden" value="ingrese_pregunta" name="operacion" />
		                <input type="hidden" value="<?php print($Pregunta[0]['tusuario_idusuario']);?>" name="cuenta" />
		                <input type="hidden" value="<?php print($Pregunta[0]['nombreFull']);?>" name="nombreFull" />
		                <?php for($i=0;$i<count($Pregunta);$i++)
		                {
		                ?>
		                <div class="row-fluid">
		                    <div class="col-lg-6 span6">
		                    	<div class="alert"><span><?php print($msj);?></span></div>
		                        <label><b><?php print($Pregunta[$i]['pregunta'])?></b></label>
		                        <input type="text" class="span6"  name="respuesta[]" id="cam_respuesta"  value="" required/>
		                		<input type="hidden" value="<?php print($Pregunta[$i]['idpregunta']);?>" name="pregunta[]" />
		                    </div>
		                </div>
		                <?php
		                }
		                ?>
		                <div class="botonera">
		                    <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Aceptar">
		                    <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Cerrar Ventana" onclick="window.close();">
		                </div>
		            </form>
								<?php } if($form3){ ?>
		            <form class="formulario" action="recuperar_cuenta.php" method="POST" name="form_recupera">
		                <input type="hidden" value="ingrese_clave" name="operacion" />
		                <input type="hidden" value="<?php print($lsCuenta);?>" name="cuenta" />
		                <input type="hidden" value="<?php print($lsNombreFull);?>" name="nombreFull" />
										<input type="hidden" value="<?php print($Pregunta[0]['Recuperador']);?>" name="recuperador" />
		                <div class="row-fluid">
		                    <div class="col-lg-1 span6">
		                        <h4>Estás a sólo un paso</h4>
		                        <label><b>Cuenta Seleccionada:</b><br><?php print($lsNombreFull);?></label><br>
		                        <input type="password" class="span6"  name="clave" id="cam_clave"  value="" required placeholder="Ingrese su nueva clave"/>
		                        <input type="password" class="span6"  name="clave2" id="cam_clave2"  value="" required placeholder="Repita la clave"/>
		                    </div>
		                </div>
		                <div class="botonera">
		                    <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Aceptar" onclick="return enviar();">
		                    <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Cerrar Ventana" onclick="window.close();">
		                </div>
		            </form>
								<?php }?>

		        </div>
            </div>
        </div>


            <footer style="text-align:center;" class="col-lg-12 span12 pull-left" >
                <p >&copy; Todos los derechos reservados CAIDV <?php echo date('Y');?></p>
            </footer>

        </section> <!-- /container -->

    </div>
    </body>
</html>
<script type="text/javascript">
    $('#dp3').datepicker();

</script>

<?php if($form3){ ?>
	<script type="text/javascript">
	$(function(){
		$("#cam_clave").lemez_aceptar("contraseña");
		$("#cam_clave2").lemez_aceptar("contraseña");
	});
	function enviar()
	{
		var clave = document.getElementById('cam_clave').value;
		var clave2 = document.getElementById('cam_clave2').value;

		if(clave!=clave2)
		{
				Notifica_Error('Las claves ingresadas no coinciden');
				return false;
		}
		else
		{
				return true;
		}
	}

	</script>
<?php }?>
