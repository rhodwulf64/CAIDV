<?php

	require_once('../nucleo/ModeloConect.php');
	class clsEntereceptor extends ModeloConect
	{
		private $lcIDprincipal;
		private $RazonSocial;
		private $Rif;
		private $Telefono;
		private $lcItem;
		private $lcEspacio;
		private $lcEEstatus;

		function set_IDprincipal($pcIDmotivo)
		{
			$this->lcIDprincipal=$pcIDmotivo;
		}

		function set_RazonSocial($pcRazonSocial)
		{
			$this->RazonSocial=$pcRazonSocial;
		}

		function set_Rif($pcDescrip)
		{
			$this->Rif=$pcDescrip;
		}

		function set_Telefono($pcDatos)
		{
			$this->Telefono=$pcDatos;
		}

		function set_Espacio($pcEspacio)
		{
			$this->lcEspacio=$pcEspacio;
		}

		function set_EEstatus($pcEEstatus)
		{
			$this->lcEEstatus=$pcEEstatus;
		}



		function consultar_entereceptor()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tentesexternos` WHERE `idTentesexternos`='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idTentesexternos'];
					$Fila[1]=$laRow['Rif'];
					$Fila[2]=$laRow['Telefono'];
					$Fila[3]=$laRow['Estatus'];
					$Fila[4]=$laRow['RazonSocial'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM tentesexternos  WHERE idTentesexternos='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function consultar__entesreceptores()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tentesexternos` AND Estatus='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idTentesexternos'];
					$Fila[$cont][1]=$laRow['Rif'];
					$Fila[$cont][2]=$laRow['Telefono'];
					$Fila[$cont][3]=$laRow['Estatus'];
					$Fila[$cont][4]=$laRow['RazonSocial'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar__entesreceptores_inactivas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tentesexternos`";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idTentesexternos'];
					$Fila[$cont][1]=$laRow['Rif'];
					$Fila[$cont][2]=$laRow['Telefono'];
					$Fila[$cont][3]=$laRow['Estatus'];
					$Fila[$cont][4]=$laRow['RazonSocial'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_entereceptor_bitacora()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tpobn.idTentesexternos,
				tpobn.RazonSocial,
				tpobn.Rif,
				tpobn.Telefono,
				tpobn.Estatus
				FROM tentesexternos AS tpobn";

			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['idTentesexternos'];
				$Fila[$cont][1]=$laRow['Rif'];
				$Fila[$cont][2]=$laRow['Telefono'];
				$Fila[$cont][3]=$laRow['Estatus'];
				$Fila[$cont][4]=$laRow['RazonSocial'];
				$cont++;
			}
		
			$this->desconectar();
			return $Fila;
		}


		function consultar_entereceptor_especifico()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tpobn.idTentesexternos,
				tpobn.RazonSocial,
				tpobn.Rif,
				tpobn.Telefono,
				tpobn.Estatus 
				FROM tentesexternos AS tpobn 
				WHERE tpobn.idTentesexternos='$this->lcIDprincipal'";

			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['idTentesexternos']=$laRow['idTentesexternos'];
				$Fila['RazonSocial']=$laRow['RazonSocial'];
				$Fila['Rif']=$laRow['Rif'];
				$Fila['Telefono']=$laRow['Telefono'];
				$Fila['Estatus']=$laRow['Estatus'];
			}
		
			$this->desconectar();
			return $Fila;
		}

		function registrar_entereceptor()
		{
			$this->conectar();

			$sql="INSERT INTO `tentesexternos`(RazonSocial,`Rif`,Telefono,Estatus) 
			VALUES (UPPER('$this->RazonSocial'),UPPER('$this->Rif'),'$this->Telefono','1')";
		
			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();

			return $lnHecho;
		}

		function eliminar_entereceptor()
		{
			$this->conectar();
			$sql="UPDATE tentesexternos SET Estatus='0' WHERE idTentesexternos='$this->lcIDprincipal'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_entereceptor()
		{
			$this->conectar();
			$sql="UPDATE tentesexternos SET Estatus='1' WHERE idTentesexternos='$this->lcIDprincipal' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_entereceptor()
		{
			$this->conectar();
			$sql="UPDATE `tentesexternos` SET `RazonSocial`=UPPER('$this->RazonSocial'), `Rif`='$this->Rif', `Telefono`='$this->Telefono' WHERE idTentesexternos='$this->lcIDprincipal'";

			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();
			return $lnHecho;
		}
	}
?>