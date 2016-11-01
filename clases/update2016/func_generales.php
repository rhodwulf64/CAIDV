<?php @session_start();
	require_once('../nucleo/ModeloConect.php');
 //****************************COMIENZO DE LA CLASE DEL OBJETO MUNICIPIO**********************//
class clsFuncGenerales Extends ModeloConect{
	private $G;
	
	function clsFuncGenerales(){
		$this->clsConexion();
		$this->G = "";
	}

	function RecibirTodo($POST){
		$this->G = $POST;
	}
    
    function fnComboMotivosGeneral($selected,$tipoMotivo)
    {

        $this->conectar();
        $sql="SELECT 
        id_motivo_mov,
        des_motivo_mov,
        tipo_motivo,
        status FROM motivobn WHERE tipo_motivo='$tipoMotivo' AND status='1'";
        $pcsql=$this->filtro($sql);
        while($laRow=$this->proximo($pcsql))
        {
            if( (isset($selected)) && ($selected == trim($laRow["id_motivo_mov"])) ){
                $options=$options."<option value='".trim($laRow["id_motivo_mov"])."' class='".trim($laRow["tipo_motivo"])."' selected>".$laRow["des_motivo_mov"]."</option>";
            }else{
                $options=$options."<option value='".trim($laRow["id_motivo_mov"])."' class='".trim($laRow["tipo_motivo"])."'>".$laRow["des_motivo_mov"]."</option>";
            }
        }
        return $options;
    }   
        
    function fnComboTipoMotivos($selected)
    {

        $this->conectar();
        $sql="SELECT 
        idTipoMotivo,
        Descripcion,
        Estatus 
        FROM tipomotivo 
        WHERE Estatus='1'";
        $pcsql=$this->filtro($sql);
        while($laRow=$this->proximo($pcsql))
        {
            if( (isset($selected)) && ($selected == trim($laRow["idTipoMotivo"])) ){
                $options=$options."<option value='".trim($laRow["idTipoMotivo"])."' class='".trim($laRow["Descripcion"])."' selected>".$laRow["Descripcion"]."</option>";
            }else{
                $options=$options."<option value='".trim($laRow["idTipoMotivo"])."' class='".trim($laRow["Descripcion"])."'>".$laRow["Descripcion"]."</option>";
            }
        }
        return $options;
    }     	
    
    function fnComboCategoriaBN($selected)
    {

        $this->conectar();
        $sql="SELECT 
        id_categoria,
        nom_cat,
        status 
        FROM categoriabn 
        WHERE status='1'";
        $pcsql=$this->filtro($sql);
        while($laRow=$this->proximo($pcsql))
        {
            if( (isset($selected)) && ($selected == trim($laRow["id_categoria"])) ){
                $options=$options."<option value='".trim($laRow["id_categoria"])."' class='".trim($laRow["nom_cat"])."' selected>".$laRow["nom_cat"]."</option>";
            }else{
                $options=$options."<option value='".trim($laRow["id_categoria"])."' class='".trim($laRow["nom_cat"])."'>".$laRow["nom_cat"]."</option>";
            }
        }
        return $options;
    }        

    function fnComboEnteReceptor($selected)
    {

        $this->conectar();
        $sql="SELECT 
        idTentesexternos,
        RazonSocial,
        Rif,
        Telefono,
        Estatus 
        FROM tentesexternos 
        WHERE Estatus='1'";
        $pcsql=$this->filtro($sql);
        while($laRow=$this->proximo($pcsql))
        {
            if( (isset($selected)) && ($selected == trim($laRow["idTentesexternos"])) ){
                $options=$options."<option value='".trim($laRow["idTentesexternos"])."' class='".trim($laRow["RazonSocial"])."' selected>".$laRow["RazonSocial"].", ".$laRow["Rif"].", ".$laRow["Telefono"]."</option>";
            }else{
                $options=$options."<option value='".trim($laRow["idTentesexternos"])."' class='".trim($laRow["RazonSocial"])."'>".$laRow["RazonSocial"].", ".$laRow["Rif"].", ".$laRow["Telefono"]."</option>";
            }
        }
        return $options;
    }    
       
    function fnComboMarcaBN($selected)
    {

		$this->conectar();
        $sql="SELECT 
        id_marca,
        nom_marca,
        status 
        FROM marcabn 
        WHERE status='1'";
        $pcsql=$this->filtro($sql);
		while($laRow=$this->proximo($pcsql))
		{
            if( (isset($selected)) && ($selected == trim($laRow["id_marca"])) ){
                $options=$options."<option value='".trim($laRow["id_marca"])."' class='".trim($laRow["nom_marca"])."' selected>".$laRow["nom_marca"]."</option>";
            }else{
                $options=$options."<option value='".trim($laRow["id_marca"])."' class='".trim($laRow["nom_marca"])."'>".$laRow["nom_marca"]."</option>";
            }
        }
        return $options;
    }   
    
    function fnCombosGeneralesActivos($tabla,$idCampo,$textoDescrip,$textoConcat,$campoEstatus,$selected)
    {

        $this->conectar();
        $sql="SELECT * FROM $tabla WHERE $campoEstatus='1'";
        $pcsql=$this->filtro($sql);
        while($laRow=$this->proximo($pcsql))
        {
          
          if ($laRow[$textoConcat]!="")
          {
            $separadorSegundo=" * ";
          }
          else
          {
            $separadorSegundo="";
          } 
            if( (isset($selected)) && ($selected == trim($laRow[$idCampo])) ){
                $options=$options."<option value='".trim($laRow[$idCampo])."' selected>".$laRow[$textoDescrip].$separadorSegundo.$laRow[$textoConcat]."</option>";
            }else{
                $options=$options."<option value='".trim($laRow[$idCampo])."'>".$laRow[$textoDescrip].$separadorSegundo.$laRow[$textoConcat]."</option>";
            }
        }
        return $options;
    }   

    function fnCombosEntesExternos($selected)
    {

        $this->conectar();
        $sql="SELECT * FROM tentesexternos WHERE Estatus='1'";
        $pcsql=$this->filtro($sql);
        while($laRow=$this->proximo($pcsql))
        {
          
            if( (isset($selected)) && ($selected == trim($laRow["idTentesexternos"])) ){
                $options=$options."<option value='".trim($laRow["idTentesexternos"])."' selected>".$laRow["RazonSocial"]." * ".$laRow["Rif"]." * ".$laRow["Telefono"]."</option>";
            }else{
                $options=$options."<option value='".trim($laRow["idTentesexternos"])."'>".$laRow["RazonSocial"]." * ".$laRow["Rif"]." * ".$laRow["Telefono"]."</option>";
            }
        }
        return $options;
    }   
  
    function fnCombosPersonalActivos($selected)
    {

    $this->conectar();
        $sql="SELECT * FROM tpersonal WHERE estatusper='1'";
        $pcsql=$this->filtro($sql);
    while($laRow=$this->proximo($pcsql))
    {
            if( (isset($selected)) && ($selected == trim($laRow["idTpersonal"])) ){
                $options=$options."<option value='".trim($laRow["idTpersonal"])."' selected>".$laRow["nombreunoper"]." ".$laRow["apellidounoper"]." - ".$laRow["nacionalidadper"].$laRow["idpersonal"]."</option>";
            }else{
                $options=$options."<option value='".trim($laRow["idTpersonal"])."'>".$laRow["nombreunoper"]." ".$laRow["apellidounoper"]." - ".$laRow["nacionalidadper"].$laRow["idpersonal"]."</option>";
            }
        }
        return $options;
    }   
	
    function fnCombosResponsablesEnte($selected)
    {

    		$this->conectar();
            $sql="SELECT * FROM tresponsableente WHERE Estatus='1'";
            $pcsql=$this->filtro($sql);
    		while($laRow=$this->proximo($pcsql))
    		{
            if( (isset($selected)) && ($selected == trim($laRow["idTresponsableente"])) ){
                $options=$options."<option value='".trim($laRow["idTresponsableente"])."' selected>".$laRow["nombrefull"]." ".$laRow["apellidofull"]." * ".$laRow["nacionalidadper"].$laRow["cedula"]." * ".$laRow["telefonoper"]."</option>";
            }else{
                $options=$options."<option value='".trim($laRow["idTresponsableente"])."'>".$laRow["nombrefull"]." ".$laRow["apellidofull"]." * ".$laRow["nacionalidadper"].$laRow["cedula"]." * ".$laRow["telefonoper"]."</option>";
            }
        }
        return $options;
    }   

    function fnComboDependiente($tabla, $value, $text, $selected, $prefijo, $idforaneo,$estatusField)
    {

        $this->conectar();
        $sql="SELECT * FROM $tabla WHERE $estatusField=1";
        $pcsql=$this->filtro($sql);
        while($laRow=$this->proximo($pcsql))
        {   
                if( (isset($selected)) && ($selected == trim($laRow[$value])) ){
                    $options=$options."<option value='".trim($laRow[$value])."' id='".$prefijo.trim($laRow[$value])."' class='".$prefijo.trim($laRow[$idforaneo])."' selected>".$laRow[$text]."</option>";
                }else{
                    $options=$options."<option value='".trim($laRow[$value])."' id='".$prefijo.trim($laRow[$value])."' class='".$prefijo.trim($laRow[$idforaneo])."'>".$laRow[$text]."</option>";
                }
        }
        return $options;
    }   

    //REPORTES

    function fFechaVaciaHasta($fechaHasta,$fechaRestituido)
    {
        if ($fechaHasta=="")
        {    
            $subFinal="No definido";
            if ($fechaRestituido!="")
            {
                $subFinal=$fechaRestituido;
            }
        }
        else
        {
            $subFinal=$fechaHasta;
        }

        return $subFinal;
    }

    




	


}//cierre clase

?>