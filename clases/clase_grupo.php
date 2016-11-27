<?php

	require_once('../nucleo/ModeloConect.php');
	class clsgrupo extends ModeloConect
	{
		private $lcid_categoria;
		private $lcNombre;

		function set_grupo($pcid_categoria)
		{
			$this->lcid_categoria=$pcid_categoria;
		}

		function set_Nombre($pcNombre)
		{
			$this->lcNombre=$pcNombre;
		}


		function consultar_grupos_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT id_categoria,nom_cat,status FROM categoriabn ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_categoria'];
					$Fila[$cont][1]=$laRow['nom_cat'];
					$Fila[$cont][2]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_grupos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT id_categoria,nom_cat,status FROM categoriabn WHERE status='1' ";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_categoria'];
					$Fila[$cont][1]=$laRow['nom_cat'];
					$Fila[$cont][2]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_grupo()
		{
			$this->conectar();
				$sql="SELECT id_categoria,nom_cat FROM categoriabn WHERE id_categoria='$this->lcid_categoria'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['id_categoria'];
					$Fila[1]=$laRow['nom_cat'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM tarticulo WHERE id_categoria='$this->lcid_categoria' ";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function registrar_grupo()
		{
			$this->conectar();
			$sql="INSERT INTO categoriabn (nom_cat)VALUES(UPPER('$this->lcNombre'))";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_grupo()
		{
			$this->conectar();
			$sql="UPDATE categoriabn SET status='0' WHERE id_categoria='$this->lcid_categoria' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_grupo()
		{
			$this->conectar();
			$sql="UPDATE categoriabn SET status='1' WHERE id_categoria='$this->lcid_categoria' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_grupo()
		{
			$this->conectar();
			$sql="UPDATE categoriabn SET nom_cat=UPPER('$this->lcNombre') WHERE id_categoria='$this->lcid_categoria' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>