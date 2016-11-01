<?php
	session_start();
	require_once("../clases/clase_presentacion.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjpresentacion=new clspresentacion;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$lobjpresentacion->set_presentacion($_POST['idpresentacion']);
	$lobjpresentacion->set_Nombre($_POST['nombrepresentacion']);
	$operacion=$_POST['operacion'];
	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');


	switch ($operacion) 
	{
		case 'registrar_presentacion':
			$hecho=$lobjpresentacion->registrar_presentacion();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tpresentacion','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
			header('location: ../vista/intranet.php?vista=archivo/presentacion');
		break;
		case 'editar_presentacion':
			$laValorNuevo=$laValorAnterior=$laCampo=array();

			$lobjpresentacion->set_presentacion($_POST['idpresentacion']);
			$lapresentacionAnterior=$lobjpresentacion->consultar_presentacion();

			$hecho=$lobjpresentacion->editar_presentacion();
			if($hecho)
			{
				$cont=0;
				if($_POST['nombrepresentacion']!=$lapresentacionAnterior[1])
				{
					$laValorNuevo[]=$_POST['nombrepresentacion'];
					$laValorAnterior[]=$lapresentacionAnterior[1];
					$laCampo[]='nombrepresentacion';
					$cont++;
				}

				for($i=0;$i<$cont;$i++)
				{
					$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Modificar','Error en los datos',$laCampo[$i],'tpresentacion',$laValorAnterior[$i],$laValorNuevo[$i],$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
	   				$lnHecho=$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
   					if($lnHecho)
					{
						$_SESSION['msj']='Se ha modificado exitosamente';
					}
   				}
			}
			else
			{	
				$_SESSION['msj']='No se realizaron cambios';
			}
			header('location: ../vista/intranet.php?vista=archivo/presentacion');
		break;
		case 'eliminar_presentacion':
			$hecho=$lobjpresentacion->eliminar_presentacion();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar','No se utiliza','estatus','tpresentacion','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=archivo/presentacion');
		break;
		case 'restaurar_presentacion':
			$hecho=$lobjpresentacion->restaurar_presentacion();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','No se utiliza','estatus','tpresentacion','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha restaurado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se pudo restaurar la presentación';
			}

			header('location: ../vista/intranet.php?vista=archivo/presentacion');
		break;
		default:
			header('location: ../vista/intranet.php');
		break;
	}

?>