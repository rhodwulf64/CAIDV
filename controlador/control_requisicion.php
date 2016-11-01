<?php
	session_start();
	require_once("../clases/clase_requisicion.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjrequisicion=new clsrequisicion;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;


	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];
	$lobjrequisicion->set_Idrequisicion($_POST['idrequisicion']);
	$lobjrequisicion->set_idproveedor($_POST['idproveedor0']);
	$lobjrequisicion->set_rifproveedor($_POST['rifproveedor0']);
	$lobjrequisicion->set_responsable($_POST['cod_persona']);
	$lobjrequisicion->set_fecha($_POST['fecha']);
	$lobjrequisicion->set_nombreproveedor($_POST['nombreproveedor0']);
	$lobjrequisicion->set_fecharecepcion($_POST['fecharecepcion']);


	

	switch ($operacion) 
	{
		case 'registrar_requisicion':
			$articulos = $_POST['articulo'];
			$cantidad 	= $_POST['cantidad'];
			$hecho=$lobjrequisicion->registrar_cabecera();

		
			for($i=0;$i<count($articulos);$i++)
			{
					$lobjrequisicion->set_Idarticulo($articulos[$i]);
					$lobjrequisicion->set_cantidad($cantidad[$i]);
					$hecho=$lobjrequisicion->registrar_requisicion();
			}

			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','trequisicion','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente.';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
	 header('location: ../vista/intranet.php?vista=inv_consumibles/requisicion');

		break;
		case 'registrar_entrada':
			$articulos = $_POST['articulo'];
			$cantidad 	= $_POST['cantidad'];
			$cantidadentregada 	= $_POST['cantidadentregada'];
			$hecho=$lobjrequisicion->registrar_cabecera_entrada();

		
			for($i=0;$i<count($articulos);$i++)
			{
					
					$lobjrequisicion->set_Idarticulo($articulos[$i]);
					$lobjrequisicion->set_cantidad($cantidad[$i]);
					$lobjrequisicion->set_cantidadentregada($cantidadentregada[$i]);
					$hecho=$lobjrequisicion->registrar_entrada();
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
	header('location: ../vista/intranet.php?vista=inv_consumibles/requisicion');

		break;
		case 'eliminar_requisicion':
			$hecho=$lobjrequisicion->eliminar_requisicion();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar','No se utiliza','estatusre','trequisicion','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=inv_consumibles/requisicion');
		break;
		case 'eliminar_entrada':

			$hecho=$lobjrequisicion->contar_articulos();
			$hecho=$lobjrequisicion->desactivar_cabecera_entrada();
			$hecho=$lobjrequisicion->desactivar_entrada();

			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar','No se utiliza','estatusre','trequisicion','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=inv_consumibles/requisicion');
		break;
		case 'consultar_requisicions_iguales':
			$larequisicion=$lobjrequisicion->consultar_requisicions_iguales();
			if ($larequisicion) 
			{
				for ($i=0; $i <count($larequisicion); $i++) 
				{ 
					echo '<option value="'.$larequisicion[$i][0].'">'.$larequisicion[$i][1].'</option>';
				}
			}
			else
				echo '0';
		break;
		case 'consultar_participantes_requisicion':
			$laparticipante=$lobjrequisicion->consultar_participantes();
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
		case 'consultar_intrumentos_requisicion':
			$lainstrumento=$lobjrequisicion->consultar_instrumentos();
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
		case 'consultar_requisicions_lapso':
			$larequisicion=$lobjrequisicion->consultar_requisicions_lapso_participante($_POST['idparticipante']);
			if ($larequisicion) 
			{
				echo '<option></option>';
				for ($i=0; $i <count($larequisicion); $i++) 
				{ 
                    echo '<option value="'.$larequisicion[$i][0].'">'.$larequisicion[$i][1].'</option>';
				}
			}
			else
				echo '0';
		break;
		default:
	header('location: ../vista/intranet.php?vista=inv_consumibles/requisicion');
		break;
	}

?>
<script type="text/javascript">
	function Registrado(){
		swal("¡Se ha registrado exitosamente!")
	}
</script>