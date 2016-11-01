<?php

	require_once('../nucleo/ModeloConect.php');
	class clsProveedor extends ModeloConect
	{
		private $lcIDproveedor;
		private $lcDes_prov;
		private $lcRif_prov;
		private $lcItem;
		private $lcEspacio;
		private $lcEstatus;

		function set_Proveedor($pcIDproveedor)
		{
			$this->lcIDproveedor=$pcIDproveedor;
		}

		function set_Descripcion($pcDescrip)
		{
			$this->lcDes_prov=$pcDescrip;
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



		function consultar_proveedor()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `proveedores` WHERE `id_prov`='$this->lcIDproveedor'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['id_prov'];
					$Fila[1]=$laRow['des_prov'];
					$Fila[2]=$laRow['rif_prov'];
					$Fila[3]=$laRow['status'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM  proveedores  WHERE id_prov='$this->lcIDproveedor'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function consultar_proveedores()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `proveedores` AND status='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_prov'];
					$Fila[$cont][1]=$laRow['des_prov'];
					$Fila[$cont][2]=$laRow['rif_prov'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_proveedores_inactivas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `proveedores`";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_prov'];
					$Fila[$cont][1]=$laRow['des_prov'];
					$Fila[$cont][2]=$laRow['rif_prov'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_proveedor_bitacora()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tprov.id_prov,
				tprov.des_prov,
				tprov.rif_prov,
				tprov.status 
				FROM proveedores AS tprov";

			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['id_prov'];
				$Fila[$cont][1]=$laRow['des_prov'];
				$Fila[$cont][2]=$laRow['rif_prov'];
				$Fila[$cont][3]=$laRow['status'];
				$cont++;
			}
		
			$this->desconectar();
			return $Fila;
		}


		function consultar_proveedor_especifico()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tprov.id_prov,
				tprov.des_prov,
				tprov.rif_prov,
				tprov.status 
				FROM proveedores AS tprov 
				WHERE tprov.id_prov='$this->lcIDproveedor'";

			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['id_prov']=$laRow['id_prov'];
				$Fila['des_prov']=$laRow['des_prov'];
				$Fila['rif_prov']=$laRow['rif_prov'];
				$Fila['status']=$laRow['status'];
			}
		
			$this->desconectar();
			return $Fila;
		}

		function registrar_proveedor()
		{
			$this->conectar();

			$sql="INSERT INTO `proveedores`(`des_prov`, rif_prov,status) 
			VALUES (UPPER('$this->lcDes_prov'),'$this->lcRif_prov','1')";
		
			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();

			return $lnHecho;
		}

		function eliminar_proveedor()
		{
			$this->conectar();
			$sql="UPDATE proveedores SET status='0' WHERE id_prov='$this->lcIDproveedor'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_proveedor()
		{
			$this->conectar();
			$sql="UPDATE proveedores SET status='1' WHERE id_prov='$this->lcIDproveedor' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_proveedor()
		{
			$this->conectar();
			$sql="UPDATE `proveedores` SET `des_prov`=UPPER('$this->lcDes_prov'), `rif_prov`=UPPER('$this->lcRif_prov') WHERE id_prov='$this->lcIDproveedor'";

			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();
			return $lnHecho;
		}
	}
?>