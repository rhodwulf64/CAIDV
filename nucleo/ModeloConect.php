<?php
@include_once('../libreria/constantes.php');
@include_once('../../libreria/constantes.php');
class ModeloConect
{

	private $servidor=HOST;
	private $usuario=USER;
	private $clave=PASS;
	public $bd=BD;
	protected $laRow = array();
	private $con;
	private $res;
	private $OmyI;
	private $asIDinsertado;

	function clsConexion()  // constructor de la clase
	{
		$this->OmyI = new  mysqli( $this->servidor, $this->usuario, $this->clave, $this->bd );// se
	}


	protected function maxid()
 	{
	    $ultimo=mysql_insert_id($this->con);
	    return $ultimo;
	}

	protected function conectar()
	{
		$this->con=mysql_connect($this->servidor,$this->usuario,$this->clave);
		mysql_select_db($this->bd,$this->con);
	}

	protected function desconectar()
	{
		mysql_close($this->con);
	}

	protected function fpGetIDinsertado()
	{
		return $this->asIDinsertado;
	}

	  //FUNCION PROTEGIDA FILTRO DE BUSQUEDA
      protected function filtro($sql)
      {
      	 $lrTb=mysql_query($sql,$this->con) OR die(mysql_error());
      	 return $lrTb;
      }

      //FUNCION PROTEGIDA CIERRAFILTRO DE BUSQUEDA
      protected function cierrafiltro($result)
      {
         mysql_free_result($result);
      }

	protected function ejecutar($sql)
	{
		$this->res=mysql_query($sql,$this->con) or die(mysql_error());
		if (mysql_affected_rows($this->con)==0)
		    return false;
		 return true;
	}

	//FUNCION PROXIMO PARA RECORRER result PROXIMA POSICION DEL ARRAY
      protected function proximo($result)
      {
      	 $laRow=mysql_fetch_array($result);
      	 return $laRow;
      }

	  //FUNCION PROTEGIDA NUMERO DE REGISTROS PARA SABER LA CANTIDAD DE REGISTROS EXISTENTES
      protected function num_registros($result)
      {
 	     $lnRegistros=mysql_num_rows($result);
 	     return $lnRegistros;
      }

	//FUNCION BEGIN
      protected function begin()
	  {
	     mysql_query("BEGIN",$this->con);
	  }

	  //FUNCION COMMIT
	  protected function commit()
	  {
	     mysql_query("COMMIT",$this->con);
	  }

	  //FUNCION ROLLBACK
	  protected function rollback()
	  {
	     mysql_query("ROLLBACK",$this->con);
	  }

	  protected function fecha_bd($pcFecha)

	  {
	  	 return $fecha=date("Y-m-d",strtotime($pcFecha));
	  }

	  //Funciones nuevas 2016

	function ejecuta($sql)
	{
		if ( mysqli_connect_error() ) // existe algun error al conectar
			die( "No se conecta: " . mysqli_connect_error() );
		$result = $this->OmyI->query( $sql ); // se ejecuta el query
		return $result;
	}
	function como_va(){
		if ( $this->OmyI->affected_rows > 0 ) // verifica si la operacion ICME se ejecuta bien
		{
			$this->asIDinsertado=mysqli_insert_id($this->OmyI);
			return true;
		}
		else
		{
			return false;
		}
	}



	function TraerArreglo($rs){ // convierte un record set en un arreglo
		return $rs->fetch_array(MYSQLI_ASSOC);
	}
	/* funciones para la transaccion */
	function inicio_trans(){ // inicializo la transaccion
		$this->ejecuta("START TRANSACTION");
	}
	function fin_trans(){ // finalizo la transacion
		$this->ejecuta("COMMIT");
	}
	function deshacer_trans(){ // deshago la transaccion
		$this->ejecuta("ROLLBACK");
	}
	function generaRecuperador($rango=30)
	{
		$recuperador=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $rango);

		return $recuperador;
	}

}
?>
