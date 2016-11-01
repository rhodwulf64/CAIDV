<?php
   date_default_timezone_set('America/Caracas');
   include_once("../clases/update2016/clase_reportesbienes.php");
   ob_end_clean();
   require_once("../libreria/fpdf/clsFpdf.php");
   require_once("../clases/clase_bitacora.php");
   require_once('../libreria/utilidades.php');
   require_once('../libreria/uuid.php');
   require_once('../clases/update2016/func_generales.php');
   $loFuncGenerales=new clsFuncGenerales;
   $lobjBitacora=new clsBitacora;
   $lobjUtil=new clsUtil;
   $ObjReportesBienes = new clsReportesBienes();

   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->codigo=UUID::v4();
   $lobjPdf->AddPage("P","Legal");

   $fFechaInicio=(isset($_POST['txtFechaInicio']))?$_POST['txtFechaInicio']:'';
   $fFechaFin=(isset($_POST['txtFechaFin']))?$_POST['txtFechaFin']:'';
   	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
   	$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Reporte','-','IDbienN','-',$lobjPdf->codigo,$IDbienN,$_SESSION['usuario'],'hojadevidabienes'); //envia los datos a la clase bitacora
   	$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.


	
	//$row_inscripcion=$ObjReportesBienes->consultar_inscripcion();

	function RecortaAcomun($texto)
	{
		while (strlen($texto)>18)
		{
			$texto=substr($texto, 0, -1);
		}

		return $texto;
	}


   $lobjPdf->SetFont("arial","B",16);
   $lobjPdf->Cell(0,6,utf8_decode("Listado de Bienes Nacionales Por Departamento."),0,1,"C");

   $lobjPdf->Ln(6);
   $lobjPdf->SetFont("arial","B",10);
   $lobjPdf->MultiCell(200,6,utf8_decode("ESPECÍFICAMENTE: ".$texto),0,"C");

		$row_participante=$ObjReportesBienes->DepartamentoPorUnidad($row_DetallesPorDepartamento[$u][0]);

	for($u=0;$u<count($row_participante);$u++)
	{
		$lobjPdf->SetFont("arial","B",14);
		$lobjPdf->SetTextColor(0,0,0);
		$lobjPdf->Cell(200,6,utf8_decode('_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _'),0,0,"C");
   		$lobjPdf->Ln(7);
		$row_DetallesPorDepartamento=$ObjReportesBienes->ListarBienesPorDepartamentos($row_participante[$u][1]);
		$cantidadDetalles=count($row_DetallesPorDepartamento);	
		$lobjPdf->Cell(200,6,utf8_decode('Departamento: '.RecortaAcomun($row_participante[$u][2]).' - Cantidad de Bienes: '.RecortaAcomun($cantidadDetalles)),0,1,"C");

		$lobjPdf->SetTextColor(210,83,77);
		for($i=0;$i<$cantidadDetalles;$i++)
		{
				
				$lobjPdf->Ln(7);
				$lobjPdf->SetFont("arial","B",14);
				$lobjPdf->Cell(200,6,utf8_decode('Cod. institucional: '.RecortaAcomun($row_DetallesPorDepartamento[$i][0]).' - Cod. Bien Nacional: '.RecortaAcomun($row_DetallesPorDepartamento[$i][1])),0,1,"C");

				$lobjPdf->SetFont("arial","B",12);
				$lobjPdf->Cell(50,6,utf8_decode('Tipo de Bien:'),0,0,"C");
				$lobjPdf->SetFont("arial","",12);
				$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_DetallesPorDepartamento[$i][17]."-".$row_DetallesPorDepartamento[$i][18])),'B',0,"L");
				$lobjPdf->SetFont("arial","B",12);
				$lobjPdf->Cell(50,6,utf8_decode('Descripción:'),0,0,"C");
				$lobjPdf->SetFont("arial","",12);
				$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_DetallesPorDepartamento[$i][7])),'B',1,"L");
				$lobjPdf->SetFont("arial","B",12);
				$lobjPdf->Cell(50,6,utf8_decode('Serial:'),0,0,"C");
				$lobjPdf->SetFont("arial","",12);
				$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_DetallesPorDepartamento[$i][4])),'B',0,"L");
				$lobjPdf->SetFont("arial","B",12);
				$lobjPdf->Cell(50,6,utf8_decode('marca:'),0,0,"C");
				$lobjPdf->SetFont("arial","",12);
				$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_DetallesPorDepartamento[$i][15])),'B',1,"L");
				$lobjPdf->SetFont("arial","B",12);
				$lobjPdf->Cell(50,6,utf8_decode('Fecha de Asignación:'),0,0,"C");
				$lobjPdf->SetFont("arial","",12);
				$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_DetallesPorDepartamento[$i][10])),'B',0,"L");
				$lobjPdf->SetFont("arial","B",12);
				$lobjPdf->Cell(50,6,utf8_decode('Módelo:'),0,0,"C"); 
				$lobjPdf->SetFont("arial","",12);
				$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_DetallesPorDepartamento[$i][16])),'B',1,"L");

				$lobjPdf->SetFont("arial","B",12);
				$lobjPdf->Cell(50,6,utf8_decode('Nro. Asignación:'),0,0,"C");
				$lobjPdf->SetFont("arial","",12);
				$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_DetallesPorDepartamento[$i][24])),'B',0,"L");
				$lobjPdf->SetFont("arial","B",12);
				$lobjPdf->Cell(50,6,utf8_decode('Motivo de Asignación:'),0,0,"C"); 
				$lobjPdf->SetFont("arial","",12);
				$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_DetallesPorDepartamento[$i][60])),'B',1,"L");
				$lobjPdf->SetFont("arial","B",12);

				$lobjPdf->Cell(50,6,utf8_decode('Obeservación:'),0,0,"C");
				$lobjPdf->SetFont("arial","",12);
				$lobjPdf->Cell(150,6,utf8_decode($row_DetallesPorDepartamento[$i][13]),'B',1,"L");

				$lobjPdf->Ln(7);


			
		}
	}
$lobjPdf->SetTextColor(0,0,0);
    
	
   $lobjPdf->Output(); 
?>