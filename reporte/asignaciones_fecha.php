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
   include_once("../clases/clase_asignacion2.php");
   ob_end_clean();
   require_once("../libreria/fpdf/clsFpdf.php");
    require_once("../clases/clase_bitacora.php");
   require_once('../libreria/utilidades.php');
   require_once('../libreria/uuid.php');
   $lobjBitacora=new clsBitacora;
   $lobjUtil=new clsUtil;
   //$ObjLapso = new clsLapso();
   //$ObjCurso = new clsCurso();
   $d = new clsAsignacion();
    $lobjPdf=new clsFpdf();
   $lcReal_ip=$lobjUtil->get_real_ip();
    $ldFecha=date('Y-m-d h:m');
    
   $lobjPdf->AliasNbPages();
   $lobjPdf->codigo=UUID::v4();
   $lobjPdf->AddPage("L","Legal");
   $lobjPdf->SetFont("arial","B",12);
   $IdLapso=(isset($_GET['idlapso']))?$_GET['idlapso']:'';
   	//$lobjBitacora->set_Datos($_SERVER['HTTP_REFERER'],$ldFecha,$lcReal_ip,'Reporte','-','Historial','-',$lobjPdf->codigo,$IdLapso,$_SESSION['usuario'],'historial_donacion'); //envia los datos a la clase bitacora
   	//$lobjBitacora->registrar_bitacora();//registra los datos en la tabla tbitacora.
   	//$ObjLapso->set_Lapso($IdLapso);
   	//$ObjCurso->set_Lapso($IdLapso);
	//$row_detalle=$ObjLapso->historial_lapso();
	//$row_lapso=$ObjLapso->consultar_lapso_bitacora();
	//row_cursos=$ObjCurso->historial_cursos();

   
   $lobjPdf->Ln(10);
	$d->fecha_asignacion=$_POST["fecha_i"];
	$d->fecha_fin=$_POST["fecha_f"];
	$fecha_i=explode("-", $_POST["fecha_i"]);
	$fecha_f=explode("-", $_POST["fecha_f"]);

   if($_POST["fecha_i"]!="" && $_POST["fecha_f"]=="" ){
   	$lobjPdf->Cell(0,6,utf8_decode("HISTORIAL DEL ASIGNACIONES DESDE LA FECHA: ".$fecha_i[2]."/".$fecha_i[1]."/".$fecha_i[0]),0,1,"C");	
   }else if($_POST["fecha_i"]!="" && $_POST["fecha_f"]!=""){
   	$lobjPdf->Cell(0,6,utf8_decode("HISTORIAL DEL ASIGNACIONES ENTRE LAS FECHAS: ".$fecha_i[2]."/".$fecha_i[1]."/".$fecha_i[0]." - ".$fecha_f[2]."/".$fecha_f[1]."/".$fecha_f[0]),0,1,"C");	
   }else{
   	$lobjPdf->Cell(0,6,utf8_decode("HISTORIAL DEL ASIGNACIONES"),0,1,"C");	
   }
   	$lobjPdf->Cell(65);
    $lobjPdf->Cell(40,6,utf8_decode('Nro de asignacion'),1,0,"C"); 
	$lobjPdf->Cell(27,6,utf8_decode('Usuario'),1,0,"C");
	$lobjPdf->Cell(80,6,utf8_decode('Asignado'),1,0,"C");
	$lobjPdf->Cell(23,6,utf8_decode('Fecha'),1,0,"C");
	$lobjPdf->Cell(25,6,utf8_decode('Estado'),1,1,"C");
  
	
	$r=$d->consultar_reporte();
	//echo $r;
	//$lobjPdf->Ln(6);
		$lobjPdf->SetFont("arial","",9);
		for($i=0;$i<count($r);$i++)
		{
			$lobjPdf->Cell(65);
			$lobjPdf->Cell(40,6,utf8_decode($r[$i]["idAsignacion"]),1,0,"C"); 
			$lobjPdf->Cell(27,6,utf8_decode($r[$i]["idusuario"]),1,0,"C");
			$lobjPdf->Cell(80,6,utf8_decode($r[$i]["cedula"]." ".$r[$i]["primer_nombre"]." ".$r[$i]["primer_apellido"]),1,0,"C");
			$lobjPdf->Cell(23,6,utf8_decode($r[$i]["fecha_a"]),1,0,"C");	
			$lobjPdf->Cell(25,6,utf8_decode($r[$i]["estatus_a"]),1,1,"C");	
		}

	
   $lobjPdf->Output(); 
?>