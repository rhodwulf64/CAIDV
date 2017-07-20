<?php

  session_start();
  if(!array_key_exists("usuario",$_SESSION))
	{
		header("location: ../Logout.php");
	}

	$lsIDmovi=$_POST["txtMoviObjeto"];
	$lsCODbn=$_POST["txtCodBN"];
	$MotAnulacion=$_POST["txtMotivoAnulacion"];
	$lsNroDocumento=$_POST["txtNroDocumento"];


	//recepciones
   	require_once("../clases/update2016/clase_recepcionbn.php");
	$loRecepci=new clsRecepcion();

	//asignaciones
   	require_once("../clases/update2016/clase_asignacionbn.php");
	$loAsigna=new clsAsignacion();

	//devoluciones
   	require_once("../clases/update2016/clase_devolucionbn.php");
	$loDevolu=new clsDevolucion();

	//desincorporaciones
   	require_once("../clases/update2016/clase_desincorporacionbn.php");
	$loDesinc=new clsDesincorporacion();

	//Prestamoes
   	require_once("../clases/update2016/clase_prestamobn.php");
	$loPresta=new clsPrestamo();

	//Restituciones
   	require_once("../clases/update2016/clase_restitucion.php");
	$loResti=new clsRestitucion();

   	//revoluciones
   	//require_once("../models/clsFuncionesGlobales.php");
	//$loFuncion =new clsFunciones();


	$lsSegmento=$_POST["txtSegmento"];
	$lsAccion=$_POST["txtAccion"];
	$lsProsecucion=$_POST["txtProsecucion"];
	$lsExito=$_POST["txtExito"];



	switch($lsSegmento)
   	{

   		case "Recepciones":
   			$lsExito = 0;
   			switch ($lsAccion) {
   				case 'consulTrazabilidad':
	   				$contarError=0;
	   				$tupla = $loRecepci->consultarBien($lsIDmovi);
					while($rs = $loRecepci->converArray($tupla))
					{
						if ($loRecepci->consultarTrazabilidadBien($rs["id_bien"]))
						{
							$contarError++;
						}
					}
					if($contarError==0)
					{
						$lsExito=1;
					}
   				break;

   				case 'desactivaRecepcion':

					$resultado=$loRecepci->anularRecepcion($lsIDmovi,$MotAnulacion);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'BuscarRecepcionExiste':

					$resultado=$loRecepci->BuscarRecepcionExiste($lsNroDocumento);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'BuscarBNExiste':

					$resultado=$loRecepci->BuscarBNExisteCOD($lsCODbn);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'incluirRecepcion':

					$loRecepci->RecibirTodo($_POST);
					$resultado=$loRecepci->incluir();
					$lsIDdocumento=$loRecepci->get_NroDocumento();
					if($resultado)
					{
						$lsExito=1;
					}

   				break;
   			}

		break;

		case "Asignaciones":
			$lsExito = 0;
			switch ($lsAccion) {
   				case 'consulTrazabilidad':

	   				$contarError=0;
	   				$tupla = $loAsigna->consultarBien($lsIDmovi);
					while($rs = $loAsigna->converArray($tupla))
					{
						if ($loAsigna->consultarTrazabilidadBien($rs["id_bien"]))
						{
							$contarError++;
						}
					}
					if($contarError==0)
					{
						$lsExito=1;
					}
   				break;

   				case 'ListarBNporTipo':

					$resultadoListaBN=$loAsigna->ListameBNporTipo();
					if($loAsigna->DameResultado())
					{
						$lsExito=1;
					}
   				break;

   				case 'BuscarAsignacionExiste':

					$resultado=$loAsigna->BuscarAsignacionExiste($lsNroDocumento);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'desactivaAsignacion':

					$resultado=$loAsigna->anularAsignacion($lsIDmovi,$MotAnulacion);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'incluirAsignacion':

					$loAsigna->RecibirTodo($_POST);
					$resultado=$loAsigna->incluir();
					$lsIDdocumento=$loAsigna->get_NroDocumento();
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

			}

			break;

		case "Devoluciones":
			$lsExito = 0;
			switch ($lsAccion) {
   				case 'consulTrazabilidad':

	   				$contarError=0;
	   				$tupla = $loDevolu->consultarBien($lsIDmovi);
					while($rs = $loDevolu->converArray($tupla))
					{
						if ($loDevolu->consultarTrazabilidadBien($rs["id_bien"]))
						{
							$contarError++;
						}
					}
					if($contarError==0)
					{
						$lsExito=1;
					}
   				break;

   				case 'ListarBNporTipo':
					$loDevolu->RecibirTodo($_POST);
					$resultadoListaBN=$loDevolu->ListameBNporTipo();
					if($loDevolu->DameResultado())
					{
						$lsExito=1;
					}

   				break;

   				case 'BuscarDevolucionExiste':

					$resultado=$loDevolu->BuscarDevolucionExiste($lsNroDocumento);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;



   				case 'desactivaDevolucion':

					$resultado=$loDevolu->anularDevolucion($lsIDmovi,$MotAnulacion);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'incluirDevolucion':

					$loDevolu->RecibirTodo($_POST);
					$resultado=$loDevolu->incluir();
					$lsIDdocumento=$loDevolu->get_NroDocumento();
					if($resultado)
					{
						$lsExito=1;
					}

   				break;
			}

		break;

		case "Desincorporaciones":
			$lsExito = 0;
			switch ($lsAccion) {
   				case 'consulTrazabilidad':

	   				$contarError=0;
					/*
	   				$tupla = $loDesinc->consultarBien($lsIDmovi);
					while($rs = $loDesinc->converArray($tupla))
					{
						if ($loDesinc->consultarTrazabilidadBien($rs["id_bien"]))
						{
							$contarError++;
						}
					}
					*/
					if($contarError==0)
					{
						$lsExito=1;
					}
   				break;

   				case 'ListarBNporTipo':

					$resultadoListaBN=$loDesinc->ListameBNporTipo();
					if($loDesinc->DameResultado())
					{
						$lsExito=1;
					}
   				break;

   				case 'BuscarDesincorporacionExiste':

					$resultado=$loDesinc->BuscarDesincorporacionExiste($lsNroDocumento);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'desactivaDesincorporacion':

					$resultado=$loDesinc->anularDesincorporacion($lsIDmovi,$MotAnulacion);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'incluirDesincorporacion':

					$loDesinc->RecibirTodo($_POST);
					$resultado=$loDesinc->incluir();
					$lsIDdocumento=$loDesinc->get_NroDocumento();
					if($resultado)
					{
						$lsExito=1;
					}

   				break;
				}

		break;

		case "Prestamos":
			$lsExito = 0;
			switch ($lsAccion) {

   				case 'consulTrazabilidad':

					if ($loPresta->consultarTrazabilidadPrestamo($lsIDmovi)==false)
					{
						$lsExito=1;
					}

   				break;

   				case 'BuscarPrestamoExiste':

					$resultado=$loPresta->BuscarPrestamoExiste($lsNroDocumento);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'ListarBNporTipo':

					$resultadoListaBN=$loPresta->ListameBNporTipo();
					if($loPresta->DameResultado())
					{
						$lsExito=1;
					}
   				break;

   				case 'desactivaPrestamo':

					$resultado=$loPresta->anularPrestamo($lsIDmovi,$MotAnulacion);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'incluirPrestamo':

					$loPresta->RecibirTodo($_POST);
					$resultado=$loPresta->incluir();
					$lsIDdocumento=$loPresta->get_NroDocumento();
					if($resultado)
					{
						$lsExito=1;
					}

   				break;
			}

			break;
			case "Restituciones":
			$lsExito = 0;

			switch ($lsAccion) {

   				case 'consulTrazabilidad':

	   				$contarError=0;
	   				$tupla = $loResti->consultarBien($lsIDmovi);
					while($rs = $loResti->converArray($tupla))
					{
						if ($loResti->consultarTrazabilidadBien($rs["id_bien"]))
						{
							$contarError++;
						}
					}
					if($contarError==0)
					{
						$lsExito=1;
					}
   				break;

   				case 'BuscarRestitucionExiste':

					$resultado=$loResti->BuscarRestitucionExiste($lsNroDocumento);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'ListarBNporTipo':

					$resultadoListaBN=$loResti->ListameBNporTipo();
					if($loResti->DameResultado())
					{
						$lsExito=1;
					}
   				break;

   				case 'ListarBNporEnte':

					$resultadoListaBN=$loResti->listarPrestamoSinRestituir();
					if($loResti->DameResultado())
					{
						$lsExito=1;
					}
   				break;

   				case 'desactivaRestitucion':

					$resultado=$loResti->anularRestitucion($lsIDmovi,$MotAnulacion);
					if($resultado)
					{
						$lsExito=1;
					}

   				break;

   				case 'incluirRestitucion':
   					$resultado=false;
					$loResti->RecibirTodo($_POST);
					if($loResti->consultar_restitucion_especifica())
					{
						$resultado=$loResti->incluir();
					}
					$lsIDdocumento=$loResti->get_NroDocumento();
					if($resultado)
					{
						$lsExito=1;
					}

   				break;
			}

			break;

    }


		header('Content-type: text/javascript');
		$json = array(
		"lsCod_Combo" => $lsCod_Combo,
		"lsCod_Foraneo" => $lsCod_Foraneo,
		"lsDescripcion" => $lsDescripcion,
		"lsEstatus" => $lsEstatus,
		"lsIDdocumento" => $lsIDdocumento,
		"lsSegmento" => $lsSegmento,
		"lsAccion" => $lsAccion,
		"lsProsecucion" => $lsProsecucion,
		"lsExito" => $lsExito);

		$envi = array("Master"=>$json,"ListadoBN"=>$resultadoListaBN);

		echo json_encode( $envi );


?>






