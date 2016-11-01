<?php
	session_start();
	require_once("../clases/clase_departamento.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjdepartamento=new clsdepartamento;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$lobjdepartamento->set_departamento($_POST['cod_tdepartamento']);
	$lobjdepartamento->set_Nombre_dep($_POST['Nombre_depdepartamento']);
	$lobjdepartamento->set_cedula($_POST['cedula']);
	$operacion=$_POST['operacion'];
	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');


	switch ($operacion) 
	{
		case 'registrar_departamento':
			$hecho=$lobjdepartamento->registrar_departamento();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tdepartamento','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
			header('location: ../vista/intranet.php?vista=archivo/departamento');
		break;
		case 'editar_departamento':
			$laValorNuevo=$laValorAnterior=$laCampo=array();

			$lobjdepartamento->set_departamento($_POST['cod_tdepartamento']);
			$ladepartamentoAnterior=$lobjdepartamento->consultar_departamento();

			$hecho=$lobjdepartamento->editar_departamento();
			if($hecho)
			{
				$cont=0;
				if($_POST['Nombre_depdepartamento']!=$ladepartamentoAnterior[1])
				{
					$laValorNuevo[]=$_POST['Nombre_depdepartamento'];
					$laValorAnterior[]=$ladepartamentoAnterior[1];
					$laCampo[]='Nombre_depdepartamento';
					$cont++;
				}

				for($i=0;$i<$cont;$i++)
				{
					$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Modificar','Error en los datos',$laCampo[$i],'tdepartamento',$laValorAnterior[$i],$laValorNuevo[$i],$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
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
			header('location: ../vista/intranet.php?vista=archivo/departamento');
		break;
		case 'eliminar_departamento':
			$hecho=$lobjdepartamento->eliminar_departamento();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar','No se utiliza','estatus','tdepartamento','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=archivo/departamento');
		break;
		case 'restaurar_departamento':
			$hecho=$lobjdepartamento->restaurar_departamento();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','No se utiliza','estatus','tdepartamento','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha restaurado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se pudo restaurar el departamento';
			}

			header('location: ../vista/intranet.php?vista=archivo/departamento');
		break;
		default:
			header('location: ../vista/intranet.php');
		break;
	}

?>