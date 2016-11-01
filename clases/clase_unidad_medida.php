<?php

	require_once('../nucleo/ModeloConect.php');
	class clsUnidad_Medida extends ModeloConect
	{
		private $lcIdUnidad_Medida;
		private $lcNombre;
		private $lcAbreviatura;

		function set_Unidad_Medida($pcIdUnidad_Medida)
		{
			$this->lcIdUnidad_Medida=$pcIdUnidad_Medida;
		}

		function set_Nombre($pcNombre)
		{
			$this->lcNombre=$pcNombre;
		}
		function set_Abreviatura($pcAbreviatura)
		{
			$this->lcAbreviatura=$pcAbreviatura;
		}

		function consultar_unidad_medidas_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idunidadmedida,descripcion,abreviatura,estatus FROM tunidadmedida ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idunidadmedida'];
					$Fila[$cont][1]=$laRow['descripcion'];
					$Fila[$cont][2]=$laRow['abreviatura'];
					$Fila[$cont][3]=$laRow['estatus'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_unidad_medidas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idunidadmedida,descripcion,abreviatura,estatus FROM tunidadmedida WHERE estatus='1' ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idunidadmedida'];
					$Fila[$cont][1]=$laRow['descripcion'];
					$Fila[$cont][2]=$laRow['abreviatura'];
					$Fila[$cont][3]=$laRow['estatus'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_unidad_medida()
		{
			$this->conectar();
				$sql="SELECT idunidadmedida,descripcion,abreviatura FROM tunidadmedida WHERE idunidadmedida='$this->lcIdUnidad_Medida'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idunidadmedida'];
					$Fila[1]=$laRow['descripcion'];
					$Fila[2]=$laRow['abreviatura'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM tarticulo WHERE idunidadmedida='$this->lcIdUnidad_Medida' ";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function registrar_unidad_medida()
		{
			$this->conectar();
			$sql="INSERT INTO tunidadmedida (descripcion,abreviatura)VALUES(UPPER('$this->lcNombre'),UPPER('$this->lcAbreviatura'))";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_unidad_medida()
		{
			$this->conectar();
			$sql="UPDATE tunidadmedida SET estatus='0' WHERE idunidadmedida='$this->lcIdUnidad_Medida' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_unidad_medida()
		{
			$this->conectar();
			$sql="UPDATE tunidadmedida SET estatus='1' WHERE idunidadmedida='$this->lcIdUnidad_Medida' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_unidad_medida()
		{
			$this->conectar();
			$sql="UPDATE tunidadmedida SET descripcion=UPPER('$this->lcNombre'),abreviatura=UPPER('$this->lcAbreviatura') WHERE idunidadmedida='$this->lcIdUnidad_Medida' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>