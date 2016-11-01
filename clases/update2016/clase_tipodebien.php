<?php

	require_once('../nucleo/ModeloConect.php');
	class clsTipodebien extends ModeloConect
	{
		private $lcIDprincipal;
		private $cod_tbien;
		private $lcDes_moti;
		private $id_categoria;
		private $lcItem;
		private $lcEspacio;
		private $lcEstatus;

		function set_IDprincipal($pcIDmotivo)
		{
			$this->lcIDprincipal=$pcIDmotivo;
		}

		function set_cod_tbien($pccod_tbien)
		{
			$this->cod_tbien=$pccod_tbien;
		}

		function set_Descripcion($pcDescrip)
		{
			$this->lcDes_moti=$pcDescrip;
		}

		function set_SegundoValor($pcDatos)
		{
			$this->id_categoria=$pcDatos;
		}

		function set_Espacio($pcEspacio)
		{
			$this->lcEspacio=$pcEspacio;
		}

		function set_Estatus($pcEstatus)
		{
			$this->lcEstatus=$pcEstatus;
		}



		function consultar_tipodebien()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tipobn` WHERE `id_tbien`='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['id_tbien'];
					$Fila[1]=$laRow['des_tbien'];
					$Fila[2]=$laRow['id_categoria'];
					$Fila[3]=$laRow['status'];
					$Fila[4]=$laRow['cod_tbien'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM tipobn  WHERE id_tbien='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function consultar_tipodebienes()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tipobn` AND status='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_tbien'];
					$Fila[$cont][1]=$laRow['des_tbien'];
					$Fila[$cont][2]=$laRow['id_categoria'];
					$Fila[$cont][3]=$laRow['status'];
					$Fila[$cont][4]=$laRow['cod_tbien'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_tipodebienes_inactivas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tipobn`";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_tbien'];
					$Fila[$cont][1]=$laRow['des_tbien'];
					$Fila[$cont][2]=$laRow['id_categoria'];
					$Fila[$cont][3]=$laRow['status'];
					$Fila[$cont][4]=$laRow['cod_tbien'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_tipodebien_bitacora()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tpobn.id_tbien,
				tpobn.cod_tbien,
				tpobn.des_tbien,
				tpobn.id_categoria,
				tpobn.status,
				catg.nom_cat,
				(SELECT count(tarti.id_tbien) AS cantiArti FROM articulobn AS tarti WHERE tarti.status='1' AND tarti.id_cond='1' AND tarti.id_tbien=tpobn.id_tbien GROUP BY tarti.id_tbien) AS cantidadPorTipo
				FROM tipobn AS tpobn
				INNER JOIN categoriabn AS catg ON catg.id_categoria=tpobn.id_categoria";

			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['id_tbien'];
				$Fila[$cont][1]=$laRow['des_tbien'];
				$Fila[$cont][2]=$laRow['nom_cat'];
				$Fila[$cont][3]=$laRow['status'];
				$Fila[$cont][4]=$laRow['cod_tbien'];
				$Fila[$cont][5]=$laRow['cantidadPorTipo'];
				$cont++;
			}
		
			$this->desconectar();
			return $Fila;
		}


		function consultar_tipodebien_especifico()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tpobn.id_tbien,
				tpobn.cod_tbien,
				tpobn.des_tbien,
				tpobn.id_categoria,
				tpobn.status 
				FROM tipobn AS tpobn 
				WHERE tpobn.id_tbien='$this->lcIDprincipal'";

			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['id_tbien']=$laRow['id_tbien'];
				$Fila['cod_tbien']=$laRow['cod_tbien'];
				$Fila['des_tbien']=$laRow['des_tbien'];
				$Fila['id_categoria']=$laRow['id_categoria'];
				$Fila['status']=$laRow['status'];
			}
		
			$this->desconectar();
			return $Fila;
		}

		function registrar_tipodebien()
		{
			$this->conectar();

			$sql="INSERT INTO `tipobn`(cod_tbien,`des_tbien`,id_categoria,status) 
			VALUES (UPPER('$this->cod_tbien'),UPPER('$this->lcDes_moti'),'$this->id_categoria','1')";
		
			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();

			return $lnHecho;
		}

		function eliminar_tipodebien()
		{
			$this->conectar();
			$sql="UPDATE tipobn SET status='0' WHERE id_tbien='$this->lcIDprincipal'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_tipodebien()
		{
			$this->conectar();
			$sql="UPDATE tipobn SET status='1' WHERE id_tbien='$this->lcIDprincipal' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_tipodebien()
		{
			$this->conectar();
			$sql="UPDATE `tipobn` SET `cod_tbien`=UPPER('$this->cod_tbien'), `des_tbien`=UPPER('$this->lcDes_moti'), `id_categoria`=UPPER('$this->id_categoria') WHERE id_tbien='$this->lcIDprincipal'";

			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();
			return $lnHecho;
		}
	}
?>