<?php
	session_start();
	require_once("../clases/clase_parroquia.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjparroquia=new clsparroquia;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$lobjparroquia->set_parroquia($_POST['idparroquia']);
	$lobjparroquia->set_Descripcion($_POST['descripcionpar']);
	$lobjparroquia->set_Estatus($_POST['estatuspar']);
	$lobjparroquia->set_Municipio($_POST['tmunicipio_municipio']);

	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'verificar':
			if($lobjparroquia->verificar())
			{
				echo '1';
			}
				
		break;
		case 'registrar_parroquia':
			$hecho=$lobjparroquia->registrar_parroquia();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tparroquia','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
			header('location: ../vista/intranet.php?vista=archivo/parroquia');
		break;
		case 'editar_parroquia':
			$lobjparroquia->set_parroquia($_POST['idparroquia']);
			$laparroquiaAnterior=$lobjparroquia->consultar_parroquia_bitacora();

			$laValorNuevo=$laValorAnterior=$laCampo=array();

			$hecho=$lobjparroquia->editar_parroquia();
			if($hecho)
			{
				$cont=0;
				foreach ($laparroquiaAnterior as $key2 => $value2) 
				{
					$value = $_POST[$key2];
					if($value)
					{
						if($value!=$value2)
						{
							$laValorNuevo[] = $value;
							$laValorAnterior[] = $value2;
							$laCampo[] 		= $key2;
							$cont++;
						}
					}
				}

				for($i=0;$i<$cont;$i++)
				{
					$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Modificar','Error en los datos',$laCampo[$i],'tparroquia',$laValorAnterior[$i],$laValorNuevo[$i],$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
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
			header('location: ../vista/intranet.php?vista=archivo/parroquia');
		break;
		case 'eliminar_parroquia':
			$hecho=$lobjparroquia->eliminar_parroquia();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar','No se utiliza','estatuspar','tparroquia','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=archivo/parroquia');
		break;
		case 'restaurar_parroquia':
			$hecho=$lobjparroquia->restaurar_parroquia();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','No se utiliza','estatuspar','tparroquia','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha restaurado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se pudo restaurar la parroquia';
			}

			header('location: ../vista/intranet.php?vista=archivo/parroquia');
		break;
	}

?>