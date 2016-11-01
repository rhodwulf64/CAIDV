<?php
	
	require_once('../nucleo/ModeloConect.php');
	class clsReportesBienes extends ModeloConect
	{
		private $lnIdinscripcion;
		private $lnIdparticipante;
		private $lcGradoins;
		private $lcSeccionins;
		private $lcFechains;
		private $lcDisponibilidadins;
		private $lcDiasasistenciains;
		private $lcObservacionins;
		private $lcFotoins;
		private $lcPartidanacimientoins;
		private $lcCopiacedulains;
		private $lcInformemedico;
		private $lcEstatusins;
		private $lcRepitienteins;
		private $lcMotivocambioins;
		private $lcResumendiagnosticoins;
		private $lnIdInstitucion;
		private $lnEstudiaActualmente;
		private $lcGradoInstruccion;
		private $lcTurno;
		private $lcDocenteGrado;
		private $lnTelefonoDocenteGrado;
		private $lcDocenteAulaIntegrada;
		private $lnTelefonoDocenteAulaIntegrada;
		private $lcDirectorInstitucion;
		private $lnTelefonoDirectorInstitucion;
		private $lcIngresomensual;
		private $lcOtroingreso;
		private $lcNoingreso;
		private $lcColaborarcaidv;
		private $lcAprenderbraille;
		private $lcTiempo;
		private $lcResponsable;
		//NUEVOS
		private $lnIdBienN;

		function set_Idinscripcion($pcIdinscripcion)
		{
			$this->lnIdinscripcion=$pcIdinscripcion;
		}

		function set_IdBienNacional($pcIdBienN)
		{
			$this->lnIdBienN=$pcIdBienN;
		}
		function set_fCheckMovi($psCheckMovi)
		{
			$this->fCheckMovi=$psCheckMovi;
		}
		function set_fFechaInicio($psFechaInicio)
		{
			$date = new DateTime($psFechaInicio);
			$date = $date->format('Y-m-d');
			$this->fFechaInicio=$date;
		}
		function set_fFechaFin($psFechaFin)
		{
			$date = new DateTime($psFechaFin);
			$date = $date->format('Y-m-d');
			$this->fFechaFin=$date;
		}

		function set_Ingresomensual($pcIngresomensual)
		{
			$this->lcIngresomensual=$pcIngresomensual;
		}

		function set_Otroingreso($pcOtroingreso)
		{
			$this->lcOtroingreso=$pcOtroingreso;
		}

		function set_Noingreso($pcNoingreso)
		{
			$this->lcNoingreso=$pcNoingreso;
		}

		function set_Colaborarcaidv($pcColaborarcaidv)
		{
			$this->lcColaborarcaidv=$pcColaborarcaidv;
		}

		function set_Aprenderbraille($pcAprenderbraille)
		{
			$this->lcAprenderbraille=$pcAprenderbraille;
		}

		function set_Tiempo($pcTiempo)
		{
			$this->lcTiempo=$pcTiempo;
		}

		function set_Turno($pcTurno)
		{
			$this->lcTurno=$pcTurno;
		}

		function set_DocenteGrado($pcDocenteGrado)
		{
			$this->lcDocenteGrado=$pcDocenteGrado;
		}
		function set_Responsable($pcResponsable)
		{
			$this->lcResponsable=$pcResponsable;
		}

		function set_TelefonoDocenteGrado($pcTelefonoDocenteGrado)
		{
			$this->lnTelefonoDocenteGrado=$pcTelefonoDocenteGrado;
		}

		function set_DocenteAulaIntegrada($pcDocenteAulaIntegrada)
		{
			$this->lcDocenteAulaIntegrada=$pcDocenteAulaIntegrada;
		}

		function set_TelefonoDocenteAulaIntegrada($pcTelefonoDocenteAulaIntegrada)
		{
			$this->lnTelefonoDocenteAulaIntegrada=$pcTelefonoDocenteAulaIntegrada;
		}


		function set_DirectorInstitucion($pcDirectorInstitucion)
		{
			$this->lcDirectorInstitucion=$pcDirectorInstitucion;
		}


		function set_TelefonoDirectorInstitucion($pcTelefonoDirectorInstitucion)
		{
			$this->lnTelefonoDirectorInstitucion=$pcTelefonoDirectorInstitucion;
		}

		function set_EstudiaActualmente($pcEstudiaActualmente)
		{
			$this->lnEstudiaActualmente=$pcEstudiaActualmente;
		}

		function set_GradoInstruccion($pcGradoInstruccion)
		{
			$this->lcGradoInstruccion=$pcGradoInstruccion;
		}

		function set_Idparticipante($pcIdparticipante)
		{
			$this->lnIdparticipante=$pcIdparticipante;
		}

		function set_Gradoins($pcGradoins)
		{
			$this->lcGradoins=$pcGradoins;
		}

		function set_Seccionins($pcSeccionins)
		{
			$this->lcSeccionins=$pcSeccionins;
		}

		function set_Fechains($pcFechains)
		{
			$this->lcFechains=$pcFechains;
		}


		function set_Disponibilidadins($pcDisponibilidadins)
		{
			$this->lcDisponibilidadins=$pcDisponibilidadins;
		}

		function set_Diasasistenciains($pcDiasasistenciains)
		{
			$this->lcDiasasistenciains=$pcDiasasistenciains;
		}

		function set_Observacionins($pcObservacionins)
		{
			$this->lcObservacionins=$pcObservacionins;
		}

		function set_Fotoins($pcFotoins)
		{
			$this->lcFotoins=$pcFotoins;
		}

		function set_Partidanacimientoins($pcPartidanacimientoins)
		{
			$this->lcPartidanacimientoins=$pcPartidanacimientoins;
		}

		function set_Copiacedulains($pcCopiacedulains)
		{
			$this->lcCopiacedulains=$pcCopiacedulains;
		}

		function set_Informemedico($pcInformemedico)
		{
			$this->lcInformemedico=$pcInformemedico;
		}

		function set_Estatusins($pcEstatusins)
		{
			$this->lcEstatusins=$pcEstatusins;
		}

		function set_Repitienteins($pcRepitienteins)
		{
			$this->lcRepitienteins=$pcRepitienteins;
		}

		function set_Motivocambioins($pcMotivocambioins)
		{
			$this->lcMotivocambioins=$pcMotivocambioins;
		}

		function set_Resumendiagnosticoins($pcResumendiagnosticoins)
		{
			$this->lcResumendiagnosticoins=$pcResumendiagnosticoins;
		}

		function set_IdInstitucion($pcIdInstitucion)
		{
			$this->lnIdInstitucion=$pcIdInstitucion;
		}

		function consultar_id_articulos()//ojo
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT 
			tarti.id_bien,
			tarti.cod_bien,
			tarti.LlavePrestado,
			tarti.id_tbien,
			tarti.serial_bien,
			tarti.id_marca,
			tarti.id_modelo,
			tarti.des_bien,
			tarti.id_cond,
			tarti.precio,
			tarti.fecha_ent,
			tarti.FechaRegistro,
			tarti.status,
			tarti.observacion_bien,
			tcondi.nom_cond,
			tcondi.colorBootstrap,
			tmca.nom_marca,
			tmdl.nom_modelo,
			tpbn.cod_tbien,
			tpbn.des_tbien
			FROM articulobn AS tarti 
			LEFT JOIN tipobn AS tpbn ON tpbn.id_tbien=tarti.id_tbien
			LEFT JOIN condicionbn AS tcondi ON tcondi.id_cond=tarti.id_cond
			LEFT JOIN marcabn AS tmca ON tmca.id_marca=tarti.id_marca
			LEFT JOIN modelobn AS tmdl ON tmdl.id_modelo=tarti.id_modelo
			WHERE tarti.status='1'";


				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_bien'];
					$Fila[$cont][1]=$laRow['cod_bien'];
					$Fila[$cont][2]=$laRow['LlavePrestado'];
					$Fila[$cont][3]=$laRow['id_tbien'];
					$Fila[$cont][4]=$laRow['serial_bien'];
					$Fila[$cont][5]=$laRow['id_marca'];
					$Fila[$cont][6]=$laRow['id_modelo'];
					$Fila[$cont][7]=$laRow['des_bien'];
					$Fila[$cont][8]=$laRow['id_cond'];
					$Fila[$cont][9]=$laRow['precio'];
					$Fila[$cont][10]=$laRow['fecha_ent'];
					$Fila[$cont][11]=$laRow['FechaRegistro'];
					$Fila[$cont][12]=$laRow['status'];
					$Fila[$cont][13]=$laRow['observacion_bien'];
					$Fila[$cont][14]=$laRow['nom_cond'];
					$Fila[$cont][15]=$laRow['nom_marca'];
					$Fila[$cont][16]=$laRow['nom_modelo'];
					$Fila[$cont][17]=$laRow['cod_tbien'];
					$Fila[$cont][18]=$laRow['des_tbien'];
					$Fila[$cont][19]=$laRow['colorBootstrap'];		
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_participante_inscripcion()//ojo
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT *,(YEAR(CURDATE())-YEAR(fechanacimientopar))-(RIGHT(CURDATE(),5)<RIGHT(fechanacimientopar,5))AS edad,date_format(fechanacimientopar,'%d-%m-%Y')as fechanacimientopar FROM tparticipante LEFT JOIN tdiagnostico ON tdiagnostico_iddiagnostico=iddiagnostico LEFT JOIN tinstitucion ON tinstitucion_idinstitucion=idinstitucion WHERE idparticipante='$this->lnIdparticipante'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idparticipante'];
					$Fila[1]=$laRow['cedulapar'];
					$Fila[2]=$laRow['nombreunopar'];
					$Fila[3]=$laRow['nombredospar'];
					$Fila[4]=$laRow['apellidounopar'];
					$Fila[5]=$laRow['apellidodospar'];
					$Fila[6]=$laRow['sexopar'];
					$Fila[7]=$laRow['telefonopar'];
					$Fila[8]=$laRow['direccionpar'];
					$Fila[9]=$laRow['fechanacimientopar'];
					$Fila[10]=$laRow['numhijopar'];
					$Fila[11]=$laRow['medioviviendapar'];
					$Fila[12]=$laRow['viviendapar'];
					$Fila[13]=$laRow['tipoconstruccionpar'];
					$Fila[14]=($laRow['braillepar']==1)?'SI':'NO';
					$Fila[15]=$laRow['descripciondia'];
					$Fila[16]=($laRow['descripcionins'])?$laRow['descripcionins']:'-';
					$Fila[17]=$laRow['estatuspar'];
					$Fila[18]=$laRow['nacionalidadpar'];
					$Fila[19]=$laRow['etniapar'];
					$Fila[20]=$laRow['edad'];
					$Fila[21]=$laRow['correopar'];
					$Fila[23]=($laRow['numerohermanospar']>=1)?$laRow['numerohermanospar']:'Hijo Único';

					
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_inscripcion()//ojo 2
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT *,date_format(fechains,'%d-%m-%Y')as fechains,(SELECT CONCAT_WS(' ',nombreunofam,apellidounofam) FROM tfamiliar WHERE tfamiliar_idresponsable=idfamiliar)as responsable FROM tinscripcion LEFT JOIN tinstitucion ON tinstitucion_idinstitucion=idinstitucion WHERE idparticipante='$this->lnIdparticipante'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['idinscripcion'];
					$Fila[1]=$laRow['idparticipante'];
					$Fila[2]=$laRow['gradoins'];
					$Fila[3]=$laRow['seccionins'];
					$Fila[4]=$laRow['fechains'];
					$Fila[5]=$laRow['disponibilidadins'];
					$Fila[6]=$laRow['diasasistenciains'];
					$Fila[7]=$laRow['observacionins'];
					$Fila[8]=$laRow['fotoins'];
					$Fila[9]=($laRow['partidanacimientoins'])?'SI':'NO';
					$Fila[10]=($laRow['copiacedulains'])?'SI':'NO';
					$Fila[11]=($laRow['informemedico'])?'SI':'NO';
					$Fila[12]=$laRow['estatusins'];
					$Fila[13]=($laRow['repitienteins'])?'SI':'NO';
					$Fila[14]=$laRow['descripcionins'];
					$Fila[15]=$laRow['motivocambioins'];
					$Fila[16]=($laRow['estudia_actualmente'])?'SI':'NO';
					$Fila[17]=$laRow['grado_instruccion'];
					$Fila[18]=$laRow['turno'];
					$Fila[19]=$laRow['docente_grado'];
					$Fila[20]=$laRow['telefono_docente_grado'];
					$Fila[21]=$laRow['docente_aula_integrada'];
					$Fila[22]=$laRow['telefono_docente_aula_integrada'];
					$Fila[23]=$laRow['director_institucion'];
					$Fila[24]=$laRow['telefono_director_institucion'];
					$Fila[25]=$laRow['resumendiagnosticoins'];

					$Fila[26]=$laRow['responsable'];
					$Fila[27]=$laRow['ingresomensual'];
					$Fila[28]=$laRow['otroingreso'];
					$Fila[29]=$laRow['noingreso'];
					$Fila[30]=$laRow['colaborarcaidv'];
					$Fila[31]=($laRow['aprenderbraille'])?'SI':'NO';
					$Fila[32]=$laRow['tiempo'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_participante_familiar()
		{
			$this->conectar();
				$sql="SELECT *,tfamiliar_idfamiliar,apellidounofam,nombreunofam,descripcionpar,(YEAR(CURDATE())-YEAR(fechanacimientofam))-(RIGHT(CURDATE(),5)<RIGHT(fechanacimientofam,5))AS edad,date_format(fechanacimientofam,'%d-%m-%Y')as fechanacimientofam,descripciondia FROM participante_familiar,tfamiliar,tparentesco,tdiagnostico WHERE tparticipante_idparticipante='$this->lnIdparticipante' AND tfamiliar_idfamiliar=idfamiliar AND participante_familiar.idparentesco=tparentesco.idparentesco AND tdiagnostico_iddiagnostico=iddiagnostico";
				$pcsql=$this->filtro($sql);
				$cont=0;
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont]['idfamiliar']=number_format($laRow['tfamiliar_idfamiliar'],0,'','.');
					$Fila[$cont]['nombrefam']=$laRow['apellidounofam'].' '.$laRow['nombreunofam'];
					$Fila[$cont]['descripcionpar']=$laRow['descripcionpar'];
					$Fila[$cont]['representante']=$laRow['representante'];
					$Fila[$cont]['fechanacimientofam']=$laRow['fechanacimientofam'];
					$Fila[$cont]['edad']=$laRow['edad'];
					$Fila[$cont]['gradoinstrucfam']=$laRow['gradoinstrucfam'];
					$Fila[$cont]['ocupacionfam']=$laRow['ocupacionfam'];
					$Fila[$cont]['numhijofam']=$laRow['numhijofam'];
					$Fila[$cont]['descripciondia']=$laRow['descripciondia'];
					$Fila[$cont]['direccionfam']=$laRow['direccionfam'];
					$Fila[$cont]['telefonofam']=$laRow['telefonofam'];
					$Fila[$cont]['ingresofam']=$laRow['ingresofam'];
					$cont++;
				}
			$this->desconectar();
			return $Fila;
		}

		function listarBienesNacionalesDataTable()
		{
			$this->conectar();
			$cont=0;
			$sql = "SELECT 
			tarti.id_bien,
			tarti.cod_bien,
			tarti.LlavePrestado,
			tarti.id_tbien,
			tarti.serial_bien,
			tarti.id_marca,
			tarti.id_modelo,
			tarti.des_bien,
			tarti.id_cond,
			tarti.precio,
			tarti.fecha_ent,
			tarti.FechaRegistro,
			tarti.status,
			tarti.observacion_bien,
			tcondi.nom_cond,
			tcondi.colorBootstrap,
			tmca.nom_marca,
			tmdl.nom_modelo,
			tpbn.cod_tbien,
			tpbn.des_tbien
			FROM articulobn AS tarti
			LEFT JOIN tipobn AS tpbn ON tpbn.id_tbien=tarti.id_tbien
			LEFT JOIN condicionbn AS tcondi ON tcondi.id_cond=tarti.id_cond
			LEFT JOIN marcabn AS tmca ON tmca.id_marca=tarti.id_marca
			LEFT JOIN modelobn AS tmdl ON tmdl.id_modelo=tarti.id_modelo
			ORDER BY tarti.fecha_ent DESC";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_bien'];
					$Fila[$cont][1]=$laRow['cod_bien'];
					$Fila[$cont][2]=$laRow['LlavePrestado'];
					$Fila[$cont][3]=$laRow['id_tbien'];
					$Fila[$cont][4]=$laRow['serial_bien'];
					$Fila[$cont][5]=$laRow['id_marca'];
					$Fila[$cont][6]=$laRow['id_modelo'];
					$Fila[$cont][7]=$laRow['des_bien'];
					$Fila[$cont][8]=$laRow['id_cond'];
					$Fila[$cont][9]=$laRow['precio'];
					$Fila[$cont][10]=$laRow['fecha_ent'];
					$Fila[$cont][11]=$laRow['FechaRegistro'];
					$Fila[$cont][12]=$laRow['status'];
					$Fila[$cont][13]=$laRow['observacion_bien'];
					$Fila[$cont][14]=$laRow['nom_cond'];
					$Fila[$cont][15]=$laRow['nom_marca'];
					$Fila[$cont][16]=$laRow['nom_modelo'];
					$Fila[$cont][17]=$laRow['cod_tbien'];
					$Fila[$cont][18]=$laRow['des_tbien'];
					$Fila[$cont][19]=$laRow['colorBootstrap'];
					$cont++;
				}
				
				$this->desconectar();
				return $Fila;

		}

		function ListarBienesPorDepartamentos($idasignatura)
		{
			$this->conectar();
			$cont=0;
			$sql = "SELECT 
			tarti.id_bien,
			tarti.cod_bien,
			tarti.LlavePrestado,
			tarti.id_tbien,
			tarti.serial_bien,
			tarti.id_marca,
			tarti.id_modelo,
			tarti.des_bien,
			tarti.id_cond,
			tarti.precio,
			tarti.fecha_ent,
			tarti.FechaRegistro,
			tarti.status,
			tarti.observacion_bien,
			tcondi.nom_cond,
			tcondi.colorBootstrap,
			tmca.nom_marca,
			tmdl.nom_modelo,
			tpbn.cod_tbien,
			tpbn.des_tbien,
			mov.nro_document,
			mov.fecha_reg,
			mov.hora_reg,
			mov.fecha_mov,
			DATE_FORMAT(mov.fecha_mov,'%d-%m-%Y') AS fechaVolteada,
			mov.FechaAcordada,
			mov.idFresponsableente,
			mov.FechabnDevuelto,
			mov.idFentefiador,
			mov.id_tipo_mov,
			mov.id_prov,
			mov.id_per,
			mov.id_usuario,
			mov.id_motivo_mov,
			mov.id_periodo,
			mov.id_dep,
			mov.id_resp_dep,
			mov.observacion_mov,
			mov.id_usuario_anulacion,
			mov.fecha_anulacion,
			mov.id_motivo_anulacion,
			mov.status AS EstatusMov,
			tpmov.nom_tipo_mov,
			trespEn.nacionalidadper AS NacioRespo,
			trespEn.cedula AS ResponCedula,
			trespEn.idFenteExterno,
			trespEn.nombrefull,
			CONCAT(trespEn.nombrefull,' ',trespEn.apellidofull) AS NombRespEnteFull,
			tentx.RazonSocial,
			tentx.Rif,
			tentx.Telefono,
			prov.des_prov,
			prov.rif_prov,
			tper.nacionalidadper,
			tper.idpersonal AS PersonaCedula,
			CONCAT(tper.nombreunoper,' ',tper.apellidounoper) AS NombPersonalFull,			
			tusu.nombreusu,
			motbn.des_motivo_mov,
			tdto.idasignatura,
			tdto.nombreasi,
			trdto.nacionalidadper AS RespdtoNacionalidad,
			trdto.idpersonal AS RespdtoCedula,
			CONCAT(trdto.nombreunoper,' ',trdto.apellidounoper) AS NombRespdtoFull
			FROM articulobn AS tarti
			LEFT JOIN tipobn AS tpbn ON tpbn.id_tbien=tarti.id_tbien
			LEFT JOIN condicionbn AS tcondi ON tcondi.id_cond=tarti.id_cond
			LEFT JOIN marcabn AS tmca ON tmca.id_marca=tarti.id_marca
			LEFT JOIN modelobn AS tmdl ON tmdl.id_modelo=tarti.id_modelo
			INNER JOIN dmovimientobn AS dllv ON dllv.id_bien=tarti.id_bien
			INNER JOIN movimientobn AS mov ON mov.id_mov=dllv.id_mov
			LEFT JOIN tresponsableente AS trespEn ON mov.idFresponsableente=trespEn.idTresponsableente
			LEFT JOIN tentesexternos AS tentx ON mov.idFentefiador=tentx.idTentesexternos
			INNER JOIN tipomovibn AS tpmov ON mov.id_tipo_mov=tpmov.id_tipo_mov
			LEFT JOIN proveedores AS prov ON mov.id_prov=prov.id_prov
			INNER JOIN tpersonal AS tper ON mov.id_per=tper.idTpersonal
			INNER JOIN tusuario AS tusu ON mov.id_usuario=tusu.idTusuario
			INNER JOIN motivobn AS motbn ON mov.id_motivo_mov=motbn.id_motivo_mov
			INNER JOIN tasignatura AS tdto ON mov.id_dep=tdto.idasignatura
			INNER JOIN tpersonal AS trdto ON mov.id_resp_dep=trdto.idTpersonal
			WHERE (
			dllv.status='1' 
			AND mov.status='1' 
			AND mov.id_tipo_mov='2' 
			AND tarti.status='1'
			AND mov.id_dep='$idasignatura'
			AND tarti.id_cond='2')
			ORDER BY tarti.fecha_ent,mov.nro_document DESC";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_bien'];
					$Fila[$cont][1]=$laRow['cod_bien'];
					$Fila[$cont][2]=$laRow['LlavePrestado'];
					$Fila[$cont][3]=$laRow['id_tbien'];
					$Fila[$cont][4]=$laRow['serial_bien'];
					$Fila[$cont][5]=$laRow['id_marca'];
					$Fila[$cont][6]=$laRow['id_modelo'];
					$Fila[$cont][7]=$laRow['des_bien'];
					$Fila[$cont][8]=$laRow['id_cond'];
					$Fila[$cont][9]=$laRow['precio'];
					$Fila[$cont][10]=$laRow['fecha_ent'];
					$Fila[$cont][11]=$laRow['FechaRegistro'];
					$Fila[$cont][12]=$laRow['status'];
					$Fila[$cont][13]=$laRow['observacion_bien'];
					$Fila[$cont][14]=$laRow['nom_cond'];
					$Fila[$cont][15]=$laRow['nom_marca'];
					$Fila[$cont][16]=$laRow['nom_modelo'];
					$Fila[$cont][17]=$laRow['cod_tbien'];
					$Fila[$cont][18]=$laRow['des_tbien'];
					$Fila[$cont][19]=$laRow['colorBootstrap'];
						
					$Fila[$cont][20]=$laRow['nom_marca'];
					$Fila[$cont][21]=$laRow['nom_modelo'];
					$Fila[$cont][22]=$laRow['cod_tbien'];
					$Fila[$cont][23]=$laRow['des_tbien'];
					$Fila[$cont][24]=$laRow['nro_document'];
					$Fila[$cont][25]=$laRow['fecha_reg'];
					$Fila[$cont][26]=$laRow['hora_reg'];
					$Fila[$cont][27]=$laRow['fechaVolteada'];
					$Fila[$cont][28]=$laRow['FechaAcordada'];
					$Fila[$cont][29]=$laRow['idFresponsableente'];
					$Fila[$cont][30]=$laRow['FechabnDevuelto'];
					$Fila[$cont][31]=$laRow['idFentefiador'];
					$Fila[$cont][32]=$laRow['id_tipo_mov'];
					$Fila[$cont][33]=$laRow['id_prov'];
					$Fila[$cont][34]=$laRow['id_per'];
					$Fila[$cont][35]=$laRow['id_usuario'];
					$Fila[$cont][36]=$laRow['id_motivo_mov'];
					$Fila[$cont][37]=$laRow['id_periodo'];
					$Fila[$cont][38]=$laRow['id_dep'];
					$Fila[$cont][39]=$laRow['id_resp_dep'];
					$Fila[$cont][40]=$laRow['observacion_mov'];
					$Fila[$cont][41]=$laRow['id_usuario_anulacion'];
					$Fila[$cont][42]=$laRow['fecha_anulacion'];
					$Fila[$cont][43]=$laRow['id_motivo_anulacion'];
					$Fila[$cont][44]=$laRow['EstatusMov'];
					$Fila[$cont][45]=$laRow['nom_tipo_mov'];

					$Fila[$cont][46]=$laRow['NacioRespo'];
					$Fila[$cont][47]=$laRow['ResponCedula'];
					$Fila[$cont][48]=$laRow['idFenteExterno'];
					$Fila[$cont][49]=$laRow['nombrefull'];
					$Fila[$cont][50]=$laRow['NombRespEnteFull'];
					$Fila[$cont][51]=$laRow['RazonSocial'];
					$Fila[$cont][52]=$laRow['Rif'];
					$Fila[$cont][53]=$laRow['Telefono'];
					$Fila[$cont][54]=$laRow['des_prov'];
					$Fila[$cont][55]=$laRow['rif_prov'];
					$Fila[$cont][56]=$laRow['nacionalidadper'];
					$Fila[$cont][57]=$laRow['PersonaCedula'];
					$Fila[$cont][58]=$laRow['NombPersonalFull'];
					$Fila[$cont][59]=$laRow['nombreusu'];
					$Fila[$cont][60]=$laRow['des_motivo_mov'];
					$Fila[$cont][61]=$laRow['idasignatura'];
					$Fila[$cont][62]=$laRow['nombreasi'];
					$Fila[$cont][63]=$laRow['RespdtoNacionalidad'];
					$Fila[$cont][64]=$laRow['RespdtoCedula'];
					$Fila[$cont][65]=$laRow['NombRespdtoFull'];



					$cont++;
				}
				
				$this->desconectar();
				return $Fila;

		}

		function DepartamentoPorUnidad()
		{
			$this->conectar();
			$cont=0;
			$sql = "SELECT 
			tdto.idasignatura,
			tdto.nombreasi,
			(SELECT count(tarti.id_bien) FROM articulobn  AS tarti LEFT JOIN dmovimientobn AS dllv ON dllv.id_bien=tarti.id_bien LEFT JOIN movimientobn AS mov ON mov.id_mov=dllv.id_mov WHERE mov.id_dep=tdto.idasignatura AND tarti.id_cond='2') AS cantidadBienes,
			tarti.id_cond AS CondiArt
			FROM tasignatura AS tdto
			INNER JOIN movimientobn AS mov ON mov.id_dep=tdto.idasignatura
			INNER JOIN dmovimientobn AS dllv ON dllv.id_mov=mov.id_mov
			INNER JOIN articulobn AS tarti ON tarti.id_bien=dllv.id_bien
			WHERE (
			dllv.status='1' 
			AND mov.status='1'
			AND mov.id_tipo_mov='2' 
			AND tarti.status='1') 
			GROUP BY tdto.nombreasi 
			ORDER BY tarti.fecha_ent DESC";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['cantidadBienes'];
					$Fila[$cont][1]=$laRow['idasignatura'];
					$Fila[$cont][2]=$laRow['nombreasi'];

					$cont++;
				}
				
				$this->desconectar();
				return $Fila;

		}

		function ListarBienesPorFecha($idArticulo)
		{
			$this->conectar();
			$cont=0;
			$sql = "SELECT 
			tarti.id_bien,
			tarti.cod_bien,
			tarti.LlavePrestado,
			tarti.id_tbien,
			tarti.serial_bien,
			tarti.id_marca,
			tarti.id_modelo,
			tarti.des_bien,
			tarti.id_cond,
			tarti.precio,
			tarti.fecha_ent,
			tarti.FechaRegistro,
			tarti.status,
			tarti.observacion_bien,
			tcondi.nom_cond,
			tcondi.colorBootstrap,
			tmca.nom_marca,
			tmdl.nom_modelo,
			tpbn.cod_tbien,
			tpbn.des_tbien,
			mov.nro_document,
			mov.fecha_reg,
			mov.hora_reg,
			mov.fecha_mov,
			DATE_FORMAT(mov.fecha_mov,'%d-%m-%Y') AS fechaVolteada,
			mov.FechaAcordada,
			mov.idFresponsableente,
			mov.FechabnDevuelto,
			mov.idFentefiador,
			mov.id_tipo_mov,
			mov.id_prov,
			mov.id_per,
			mov.id_usuario,
			mov.id_motivo_mov,
			mov.id_periodo,
			mov.id_dep,
			mov.id_resp_dep,
			mov.observacion_mov,
			mov.id_usuario_anulacion,
			mov.fecha_anulacion,
			mov.id_motivo_anulacion,
			mov.status AS EstatusMov,
			tpmov.nom_tipo_mov,
			trespEn.nacionalidadper AS NacioRespo,
			trespEn.cedula AS ResponCedula,
			trespEn.idFenteExterno,
			trespEn.nombrefull,
			CONCAT(trespEn.nombrefull,' ',trespEn.apellidofull) AS NombRespEnteFull,
			tentx.RazonSocial,
			tentx.Rif,
			tentx.Telefono,
			prov.des_prov,
			prov.rif_prov,
			tper.nacionalidadper,
			tper.idpersonal AS PersonaCedula,
			CONCAT(tper.nombreunoper,' ',tper.apellidounoper) AS NombPersonalFull,			
			tusu.nombreusu,
			motbn.des_motivo_mov,
			tdto.idasignatura,
			tdto.nombreasi,
			trdto.nacionalidadper AS RespdtoNacionalidad,
			trdto.idpersonal AS RespdtoCedula,
			CONCAT(trdto.nombreunoper,' ',trdto.apellidounoper) AS NombRespdtoFull
			FROM articulobn AS tarti
			LEFT JOIN tipobn AS tpbn ON tpbn.id_tbien=tarti.id_tbien
			LEFT JOIN condicionbn AS tcondi ON tcondi.id_cond=tarti.id_cond
			LEFT JOIN marcabn AS tmca ON tmca.id_marca=tarti.id_marca
			LEFT JOIN modelobn AS tmdl ON tmdl.id_modelo=tarti.id_modelo
			INNER JOIN dmovimientobn AS dllv ON dllv.id_bien=tarti.id_bien
			INNER JOIN movimientobn AS mov ON mov.id_mov=dllv.id_mov
			LEFT JOIN tresponsableente AS trespEn ON mov.idFresponsableente=trespEn.idTresponsableente
			LEFT JOIN tentesexternos AS tentx ON mov.idFentefiador=tentx.idTentesexternos
			INNER JOIN tipomovibn AS tpmov ON mov.id_tipo_mov=tpmov.id_tipo_mov
			LEFT JOIN proveedores AS prov ON mov.id_prov=prov.id_prov
			INNER JOIN tpersonal AS tper ON mov.id_per=tper.idTpersonal
			INNER JOIN tusuario AS tusu ON mov.id_usuario=tusu.idTusuario
			INNER JOIN motivobn AS motbn ON mov.id_motivo_mov=motbn.id_motivo_mov
			LEFT JOIN tasignatura AS tdto ON mov.id_dep=tdto.idasignatura
			LEFT JOIN tpersonal AS trdto ON mov.id_resp_dep=trdto.idTpersonal
			WHERE (dllv.status='1' AND mov.status='1' AND tarti.id_bien='$idArticulo' AND fecha_mov>='$this->fFechaInicio' AND fecha_mov<='$this->fFechaFin') AND (mov.id_tipo_mov='".$this->fCheckMovi[0]."' OR mov.id_tipo_mov='".$this->fCheckMovi[1]."' OR mov.id_tipo_mov='".$this->fCheckMovi[2]."' OR mov.id_tipo_mov='".$this->fCheckMovi[3]."' OR mov.id_tipo_mov='".$this->fCheckMovi[4]."' OR mov.id_tipo_mov='".$this->fCheckMovi[5]."')
			ORDER BY tarti.fecha_ent DESC";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_bien'];
					$Fila[$cont][1]=$laRow['cod_bien'];
					$Fila[$cont][2]=$laRow['LlavePrestado'];
					$Fila[$cont][3]=$laRow['id_tbien'];
					$Fila[$cont][4]=$laRow['serial_bien'];
					$Fila[$cont][5]=$laRow['id_marca'];
					$Fila[$cont][6]=$laRow['id_modelo'];
					$Fila[$cont][7]=$laRow['des_bien'];
					$Fila[$cont][8]=$laRow['id_cond'];
					$Fila[$cont][9]=$laRow['precio'];
					$Fila[$cont][10]=$laRow['fecha_ent'];
					$Fila[$cont][11]=$laRow['FechaRegistro'];
					$Fila[$cont][12]=$laRow['status'];
					$Fila[$cont][13]=$laRow['observacion_bien'];
					$Fila[$cont][14]=$laRow['nom_cond'];
					$Fila[$cont][15]=$laRow['nom_marca'];
					$Fila[$cont][16]=$laRow['nom_modelo'];
					$Fila[$cont][17]=$laRow['cod_tbien'];
					$Fila[$cont][18]=$laRow['des_tbien'];
					$Fila[$cont][19]=$laRow['colorBootstrap'];
						
					$Fila[$cont][20]=$laRow['nom_marca'];
					$Fila[$cont][21]=$laRow['nom_modelo'];
					$Fila[$cont][22]=$laRow['cod_tbien'];
					$Fila[$cont][23]=$laRow['des_tbien'];
					$Fila[$cont][24]=$laRow['nro_document'];
					$Fila[$cont][25]=$laRow['fecha_reg'];
					$Fila[$cont][26]=$laRow['hora_reg'];
					$Fila[$cont][27]=$laRow['fechaVolteada'];
					$Fila[$cont][28]=$laRow['FechaAcordada'];
					$Fila[$cont][29]=$laRow['idFresponsableente'];
					$Fila[$cont][30]=$laRow['FechabnDevuelto'];
					$Fila[$cont][31]=$laRow['idFentefiador'];
					$Fila[$cont][32]=$laRow['id_tipo_mov'];
					$Fila[$cont][33]=$laRow['id_prov'];
					$Fila[$cont][34]=$laRow['id_per'];
					$Fila[$cont][35]=$laRow['id_usuario'];
					$Fila[$cont][36]=$laRow['id_motivo_mov'];
					$Fila[$cont][37]=$laRow['id_periodo'];
					$Fila[$cont][38]=$laRow['id_dep'];
					$Fila[$cont][39]=$laRow['id_resp_dep'];
					$Fila[$cont][40]=$laRow['observacion_mov'];
					$Fila[$cont][41]=$laRow['id_usuario_anulacion'];
					$Fila[$cont][42]=$laRow['fecha_anulacion'];
					$Fila[$cont][43]=$laRow['id_motivo_anulacion'];
					$Fila[$cont][44]=$laRow['EstatusMov'];
					$Fila[$cont][45]=$laRow['nom_tipo_mov'];

					$Fila[$cont][46]=$laRow['NacioRespo'];
					$Fila[$cont][47]=$laRow['ResponCedula'];
					$Fila[$cont][48]=$laRow['idFenteExterno'];
					$Fila[$cont][49]=$laRow['nombrefull'];
					$Fila[$cont][50]=$laRow['NombRespEnteFull'];
					$Fila[$cont][51]=$laRow['RazonSocial'];
					$Fila[$cont][52]=$laRow['Rif'];
					$Fila[$cont][53]=$laRow['Telefono'];
					$Fila[$cont][54]=$laRow['des_prov'];
					$Fila[$cont][55]=$laRow['rif_prov'];
					$Fila[$cont][56]=$laRow['nacionalidadper'];
					$Fila[$cont][57]=$laRow['PersonaCedula'];
					$Fila[$cont][58]=$laRow['NombPersonalFull'];
					$Fila[$cont][59]=$laRow['nombreusu'];
					$Fila[$cont][60]=$laRow['des_motivo_mov'];
					$Fila[$cont][61]=$laRow['idasignatura'];
					$Fila[$cont][62]=$laRow['nombreasi'];
					$Fila[$cont][63]=$laRow['RespdtoNacionalidad'];
					$Fila[$cont][64]=$laRow['RespdtoCedula'];
					$Fila[$cont][65]=$laRow['NombRespdtoFull'];



					$cont++;
				}
				
				$this->desconectar();
				return $Fila;

		}

		function HojadeVidaBienNacional()
		{
			$this->conectar();
			$cont=0;
			$sql = "SELECT 
			tarti.id_bien,
			tarti.cod_bien,
			tarti.LlavePrestado,
			tarti.id_tbien,
			tarti.serial_bien,
			tarti.id_marca,
			tarti.id_modelo,
			tarti.des_bien,
			tarti.id_cond,
			tarti.precio,
			tarti.fecha_ent,
			tarti.FechaRegistro,
			tarti.status,
			tarti.observacion_bien,
			tcondi.nom_cond,
			tcondi.colorBootstrap,
			tmca.nom_marca,
			tmdl.nom_modelo,
			tpbn.cod_tbien,
			tpbn.des_tbien,
			mov.nro_document,
			mov.fecha_reg,
			mov.hora_reg,
			mov.fecha_mov,
			mov.FechaAcordada,
			mov.idFresponsableente,
			mov.FechabnDevuelto,
			mov.idFentefiador,
			mov.id_tipo_mov,
			mov.id_prov,
			mov.id_per,
			mov.id_usuario,
			mov.id_motivo_mov,
			mov.id_periodo,
			mov.id_dep,
			mov.id_resp_dep,
			mov.observacion_mov,
			mov.id_usuario_anulacion,
			mov.fecha_anulacion,
			mov.id_motivo_anulacion,
			mov.status AS EstatusMov,
			tpmov.nom_tipo_mov,
			trespEn.nacionalidadper AS NacioRespo,
			trespEn.cedula AS ResponCedula,
			trespEn.idFenteExterno,
			trespEn.nombrefull,
			CONCAT(trespEn.nombrefull,' ',trespEn.apellidofull) AS NombRespEnteFull,
			tentx.RazonSocial,
			tentx.Rif,
			tentx.Telefono,
			prov.des_prov,
			prov.rif_prov,
			tper.nacionalidadper,
			tper.idpersonal AS PersonaCedula,
			CONCAT(tper.nombreunoper,' ',tper.apellidounoper) AS NombPersonalFull,			
			tusu.nombreusu,
			motbn.des_motivo_mov,
			tdto.idasignatura,
			tdto.nombreasi,
			trdto.nacionalidadper AS RespdtoNacionalidad,
			trdto.idpersonal AS RespdtoCedula,
			CONCAT(trdto.nombreunoper,' ',trdto.apellidounoper) AS NombRespdtoFull
			FROM articulobn AS tarti
			LEFT JOIN tipobn AS tpbn ON tpbn.id_tbien=tarti.id_tbien
			LEFT JOIN condicionbn AS tcondi ON tcondi.id_cond=tarti.id_cond
			LEFT JOIN marcabn AS tmca ON tmca.id_marca=tarti.id_marca
			LEFT JOIN modelobn AS tmdl ON tmdl.id_modelo=tarti.id_modelo
			INNER JOIN dmovimientobn AS dllv ON dllv.id_bien=tarti.id_bien
			INNER JOIN movimientobn AS mov ON mov.id_mov=dllv.id_mov
			LEFT JOIN tresponsableente AS trespEn ON mov.idFresponsableente=trespEn.idTresponsableente
			LEFT JOIN tentesexternos AS tentx ON mov.idFentefiador=tentx.idTentesexternos
			INNER JOIN tipomovibn AS tpmov ON mov.id_tipo_mov=tpmov.id_tipo_mov
			LEFT JOIN proveedores AS prov ON mov.id_prov=prov.id_prov
			INNER JOIN tpersonal AS tper ON mov.id_per=tper.idTpersonal
			INNER JOIN tusuario AS tusu ON mov.id_usuario=tusu.idTusuario
			INNER JOIN motivobn AS motbn ON mov.id_motivo_mov=motbn.id_motivo_mov
			LEFT JOIN tasignatura AS tdto ON mov.id_dep=tdto.idasignatura
			LEFT JOIN tpersonal AS trdto ON mov.id_resp_dep=trdto.idTpersonal
			WHERE dllv.status='1' AND mov.status='1' AND tarti.id_bien='$this->lnIdBienN'
			ORDER BY tarti.fecha_ent DESC";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_bien'];
					$Fila[$cont][1]=$laRow['cod_bien'];
					$Fila[$cont][2]=$laRow['LlavePrestado'];
					$Fila[$cont][3]=$laRow['id_tbien'];
					$Fila[$cont][4]=$laRow['serial_bien'];
					$Fila[$cont][5]=$laRow['id_marca'];
					$Fila[$cont][6]=$laRow['id_modelo'];
					$Fila[$cont][7]=$laRow['des_bien'];
					$Fila[$cont][8]=$laRow['id_cond'];
					$Fila[$cont][9]=$laRow['precio'];
					$Fila[$cont][10]=$laRow['fecha_ent'];
					$Fila[$cont][11]=$laRow['FechaRegistro'];
					$Fila[$cont][12]=$laRow['status'];
					$Fila[$cont][13]=$laRow['observacion_bien'];
					$Fila[$cont][14]=$laRow['nom_cond'];
					$Fila[$cont][15]=$laRow['nom_marca'];
					$Fila[$cont][16]=$laRow['nom_modelo'];
					$Fila[$cont][17]=$laRow['cod_tbien'];
					$Fila[$cont][18]=$laRow['des_tbien'];
					$Fila[$cont][19]=$laRow['colorBootstrap'];
						
					$Fila[$cont][20]=$laRow['nom_marca'];
					$Fila[$cont][21]=$laRow['nom_modelo'];
					$Fila[$cont][22]=$laRow['cod_tbien'];
					$Fila[$cont][23]=$laRow['des_tbien'];
					$Fila[$cont][24]=$laRow['nro_document'];
					$Fila[$cont][25]=$laRow['fecha_reg'];
					$Fila[$cont][26]=$laRow['hora_reg'];
					$Fila[$cont][27]=$laRow['fecha_mov'];
					$Fila[$cont][28]=$laRow['FechaAcordada'];
					$Fila[$cont][29]=$laRow['idFresponsableente'];
					$Fila[$cont][30]=$laRow['FechabnDevuelto'];
					$Fila[$cont][31]=$laRow['idFentefiador'];
					$Fila[$cont][32]=$laRow['id_tipo_mov'];
					$Fila[$cont][33]=$laRow['id_prov'];
					$Fila[$cont][34]=$laRow['id_per'];
					$Fila[$cont][35]=$laRow['id_usuario'];
					$Fila[$cont][36]=$laRow['id_motivo_mov'];
					$Fila[$cont][37]=$laRow['id_periodo'];
					$Fila[$cont][38]=$laRow['id_dep'];
					$Fila[$cont][39]=$laRow['id_resp_dep'];
					$Fila[$cont][40]=$laRow['observacion_mov'];
					$Fila[$cont][41]=$laRow['id_usuario_anulacion'];
					$Fila[$cont][42]=$laRow['fecha_anulacion'];
					$Fila[$cont][43]=$laRow['id_motivo_anulacion'];
					$Fila[$cont][44]=$laRow['EstatusMov'];
					$Fila[$cont][45]=$laRow['nom_tipo_mov'];

					$Fila[$cont][46]=$laRow['NacioRespo'];
					$Fila[$cont][47]=$laRow['ResponCedula'];
					$Fila[$cont][48]=$laRow['idFenteExterno'];
					$Fila[$cont][49]=$laRow['nombrefull'];
					$Fila[$cont][50]=$laRow['NombRespEnteFull'];
					$Fila[$cont][51]=$laRow['RazonSocial'];
					$Fila[$cont][52]=$laRow['Rif'];
					$Fila[$cont][53]=$laRow['Telefono'];
					$Fila[$cont][54]=$laRow['des_prov'];
					$Fila[$cont][55]=$laRow['rif_prov'];
					$Fila[$cont][56]=$laRow['nacionalidadper'];
					$Fila[$cont][57]=$laRow['PersonaCedula'];
					$Fila[$cont][58]=$laRow['NombPersonalFull'];
					$Fila[$cont][59]=$laRow['nombreusu'];
					$Fila[$cont][60]=$laRow['des_motivo_mov'];
					$Fila[$cont][61]=$laRow['idasignatura'];
					$Fila[$cont][62]=$laRow['nombreasi'];
					$Fila[$cont][63]=$laRow['RespdtoNacionalidad'];
					$Fila[$cont][64]=$laRow['RespdtoCedula'];
					$Fila[$cont][65]=$laRow['NombRespdtoFull'];



					$cont++;
				}
				
				$this->desconectar();
				return $Fila;

		}


		function consultar_familiar_participante($idfamiliar)
		{
			$this->conectar();
				$sql="SELECT *,tfamiliar_idfamiliar,apellidounopar,nombreunopar,descripcionpar
				FROM participante_familiar,tparticipante,tparentesco 
				WHERE tfamiliar_idfamiliar='$idfamiliar' 
				AND idparticipante=tparticipante_idparticipante 
				AND participante_familiar.idparentesco=tparentesco.idparentesco";
				$pcsql=$this->filtro($sql);
				$cont=0;
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont]['idfamiliar']=$laRow['tfamiliar_idfamiliar'];
					$Fila[$cont]['cedulapar']=$laRow['cedulapar'];
					$Fila[$cont]['nombrepar']=$laRow['apellidounopar'].' '.$laRow['nombreunopar'];
					$Fila[$cont]['descripcionpar']=$laRow['descripcionpar'];
					$cont++;
				}
			$this->desconectar();
			return $Fila;
		}

		function consultar_inscripciones()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `tinscripcion` WHERE estatuspar=1";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['idinscripcion'];
					$Fila[$cont][1]=$laRow['cedulapar'];
					$Fila[$cont][2]=$laRow['nombreunopar'];
					$Fila[$cont][3]=$laRow['nombredospar'];
					$Fila[$cont][4]=$laRow['apellidounopar'];
					$Fila[$cont][5]=$laRow['apellidodospar'];
					$Fila[$cont][6]=$laRow['sexopar'];
					$Fila[$cont][7]=$laRow['telefonopar'];
					$Fila[$cont][8]=$laRow['direccionpar'];
					$Fila[$cont][9]=$laRow['fechanacimientopar'];
					$Fila[$cont][10]=$laRow['numhijopar'];
					$Fila[$cont][11]=$laRow['medioviviendapar'];
					$Fila[$cont][12]=$laRow['viviendapar'];
					$Fila[$cont][13]=$laRow['tipoconstruccionpar'];
					$Fila[$cont][14]=$laRow['braillepar'];
					$Fila[$cont][15]=$laRow['tdiagnostico_iddiagnostico'];
					$Fila[$cont][16]=$laRow['tinstitucion_idinstitucion'];
					$Fila[$cont][17]=$laRow['estatuspar'];
					
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_inscripcion_bitacora()
		{
			$this->conectar();
				$sql="SELECT *,date_format(fechains,'%d-%m-%Y')as fechains FROM `tinscripcion` WHERE idparticipante='$this->lnIdparticipante'";
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

		function registrar_inscripcion()
		{
			$this->conectar();
			$sql="INSERT INTO `tinscripcion`( `idparticipante`, `gradoins`, `seccionins`, `fechains`, `disponibilidadins`, `diasasistenciains`, `observacionins`, `fotoins`, `partidanacimientoins`, `copiacedulains`, `informemedico`, `estatusins`, `repitienteins`, `tinstitucion_idinstitucion`, `motivocambioins`, `resumendiagnosticoins`,estudia_actualmente,grado_instruccion,turno,docente_grado,telefono_docente_grado,docente_aula_integrada,telefono_docente_aula_integrada,director_institucion,telefono_director_institucion,ingresomensual,otroingreso,noingreso,colaborarcaidv,aprenderbraille,tiempo,tfamiliar_idresponsable) VALUES ('$this->lnIdparticipante',UPPER('$this->lcGradoins'),UPPER('$this->lcSeccionins'),CURDATE(),UPPER('$this->lcDisponibilidadins'),UPPER('$this->lcDiasasistenciains'),UPPER('$this->lcObservacionins'),'$this->lcFotoins','$this->lcPartidanacimientoins','$this->lcCopiacedulains','$this->lcInformemedico','1','$this->lcRepitienteins','$this->lnIdInstitucion',UPPER('$this->lcMotivocambioins'),UPPER('$this->lcResumendiagnosticoins'),'$this->lnEstudiaActualmente',UPPER('$this->lcGradoInstruccion'),UPPER('$this->lcTurno'),UPPER('$this->lcDocenteGrado'),'$this->lnTelefonoDocenteGrado',UPPER('$this->lcDocenteAulaIntegrada'),'$this->lnTelefonoDocenteAulaIntegrada',UPPER('$this->lcDirectorInstitucion'),'$this->lnTelefonoDirectorInstitucion','$this->lcIngresomensual','$this->lcOtroingreso','$this->lcNoingreso','$this->lcColaborarcaidv','$this->lcAprenderbraille','$this->lcTiempo','$this->lcResponsable')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function editar_inscripcion()
		{
			$this->conectar();
			$sql="UPDATE `tinscripcion` SET `gradoins`=UPPER('$this->lcGradoins'),`seccionins`=UPPER('$this->lcSeccionins'),`disponibilidadins`=UPPER('$this->lcDisponibilidadins'),`diasasistenciains`=UPPER('$this->lcDiasasistenciains'),`observacionins`=UPPER('$this->lcObservacionins'),`fotoins`='$this->lcFotoins',`partidanacimientoins`='$this->lcPartidanacimientoins',`copiacedulains`='$this->lcCopiacedulains',`informemedico`='$this->lcInformemedico',`repitienteins`='$this->lcRepitienteins',`tinstitucion_idinstitucion`='$this->lnIdInstitucion',`motivocambioins`=UPPER('$this->lcMotivocambioins'),`resumendiagnosticoins`=UPPER('$this->lcResumendiagnosticoins'),estudia_actualmente='$this->lnEstudiaActualmente',grado_instruccion=UPPER('$this->lcGradoInstruccion'),turno=UPPER('$this->lcTurno'),docente_grado=UPPER('$this->lcDocenteGrado'),telefono_docente_grado='$this->lnTelefonoDocenteGrado',docente_aula_integrada=UPPER('$this->lcDocenteAulaIntegrada'),telefono_docente_aula_integrada='$this->lnTelefonoDocenteAulaIntegrada',director_institucion=UPPER('$this->lcDirectorInstitucion'),telefono_director_institucion='$this->lnTelefonoDirectorInstitucion',ingresomensual='$this->lcIngresomensual',otroingreso='$this->lcOtroingreso',noingreso='$this->lcNoingreso',colaborarcaidv='$this->lcColaborarcaidv',aprenderbraille='$this->lcAprenderbraille',tiempo='$this->lcTiempo',tfamiliar_idresponsable='$this->lcResponsable' WHERE idparticipante='$this->lnIdparticipante'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function eliminar_inscripcion()
		{
			$this->conectar();
			$sql="UPDATE tinscripcion SET estatusins='0' WHERE idparticipante='$this->lnIdparticipante' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_inscripcion()
		{
			$this->conectar();
			$sql="UPDATE tinscripcion SET estatusins='1' WHERE idparticipante='$this->lnIdparticipante' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function inscribir_curso($idcurso,$idparticipante,$fecha,$responsable)
		{
			$this->conectar();
			$fecha=$this->fecha_bd($fecha);
			$sql="INSERT INTO `tcurso_tparticipante`(`tcurso_idcurso`, `tparticipante_idparticipante`,fecha_inscripcion,idresponsable_ing) VALUES ('$idcurso','$idparticipante','$fecha','$responsable')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function desincorporar_curso($idcurso,$idparticipante)
		{
			$this->conectar();
			$sql="UPDATE `tcurso_tparticipante` SET estatus='2' WHERE tcurso_idcurso='$idcurso' AND tparticipante_idparticipante='$idparticipante'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
	}
?>