<<<<<<< HEAD
<?php
function FechaFormateada($FechaStamp)
{
 $ano = date('Y',$FechaStamp);
 $mes = date('n',$FechaStamp);
 $dia = date('d',$FechaStamp);
 $diasemana = date('w',$FechaStamp);

 $diassemanaN= array("Domingo","Lunes","Martes","Miércoles",
	 "Jueves","Viernes","Sábado"); $mesesN=array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
	 "Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	 return $diassemanaN[$diasemana].", $dia de ". $mesesN[$mes] ." del $ano";
 }
 $fecha=FechaFormateada(time());

 $UltimoInicioSesion=FechaFormateada($_SESSION['ultimo_acceso'])." a las ".$_SESSION['Horaultimo_acceso'];

?>

<div style="float: left;margin-bottom:50px;" class="col-lg-10 span10 pull-left">
<h2><?php print $fecha; ?></h2>
=======
<div style="float: left;margin-bottom:50px;" class="col-lg-10 span10 pull-left">
<h2>Bienvenido al Sistema</h2>
>>>>>>> caidv2
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable">
				<tr>
<<<<<<< HEAD
					<th>Último inicio de sesión</th>
					<td><?php print $UltimoInicioSesion;?></td>
				</tr>
				<tr>
					<th>Duración de la sesión</th>
					<td><?php print $_SESSION['tiempo'];?> minutos</td>
=======
					<th>Ultimo acceso</th>
					<td><?php echo $_SESSION['ultimo_acceso'];?></td>
				</tr>
				<tr>
					<th>Tiempo de conexión</th>
					<td><?php echo $_SESSION['tiempo'];?></td>
>>>>>>> caidv2
				</tr>
			</table>
		</div>
		<div class="span6">
<<<<<<< HEAD
			<img src="../media/images/logo.jpg" style="width:100%;height:250px;" alt="">
=======
			<img src="../media/images/logo.jpg" style="width:100%;height:300px;" alt="">
>>>>>>> caidv2
		</div>
	</div>
</div>
