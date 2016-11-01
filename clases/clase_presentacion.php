<?php

	require_once('../nucleo/ModeloConect.php');
	class clspresentacion extends ModeloConect
	{
		private $lcIdpresentacion;
		private $lcNombre;

		function set_presentacion($pcIdpresentacion)
		{
			$this->lcIdpresentacion=$pcIdpresentacion;
		}

		function set_Nombre($pcNombre)
		{
			$this->lcNombre=$pcNombre;
		}


		function consultar_presentacions_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idpresentacion,nombre,Estatus FROM tpresentacion ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idpresentacion'];
					$Fila[$cont][1]=$laRow['nombre'];
					$Fila[$cont][2]=$laRow['Estatus'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_presentacions()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idpresentacion,nombre,Estatus FROM tpresentacion WHERE Estatus='1' ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idpresentacion'];
					$Fila[$cont][1]=$laRow['nombre'];
					$Fila[$cont][2]=$laRow['Estatus'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_presentacion()
		{
			$this->conectar();
				$sql="SELECT idpresentacion,nombre FROM tpresentacion WHERE idpresentacion='$this->lcIdpresentacion'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idpresentacion'];
					$Fila[1]=$laRow['nombre'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM tarticulo WHERE idpresentacion='$this->lcIdpresentacion' ";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function registrar_presentacion()
		{
			$this->conectar();
			$sql="INSERT INTO tpresentacion (nombre)VALUES(UPPER('$this->lcNombre'))";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_presentacion()
		{
			$this->conectar();
			$sql="UPDATE tpresentacion SET Estatus='0' WHERE idpresentacion='$this->lcIdpresentacion' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_presentacion()
		{
			$this->conectar();
			$sql="UPDATE tpresentacion SET Estatus='1' WHERE idpresentacion='$this->lcIdpresentacion' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_presentacion()
		{
			$this->conectar();
			$sql="UPDATE tpresentacion SET nombre=UPPER('$this->lcNombre') WHERE idpresentacion='$this->lcIdpresentacion' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>