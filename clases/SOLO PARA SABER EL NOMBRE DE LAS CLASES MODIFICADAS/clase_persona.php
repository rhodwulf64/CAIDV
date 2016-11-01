<?php
	require_once('../nucleo/ModeloConect.php');
	class clsPersona extends ModeloConect
	{
		private $lccedula;
		private $lcnombre_per;
		private $lcNacionalidad;
		private $lcnombre2_per;
		private $lcapellido_per;
		private $lcapellido2_per;
		private $lcSexo;
		private $lcDireccion;
		private $lcTelefono;
		private $lcEstatus;
		private $lccod_tdepartamento;


		function set_Persona($pccedula)
		{
			$this->lccedula=$pccedula;
		}

		function set_Nacionalidad($pcNacionalidad)
		{
			$this->lcNacionalidad=$pcNacionalidad;
		}

		function set_nombre_per($pcnombre_per)
		{
			$this->lcnombre_per=$pcnombre_per;
		}

		function set_nombre2_per($pcnombre2_per)
		{
			$this->lcnombre2_per=$pcnombre2_per;
		}

		function set_apellido_per($pcapellido_per)
		{
			$this->lcapellido_per=$pcapellido_per;
		}

		function set_apellido2_per($pcapellido2_per)
		{
			$this->lcapellido2_per=$pcapellido2_per;
		}

		function set_Sexo($pcSexo)
		{
			$this->lcSexo=$pcSexo;
		}

		function set_Direccion($pcDireccion)
		{
			$this->lcDireccion=$pcDireccion;
		}

		function set_Telefono($pcTelefono)
		{
			$this->lcTelefono=$pcTelefono;
		}

		function set_Estatus($pcEstatus)
		{
			$this->lcEstatus=$pcEstatus;
		}
		function set_cod_tdepartamento($pccod_tdepartamento)
		{
			$this->lccod_tdepartamento=$pccod_tdepartamento;
		}

		function consultar_personas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT tpersona.cedula,nombre_per,nombre2_per,apellido_per,apellido2_per,sexo,tlf,direccion,tdepartamento.nombre_dep,tpersona.estatus,tdepartamento.cedula as cedula2 FROM tpersona,tdepartamento WHERE tpersona.estatus='1' and tdepartamento.cod_tdepartamento=tpersona.cod_tdepartamento";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['cedula'];
					$Fila[$cont][1]=$laRow['nombre_per'];
					$Fila[$cont][2]=$laRow['nombre2_per'];
					$Fila[$cont][3]=$laRow['apellido_per'];
					$Fila[$cont][4]=$laRow['apellido2_per'];
					$Fila[$cont][5]=$laRow['sexo'];
					$Fila[$cont][6]=$laRow['tlf'];
					$Fila[$cont][7]=$laRow['direccion'];
					$Fila[$cont][8]=$laRow['nombre_dep'];
					$Fila[$cont][9]=$laRow['estatus'];
					$Fila[$cont][10]=$laRow['cedula2'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_personas_inactivos()
			{
			$this->conectar();
			$cont=0;
				$sql="SELECT tpersona.cedula,nombre_per,nombre2_per,apellido_per,apellido2_per,sexo,tlf,direccion,tdepartamento.nombre_dep,tpersona.estatus FROM tpersona,tdepartamento where tdepartamento.cod_tdepartamento=tpersona.cod_tdepartamento";				
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['cedula'];
					$Fila[$cont][1]=$laRow['nombre_per'];
					$Fila[$cont][2]=$laRow['nombre2_per'];
					$Fila[$cont][3]=$laRow['apellido_per'];
					$Fila[$cont][4]=$laRow['apellido2_per'];
					$Fila[$cont][5]=$laRow['sexo'];
					$Fila[$cont][6]=$laRow['tlf'];
					$Fila[$cont][7]=$laRow['direccion'];
					$Fila[$cont][8]=$laRow['nombre_dep'];
					$Fila[$cont][9]=$laRow['estatus'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_persona()
		{
			$this->conectar();
				$sql="SELECT tpersona.cedula,nombre_per,nombre2_per,apellido_per,apellido2_per,sexo,tlf,direccion,tdepartamento.nombre_dep,tpersona.estatus,tpersona.cod_tdepartamento WHERE tpersona.cedula='$this->lccedula' and tdepartamento.cod_tdepartamento=tpersona.cod_tdepartamento";
				$pcsql=$this->filtro($sql);
				
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['cedula'];
					$Fila[1]=$laRow['nombre_per'];
					$Fila[2]=$laRow['nombre2_per'];
					$Fila[3]=$laRow['apellido_per'];
					$Fila[4]=$laRow['apellido2_per'];					
					$Fila[5]=$laRow['sexo'];
					$Fila[6]=$laRow['tlf'];
					$Fila[7]=$laRow['direccion'];
					$Fila[8]=$laRow['nombre_dep'];
					$Fila[9]=$laRow['estatus'];
					$Fila[10]=$laRow['cod_tdepartamento'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function listado_Persona_diagnostico()
		{
			$cont=0;
			$this->conectar();
			$sql="SELECT *,date_format(fechanacimientodoc,'%d-%m-%Y') AS fechanacimientodoc,(YEAR(CURDATE())-YEAR(fechanacimientodoc))-(RIGHT(CURDATE(),5)<RIGHT(fechanacimientodoc,5))AS edad FROM tPersona WHERE tdiagnostico_iddiagnostico='$this->lcDiagnostico'";
			$pcsql=$this->filtro($sql);
			
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['cedula'];
				$Fila[$cont][1]=$laRow['nombre_per'];
				$Fila[$cont][2]=$laRow['nombre2_per'];
				$Fila[$cont][3]=$laRow['apellido_per'];
				$Fila[$cont][4]=$laRow['apellido2_per'];
				$Fila[$cont][5]=$laRow['sexo'];
				$Fila[$cont][6]=$laRow['fechanacimientodoc'];
				$Fila[$cont][7]=$laRow['direccion'];
				$Fila[$cont][8]=$laRow['tlf'];
				$Fila[$cont][9]=$laRow['titulodoc'];
				$Fila[$cont][10]=$laRow['tipodoc'];
				$Fila[$cont][11]=$laRow['estatus'];
				$Fila[$cont][12]=$laRow['tdiagnostico_iddiagnostico'];
				$Fila[$cont][13]=$laRow['tParroquia_idParroquia'];
				$Fila[$cont][14]=$laRow['nacionalidad'];
				$Fila[$cont][15]=$laRow['edad'];
				$cont++;
			}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_persona_bitacora()
		{
			$this->conectar();
				$sql="SELECT * FROM tpersona WHERE cedula='$this->lccedula'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					foreach ($laRow as $key => $value)
					{
						$Fila[$key]=$value;
					}
				}
			$this->desconectar();
			return $Fila;
		}

		function registrar_Persona()
		{
			$this->conectar();
			$sql="INSERT INTO 
				`tpersona`(`cedula`,`nacionalidad`, `nombre_per`, `nombre2_per`, `apellido_per`, `apellido2_per`, `sexo`, `direccion`, `tlf`,`cod_tdepartamento`) 
				VALUES 
				('$this->lccedula','$this->lcNacionalidad',UPPER('$this->lcnombre_per'),UPPER('$this->lcnombre2_per'),UPPER('$this->lcapellido_per'),
					UPPER('$this->lcapellido2_per'),'$this->lcSexo',UPPER('$this->lcDireccion'),'$this->lcTelefono','$this->lccod_tdepartamento')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_Persona()
		{
			$this->conectar();
			$sql="UPDATE tPersona SET estatus='0' WHERE cedula='$this->lccedula' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_Persona()
		{
			$this->conectar();
			$sql="UPDATE tPersona SET estatus='1' WHERE cedula='$this->lccedula' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function editar_Persona()
		{
			$this->conectar();
			$sql="UPDATE `tpersona` 
				SET nacionalidad='$this->lcNacionalidad', `nombre_per`=UPPER('$this->lcnombre_per'),`nombre2_per`=UPPER('$this->lcnombre2_per'),`apellido_per`=UPPER('$this->lcapellido_per')
				,`apellido2_per`=UPPER('$this->lcapellido2_per'),`sexo`='$this->lcSexo',`direccion`=UPPER('$this->lcDireccion'),`tlf`='$this->lcTelefono', `cod_tdepartamento`='$this->lccod_tdepartamento' WHERE cedula='$this->lccedula'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		protected function fecha_nacimiento($pcFecha)
		  {
		  	 $lcNow=date("Y-m-d");
		  	 if (strlen($pcFecha)==10)
		  	 {
		  	 	$lcDia=substr($pcFecha,0,2);
		  	 	$lcMes=substr($pcFecha,3,2);
		  	 	$lcAno=substr($pcFecha,6,4);
		  	 	$lcNow=$lcAno."-".$lcMes."-".$lcDia;
		  	 }
		  	 return $lcNow;
		  }
	}
?>