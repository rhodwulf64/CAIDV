<?php

	require_once('../nucleo/ModeloConect.php');
	class clsdepartamento extends ModeloConect
	{
		private $lcidasignatura;
		private $lcnombreasi;
		private $lcidpersonal;

		function set_departamento($pcidasignatura)
		{
			$this->lcidasignatura=$pcidasignatura;
		}

		function set_Nombre_dep($pcnombreasi)
		{
			$this->lcnombreasi=$pcnombreasi;
		}
		
		function set_cedula($pcidpersonal)
		{
			$this->lcidpersonal=$pcidpersonal;
		}


		function consultar_departamentos_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT tasignatura.idasignatura,tasignatura.nombreasi,tasignatura.estatusasi FROM tasignatura WHERE tasignatura.estatusasi='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idasignatura'];
					$Fila[$cont][1]=$laRow['nombreasi'];
					$Fila[$cont][2]=$laRow['idpersonal'];
					$Fila[$cont][3]=$laRow['estatusasi'];
					$Fila[$cont][4]=$laRow['nombreunoper'];
					$Fila[$cont][5]=$laRow['apellidounoper'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_departamento_select()
		{
			$this->conectar();
				$sql="SELECT idasignatura,nombreasi,estatusasi FROM tasignatura WHERE estatusasi='1'";
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

		function consultar_departamentos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT tasignatura.idasignatura,tasignatura.nombreasi,tasignatura.estatusasi FROM tasignatura WHERE tasignatura.estatusasi='1' ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idasignatura'];
					$Fila[$cont][1]=$laRow['nombreasi'];
					$Fila[$cont][2]=$laRow['idpersonal'];
					$Fila[$cont][3]=$laRow['estatusasi'];
					$Fila[$cont][4]=$laRow['nombreunoper'];
					$Fila[$cont][5]=$laRow['apellidounoper'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_departamento_bitacora()
		{
			$this->conectar();
				$sql="SELECT idasignatura,tasignatura.nombreasi,estatusasi FROM tasignatura";
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
		function consultar_departamento()
		{
			$this->conectar();
				$sql="SELECT idasignatura,tasignatura.nombreasi FROM tasignatura WHERE idasignatura='$this->lcidasignatura'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idasignatura'];
					$Fila[1]=$laRow['nombreasi'];
					$Fila[2]=$laRow['idpersonal'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM tsalida WHERE idasignatura='$this->lcidasignatura' ";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function registrar_departamento()
		{
			$this->conectar();
			$sql="INSERT INTO tasignatura (nombreasi)VALUES(UPPER('$this->lcnombreasi'),'$this->lcidpersonal')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_departamento()
		{
			$this->conectar();
			$sql="UPDATE tasignatura SET estatusasi='0' WHERE idasignatura='$this->lcidasignatura' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_departamento()
		{
			$this->conectar();
			$sql="UPDATE tasignatura SET estatusasi='1' WHERE idasignatura='$this->lcidasignatura' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_departamento()
		{
			$this->conectar();
			$sql="UPDATE tasignatura SET nombreasi=UPPER('$this->lcnombreasi'), idpersonal='$this->lcidpersonal' WHERE idasignatura='$this->lcidasignatura' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>