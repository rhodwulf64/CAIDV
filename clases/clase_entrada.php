<?php
	/* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
	require_once('../nucleo/ModeloConect.php');
	class clsentrada extends ModeloConect
	{
		private $lcIdentrada;
		private $lcIdcompra;
		private $lcidproveedor;
		private $lcresponsable;
		private $lcfecha;
		private $lcIdarticulo;
		private $lccantidad;
		private $lcrifproveedor;
		private $lcnombreproveedor;
	
		function set_Identrada($pcIdentrada)
		{
			$this->lcIdentrada=$pcIdentrada;
		}

		function set_idproveedor($pcidproveedor)
		{
			$this->lcidproveedor=$pcidproveedor;
		}
		function set_fecha($pcfecha)
		{
			$this->lcfecha=$pcfecha;
		}

		function set_Idcompra($pcIdcompra)
		{
			$this->lcIdcompra=$pcIdcompra;
		}

		function set_Idarticulo($pcIdarticulo)
		{
			$this->lcIdarticulo=$pcIdarticulo;
		}

		function set_cantidad($pccantidad)
		{
			$this->lccantidad=$pccantidad;
		}
			function set_rifproveedor($pcrifproveedor)
		{
			$this->lcrifproveedor=$pcrifproveedor;
		}

		function set_nombreproveedor($pcnombreproveedor)
		{
			$this->lcnombreproveedor=$pcnombreproveedor;
		}
		function set_responsable($pcresponsable)
		{
			$this->lcresponsable=$pcresponsable;
		}


		function registrar_cabecera()
		{
			$this->conectar();
			$sql="INSERT INTO tentrada (idcompra,fecha,idproveedor,idFpersonal)VALUES('$this->lcIdcompra','$this->lcfecha','$this->lcidproveedor','$this->lcresponsable')";
			$lnHecho=$this->ejecutar($sql);	
			$this->set_Identrada($this->maxid());
			$this->desconectar();
			return $lnHecho;
		}

		function registrar_entrada()
		{
			$this->conectar();
			$sql="INSERT INTO dentrada (identrada,idarticulo,cantidad)VALUES('$this->lcIdentrada',$this->lcIdarticulo,'$this->lccantidad')";
			$lnHecho=$this->ejecutar($sql);	
			$sql="UPDATE tarticulo SET existencia=existencia+'$this->lccantidad' WHERE idarticulo='$this->lcIdarticulo'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		function consultar_entrada()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, `taula_idaula`,nombreasi,nombreunodoc,apellidounodoc,nombreaul
					FROM `tentrada`, `tcantidad`, `tgrupo`,tasignatura,tdocente,taula WHERE identrada='$this->lcIdentrada'
					AND idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo AND tasignatura_idasignatura=idasignatura AND tdocente_iddocente=iddocente AND taula_idaula=idaula";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['identrada'];
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
					$Fila[11]=$laRow['nombreunodoc'].' '.$laRow['apellidounodoc'];
					$Fila[12]=$laRow['nombreaul'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_entradas()
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

		function consultar_entradas_iguales()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`
					FROM `tentrada` WHERE tcantidad_idcantidad = (SELECT tcantidad_idcantidad FROM tentrada WHERE identrada='$this->lcIdentrada') AND tgrupo_idgrupo = (SELECT tgrupo_idgrupo FROM tentrada WHERE identrada='$this->lcIdentrada') AND tasignatura_idasignatura = (SELECT tasignatura_idasignatura FROM tentrada WHERE identrada='$this->lcIdentrada') AND identrada<>'$this->lcIdentrada' AND estatuscur='1'";
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

		function consultar_entradas_cantidad_participante($idparticipante)
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

		

		function consultar_entradas_activos()
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

		function consultar_entradas_inactivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada` as id, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, `taula_idaula`,(SELECT COUNT(tparticipante_idparticipante) FROM tentrada_tparticipante WHERE tentrada_identrada=id)as inscritos,nombreunodoc,apellidounodoc,iddocente
					FROM `tentrada`, `tcantidad`, `tgrupo`,tdocente WHERE idcantidad = tcantidad_idcantidad AND tdocente_iddocente=iddocente AND idgrupo = tgrupo_idgrupo AND estatuscur='2'";
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

		function consultar_entrada_bitacora()
		{
			$this->conectar();
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, `taula_idaula`
					FROM `tentrada`, `tcantidad`, `tgrupo` WHERE identrada='$this->lcIdentrada'
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

		

		function eliminar_entrada()
		{
			$this->conectar();
			$sql="UPDATE tentrada SET estatuscur='0' WHERE identrada='$this->lcIdentrada'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function cerrar_entrada($identrada_nuevo)
		{
			$this->conectar();
			$this->begin();
			$sql="UPDATE `tentrada` SET estatuscur='2' WHERE identrada='$this->lcIdentrada'";
			if($lnHecho=$this->ejecutar($sql))
			{
				$sql="UPDATE `tentrada_tparticipante` SET tentrada_identrada='$identrada_nuevo' WHERE tentrada_identrada='$this->lcIdentrada'";
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

		function editar_entrada()
		{
			$this->conectar();
			$sql="UPDATE `tentrada` SET `fecha`=UPPER('$this->lcfecha'),`desgripcioncur`=UPPER('$this->lcIdcompra')
			,`Idarticulo`='$this->lcIdarticulo',`estatuscur`='$this->lcEstatuscur',`tcantidad_idcantidad`='$this->lccantidad'
			,`tgrupo_idgrupo`='$this->lcGrupo' WHERE identrada='$this->lcIdentrada'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function consultar_entradas_inscripcion()
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

		function consultar_entradas_inscritos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`, nombreasi, 
						(SELECT count(identrada_participante) 
							FROM tentrada_tparticipante 
							WHERE tentrada_identrada=identrada AND estatus='1') AS inscritos
					FROM `tentrada`, `tcantidad`, `tgrupo`, tasignatura,tentrada_tparticipante
					WHERE tentrada_identrada=identrada AND idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo
					AND tasignatura_idasignatura = idasignatura AND estatuscur='1' AND estatus='1' GROUP BY identrada";
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

		function consultar_datos_inscripcion()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`,fechainilap, `nombregru`, `descripciongru`, nombreasi, idasignatura, (SELECT count(identrada_participante) 
							FROM tentrada_tparticipante 
							WHERE tentrada_identrada=identrada AND estatus='1') AS inscritos
					FROM `tentrada`, `tcantidad`, `tgrupo`, tasignatura
					WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo
					AND tasignatura_idasignatura = idasignatura AND identrada='$this->lcIdentrada'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['identrada'];
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
				$sql="SELECT  nombreunopar, nombredospar, apellidounopar, apellidodospar, cedulapar, tparticipante.idparticipante,fotoins,(YEAR(CURDATE())-YEAR(tparticipante.fechanacimientopar)) - (RIGHT(CURDATE(),5)<RIGHT(tparticipante.fechanacimientopar,5)) as edad,identrada_participante
					FROM  tparticipante,tentrada_tparticipante,tinscripcion
					WHERE tparticipante.idparticipante=tinscripcion.idparticipante AND tparticipante_idparticipante=tparticipante.idparticipante AND tentrada_identrada='$this->lcIdentrada' AND estatus='1'";

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
					$Fila[$cont][8]=$laRow['identrada_participante'];
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
						AND idgrupo = tgrupo_idgrupo AND tentrada.identrada='$this->lcIdentrada')
					AND tparticipante.idparticipante NOT IN (SELECT tparticipante_idparticipante FROM tentrada_tparticipante,tentrada,tasignatura WHERE tentrada_identrada='$this->lcIdentrada' AND tparticipante_idparticipante=tparticipante.idparticipante AND tasignatura_idasignatura=idasignatura AND estatus='1')
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
					AND tentrada_identrada = '$this->lcIdentrada'
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
				AND tentrada_identrada = '$this->lcIdentrada'
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

		function entradas_disponibles($edad,$idparticipante)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`,nombreasi,idasignatura
					FROM `tentrada`, `tcantidad`, `tgrupo`,tasignatura WHERE idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo AND tasignatura_idasignatura=idasignatura AND estatuscur='1' AND $edad>=edadmin AND $edad<=edadmax AND identrada NOT IN(SELECT tentrada_identrada FROM tentrada_tparticipante WHERE tparticipante_idparticipante='$idparticipante' AND estatus='1')";
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
					$Fila[$cont][10]=$laRow['idasignatura'];
					$Fila[$cont][11]=$laRow['nombreasi'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function entradas_inscritos($id)
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT `identrada`, `fecha`, `desgripcioncur`
					, `Idarticulo`, `estatuscur`, `tcantidad_idcantidad`
					, `tgrupo_idgrupo`, `nombrelap`, `nombregru`, `descripciongru`,nombreasi,idasignatura
					FROM `tentrada`, `tcantidad`, `tgrupo`,tasignatura,tentrada_tparticipante WHERE tparticipante_idparticipante='$id' AND identrada=tentrada_identrada AND estatus='1' AND idcantidad = tcantidad_idcantidad AND idgrupo = tgrupo_idgrupo AND tasignatura_idasignatura=idasignatura AND estatuscur='1'";
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
				AND idasignatura = tasignatura_idasignatura AND idaula = taula_idaula AND identrada IN
				 (SELECT c.tentrada_identrada FROM tentrada_tparticipante AS c WHERE tparticipante_idparticipante='$Participante') ORDER BY tcantidad_idcantidad;";
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
				$sql="SELECT * FROM `tinstrumento`,tasignatura,tentrada WHERE identrada='$this->lcIdentrada' AND tentrada.tasignatura_idasignatura=idasignatura AND idasignatura=tinstrumento.tasignatura_idasignatura AND estatusins='1'";
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

		function historial_entradas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT fecha, nombrelap, nombreasi, nombreaul, nombregru 
				, 
				(SELECT count(*) FROM tentrada_tparticipante WHERE tentrada_identrada=identrada AND estatus='1') AS cantidad_participantes
				,
				(SELECT count(*) FROM tentrada_tparticipante WHERE tentrada_identrada=identrada AND estatus='2') AS cantidad_retirados
				FROM tentrada, tcantidad, tasignatura, taula,tgrupo 
				WHERE 
				tcantidad.idcantidad=tcantidad_idcantidad AND tgrupo.idgrupo = tgrupo_idgrupo 
				AND idasignatura = tasignatura_idasignatura AND idaula = taula_idaula AND identrada IN
				 (SELECT tc.identrada FROM tentrada AS tc WHERE tc.tcantidad_idcantidad='$this->lccantidad' );";
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

		function historial_entrada()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT fecha, nombrelap, nombreasi, nombreaul, nombregru 
				, 
				(SELECT count(*) FROM tentrada_tparticipante WHERE tentrada_identrada=identrada AND estatus='1') AS cantidad_participantes
				,
				(SELECT count(*) FROM tentrada_tparticipante WHERE tentrada_identrada=identrada AND estatus='2') AS cantidad_retirados
				FROM tentrada, tcantidad, tasignatura, taula,tgrupo 
				WHERE 
				tcantidad.idcantidad=tcantidad_idcantidad AND tgrupo.idgrupo = tgrupo_idgrupo 
				AND idasignatura = tasignatura_idasignatura AND idaula = taula_idaula AND identrada IN
				 ('$this->lcIdentrada');";
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