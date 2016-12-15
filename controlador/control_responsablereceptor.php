<?php
	session_start();
	require_once('../clases/Update2016/clase_responsablereceptor.php');
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$loObjetoPrincipal=new clsResponsablereceptor;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$loObjetoPrincipal->set_responsablereceptor($_POST['idinstrumento']);
	$loObjetoPrincipal->set_Nacionalidad($_POST['txtNacionalidadper']);
	$loObjetoPrincipal->set_Cedula($_POST['txtCedula']);
	$loObjetoPrincipal->set_EnteExterno($_POST['txtEnteExterno']);
	$loObjetoPrincipal->set_NombreFull($_POST['txtNombrefull']);
	$loObjetoPrincipal->set_ApellidoFull($_POST['txtApellidofull']);


	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'verificar':
			if($loObjetoPrincipal->consultar_persona())
			{
				echo '1';
			}
				
		break;
		case 'registrar_responsablereceptor':
			$hecho=$loObjetoPrincipal->registrar_responsablereceptor();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tresponsablereceptor','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
			header('location: ../vista/intranet.php?vista=persona/responsablereceptor');
		break;
		case 'editar_responsablereceptor':
			$hecho=$loObjetoPrincipal->editar_responsablereceptor();
			if($hecho)
			{
				$_SESSION['msj']='Se ha modificado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se realizarón cambios';
			}
			header('location: ../vista/intranet.php?vista=persona/responsablereceptor');
		break;
		case 'eliminar_responsablereceptor':
			$hecho=$loObjetoPrincipal->eliminar_responsablereceptor();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar',$_POST['razondesactiva'],'estatusasi','tinstrumento','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha eliminado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=persona/responsablereceptor');
		break;
		case 'restaurar_responsablereceptor':
			$hecho=$loObjetoPrincipal->restaurar_responsablereceptor();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','No sé utiliza','estatusasi','tinstrumento','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha restaurado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se pudo restaurar';
			}
			header('location: ../vista/intranet.php?vista=persona/responsablereceptor');
		break;
		
		default:
			header('location: ../vista/intranet.php?vista=persona/responsablereceptor');
		break;
	}

?>