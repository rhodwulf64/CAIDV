<?php

	require_once('../nucleo/ModeloConect.php');
	class clsdepartamento extends ModeloConect
	{
		private $lccod_tdepartamento;
		private $lcNombre_dep;
		private $lccedula;

		function set_departamento($pccod_tdepartamento)
		{
			$this->lccod_tdepartamento=$pccod_tdepartamento;
		}

		function set_Nombre_dep($pcNombre_dep)
		{
			$this->lcNombre_dep=$pcNombre_dep;
		}
		function set_cedula($pccedula)
		{
			$this->lccedula=$pccedula;
		}


		function consultar_departamentos_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT tdepartamento.cod_tdepartamento,Nombre_dep,tdepartamento.cedula,tdepartamento.estatus,tpersona.nombre_per,tpersona.apellido_per FROM tdepartamento,tpersona where tpersona.cedula=tdepartamento.cedula ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['cod_tdepartamento'];
					$Fila[$cont][1]=$laRow['Nombre_dep'];
					$Fila[$cont][2]=$laRow['cedula'];
					$Fila[$cont][3]=$laRow['estatus'];
					$Fila[$cont][4]=$laRow['nombre_per'];
					$Fila[$cont][5]=$laRow['apellido_per'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_departamentos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT tdepartamento.cod_tdepartamento,Nombre_dep,tdepartamento.cedula,tdepartamento.estatus,tpersona.nombre_per,tpersona.apellido_per FROM tdepartamento,tpersona where tpersona.cedula=tdepartamento.cedula and tdepartamento.estatus='1' ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['cod_tdepartamento'];
					$Fila[$cont][1]=$laRow['Nombre_dep'];
					$Fila[$cont][2]=$laRow['cedula'];
					$Fila[$cont][3]=$laRow['estatus'];
					$Fila[$cont][4]=$laRow['nombre_per'];
					$Fila[$cont][5]=$laRow['apellido_per'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_departamento_bitacora()
		{
			$this->conectar();
				$sql="SELECT cod_tdepartamento,nombre_dep,cedula,estatus FROM tdepartamento";
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
				$sql="SELECT cod_tdepartamento,Nombre_dep,cedula FROM tdepartamento WHERE cod_tdepartamento='$this->lccod_tdepartamento'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['cod_tdepartamento'];
					$Fila[1]=$laRow['Nombre_dep'];
					$Fila[2]=$laRow['cedula'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM tsalida WHERE cod_tdepartamento='$this->lccod_tdepartamento' ";
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
			$sql="INSERT INTO tdepartamento (Nombre_dep,cedula)VALUES(UPPER('$this->lcNombre_dep'),'$this->lccedula')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_departamento()
		{
			$this->conectar();
			$sql="UPDATE tdepartamento SET estatus='0' WHERE cod_tdepartamento='$this->lccod_tdepartamento' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_departamento()
		{
			$this->conectar();
			$sql="UPDATE tdepartamento SET estatus='1' WHERE cod_tdepartamento='$this->lccod_tdepartamento' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_departamento()
		{
			$this->conectar();
			$sql="UPDATE tdepartamento SET Nombre_dep=UPPER('$this->lcNombre_dep'), cedula='$this->lccedula' WHERE cod_tdepartamento='$this->lccod_tdepartamento' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>