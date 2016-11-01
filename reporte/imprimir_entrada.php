<?php
   date_default_timezone_set('America/Caracas');
   include_once("../clases/clase_requisicion.php");
   ob_end_clean();
   require_once("../libreria/fpdf/clsFpdf.php");
   require_once("../clases/clase_bitacora.php");
   require_once('../libreria/utilidades.php');
   require_once('../libreria/uuid.php');

   $lobjBitacora=new clsBitacora;
   $lobjUtil=new clsUtil;
   $Objrequisicion = new clsrequisicion();
     $lobjPdf=new clsFpdf();
    $ldFecha=date('Y-m-d h:m');
	$lcReal_ip=$lobjUtil->get_real_ip();
	
   $lobjPdf->AliasNbPages();
   $lobjPdf->codigo=UUID::v4();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetFont("arial","B",18);
   	$Idrequisicion=(isset($_GET['id']))?$_GET['id']:'';
   	$Objrequisicion->set_Idrequisicion($Idrequisicion);
   	$Objrequisicion->set_Identrada($Idrequisicion);
	$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Reporte','-','id','-',$lobjPdf->codigo,$Idrequisicion,$_SESSION['usuario'],'imprimir_entrada'); //envia los datos a la clase bitacora
   	$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.

   	$row_requisicion=$Objrequisicion->consultar_entrada();
   	$row_requisicions=$Objrequisicion->consultar_detalle_finalizado();

  
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,utf8_decode("Entrada de Consumibles"),0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas

	//$lobjPdf->Cell(50,30,$lobjPdf->Image('../media/img/requisicions/'.$row_requisicion[1].'.jpg',10,64,50,30),1,1,"C");
   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Cell(200,6,utf8_decode("Datos de la entrada"),0,1,"C");
    $lobjPdf->Ln(2);
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Número de Solicitud:'),1,0,"C"); 
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode(number_format($row_requisicion[0],0,'','.')),1,0,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,'RIF del proveedor',1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_requisicion[4]),1,1,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Fecha de la solicitud'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_requisicion[2]),1,0,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Proveedor'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_requisicion[9]),1,1,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Fecha de la Recepción'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_requisicion[8]),1,0,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Solicitante'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_requisicion[11].' '.$row_requisicion[12]),1,0,"C");
	$lobjPdf->SetFont("arial","B",12);

    $lobjPdf->Ln(12);
	$lobjPdf->SetFont("arial","B",12);

    $lobjPdf->Cell(200,6,utf8_decode("Listado de Consumibles"),0,1,"C");
    $lobjPdf->Ln(2);
    $lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(70,6,utf8_decode('Nombre del Consumible'),1,0,"C"); 
	$lobjPdf->Cell(70,6,utf8_decode('Cantidad solicitada'),1,0,"C");
	$lobjPdf->Cell(60,6,utf8_decode('Cantidad recibida'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
    $lobjPdf->Ln(6);

	for($i=0;$i<count($row_requisicions);$i++)
	{
		$lobjPdf->Cell(70,6,utf8_decode($row_requisicions[$i][4]),1,0,"C");
		$lobjPdf->Cell(70,6,utf8_decode($row_requisicions[$i][5]),1,0,"C");
		$lobjPdf->Cell(60,6,utf8_decode($row_requisicions[$i][7]),1,0,"C");
   	 	$lobjPdf->Ln(6);
		
	}
	$lobjPdf->Ln(18);
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Ln(2);
    $lobjPdf->Cell(200,6,utf8_decode("_________________________________"),0,1,"C");
    $lobjPdf->Cell(200,6,utf8_decode($row_requisicion[11].' '.$row_requisicion[12]),0,1,"C");
   	$lobjPdf->Cell(200,6,utf8_decode($row_requisicion[14].''.$row_requisicion[13]),0,1,"C");

   $lobjPdf->Output(); 
?>