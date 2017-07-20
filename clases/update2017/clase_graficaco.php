<?php
session_start();
	require_once('../../nucleo/ModeloConect.php');
class clsGraficaCo Extends ModeloConect{
	private $G;
	private $lcIDdocumento;

	function clsGraficaco(){
		$this->clsConexion();
		$this->G = "";
	}

	function RecibirTodo($POST){
		$this->G = $POST;
	}
	function listarArticulo()
	{
		$this->conectar();
		$sql= "SELECT * FROM tarticulo";
		$pcsql=$this->filtro($sql);
		$this->desconectar();
		return $pcsql;
	}
	function contar($rs){
		return $this->num_registros($rs);
	}
	function converArray($rs){
		return $this->proximo($rs);
	}
}
?>