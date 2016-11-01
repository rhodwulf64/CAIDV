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
   $IDbienN=(isset($_GET['objektBN']))?$_GET['objektBN']:'';
   $Cedulapar=(isset($_GET['cedula']))?$_GET['cedula']:'';
   	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
   	$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Reporte','-','IDbienN','-',$lobjPdf->codigo,$IDbienN,$_SESSION['usuario'],'hojadevidabienes'); //envia los datos a la clase bitacora
   	$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.

	$ObjReportesBienes->set_IdBienNacional($IDbienN);

	$row_participante=$ObjReportesBienes->HojadeVidaBienNacional();
	//$row_inscripcion=$ObjReportesBienes->consultar_inscripcion();

	function RecortaAcomun($texto)
	{
		while (strlen($texto)>18)
		{
			$texto=substr($texto, 0, -1);
		}
		return $texto;
	}

   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Ln(5);
   $lobjPdf->Cell(0,6,utf8_decode("HOJA DE VIDA"),0,1,"C");
   $lobjPdf->Ln(6);
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas
	//$row_inscripcion[8]=($row_inscripcion[8])?$row_inscripcion[8]:'default.jpg';
	//$lobjPdf->Cell(50,30,$lobjPdf->Image('../media/img/participantes/'.$row_inscripcion[8],10,68,50,30),1,1,"C");
   $lobjPdf->Cell(200,6,utf8_decode("DATOS DEL BIEN NACIONAL"),0,1,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Cod. institucional:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[0][0])),'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Tipo de Bien:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[0][17]."-".$row_participante[0][18])),'B',1,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Cod. Bien Nacional:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[0][1])),'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Descripción:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[0][7])),'B',1,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Serial:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[0][4])),'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('marca:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[0][15])),'B',1,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Fecha de Recepción:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[0][10])),'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Módelo:'),0,0,"C"); 
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[0][16])),'B',1,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Obeservación:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(150,6,utf8_decode($row_participante[0][13]),'B',1,"L");
	

	$lobjPdf->Ln(2);
	$lobjPdf->SetFont("arial","B",14);

    $lobjPdf->Cell(200,6,utf8_decode("Historia"),0,1,"C");
	$lobjPdf->Ln(2);

	for($i=0;$i<count($row_participante);$i++)
	{

	$a=$i+1;
	
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Desde:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][27])),'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Hasta:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($loFuncGenerales->fFechaVaciaHasta($row_participante[$a][27],$row_participante[$a][30])),'B',1,"L"));
   	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Estado:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,$row_participante[$i][45],'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Motivo:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][60])),'B',1,"L");
   	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Nro. Operación:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][24])),'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Fecha de Registro:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][25])),'B',1,"L");
   	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Responsable Operación:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][58])),'B',0,"L");
   	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Usuario:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][59])),'B',1,"L");

   	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Departamento:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][62])),'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Responsable Dto:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][65])),'B',1,"L");

   	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Fecha Acordada:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][28])),'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Fecha Restituido:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][30])),'B',1,"L");

   	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Ente Receptor:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][51])),'B',0,"L");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Responsable Receptor:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][50])),'B',1,"L");

	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Obeservación:'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(150,6,utf8_decode($row_participante[0][40]),'B',1,"L");

	$lobjPdf->Cell(200,6,utf8_decode('_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _'),0,0,"C");
	$lobjPdf->Ln(5);
		
	}

    
	
   $lobjPdf->Output(); 
?>