<?php
	session_start();
	require_once('../clases/Update2016/clase_marca.php');
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjInstrumento=new clsMarca;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$lobjInstrumento->set_Marca($_POST['idinstrumento']);
	$lobjInstrumento->set_Descripcion($_POST['txtDescripcion']);
	$lobjInstrumento->set_Rif($_POST['txtRif']);

	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_marca':
			$hecho=$lobjInstrumento->registrar_marca();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tinstrumento','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
			header('location: ../vista/intranet.php?vista=archivo/marca');
		break;
		case 'editar_marca':
			$hecho=$lobjInstrumento->editar_marca();
			if($hecho)
			{
				$_SESSION['msj']='Se ha modificado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se realizarón cambios';
			}
			header('location: ../vista/intranet.php?vista=archivo/marca');
		break;
		case 'eliminar_marca':
			$hecho=$lobjInstrumento->eliminar_marca();
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
			header('location: ../vista/intranet.php?vista=archivo/marca');
		break;
		case 'restaurar_marca':
			$hecho=$lobjInstrumento->restaurar_marca();
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
			header('location: ../vista/intranet.php?vista=archivo/marca');
		break;
		
		default:
			header('location: ../vista/intranet.php?vista=archivo/marca');
		break;
	}

?>