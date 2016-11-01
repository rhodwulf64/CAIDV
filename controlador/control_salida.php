<?php
	session_start();
	require_once("../clases/clase_salida.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjsalida=new clssalida;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;


	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];
	$lobjsalida->set_idsalida($_POST['idsalida']);
	$lobjsalida->set_cod_tdepartamento($_POST['cod_tdepartamento']);
	$lobjsalida->set_rifdepartamento($_POST['rifdepartamento0']);
	$lobjsalida->set_fecha($_POST['fecha']);
	$lobjsalida->set_fechaentrega($_POST['fechaentrega']);
	$lobjsalida->set_nombredepartamento($_POST['nombredepartamento0']);
	$lobjsalida->set_persona($_POST['cod_persona']);
	$lobjsalida->set_observacion($_POST['observacion']);
	$lobjsalida->set_responsable($_POST['cod_persona']);
	$lobjsalida->set_responsableDpto($_POST['cod_responsabledto']);

	

	switch ($operacion) 
	{
		case 'registrar_salida':
			$articulos = $_POST['articulo'];
			$cantidad 	= $_POST['cantidad'];
			$hecho=$lobjsalida->registrar_cabecera();

		
			for($i=0;$i<count($articulos);$i++)
			{
					
					$lobjsalida->set_Idarticulo($articulos[$i]);
					$lobjsalida->set_cantidad($cantidad[$i]);
					$hecho=$lobjsalida->registrar_detalle();
					

			}

			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tsalida','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente.';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
	header('location: ../vista/intranet.php?vista=inv_consumibles/salida');

		break;
		case 'registrar_entrega':
			$articulos = $_POST['articulo'];
			$cantidad 	= $_POST['cantidad'];
			$cantidadentregada 	= $_POST['cantidadentregada'];
			$hecho=$lobjsalida->registrar_cabecera_salida();

		
			for($i=0;$i<count($articulos);$i++)
			{
					
					$lobjsalida->set_Idarticulo($articulos[$i]);
					$lobjsalida->set_cantidad($cantidad[$i]);
					$lobjsalida->set_cantidadentregada($cantidadentregada[$i]);
					$hecho=$lobjsalida->registrar_salida();
					

			}

			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tentrada','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente.';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
	header('location: ../vista/intranet.php?vista=inv_consumibles/salida');

		break;
		case 'eliminar_salida':
			$hecho=$lobjsalida->eliminar_salida();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar','No se utiliza','estatus','tsalida','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=inv_consumibles/salida');
		break;
		case 'consultar_salidas_iguales':
			$lasalida=$lobjsalida->consultar_salidas_iguales();
			if ($lasalida) 
			{
				for ($i=0; $i <count($lasalida); $i++) 
				{ 
					echo '<option value="'.$lasalida[$i][0].'">'.$lasalida[$i][1].'</option>';
				}
			}
			else
				echo '0';
		break;
		case 'consultar_participantes_salida':
			$laparticipante=$lobjsalida->consultar_participantes();
			if ($laparticipante) 
			{
				echo '<option></option>';
				for ($i=0; $i <count($laparticipante); $i++) 
				{ 
                    echo '<option value="'.$laparticipante[$i][8].'">'.$laparticipante[$i][4].' / '.$laparticipante[$i][0].' '.$laparticipante[$i][2].'</option>';
				}
			}
			else
				echo '0';
		break;
		case 'consultar_intrumentos_salida':
			$lainstrumento=$lobjsalida->consultar_instrumentos();
			if ($lainstrumento) 
			{
				echo '<option></option>';
				for ($i=0; $i <count($lainstrumento); $i++) 
				{ 
                    echo '<option value="'.$lainstrumento[$i][0].'">'.$lainstrumento[$i][1].'</option>';
				}
			}
			else
				echo '0';
		break;
		case 'consultar_salidas_lapso':
			$lasalida=$lobjsalida->consultar_salidas_lapso_participante($_POST['idparticipante']);
			if ($lasalida) 
			{
				echo '<option></option>';
				for ($i=0; $i <count($lasalida); $i++) 
				{ 
                    echo '<option value="'.$lasalida[$i][0].'">'.$lasalida[$i][1].'</option>';
				}
			}
			else
				echo '0';
		break;
		default:
	header('location: ../vista/intranet.php?vista=inv_consumibles/salida');
		break;
	}

?>