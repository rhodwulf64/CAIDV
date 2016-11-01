<?php

	require_once('../nucleo/ModeloConect.php');
	class clsproveedor extends ModeloConect
	{
		private $lcid_prov;
		private $lcdes_prov;
		private $lcrif_prov;
		private $lctelefono;
		private $lcparticular;
		private $lccorreo;
		private $lcdomicilio;
		

		function set_proveedor($pcid_prov)
		{
			$this->lcid_prov=$pcid_prov;
		}

		function set_des_prov($pcdes_prov)
		{
			$this->lcdes_prov=$pcdes_prov;
		}
		function set_rif_prov($pcrif_prov)
		{
			$this->lcrif_prov=$pcrif_prov;
		}
		function set_fijo($pctelefono)
		{
			$this->lctelefono=$pctelefono;
		}
		function set_particular($pcparticular)
		{
			$this->lcparticular=$pcparticular;
		}
		function set_correo($pccorreo)
		{
			$this->lccorreo=$pccorreo;
		}
		function set_domicilio($pcdomicilio)
		{
			$this->lcdomicilio=$pcdomicilio;
		}
	
		function consultar_proveedor_bitacora()
		{
			$this->conectar();
				$sql="SELECT id_prov,des_prov,rif_prov,telefono,status FROM proveedores";
				$pcsql=$this->filtro($sql);
				$cont=0;
				while($laRow=$this->proximo($pcsql))
				{
					foreach ($laRow as $key => $value)
					{
						$Fila[$cont][$key]=$value;
					}
					$cont++;
				}
			$this->desconectar();
			return $Fila;
		}

		function consultar_proveedors_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT id_prov,des_prov,rif_prov,telefono,status FROM proveedores";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_prov'];
					$Fila[$cont][1]=$laRow['des_prov'];
					$Fila[$cont][2]=$laRow['rif_prov'];
					$Fila[$cont][3]=$laRow['telefono'];
					$Fila[$cont][4]=$laRow['particular'];
					$Fila[$cont][5]=$laRow['correo'];
					$Fila[$cont][6]=$laRow['domicilio'];
					$Fila[$cont][7]=$laRow['status'];

					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_proveedors()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT id_prov,des_prov,rif_prov,telefono,status FROM proveedores WHERE status='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_prov'];
					$Fila[$cont][1]=$laRow['des_prov'];
					$Fila[$cont][2]=$laRow['rif_prov'];
					$Fila[$cont][3]=$laRow['telefono'];
					$Fila[$cont][4]=$laRow['particular'];
					$Fila[$cont][5]=$laRow['correo'];
					$Fila[$cont][6]=$laRow['domicilio'];
					$Fila[$cont][7]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_proveedor()
		{
			$this->conectar();
				$sql="SELECT id_prov,des_prov,rif_prov,telefono FROM proveedores WHERE id_prov='$this->lcid_prov'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['id_prov'];
					$Fila[1]=$laRow['des_prov'];
					$Fila[2]=$laRow['rif_prov'];
					$Fila[3]=$laRow['telefono'];
					$Fila[4]=$laRow['particular'];
					$Fila[5]=$laRow['correo'];
					$Fila[6]=$laRow['domicilio'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM tentrada WHERE id_prov='$this->lcid_prov' ";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function registrar_proveedor()
		{
			$this->conectar();
			$sql="INSERT INTO proveedores (des_prov,rif_prov,telefono)VALUES(UPPER('$this->lcdes_prov'),UPPER('$this->lcrif_prov'),UPPER('$this->lctelefono'))";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_proveedor()
		{
			$this->conectar();
			$sql="UPDATE proveedores SET status='0' WHERE id_prov='$this->lcid_prov' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_proveedor()
		{
			$this->conectar();
			$sql="UPDATE proveedores SET status='1' WHERE id_prov='$this->lcid_prov' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_proveedor()
		{
			$this->conectar();
			$sql="UPDATE proveedores SET des_prov=UPPER('$this->lcdes_prov'), rif_prov=UPPER('$this->lcrif_prov'), telefono=UPPER('$this->lctelefono')  WHERE id_prov='$this->lcid_prov' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>