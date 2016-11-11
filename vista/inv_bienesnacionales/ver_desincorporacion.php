<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
         
        $laServicios=$lobjRol->consultar_servicios_menu($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='persona/consultar_docente')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='persona/registrar_docente')
            {
                $registrar=true;
            }
            if($laServicios[$j][2]=='persona/eliminar_docente')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=inv_bienesnacionales/consultar_desincorporacion&id="+id;
 }
  function eliminar(id)
  {
      document.getElementById("cam_iddocente").value=id;
  }

  function descativar()
  {
    if (document.getElementById("txtMotivoAnulacion").value!="0")
    {
      if(confirm("¿Esta seguro que desea desactivar la desincorporación seleccionada?"))
      {
        var moviobjeto=document.getElementById("txtMoviObjeto").value;
        document.getElementById("txtAccion").value="desactivaDesincorporacion";
        document.getElementById("txtExito").value="0";

        var $forme = $("#form_recepcion");

        $.ajax({
            url: '../controlador/cConsultasAjaxBN.php',
            dataType: 'json',
            type: 'post',
            data: $forme.serialize(),
            success: function(data)
            {
                var Confi=data['Master'];
                if(Confi.lsExito==1)
                {
                    Notifica_Logro("Desincorporación desactivada con éxito.");                         
                }
                else    
                {
                    Notifica_Error("No se puede desactivar esta desincorporación, inténtelo mas tarde.");
                }
                
            }
    });

      }
    }
    else
    {
      Notifica_Error("Debe Seleccionar un motivo válido antes de continuar.");
    }
    
  }

  function restaurar(id)
  {
     if(confirm("¿Esta seguro que desea restaurar el docente seleccionado?"))
    {
      document.getElementById("cam_iddocente").value=id;
      document.getElementById("cam_operacion").value='restaurar_docente';
      document.form_docente.submit();
    }
  }

  function CompruebaBN(moviobjeto,elementoBoton)
  {

    document.getElementById("txtMoviObjeto").value=moviobjeto;
    document.getElementById("txtAccion").value="consulTrazabilidad";
    document.getElementById("txtExito").value="0";

    var $forme = $("#form_recepcion");

    $.ajax({
        url: '../controlador/cConsultasAjaxBN.php',
        dataType: 'json',
        type: 'post',
        data: $forme.serialize(),
        success: function(data)
        {
            var Confi=data['Master'];
            if(Confi.lsExito==1)
            {
                $('#ModalDeleteElem').modal('show');                         
            }
            else    
            {
                Notifica_Error("No se puede desactivar esta recepción porque ya tienen movimientos en sus registros.");
                $(elementoBoton).attr('disabled','disabled');
            }
            
        }
    });

  }
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        oTable = $('#filtro').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayLength": 5                    
        });
    } );
</script>  
<div style="float: left" class="col-lg-10 span10 pull-left">
    <h3> Desincorporación de bienes nacionales</h3>
    <div class="alert alert-info">
        <ul>
           En este módulo podrá desincorporar los bienes nacionales.
        </ul>
    </div>
    <form action="../controlador/cConsultasAjaxBN.php" method="POST" id="form_recepcion" name="form_recepcion">
        <input type="hidden" value="Desincorporaciones" name="txtSegmento" id="txtSegmento"/>
        <input type="hidden" value="Listar" name="txtAccion" id="txtAccion"/>
        <input type="hidden" value="0" name="txtExito" id="txtExito"/>
        <input type="hidden"  name="txtMoviObjeto" id="txtMoviObjeto"/>
        <?php
        if($registrar)
        {
            echo ('
              
                <a class="btn btn-danger" id="btn_registrar" href="?vista=inv_bienesnacionales/desincorporar_articulobn"><i class="icon-minus icon-white"></i> Registrar</a>
               
              ');
        }


        ?>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>N° Desin.</th><th>Fecha Desin.</th><th>Fecha de registro</th><th>Responsable Desin.</th><th>Usuario</th><th>Motivo</th><th>Observación</th><th>Acción</th>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/update2016/clase_desincorporacionbn.php');
                    $loDesincorporaciones=new clsDesincorporacion;
                    $laArticulosBN=$loDesincorporaciones->listarDesincorpacion();
                   
                    for($i=0;$i<count($laArticulosBN);$i++)
                    {
                        if($laArticulosBN[$i][29]=="1")
                        {
                            $laArticulosBN[$i][29]='Activo';
                        }
                        else 
                        {
                            $laArticulosBN[$i][29]='Inactivo';
                        }
                        echo '<tr>';
                        echo '<td>'.$laArticulosBN[$i][1].'</td>';
                        echo '<td>'.$laArticulosBN[$i][25].'</td>';
                        echo '<td>'.$laArticulosBN[$i][26].'<br>'.$laArticulosBN[$i][3].'</td>';
                        echo '<td>'.$laArticulosBN[$i][27].'</td>';
                        echo '<td>'.$laArticulosBN[$i][28].'</td>';
                        echo '<td>'.$laArticulosBN[$i][20].'</td>';
                        echo '<td>'.$laArticulosBN[$i][11].'</td>';
                       if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar && $laArticulosBN[$i][29]=='Activo')
                            {
                                echo '<a class="btn btn-info" href="#" title="Consultar" onclick="buscar(\''.$laArticulosBN[$i][0].'\')"><i class="icon-search icon-white"></i></a> ';
                            }
                            if($eliminar)
                            {
                                if($laArticulosBN[$i][29]=='Activo')
                                {
                                    echo '<a class="btn btn-danger" href="#" title="Desactivar"  onclick="CompruebaBN(\''.$laArticulosBN[$i][0].'\',this)" ><i class="icon-remove icon-white"></i></a> ';
                                
                                        //  eliminar('.$laArticulosBN[$i][0].')
                                
                                }
                                elseif($laArticulosBN[$i][29]=='Inactivo')
                                {
                                    echo '<a class="btn btn-warning" title="Restaurar" href="#" onclick="" ><i class="icon-refresh icon-white"></i></a>';
                                
                                        //  restaurar('.$laArticulosBN[$i][0].')
                                
                                }
                            }
                            echo "</td>";
                        }
                        
                       
                        echo '</tr>';
                    }
                ?>
                </tbody>
         </table>
         <div class="modal fade" id="ModalDeleteElem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Desactivar Desincorporación</h4>
              </div>
              <div class="modal-body">
                   <div class="row">
                        <div class="col-lg-3 span3">
                            <label>Motivo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Razón por la cual desea desactivar al docente."><i class="fa fa-question" ></i></span></label>
                            <select name="txtMotivoAnulacion" class="form-control" onchange="SeleccionaItem(this.value);" id="txtMotivoAnulacion" value="">
                            <option value="0">SELECCIONE UN MOTIVO</option>
                            <?php

                            echo $loFuncGenerales->fnComboMotivosGeneral($selectMotivo,"2");

                            ?>                                    
                            </select>
                            
                        </div>
                   </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="descativar()">Desactivar</button>
              </div>
            </div>
          </div>
      </div>
    </form>
    
</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      })
</script>