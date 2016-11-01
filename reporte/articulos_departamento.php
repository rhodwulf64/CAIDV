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
   $Objsalida = new clsarticulo();
     $lobjPdf=new clsFpdf();
    $ldFecha=date('Y-m-d h:m');
  $lcReal_ip=$lobjUtil->get_real_ip();
  
   $lobjPdf->AliasNbPages();
   $lobjPdf->codigo=UUID::v4();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetFont("arial","B",18);
   $cantiAsignaciones=0;
  $lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Reporte','-','id','-',$lobjPdf->codigo,$_POST["nomgrupo"],$_SESSION['usuario'],'insumos_departamento'); //envia los datos a la clase bitacora
    $lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.

   // $row_salida=$Objsalida->consultar_salida_imprimir();
   // $row_salidas=$Objsalida->consultar_detalle_finalizado();

    $row_salida=$Objsalida->consultar_insumos_departamento(strtoupper($_POST['nomgrupo']));  
    $row_salidas=$Objsalida->consultar_detalle_departamento(strtoupper($_POST['nomgrupo']));
    $cantiAsignaciones=count($row_salidas);  
  
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,utf8_decode("Consumibles Asignados Por Departamento"),0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas

  //$lobjPdf->Cell(50,30,$lobjPdf->Image('../media/img/salidas/'.$row_salida[1].'.jpg',10,64,50,30),1,1,"C");
   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Cell(200,6,utf8_decode("Datos del Departamento"),0,1,"C");
    $lobjPdf->Ln(2);
  $lobjPdf->SetFont("arial","B",12);
  $lobjPdf->Cell(50,6,utf8_decode('ID del Departamento:'),1,0,"C"); 
  $lobjPdf->SetFont("arial","",12);
  $lobjPdf->Cell(50,6,utf8_decode(number_format($row_salida[9],0,'','.')),1,0,"C");
  $lobjPdf->SetFont("arial","B",12);
  $lobjPdf->Cell(50,6,'Departamento',1,0,"C");
  $lobjPdf->SetFont("arial","",12);
  $lobjPdf->Cell(50,6,utf8_decode($row_salida[4]),1,1,"C");
  $lobjPdf->SetFont("arial","B",12);
  $lobjPdf->Cell(50,6,utf8_decode('Coordinador'),1,0,"C");
  $lobjPdf->SetFont("arial","",12);
  $lobjPdf->Cell(50,6,utf8_decode($row_salida[6].' '.$row_salida[7]),1,0,"C");
  $lobjPdf->SetFont("arial","B",12);

  $lobjPdf->Ln(12);
  $lobjPdf->SetFont("arial","B",12);
  if($cantiAsignaciones>0)
  {
    $lobjPdf->Cell(200,6,utf8_decode("Listado de Consumibles"),0,1,"C");
  }
  else
  {
    $lobjPdf->Cell(200,6,utf8_decode("No se encontraron consumibles asignados a este departamento"),0,1,"C");
  }

  for($i=0;$i<$cantiAsignaciones;$i++)
  {
    $anterior1=$row_salidas[$i][2];
    
    if ($anterior1!=$anterior2){
    $anterior2=$row_salidas[$i][2];


    $lobjPdf->Ln(12);
    $lobjPdf->SetFont("arial","B",12);
    $lobjPdf->Cell(70,6,utf8_decode('N° de Solicitud'),1,0,"C"); 
    $lobjPdf->Cell(70,6,utf8_decode('Fecha de solicitud'),1,0,"C"); 
    $lobjPdf->Cell(60,6,utf8_decode('Fecha de la asignación'),1,0,"C"); 
    $lobjPdf->Ln(6);
    $lobjPdf->SetFont("arial","",12);
    $lobjPdf->Cell(70,6,utf8_decode($row_salidas[$i][2]),1,0,"C");
    $lobjPdf->Cell(70,6,utf8_decode($row_salidas[$i][3]),1,0,"C");
    $lobjPdf->Cell(60,6,utf8_decode($row_salidas[$i][4]),1,0,"C");
    $lobjPdf->Ln(6);
      $lobjPdf->SetFont("arial","B",12);
  $lobjPdf->Cell(70,6,utf8_decode('Nombre del Consumible'),1,0,"C"); 
  $lobjPdf->Cell(70,6,utf8_decode('Cantidad solicitada'),1,0,"C");
  $lobjPdf->Cell(60,6,utf8_decode('Cantidad asignada'),1,0,"C");
    
  $lobjPdf->SetFont("arial","",12);
    $lobjPdf->Ln(6);
}

    $lobjPdf->Cell(70,6,utf8_decode($row_salidas[$i][1]),1,0,"C");
    $lobjPdf->Cell(70,6,utf8_decode($row_salidas[$i][5]),1,0,"C");
    $lobjPdf->Cell(60,6,utf8_decode($row_salidas[$i][7]),1,0,"C");
      $lobjPdf->Ln(6);
    
  }

   $lobjPdf->Output(); 
?>