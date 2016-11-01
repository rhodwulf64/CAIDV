<?php
	require_once('../nucleo/ModeloConect.php');
	class clsAsignacion extends ModeloConect
	{
		private $idAsignacion,$idusuaro,$idAsignado,$id_motivo_mov,$fecha_asignacion,$observacion,$estatus,/*PARA EL REPORTE->*/$fecha_fin;
		//DETALLE
		private $idArticulo,$serial_factura,$cantidad;
		function __set($var,$val){
			$this->$var=strtoupper($val);
		}		
		function __get($var){
			return $this->$var;
		}
		

		function consultar_asignaciones()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT *,DATE_FORMAT(a.fecha_asignacion,'%d-%m-%Y') AS fecha_a,a.estatus AS estatus_a FROM am_tasignacion a 
						INNER JOIN motivobn m ON a.id_motivo_mov=m.id_motivo_mov ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idAsignacion'];
					$Fila[$cont][1]=$laRow['idusuario'];
					$sql2="SELECT * FROM tpersonal WHERE idpersonal='".$laRow['idAsignado']."'";
					$pcsql2=$this->filtro($sql2);
					if($laRow2=$this->proximo($pcsql2)){
						$Fila[$cont][2]=$laRow2['nombreunoper']." ".$laRow2['nombredosper']." ".$laRow2['apellidounoper']." ".$laRow2['apellidodosper'];
					}
					$sql2="SELECT * FROM tparticipante WHERE cedulapar='".$laRow['idAsignado']."'";
					$pcsql2=$this->filtro($sql2);
					if($laRow2=$this->proximo($pcsql2)){
						$Fila[$cont][2]=$laRow2['nombreunopar']." ".$laRow2['nombredospar']." ".$laRow2['apellidounopar']." ".$laRow2['apellidodospar'];
					}
					$Fila[$cont][3]=$laRow['des_motivo_mov'];
					$Fila[$cont][4]=$laRow['fecha_a'];
					$Fila[$cont][5]=$laRow['estatus_a'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_motivo()
		{
			$this->conectar();
				$sql="SELECT * FROM motivobn WHERE status='1';";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[]=$laRow;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_persona()
		{
			$this->conectar();
				$sql="SELECT nacionalidadper as nacionalidad,idpersonal as idAsignado, CONCAT(nombreunoper,' ',nombredosper,' ',apellidounoper,' ',apellidodosper) as nombre FROM tpersonal WHERE idpersonal!='0' AND estatusper='1';";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[]=$laRow;
				}

				$sql="SELECT nacionalidadpar as nacionalidad,cedulapar as idAsignado, CONCAT(nombreunopar,' ',nombredospar,' ',apellidounopar,' ',apellidodospar) as nombre FROM tparticipante WHERE  estatuspar='1';";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[]=$laRow;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function buscar_cantidad(){
			$this->conectar();
				$sql="SELECT cantidad FROM am_tarticulo WHERE idArticulo='$this->idArticulo';";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[]=$laRow;
				}
			
			$this->desconectar();
			return $Fila;

		}
		function registrar_asignacion(){
			$this->conectar();
			$query=$this->filtro("SELECT cantidad,idArticulo FROM am_tdasignacion WHERE idAsignacion='$this->idAsignacion'");
			while($a=$this->proximo($query)){
				$this->ejecutar("UPDATE am_tarticulo SET cantidad=cantidad+".$a["cantidad"]." WHERE idArticulo='".$a["idArticulo"]."'; "); 
			}
			$this->ejecutar("DELETE FROM am_tasignacion WHERE idAsignacion='$this->idAsignacion'");
			$sql="INSERT INTO am_tasignacion (idusuario,idAsignado,id_motivo_mov,fecha_asignacion,observacion,estatus) VALUES ('".$_SESSION['usuario']."','$this->idAsignado','$this->id_motivo_mov',NOW(),'$this->observacion','1')";
			$lnHecho=$this->ejecutar($sql);			
			$query=$this->filtro("SELECT MAX(idAsignacion) AS id FROM am_tasignacion");
			if($a=$this->proximo($query)){
				$this->idAsignacion = $a["id"];
			}

			$this->desconectar();
			return $this->idAsignacion;
		}
		function registrar_asignacion_detalle()
		{
			$this->conectar();
			$sql="INSERT INTO am_tdasignacion (idAsignacion,idArticulo,cantidad) VALUES ('$this->idAsignacion','$this->idArticulo','$this->cantidad')";
			$lnHecho=$this->ejecutar($sql);
			$this->ejecutar("UPDATE am_tarticulo SET cantidad=cantidad-$this->cantidad WHERE idArticulo='$this->idArticulo' ");			
			$this->desconectar();
			return $lnHecho;
		}
		function consultar_asignacion_id()
		{
			$this->conectar();
				$sql="SELECT *,DATE_FORMAT(a.fecha_asignacion,'%d-%m-%Y') AS fecha_a,a.estatus AS estatus_a FROM am_tasignacion a 
				 WHERE a.idAsignacion='$this->idAsignacion'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idAsignacion'];
					$Fila[1]=$laRow['idusuario'];
					$Fila[2]=$laRow['idAsignado'];
					$Fila[3]=$laRow['id_motivo_mov'];
					$Fila[4]=$laRow['fecha_a'];
					$Fila[5]=$laRow['observacion'];
					$Fila[6]=$laRow['estatus_a'];
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_asignacion_detalle_id()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT *,dd.cantidad AS cantidad_dd FROM am_tdasignacion dd INNER JOIN am_tarticulo a ON dd.idArticulo=a.idArticulo WHERE dd.idAsignacion='$this->idAsignacion' ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['nombre'];
					$Fila[$cont][1]=$laRow['cantidad_dd'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_reporte()
		{
			$this->conectar();
				$sql="SELECT *,DATE_FORMAT(d.fecha_asignacion,'%d-%m-%Y') AS fecha_a, CASE d.estatus WHEN '1' THEN 'ACTIVO' ELSE 'INACTIVO' END AS estatus_a FROM am_tasignacion d
				INNER JOIN motivobn m ON d.id_motivo_mov=m.id_motivo_mov";
				
					if($this->fecha_asignacion!="" && $this->fecha_fin!="" ){
						$sql.=" WHERE d.fecha_asignacion BETWEEN '".$this->fecha_asignacion."' AND '".$this->fecha_fin."' ;";
					}else if($this->fecha_asignacion!=""){
						$sql.=" WHERE d.fecha_asignacion BETWEEN '".$this->fecha_asignacion."' AND '".DATE("Y-m-d")."' ;";
					}
				
				//echo $sql;
				$pcsql=$this->filtro($sql);
				$i=0;
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$i]["idAsignacion"]=$laRow['idAsignacion'];
					$Fila[$i]["idusuario"]=$laRow['idusuario'];
					$sql2="SELECT *,nacionalidadper as nacionalidad,idpersonal as idAsignado FROM tpersonal WHERE idpersonal='".$laRow['idAsignado']."';";
					$pcsql2=$this->filtro($sql2);
					if($laRow2=$this->proximo($pcsql2))
					{
						$Fila[$i]['cedula']=$laRow2['nacionalidad'].$laRow2['idAsignado'];
						$Fila[$i]['primer_nombre']=$laRow2['nombreunoper'];
						$Fila[$i]['primer_apellido']=$laRow2['apellidounoper'];
					}

					$sql2="SELECT *,nacionalidadpar as nacionalidad,cedulapar as idAsignado FROM tparticipante WHERE cedulapar='".$laRow['idAsignado']."';";
					$pcsql2=$this->filtro($sql2);
					if($laRow2=$this->proximo($pcsql2))
					{
						$Fila[$i]['cedula']=$laRow2['nacionalidad'].$laRow2['idAsignado'];
						$Fila[$i]['primer_nombre']=$laRow2['nombreunopar'];
						$Fila[$i]['primer_apellido']=$laRow2['apellidounopar'];
					}
					$Fila[$i]["des_motivo_mov"]=$laRow["des_motivo_mov"];
					$Fila[$i]["fecha_a"]=$laRow['fecha_a'];
					$Fila[$i]["estatus_a"]=$laRow['estatus_a'];
					$i++;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_reporte_id()
		{
			$this->conectar();
				$sql="SELECT *,DATE_FORMAT(d.fecha_asignacion,'%d-%m-%Y') AS fecha_a, CASE d.estatus WHEN '1' THEN 'ACTIVO' ELSE 'INACTIVO' END AS estatus_a FROM am_tasignacion d
				INNER JOIN motivobn m ON d.id_motivo_mov=m.id_motivo_mov WHERE d.idAsignacion='".$this->idAsignacion."';";
				
				//echo $sql;
				$pcsql=$this->filtro($sql);
				$i=0;
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$i]["idAsignacion"]=$laRow['idAsignacion'];
					$Fila[$i]["idusuario"]=$laRow['idusuario'];
					$sql2="SELECT *,nacionalidadper as nacionalidad,idpersonal as idAsignado FROM tpersonal WHERE idpersonal='".$laRow['idAsignado']."';";
					$pcsql2=$this->filtro($sql2);
					if($laRow2=$this->proximo($pcsql2))
					{
						$Fila[$i]['cedula']=$laRow2['nacionalidad'].$laRow2['idAsignado'];
						$Fila[$i]['primer_nombre']=$laRow2['nombreunoper'];
						$Fila[$i]['primer_apellido']=$laRow2['apellidounoper'];
					}

					$sql2="SELECT *,nacionalidadpar as nacionalidad,cedulapar as idAsignado FROM tparticipante WHERE cedulapar='".$laRow['idAsignado']."';";
					$pcsql2=$this->filtro($sql2);
					if($laRow2=$this->proximo($pcsql2))
					{
						$Fila[$i]['cedula']=$laRow2['nacionalidad'].$laRow2['idAsignado'];
						$Fila[$i]['primer_nombre']=$laRow2['nombreunopar'];
						$Fila[$i]['primer_apellido']=$laRow2['apellidounopar'];
					}
					$Fila[$i]["des_motivo_mov"]=$laRow["des_motivo_mov"];
					$Fila[$i]["fecha_a"]=$laRow['fecha_a'];
					$Fila[$i]["estatus_a"]=$laRow['estatus_a'];
					$i++;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function eliminar_asignacion()
		{
			$this->conectar();
			$sql="UPDATE am_tasignacion SET estatus='0' WHERE idAsignacion='$this->idAsignacion' ";
			$query=$this->filtro("SELECT cantidad,idArticulo FROM am_tdasignacion WHERE idAsignacion='$this->idAsignacion'");
			while($a=$this->proximo($query)){
				$this->ejecutar("UPDATE am_tarticulo SET cantidad=cantidad+".$a["cantidad"]." WHERE idArticulo='".$a["idArticulo"]."'; "); 
			}
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_asignacion()
		{
			$this->conectar();
			$sql="UPDATE am_tasignacion SET estatus='1' WHERE idAsignacion='$this->idAsignacion' ";
			$query=$this->filtro("SELECT cantidad,idArticulo FROM am_tdasignacion WHERE idAsignacion='$this->idAsignacion'");
			while($a=$this->proximo($query)){
				$this->ejecutar("UPDATE am_tarticulo SET cantidad=cantidad-".$a["cantidad"]." WHERE idArticulo='".$a["idArticulo"]."'; "); 
			}
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}



























		
		function registrar_donacion()
		{
			$this->conectar();
			$query=$this->filtro("SELECT cantidad,idArticulo FROM am_tddonacion WHERE idDonacion='$this->idDonacion'");
			while($a=$this->proximo($query)){
				$this->ejecutar("UPDATE am_tarticulo SET cantidad=cantidad-".$a["cantidad"]." WHERE idArticulo='".$a["idArticulo"]."'; "); 
			}
			$this->ejecutar("DELETE FROM am_tdonacion WHERE idDonacion='$this->idDonacion'");
			$sql="INSERT INTO am_tdonacion (idPersona,idEmpresa,fecha_donacion,estatus) VALUES ('$this->idPersona','$this->idEmpresa',NOW(),'1')";
			$lnHecho=$this->ejecutar($sql);			
			$query=$this->filtro("SELECT MAX(idDonacion) AS id FROM am_tdonacion");
			if($a=$this->proximo($query)){
				$this->idDonacion = $a["id"];
			}

			$this->desconectar();
			return $this->idDonacion;
		}
		
		function eliminar_donacion()
		{
			$this->conectar();
			$sql="UPDATE am_tdonacion SET estatus='0' WHERE idDonacion='$this->idDonacion' ";
			$query=$this->filtro("SELECT cantidad,idArticulo FROM am_tddonacion WHERE idDonacion='$this->idDonacion'");
			while($a=$this->proximo($query)){
				$this->ejecutar("UPDATE am_tarticulo SET cantidad=cantidad-".$a["cantidad"]." WHERE idArticulo='".$a["idArticulo"]."'; "); 
			}
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_donacion()
		{
			$this->conectar();
			$sql="UPDATE am_tdonacion SET estatus='1' WHERE idDonacion='$this->idDonacion' ";
			$query=$this->filtro("SELECT cantidad,idArticulo FROM am_tddonacion WHERE idDonacion='$this->idDonacion'");
			while($a=$this->proximo($query)){
				$this->ejecutar("UPDATE am_tarticulo SET cantidad=cantidad+".$a["cantidad"]." WHERE idArticulo='".$a["idArticulo"]."'; "); 
			}
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function consultar_empresa_id()
		{
			$this->conectar();
				$sql="SELECT * FROM am_tempresa WHERE idEmpresa='$this->idEmpresa';";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[]=$laRow;
				}
			
			$this->desconectar();
			return $Fila;
		}
		
		function consultar_persona_id()
		{
			$this->conectar();
				$sql="SELECT * FROM am_tpersona WHERE idPersona='$this->idPersona';";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[]=$laRow;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_articulo()
		{
			$this->conectar();
				$sql="SELECT * FROM am_tarticulo WHERE estatus='1';";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[]=$laRow;
				}
			
			$this->desconectar();
			return $Fila;
		}
		/*function consultar_reporte()
		{
			$this->conectar();
				$sql="SELECT *,DATE_FORMAT(d.fecha_donacion,'%d-%m-%Y') AS fecha_a, CASE d.estatus WHEN '1' THEN 'ACTIVO' ELSE 'INACTIVO' END AS estatus_d FROM am_tdonacion d 
				INNER JOIN am_tpersona p ON d.idPersona=p.idPersona
				INNER JOIN am_tempresa e ON d.idEmpresa=e.idEmpresa ";
				if($this->idPersona!="0" || $this->idEmpresa!="0"){
					if($this->fecha_donacion!="" && $this->fecha_fin!="" ){
						$sql.=" WHERE d.idPersona='".$this->idPersona."' OR d.idEmpresa='".$this->idEmpresa."' AND d.fecha_donacion BETWEEN '".$this->fecha_donacion."' AND '".$this->fecha_fin."' ";
					}else if($this->fecha_donacion!=""){
						$sql.=" WHERE d.idPersona='".$this->idPersona."' OR d.idEmpresa='".$this->idEmpresa."' AND d.fecha_donacion BETWEEN '".$this->fecha_donacion."' AND '".DATE("Y-m-d")."' ";
					}else{
						$sql.=" WHERE d.idPersona='".$this->idPersona."' OR d.idEmpresa='".$this->idEmpresa."' ";
					}
					
				}else{
					if($this->fecha_donacion!="" && $this->fecha_fin!="" ){
						$sql.=" WHERE d.fecha_donacion BETWEEN '".$this->fecha_donacion."' AND '".$this->fecha_fin."' ";
					}else if($this->fecha_donacion!=""){
						$sql.=" WHERE d.fecha_donacion BETWEEN '".$this->fecha_donacion."' AND '".DATE("Y-m-d")."' ";
					}
				}
				//echo $sql;
				$pcsql=$this->filtro($sql);
				$i=0;
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$i]["idDonacion"]=$laRow['idDonacion'];
					$Fila[$i]["cedula"]=$laRow['cedula'];
					$Fila[$i]["primer_nombre"]=$laRow['primer_nombre'];
					$Fila[$i]["primer_apellido"]=$laRow['primer_apellido'];
					$Fila[$i]["rif"]=$laRow['rif'];
					$Fila[$i]["nombre"]=$laRow['nombre'];
					$Fila[$i]["fecha_a"]=$laRow['fecha_a'];
					$Fila[$i]["estatus_d"]=$laRow['estatus_d'];
					$i++;
				}
			
			$this->desconectar();
			return $Fila;
		}*/
		/*function consultar_reporte_id()
		{
			$this->conectar();
				$sql="SELECT *,DATE_FORMAT(d.fecha_donacion,'%d-%m-%Y') AS fecha_a, CASE d.estatus WHEN '1' THEN 'ACTIVO' ELSE 'INACTIVO' END AS estatus_d FROM am_tdonacion d 
				INNER JOIN am_tpersona p ON d.idPersona=p.idPersona
				INNER JOIN am_tempresa e ON d.idEmpresa=e.idEmpresa WHERE d.idDonacion='$this->idDonacion'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila["idDonacion"]=$laRow['idDonacion'];
					$Fila["cedula"]=$laRow['cedula'];
					$Fila["primer_nombre"]=$laRow['primer_nombre'];
					$Fila["primer_apellido"]=$laRow['primer_apellido'];
					$Fila["rif"]=$laRow['rif'];
					$Fila["nombre"]=$laRow['nombre'];
					$Fila["fecha_a"]=$laRow['fecha_a'];
					$Fila["estatus_d"]=$laRow['estatus_d'];
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_reporte_detalle_id()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT *,dd.cantidad AS cantidad_dd FROM am_tddonacion dd INNER JOIN am_tarticulo a ON dd.idArticulo=a.idArticulo WHERE dd.idDonacion='$this->idDonacion' ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idArticulo'];
					$Fila[$cont]["nombre"]=$laRow['nombre'];
					$Fila[$cont]["serial_factura"]=$laRow['serial_factura'];
					$Fila[$cont]["cantidad"]=$laRow['cantidad_dd'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}*/
	}
?>