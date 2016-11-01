<?php
	session_start();
	require_once("../clases/clase_periodo.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjperiodo=new clsperiodo;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$lobjperiodo->set_periodo($_POST['idperiodo']);
	$lobjperiodo->set_Nombrelap($_POST['nombrelap']);
	$lobjperiodo->set_Fechainicio($_POST['fechainilap']);
	$lobjperiodo->set_Fechafin($_POST['fechafinlap']);
	$lobjperiodo->set_Estadolap($_POST['estadolap']);
	$lobjperiodo->set_Estatuslap($_POST['estatuslap']);

	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];

	if($_GET)
	{
		$operacion=$_GET['operacion'];
	}

	switch ($operacion) 
	{
		case 'registrar_periodo':
			$hecho=$lobjperiodo->registrar_periodo();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tperiodo','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
		break;
		case 'verificar':
			$hecho=$lobjperiodo->consultar_rango();
			if($hecho)
			{
				print('Debe ingresar un rango de fecha distinto, ya existe un periodo dentro de ese rango de fecha');
			}
			else
			{	
				print('');
			}
		break;
		case 'editar_periodo':

			if($_POST['estadolap']=='Cerrado')
			{
				$lobjperiodo->cerrar_periodo();
			}
			$laperiodoAnterior=$lobjperiodo->consultar_periodo_bitacora();

			$laValorNuevo=$laValorAnterior=$laCampo=array();

			$hecho=$lobjperiodo->editar_periodo();
			if($hecho)
			{
				$cont=0;
				foreach ($laperiodoAnterior as $key2 => $value2) 
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
					$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Modificar','Error en los datos',$laCampo[$i],'tperiodo',$laValorAnterior[$i],$laValorNuevo[$i],$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
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
		break;
		case 'eliminar_periodo':
			$hecho=$lobjperiodo->eliminar_periodo();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar',$_POST['razondesactiva'],'estatuslap','tperiodo','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
		break;
		case 'restaurar_periodo':
			$hecho=$lobjperiodo->restaurar_periodo();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','No se utiliza','estatuslap','tperiodo','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha restaurado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se pudo restaurar el institucion';
			}

		break;
		default:
			header('location: ../vista/intranet.php?vista=curso/periodo');
		break;
	}

	header('location: ../vista/intranet.php?vista=curso/periodo');
?>