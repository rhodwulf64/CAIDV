<?php

	require_once('../nucleo/ModeloConect.php');
	class clsArticulo extends ModeloConect
	{
		private $lcIdarticulo;
		private $lcdescripcionart;
		private $lcidunidadmedida;
		private $lcpresentacion;
		private $lcgrupo;
		

		function set_articulo($pcIdarticulo)
		{
			$this->lcIdarticulo=$pcIdarticulo;
		}

		function set_descripcionart($pcdescripcionart)
		{
			$this->lcdescripcionart=$pcdescripcionart;
		}
		function set_idunidadmedida($pcidunidadmedida)
		{
			$this->lcidunidadmedida=$pcidunidadmedida;
		}
		function set_presentacion($pcpresentacion)
		{
			$this->lcpresentacion=$pcpresentacion;
		}
		function set_grupo($pcgrupo)
		{
			$this->lcgrupo=$pcgrupo;
		}
	

		function consultar_articulos_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idarticulo,descripcionart,tunidadmedida.descripcion,tpresentacion.nombre,trubro.nombreg,existencia,estatusart FROM tarticulo,tunidadmedida,tpresentacion,trubro where tunidadmedida.idunidadmedida=tarticulo.idunidadmedida and tpresentacion.idpresentacion=tarticulo.idpresentacion and trubro.idgrupo=tarticulo.idgrupo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idarticulo'];
					$Fila[$cont][1]=$laRow['descripcionart'];
					$Fila[$cont][2]=$laRow['descripcion'];
					$Fila[$cont][3]=$laRow['nombre'];
					$Fila[$cont][4]=$laRow['nombreg'];
					$Fila[$cont][5]=$laRow['existencia'];
					$Fila[$cont][6]=$laRow['estatusart'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_articulos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idarticulo,descripcionart,tunidadmedida.descripcion,tpresentacion.nombre,trubro.nombreg,existencia,estatusart FROM tarticulo,tunidadmedida,tpresentacion,trubro WHERE estatusart='1' and tunidadmedida.idunidadmedida=tarticulo.idunidadmedida and tpresentacion.idpresentacion=tarticulo.idpresentacion and trubro.idgrupo=tarticulo.idgrupo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
					{
					$Fila[$cont][0]=$laRow['idarticulo'];
					$Fila[$cont][1]=$laRow['descripcionart'];
					$Fila[$cont][2]=$laRow['descripcion'];
					$Fila[$cont][3]=$laRow['nombre'];
					$Fila[$cont][4]=$laRow['nombreg'];
					$Fila[$cont][5]=$laRow['existencia'];
					$Fila[$cont][6]=$laRow['estatusart'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_articulo()
		{
			$this->conectar();
				$sql="SELECT idarticulo,descripcionart,tunidadmedida.descripcion,tpresentacion.nombre,trubro.nombreg,existencia,estatusart FROM tarticulo,tunidadmedida,tpresentacion,trubro WHERE estatusart='1'  and idarticulo='$this->lcIdarticulo' and tunidadmedida.idunidadmedida=tarticulo.idunidadmedida and tpresentacion.idpresentacion=tarticulo.idpresentacion and trubro.idgrupo=tarticulo.idgrupo";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idarticulo'];
					$Fila[1]=$laRow['descripcionart'];
					$Fila[2]=$laRow['descripcion'];
					$Fila[3]=$laRow['nombre'];
					$Fila[4]=$laRow['nombreg'];
					$Fila[5]=$laRow['existencia'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM dentrada WHERE idarticulo='$this->lcIdarticulo' ";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function registrar_articulo()
		{
			$this->conectar();
			$sql="INSERT INTO tarticulo (descripcionart,idunidadmedida,idpresentacion,idgrupo)VALUES(UPPER('$this->lcdescripcionart'),'$this->lcidunidadmedida','$this->lcpresentacion','$this->lcgrupo')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_articulo()
		{
			$this->conectar();
			$sql="UPDATE tarticulo SET estatusart='0' WHERE idarticulo='$this->lcIdarticulo' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_articulo()
		{
			$this->conectar();
			$sql="UPDATE tarticulo SET estatusart='1' WHERE idarticulo='$this->lcIdarticulo' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_articulo()
		{
			$this->conectar();
			$sql="UPDATE tarticulo SET descripcionart=UPPER('$this->lcdescripcionart'), idunidadmedida='$this->lcidunidadmedida', idpresentacion='$this->lcpresentacion', idgrupo='$this->lcgrupo' WHERE idarticulo='$this->lcIdarticulo' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>