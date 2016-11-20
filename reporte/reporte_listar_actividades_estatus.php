<?php
	if(0){
		error_reporting(E_ALL & ~E_NOTICE);
		ini_set("display_errors","on");
	}else{
		error_reporting(0);
		ini_set("display_errors","off");
	}
   date_default_timezone_set('America/Caracas');
   //include_once("../clases/clase_lapso.php");
   ob_end_clean();
   require_once("../libreria/fpdf/clsFpdf.php");
   require_once('../libreria/utilidades.php');
   require_once('../libreria/uuid.php');
   require_once('../clases/cls_Reporte_Historial_Empresa.php');
   $lobjUtil=new clsUtil;
   $historial=new cls_historial;
   $cod=$_POST['estatus'];
   $fecha_ini=$_POST['fecha_ini'];
   $fecha_fin=$_POST['fecha_fin'];

   $resultados=$historial->listar_actividades_estatus($cod,$fecha_ini,$fecha_fin);
   //$ObjLapso = new clsLapso();
   //$ObjCurso = new clsCurso();
    $lobjPdf=new clsFpdf();
   $lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
    
   $lobjPdf->AliasNbPages();
   $lobjPdf->codigo=UUID::v4();
   $lobjPdf->AddPage("L","Legal");
   $lobjPdf->SetFont("arial","B",12);
   
   $lobjPdf->Ln(10);
	$lobjPdf->Cell(50,6,utf8_decode(""),0,1,"C");		
	for ($i=0; $i < count($resultados) ; $i++) { 
			if($resultados[$i][9]=='A'){
				$resultados[$i][9]='Anulada';
			}else if($resultados[$i][9]=='E'){
				$resultados[$i][9]='En Ejecucion';
			}else if($resultados[$i][9]=='C'){
				$resultados[$i][9]='Completada';
			}else if($resultados[$i][9]=='P'){
				$resultados[$i][9]='Planificada';
			}
	}
	 
	 $lobjPdf->Cell(0,6,utf8_decode("Listado de Actividades ".$resultados[0][9]),0,1,"C");	
	 $lobjPdf->Cell(0,6,utf8_decode("Entre '".$fecha_ini."' al '".$fecha_fin."'"),0,1,"C");	
	 $lobjPdf->Ln(6);
	if (count($resultados)==0) {
   $lobjPdf->Ln(10);
   $lobjPdf->Ln(10);
   $lobjPdf->Ln(10);
		$lobjPdf->SetFont("arial","",40);
		$lobjPdf->Cell(0,6,utf8_decode("No hay Actividades para mostrar"),0,1,"C");	
	}else{
	    $lobjPdf->Cell(50,6,utf8_decode('Empresa'),1,0,"C"); 
	    $lobjPdf->Cell(60,6,utf8_decode('Actividad'),1,0,"C"); 
	    $lobjPdf->Cell(40,6,utf8_decode('Lugar'),1,0,"C"); 
	    $lobjPdf->Cell(55,6,utf8_decode('Encargado por la Empresa'),1,0,"C"); 
	    $lobjPdf->Cell(55,6,utf8_decode('Encargado por CAIDV'),1,0,"C"); 
		$lobjPdf->Cell(40,6,utf8_decode('Fecha'),1,0,"C");
		$lobjPdf->Cell(35,6,utf8_decode('Hora'),1,1,"C");
	  
		
		for ($i=0; $i < count($resultados) ; $i++) { 
			
			$lobjPdf->SetFont("arial","",9);
			$lobjPdf->Cell(50,6,utf8_decode($resultados[$i][0]),1,0,"C"); 
			$lobjPdf->Cell(60,6,utf8_decode($resultados[$i][3]),1,0,"C"); 
			$lobjPdf->Cell(40,6,utf8_decode($resultados[$i][8]),1,0,"C"); 
			$lobjPdf->Cell(55,6,utf8_decode($resultados[$i][2]),1,0,"C"); 
			$lobjPdf->Cell(55,6,utf8_decode($resultados[$i][1]),1,0,"C"); 
			$lobjPdf->Cell(40,6,utf8_decode($resultados[$i][4].' a '.$resultados[$i][5]),1,0,"C");
			$lobjPdf->Cell(35,6,utf8_decode($resultados[$i][6].' a '.$resultados[$i][7]),1,1,"C");
		}
		
		$lobjPdf->Cell(20);
		

		$lobjPdf->Ln(20);
		$lobjPdf->Cell(140);
		$lobjPdf->Cell(50,0,utf8_decode(''),1,1,"C");
		$lobjPdf->Ln(1);
		$lobjPdf->Cell(0,3,utf8_decode('Firma director(a)'),0,1,"C");
	}
	
   $lobjPdf->Output(); 
?>