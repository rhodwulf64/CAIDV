<?php
   date_default_timezone_set('America/Caracas');
   include_once("../clases/clase_salida.php");
   ob_end_clean();
   require_once("../libreria/fpdf/clsFpdf.php");
   require_once("../clases/clase_bitacora.php");
   require_once('../libreria/utilidades.php');
   require_once('../libreria/uuid.php');

   $lobjBitacora=new clsBitacora;
   $lobjUtil=new clsUtil;
   $Objsalida = new clssalida();
     $lobjPdf=new clsFpdf();
    $ldFecha=date('Y-m-d h:m');
	$lcReal_ip=$lobjUtil->get_real_ip();
	
   $lobjPdf->AliasNbPages();
   $lobjPdf->codigo=UUID::v4();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetFont("arial","B",18);
   	$Idsalida=(isset($_GET['id']))?$_GET['id']:'';
   	$Objsalida->set_Idsalida($Idsalida);
   	$Objsalida->set_Idsalida($Idsalida);
	$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Reporte','-','id','-',$lobjPdf->codigo,$Idsalida,$_SESSION['usuario'],'imprimir_salida'); //envia los datos a la clase bitacora
   	$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.

   	$row_salida=$Objsalida->consultar_salida_imprimir();
   	$row_salidas=$Objsalida->consultar_detalle_finalizado();

  
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,utf8_decode("Asignación de Consumibles"),0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas

	//$lobjPdf->Cell(50,30,$lobjPdf->Image('../media/img/salidas/'.$row_salida[1].'.jpg',10,64,50,30),1,1,"C");
   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Cell(200,6,utf8_decode("Datos de la Asignación"),0,1,"C");
    $lobjPdf->Ln(2);
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Número de Solicitud:'),1,0,"C"); 
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode(number_format($row_salida[0],0,'','.')),1,0,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,'Departamento',1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_salida[4]),1,1,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Fecha de la solicitud'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_salida[1]),1,0,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Solicitante'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_salida[6].' '.$row_salida[7]),1,1,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Fecha de la Asignación'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_salida[3]),1,0,"C");
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(50,6,utf8_decode('Asignado Por'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($row_salida[5]),1,0,"C");
	$lobjPdf->SetFont("arial","B",12);


    $lobjPdf->Ln(12);
	$lobjPdf->SetFont("arial","B",12);
    $lobjPdf->Cell(200,6,utf8_decode("Listado de Consumibles"),0,1,"C");
    $lobjPdf->Ln(2);
    $lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(70,6,utf8_decode('Nombre del Consumible'),1,0,"C"); 
	$lobjPdf->Cell(70,6,utf8_decode('Cantidad solicitada'),1,0,"C");
	$lobjPdf->Cell(60,6,utf8_decode('Cantidad Entregada'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
    $lobjPdf->Ln(6);

	for($i=0;$i<count($row_salidas);$i++)
	{
		$lobjPdf->Cell(70,6,utf8_decode($row_salidas[$i][4]),1,0,"C");
		$lobjPdf->Cell(70,6,utf8_decode($row_salidas[$i][5]),1,0,"C");
		$lobjPdf->Cell(60,6,utf8_decode($row_salidas[$i][7]),1,0,"C");
   	 	$lobjPdf->Ln(6);
		
	}
	$lobjPdf->Ln(18);
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Ln(2);
    $lobjPdf->Cell(200,6,utf8_decode("_________________________________"),0,1,"C");
    $lobjPdf->Cell(200,6,utf8_decode($row_salida[7].' '.$row_salida[6]),0,1,"C");
   	$lobjPdf->Cell(200,6,utf8_decode($row_salida[12].''.$row_salida[13]),0,1,"C");

   $lobjPdf->Output(); 
?>