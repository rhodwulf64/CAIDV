<?php
	session_start();
	require_once("../clases/clase_articulo.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
	$lobjarticulo=new clsarticulo;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$lobjarticulo->set_articulo($_POST['idarticulo']);
	$lobjarticulo->set_descripcionart($_POST['descripcionart']);
	$lobjarticulo->set_idunidadmedida($_POST['idunidadmedida']);
	$lobjarticulo->set_presentacion($_POST['idpresentacion']);
	$lobjarticulo->set_grupo($_POST['idgrupo']);
	$lobjarticulo->set_stockminimo($_POST['stockminimo']);

	$operacion=$_POST['operacion'];
	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');


	switch ($operacion) 
	{
		case 'registrar_articulo':
			$hecho=$lobjarticulo->registrar_articulo();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tarticulo','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
			header('location: ../vista/intranet.php?vista=inv_consumibles/articulo');
		break;
		case 'editar_articulo':
			$laValorNuevo=$laValorAnterior=$laCampo=array();

			$lobjarticulo->set_articulo($_POST['idarticulo']);
			$laarticuloAnterior=$lobjarticulo->consultar_articulo();

			$hecho=$lobjarticulo->editar_articulo();
			if($hecho)
			{
				$cont=0;
				foreach ($laarticuloAnterior as $key2 => $value2) 
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
					$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Modificar','Error en los datos',$laCampo[$i],'tarticulo',$laValorAnterior[$i],$laValorNuevo[$i],$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
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
			header('location: ../vista/intranet.php?vista=inv_consumibles/articulo');
		break;
		case 'eliminar_articulo':
			$hecho=$lobjarticulo->eliminar_articulo();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar','No se utiliza','estatus','tarticulo','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=inv_consumibles/articulo');
		break;
		case 'restaurar_articulo':
			$hecho=$lobjarticulo->restaurar_articulo();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','No se utiliza','estatus','tarticulo','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha restaurado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se pudo restaurar el artículo';
			}

			header('location: ../vista/intranet.php?vista=inv_consumibles/articulo');
		break;
		default:
			header('location: ../vista/intranet.php');
		break;
	}

?>