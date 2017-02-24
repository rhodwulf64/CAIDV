<?php
session_start();
	require_once('../nucleo/ModeloConect.php');
 //****************************COMIENZO DE LA CLASE DEL OBJETO MUNICIPIO**********************//
class clsRecepcion Extends ModeloConect{
	private $G;
	private $lcIDdocumento;

	function clsRecepcion(){
		$this->clsConexion();
		$this->G = "";
	}

	function RecibirTodo($POST){
		$this->G = $POST;
	}

	function set_NroDocumento($pcIDdocumento)
	{
		$this->lcIDdocumento=$pcIDdocumento;
	}

	function get_NroDocumento()
	{
		return $this->lcIDdocumento;
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
		$sql = "INSERT INTO movimientobn (
		nro_document,
		fecha_reg,
		hora_reg,
		fecha_mov,
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
		) VALUES(
		'".$this->G["txtNroDocumento"]."',
		'".$fecha."',
		'".$hora."',
		'".$fechaDeLlegada."',
		'1',
		NULORD('".$this->G["txtProveedor"]."'),
		NULORD('".$this->G["txtResponsable"]."'),
		NULORD('".$_SESSION['idTusuario']."'),
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

		/* consulto el ultimo id del movimiento para insertar en el bien y luego en el detalle */
		// GEDIONDOOOOOOOOOOOOOOOOO $this->fpGetIDinsertado()
				/* inserto en la tabla bien nacional */
		 		 //contador para recorrer las posiciones del vector
				$idMovimiento=$this->fpGetIDinsertado();
				$this->lcIDdocumento=$idMovimiento;
		 		for($i=1;$i<=$this->G["txtFila"];$i++)
		 		{
			 			/* inserto en la tabla bien nacional */
			 		 $sql = "INSERT INTO
			 		articulobn (
			 		cod_bien,
			 		id_tbien,
			 		serial_bien,
			 		id_marca,
			 		id_modelo,
			 		des_bien,
			 		id_cond,
			 		fecha_ent,
			 		status,
			 		observacion_bien
			 		) VALUES(
			 		NULORD('".$this->G["txtCodBN".$i]."'),
			 		'".$this->G["txtTipoBN".$i]."',
			 		NULORD('".$this->G["txtSerialBN".$i]."'),
			 		NULORD('".$this->G["txtMarcaBN".$i]."'),
			 		NULORD('".$this->G["txtModeloBN".$i]."'),
			 		NULORD('".$this->G["txtDescripcionBN".$i]."'),
			 		'1',
			 		'".$fechaDeLlegada."',
			 		'1',
			 		NULORD('".$this->G["txtObservacionBN".$i]."'))";
			 		$this->ejecuta($sql);

					/* compruebo si inserto en la tabla bien nacional */
					if( $this->como_va() )
					{
						$idArticulo=$this->fpGetIDinsertado();

					/* consulto el ultimo id del bien nacional para insertar en el detalle */
					// GEDIONDOOOOOOOOOOOOOOO

					/* compruebo para ver si en realidad inserto y si me trae la consulta */
						/* inserto en la tabla detalle del bien nacional */
						$sql = "INSERT INTO dmovimientobn (
						id_mov,
						id_bien,
						status
						) VALUES (
						'$idMovimiento',
						'$idArticulo',
						'1')";
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
				}
			}
			else
			{
				$contadorFalse++;
			}

			if( $contadorFalse==0)
			{
			 	$this->fin_trans(); // finalizo la transaccion con exito
			 	//$this->deshacer_trans(); // finalizo la transaccion fallida
				$transaccion=true;
			}
			else
			{
			 	$this->deshacer_trans(); // finalizo la transaccion fallida
			}
			return $transaccion;

	}//fin funcion

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
		$sql = "SELECT count(id_mov) as cantidad FROM movimientobn WHERE id_tipo_mov=1 and status=1";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			$cant = $tupla["cantidad"];
			return $cant;
		}
	}

	function consultar_recepcion_bitacora(){
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
		WHERE mov.id_mov='$this->lcIDdocumento' AND mov.status='1' AND arti.status='1' AND dmov.status='1' AND mov.id_tipo_mov='1'
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

	function listarBienN()
	{
		$this->conectar();
		$cont=0;

		$sql= "SELECT distinct b.`id_bien`,b.`cod_bien`,b.`id_tbien`,b.`serial_bien`,b.`id_marca`,b.`id_modelo`,b.`des_bien`,b.`id_cond`,b.`fecha_ent`,DATE_FORMAT(b.`fecha_ent`,'%d-%m-%Y') AS fechaFormato,b.`status`,b.`observacion_bien`,ma.id_marca,ma.nom_marca,ma.status,tb.id_tbien,tb.cod_tbien,tb.des_tbien,tb.id_categoria,tb.status,dm.id_detalle_mov,dm.id_mov,dm.id_bien,dm.status,m.id_mov,m.id_dep,min(m.nro_document) AS nroRecepcion,d.idasignatura,d.nombreasi,d.estatusasi,c.id_cond,c.nom_cond,c.status
			FROM articulobn as b
			INNER JOIN marcabn as ma ON b.id_marca=ma.id_marca
			INNER JOIN tipobn as tb ON b.id_tbien=tb.id_tbien
			INNER JOIN dmovimientobn as dm ON b.id_bien=dm.id_bien
			INNER JOIN movimientobn as m  ON dm.id_mov= m.id_mov
			INNER JOIN tasignatura as d ON d.idasignatura=m.id_dep
			INNER JOIN condicionbn as c ON c.id_cond=b.id_cond
			WHERE b.status= 1 and dm.id_detalle_mov in (select max(id_detalle_mov) from dmovimientobn group by id_bien) GROUP BY dm.id_bien";

			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['cod_bien'];
				$Fila[$cont][1]=$laRow['serial_bien'];
				$Fila[$cont][2]=$laRow['id_modelo'];
				$Fila[$cont][3]=$laRow['des_bien'];
				$Fila[$cont][4]=$laRow['observacion_bien'];
				$Fila[$cont][5]=$laRow['id_marca'];
				$Fila[$cont][6]=$laRow['nom_marca'];
				$Fila[$cont][7]=$laRow['id_tbien'];
				$Fila[$cont][8]=$laRow['cod_tbien'];
				$Fila[$cont][9]=$laRow['des_tbien'];
				$Fila[$cont][10]=$laRow['id_categoria'];
				$Fila[$cont][11]=$laRow['id_detalle_mov'];
				$Fila[$cont][12]=$laRow['id_mov'];
				$Fila[$cont][13]=$laRow['id_bien'];
				$Fila[$cont][14]=$laRow['idasignatura'];
				$Fila[$cont][15]=$laRow['nombreasi'];
				$Fila[$cont][16]=$laRow['estatusasi'];
				$Fila[$cont][17]=$laRow['id_cond'];
				$Fila[$cont][18]=$laRow['nom_cond'];
				$Fila[$cont][19]=$laRow['fecha_ent'];
				$Fila[$cont][20]=$laRow['fechaFormato'];
				$Fila[$cont][21]=$laRow['nroRecepcion'];
				$Fila[$cont][22]=$laRow['status'];
				$cont++;
			}

			$this->desconectar();
			return $Fila;

	}

	function listarRecepciones()
	{
		$this->conectar();
		$cont=0;

		$sql = "SELECT
		mov.id_mov,
		mov.nro_document,
		mov.fecha_reg,
		mov.hora_reg,
		mov.fecha_mov,
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
		per.idTpersonal,
		per.nombreunoper,
		per.nombredosper,
		per.apellidounoper,
		per.apellidodosper,
		CONCAT(per.nombreunoper,' ',per.apellidounoper) AS NombreApellidoResp,
		CONCAT(datuser.nombreunoper,' ',datuser.apellidounoper) AS NombreApellidoUser,
		CONCAT(per.nombreunoper,' ',per.nombredosper) AS NombreFullResp,
		CONCAT(per.apellidounoper,' ',per.apellidodosper) AS ApellidoFullResp,
		user.idusuario,
		mot_mov.des_motivo_mov,
		tipo_mov.cod_tipo_mov,
		tipo_mov.nom_tipo_mov,
		prov.nombre AS des_prov,
		depart.nombreasi
		FROM movimientobn AS mov
		LEFT JOIN tpersonal AS per ON mov.id_per=per.idTpersonal
		LEFT JOIN tusuario AS user ON mov.id_usuario=user.idTusuario
		LEFT JOIN tpersonal AS datuser ON datuser.idTpersonal=user.idFpersonal
		LEFT JOIN motivobn AS mot_mov ON mov.id_motivo_mov=mot_mov.id_motivo_mov
		LEFT JOIN tipomovibn AS tipo_mov ON mov.id_tipo_mov=tipo_mov.id_tipo_mov
		LEFT JOIN am_tempresa AS prov ON mov.id_prov=prov.idEmpresa
		LEFT JOIN tasignatura AS depart ON mov.id_dep=depart.idasignatura
		WHERE mov.id_tipo_mov='1'
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
				$Fila[$cont][6]=$laRow['idEmpresa'];
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
				$cont++;
			}

			$this->desconectar();
			return $Fila;

	}

	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function ConsulCabRece($idRecep){
		$sql = "SELECT mv.observacion_mov FROM movimientobn as mv WHERE id_mov='".$idRecep."'";
		return $this->ejecuta($sql);
	}
	function traerDeparYRespos($idResp,$idDep){
		if( $idResp == "" ){
			$sql =
			"	SELECT CONCAT('C.I. ',ced_per,' - ',nom_per,' ',ape_per) as perso, dep.nom_dep
				FROM personal as per INNER JOIN departamento as dep
				WHERE per.id_per='".$idResp."' and dep.id_dep='".$idDep."'
			";
		}else if( $idResp != ""){
			$sql =
			"	SELECT CONCAT('C.I. ',ced_per,' - ',nom_per,' ',ape_per) as perso, dep.nom_dep
				FROM personal as per INNER JOIN departamento as dep
				WHERE dep.id_dep='".$idDep."'
			";
		}

		$rs = $this->ejecuta($sql);
		$tupla = $this->converArray($rs);
		return $tupla;

	}
	function formatearFecha($fec_Lleg){
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fechaFormateada = $obj_fechaHora->traerFecha2($fec_Lleg);
		return $fechaFormateada;
	}
	function validarCodigodelBien($codigo){
		$sql = "SELECT cod_bien FROM articulobn WHERE cod_bien='".$codigo."' and status='1' ";
		$this->ejecuta($sql);
		if( $this->como_va() ){
			return true;
		}else{ return false; }
	}
	function ConsultarBienParaModalDetalle($cod){
		$sql = "SELECT mov.id_dep,mov.id_resp_dep FROM movimientobn as mov WHERE id_mov in (SELECT max(id_mov) FROM dmovimientobn WHERE id_bien='".$cod."' and status='1') ";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			return $tupla;
		}else{
			return false;
		}
	}
	function consultarPorSoloCodigo($codigo_bien){
		$sql =
			"	SELECT b_n.id_bien,t_bn.cod_tbien, cond.nom_cond
				FROM articulobn as b_n INNER JOIN tipobn as t_bn INNER JOIN condicion as cond
				WHERE cod_bien='".$codigo_bien."' and  b_n.id_tbien=t_bn.id_tbien and b_n.id_cond=cond.id_cond and b_n.status='1'
			";

		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			return $tupla;
		}else{
			return false;
		}
	}
	function consultarPorSoloID($ID_BN){
		$sql =
			"	SELECT b_n.id_bien,t_bn.cod_tbien, cond.nom_cond
				FROM articulobn as b_n INNER JOIN tipobn as t_bn INNER JOIN condicion as cond
				WHERE id_bien='".$ID_BN."' and  b_n.id_tbien=t_bn.id_tbien and b_n.id_cond=cond.id_cond and b_n.status='1'
			";

		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			return $tupla;
		}else{
			return false;
		}
	}
	function ConsultarBienParaModalDetalleMov($cod){
		$sql = "SELECT mov.id_dep,mov.id_resp_dep FROM movimientobn as mov WHERE id_mov in (SELECT max(id_mov) FROM dmovimientobn WHERE id_bien='".$cod."' and status='1') ";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			return $tupla;
		}else{
			return false;
		}
	}

	function BuscarBNExisteCOD($cod)
	{
		$result=false;
		$sql = "SELECT
		id_bien,
		cod_bien,
		LlavePrestado,
		id_tbien,
		serial_bien,
		id_marca,
		id_modelo,
		des_bien,
		id_cond,
		precio,
		fecha_ent,
		FechaRegistro,
		status,
		observacion_bien
		FROM articulobn WHERE cod_bien='$cod' AND status='1'";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$result=true;
		}
		return $result;
	}


	function BuscarRecepcionExiste($cod)
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



	function consultarBien($id_mov){
		//$sql = "SELECT b_n.id_bien,b_n.cod_bien,b_n.id_tbien,b_n.serial_bien,b_n.id_marca,b_n.id_modelo,b_n.des_bien,b_n.id_cond,b_n.precio,b_n.fecha_ent,b_n.observacion_bien, FROM articulobn as b_n INNER JOIN marca as mar INNER JOIN tipobn as tb INNER JOIN condicion as cond";
		//consulto la trazabilidad del bien nacional en la tabla detalle

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
	function consultarTrazabilidadBien($bien){

		$sql = "SELECT count(id_bien) as cantidad FROM `dmovimientobn` as d_m WHERE d_m.id_bien='$bien' and d_m.status='1'";
		$rs = $this->ejecuta($sql);
		$cantidad = $this->converArray($rs);

		if($cantidad['cantidad'] > 1){
			$resultado = true;
		}else{
			$resultado = false;
		}

		return $resultado;
	}
	function anularRecepcion($idRecep,$MotAnulacion){
		$transaccion = false; // inicializo la variable en false
		$this->inicio_trans(); // inicializo la trasaccion
		//actualizo el status

		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fecha = $obj_fechaHora->ObtenerFechaServer3();

		/***********************************************/

		$sql = "UPDATE movimientobn SET status='0' WHERE id_mov='".$idRecep."'";
		$this->ejecuta($sql);

		if( $this->como_va() ){
			/* inserto los datos correspondiente de la anulacion en la tabla movimientos */
			$sql = "UPDATE movimientobn SET id_usuario_anulacion='".$_SESSION["id_usuario"]."', fecha_anulacion='".$fecha."', id_motivo_anulacion='".$MotAnulacion."' WHERE id_mov='".$idRecep."'";
			$this->ejecuta($sql);

			if( $this->como_va() ){

				/* actulizo el status en la tabla detalle del movimiento */
				$sql = "UPDATE dmovimientobn SET status='0' WHERE id_mov='".$idRecep."'";
				$this->ejecuta($sql);


				if( $this->como_va() ){

					/* busco en la tabla detalle el id del bien nacional mediante el id de la recepcion para llegar a los bienes pertenecientes en su*/
					$sql = "SELECT id_bien FROM dmovimientobn WHERE id_mov='".$idRecep."'";
					$rs = $this->ejecuta($sql);
					if( $this->como_va() ){
						/* actualizo en la tabla bien */
						while ( $tupla = $this->converArray($rs) ) {
							$sql = "UPDATE articulobn SET status='0' WHERE id_bien ='".$tupla["id_bien"]."'";
							$this->ejecuta($sql);
						}

						if( $this->como_va() ){
							$transaccion = true;
						}else{
							$transaccion = false;
						}

					}else{
						$transaccion = false;
					}

				}else{
					$transaccion = false;
				}


			}else{
				$transaccion = false;
			}

		}else{
			$transaccion = false;
		}


		if( $transaccion ){
		 	$this->fin_trans(); // finalizo la transaccion con exito
		 	return true;
		}else{
		 	$this->deshacer_trans(); // finalizo la transaccion fallida
	 		return false;
		}
	}


}//cierre clase

?>
