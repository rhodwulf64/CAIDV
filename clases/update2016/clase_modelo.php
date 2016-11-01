<?php

	require_once('../nucleo/ModeloConect.php');
	class clsModelo extends ModeloConect
	{
		private $lcIDprincipal;
		private $lcDes_moti;
		private $idFmarca;
		private $lcItem;
		private $lcEspacio;
		private $lcEstatus;

		function set_IDprincipal($pcIDmotivo)
		{
			$this->lcIDprincipal=$pcIDmotivo;
		}

		function set_Descripcion($pcDescrip)
		{
			$this->lcDes_moti=$pcDescrip;
		}

		function set_SegundoValor($pcDatos)
		{
			$this->idFmarca=$pcDatos;
		}

		function set_Espacio($pcEspacio)
		{
			$this->lcEspacio=$pcEspacio;
		}

		function set_Estatus($pcEstatus)
		{
			$this->lcEstatus=$pcEstatus;
		}



		function consultar_modelo()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `modelobn` WHERE `id_modelo`='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['id_modelo'];
					$Fila[1]=$laRow['nom_modelo'];
					$Fila[2]=$laRow['idFmarca'];
					$Fila[3]=$laRow['status'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM modelobn  WHERE id_modelo='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function consultar_modelos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `modelobn` AND status='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_modelo'];
					$Fila[$cont][1]=$laRow['nom_modelo'];
					$Fila[$cont][2]=$laRow['idFmarca'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_modelos_inactivas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `modelobn`";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_modelo'];
					$Fila[$cont][1]=$laRow['nom_modelo'];
					$Fila[$cont][2]=$laRow['idFmarca'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_modelo_bitacora()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tpobn.id_modelo,
				tpobn.nom_modelo,
				tpobn.idFmarca,
				tpobn.status,
				mcabn.nom_marca
				FROM modelobn AS tpobn
				INNER JOIN marcabn AS mcabn ON mcabn.id_marca=tpobn.idFmarca";

			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['id_modelo'];
				$Fila[$cont][1]=$laRow['nom_modelo'];
				$Fila[$cont][2]=$laRow['nom_marca'];
				$Fila[$cont][3]=$laRow['status'];
				$cont++;
			}
		
			$this->desconectar();
			return $Fila;
		}


		function consultar_modelo_especifico()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tpobn.id_modelo,
				tpobn.nom_modelo,
				tpobn.idFmarca,
				tpobn.status 
				FROM modelobn AS tpobn 
				WHERE tpobn.id_modelo='$this->lcIDprincipal'";

			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['id_modelo']=$laRow['id_modelo'];
				$Fila['nom_modelo']=$laRow['nom_modelo'];
				$Fila['idFmarca']=$laRow['idFmarca'];
				$Fila['status']=$laRow['status'];
			}
		
			$this->desconectar();
			return $Fila;
		}

		function registrar_modelo()
		{
			$this->conectar();

			$sql="INSERT INTO `modelobn`(`nom_modelo`,idFmarca,status) 
			VALUES (UPPER('$this->lcDes_moti'),'$this->idFmarca','1')";
		
			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();

			return $lnHecho;
		}

		function eliminar_modelo()
		{
			$this->conectar();
			$sql="UPDATE modelobn SET status='0' WHERE id_modelo='$this->lcIDprincipal'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_modelo()
		{
			$this->conectar();
			$sql="UPDATE modelobn SET status='1' WHERE id_modelo='$this->lcIDprincipal' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_modelo()
		{
			$this->conectar();
			$sql="UPDATE `modelobn` SET `nom_modelo`=UPPER('$this->lcDes_moti'), `idFmarca`='$this->idFmarca' WHERE id_modelo='$this->lcIDprincipal'";

			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();
			return $lnHecho;
		}
	}
?>