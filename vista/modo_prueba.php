<?php
	session_start();
<<<<<<< HEAD
/*
=======

>>>>>>> caidv2
	if($_SESSION['prueba']=='')
	{
		$_SESSION['prueba']='-prueba';
		$_SESSION['base_datos']='bd_caidv_prueba';
	}
	elseif($_SESSION['prueba']=='-prueba')
	{
		$_SESSION['prueba']='';
		$_SESSION['base_datos']='bd_caidv';
	}
<<<<<<< HEAD
*/
=======

>>>>>>> caidv2
	header('location: intranet.php');
?>