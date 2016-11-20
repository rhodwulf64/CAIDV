<?php
include_once("clsDatos.php");
class  cls_historial extends  clsDatos{
		private $aa_Form;
		private $as_Cadena;

		public function __construct(){
			$this->aa_Form=Array();
			$this->as_Cadena="";
		}

		public function historial_empresa($cod_emp)
		{

			$lsSql="SELECT a.fecha_act_inicio, a.fecha_act_fin, a.hora_act_inicio, a.hora_act_fin, a.lugar, a.Estatus, e.Nombre AS empresa, pe.primer_nombre AS NE, pe.primer_apellido AS AE, act.nombreact AS actividad, p.nombreunoper AS NP, p.apellidounoper AS AP
					FROM tagenda AS a
					INNER JOIN am_tempresa AS e ON ( a.id_empresa = e.idEmpresa )
					INNER JOIN am_tpersona AS pe ON ( a.id_personaempresa = pe.idPersona )
					INNER JOIN tactividad AS act ON ( a.idFcodigo_actividad = act.codigoActividad )
					INNER JOIN tpersonal AS p ON ( a.id_personacaidv = p.idpersonal )
					WHERE a.id_empresa = '$cod_emp'";

			$laMatriz=array();
			$this->fpConectar();
			$lrTb=$this->frFiltro($lsSql);
			$liI=0;
			while($laArreglo=$this->faProximo($lrTb))
			{
				$laMatriz[$liI][0]=$laArreglo["empresa"];
				$laMatriz[$liI][1]=$laArreglo["NE"].' '.$laArreglo["AE"];
				$laMatriz[$liI][2]=$laArreglo["NP"].' '.$laArreglo["AP"];
				$laMatriz[$liI][3]=$laArreglo["actividad"];
				$laMatriz[$liI][4]=$laArreglo["fecha_act_inicio"];
				$laMatriz[$liI][5]=$laArreglo["fecha_act_fin"];
				$laMatriz[$liI][6]=$laArreglo["hora_act_inicio"];
				$laMatriz[$liI][7]=$laArreglo["hora_act_fin"];
				$laMatriz[$liI][8]=$laArreglo["lugar"];
				$laMatriz[$liI][9]=$laArreglo["Estatus"];
				
				$liI++;
			}
			$this->fpCierraFiltro($lrTb);
			$this->fpDesconectar();
			
			return $laMatriz;
		}

		public function listar_actividades_estatus($estatus,$fecha_ini,$fecha_fin)
		{

			$lsSql="SELECT a.fecha_act_inicio, a.fecha_act_fin, a.hora_act_inicio, a.hora_act_fin, a.lugar, a.Estatus, e.Nombre AS empresa, pe.primer_nombre AS NE, pe.primer_apellido AS AE, act.nombreact AS actividad, p.nombreunoper AS NP, p.apellidounoper AS AP
					FROM tagenda AS a
					INNER JOIN am_tempresa AS e ON ( a.id_empresa = e.idEmpresa )
					INNER JOIN am_tpersona AS pe ON ( a.id_personaempresa = pe.idPersona )
					INNER JOIN tactividad AS act ON ( a.idFcodigo_actividad = act.codigoActividad )
					INNER JOIN tpersonal AS p ON ( a.id_personacaidv = p.idpersonal )
					WHERE a.Estatus = '$estatus' AND a.fecha_act_inicio BETWEEN  '$fecha_ini'  AND '$fecha_fin' ";

			$laMatriz=array();
			$this->fpConectar();
			$lrTb=$this->frFiltro($lsSql);
			$liI=0;
			while($laArreglo=$this->faProximo($lrTb))
			{
				$laMatriz[$liI][0]=$laArreglo["empresa"];
				$laMatriz[$liI][1]=$laArreglo["NE"].' '.$laArreglo["AE"];
				$laMatriz[$liI][2]=$laArreglo["NP"].' '.$laArreglo["AP"];
				$laMatriz[$liI][3]=$laArreglo["actividad"];
				$laMatriz[$liI][4]=$laArreglo["fecha_act_inicio"];
				$laMatriz[$liI][5]=$laArreglo["fecha_act_fin"];
				$laMatriz[$liI][6]=$laArreglo["hora_act_inicio"];
				$laMatriz[$liI][7]=$laArreglo["hora_act_fin"];
				$laMatriz[$liI][8]=$laArreglo["lugar"];
				$laMatriz[$liI][9]=$laArreglo["Estatus"];
				
				$liI++;
			}
			$this->fpCierraFiltro($lrTb);
			$this->fpDesconectar();
			
			return $laMatriz;
		}


	/**********************************************************************************************************************/
}