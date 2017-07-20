<?php
session_start();
	require_once('../../nucleo/ModeloConect.php');
class clsGrafica Extends ModeloConect{
	private $G;
	private $lcIDdocumento;

	function clsGrafica(){
		$this->clsConexion();
		$this->G = "";
	}

	function RecibirTodo($POST){
		$this->G = $POST;
	}
	function listarTipoBien()
	{
		$this->conectar();
		$sql= "SELECT * FROM tipobn";
		$pcsql=$this->filtro($sql);
		$this->desconectar();
		return $pcsql;
	}
	function contar($rs){
		return $this->num_registros($rs);
	}
	function totales()
	{
		$id=$this->G;
		$this->conectar();
		$sql="SELECT * FROM articulobn WHERE id_tbien='$id'";
		$pcsql=$this->filtro($sql);
		$t=$this->num_registros($pcsql);
		$sql="SELECT * FROM articulobn WHERE id_tbien='$id' AND id_cond=1";
		$pcsql=$this->filtro($sql);
		$di=$this->num_registros($pcsql);
		$sql="SELECT * FROM articulobn WHERE id_tbien='$id' AND id_cond=2";
		$pcsql=$this->filtro($sql);
		$a=$this->num_registros($pcsql);
		$sql="SELECT * FROM articulobn WHERE id_tbien='$id' AND id_cond=3";
		$pcsql=$this->filtro($sql);
		$de=$this->num_registros($pcsql);
		$sql="SELECT * FROM articulobn WHERE id_tbien='$id' AND id_cond=4";
		$pcsql=$this->filtro($sql);
		$p=$this->num_registros($pcsql);
		$this->desconectar();
		$Fila[0]=$t;$Fila[1]=$di;$Fila[2]=$a;$Fila[3]=$de;$Fila[4]=$p;
		return $Fila;
	}
	function converArray($rs){
		return $this->proximo($rs);
	}
}
?>