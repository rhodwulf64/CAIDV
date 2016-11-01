<?php
	require_once('../nucleo/ModeloConect.php');
	class clsPersona extends ModeloConect
	{
		private $lccedula;
		private $lcnombreunoper;
		private $lcNacionalidad;
		private $lcnombredosper;
		private $lcapellidounoper;
		private $lcapellidodosper;
		private $lcsexoper;
		private $lcdireccionper;
		private $lcTelefono;
		private $lcEstatus;
		private $lcidasignatura;


		function set_Persona($pccedula)
		{
			$this->lccedula=$pccedula;
		}

		function set_Nacionalidad($pcNacionalidad)
		{
			$this->lcNacionalidad=$pcNacionalidad;
		}

		function set_nombre_per($pcnombreunoper)
		{
			$this->lcnombreunoper=$pcnombreunoper;
		}

		function set_nombre2_per($pcnombredosper)
		{
			$this->lcnombredosper=$pcnombredosper;
		}

		function set_apellido_per($pcapellidounoper)
		{
			$this->lcapellidounoper=$pcapellidounoper;
		}

		function set_apellido2_per($pcapellidodosper)
		{
			$this->lcapellidodosper=$pcapellidodosper;
		}

		function set_Sexo($pcsexoper)
		{
			$this->lcsexoper=$pcsexoper;
		}

		function set_Direccion($pcdireccionper)
		{
			$this->lcdireccionper=$pcdireccionper;
		}

		function set_Telefono($pcTelefono)
		{
			$this->lcTelefono=$pcTelefono;
		}

		function set_Estatus($pcEstatus)
		{
			$this->lcEstatus=$pcEstatus;
		}
		function set_cod_tdepartamento($pcidasignatura)
		{
			$this->lcidasignatura=$pcidasignatura;
		}

		function consultar_personas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT tpersonal.idpersonal,nombreunoper,nombredosper,apellidounoper,apellidodosper,sexoper,telefonoper,direccionper,estatusper FROM tpersonal";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idpersonal'];
					$Fila[$cont][1]=$laRow['nombreunoper'];
					$Fila[$cont][2]=$laRow['nombredosper'];
					$Fila[$cont][3]=$laRow['apellidounoper'];
					$Fila[$cont][4]=$laRow['apellidodosper'];
					$Fila[$cont][5]=$laRow['sexoper'];
					$Fila[$cont][6]=$laRow['telefonoper'];
					$Fila[$cont][7]=$laRow['direccionper'];
					$Fila[$cont][8]=$laRow['nombre_dep'];
					$Fila[$cont][9]=$laRow['estatus'];

					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_personas_inactivos()
			{
			$this->conectar();
			$cont=0;
				$sql="SELECT tpersonal.idpersonal,nombreunoper,nombredosper,apellidounoper,apellidodosper,sexoper,telefonoper,direccionper,estatus FROM tpersonal";				
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idpersonal'];
					$Fila[$cont][1]=$laRow['nombreunoper'];
					$Fila[$cont][2]=$laRow['nombredosper'];
					$Fila[$cont][3]=$laRow['apellidounoper'];
					$Fila[$cont][4]=$laRow['apellidodosper'];
					$Fila[$cont][5]=$laRow['sexoper'];
					$Fila[$cont][6]=$laRow['telefonoper'];
					$Fila[$cont][7]=$laRow['direccionper'];
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
				$sql="SELECT tpersonal.idpersonal,nombreunoper,nombredosper,apellidounoper,apellidodosper,sexoper,telefonoper,direccionper,tpersonal.estatus FROM tpersonal WHERE tpersonal.idpersonal='$this->lccedula'";
				$pcsql=$this->filtro($sql);
				
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idpersonal'];
					$Fila[1]=$laRow['nombreunoper'];
					$Fila[2]=$laRow['nombredosper'];
					$Fila[3]=$laRow['apellidounoper'];
					$Fila[4]=$laRow['apellidodosper'];					
					$Fila[5]=$laRow['sexoper'];
					$Fila[6]=$laRow['telefonoper'];
					$Fila[7]=$laRow['direccionper'];
					$Fila[8]=$laRow['nombre_dep'];
					$Fila[9]=$laRow['estatus'];
					$Fila[10]=$laRow['idasignatura'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function listado_Persona_diagnostico()
		{
			$cont=0;
			$this->conectar();
			$sql="SELECT *,date_format(fechanacimientodoc,'%d-%m-%Y') AS fechanacimientodoc,(YEAR(CURDATE())-YEAR(fechanacimientodoc))-(RIGHT(CURDATE(),5)<RIGHT(fechanacimientodoc,5))AS edad FROM tpersonal WHERE tdiagnostico_iddiagnostico='$this->lcDiagnostico'";
			$pcsql=$this->filtro($sql);
			
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['idpersonal'];
				$Fila[$cont][1]=$laRow['nombreunoper'];
				$Fila[$cont][2]=$laRow['nombredosper'];
				$Fila[$cont][3]=$laRow['apellidounoper'];
				$Fila[$cont][4]=$laRow['apellidodosper'];
				$Fila[$cont][5]=$laRow['sexoper'];
				$Fila[$cont][6]=$laRow['fechanacimientodoc'];
				$Fila[$cont][7]=$laRow['direccionper'];
				$Fila[$cont][8]=$laRow['telefonoper'];
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
				$sql="SELECT * FROM tpersonal WHERE idpersonal='$this->lccedula'";
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
				`tpersonal`(`idpersonal`,`nacionalidad`, `nombreunoper`, `nombredosper`, `apellidounoper`, `apellidodosper`, `sexoper`, `direccionper`, `telefonoper`,`idasignatura`) 
				VALUES 
				('$this->lccedula','$this->lcNacionalidad',UPPER('$this->lcnombreunoper'),UPPER('$this->lcnombredosper'),UPPER('$this->lcapellidounoper'),
					UPPER('$this->lcapellidodosper'),'$this->lcsexoper',UPPER('$this->lcdireccionper'),'$this->lcTelefono','$this->lcidasignatura')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_Persona()
		{
			$this->conectar();
			$sql="UPDATE tpersonal SET estatus='0' WHERE idpersonal='$this->lccedula' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_Persona()
		{
			$this->conectar();
			$sql="UPDATE tpersonal SET estatus='1' WHERE idpersonal='$this->lccedula' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function editar_Persona()
		{
			$this->conectar();
			$sql="UPDATE `tpersonal` 
				SET nacionalidad='$this->lcNacionalidad', `nombreunoper`=UPPER('$this->lcnombreunoper'),`nombredosper`=UPPER('$this->lcnombredosper'),`apellidounoper`=UPPER('$this->lcapellidounoper')
				,`apellidodosper`=UPPER('$this->lcapellidodosper'),`sexoper`='$this->lcsexoper',`direccionper`=UPPER('$this->lcdireccionper'),`telefonoper`='$this->lcTelefono', `idasignatura`='$this->lcidasignatura' WHERE idpersonal='$this->lccedula'";
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