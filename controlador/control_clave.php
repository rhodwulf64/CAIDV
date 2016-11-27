<?php
	session_start();
	require_once("../clases/clase_pregunta.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjPregunta=new clsPregunta;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$IdPreguntas=$_POST['idpregunta'];
	$Preguntas=$_POST['pregunta'];
	$Respuestas=$_POST['respuesta'];
	$NroPreguntas=$_POST['nropreguntas'];
	$lobjPregunta->set_IDTUsuario($_SESSION["idTusuario"]);

	$lcReal_ip=$lobjUtil->get_real_ip();
  $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];
	$lsClaveActual=addslashes($_POST['clave_actual']);
	$lsClaveNueva=addslashes($_POST['clave_nueva']);
	switch ($operacion)
	{
		case 'cambiar_clave':
				$llHecho = $lobjPregunta->cambio_clave_interno($lsClaveActual,$lsClaveNueva);

				if($llHecho)
				{
					$_SESSION['msj']='Su clave ha sido modificada exitosamente.';
				}
				else
				{
					$_SESSION['msj']='La clave ingresada no coincide con su clave actual.';
					$_SESSION['msjModo']="E";
				}
			header('location: ../vista/intranet.php');

		break;
		default:
			header('location: ../vista/intranet.php');
		break;
	}

?>
