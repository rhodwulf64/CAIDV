<?php
	if(0){
		error_reporting(E_ALL & ~E_NOTICE);
		ini_set("display_errors","on");
	}else{
		error_reporting(0);
		ini_set("display_errors","off");
	}
	session_start();
	require_once("../clases/clase_asignacion2.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$donacion=new clsAsignacion;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$donacion->idAsignacion=$_POST["idAsignacion"];
	$donacion->idusuario=$_POST["idusuario"];
	$donacion->idAsignado=$_POST["idPersona"];
	$donacion->id_motivo_mov=$_POST['idMotivo'];
	$donacion->fecha_asignacion=$_POST["fecha_asignacion"];
	$donacion->observacion=$_POST["observacion"];
	$donacion->estatus=$_POST['estatus'];

	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_asignacion':
			$id=$donacion->registrar_asignacion();
			if($id !="" && $id != null)
			{	
				$donacion->idAsignacion=$id;
   				$cantidad = $_POST["cantidad"];
   				foreach ($_POST["idArticulo"] as $i => $value) {
   					$donacion->idArticulo = $value;
   					$donacion->cantidad = $cantidad[$i];
   					$donacion->registrar_asignacion_detalle();
   				}
				$_SESSION['msj']='Se ha registrado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
			header('location: ../vista/intranet.php?vista=donacion/asignacion');
		break;
		case 'editar_articulo':
			$tipo_articulo->idArticulo=$_POST['idArticulo'];

			$hecho=$tipo_articulo->editar_articulo();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Modificar','Error en los datos',$laCampo[$i],'tarticulo',$laValorAnterior[$i],$laValorNuevo[$i],$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
	   			$lnHecho=$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
   				if($lnHecho)
				{
					$_SESSION['msj']='Se ha modificado exitosamente';
				}
				
			}
			else
			{	
				$_SESSION['msj']='No se realizarón cambios';
			}
			header('location: ../vista/intranet.php?vista=donacion/asignacion');
		break;
		case 'eliminar_asignacion':
			$hecho=$donacion->eliminar_asignacion();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar','No sé utiliza','estatusmod','tarticulo','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=donacion/asignacion');
		break;
		case 'restaurar_asignacion':
			$hecho=$donacion->restaurar_asignacion();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','Necesario','estatusmod','tarticulo','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha restaurado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se pudo restaurar el servicio';
			}
			header('location: ../vista/intranet.php?vista=donacion/asignacion');
		break;
		case 'ajax':
			$donacion->idArticulo=$_POST["idArticulo"];
			echo json_encode($donacion->buscar_cantidad());
		break;
		default:
			header('location: ../vista/intranet.php?vista=donacion/asignacion');
		break;
	}

	//header('location: ../vista/intranet.php?vista=donacion/donacion');
?>