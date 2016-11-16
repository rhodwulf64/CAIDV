<?php
session_start();
require('../clases/clase_acceso.php');
require_once('../libreria/utilidades.php');
$lobjAcceso= new clsAcceso;
$lobjUtil=new clsUtil;


$lcReal_ip=$lobjUtil->get_real_ip();
$lobjAcceso->set_Ip($lcReal_ip);
$lobjAcceso->set_IdAcceso($_SESSION['idacceso']);
$lobjAcceso->set_Usuario($_SESSION['usuario']);
$llHecho=$lobjAcceso->registrar_salida();

if($llHecho)
{
	session_destroy();//Desctruye los datos de la sessión que guardamos cuando ENTRÓ en el sistema.
	session_start();//Se crea una session solo para que pueda ser guardado el mensaje de despedida.
	$_SESSION['msj']='Hasta pronto! Su sesión ha sido cerrada.';//Se guarda un mensaje, que posterior mente será borrado.
	header('location: ../index.php');//Y se redirecciona al archivo index.php
}
else //Si no entro por ningun botón o hubo un error entonces lo va a sacar.
{
	$_SESSION['msj']='Disculpe ha habido un error al cerrar la sesión.';//Se guarda un mensaje, que posterior mente será borrado.
	header('location: ../vista/intranet.php');//Y se redirecciona al archivo intranet.php
}

?>
