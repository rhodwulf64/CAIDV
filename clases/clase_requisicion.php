<?php
	/* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
	require_once('../nucleo/ModeloConect.php');
	class clsrequisicion extends ModeloConect
	{
		private $lcIdrequisicion;
		private $lcIdentrada;
		private $lcidproveedor;
		private $lcresponsable;
		private $lcfecha;
		private $lcfecharecepcion;
		private $lcIdarticulo;
		private $lccantidad;
		private $lccantidadentregada;
		private $lcrifproveedor;
		private $lcnombreproveedor;
		private $lccontar;

		function set_Idrequisicion($pcIdrequisicion)
		{
			$this->lcIdrequisicion=$pcIdrequisicion;
		}
			function set_Identrada($pcIdentrada)
		{
			$this->lcIdentrada=$pcIdentrada;
		}
			function set_idproveedor($pcidproveedor)
		{
			$this->lcidproveedor=$pcidproveedor;
		}
		function set_responsable($pcresponsable)
		{
			$this->lcresponsable=$pcresponsable;
		}

		function set_fecha($pcfecha)
		{
			$this->lcfecha=$pcfecha;
		}
		function set_contar($pccontar)
		{
			$this->lccontar=$pccontar;
		}

		function set_fecharecepcion($pcfecharecepcion)
		{
			$this->lcfecharecepcion=$pcfecharecepcion;
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
			function set_rifproveedor($pcrifproveedor)
		{
			$this->lcrifproveedor=$pcrifproveedor;
		}

		function set_nombreproveedor($pcnombreproveedor)
		{
			$this->lcnombreproveedor=$pcnombreproveedor;
		}



		function registrar_cabecera()
		{
			$this->conectar();
			$sql="INSERT INTO tentrada (fecha)VALUES(STR_TO_DATE('$this->lcfecha', '%Y-%m-%d'))";
			$lnHecho=$this->ejecutar($sql);
			$this->set_Idrequisicion($this->maxid());
			$this->desconectar();
			return $lnHecho;
		}

		function registrar_requisicion()
		{
			$this->conectar();
			$sql="INSERT INTO dentrada (identrada,idarticulo,cantidad)VALUES('$this->lcIdrequisicion',$this->lcIdarticulo,'$this->lccantidad')";
			$lnHecho=$this->ejecutar($sql);
			$this->desconectar();
			return $lnHecho;
		}

		function registrar_cabecera_entrada()
		{
			$this->conectar();
			$sql="UPDATE tentrada SET idproveedor='$this->lcidproveedor',idFpersonal='$this->lcresponsable', fecharecepcion=STR_TO_DATE('$this->lcfecharecepcion', '%Y-%m-%d'), estatusen='2' WHERE identrada='$this->lcIdrequisicion'";
			$lnHecho=$this->ejecutar($sql);
			$this->set_Identrada($this->maxid());
			$this->desconectar();
			return $lnHecho;
		}

		function registrar_entrada()
		{
			$this->conectar();
			$sql="UPDATE dentrada SET cantidadentregada='$this->lccantidadentregada' WHERE identrada='$this->lcIdrequisicion' and idarticulo='$this->lcIdarticulo'";
			$lnHecho=$this->ejecutar($sql);
			$sql="UPDATE tarticulo SET existencia=existencia+'$this->lccantidadentregada' WHERE idarticulo='$this->lcIdarticulo'";
			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();
			return $lnHecho;
		}
		function desactivar_cabecera_entrada()
		{
			$this->conectar();
			$sql="UPDATE tentrada SET estatusen='0' WHERE identrada='$this->lcIdrequisicion'";
			$lnHecho=$this->ejecutar($sql);
			$this->set_Identrada($this->maxid());
			$this->desconectar();
			return $lnHecho;
		}

		function desactivar_entrada()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT cantidadentregada,idarticulo FROM  dentrada WHERE iddentrada='$this->lcIdrequisicion'";
			$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['cantidadentregada'];
					$Fila[2]=$laRow['idarticulo'];
					$this->set_Idarticulo($Fila[2]);
					$this->set_cantidadentregada($Fila[0]);
					$sql="UPDATE tarticulo SET existencia=existencia-'$this->lccantidadentregada' WHERE idarticulo='$this->lcIdarticulo'";
					$lnHecho=$this->ejecutar($sql);
					$cont++;
				}
			$this->desconectar();
			return $lnHecho;
		}
		function contar_articulos()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT  COUNT('idarticulo') AS contador FROM dentrada WHERE identrada='$this->lcIdrequisicion'";
			$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['contador'];
					$cont++;
				}
			$this->set_contar($Fila[0]);
			$this->desconectar();
			return $lnHecho;
		}

		function consultar_requisicion()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT date_format(fecha,'%d-%m-%Y') as fecha, tentrada.identrada,estatusen,tarticulo.descripcionart,dentrada.cantidad,tarticulo.idarticulo  FROM tentrada,dentrada,tarticulo WHERE tentrada.identrada='$this->lcIdrequisicion' and dentrada.identrada=tentrada.identrada and tarticulo.idarticulo=dentrada.idarticulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['identrada'];
					$Fila[2]=$laRow['fecha'];
					$Fila[3]=$laRow['estatusen'];
					$Fila[4]=$laRow['rif'];
					$Fila[5]=$laRow['descripcionart'];
					$Fila[6]=$laRow['cantidad'];
					$Fila[7]=$laRow['idarticulo'];

					$cont++;
				}
			$this->desconectar();
			return $Fila;
		}
		function consultar_detalle()
		{
			$this->conectar();
				$cont=0;
				$sql="SELECT tentrada.identrada,date_format(fecha,'%d/%m/%Y') as fecha,estatusen,tarticulo.descripcionart,dentrada.cantidad,tarticulo.idarticulo  FROM tentrada,dentrada,tarticulo WHERE tentrada.identrada='$this->lcIdrequisicion' and dentrada.identrada=tentrada.identrada and tarticulo.idarticulo=dentrada.idarticulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{

					$Fila[$cont][0]=$laRow['identrada'];
					$Fila[$cont][2]=$laRow['fecha'];
					$Fila[$cont][3]=$laRow['estatusen'];
					$Fila[$cont][4]=$laRow['descripcionart'];
					$Fila[$cont][5]=$laRow['cantidad'];
					$Fila[$cont][6]=$laRow['idarticulo'];

					$cont++;
				}

			$this->desconectar();
			return $Fila;

		}
		function consultar_detalle_finalizado()
		{
			$this->conectar();
				$cont=0;
				$sql="SELECT tentrada.identrada,date_format(tentrada.fecha,'%d/%m/%Y') as fecha,tentrada.estatusen,tarticulo.descripcionart,dentrada.cantidad,tarticulo.idarticulo,dentrada.cantidadentregada  FROM tentrada,dentrada,tarticulo WHERE tentrada.identrada='$this->lcIdentrada' and dentrada.identrada=tentrada.identrada and tarticulo.idarticulo=dentrada.idarticulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{

					$Fila[$cont][0]=$laRow['identrada'];
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
		function consultar_entrada()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT
				tentrada.identrada,
				date_format(tentrada.fecha,'%d/%m/%Y') as fecha,
				tentrada.estatusen,
				tarticulo.descripcionart,
				dentrada.cantidad,
				tpersonal.nombreunoper,
				tpersonal.apellidounoper,
				tpersonal.nacionalidadper,
				tpersonal.idpersonal,
				tarticulo.idarticulo,
				date_format(tentrada.fecharecepcion,'%d/%m/%Y') as fecharecepcion,
				am_tempresa.rif AS rif_prov,
				am_tempresa.nombre AS des_prov
				FROM tentrada,dentrada,tarticulo,am_tempresa,tpersonal
				WHERE am_tempresa.idEmpresa=tentrada.idproveedor and tpersonal.idpersonal=tentrada.idFpersonal and tentrada.identrada='$this->lcIdentrada' and dentrada.identrada=tentrada.identrada and tarticulo.idarticulo=dentrada.idarticulo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['identrada'];
					$Fila[2]=$laRow['fecha'];
					$Fila[3]=$laRow['estatusen'];
					$Fila[4]=$laRow['rif_prov'];
					$Fila[5]=$laRow['descripcionart'];
					$Fila[6]=$laRow['cantidad'];
					$Fila[7]=$laRow['idarticulo'];
					$Fila[8]=$laRow['fecharecepcion'];
					$Fila[9]=$laRow['des_prov'];
					$Fila[10]=$laRow['rif_prov'];
					$Fila[11]=$laRow['nombreunoper'];
					$Fila[12]=$laRow['apellidounoper'];
					$Fila[13]=$laRow['idpersonal'];
					$Fila[14]=$laRow['nacionalidadper'];

					$cont++;
				}
			$this->desconectar();
			return $Fila;
		}

		function consultar_requisicions()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, `taula_idaula`
					FROM `tentrada`, `tcantidad`, `tgrupo` WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['identrada'];
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

		function consultar_requisicions_iguales()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`
					FROM `tentrada` WHERE tcantidad_idcantidad = (SELECT tcantidad_idcantidad FROM tentrada WHERE identrada='$this->lcIdrequisicion') AND tgrupo_idgrupo = (SELECT tgrupo_idgrupo FROM tentrada WHERE identrada='$this->lcIdrequisicion') AND tasignatura_idasignatura = (SELECT tasignatura_idasignatura FROM tentrada WHERE identrada='$this->lcIdrequisicion') AND identrada<>'$this->lcIdrequisicion' AND estatuscur='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['identrada'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$cont++;
				}

			$this->desconectar();
			return $Fila;
		}

		function consultar_requisicions_cantidad_participante($idparticipante)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`
					FROM `tentrada`,tentrada_tparticipante WHERE tcantidad_idcantidad='$this->lccantidad' AND tparticipante_idparticipante='$idparticipante' AND tentrada_identrada=identrada";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['identrada'];
					$Fila[$cont][1]=$laRow['fecha'];
					$Fila[$cont][2]=$laRow['desgripcioncur'];
					$Fila[$cont][3]=$laRow['Idarticulo'];
					$Fila[$cont][4]=$laRow['estatuscur'];
					$cont++;
				}

			$this->desconectar();
			return $Fila;
		}



		function consultar_requisicions_activos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada` as id, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, `taula_idaula`,(SELECT COUNT(tparticipante_idparticipante) FROM tentrada_tparticipante WHERE tentrada_identrada=id AND estatus='1')as inscritos,nombreunodoc,apellidounodoc,iddocente
					FROM `tentrada`, `tcantidad`, `tgrupo`,tdocente WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo AND tdocente_iddocente=iddocente AND estatuscur='1'";
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

		function consultar_requisicions_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT identrada,date_format(fecha,'%d-%m-%Y') as fecha,date_format(fecharecepcion,'%d-%m-%Y') as fechaRecepcion,estatusen  FROM tentrada WHERE estatusen='1' or estatusen='2'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['identrada'];
					$Fila[$cont][2]=$laRow['fecha'];
					$Fila[$cont][3]=$laRow['estatusen'];
					$Fila[$cont][4]=$laRow['fechaRecepcion'];
					$cont++;
				}

			$this->desconectar();
			return $Fila;
		}
		function consultar_requisicion_imprimir()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT identrada,date_format(fecha,'%d-%m-%Y') as fecha,estatusen  FROM tentrada WHERE estatusen='2'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['identrada'];
					$Fila[$cont][2]=$laRow['fecha'];
					$Fila[$cont][3]=$laRow['estatusen'];
					$cont++;
				}

			$this->desconectar();
			return $Fila;
		}
		function consultar_requisicion_pendiente()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT identrada,date_format(fecha,'%d/%m/%Y') as fecha,estatusen  FROM tentrada WHERE estatusen='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['identrada'];
					$Fila[$cont][2]=$laRow['fecha'];
					$Fila[$cont][3]=$laRow['estatusen'];
					$cont++;
				}

			$this->desconectar();
			return $Fila;
		}

		function consultar_requisicion_bitacora()
		{
			$this->conectar();
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, `taula_idaula`
					FROM `tentrada`, `tcantidad`, `tgrupo` WHERE identrada='$this->lcIdrequisicion'
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



			function eliminar_requisicion()
		{
			$this->conectar();
			$sql="UPDATE tentrada SET estatusen='0' WHERE identrada='$this->lcIdrequisicion' ";
			$lnHecho=$this->ejecutar($sql);
			$this->desconectar();
			return $lnHecho;
		}

		function cerrar_requisicion($identrada_nuevo)
		{
			$this->conectar();
			$this->begin();
			$sql="UPDATE `tentrada` SET estatuscur='2' WHERE identrada='$this->lcIdrequisicion'";
			if($lnHecho=$this->ejecutar($sql))
			{
				$sql="UPDATE `tentrada_tparticipante` SET tentrada_identrada='$identrada_nuevo' WHERE tentrada_identrada='$this->lcIdrequisicion'";
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

		function editar_requisicion()
		{
			$this->conectar();
			$sql="UPDATE `tentrada` SET `fecha`=UPPER('$this->lcfecha'),`desgripcioncur`=UPPER('$this->lcIdcompra')
			,`Idarticulo`='$this->lcIdarticulo',`estatuscur`='$this->lcEstatuscur',`tcantidad_idcantidad`='$this->lccantidad'
			,`tgrupo_idgrupo`='$this->lcGrupo' WHERE identrada='$this->lcIdrequisicion'";
			$lnHecho=$this->ejecutar($sql);
			$this->desconectar();
			return $lnHecho;
		}

		function consultar_requisicions_inscripcion()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, nombreasi,
						(SELECT count(identrada_participante)
							FROM tentrada_tparticipante
							WHERE tentrada_identrada=identrada AND estatus='1') AS inscritos
					FROM `tentrada`, `tcantidad`, `tgrupo`, tasignatura
					WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo
					AND tasignatura_idasignatura = idasignatura AND estatuscur='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['identrada'];
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

		function consultar_requisicions_inscritos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idrequisicion`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, nombreasi,
						(SELECT count(idrequisicion_participante)
							FROM tentrada_tparticipante
							WHERE tentrada_idrequisicion=idrequisicion AND estatus='1') AS inscritos
					FROM `tentrada`, `tcantidad`, `tgrupo`, tasignatura,tentrada_tparticipante
					WHERE tentrada_idrequisicion=idrequisicion AND idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo
					AND tasignatura_idasignatura = idasignatura AND estatuscur='1' AND estatus='1' GROUP BY idrequisicion";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idrequisicion'];
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
				$sql="SELECT `idrequisicion`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`,fechainilap, `nombregru`, `descripciongru`, nombreasi, idasignatura, (SELECT count(idrequisicion_participante)
							FROM tentrada_tparticipante
							WHERE tentrada_idrequisicion=idrequisicion AND estatus='1') AS inscritos
					FROM `tentrada`, `tcantidad`, `tgrupo`, tasignatura
					WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo
					AND tasignatura_idasignatura = idasignatura AND idrequisicion='$this->lcIdrequisicion'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idrequisicion'];
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
				$sql="SELECT  nombreunopar, nombredospar, apellidounopar, apellidodospar, cedulapar, tparticipante.idparticipante,fotoins,(YEAR(CURDATE())-YEAR(tparticipante.fechanacimientopar)) - (RIGHT(CURDATE(),5)<RIGHT(tparticipante.fechanacimientopar,5)) as edad,idrequisicion_participante
					FROM  tparticipante,tentrada_tparticipante,tinscripcion
					WHERE tparticipante.idparticipante=tinscripcion.idparticipante AND tparticipante_idparticipante=tparticipante.idparticipante AND tentrada_idrequisicion='$this->lcIdrequisicion' AND estatus='1'";

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
					$Fila[$cont][8]=$laRow['idrequisicion_participante'];
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
					(select tp.cedulapar FROM tparticipante AS tp , tentrada, tgrupo
						WHERE (YEAR(CURDATE())-YEAR(tp.fechanacimientopar)) - (RIGHT(CURDATE(),5)<RIGHT(tp.fechanacimientopar,5))  BETWEEN edadmin AND edadmax
						AND idgrupo = tgrupo_idgrupo AND tentrada.idrequisicion='$this->lcIdrequisicion')
					AND tparticipante.idparticipante NOT IN (SELECT tparticipante_idparticipante FROM tentrada_tparticipante,tentrada,tasignatura WHERE tentrada_idrequisicion='$this->lcIdrequisicion' AND tparticipante_idparticipante=tparticipante.idparticipante AND tasignatura_idasignatura=idasignatura AND estatus='1')
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
					WHERE tparticipante.idparticipante  IN (SELECT p.idparticipante FROM tparticipante AS p, tentrada AS c, tentrada_tparticipante, tasignatura
					WHERE idasignatura = tasignatura_idasignatura
					AND tentrada_idrequisicion = '$this->lcIdrequisicion'
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
				WHERE idparticipante  IN (SELECT p.idparticipante FROM tparticipante AS p, tentrada AS c, tentrada_tparticipante, tasignatura
				WHERE idasignatura = tasignatura_idasignatura
				AND tentrada_idrequisicion = '$this->lcIdrequisicion'
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

		function requisicions_disponibles($edad,$idparticipante)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idrequisicion`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`,nombreasi,idasignatura
					FROM `tentrada`, `tcantidad`, `tgrupo`,tasignatura WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo AND tasignatura_idasignatura=idasignatura AND estatuscur='1' AND $edad>=edadmin AND $edad<=edadmax AND idrequisicion NOT IN(SELECT tentrada_idrequisicion FROM tentrada_tparticipante WHERE tparticipante_idparticipante='$idparticipante' AND estatus='1')";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idrequisicion'];
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

		function requisicions_inscritos($id)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `idrequisicion`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`,nombreasi,idasignatura
					FROM `tentrada`, `tcantidad`, `tgrupo`,tasignatura,tentrada_tparticipante WHERE tparticipante_idparticipante='$id' AND idrequisicion=tentrada_idrequisicion AND estatus='1' AND idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo AND tasignatura_idasignatura=idasignatura AND estatuscur='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idrequisicion'];
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
				FROM tentrada, tcantidad, tasignatura, taula,tgrupo
				WHERE
				tcantidad.idcantidad=tcantidad_idcantidad AND tgrupo.idgrupo = tgrupo_idgrupo
				AND idasignatura = tasignatura_idasignatura AND idaula = taula_idaula AND idrequisicion IN
				 (SELECT c.tentrada_idrequisicion FROM tentrada_tparticipante AS c WHERE tparticipante_idparticipante='$Participante') ORDER BY tcantidad_idcantidad;";
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
				$sql="SELECT * FROM `tinstrumento`,tasignatura,tentrada WHERE idrequisicion='$this->lcIdrequisicion' AND tentrada.tasignatura_idasignatura=idasignatura AND idasignatura=tinstrumento.tasignatura_idasignatura AND estatusins='1'";
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

		function historial_requisicions()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT fecha, nombrelap, nombreasi, nombreaul, nombregru
				,
				(SELECT count(*) FROM tentrada_tparticipante WHERE tentrada_idrequisicion=idrequisicion AND estatus='1') AS cantidad_participantes
				,
				(SELECT count(*) FROM tentrada_tparticipante WHERE tentrada_idrequisicion=idrequisicion AND estatus='2') AS cantidad_retirados
				FROM tentrada, tcantidad, tasignatura, taula,tgrupo
				WHERE
				tcantidad.idcantidad=tcantidad_idcantidad AND tgrupo.idgrupo = tgrupo_idgrupo
				AND idasignatura = tasignatura_idasignatura AND idaula = taula_idaula AND idrequisicion IN
				 (SELECT tc.idrequisicion FROM tentrada AS tc WHERE tc.tcantidad_idcantidad='$this->lccantidad' );";
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

		function historial_requisicion()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT fecha, nombrelap, nombreasi, nombreaul, nombregru
				,
				(SELECT count(*) FROM tentrada_tparticipante WHERE tentrada_idrequisicion=idrequisicion AND estatus='1') AS cantidad_participantes
				,
				(SELECT count(*) FROM tentrada_tparticipante WHERE tentrada_idrequisicion=idrequisicion AND estatus='2') AS cantidad_retirados
				FROM tentrada, tcantidad, tasignatura, taula,tgrupo
				WHERE
				tcantidad.idcantidad=tcantidad_idcantidad AND tgrupo.idgrupo = tgrupo_idgrupo
				AND idasignatura = tasignatura_idasignatura AND idaula = taula_idaula AND idrequisicion IN
				 ('$this->lcIdrequisicion');";
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
