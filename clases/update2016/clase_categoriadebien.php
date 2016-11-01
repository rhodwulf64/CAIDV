<?php

	require_once('../nucleo/ModeloConect.php');
	class clsCategoriadebien extends ModeloConect
	{
		private $lcIDcategoriadebien;
		private $nom_cat;
		private $lcRif_prov;
		private $lcItem;
		private $lcEspacio;
		private $lcEstatus;

		function set_categoriadebien($pcIDcategoriadebien)
		{
			$this->lcIDcategoriadebien=$pcIDcategoriadebien;
		}

		function set_Descripcion($pcDescrip)
		{
			$this->nom_cat=$pcDescrip;
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



		function consultar_categoriadebien()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `categoriabn` WHERE `id_categoria`='$this->lcIDcategoriadebien'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['id_categoria'];
					$Fila[1]=$laRow['nom_cat'];
					$Fila[3]=$laRow['status'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM  categoriabn  WHERE id_categoria='$this->lcIDcategoriadebien'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function consultar_categoriadebienes()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `categoriabn` AND status='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_categoria'];
					$Fila[$cont][1]=$laRow['nom_cat'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_categoriadebienes_inactivas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `categoriabn`";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_categoria'];
					$Fila[$cont][1]=$laRow['nom_cat'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_categoriadebien_bitacora()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tprov.id_categoria,
				tprov.nom_cat,
				tprov.status 
				FROM categoriabn AS tprov";

			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['id_categoria'];
				$Fila[$cont][1]=$laRow['nom_cat'];
				$Fila[$cont][3]=$laRow['status'];
				$cont++;
			}
		
			$this->desconectar();
			return $Fila;
		}


		function consultar_categoriadebien_especifico()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tprov.id_categoria,
				tprov.nom_cat,
				tprov.status 
				FROM categoriabn AS tprov 
				WHERE tprov.id_categoria='$this->lcIDcategoriadebien'";

			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['id_categoria']=$laRow['id_categoria'];
				$Fila['nom_cat']=$laRow['nom_cat'];
				$Fila['status']=$laRow['status'];
			}
		
			$this->desconectar();
			return $Fila;
		}

		function registrar_categoriadebien()
		{
			$this->conectar();

			$sql="INSERT INTO `categoriabn`(`nom_cat`,status) 
			VALUES (UPPER('$this->nom_cat'),'1')";
		
			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();

			return $lnHecho;
		}

		function eliminar_categoriadebien()
		{
			$this->conectar();
			$sql="UPDATE categoriabn SET status='0' WHERE id_categoria='$this->lcIDcategoriadebien'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_categoriadebien()
		{
			$this->conectar();
			$sql="UPDATE categoriabn SET status='1' WHERE id_categoria='$this->lcIDcategoriadebien' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_categoriadebien()
		{
			$this->conectar();
			$sql="UPDATE `categoriabn` SET `nom_cat`=UPPER('$this->nom_cat') WHERE id_categoria='$this->lcIDcategoriadebien'";

			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();
			return $lnHecho;
		}
	}
?>