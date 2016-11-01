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
   $fCheckMovi=(!empty($_POST['txtCheckMovi']))?$_POST['txtCheckMovi']:'';
   $fFechaInicio=(isset($_POST['txtFechaInicio']))?$_POST['txtFechaInicio']:'';
   $fFechaFin=(isset($_POST['txtFechaFin']))?$_POST['txtFechaFin']:'';
   	$lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
   	$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Reporte','-','IDbienN','-',$lobjPdf->codigo,$IDbienN,$_SESSION['usuario'],'hojadevidabienes'); //envia los datos a la clase bitacora
   	$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.

	$ObjReportesBienes->set_fCheckMovi($fCheckMovi);
	$ObjReportesBienes->set_fFechaInicio($fFechaInicio);
	$ObjReportesBienes->set_fFechaFin($fFechaFin);

	$idArreglo=$ObjReportesBienes->consultar_id_articulos();
	
	//$row_inscripcion=$ObjReportesBienes->consultar_inscripcion();

	function RecortaAcomun($texto)
	{
		while (strlen($texto)>18)
		{
			$texto=substr($texto, 0, -1);
		}

		return $texto;
	}

	if ($fCheckMovi[0]=="1")
	{
		$texto.="RECEPCIONES";
	}
	if ($fCheckMovi[1]=="2")
	{
		if($texto!="")
		{
			$texto.=", ";
		}
		$texto.="ASIGNACIONES";
	}
	if ($fCheckMovi[2]=="3")
	{
		if($texto!="")
		{
			$texto.=", ";
		}
		$texto.="DEVOLUCIONES";
	}
	if ($fCheckMovi[3]=="4")
	{
		if($texto!="")
		{
			$texto.=", ";
		}
		$texto.="DESINCORPORACIONES";
	}
	if ($fCheckMovi[4]=="5")
	{
		if($texto!="")
		{
			$texto.=", ";
		}
		$texto.="PRESTAMOS";
	}
	if ($fCheckMovi[5]=="6")
	{
		if($texto!="")
		{
			$texto.=", ";
		}
		$texto.="RESTITUCIONES DE PRESTAMOS";
	}


   $lobjPdf->SetFont("arial","B",16);
   $lobjPdf->Cell(0,6,utf8_decode("Listado de Bienes Nacionales Por Rango de Fecha"),0,1,"C");
   $lobjPdf->Cell(0,6,utf8_decode("Desde: ".$fFechaInicio.", Hasta: ".$fFechaFin),0,1,"C");
   $lobjPdf->Ln(6);
   $lobjPdf->SetFont("arial","B",10);
   $lobjPdf->MultiCell(200,6,utf8_decode("ESPECÍFICAMENTE: ".$texto),0,"C");

	for($u=0;$u<count($idArreglo);$u++)
	{
		$lobjPdf->SetTextColor(0,0,0);
		$lobjPdf->Cell(200,6,utf8_decode('_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _'),0,0,"C");
		$row_participante=$ObjReportesBienes->ListarBienesPorFecha($idArreglo[$u][0]);

		      //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas
		//$row_inscripcion[8]=($row_inscripcion[8])?$row_inscripcion[8]:'default.jpg';
		//$lobjPdf->Cell(50,30,$lobjPdf->Image('../media/img/participantes/'.$row_inscripcion[8],10,68,50,30),1,1,"C");
   		$lobjPdf->Ln(7);
		$lobjPdf->SetFont("arial","B",14);
		$lobjPdf->Cell(200,6,utf8_decode('Cod. institucional: '.RecortaAcomun($idArreglo[$u][0]).' - Cod. Bien Nacional: '.RecortaAcomun($idArreglo[$u][1])),0,1,"C");

		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(50,6,utf8_decode('Tipo de Bien:'),0,0,"C");
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($idArreglo[$u][17]."-".$idArreglo[$u][18])),'B',0,"L");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(50,6,utf8_decode('Descripción:'),0,0,"C");
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($idArreglo[$u][7])),'B',1,"L");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(50,6,utf8_decode('Serial:'),0,0,"C");
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($idArreglo[$u][4])),'B',0,"L");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(50,6,utf8_decode('marca:'),0,0,"C");
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($idArreglo[$u][15])),'B',1,"L");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(50,6,utf8_decode('Fecha de Recepción:'),0,0,"C");
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($idArreglo[$u][10])),'B',0,"L");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(50,6,utf8_decode('Módelo:'),0,0,"C"); 
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($idArreglo[$u][16])),'B',1,"L");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(50,6,utf8_decode('Obeservación:'),0,0,"C");
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(150,6,utf8_decode($idArreglo[$u][13]),'B',1,"L");
		

		$lobjPdf->Ln(2);
		$lobjPdf->SetFont("arial","B",14);

	    $lobjPdf->Cell(200,6,utf8_decode("Detalles"),0,0,"C");
		$lobjPdf->Ln(6);









   		
		$lobjPdf->SetTextColor(210,83,77);
		for($i=0;$i<count($row_participante);$i++)
		{

		$a=$i+1;

		$HastaFecha=$loFuncGenerales->fFechaVaciaHasta($row_participante[$a][27],$row_participante[$a][30]);

		
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(50,6,utf8_decode('Desde:'),0,0,"C");
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][27])),'B',0,"L");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(50,6,utf8_decode('Hasta:'),0,0,"C");
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($HastaFecha)),'B',0,"L");
		$lobjPdf->Ln(6);
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


		if ((is_null($row_participante[$i][62])==false)OR(is_null($row_participante[$i][65])==false))
		{
		   	$lobjPdf->SetFont("arial","B",12);
			$lobjPdf->Cell(50,6,utf8_decode('Departamento:'),0,0,"C");
			$lobjPdf->SetFont("arial","",12);
			$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][62])),'B',0,"L");
			$lobjPdf->SetFont("arial","B",12);
			$lobjPdf->Cell(50,6,utf8_decode('Responsable Dto:'),0,0,"C");
			$lobjPdf->SetFont("arial","",12);
			$lobjPdf->Cell(50,6,RecortaAcomun(utf8_decode($row_participante[$i][65])),'B',1,"L");
		}
		if ((is_null($row_participante[$i][28])==false)OR(is_null($row_participante[$i][30])==false)OR(is_null($row_participante[$i][51])==false)OR(is_null($row_participante[$i][50])==false))
		{
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
		}
		if (is_null($row_participante[$i][40])==false)
		{
			$lobjPdf->SetFont("arial","B",12);
			$lobjPdf->Cell(50,6,utf8_decode('Obeservación:'),0,0,"C");
			$lobjPdf->SetFont("arial","",12);
			$lobjPdf->Cell(150,6,utf8_decode($row_participante[0][40]),'B',1,"L");
		}

		$lobjPdf->Ln(7);
			
		}
	}
$lobjPdf->SetTextColor(0,0,0);
    
	
   $lobjPdf->Output(); 
?>