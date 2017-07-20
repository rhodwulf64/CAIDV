<?php
	$bie=array();
	if($_GET['o']==1){
		include_once("../../clases/update2017/clase_graficaco.php");
		$loGrafica=new clsGraficaCo;
		$rs=$loGrafica->listararticulo();
		$bie=array();
		if($loGrafica->contar($rs)>0){
			$bie=array();
			while($tupla=$loGrafica->converArray($rs)){
				$id=$tupla[0];
				$de=$tupla[1];
				$t=$tupla[5];
				$bie['nombre'][]=$de;
				$bie['data'][]=(int)($t);
			}
		}else{
			$bie[0]=0;
		}
	}else{
		$bie[0]=0;
	}
	echo json_encode($bie);
?>