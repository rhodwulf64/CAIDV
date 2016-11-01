<?php
	/* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
	require_once('../nucleo/ModeloConect.php');
	class clssalida extends ModeloConect
	{
		private $lcIdsalida;
		private $lccod_tdepartamento;
		private $lcfecha;
		private $lcfechaentrega;
		private $lcIdarticulo;
		private $lccantidad;
		private $lccantidadentregada;
		private $lcrifdepartamento;
		private $lcnombredepartamento;
		private $lcpersona;
		private $lcobservacion;
		private $lcresponsable;
		private $lcresponsableDpto;
	
		function set_Idsalida($pcIdsalida)
		{
			$this->lcIdsalida=$pcIdsalida;
		}
		function set_persona($pcpersona)
		{
			$this->lcpersona=$pcpersona;
		}
		function set_responsable($pcresponsable)
		{
			$this->lcresponsable=$pcresponsable;
		}
		function set_responsableDpto($pcresponsableDpto)
		{
			$this->lcresponsableDpto=$pcresponsableDpto;
		}

		function set_cod_tdepartamento($pccod_tdepartamento)
		{
			$this->lccod_tdepartamento=$pccod_tdepartamento;
		}
		function set_fecha($pcfecha)
		{
			$this->lcfecha=$pcfecha;
		}
		function set_observacion($pcobservacion)
		{
			$this->lcobservacion=$pcobservacion;
		}
		function set_fechaentrega($pcfechaentrega)
		{
			$this->lcfechaentrega=$pcfechaentrega;
		}

		function set_Idarticulo($pcIdarticulo)
		{
			$this->lcIdarticulo=$pcIdarticulo;
		}

		function set_cantidad($pccantidad)
		{
			$this->lccantidad=$pccantidad;
		}
		function set_cantidadentregada($pccantidadentregada)
		{
			$this->lccantidadentregada=$pccantidadentregada;
		}
			function set_rifdepartamento($pcrifdepartamento)
		{
			$this->lcrifdepartamento=$pcrifdepartamento;
		}

		function set_nombredepartamento($pcnombredepartamento)
		{
			$this->lcnombredepartamento=$pcnombredepartamento;
		}



		function registrar_cabecera()
		{
			$this->conectar();
			$sql="INSERT INTO tsalida (cod_tdepartamento,fecha,idFpersonal,idFresponsableDto,cedrecibido)VALUES('$this->lccod_tdepartamento',STR_TO_DATE('$this->lcfecha', '%Y-%m-%d'),'$this->lcresponsable','$this->lcresponsableDpto','$this->lcpersona')";
			$lnHecho=$this->ejecutar($sql);	
			$this->set_Idsalida($this->maxid());
			$this->desconectar();
			return $lnHecho;
		}

		function registrar_detalle()
		{
			$this->conectar();
			$sql="INSERT INTO dsalida (idsalida,idarticulo,cantidad)VALUES('$this->lcIdsalida',$this->lcIdarticulo,'$this->lccantidad')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function registrar_cabecera_salida()
		{
			$this->conectar();
			$sql="UPDATE tsalida SET fechaentrega=STR_TO_DATE('$this->lcfechaentrega', '%Y-%m-%d'),observacion='$this->lcobservacion',nomentrega='$this->lcresponsable',estatus='2' WHERE idsalida='$this->lcIdsalida'";
			$lnHecho=$this->ejecutar($sql);	
			$this->desconectar();
			return $lnHecho;
		}

		function registrar_salida()
		{
			$this->conectar();
			$sql="UPDATE dsalida SET cantidadentregada='$this->lccantidadentregada' WHERE idsalida='$this->lcIdsalida' and idarticulo='$this->lcIdarticulo'";
			$lnHecho=$this->ejecutar($sql);	
			$sql="UPDATE tarticulo SET existencia=existencia-'$this->lccantidadentregada' WHERE idarticulo='$this->lcIdarticulo'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function consultar_salida()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT tsalida.idsalida,tasignatura.nombreasi,date_format(fecha,'%d-%m-%Y') as fecha,tsalida.estatus,tpersonal.nombreunoper,tpersonal.apellidounoper,tRdpto.idpersonal AS ceduRdpto,tRdpto.nombreunoper AS nombreRdpto,tRdpto.apellidounoper AS ApellidoRdpto,tarticulo.descripcionart,dsalida.cantidad FROM tsalida,tasignatura,dsalida,tarticulo,tpersonal,tpersonal AS tRdpto WHERE  tpersonal.idpersonal=tsalida.idFpersonal and tRdpto.idpersonal=tsalida.idFresponsableDto and tasignatura.idasignatura=tsalida.cod_tdepartamento and tsalida.idsalida='$this->lcIdsalida' and dsalida.idsalida=tsalida.idsalida and tarticulo.idarticulo=dsalida.idarticulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idsalida'];
					$Fila[2]=$laRow['nombreasi'];
					$Fila[3]=$laRow['fecha'];
					$Fila[4]=$laRow['estatus'];
					$Fila[5]=$laRow['nombreunoper'];
					$Fila[6]=$laRow['descripcionart'];
					$Fila[7]=$laRow['cantidad'];
					$Fila[8]=$laRow['apellidounoper'];
					$Fila[9]=$laRow['ceduRdpto'];
					$Fila[10]=$laRow['nombreRdpto'];
					$Fila[11]=$laRow['ApellidoRdpto'];

					$cont++;
				}
			$this->desconectar();
			return $Fila;
		}

		function consultar_salida_fin()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT tsalida.idsalida,tasignatura.nombreasi,date_format(fecha,'%d-%m-%Y') as fecha,tsalida.estatus,tpersonal.nombreunoper,tpersonal.apellidounoper,tRdpto.idpersonal AS ceduRdpto,tRdpto.nombreunoper AS nombreRdpto,tRdpto.apellidounoper AS ApellidoRdpto,tarticulo.descripcionart,dsalida.cantidad,tsalida.observacion,tsalida.fechaentrega,tsalida.nomentrega FROM tsalida,tasignatura,dsalida,tarticulo,tpersonal,tpersonal AS tRdpto WHERE  tpersonal.idpersonal=tsalida.idFpersonal and tRdpto.idpersonal=tsalida.idFresponsableDto and tasignatura.idasignatura=tsalida.cod_tdepartamento and tsalida.idsalida='$this->lcIdsalida' and dsalida.idsalida=tsalida.idsalida and tarticulo.idarticulo=dsalida.idarticulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idsalida'];
					$Fila[2]=$laRow['nombreasi'];
					$Fila[3]=$laRow['fecha'];
					$Fila[4]=$laRow['estatus'];
					$Fila[5]=$laRow['nombreunoper'];
					$Fila[6]=$laRow['descripcionart'];
					$Fila[7]=$laRow['cantidad'];
					$Fila[8]=$laRow['apellidounoper'];
					$Fila[9]=$laRow['fechaentrega'];
					$Fila[10]=$laRow['observacion'];
					$Fila[11]=$laRow['nomentrega'];
					$Fila[12]=$laRow['ceduRdpto'];
					$Fila[13]=$laRow['nombreRdpto'];
					$Fila[14]=$laRow['ApellidoRdpto'];

					$cont++;
				}
			$this->desconectar();
			return $Fila;
		}
		function consultar_persona()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT tpersonal.nombreunoper,tpersonal.apellidounoper FROM tsalida,tpersonal WHERE  tpersonal.idpersonal=tsalida.idFpersonal and tsalida.idsalida='$this->lcIdsalida'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['nombreunoper'];
					$Fila[1]=$laRow['apellidounoper'];
					$cont++;
				}
			$this->desconectar();
			return $Fila;
		}
		function consultar_detalle()
		{
			$this->conectar();
				$cont=0;
				$sql="SELECT tsalida.idsalida,date_format(fecha,'%d-%m-%Y') as fecha,tsalida.estatus,tarticulo.descripcionart,dsalida.cantidad,tarticulo.existencia,tarticulo.idarticulo  FROM tsalida,dsalida,tarticulo WHERE tsalida.idsalida='$this->lcIdsalida' and dsalida.idsalida=tsalida.idsalida and tarticulo.idarticulo=dsalida.idarticulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{

					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][2]=$laRow['fecha'];
					$Fila[$cont][3]=$laRow['estatus'];
					$Fila[$cont][4]=$laRow['descripcionart'];
					$Fila[$cont][5]=$laRow['cantidad'];
					$Fila[$cont][6]=$laRow['existencia'];
					$Fila[$cont][7]=$laRow['idarticulo'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;

		}
		function consultar_salida_imprimir()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				idsalida,
				date_format(fecha,'%d-%m-%Y') AS fecha,
				date_format(fechaentrega,'%d-%m-%Y') AS fechaentrega,
				tasignatura.nombreasi,
				nomentrega,
				tpersonal.apellidounoper,
				tRdpto.idpersonal AS ceduRdpto,
				tRdpto.nombreunoper AS nombreRdpto,
				tRdpto.apellidounoper AS ApellidoRdpto,
				tpersonal.nombreunoper,
				tpersonal.nacionalidadper,
				tpersonal.idpersonal,
				observacion,
				tsalida.estatus  
				FROM tsalida 
				LEFT JOIN tasignatura ON tasignatura.idasignatura=tsalida.cod_tdepartamento
				LEFT JOIN tpersonal ON tpersonal.idpersonal=tsalida.idFpersonal
				LEFT JOIN tpersonal AS tRdpto ON tRdpto.idpersonal=tsalida.idFresponsableDto
				WHERE tsalida.estatus='2'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idsalida'];
					$Fila[1]=$laRow['fecha'];
					$Fila[2]=$laRow['estatus'];
					$Fila[3]=$laRow['fechaentrega'];
					$Fila[4]=$laRow['nombreasi'];
					$Fila[5]=$laRow['nomentrega'];
					$Fila[6]=$laRow['apellidounoper'];
					$Fila[7]=$laRow['nombreunoper'];
					$Fila[8]=$laRow['observacion'];
					$Fila[9]=$laRow['ceduRdpto'];
					$Fila[10]=$laRow['nombreRdpto'];
					$Fila[11]=$laRow['ApellidoRdpto'];
					$Fila[12]=$laRow['nacionalidadper'];
					$Fila[13]=$laRow['idpersonal'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_salida_listo()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idsalida,date_format(fecha,'%d-%m-%Y') as fecha,estatus  FROM tsalida WHERE estatus='2'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][2]=$laRow['fecha'];
					$Fila[$cont][3]=$laRow['estatus'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}
		function consultar_detalle_finalizado()
		{
			$this->conectar();
				$cont=0;
				$sql="SELECT tsalida.idsalida,date_format(tsalida.fecha,'%d/%m/%Y') as fecha,tsalida.estatus,tarticulo.descripcionart,dsalida.cantidad,tarticulo.idarticulo,dsalida.cantidadentregada  FROM tsalida,dsalida,tarticulo WHERE tsalida.idsalida='$this->lcIdsalida' and dsalida.idsalida=tsalida.idsalida and tarticulo.idarticulo=dsalida.idarticulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{

					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][2]=$laRow['fecha'];
					$Fila[$cont][3]=$laRow['estatus'];
					$Fila[$cont][4]=$laRow['descripcionart'];
					$Fila[$cont][5]=$laRow['cantidad'];
					$Fila[$cont][6]=$laRow['idarticulo'];
					$Fila[$cont][7]=$laRow['cantidadentregada'];

					$cont++;
				}
			
			$this->desconectar();
			return $Fila;

		}

		function consultar_salidas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idsalida`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, `taula_idaula`
					FROM `tsalida`, `tcantidad`, `tgrupo` WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$Fila[$cont][5]=$laRow['tcantidad_idcantidad'];
					$Fila[$cont][6]=$laRow['tgrupo_idgrupo'];
					$Fila[$cont][7]=$laRow['nombrelap'];
					$Fila[$cont][8]=$laRow['nombregru'];
					$Fila[$cont][9]=$laRow['descripciongru'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_salidas_iguales()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idsalida`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`
					FROM `tsalida` WHERE tcantidad_idcantidad = (SELECT tcantidad_idcantidad FROM tsalida WHERE idsalida='$this->lcIdsalida') AND tgrupo_idgrupo = (SELECT tgrupo_idgrupo FROM tsalida WHERE idsalida='$this->lcIdsalida') AND tasignatura_idasignatura = (SELECT tasignatura_idasignatura FROM tsalida WHERE idsalida='$this->lcIdsalida') AND idsalida<>'$this->lcIdsalida' AND estatuscur='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_salidas_cantidad_participante($idparticipante)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idsalida`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`
					FROM `tsalida`,tsalida_tparticipante WHERE tcantidad_idcantidad='$this->lccantidad' AND tparticipante_idparticipante='$idparticipante' AND tsalida_idsalida=idsalida";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		

		function consultar_salidas_activos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idsalida` as id, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, `taula_idaula`,(SELECT COUNT(tparticipante_idparticipante) FROM tsalida_tparticipante WHERE tsalida_idsalida=id AND estatus='1')as inscritos,nombreunodoc,apellidounodoc,iddocente
					FROM `tsalida`, `tcantidad`, `tgrupo`,tdocente WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo AND tdocente_iddocente=iddocente AND estatuscur='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$Fila[$cont][5]=$laRow['tcantidad_idcantidad'];
					$Fila[$cont][6]=$laRow['tgrupo_idgrupo'];
					$Fila[$cont][7]=$laRow['nombrelap'];
					$Fila[$cont][8]=$laRow['nombregru'];
					$Fila[$cont][9]=$laRow['descripciongru'];
					$Fila[$cont][10]=$laRow['inscritos'];					
					$Fila[$cont][11]=$laRow['nombreunodoc'];
					$Fila[$cont][12]=$laRow['apellidounodoc'];
					$Fila[$cont][13]=$laRow['iddocente'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_salidas_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT idsalida,tasignatura.nombreasi,date_format(fecha,'%d-%m-%Y') as fecha,date_format(fechaentrega,'%d-%m-%Y') as fechaSalida,tsalida.estatus  FROM tsalida,tasignatura WHERE tasignatura.idasignatura=tsalida.cod_tdepartamento AND tsalida.estatus!='0'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][2]=$laRow['nombreasi'];
					$Fila[$cont][3]=$laRow['fecha'];
					$Fila[$cont][4]=$laRow['estatus'];
					$Fila[$cont][5]=$laRow['fechaSalida'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_salida_bitacora()
		{
			$this->conectar();
				$sql="SELECT `idsalida`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, `taula_idaula`
					FROM `tsalida`, `tcantidad`, `tgrupo` WHERE idsalida='$this->lcIdsalida'
					AND idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					foreach ($laRow as $key => $value)
					{
						$Fila[$key]=$value;
					}
				}
			$this->desconectar();
			return $Fila;
		}

		

			function eliminar_salida()
		{
			$this->conectar();
			$sql="UPDATE tsalida SET estatus='0' WHERE idsalida='$this->lcIdsalida' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function cerrar_salida($idsalida_nuevo)
		{
			$this->conectar();
			$this->begin();
			$sql="UPDATE `tsalida` SET estatuscur='2' WHERE idsalida='$this->lcIdsalida'";
			if($lnHecho=$this->ejecutar($sql))
			{
				$sql="UPDATE `tsalida_tparticipante` SET tsalida_idsalida='$idsalida_nuevo' WHERE tsalida_idsalida='$this->lcIdsalida'";
				if(!$lnHecho=$this->ejecutar($sql))
					$this->rollback();
			}
			else
				$this->rollback();

			if($lnHecho)
				$this->commit();

			$this->desconectar();
			return $lnHecho;
		}

		function editar_salida()
		{
			$this->conectar();
			$sql="UPDATE `tsalida` SET `fecha`=UPPER('$this->lcfecha'),`desgripcioncur`=UPPER('$this->lcIdcompra')
			,`Idarticulo`='$this->lcIdarticulo',`estatuscur`='$this->lcEstatuscur',`tcantidad_idcantidad`='$this->lccantidad'
			,`tgrupo_idgrupo`='$this->lcGrupo' WHERE idsalida='$this->lcIdsalida'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function consultar_salidas_inscripcion()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idsalida`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, nombreasi, 
						(SELECT count(idsalida_participante) 
							FROM tsalida_tparticipante 
							WHERE tsalida_idsalida=idsalida AND estatus='1') AS inscritos
					FROM `tsalida`, `tcantidad`, `tgrupo`, tasignatura
					WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo
					AND tasignatura_idasignatura = idasignatura AND estatuscur='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$Fila[$cont][5]=$laRow['tcantidad_idcantidad'];
					$Fila[$cont][6]=$laRow['tgrupo_idgrupo'];
					$Fila[$cont][7]=$laRow['nombrelap'];
					$Fila[$cont][8]=$laRow['nombregru'];
					$Fila[$cont][9]=$laRow['descripciongru'];
					$Fila[$cont][10]=$laRow['nombreasi'];
					$Fila[$cont][11]=(isset($laRow['inscritos']))?$laRow['inscritos']:"0";
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_salidas_inscritos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idsalida`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, nombreasi, 
						(SELECT count(idsalida_participante) 
							FROM tsalida_tparticipante 
							WHERE tsalida_idsalida=idsalida AND estatus='1') AS inscritos
					FROM `tsalida`, `tcantidad`, `tgrupo`, tasignatura,tsalida_tparticipante
					WHERE tsalida_idsalida=idsalida AND idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo
					AND tasignatura_idasignatura = idasignatura AND estatuscur='1' AND estatus='1' GROUP BY idsalida";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$Fila[$cont][5]=$laRow['tcantidad_idcantidad'];
					$Fila[$cont][6]=$laRow['tgrupo_idgrupo'];
					$Fila[$cont][7]=$laRow['nombrelap'];
					$Fila[$cont][8]=$laRow['nombregru'];
					$Fila[$cont][9]=$laRow['descripciongru'];
					$Fila[$cont][10]=$laRow['nombreasi'];
					$Fila[$cont][11]=(isset($laRow['inscritos']))?$laRow['inscritos']:"0";
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_datos_inscripcion()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idsalida`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`,fechainilap, `nombregru`, `descripciongru`, nombreasi, idasignatura, (SELECT count(idsalida_participante) 
							FROM tsalida_tparticipante 
							WHERE tsalida_idsalida=idsalida AND estatus='1') AS inscritos
					FROM `tsalida`, `tcantidad`, `tgrupo`, tasignatura
					WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo
					AND tasignatura_idasignatura = idasignatura AND idsalida='$this->lcIdsalida'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idsalida'];
					$Fila[1]=$laRow['fecha'];
					$Fila[2]=$laRow['desgripcioncur'];
					$Fila[3]=$laRow['Idarticulo'];
					$Fila[4]=$laRow['estatuscur'];
					$Fila[5]=$laRow['tcantidad_idcantidad'];
					$Fila[6]=$laRow['tgrupo_idgrupo'];
					$Fila[7]=$laRow['nombrelap'];
					$Fila[8]=$laRow['nombregru'];
					$Fila[9]=$laRow['descripciongru'];
					$Fila[10]=$laRow['nombreasi'];
					$Fila[11]=$laRow['idasignatura'];
					$Fila[12]=$laRow['inscritos'];
					$Fila[13]=$laRow['fechainilap'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_participantes()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT  nombreunopar, nombredospar, apellidounopar, apellidodospar, cedulapar, tparticipante.idparticipante,fotoins,(YEAR(CURDATE())-YEAR(tparticipante.fechanacimientopar)) - (RIGHT(CURDATE(),5)<RIGHT(tparticipante.fechanacimientopar,5)) as edad,idsalida_participante
					FROM  tparticipante,tsalida_tparticipante,tinscripcion
					WHERE tparticipante.idparticipante=tinscripcion.idparticipante AND tparticipante_idparticipante=tparticipante.idparticipante AND tsalida_idsalida='$this->lcIdsalida' AND estatus='1'";

				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['nombreunopar'];
					$Fila[$cont][1]=$laRow['nombredospar'];
					$Fila[$cont][2]=$laRow['apellidounopar'];
					$Fila[$cont][3]=$laRow['apellidodospar'];
					$Fila[$cont][4]=$laRow['cedulapar'];
					$Fila[$cont][5]=$laRow['idparticipante'];
					$Fila[$cont][6]=$laRow['fotoins'];
					$Fila[$cont][7]=$laRow['edad'];
					$Fila[$cont][8]=$laRow['idsalida_participante'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		

		function consultar_participantes_noinscritos()
		{
			$this->conectar();
			$cont=0;

					 $sql="SELECT  nombreunopar, nombredospar, apellidounopar, apellidodospar, cedulapar, tparticipante.idparticipante,fotoins,(YEAR(CURDATE())-YEAR(fechanacimientopar)) - (RIGHT(CURDATE(),5)<RIGHT(fechanacimientopar,5)) as edad 
					FROM  tparticipante,tinscripcion
					WHERE  estatuspar='1' AND tparticipante.idparticipante=tinscripcion.idparticipante AND cedulapar IN 
					(select tp.cedulapar FROM tparticipante AS tp , tsalida, tgrupo  
						WHERE (YEAR(CURDATE())-YEAR(tp.fechanacimientopar)) - (RIGHT(CURDATE(),5)<RIGHT(tp.fechanacimientopar,5))  BETWEEN edadmin AND edadmax
						AND idgrupo = tgrupo_idgrupo AND tsalida.idsalida='$this->lcIdsalida')
					AND tparticipante.idparticipante NOT IN (SELECT tparticipante_idparticipante FROM tsalida_tparticipante,tsalida,tasignatura WHERE tsalida_idsalida='$this->lcIdsalida' AND tparticipante_idparticipante=tparticipante.idparticipante AND tasignatura_idasignatura=idasignatura AND estatus='1')
					 ";

				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['nombreunopar'];
					$Fila[$cont][1]=$laRow['nombredospar'];
					$Fila[$cont][2]=$laRow['apellidounopar'];
					$Fila[$cont][3]=$laRow['apellidodospar'];
					$Fila[$cont][4]=$laRow['cedulapar'];
					$Fila[$cont][5]=$laRow['idparticipante'];
					$Fila[$cont][6]=$laRow['fotoins'];
					$Fila[$cont][7]=$laRow['edad'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_participantes_inscritos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT  nombreunopar, nombredospar, apellidounopar, apellidodospar, cedulapar, tparticipante.idparticipante,fotoins
					FROM  tparticipante,tinscripcion
					WHERE tparticipante.idparticipante  IN (SELECT p.idparticipante FROM tparticipante AS p, tsalida AS c, tsalida_tparticipante, tasignatura
					WHERE idasignatura = tasignatura_idasignatura
					AND tsalida_idsalida = '$this->lcIdsalida'
					AND p.idparticipante = tparticipante_idparticipante AND estatus='1') AND tparticipante.idparticipante=tinscripcion.idparticipante";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['nombreunopar'];
					$Fila[$cont][1]=$laRow['nombredospar'];
					$Fila[$cont][2]=$laRow['apellidounopar'];
					$Fila[$cont][3]=$laRow['apellidodospar'];
					$Fila[$cont][4]=$laRow['cedulapar'];
					$Fila[$cont][5]=$laRow['idparticipante'];
					$Fila[$cont][6]=$laRow['fotoins'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_participantes_retirados()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT  nombreunopar, nombredospar, apellidounopar, apellidodospar, cedulapar, idparticipante  
				FROM  tparticipante
				WHERE idparticipante  IN (SELECT p.idparticipante FROM tparticipante AS p, tsalida AS c, tsalida_tparticipante, tasignatura
				WHERE idasignatura = tasignatura_idasignatura
				AND tsalida_idsalida = '$this->lcIdsalida'
				AND p.idparticipante = tparticipante_idparticipante AND estatus='2')";
			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['nombreunopar'];
				$Fila[$cont][1]=$laRow['nombredospar'];
				$Fila[$cont][2]=$laRow['apellidounopar'];
				$Fila[$cont][3]=$laRow['apellidodospar'];
				$Fila[$cont][4]=$laRow['cedulapar'];
				$Fila[$cont][5]=$laRow['idparticipante'];
				$cont++;
			}
			$this->desconectar();
			return $Fila;
		}

		function salidas_disponibles($edad,$idparticipante)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idsalida`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`,nombreasi,idasignatura
					FROM `tsalida`, `tcantidad`, `tgrupo`,tasignatura WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo AND tasignatura_idasignatura=idasignatura AND estatuscur='1' AND $edad>=edadmin AND $edad<=edadmax AND idsalida NOT IN(SELECT tsalida_idsalida FROM tsalida_tparticipante WHERE tparticipante_idparticipante='$idparticipante' AND estatus='1')";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$Fila[$cont][5]=$laRow['tcantidad_idcantidad'];
					$Fila[$cont][6]=$laRow['tgrupo_idgrupo'];
					$Fila[$cont][7]=$laRow['nombrelap'];
					$Fila[$cont][8]=$laRow['nombregru'];
					$Fila[$cont][9]=$laRow['descripciongru'];
					$Fila[$cont][10]=$laRow['idasignatura'];
					$Fila[$cont][11]=$laRow['nombreasi'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function salidas_inscritos($id)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idsalida`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`,nombreasi,idasignatura
					FROM `tsalida`, `tcantidad`, `tgrupo`,tasignatura,tsalida_tparticipante WHERE tparticipante_idparticipante='$id' AND idsalida=tsalida_idsalida AND estatus='1' AND idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo AND tasignatura_idasignatura=idasignatura AND estatuscur='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idsalida'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$Fila[$cont][5]=$laRow['tcantidad_idcantidad'];
					$Fila[$cont][6]=$laRow['tgrupo_idgrupo'];
					$Fila[$cont][7]=$laRow['nombrelap'];
					$Fila[$cont][8]=$laRow['nombregru'];
					$Fila[$cont][9]=$laRow['descripciongru'];
					$Fila[$cont][10]=$laRow['idasignatura'];
					$Fila[$cont][11]=$laRow['nombreasi'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function historial_participante($Participante)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT fecha, nombrelap, nombreasi, nombreaul, nombregru 
				FROM tsalida, tcantidad, tasignatura, taula,tgrupo 
				WHERE 
				tcantidad.idcantidad=tcantidad_idcantidad AND tgrupo.idgrupo = tgrupo_idgrupo 
				AND idasignatura = tasignatura_idasignatura AND idaula = taula_idaula AND idsalida IN
				 (SELECT c.tsalida_idsalida FROM tsalida_tparticipante AS c WHERE tparticipante_idparticipante='$Participante') ORDER BY tcantidad_idcantidad;";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['fecha'];
					$Fila[$cont][1]=$laRow['nombrelap'];
					$Fila[$cont][2]=$laRow['nombreasi'];
					$Fila[$cont][3]=$laRow['nombreaul'];
					$Fila[$cont][4]=$laRow['nombregru'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_instrumentos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tinstrumento`,tasignatura,tsalida WHERE idsalida='$this->lcIdsalida' AND tsalida.tasignatura_idasignatura=idasignatura AND idasignatura=tinstrumento.tasignatura_idasignatura AND estatusins='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idinstrumento'];
					$Fila[$cont][1]=$laRow['nombreins'];
					$Fila[$cont][2]=$laRow['nombreasi'];
					$Fila[$cont][3]=$laRow['estatusins'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function historial_salidas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT fecha, nombrelap, nombreasi, nombreaul, nombregru 
				, 
				(SELECT count(*) FROM tsalida_tparticipante WHERE tsalida_idsalida=idsalida AND estatus='1') AS cantidad_participantes
				,
				(SELECT count(*) FROM tsalida_tparticipante WHERE tsalida_idsalida=idsalida AND estatus='2') AS cantidad_retirados
				FROM tsalida, tcantidad, tasignatura, taula,tgrupo 
				WHERE 
				tcantidad.idcantidad=tcantidad_idcantidad AND tgrupo.idgrupo = tgrupo_idgrupo 
				AND idasignatura = tasignatura_idasignatura AND idaula = taula_idaula AND idsalida IN
				 (SELECT tc.idsalida FROM tsalida AS tc WHERE tc.tcantidad_idcantidad='$this->lccantidad' );";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['fecha'];
					$Fila[$cont][1]=$laRow['nombrelap'];
					$Fila[$cont][2]=$laRow['nombreasi'];
					$Fila[$cont][3]=$laRow['nombreaul'];
					$Fila[$cont][4]=$laRow['nombregru'];
					$Fila[$cont][5]=$laRow['cantidad_participantes'];
					$Fila[$cont][6]=$laRow['cantidad_retirados'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function historial_salida()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT fecha, nombrelap, nombreasi, nombreaul, nombregru 
				, 
				(SELECT count(*) FROM tsalida_tparticipante WHERE tsalida_idsalida=idsalida AND estatus='1') AS cantidad_participantes
				,
				(SELECT count(*) FROM tsalida_tparticipante WHERE tsalida_idsalida=idsalida AND estatus='2') AS cantidad_retirados
				FROM tsalida, tcantidad, tasignatura, taula,tgrupo 
				WHERE 
				tcantidad.idcantidad=tcantidad_idcantidad AND tgrupo.idgrupo = tgrupo_idgrupo 
				AND idasignatura = tasignatura_idasignatura AND idaula = taula_idaula AND idsalida IN
				 ('$this->lcIdsalida');";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila['fecha']=$laRow['fecha'];
					$Fila['nombrelap']=$laRow['nombrelap'];
					$Fila['nombreasi']=$laRow['nombreasi'];
					$Fila['nombreaul']=$laRow['nombreaul'];
					$Fila['nombregru']=$laRow['nombregru'];
					$Fila['cantidad_participantes']=$laRow['cantidad_participantes'];
					$Fila['cantidad_retirados']=$laRow['cantidad_retirados'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}


	}
?>