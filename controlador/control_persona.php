<?php
	session_start();
	require_once("../clases/clase_persona.php");
	require_once("../clases/clase_bitacora.php");
    require_once('../libreria/utilidades.php');
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
	
	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_persona':
			$hecho=$lobjpersona->registrar_persona();
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
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
		break;
		case 'restaurar_persona':
			$hecho=$lobjpersona->restaurar_persona();
			if($hecho)
			{
				$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Restaurar','No se utiliza','estatusdoc','tpersona','0','1',$_SESSION['usuario'],$operacion); //envia los datos a la clase bitacora
   				$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
				$_SESSION['msj']='Se ha restaurado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='No se pudo restaurar';
			}
		break;
		default:
			header('location: ../vista/intranet.php?vista=persona/persona');
		break;
	}

	header('location: ../vista/intranet.php?vista=persona/persona');
?>