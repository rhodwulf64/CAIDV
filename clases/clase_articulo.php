<?php
<<<<<<< HEAD

	require_once('../nucleo/ModeloConect.php');
	class clsarticulo extends ModeloConect
	{
		private $lcIdarticulo;
		private $lcdescripcionart;
		private $lcidunidadmedida;
		private $lcpresentacion;
		private $lcgrupo;
		private $lcstockminimo;
		

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
		function set_stockminimo($pcstockminimo)
		{
			$this->lcstockminimo=$pcstockminimo;
		}
	

		function consultar_articulos_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				Arti.idarticulo,
				Arti.descripcionart,
				Tuni.descripcion,
				Tpres.nombre,
				Cat.nom_cat,
				Arti.existencia,
				Arti.estatusart,
				Arti.stockminimo 
				FROM tarticulo AS Arti,
				tunidadmedida AS Tuni,
				tpresentacion AS Tpres,
				categoriabn AS Cat 
				WHERE Tuni.idunidadmedida=Arti.idunidadmedida 
				AND Tpres.idpresentacion=Arti.idpresentacion 
				AND Cat.id_categoria=Arti.idgrupo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idarticulo'];
					$Fila[$cont][1]=$laRow['descripcionart'];
					$Fila[$cont][2]=$laRow['descripcion'];
					$Fila[$cont][3]=$laRow['nombre'];
					$Fila[$cont][4]=$laRow['nom_cat'];
					$Fila[$cont][5]=$laRow['existencia'];
					$Fila[$cont][6]=$laRow['estatusart'];
					$Fila[$cont][7]=$laRow['stockminimo'];
=======
	require_once('../nucleo/ModeloConect.php');
	class clsArticulo extends ModeloConect
	{
		private $idArticulo,$nombre,$idTipo_articulo,$estatus;
		function __set($var,$val){
			$this->$var=strtoupper($val);
		}		
		function __get($var){
			return $this->$var;
		}
		

		function consultar_articulo()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT *,a.nombre AS nombre_a,ta.nombre AS nombre_ta,a.estatus AS estatus_a FROM am_tarticulo a INNER JOIN am_ttipo_articulo ta ON a.idTipo_articulo=ta.idTipo_articulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idArticulo'];
					$Fila[$cont][1]=$laRow['nombre_a'];
					$Fila[$cont][2]=$laRow['nombre_ta'];
					$Fila[$cont][3]=$laRow['cantidad'];
					$Fila[$cont][4]=$laRow['estatus_a'];
>>>>>>> caidv2
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

<<<<<<< HEAD
		function consultar_articulos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idarticulo,descripcionart,tunidadmedida.descripcion,tpresentacion.nombre,categoriabn.nom_cat,existencia,estatusart,stockminimo FROM tarticulo,tunidadmedida,tpresentacion,categoriabn WHERE estatusart='1' and tunidadmedida.idunidadmedida=tarticulo.idunidadmedida and tpresentacion.idpresentacion=tarticulo.idpresentacion and categoriabn.id_categoria=tarticulo.idgrupo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
					{
					$Fila[$cont][0]=$laRow['idarticulo'];
					$Fila[$cont][1]=$laRow['descripcionart'];
					$Fila[$cont][2]=$laRow['descripcion'];
					$Fila[$cont][3]=$laRow['nombre'];
					$Fila[$cont][4]=$laRow['nom_cat'];
					$Fila[$cont][5]=$laRow['existencia'];
					$Fila[$cont][6]=$laRow['estatusart'];
					$Fila[$cont][7]=$laRow['stockminimo'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_articulos_faltantes()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idarticulo,descripcionart,tunidadmedida.descripcion,tpresentacion.nombre,categoriabn.nom_cat,existencia,estatusart,stockminimo FROM tarticulo,tunidadmedida,tpresentacion,categoriabn WHERE estatusart='1' and tarticulo.stockminimo>tarticulo.existencia and tunidadmedida.idunidadmedida=tarticulo.idunidadmedida and tpresentacion.idpresentacion=tarticulo.idpresentacion and categoriabn.id_categoria=tarticulo.idgrupo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
					{
					$Fila[$cont][0]=$laRow['idarticulo'];
					$Fila[$cont][1]=$laRow['descripcionart'];
					$Fila[$cont][2]=$laRow['descripcion'];
					$Fila[$cont][3]=$laRow['nombre'];
					$Fila[$cont][4]=$laRow['nom_cat'];
					$Fila[$cont][5]=$laRow['existencia'];
					$Fila[$cont][6]=$laRow['estatusart'];
					$Fila[$cont][7]=$laRow['stockminimo'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_articulo()
		{
			$this->conectar();
				$sql="SELECT idarticulo,descripcionart,tunidadmedida.descripcion,tpresentacion.nombre,categoriabn.nom_cat,existencia,estatusart,stockminimo FROM tarticulo,tunidadmedida,tpresentacion,categoriabn WHERE estatusart='1'  and idarticulo='$this->lcIdarticulo' and tunidadmedida.idunidadmedida=tarticulo.idunidadmedida and tpresentacion.idpresentacion=tarticulo.idpresentacion and categoriabn.id_categoria=tarticulo.idgrupo";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idarticulo'];
					$Fila[1]=$laRow['descripcionart'];
					$Fila[2]=$laRow['descripcion'];
					$Fila[3]=$laRow['nombre'];
					$Fila[4]=$laRow['nom_cat'];
					$Fila[5]=$laRow['existencia'];
					$Fila[6]=$laRow['stockminimo'];
=======
		function consultar_articulo_id()
		{
			$this->conectar();
				$sql="SELECT * FROM am_tarticulo WHERE idArticulo='$this->idArticulo'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idArticulo'];
					$Fila[1]=$laRow['nombre'];
					$Fila[2]=$laRow['idTipo_articulo'];
					$Fila[3]=$laRow['cantidad'];
					$Fila[4]=$laRow['estatus'];
>>>>>>> caidv2
				}
			
			$this->desconectar();
			return $Fila;
		}

<<<<<<< HEAD
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
			$sql="INSERT INTO tarticulo (descripcionart,idunidadmedida,idpresentacion,idgrupo,stockminimo)VALUES(UPPER('$this->lcdescripcionart'),'$this->lcidunidadmedida','$this->lcpresentacion','$this->lcgrupo','$this->lcstockminimo')";
=======
		function registrar_articulo()
		{
			$this->conectar();
			$sql="INSERT INTO am_tarticulo (nombre,idTipo_articulo,cantidad,estatus) VALUES ('$this->nombre','$this->idTipo_articulo','0','1')";
>>>>>>> caidv2
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_articulo()
		{
			$this->conectar();
<<<<<<< HEAD
			$sql="UPDATE tarticulo SET estatusart='0' WHERE idarticulo='$this->lcIdarticulo' ";
=======
			$sql="UPDATE am_tarticulo SET estatus='0' WHERE idArticulo='$this->idArticulo' ";
>>>>>>> caidv2
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_articulo()
		{
			$this->conectar();
<<<<<<< HEAD
			$sql="UPDATE tarticulo SET estatusart='1' WHERE idarticulo='$this->lcIdarticulo' ";
=======
			$sql="UPDATE am_tarticulo SET estatus='1' WHERE idArticulo='$this->idArticulo' ";
>>>>>>> caidv2
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
<<<<<<< HEAD
		
		function editar_articulo()
		{
			$this->conectar();
			$sql="UPDATE tarticulo SET descripcionart=UPPER('$this->lcdescripcionart'), idunidadmedida='$this->lcidunidadmedida', idpresentacion='$this->lcpresentacion', idgrupo='$this->lcgrupo', stockminimo='$this->lcstockminimo' WHERE idarticulo='$this->lcIdarticulo' ";
=======

		function editar_articulo()
		{
			$this->conectar();
			$sql="UPDATE am_tarticulo SET nombre='$this->nombre',idTipo_articulo='$this->idTipo_articulo',cantidad='$this->cantidad' WHERE idArticulo='$this->idArticulo' ";
>>>>>>> caidv2
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
<<<<<<< HEAD

		function consultar_detalle_departamento($p)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				a.descripcionart,
				a.existencia,
				d.cantidad,
				d.cantidadentregada,
				s.idsalida,
				dep.idasignatura,
				date_format(s.fecha, '%d-%m-%Y') as fecha
				,date_format(s.fechaentrega, '%d-%m-%Y') as fechaentrega 
				FROM tarticulo AS a 
				INNER JOIN tsalida as s ON s.cod_tdepartamento='$p' 
				INNER JOIN dsalida as d ON d.idsalida=s.idsalida 
				INNER JOIN tasignatura as dep ON s.cod_tdepartamento=dep.idasignatura 
				WHERE s.estatus='2' and d.idarticulo=a.idarticulo and s.idsalida=d.idsalida 
				ORDER BY idsalida DESC";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
					{
				//	$Fila[$cont][0]=$laRow['idarticulo'];
					$Fila[$cont][1]=$laRow['descripcionart'];
					$Fila[$cont][2]=$laRow['idsalida'];
					$Fila[$cont][3]=$laRow['fecha'];
					$Fila[$cont][4]=$laRow['fechaentrega'];
					$Fila[$cont][5]=$laRow['cantidad'];
					$Fila[$cont][6]=$laRow['estatusart'];
					$Fila[$cont][7]=$laRow['cantidadentregada'];
					$Fila[$cont][8]=$laRow['detalle'];
					$Fila[$cont][9]=$laRow['idasignatura'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_insumos_departamento($p)
		{
			$this->conectar();
			$cont=0;
				//$sql="SELECT d.nombreasi FROM tsalida as s INNER JOIN tasignatura AS d ON s.cod_tdepartamento=d.cod_tdepartamento and d.nombreasi like '%".$p."%' WHERE s.estatus='2'  ";
				$sql="SELECT idsalida,
				date_format(tsalida.fecha,'%d-%m-%Y') as fecha,
				date_format(fechaentrega,'%d-%m-%Y') as fechaentrega,
				tasignatura.idasignatura,tasignatura.nombreasi,
				nomentrega,tpersonal.apellidounoper,
				tpersonal.nombreunoper,observacion,
				tsalida.estatus,
				count(tasignatura.idasignatura) AS cantAsignaciones
				FROM tasignatura
				LEFT JOIN tsalida ON tasignatura.idasignatura=tsalida.cod_tdepartamento
				LEFT JOIN tpersonal ON tpersonal.idpersonal=tsalida.idFresponsableDto 
				WHERE tasignatura.idasignatura ='$p'
				GROUP BY tasignatura.idasignatura";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
					{
					$Fila[0]=$laRow['cod_tdepartamento'];
				//	$Fila[1]=$laRow['descripcionart'];
				//	$Fila[$cont][2]=$laRow['descripcion'];
				//	$Fila[$cont][3]=$laRow['nombre'];
					$Fila[4]=$laRow['nombreasi'];
				//	$Fila[5]=$laRow['existencia'];
					$Fila[6]=$laRow['apellidounoper'];
					$Fila[7]=$laRow['nombreunoper'];
				//	$Fila[8]=$laRow['detalle'];
					$Fila[9]=$laRow['idsalida'];
					$Fila[10]=$laRow['cantAsignaciones'];

					$cont++;
=======
		function consultar_tipo_articulo()
		{
			$this->conectar();
				$sql="SELECT * FROM am_ttipo_articulo WHERE estatus='1';";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[]=$laRow;
>>>>>>> caidv2
				}
			
			$this->desconectar();
			return $Fila;
		}
	}
?>