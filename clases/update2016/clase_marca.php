<?php

	require_once('../nucleo/ModeloConect.php');
	class clsMarca extends ModeloConect
	{
		private $lcIDmarca;
		private $nom_marca;
		private $lcRif_prov;
		private $lcItem;
		private $lcEspacio;
		private $lcEstatus;

		function set_marca($pcIDmarca)
		{
			$this->lcIDmarca=$pcIDmarca;
		}

		function set_Descripcion($pcDescrip)
		{
			$this->nom_marca=$pcDescrip;
		}

		function set_Rif($pcDatos)
		{
			$this->lcRif_prov=$pcDatos;
		}

		function set_Espacio($pcEspacio)
		{
			$this->lcEspacio=$pcEspacio;
		}

		function set_Estatus($pcEstatus)
		{
			$this->lcEstatus=$pcEstatus;
		}



		function consultar_marca()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `marcabn` WHERE `id_marca`='$this->lcIDmarca'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['id_marca'];
					$Fila[1]=$laRow['nom_marca'];
					$Fila[3]=$laRow['status'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM  marcabn  WHERE id_marca='$this->lcIDmarca'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function consultar_marcas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `marcabn` AND status='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_marca'];
					$Fila[$cont][1]=$laRow['nom_marca'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_marcas_inactivas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `marcabn`";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_marca'];
					$Fila[$cont][1]=$laRow['nom_marca'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_marca_bitacora()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tprov.id_marca,
				tprov.nom_marca,
				tprov.status 
				FROM marcabn AS tprov";

			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['id_marca'];
				$Fila[$cont][1]=$laRow['nom_marca'];
				$Fila[$cont][3]=$laRow['status'];
				$cont++;
			}
		
			$this->desconectar();
			return $Fila;
		}


		function consultar_marca_especifico()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tprov.id_marca,
				tprov.nom_marca,
				tprov.status 
				FROM marcabn AS tprov 
				WHERE tprov.id_marca='$this->lcIDmarca'";

			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['id_marca']=$laRow['id_marca'];
				$Fila['nom_marca']=$laRow['nom_marca'];
				$Fila['status']=$laRow['status'];
			}
		
			$this->desconectar();
			return $Fila;
		}

		function registrar_marca()
		{
			$this->conectar();

			$sql="INSERT INTO `marcabn`(`nom_marca`,status) 
			VALUES (UPPER('$this->nom_marca'),'1')";
		
			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();

			return $lnHecho;
		}

		function eliminar_marca()
		{
			$this->conectar();
			$sql="UPDATE marcabn SET status='0' WHERE id_marca='$this->lcIDmarca'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_marca()
		{
			$this->conectar();
			$sql="UPDATE marcabn SET status='1' WHERE id_marca='$this->lcIDmarca' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_marca()
		{
			$this->conectar();
			$sql="UPDATE `marcabn` SET `nom_marca`=UPPER('$this->nom_marca') WHERE id_marca='$this->lcIDmarca'";

			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();
			return $lnHecho;
		}
	}
?>