<?php
	require_once("../clases/clase_periodo.php");
	$lobjperiodo=new clsperiodo;

	$APERTURADO = $lobjperiodo->consultar_activo();

	if($APERTURADO)
	{
		$CIERRE = $lobjperiodo->consultar_cierre();

		if($CIERRE)
		{
			$lobjperiodo->set_Estadolap('CERRADO');
			$llHecho = $lobjperiodo->editar_estado();
			if($llHecho)
			{
				print('<script>alert("Se ha cerrado su antiguo periodo");</script>');
			}
			
			$APERTURA = $lobjperiodo->consultar_apertura();

			if($APERTURA)
			{
				$lobjperiodo->set_Estadolap('APERTURADO');
				$llHecho = $lobjperiodo->editar_estado();
				if($llHecho)
				{
					print('<script>alert("Se ha aperturado un nuevo periodo");</script>');
				}
			}
		}

	}
	else 
	{
		$APERTURA = $lobjperiodo->consultar_apertura();

		if($APERTURA)
		{
			$lobjperiodo->set_Estadolap('APERTURADO');
			$llHecho = $lobjperiodo->editar_estado();
			if($llHecho)
			{
				print('<script>alert("Se ha aperturado un nuevo periodo");</script>');
			}
		}
	}
	
?>