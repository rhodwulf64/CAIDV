<?php
   date_default_timezone_set('America/Caracas');
   include_once("../clases/clase_articulo.php");
   ob_end_clean();
   require_once("../libreria/fpdf/clsFpdf.php");
   require_once("../clases/clase_bitacora.php");
   require_once('../libreria/utilidades.php');
   require_once('../libreria/uuid.php');

   $lobjBitacora=new clsBitacora;
   $lobjUtil=new clsUtil;
   $Objarticulo = new clsarticulo();
     $lobjPdf=new clsFpdf();
    $ldFecha=date('Y-m-d h:m');
    $fecham=date('d-m-Y');
	$lcReal_ip=$lobjUtil->get_real_ip();
	
   $lobjPdf->AliasNbPages();
   $lobjPdf->codigo=UUID::v4();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetFont("arial","B",18);
	$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Reporte','-','id','-',$lobjPdf->codigo,'No se utiliza',$_SESSION['usuario'],'articulos_faltantes'); //envia los datos a la clase bitacora
   	$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.

   	$row_articulos=$Objarticulo->consultar_articulos_faltantes();

  
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,utf8_decode("Consumibles faltantes"),0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas

	//$lobjPdf->Cell(50,30,$lobjPdf->Image('../media/img/articulos/'.$row_articulo[1].'.jpg',10,64,50,30),1,1,"C");
   $lobjPdf->SetFont("arial","B",12);

	$lobjPdf->Cell(50,6,utf8_decode('Fecha del reporte'),0,0,"C");
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(50,6,utf8_decode($fecham),1,0,"C");
	$lobjPdf->SetFont("arial","B",12);



    $lobjPdf->Ln(12);
	$lobjPdf->SetFont("arial","B",12);
    $lobjPdf->Cell(200,6,utf8_decode("Listado de Consumibles"),0,1,"C");
    $lobjPdf->Ln(2);
    $lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(70,6,utf8_decode('Nombre del Consumible'),1,0,"C"); 
	$lobjPdf->Cell(70,6,utf8_decode('Stock mínimo'),1,0,"C");
	$lobjPdf->Cell(60,6,utf8_decode('Existencia'),1,0,"C");
	$lobjPdf->SetFont("arial","",12);
    $lobjPdf->Ln(6);

	for($i=0;$i<count($row_articulos);$i++)
	{
		$lobjPdf->Cell(70,6,utf8_decode($row_articulos[$i][1]),1,0,"C");
		$lobjPdf->Cell(70,6,utf8_decode($row_articulos[$i][7]),1,0,"C");
		$lobjPdf->Cell(60,6,utf8_decode($row_articulos[$i][5]),1,0,"C");
   	 	$lobjPdf->Ln(6);
		
	}
   $lobjPdf->Output(); 
?>