<?php

	require_once('../nucleo/ModeloConect.php');
	class clsMotivo extends ModeloConect
	{
		private $lcIDprincipal;
		private $lcDes_moti;
		private $tipo_motivo;
		private $lcItem;
		private $lcEspacio;
		private $lcEstatus;

		function set_IDprincipal($pcIDmotivo)
		{
			$this->lcIDprincipal=$pcIDmotivo;
		}

		function set_Descripcion($pcDescrip)
		{
			$this->lcDes_moti=$pcDescrip;
		}

		function set_TipoMotivo($pcDatos)
		{
			$this->tipo_motivo=$pcDatos;
		}

		function set_Espacio($pcEspacio)
		{
			$this->lcEspacio=$pcEspacio;
		}

		function set_Estatus($pcEstatus)
		{
			$this->lcEstatus=$pcEstatus;
		}



		function consultar_motivo()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `motivobn` WHERE `id_motivo_mov`='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$Fila[0]=$laRow['id_motivo_mov'];
					$Fila[1]=$laRow['des_motivo_mov'];
					$Fila[2]=$laRow['tipo_motivo'];
					$Fila[3]=$laRow['status'];
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_dependencia()
		{
			$this->conectar();
			$dependencia=false;			
				$sql="SELECT * FROM motivobn  WHERE id_motivo_mov='$this->lcIDprincipal'";
				$pcsql=$this->filtro($sql);
				if($laRow=$this->proximo($pcsql))
				{
					$dependencia=true;
				}
			
			$this->desconectar();
			return $dependencia;
		}

		function consultar_motivos()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `motivobn` AND status='1'";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_motivo_mov'];
					$Fila[$cont][1]=$laRow['des_motivo_mov'];
					$Fila[$cont][2]=$laRow['tipo_motivo'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_motivos_inactivas()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT * FROM `motivobn`";
				$pcsql=$this->filtro($sql);
				while($laRow=$this->proximo($pcsql))
				{
					$Fila[$cont][0]=$laRow['id_motivo_mov'];
					$Fila[$cont][1]=$laRow['des_motivo_mov'];
					$Fila[$cont][2]=$laRow['tipo_motivo'];
					$Fila[$cont][3]=$laRow['status'];
					$cont++;
				}
			
			$this->desconectar();
			return $Fila;
		}

		function consultar_motivo_bitacora()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tmot.id_motivo_mov,
				tmot.des_motivo_mov,
				tmot.tipo_motivo,
				ttipm.Descripcion AS tipoMotivoDesc,
				tmot.status 
				FROM motivobn AS tmot
				INNER JOIN tipomotivo AS ttipm ON ttipm.idTipoMotivo=tmot.tipo_motivo";

			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont][0]=$laRow['id_motivo_mov'];
				$Fila[$cont][1]=$laRow['des_motivo_mov'];
				$Fila[$cont][2]=$laRow['tipoMotivoDesc'];
				$Fila[$cont][3]=$laRow['status'];
				$cont++;
			}
		
			$this->desconectar();
			return $Fila;
		}


		function consultar_motivo_especifico()
		{
			$this->conectar();
			$cont=0;
				$sql="SELECT 
				tprov.id_motivo_mov,
				tprov.des_motivo_mov,
				tprov.tipo_motivo,
				tprov.status 
				FROM motivobn AS tprov 
				WHERE tprov.id_motivo_mov='$this->lcIDprincipal'";

			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['id_motivo_mov']=$laRow['id_motivo_mov'];
				$Fila['des_motivo_mov']=$laRow['des_motivo_mov'];
				$Fila['tipo_motivo']=$laRow['tipo_motivo'];
				$Fila['status']=$laRow['status'];
			}
		
			$this->desconectar();
			return $Fila;
		}

		function registrar_motivo()
		{
			$this->conectar();

			$sql="INSERT INTO `motivobn`(`des_motivo_mov`, tipo_motivo,status) 
			VALUES (UPPER('$this->lcDes_moti'),'$this->tipo_motivo','1')";
		
			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();

			return $lnHecho;
		}

		function eliminar_motivo()
		{
			$this->conectar();
			$sql="UPDATE motivobn SET status='0' WHERE id_motivo_mov='$this->lcIDprincipal'";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function restaurar_motivo()
		{
			$this->conectar();
			$sql="UPDATE motivobn SET status='1' WHERE id_motivo_mov='$this->lcIDprincipal' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}
		
		function editar_motivo()
		{
			$this->conectar();
			$sql="UPDATE `motivobn` SET `des_motivo_mov`=UPPER('$this->lcDes_moti'), `tipo_motivo`=UPPER('$this->tipo_motivo') WHERE id_motivo_mov='$this->lcIDprincipal'";

			$lnHecho=$this->ejecutar($sql);

			$this->desconectar();
			return $lnHecho;
		}
	}
?>