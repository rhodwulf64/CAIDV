<?php

	require_once('../nucleo/ModeloConect.php');
	class clsResponsablereceptor extends ModeloConect
	{
		private $lcIDprincipal;
		private $Nacionalidad;
		private $Cedula;
		private $NombreFull;
		private $ApellidoFull;
		private $idFenteExterno;

		function set_responsablereceptor($pcIDmotivo)
		{
			$this->lcIDprincipal=$pcIDmotivo;
		}

		function set_Nacionalidad($pcNacionalidad)
		{
			$this->Nacionalidad=$pcNacionalidad;
		}

		function set_Cedula($pcCedula)
		{
			$this->Cedula=$pcCedula;
		}

		function set_EnteExterno($pcEspacio)
		{
			$this->idFenteExterno=$pcEspacio;
		}

		function set_NombreFull($pcNombreFull)
		{
			$this->NombreFull=$pcNombreFull;
		}

		function set_ApellidoFull($pcApellidoFull)
		{
			$this->ApellidoFull=$pcApellidoFull;
		}



		function consultar_responsablereceptor()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tresponsableente` WHERE idTresponsableente='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idTresponsableente'];
					$Fila[1]=$laRow['nacionalidadper'];
					$Fila[2]=$laRow['cedula'];
					$Fila[3]=$laRow['idFenteExterno'];
					$Fila[4]=$laRow['nombrefull'];
					$Fila[5]=$laRow['apellidofull'];
					$Fila[6]=$laRow['Estatus'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM tresponsableente  WHERE idTresponsableente='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function consultar_responsablereceptores()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tresponsableente` AND Estatus='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idTresponsableente'];
					$Fila[$cont][1]=$laRow['nacionalidadper'];
					$Fila[$cont][2]=$laRow['cedula'];
					$Fila[$cont][3]=$laRow['idFenteExterno'];
					$Fila[$cont][4]=$laRow['nombrefull'];
					$Fila[$cont][5]=$laRow['apellidofull'];
					$Fila[$cont][6]=$laRow['Estatus'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_responsablereceptores_inactivas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tresponsableente`";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idTresponsableente'];
					$Fila[$cont][1]=$laRow['nacionalidadper'];
					$Fila[$cont][2]=$laRow['cedula'];
					$Fila[$cont][3]=$laRow['idFenteExterno'];
					$Fila[$cont][4]=$laRow['nombrefull'];
					$Fila[$cont][5]=$laRow['apellidofull'];
					$Fila[$cont][6]=$laRow['Estatus'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_persona()
		{
			$this->conectar();
				$sql="SELECT * FROM `tresponsableente` WHERE cedula='$this->Cedula'";
				$pcsql=$this->filtro($sql);
				
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idTresponsableente'];
					$Fila[1]=$laRow['nacionalidadper'];
					$Fila[2]=$laRow['cedula'];
					$Fila[3]=$laRow['idFenteExterno'];
					$Fila[4]=$laRow['nombrefull'];
					$Fila[5]=$laRow['apellidofull'];
					$Fila[6]=$laRow['Estatus'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_responsablereceptor_bitacora()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tpobn.idTresponsableente,
				tpobn.nacionalidadper,
				tpobn.cedula,
				tpobn.idFenteExterno,
				tpobn.nombrefull,
				tpobn.apellidofull,
				tpobn.Estatus,
				tent.RazonSocial,
				tent.Telefono AS telefonoEnte 
				FROM tresponsableente AS tpobn
				LEFT JOIN tentesexternos AS tent ON tpobn.idFenteExterno=tent.idTentesexternos
				";

			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['idTresponsableente'];
				$Fila[$cont][1]=$laRow['nacionalidadper'];
				$Fila[$cont][2]=$laRow['cedula'];
				$Fila[$cont][3]=$laRow['idFenteExterno'];
				$Fila[$cont][4]=$laRow['nombrefull'];
				$Fila[$cont][5]=$laRow['apellidofull'];
				$Fila[$cont][6]=$laRow['Estatus'];
				$Fila[$cont][7]=$laRow['RazonSocial'];
				$Fila[$cont][8]=$laRow['telefonoEnte'];
				$cont++;
			}
		
			$this->desconectar();
			return $Fila;
		}


		function consultar_responsablereceptor_especifico()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tpobn.idTresponsableente,
				tpobn.nacionalidadper,
				tpobn.cedula,
				tpobn.idFenteExterno,
				tpobn.nombrefull,
				tpobn.apellidofull,
				tpobn.Estatus 
				FROM tresponsableente AS tpobn 
				WHERE tpobn.idTresponsableente='$this->lcIDprincipal'";

			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['idTresponsableente']=$laRow['idTresponsableente'];
				$Fila['nacionalidadper']=$laRow['nacionalidadper'];
				$Fila['cedula']=$laRow['cedula'];
				$Fila['idFenteExterno']=$laRow['idFenteExterno'];
				$Fila['nombrefull']=$laRow['nombrefull'];
				$Fila['apellidofull']=$laRow['apellidofull'];
				$Fila['Estatus']=$laRow['Estatus'];
			}
		
			$this->desconectar();
			return $Fila;
		}

		function registrar_responsablereceptor()
		{
			$this->conectar();

			$sql="INSERT INTO tresponsableente (nacionalidadper,`cedula`,idFenteExterno,nombrefull,apellidofull,Estatus) 
			VALUES (UPPER('$this->Nacionalidad'),'$this->Cedula','$this->idFenteExterno',UPPER('$this->NombreFull'),UPPER('$this->ApellidoFull'),'1')";
		
			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();

			return $lnHecho;
		}

		function eliminar_responsablereceptor()
		{
			$this->conectar();
			$sql="UPDATE tresponsableente SET Estatus='0' WHERE idTresponsableente='$this->lcIDprincipal'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_responsablereceptor()
		{
			$this->conectar();
			$sql="UPDATE tresponsableente SET Estatus='1' WHERE idTresponsableente='$this->lcIDprincipal' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_responsablereceptor()
		{
			$this->conectar();
			$sql="UPDATE tresponsableente SET 
			`nacionalidadper`=UPPER('$this->Nacionalidad'), 
			`cedula`='$this->Cedula', 
			`idFenteExterno`='$this->idFenteExterno', 
			`nombrefull`=UPPER('$this->NombreFull'), 
			`apellidofull`=UPPER('$this->ApellidoFull') 
			WHERE idTresponsableente='$this->lcIDprincipal'";

			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();
			return $lnHecho;
		}
	}
?>