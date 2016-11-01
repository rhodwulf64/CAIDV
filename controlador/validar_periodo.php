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
	
	$lobjperiodo->set_Estadolap($_POST['estadolap']);
	$lobjperiodo->set_Estatuslap($_POST['estatuslap']);

	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];

	if($_GET)
	{
		$lobjperiodo->set_Fechainicio($_GET['fechainilap']);
		$lobjperiodo->set_Fechafin($_GET['fechafinlap']);
		$lobjperiodo->set_Nombrelap($_GET['nombrelap']);
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
			if(($_GET['fechainilap']=='') OR ($_GET['fechafinlap']==''))
			{
				print('');
			}
			else if(validar_dias() <= 0)
			{	
				print('Debe ingresar un rango de fecha diferente, este no es un rango de fechas valido.');
			}
			else if($hecho)
			{
				$fecha = $lobjperiodo->consultar_ultima_fecha();
				print('Debe ingresar un rango de fecha diferente, existe un periodo creado entre ese rango de fechas. Fecha de cierre del ultimo periodo: <a href="#">'.$fecha.'</a>');
			}
			else if($_GET['nombrelap'])
			{
				$hecho = $lobjperiodo->consultar_periodos_nombre();
				if($hecho)
				{
					print('Debe ingresar un nombre del periodo diferente, existe un periodo creado con ese nombre.');
				}
				else
				{
					print('');
				}
			}
			else
			{
				print('');
			}

		break;
		case 'editar_periodo':
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
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
		break;
		default:
		break;
	}

function validar_dias()
{
	$FechaCul=$_GET['fechafinlap'];
	$FechaActual= $_GET['fechainilap'];
	
	$FechaActual = str_replace("-","",$FechaActual);
	$FechaActual = str_replace("/","",$FechaActual);
	$FechaCul = str_replace("-","",$FechaCul);
	$FechaCul = str_replace("/","",$FechaCul);

	ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $FechaActual, $FechaActual);
	ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $FechaCul, $FechaCul);

	$date1 = mktime(0,0,0,$FechaActual[2], $FechaActual[1], $FechaActual[3]);
	$date2 = mktime(0,0,0,$FechaCul[2], $FechaCul[1], $FechaCul[3]);
	
	$lcResult=round(($date2 - $date1) / (60 * 60 * 24));


	return $lcResult;
}
?>