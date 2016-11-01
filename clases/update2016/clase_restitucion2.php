<?php 
session_start();
	require_once('../nucleo/ModeloConect.php');
 //****************************COMIENZO DE LA CLASE DEL OBJETO MUNICIPIO**********************//
class clsRestitucion Extends ModeloConect{
	private $G;
	private $lcIDdocumento;
	private $ArrArticulosID;
	private $idRestitucion;
	function clsRestitucion(){
		$this->clsConexion();
		$this->G = "";
	}

	function RecibirTodo($POST){
		$this->G = $POST;
	}

	function set_Restitucion($psRestitu)
	{
		$this->idRestitucion = $psRestitu;
	}

	function DameResultado()
	{
		return $this->ResultadoConsulta;
	}

	function set_NroDocumento($pcIDdocumento)
	{
		$this->lcIDdocumento=$pcIDdocumento;
	}

	function get_NroDocumento()
	{
		return $this->lcIDdocumento;
	}


	function listarPrestamoSinRestituir()
	{
		$this->conectar();
		$this->ResultadoConsulta=false;
		$cont=0;
		$sql = "SELECT 
		artibn.id_bien,
		artibn.cod_bien,
		artibn.LlavePrestado,
		artibn.id_tbien,
		artibn.serial_bien,
		artibn.id_marca,
		artibn.id_modelo,
		artibn.des_bien,
		artibn.id_cond,
		artibn.precio,
		artibn.fecha_ent,
		artibn.FechaRegistro,
		artibn.status AS EstatusArti,
		artibn.observacion_bien,
		tipbn.des_tbien,
		mcabn.nom_marca,
		mdlbn.nom_modelo
		FROM articulobn AS artibn
		INNER JOIN tipobn AS tipbn ON artibn.id_tbien=tipbn.id_tbien
		INNER JOIN marcabn AS mcabn ON artibn.id_marca=mcabn.id_marca
		INNER JOIN modelobn AS mdlbn ON artibn.id_modelo=mdlbn.id_modelo
		WHERE artibn.status='1' AND artibn.id_cond='4'
		ORDER BY artibn.fecha_ent DESC";
		$pcsql=$this->filtro($sql);
		while($laRow=$this->proximo($pcsql))
		{
			$Fila[$cont]['id_bien']=$laRow['id_bien'];
			$Fila[$cont]['cod_bien']=$laRow['cod_bien'];
			$Fila[$cont]['LlavePrestado']=$laRow['LlavePrestado'];
			$Fila[$cont]['id_tbien']=$laRow['id_tbien'];
			$Fila[$cont]['serial_bien']=$laRow['serial_bien'];
			$Fila[$cont]['id_marca']=$laRow['id_marca'];
			$Fila[$cont]['id_modelo']=$laRow['id_modelo'];
			$Fila[$cont]['des_bien']=$laRow['des_bien'];
			$Fila[$cont]['id_cond']=$laRow['id_cond'];
			$Fila[$cont]['precio']=$laRow['precio'];
			$Fila[$cont]['fecha_ent']=$laRow['fecha_ent'];
			$Fila[$cont]['FechaRegistro']=$laRow['FechaRegistro'];
			$Fila[$cont]['EstatusArti']=$laRow['EstatusArti'];
			$Fila[$cont]['observacion_bien']=$laRow['observacion_bien'];
			$Fila[$cont]['des_tbien']=$laRow['des_tbien'];
			$Fila[$cont]['nom_marca']=$laRow['nom_marca'];
			$Fila[$cont]['nom_modelo']=$laRow['nom_modelo'];
			$cont++;
		}
		if ($cont>0)
		{
			$this->ResultadoConsulta=true;
		}
		$this->desconectar();
		return $Fila;

	}

	function consultar_restitucion_full()
	{
		$this->conectar();
		$cont=0;
		$sql = "SELECT 
		mov.id_mov,
		mov.nro_document,
		mov.fecha_reg,
		mov.hora_reg,
		mov.fecha_mov,
		mov.id_mov_prestamo,
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
		dmov.id_mov,
		dmov.id_bien,
		dmov.status AS EstatusDet,
		arti.id_bien,
		arti.cod_bien,
		arti.LlavePrestado,
		arti.id_tbien,
		arti.serial_bien,
		arti.id_marca,
		arti.id_modelo,
		arti.des_bien,
		arti.id_cond,
		arti.fecha_ent,
		arti.FechaRegistro,
		arti.status AS EstatusArti,
		arti.observacion_bien,
		tprest.nro_document AS nro_documentPrestamo,
		tprest.fecha_mov AS FechoMovPrestamo,
		tentes.RazonSocial AS RazonSocialEnte,
		CONCAT(tentres.nombrefull,' ',tentres.apellidofull) AS NombreApellidoRespEnte,
		CONCAT(per.nombreunoper,' ',per.apellidounoper) AS NombreApellidoResp,
		tprest.FechaAcordada AS FechaAcordaPrestamo,
		CONCAT(datuser.nombreunoper,' ',datuser.apellidounoper) AS NombreApellidoUser,
		tprest.observacion_mov AS observaPrestamo
		FROM movimientobn AS mov
		INNER JOIN dmovimientobn AS dmov ON mov.id_mov=dmov.id_mov
		INNER JOIN articulobn AS arti ON dmov.id_bien=arti.id_bien
		INNER JOIN movimientobn AS tprest ON tprest.id_mov=mov.id_mov_prestamo
		LEFT JOIN tpersonal AS per ON tprest.id_per=per.idTpersonal
		LEFT JOIN tusuario AS user ON tprest.id_usuario=user.idTusuario
		LEFT JOIN tpersonal AS datuser ON datuser.idTpersonal=user.idFpersonal
		INNER JOIN tentesexternos AS tentes ON tprest.idFentefiador=tentes.idTentesexternos
		INNER JOIN tresponsableente AS tentres ON tprest.idFresponsableente=tentres.idTresponsableente
		WHERE mov.id_mov='$this->idRestitucion' 
		ORDER BY arti.id_bien ASC";
		$pcsql=$this->filtro($sql);
		if($laRow=$this->proximo($pcsql))
		{
			$Fila['id_mov']=$laRow['id_mov'];
			$Fila['nro_document']=$laRow['nro_document'];
			$Fila['fecha_reg']=$laRow['fecha_reg'];
			$Fila['hora_reg']=$laRow['hora_reg'];
			$Fila['fecha_mov']=$laRow['fecha_mov'];
			$Fila['FechaAcordada']=$laRow['FechaAcordada'];
			$Fila['idFresponsableente']=$laRow['idFresponsableente'];
			$Fila['FechabnDevuelto']=$laRow['FechabnDevuelto'];
			$Fila['idFentefiador']=$laRow['idFentefiador'];
			$Fila['id_tipo_mov']=$laRow['id_tipo_mov'];
			$Fila['id_prov']=$laRow['id_prov'];
			$Fila['id_per']=$laRow['id_per'];
			$Fila['id_usuario']=$laRow['id_usuario'];
			$Fila['id_motivo_mov']=$laRow['id_motivo_mov'];
			$Fila['id_periodo']=$laRow['id_periodo'];
			$Fila['id_dep']=$laRow['id_dep'];
			$Fila['id_resp_dep']=$laRow['id_resp_dep'];
			$Fila['observacion_mov']=$laRow['observacion_mov'];
			$Fila['id_usuario_anulacion']=$laRow['id_usuario_anulacion'];
			$Fila['fecha_anulacion']=$laRow['fecha_anulacion'];
			$Fila['id_motivo_anulacion']=$laRow['id_motivo_anulacion'];
			$Fila['EstatusMov']=$laRow['EstatusMov'];
			$Fila['id_mov']=$laRow['id_mov'];
			$Fila['id_bien']=$laRow['id_bien'];
			$Fila['EstatusDet']=$laRow['EstatusDet'];
			$Fila['id_bien']=$laRow['id_bien'];
			$Fila['cod_bien']=$laRow['cod_bien'];
			$Fila['LlavePrestado']=$laRow['LlavePrestado'];
			$Fila['id_tbien']=$laRow['id_tbien'];
			$Fila['serial_bien']=$laRow['serial_bien'];
			$Fila['id_marca']=$laRow['id_marca'];
			$Fila['id_modelo']=$laRow['id_modelo'];
			$Fila['des_bien']=$laRow['des_bien'];
			$Fila['id_cond']=$laRow['id_cond'];
			$Fila['fecha_ent']=$laRow['fecha_ent'];
			$Fila['FechaRegistro']=$laRow['FechaRegistro'];
			$Fila['EstatusArti']=$laRow['EstatusArti'];
			$Fila['observacion_bien']=$laRow['observacion_bien'];
			$Fila['nro_documentPrestamo']=$laRow['nro_documentPrestamo'];
			$Fila['FechoMovPrestamo']=$laRow['FechoMovPrestamo'];
			$Fila['RazonSocialEnte']=$laRow['RazonSocialEnte'];
			$Fila['NombreApellidoRespEnte']=$laRow['NombreApellidoRespEnte'];
			$Fila['NombreApellidoResp']=$laRow['NombreApellidoResp'];
			$Fila['FechaAcordaPrestamo']=$laRow['FechaAcordaPrestamo'];
			$Fila['NombreApellidoUser']=$laRow['NombreApellidoUser'];
			$Fila['observaPrestamo']=$laRow['observaPrestamo'];
			$cont++;
		}
		$this->desconectar();
		return $Fila;
	}


	function consultar_restitucion_especifica()
	{
		$respu=false;
		$this->conectar();
		$cont=0;
			$sql="SELECT 
			mov.id_mov,
			mov.nro_document,
			mov.fecha_reg,
			mov.hora_reg,
			mov.fecha_mov,
			mov.id_mov_prestamo,
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
			mov.status,
			arti.id_bien
			FROM movimientobn AS mov
			INNER JOIN dmovimientobn AS dmov ON dmov.id_mov=mov.id_mov
			INNER JOIN articulobn AS arti ON arti.id_bien=dmov.id_bien
			WHERE mov.id_mov='".$this->G["txtIDprestamo"]."'";

		$pcsql=$this->filtro($sql);
		while($laRow=$this->proximo($pcsql))
		{
			$lsFechaAcordada=$laRow['FechaAcordada'];
			$lsEnteFiador=$laRow['idFentefiador'];
			$fila[$cont]=$laRow['id_bien'];
			$cont++;
		}

		if($cont>0)
		{
			$respu=true;
		}

		$this->G["lsFechaAcordada"]=$lsFechaAcordada;
		$this->G["lsEnteFiador"]=$lsEnteFiador;
		$this->ArrArticulosID=$fila;
		
		$this->desconectar();
		return $respu;
	}

	function incluir(){
		$transaccion = false; // inicializo la variable en false
		$contadorFalse=0;
		$this->inicio_trans(); // inicializo la trasaccion

		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fecha = $obj_fechaHora->ObtenerFechaServer3();
		$hora = $obj_fechaHora->ObtenerHoraServer();
		$fechaDeLlegada = $obj_fechaHora->SubirFechaServer($this->G["txtFechaLlegada"]); //transformo la fecha a ser legible por la base de datos	

		/***********************************************/
		/** sql para insertar en la tabla movimiento (cabecera) de la transaccion **/
		$fechaDeAcordada=$this->G["lsFechaAcordada"];
		$enteFiador=$this->G["lsEnteFiador"];

		$sql = "INSERT INTO movimientobn (
		nro_document,
		fecha_reg,
		hora_reg,
		fecha_mov,
		id_mov_prestamo,
		FechaAcordada,
		idFresponsableente,
		FechabnDevuelto,
		idFentefiador,
		id_tipo_mov,
		id_per,
		id_usuario,
		id_motivo_mov,
		id_periodo,
		id_dep,
		id_resp_dep,
		observacion_mov,
		id_usuario_anulacion,
		fecha_anulacion,
		id_motivo_anulacion,
		status) VALUES('".$this->G["txtNroDocumento"]."',
		'".$fecha."',
		'".$hora."',
		'".$fechaDeLlegada."',
		'".$this->G['txtIDprestamo']."',
		'".$fechaDeAcordada."',
		NULORD('".$this->G["txtResponsableEnte"]."'),
		NULORD('".$fechaDeLlegada."'),
		NULORD('".$enteFiador."'),
		'6',
		NULORD('".$this->G["txtResponsable"]."'),
		NULORD('".$_SESSION["idTusuario"]."'),
		NULORD('".$this->G["txtMotivo"]."'),
		NULL,
		NULL,
		NULL,
		NULORD('".$this->G["txtObservacion"]."'),
		NULL,
		NULL,
		NULL,
		'1')";
		$this->ejecuta($sql);

		/* compruebo si inserto en la tabla movimiento*/
		if ( $this->como_va() )
		{ //pregunto si se realizo la consulta anterior
				
			$idMovimiento=$this->fpGetIDinsertado();
			$this->lcIDdocumento=$idMovimiento;	
			$cantidadArticulos=count($this->ArrArticulosID);		
	 		for($i=0;$i<$cantidadArticulos;$i++)
		 	{
		 		/* actualizo la condición del bien nacional a asignado */
		 		$sql = "UPDATE articulobn SET id_cond='1' WHERE id_bien='".$this->ArrArticulosID[$i]."'";
		 		$this->ejecuta($sql);
				/* compruebo si inserto en la tabla bien nacional */
					if( $this->como_va() )
					{
						$idArticulo=$this->fpGetIDinsertado();				
						/* inserto en la tabla detalle del bien nacional */
						$sql = "INSERT INTO dmovimientobn (id_mov,id_bien,status) VALUES ('$idMovimiento','".$this->ArrArticulosID[$i]."','1')";
						$this->ejecuta($sql);

						/* verifico si se insertaron datos en la tabla detalle */
						if( $this->como_va()==false)
						{
							$contadorFalse++;
						}
					}
					else
					{
						$contadorFalse++;
					}
			}//cierre for
				$sql = "UPDATE movimientobn SET FechabnDevuelto='$fechaDeLlegada' WHERE id_mov='".$this->G['txtIDprestamo']."'";
		 		$this->ejecuta($sql);
				/* compruebo si inserto en la tabla bien nacional */
					if( $this->como_va()==false)
					{
						$contadorFalse++;
					}
		}
		else
		{
			$contadorFalse++;
		}
		
		if( $contadorFalse==0)
		{
		 	$this->fin_trans(); // finalizo la transaccion con exito
			$transaccion=true;
		}else{
		 	$this->deshacer_trans(); // finalizo la transaccion fallida 
		}
		return $transaccion;
	} //cierre funcion incluir


	function ValidarPeriodoAnulacion($id_mov){
		$sql = 
		"	SELECT m.id_periodo 
			FROM movimientobn as m
			WHERE m.id_mov=".$id_mov." and m.id_periodo=".$_SESSION["id_periodo_mostrar"]."
		";
		$this->ejecuta($sql);
		if( $this->como_va() ){
			return true;
		}else { return false; }
	}
	function Consultar_Cant_Movimientos(){
		$sql = "SELECT count(id_mov) as cantidad FROM movimientobn WHERE id_tipo_mov=2 and status=1";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			$cant = $tupla["cantidad"];
			return $cant;
		}
	}
	function ConsulCabRece($idAsig){
		$sql = "SELECT mv.observacion_mov FROM movimientobn as mv WHERE id_mov='".$idAsig."'";
		return $this->ejecuta($sql);
	}
	function Consultar_BienNacional_Ajax($tipoBien,$fecha_asig){
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fechaServer = $obj_fechaHora->SubirFechaServer($fecha_asig); //transformo la fecha a ser legible por la base de datos
			
		/***********************************************/
		$sql = 
		" 	SELECT t_b.cod_tbien,m.nom_marca,b_n.id_bien,b_n.cod_bien,b_n.serial_bien,b_n.id_marca,b_n.modelo,b_n.des_bien,b_n.precio,b_n.fecha_ent,b_n.observacion_bien
			FROM articulobn as b_n INNER JOIN marca as m INNER JOIN tipobn as t_b
			WHERE b_n.id_tbien='".$tipoBien."' and fecha_ent <='".$fechaServer."' and b_n.id_cond='1' and b_n.status='1' and m.id_marca=b_n.id_marca and t_b.id_tbien=b_n.id_tbien
		";
		//and fecha_ent <='".$fechaServer."'
		return $this->ejecuta($sql);
	}
	function consultarBien($id_mov){
		$sql = 
		"	SELECT b_n.id_bien,b_n.cod_bien,b_n.id_tbien,b_n.serial_bien,b_n.id_marca,b_n.id_modelo,b_n.des_bien,b_n.id_cond,b_n.precio,b_n.fecha_ent,b_n.observacion_bien,cond.nom_cond, mar.nom_marca,tbien.cod_tbien,tbien.des_tbien
			FROM dmovimientobn as d_m 
			INNER JOIN articulobn as b_n 
			INNER JOIN condicionbn as cond 
			INNER JOIN marcabn as mar 
			INNER JOIN tipobn as tbien
			WHERE id_mov='$id_mov' and d_m.id_bien=b_n.id_bien and mar.id_marca=b_n.id_marca and cond.id_cond=b_n.id_cond and b_n.id_tbien=tbien.id_tbien and d_m.status='1'
		";

		return $this->ejecuta($sql);  
	}
	function formatearFecha($fec_asig){
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fechaFormateada = $obj_fechaHora->traerFecha2($fec_asig); 
		return $fechaFormateada;
	}

	function ListameBNporTipo()
	{
		$this->conectar();
		$this->ResultadoConsulta=false;
		$cont=0;
		$sql = "SELECT 
		artibn.id_bien,
		artibn.cod_bien,
		artibn.LlavePrestado,
		artibn.id_tbien,
		artibn.serial_bien,
		artibn.id_marca,
		artibn.id_modelo,
		artibn.des_bien,
		artibn.id_cond,
		artibn.precio,
		artibn.fecha_ent,
		artibn.FechaRegistro,
		artibn.status AS EstatusArti,
		artibn.observacion_bien,
		tipbn.des_tbien,
		mcabn.nom_marca,
		mdlbn.nom_modelo
		FROM articulobn AS artibn
		INNER JOIN tipobn AS tipbn ON artibn.id_tbien=tipbn.id_tbien
		INNER JOIN marcabn AS mcabn ON artibn.id_marca=mcabn.id_marca
		INNER JOIN modelobn AS mdlbn ON artibn.id_modelo=mdlbn.id_modelo
		WHERE artibn.status='1' AND artibn.id_cond='1'
		ORDER BY artibn.fecha_ent DESC";
		$pcsql=$this->filtro($sql);
		while($laRow=$this->proximo($pcsql))
		{
			$Fila[$cont]['id_bien']=$laRow['id_bien'];
			$Fila[$cont]['cod_bien']=$laRow['cod_bien'];
			$Fila[$cont]['LlavePrestado']=$laRow['LlavePrestado'];
			$Fila[$cont]['id_tbien']=$laRow['id_tbien'];
			$Fila[$cont]['serial_bien']=$laRow['serial_bien'];
			$Fila[$cont]['id_marca']=$laRow['id_marca'];
			$Fila[$cont]['id_modelo']=$laRow['id_modelo'];
			$Fila[$cont]['des_bien']=$laRow['des_bien'];
			$Fila[$cont]['id_cond']=$laRow['id_cond'];
			$Fila[$cont]['precio']=$laRow['precio'];
			$Fila[$cont]['fecha_ent']=$laRow['fecha_ent'];
			$Fila[$cont]['FechaRegistro']=$laRow['FechaRegistro'];
			$Fila[$cont]['EstatusArti']=$laRow['EstatusArti'];
			$Fila[$cont]['observacion_bien']=$laRow['observacion_bien'];
			$Fila[$cont]['des_tbien']=$laRow['des_tbien'];
			$Fila[$cont]['nom_marca']=$laRow['nom_marca'];
			$Fila[$cont]['nom_modelo']=$laRow['nom_modelo'];
			$cont++;
		}
		if ($cont>0)
		{
			$this->ResultadoConsulta=true;
		}
		$this->desconectar();
		return $Fila;
	}

	function BuscarRestitucionExiste($cod)
	{
		$result=false;
		$sql = "SELECT 
		id_mov,
		nro_document,
		fecha_reg,
		hora_reg,
		fecha_mov,
		FechaAcordada,
		FechabnDevuelto,
		idFentefiador,
		id_tipo_mov,
		id_prov,
		id_per,
		id_usuario,
		id_motivo_mov,
		id_periodo,
		id_dep,
		id_resp_dep,
		observacion_mov,
		id_usuario_anulacion,
		fecha_anulacion,
		id_motivo_anulacion,
		status 
		FROM movimientobn 
		WHERE nro_document='$cod' AND status='1'";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$result=true;
		}
		return $result;
	}

		function listarRestitucion()
		{
		$this->conectar();
		$cont=0;

		$sql = "SELECT 
		mov.id_mov,
		mov.nro_document,
		mov.fecha_reg,
		mov.hora_reg,
		mov.fecha_mov,
		DATE_FORMAT(mov.FechaAcordada,'%d-%m-%Y') AS FechaAcordada,
		DATE_FORMAT(mov.FechabnDevuelto,'%d-%m-%Y') AS FechabnDevuelto,
		DATE_FORMAT(mov.fecha_mov,'%d-%m-%Y') AS fechaEntregaFormato,
		DATE_FORMAT(mov.fecha_reg,'%d-%m-%Y') AS fechaRegistroFormato,
		mov.id_tipo_mov,
		mov.id_prov,
		mov.id_per,
		mov.id_usuario,
		mov.id_motivo_mov,
		mov.id_dep,
		mov.observacion_mov,
		mov.status AS EstatusMov,
		tentes.Rif AS RifEnte,
		tentes.RazonSocial AS RazonSocialEnte,
		tentes.Telefono AS TelefonoEnte,
		per.idTpersonal,
		per.nombreunoper,
		per.nombredosper,
		per.apellidounoper,
		per.apellidodosper,
		CONCAT(per.nombreunoper,' ',per.apellidounoper) AS NombreApellidoResp,
		CONCAT(rpDpto.nombreunoper,' ',rpDpto.apellidounoper) AS NombreApellidoRpdpto,
		CONCAT(datuser.nombreunoper,' ',datuser.apellidounoper) AS NombreApellidoUser,
		CONCAT(per.nombreunoper,' ',per.nombredosper) AS NombreFullResp,
		CONCAT(per.apellidounoper,' ',per.apellidodosper) AS ApellidoFullResp,
		user.idusuario,
		mot_mov.des_motivo_mov,
		tipo_mov.cod_tipo_mov,
		tipo_mov.nom_tipo_mov,
		prov.des_prov,
		depart.nombreasi,
		CONCAT(tentres.nombrefull,' ',tentres.apellidofull) AS NombreApellidoRespEnte
		FROM movimientobn AS mov 
		LEFT JOIN tpersonal AS per ON mov.id_per=per.idTpersonal
		LEFT JOIN tusuario AS user ON mov.id_usuario=user.idTusuario
		LEFT JOIN tpersonal AS datuser ON datuser.idTpersonal=user.idFpersonal
		LEFT JOIN tpersonal AS rpDpto ON rpDpto.idTpersonal=mov.id_resp_dep
		LEFT JOIN motivobn AS mot_mov ON mov.id_motivo_mov=mot_mov.id_motivo_mov
		LEFT JOIN tipomovibn AS tipo_mov ON mov.id_tipo_mov=tipo_mov.id_tipo_mov
		LEFT JOIN proveedores AS prov ON mov.id_prov=prov.id_prov
		LEFT JOIN tasignatura AS depart ON mov.id_dep=depart.idasignatura
		INNER JOIN tentesexternos AS tentes ON mov.idFentefiador=tentes.idTentesexternos
		INNER JOIN tresponsableente AS tentres ON mov.idFresponsableente=tentres.idTresponsableente
		WHERE  mov.id_tipo_mov='6' 
		AND mov.status='1' ORDER BY mov.fecha_reg,mov.hora_reg DESC";


			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['id_mov'];
				$Fila[$cont][1]=$laRow['nro_document'];
				$Fila[$cont][2]=$laRow['fecha_reg'];
				$Fila[$cont][3]=$laRow['hora_reg'];
				$Fila[$cont][4]=$laRow['fecha_mov'];
				$Fila[$cont][5]=$laRow['id_tipo_mov'];
				$Fila[$cont][6]=$laRow['id_prov'];
				$Fila[$cont][7]=$laRow['id_per'];
				$Fila[$cont][8]=$laRow['id_usuario'];
				$Fila[$cont][9]=$laRow['id_motivo_mov'];
				$Fila[$cont][10]=$laRow['id_dep'];
				$Fila[$cont][11]=$laRow['observacion_mov'];
				$Fila[$cont][12]=$laRow['idTpersonal'];
				$Fila[$cont][13]=$laRow['nombreunoper'];
				$Fila[$cont][14]=$laRow['nombredosper'];
				$Fila[$cont][15]=$laRow['apellidounoper'];
				$Fila[$cont][16]=$laRow['apellidodosper'];
				$Fila[$cont][17]=$laRow['NombreFullResp'];
				$Fila[$cont][18]=$laRow['ApellidoFullResp'];
				$Fila[$cont][19]=$laRow['idusuario'];
				$Fila[$cont][20]=$laRow['des_motivo_mov'];
				$Fila[$cont][21]=$laRow['cod_tipo_mov'];
				$Fila[$cont][22]=$laRow['nom_tipo_mov'];
				$Fila[$cont][23]=$laRow['des_prov'];
				$Fila[$cont][24]=$laRow['nombreasi'];
				$Fila[$cont][25]=$laRow['fechaEntregaFormato'];
				$Fila[$cont][26]=$laRow['fechaRegistroFormato'];
				$Fila[$cont][27]=$laRow['NombreApellidoResp'];
				$Fila[$cont][28]=$laRow['NombreApellidoUser'];
				$Fila[$cont][29]=$laRow['EstatusMov'];
				$Fila[$cont][30]=$laRow['NombreApellidoRpdpto'];
				$Fila[$cont][31]=$laRow['FechaAcordada'];
				$Fila[$cont][32]=$laRow['FechabnDevuelto'];
				$Fila[$cont][33]=$laRow['RifEnte'];
				$Fila[$cont][34]=$laRow['RazonSocialEnte'];
				$Fila[$cont][35]=$laRow['TelefonoEnte'];
				$Fila[$cont][36]=$laRow['NombreApellidoRespEnte'];
				$cont++;
			}
			
			$this->desconectar();
			return $Fila;

	}


	function converArray($rs){
		return $this->TraerArreglo($rs);
	}

	function consultarTrazabilidadBien($bien){

		$sql = "SELECT 
		arti.id_bien,
		arti.cod_bien,
		arti.LlavePrestado,
		arti.id_tbien,
		arti.serial_bien,
		arti.id_marca,
		arti.id_modelo,
		arti.des_bien,
		arti.id_cond,
		arti.precio,
		arti.fecha_ent,
		arti.FechaRegistro,
		arti.status,
		arti.observacion_bien 
		FROM articulobn AS arti 
		WHERE arti.id_cond='1' AND arti.id_bien='$bien' AND arti.status='1'";
		$rs = $this->ejecuta($sql);
		$cantidad = $this->converArray($rs);

		if($cantidad['cantidad'] == 1){
			$resultado = true;
		}
		else
		{
			$resultado = false;
		}
		
		return $resultado;
	}

	function anularRestitucion($idAsig,$MotAnulacion){
		$transaccion = false; // inicializo la variable en false
		$this->inicio_trans(); // inicializo la trasaccion
		//actualizo el status				
		$contaFalse=0;
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fecha = $obj_fechaHora->ObtenerFechaServer3();
			
		/***********************************************/

		$sql = "UPDATE movimientobn SET status='0' id_mov_prestamo=NULL WHERE id_mov='".$idAsig."'";
		$this->ejecuta($sql);

		if( $this->como_va() )
		{
			/* inserto los datos correspondiente de la anulacion en la tabla movimientos */
			$sql = "UPDATE movimientobn SET id_usuario_anulacion='".$_SESSION["id_usuario"]."', fecha_anulacion='".$fecha."', id_motivo_anulacion='".$MotAnulacion."' WHERE id_mov='".$idAsig."'";
			$this->ejecuta($sql);

			if( $this->como_va() )
			{

				/* actulizo el status en la tabla detalle del movimiento */
				$sql = "UPDATE dmovimientobn SET status='0' WHERE id_mov='".$idAsig."'";
				$this->ejecuta($sql);


				if( $this->como_va() )
				{

					/* busco en la tabla detalle el id del bien nacional mediante el id de la recepcion para llegar a los bienes pertenecientes en su*/
					$sql = "SELECT 
					dmov.id_bien,
					mov.id_mov_prestamo
					FROM dmovimientobn AS dmov
					LEFT JOIN movimientobn AS mov ON mov.id_mov=dmov.id_mov
					WHERE mov.id_mov='$idAsig'";
					$rs = $this->ejecuta($sql);
					if( $this->como_va() )
					{
						/* actualizo en la tabla bien */
						while ( $tupla = $this->converArray($rs) ) 
						{	
							$id_mov_prest=$tupla["id_mov_prestamo"];

								$sql = "UPDATE articulobn SET id_cond='4' WHERE id_bien ='".$tupla["id_bien"]."'";
								$this->ejecuta($sql);
								if ($this->como_va()==false)
								{
									$contaFalse++;
								}
						}
						if($contaFalse==0)
						{
							$sql = "UPDATE movimientobn SET FechabnDevuelto=NULL WHERE id_mov ='$id_mov_prest'";
							$this->ejecuta($sql);

							if( $this->como_va() )
							{
								$transaccion = true;
							}
							else
							{
								$transaccion = false;
							}
						}
						else
						{
							$transaccion = false;
						}
					}
					else
					{
						$transaccion = false;
					}

				}
				else
				{
					$transaccion = false;
				}


			}
			else
			{
				$transaccion = false;
			}

		}
		else
		{
			$transaccion = false;
		}


		if( $transaccion ){
		 	$this->fin_trans(); // finalizo la transaccion con exito
		 	//$this->deshacer_trans(); // finalizo la transaccion fallida 
		 	return true;
		}else{
		 	$this->deshacer_trans(); // finalizo la transaccion fallida 
	 		return false;
		}
	}//cierre anulación asignacion

	
	function consultar_restitucion_bitacora()
	{
		$this->conectar();
		$cont=0;
		$sql = "SELECT 
		mov.id_mov,
		mov.nro_document,
		mov.fecha_reg,
		mov.hora_reg,
		mov.fecha_mov,
		mov.FechaAcordada,
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
		dmov.id_mov,
		dmov.id_bien,
		dmov.status AS EstatusDet,
		arti.id_bien,
		arti.cod_bien,
		arti.LlavePrestado,
		arti.id_tbien,
		arti.serial_bien,
		arti.id_marca,
		arti.id_modelo,
		arti.des_bien,
		arti.id_cond,
		arti.fecha_ent,
		arti.FechaRegistro,
		arti.status AS EstatusArti,
		arti.observacion_bien
		FROM movimientobn AS mov
		INNER JOIN dmovimientobn AS dmov ON mov.id_mov=dmov.id_mov
		INNER JOIN articulobn AS arti ON dmov.id_bien=arti.id_bien
		WHERE mov.id_mov='$this->lcIDdocumento' AND mov.status='1' AND arti.status='1' AND dmov.status='1' AND mov.id_tipo_mov='6'
		ORDER BY arti.id_bien ASC";
		$pcsql=$this->filtro($sql);
		while($laRow=$this->proximo($pcsql))
		{
			$Fila[$cont]['id_mov']=$laRow['id_mov'];
			$Fila[$cont]['nro_document']=$laRow['nro_document'];
			$Fila[$cont]['fecha_reg']=$laRow['fecha_reg'];
			$Fila[$cont]['hora_reg']=$laRow['hora_reg'];
			$Fila[$cont]['fecha_mov']=$laRow['fecha_mov'];
			$Fila[$cont]['FechaAcordada']=$laRow['FechaAcordada'];
			$Fila[$cont]['FechabnDevuelto']=$laRow['FechabnDevuelto'];
			$Fila[$cont]['idFentefiador']=$laRow['idFentefiador'];
			$Fila[$cont]['id_tipo_mov']=$laRow['id_tipo_mov'];
			$Fila[$cont]['id_prov']=$laRow['id_prov'];
			$Fila[$cont]['id_per']=$laRow['id_per'];
			$Fila[$cont]['id_usuario']=$laRow['id_usuario'];
			$Fila[$cont]['id_motivo_mov']=$laRow['id_motivo_mov'];
			$Fila[$cont]['id_periodo']=$laRow['id_periodo'];
			$Fila[$cont]['id_dep']=$laRow['id_dep'];
			$Fila[$cont]['id_resp_dep']=$laRow['id_resp_dep'];
			$Fila[$cont]['observacion_mov']=$laRow['observacion_mov'];
			$Fila[$cont]['id_usuario_anulacion']=$laRow['id_usuario_anulacion'];
			$Fila[$cont]['fecha_anulacion']=$laRow['fecha_anulacion'];
			$Fila[$cont]['id_motivo_anulacion']=$laRow['id_motivo_anulacion'];
			$Fila[$cont]['EstatusMov']=$laRow['EstatusMov'];
			$Fila[$cont]['id_mov']=$laRow['id_mov'];
			$Fila[$cont]['id_bien']=$laRow['id_bien'];
			$Fila[$cont]['EstatusDet']=$laRow['EstatusDet'];
			$Fila[$cont]['id_bien']=$laRow['id_bien'];
			$Fila[$cont]['cod_bien']=$laRow['cod_bien'];
			$Fila[$cont]['LlavePrestado']=$laRow['LlavePrestado'];
			$Fila[$cont]['id_tbien']=$laRow['id_tbien'];
			$Fila[$cont]['serial_bien']=$laRow['serial_bien'];
			$Fila[$cont]['id_marca']=$laRow['id_marca'];
			$Fila[$cont]['id_modelo']=$laRow['id_modelo'];
			$Fila[$cont]['des_bien']=$laRow['des_bien'];
			$Fila[$cont]['id_cond']=$laRow['id_cond'];
			$Fila[$cont]['fecha_ent']=$laRow['fecha_ent'];
			$Fila[$cont]['FechaRegistro']=$laRow['FechaRegistro'];
			$Fila[$cont]['EstatusArti']=$laRow['EstatusArti'];
			$Fila[$cont]['observacion_bien']=$laRow['observacion_bien'];
			$cont++;
		}
		$this->desconectar();
		return $Fila;
	}

}

?>