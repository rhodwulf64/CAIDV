<?php
	session_start();
	require_once("../clases/clase_entrada.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjentrada=new clsentrada;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;


	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];
	$lobjentrada->set_idproveedor($_POST['idproveedor']);
	$lobjentrada->set_idcompra($_POST['idcompra']);
	$lobjentrada->set_rifproveedor($_POST['rifproveedor0']);
	$lobjentrada->set_responsable($_POST['cod_persona']);
	$lobjentrada->set_fecha($_POST['fecha']);
	$lobjentrada->set_nombreproveedor($_POST['nombreproveedor0']);

	

	switch ($operacion) 
	{
		case 'registrar_entrada':
			$articulos = $_POST['articulo'];
			$cantidad 	= $_POST['cantidad'];
			$hecho=$lobjentrada->registrar_cabecera();

		
			for($i=0;$i<count($articulos);$i++)
			{
					
					$lobjentrada->set_Idarticulo($articulos[$i]);
					$lobjentrada->set_cantidad($cantidad[$i]);
					$hecho=$lobjentrada->registrar_entrada();
					

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
	header('location: ../vista/intranet.php?vista=inv_consumibles/dentrada');

		break;
		case 'cerrar_entrada':

			$hecho=$lobjentrada->cerrar_entrada($_POST['identrada_nuevo']);
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar',$_POST['razondesactiva'],'estatuscur','tentrada','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha cerrado el entrada exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al cerrar el entrada';
			}
		header('location: ../vista/intranet.php?vista=inv_consumibles/dentrada');
		break;
		case 'consultar_entradas_iguales':
			$laentrada=$lobjentrada->consultar_entradas_iguales();
			if ($laentrada) 
			{
				for ($i=0; $i <count($laentrada); $i++) 
				{ 
					echo '<option value="'.$laentrada[$i][0].'">'.$laentrada[$i][1].'</option>';
				}
			}
			else
				echo '0';
		break;
		case 'consultar_participantes_entrada':
			$laparticipante=$lobjentrada->consultar_participantes();
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
		case 'consultar_intrumentos_entrada':
			$lainstrumento=$lobjentrada->consultar_instrumentos();
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
		case 'consultar_entradas_lapso':
			$laentrada=$lobjentrada->consultar_entradas_lapso_participante($_POST['idparticipante']);
			if ($laentrada) 
			{
				echo '<option></option>';
				for ($i=0; $i <count($laentrada); $i++) 
				{ 
                    echo '<option value="'.$laentrada[$i][0].'">'.$laentrada[$i][1].'</option>';
				}
			}
			else
				echo '0';
		break;
		default:
	header('location: ../vista/intranet.php?vista=inv_consumibles/dentrada');
		break;
	}

?>