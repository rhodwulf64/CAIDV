<?php
	session_start();
	require_once("../clases/clase_persona.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
<<<<<<< HEAD
	$lobjpersona=new clspersona;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$lobjpersona->set_persona($_POST['cedula']);
	$lobjpersona->set_Nacionalidad($_POST['nacionalidad']);
	$lobjpersona->set_nombre_per($_POST['nombre_per']);
	$lobjpersona->set_nombre2_per($_POST['nombre2_per']);
	$lobjpersona->set_apellido_per($_POST['apellido_per']);
	$lobjpersona->set_apellido2_per($_POST['apellido2_per']);
	$lobjpersona->set_Sexo($_POST['sexo']);
	$lobjpersona->set_Telefono($_POST['tlf']);
	$lobjpersona->set_Direccion($_POST['direccion']);
	$lobjpersona->set_cod_tdepartamento($_POST['cod_tdepartamento']);
	
=======
	$tipo_articulo=new clsPersona;
	$lobjBitacora=new clsBitacora;
	$lobjUtil=new clsUtil;

	$tipo_articulo->idPersona=$_POST['idPersona'];
	$tipo_articulo->cedula=$_POST['cedula'];
	$tipo_articulo->primer_nombre=$_POST['primer_nombre'];
	$tipo_articulo->segundo_nombre=$_POST['segundo_nombre'];
	$tipo_articulo->primer_apellido=$_POST['primer_apellido'];
	$tipo_articulo->segundo_apellido=$_POST['segundo_apellido'];
	$tipo_articulo->sexo=$_POST['sexo'];
	$tipo_articulo->direccion=$_POST['direccion'];
	$tipo_articulo->tlf_uno=$_POST['tlf_uno'];
	$tipo_articulo->tlf_dos=$_POST['tlf_dos'];
	$tipo_articulo->correo=$_POST['correo'];

>>>>>>> caidv2
	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_persona':
<<<<<<< HEAD
			$hecho=$lobjpersona->registrar_persona();
=======
			$hecho=$tipo_articulo->registrar_persona();
>>>>>>> caidv2
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Registrar','Cargar datos','*','tpersona','','',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha registrado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
<<<<<<< HEAD
		break;
		case 'editar_persona':
			$lapersonaAnterior=$lobjpersona->consultar_persona_bitacora();

			$laValorNuevo=$laValorAnterior=$laCampo=array();

			$hecho=$lobjpersona->editar_persona();
			if($hecho)
			{
				$cont=0;
				foreach ($lapersonaAnterior as $key2 => $value2) 
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
					$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Modificar','Error en los datos',$laCampo[$i],'tpersona',$laValorAnterior[$i],$laValorNuevo[$i],$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
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
		case 'eliminar_persona':
			$hecho=$lobjpersona->eliminar_persona();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar',$_POST['razondesactiva'],'estatus','tpersona','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
=======
			header('location: ../vista/intranet.php?vista=donacion/persona');
		break;
		case 'editar_persona':
			$tipo_articulo->idPersona=$_POST['idPersona'];

			$hecho=$tipo_articulo->editar_persona();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Modificar','Error en los datos',$laCampo[$i],'tpersona',$laValorAnterior[$i],$laValorNuevo[$i],$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
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
		break;
		case 'eliminar_persona':
			$hecho=$tipo_articulo->eliminar_persona();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Eliminar','No sé utiliza','estatusmod','tpersona','1','0',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
>>>>>>> caidv2
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
<<<<<<< HEAD
				$_SESSION['msj']='Error al eliminar';
			}
		break;
		case 'restaurar_persona':
			$hecho=$lobjpersona->restaurar_persona();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','No se utiliza','estatusdoc','tpersona','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
=======
				$_SESSION['msj']='Error al eliminar ';
			}
		break;
		case 'restaurar_persona':
			$hecho=$tipo_articulo->restaurar_persona();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','Necesario','estatusmod','tpersona','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
>>>>>>> caidv2
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha restaurado exitosamente';
			}
			else
			{	
<<<<<<< HEAD
				$_SESSION['msj']='No se pudo restaurar';
			}
		break;
		default:
			header('location: ../vista/intranet.php?vista=persona/persona');
		break;
	}

	header('location: ../vista/intranet.php?vista=persona/persona');
=======
				$_SESSION['msj']='No se pudo restaurar el servicio';
			}
		break;
		default:
			header('location: ../vista/intranet.php?vista=donacion/persona');
		break;
	}

	header('location: ../vista/intranet.php?vista=donacion/persona');
>>>>>>> caidv2
?>