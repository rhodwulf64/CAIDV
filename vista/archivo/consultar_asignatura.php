<?php
include('../clases/clase_asignatura.php');
$lobjAsignatura = NEW clsAsignatura();
$id=(isset($_GET['id']))?$_GET['id']:"";
$lobjAsignatura->set_Asignatura($id);
$Datos_Asignatura = $lobjAsignatura->consultar_asignatura_bitacora();

if($Datos_Asignatura)
{
    $operacion='editar_asignatura';
    $titulo   ='Consultar asignatura';
}
else
{
    $operacion='registrar_asignatura';
    $titulo   ='Registrar asignatura';
}
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3><?php print($titulo); ?></h3>
    <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá consultar y editar la asignatura con las unidades y los objetivos que serán inscrito en el curso.
            Sí necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.
        </ul>
    </div>
    <form class="formulario" action="../controlador/control_asignatura.php" method="POST" name="form_asignatura">
        <input type="hidden" value="<?php print($operacion);?>" name="operacion" />
        <input type="hidden" value="<?php print($Datos_Asignatura['idasignatura']);?>" name="idasignatura" />
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre de la asignatura."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12"  name="nombreaasi" id="cam_nombreaasi" value="<?php print($Datos_Asignatura['nombreasi']);?>" required/>
            </div>
            <div class="col-lg-6 span6">
                <label>Área de conocimiento <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Area de conocimiento de la asignatura a registrar"><i class="fa fa-question" ></i></span></label>
                <select class="span12" name="tarea_idarea_conocimiento" id="cam_tarea_idarea_conocimiento" required>
                    <option value="">-</option>
                    <?php 
                        include('../clases/clase_areaconocimiento.php');
                        $objArea = new clsAreaconocimiento();
                        $listado_area = $objArea->consultar_areas();
                        for($i=0;$i<count($listado_area);$i++)
                        {
                            ?><option  <?php if($listado_area[$i][0]==$Datos_Asignatura['tarea_idarea_conocimiento']){print('SELECTED');}?> value="<?php print($listado_area[$i][0])?>"><?php print($listado_area[$i][1])?></option>
                        <?php }?>
                </select>
            </div>
            
        </div>
         <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Horas Teóricas  <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Horas teoricas de clases"><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12"  name="horasteoricas" id="cam_horasteoricas" value="<?php print($Datos_Asignatura['horasteoricas']);?>" required/>
            </div>
            <div class="col-lg-6 span6">
                <label>Horas Prácticas <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Horas prácticas de clases"><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12"  name="horaspracticas" id="cam_horaspracticas" value="<?php print($Datos_Asignatura['horaspracticas']);?>" required/>
            </div>
        </div>
        <div class="row-fluid">
            <h4>Unidades y objetivos</h4>
            <div id="rootwizard">
                <div class="navbar">
                  <div class="navbar-inner">
                    <div class="container">
                        <ul>
                            <li><a href="#tab1" data-toggle="tab">UNIDADES</a></li>
                            <li><a href="#tab2" data-toggle="tab">OBJETIVOS</a></li>
                        </ul>
                    </div>
                  </div>
                </div>
                <!--<div id="bar" class="progress progress-success progress-striped active">
                  <div class="bar"></div>
                </div>-->
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable">
                            <thead>
                                <th class="span8">Unidad</th>
                                <th class="span2">Objetivo</th>
                                <th class="span2"><button class="btn btn-success" type="button" onclick="agregar()" title="agregar unidad"><i class="fa fa-plus"></i></button></th>
                            </thead>
                            <tbody id="tabla_unidades" >
                                <?php
                                $datos_unidades=$lobjAsignatura->consultar_unidades();
                                for($i=0;$i<count($datos_unidades);$i++)
                                    {
                                        echo '
                                        <tr>
                                            <td><input type="hidden" name="idunidad[]" value="'.$datos_unidades[$i]['idunidad'].'"/><input type="text" class="span12" name="unidad[]" id="cam_unidad'.$i.'" title="nombre de la unidad" value="'.$datos_unidades[$i]['nombreuni'].'" onkeypress="return SoloAlfaNumerico(event);" required/></td>
                                            <td style="text-align:center"><input type="text" class="span12" name="objetivos_unidad[]" onkeypress="return SoloNumeros(event);" id="cam_objetivos'.$i.'" value="'.$datos_unidades[$i]['objetivos'].'" title="cantidad de objetivos de la unidad" required/></td>
                                            <td style="text-align:center"><button class="btn btn-danger" type="button" onclick="quitar(this,'.$i.')" id="quitar_unidad'.$i.'" title="quitar unidad"><i class="fa fa-times"></i></button></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        <input type="hidden" id="cam_contador_unidades" value="<?php echo count($datos_unidades);?>" />
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php
                                for($i=0;$i<count($datos_unidades);$i++)
                                    {
                                        $datos_objetivos=$lobjAsignatura->consultar_objetivos($datos_unidades[$i]['idunidad']);
                                        echo '
                                        <div class="panel-heading" role="tab" id="heading'.$i.'">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'" title="'.$datos_unidades[$i]['nombreuni'].'">'.$datos_unidades[$i]['nombreuni'].'
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse'.$i.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$i.'">
                                            <div class="panel-body">
                                                <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="tabla_objetivos'.$i.'">
                                                    <thead>
                                                        <th class="span6">Objetivos</th>
                                                        <th class="span6">Contenido</th>
                                                        <th class="span2"><button class="btn btn-success" type="button" onclick="agregar_objetivo('.$i.')" title="agregar objetivo"><i class="fa fa-plus"></i></button></th>
                                                    </thead>
                                                    <tbody>
                                                    ';
                                                    for($j=0;$j<count($datos_objetivos);$j++)
                                                    {
                                                        echo '<tr>
                                                                <td>
                                                                    <input type="text" class="span12" name="objetivo[]" onkeypress="return SoloAlfaNumerico(event);" id="cam_objetivo_'.$i.'_'.$j.'" value="'.$datos_objetivos[$j]['nombreobj'].'" required/><input type="hidden" name="unidad_oculta[]" value="'.$i.'" id="cam_unidad_oculta_'.$i.'_'.$j.'"/>
                                                                </td>
                                                                <td style="text-align:center">
                                                                    <textarea class="span12" name="contenido[]" onkeypress="return SoloAlfaNumerico(event);" id="cam_contenido_'.$i.'_'.$j.'" required>'.$datos_objetivos[$j]['contenidoobj'].'
                                                                    </textarea>
                                                                </td>
                                                                <td style="text-align:center">
                                                                    <button class="btn btn-danger" type="button" onclick="quitar_objetivo_generado(this)" title="quitar objetivo"><i class="fa fa-times"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>';
                                                    }
                                                echo '</tbody>
                                                </table><input type="hidden" id="cam_contador_objetivos'.$i.'" value="'.count($datos_objetivos).'" />
                                            </div>
                                        </div>';
                                    }
                                ?>
                        </div>
                        <div class="botonera">
                            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" onclick="return validar();" value="Guardar">
                            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=archivo/asignatura';">
                        </div>
                    </div>
                    <ul class="pager wizard">                
                        <li class="salir" ><a href="#" class="btn btn-danger" onclick="window.location.href='?vista=archivo/asignatura';" id="btn_salir">Regresar</a></li>
                        <li class="previous"><a href="#" class="btn btn-danger"  style="display:none;" id="btn_atras" ><i class="fa-arrow-left fa"></i> Atrás</a></li>
                        <br>
                        <li class="next"><a href="#" id="btn_siguiente" class="btn btn-success">Siguiente <i class="fa-arrow-right fa"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
<audio src="../media/audio/fila_unidad_agregada.mp3" id="fila_unidad_agregada"></audio>
<audio src="../media/audio/fila_unidad_quitada.mp3" id="fila_unidad_quitada"></audio>
<script type="text/javascript">
$(function()
{
$("#cam_nombreaasi").lemez_aceptar("texto_numero","btn_enviar");
$("#cam_tarea_idarea_conocimiento").lemez_aceptar("numero","btn_enviar");
$("#cam_horasteoricas").lemez_aceptar("numero","btn_enviar");
$("#cam_horaspracticas").lemez_aceptar("numero","btn_enviar");
});
function validar()
{
    horas_teoricas = document.getElementById('cam_horasteoricas');
    horas_practicas = document.getElementById('cam_horaspracticas');
    if((horas_teoricas.value>=1) && (horas_practicas.value>=0))
    {
        return true;
    }
    if((horas_teoricas.value>=0) && (horas_practicas.value>=1))
    {
        return true;
    }
    else
    {
        Notifica_Error('Debe ingresar al menos una hora en teorica y/o practica.');
        return false;
    }
}

function agregar()    
   {    
      cam_contador_unidades=document.getElementById('cam_contador_unidades');
      var contador=cam_contador_unidades.value;
      contador++;
      var filas = document.getElementById("tabla_unidades");
      var nueva_fila =document.createElement("tr");
      var columna1 =document.createElement("td");
      var columna2 =document.createElement("td");
      var columna3 =document.createElement("td");
      columna2.setAttribute("style", "text-align:center");
      columna3.setAttribute("style", "text-align:center");

      columna1.innerHTML='<input type="text" class="span12" name="unidad[]" onkeypress="return SoloAlfaNumerico(event);" title="nombre de la unidad" id="cam_unidad'+contador+'" required/><input type="hidden" name="unidad_nueva[]" id="cam_unidad_nueva'+contador+'" value="'+contador+'"/>';
      columna2.innerHTML='<input type="text" class="span12" onkeypress="return SoloNumeros(event);" title="cantidad de objetivos de la unidad" name="objetivos_unidad[]" id="cam_objetivos'+contador+'" required/>';  
      columna3.innerHTML='<button class="btn btn-danger" id="quitar_unidad'+contador+'" type="button" onclick="quitar(this,'+contador+')" title="quitar unidad"><i class="fa fa-times"></i></button>';

      nueva_fila.appendChild(columna1);
      nueva_fila.appendChild(columna2);
      nueva_fila.appendChild(columna3);
      filas.appendChild(nueva_fila);

      cam_contador_unidades.value=contador;
      fila_unidad_agregada.play();
   }

    function quitar(e,i)
     {
        var filas = document.getElementById("tabla_unidades");          
        var td = e.parentNode;
        var tr = td.parentNode;
        filas.removeChild(tr);
        accordion=document.getElementById("accordion");
        heading=document.getElementById("heading"+i);
        collapse=document.getElementById("collapse"+i);
        if(collapse)
        {
            while(collapse.hasChildNodes())
                collapse.removeChild(collapse.firstChild);
        }
        if(heading)
            accordion.removeChild(heading);
        fila_unidad_quitada.play();
     }
function agregar_objetivo(i)    
   {    
      cam_contador_objetivos=document.getElementById('cam_contador_objetivos'+i);
      var contador=cam_contador_objetivos.value;
      contador++;
      var filas = document.getElementById("tabla_objetivos"+i);
      var nueva_fila =document.createElement("tr");
      var columna1 =document.createElement("td");
      var columna2 =document.createElement("td");
      var columna3 =document.createElement("td");
      columna2.setAttribute("style", "text-align:center");
      columna3.setAttribute("style", "text-align:center");

      columna1.innerHTML='<input type="text" class="span12" title="nombre del objetivo" name="objetivo[]" id="cam_objetivo_'+i+'_'+contador+'" required/>';
      columna2.innerHTML='<textarea class="span12" name="contenido[]" title="contenido del objetivo" id="cam_contenido_'+i+'_'+contador+'" required></textarea>';  
      columna3.innerHTML='<button class="btn btn-danger" type="button" onclick="quitar_objetivo(this,'+i+')" title="quitar objetivo"><i class="fa fa-times"></i></button>';

      nueva_fila.appendChild(columna1);
      nueva_fila.appendChild(columna2);
      nueva_fila.appendChild(columna3);
      filas.appendChild(nueva_fila);

      cam_contador_objetivos.value=contador
   }

    function quitar_objetivo_generado(e)
     {
        var td = e.parentNode;
        var tr = td.parentNode;
        var tbody = tr.parentNode;
        tbody.removeChild(tr);
     }

     function quitar_objetivo(e,i)
     {
        var filas = document.getElementById("tabla_objetivos"+i);          
        var td = e.parentNode;
        var tr = td.parentNode;
        filas.removeChild(tr);
     }


     function generar_unidades_objetivos()
     {

        accordion=document.getElementById("accordion");
        unidades=document.getElementsByName("unidad[]");       
        objetivos_unidad=document.getElementsByName("objetivos_unidad[]");
        unidad_nueva=document.getElementsByName("unidad_nueva[]");
        contador=parseFloat(unidades.length);
        contador=contador-unidad_nueva.length;
        accordion_nuevo=document.createElement('div');
        accordion_nuevo.setAttribute('id','accordion_nuevo');
        for(i=0; i<unidad_nueva.length;i++) 
        {
            panel=document.createElement('div');
            panel.setAttribute('class','panel panel-default');
            tbody=document.createElement('tbody');
            for(j=0;j<objetivos_unidad[i+contador].value;j++)
            {
                objetivo=document.createElement('tr');
                objetivo.innerHTML='<td><input type="text" class="span12" name="objetivo[]" onkeypress="return SoloAlfaNumerico(event);" id="cam_objetivo_'+(i+contador)+'_'+j+'" required/><input type="hidden" name="unidad_oculta[]" value="'+(i+contador)+'" id="cam_unidad_oculta_'+(i+contador)+'_'+j+'"/></td><td style="text-align:center"><textarea class="span12" name="contenido[]" onkeypress="return SoloAlfaNumerico(event);" id="cam_contenido_'+(i+contador)+'_'+j+'" required></textarea></td><td style="text-align:center"><button class="btn btn-danger" type="button" onclick="quitar_objetivo_generado(this)" title="quitar objetivo"><i class="fa fa-times"></i></button></td>';
                tbody.appendChild(objetivo);
            }
            panel.innerHTML='<div class="panel-heading" role="tab" id="heading'+(i+contador)+'"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse'+(i+contador)+'" aria-expanded="true" aria-controls="collapse'+(i+contador)+'" title="'+unidades[(i+contador)].value+'">'+unidades[(i+contador)].value+'</a></h4></div><div id="collapse'+(i+contador)+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+(i+contador)+'"><div class="panel-body"><table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="tabla_objetivos'+(i+contador)+'"><thead><th class="span6">Objetivos</th><th class="span6">Contenido</th><th class="span2"><button class="btn btn-success" type="button" onclick="agregar_objetivo('+(i+contador)+')" title="agregar objetivo"><i class="fa fa-plus"></i></button></th></thead>'+tbody.innerHTML+'</table><input type="hidden" id="cam_contador_objetivos'+(i+contador)+'" value="'+objetivos_unidad[(i+contador)].value+'" /></div></div>';
            accordion_nuevo.appendChild(panel);
            accordion.appendChild(accordion_nuevo);
        }

                            
     }
     function quitar_unidad_objetivos()
     {
        accordion_nuevo=document.getElementById("accordion_nuevo");
        accordion=document.getElementById("accordion");
        if(accordion_nuevo)
        {
            while(accordion_nuevo.hasChildNodes())
                accordion_nuevo.removeChild(accordion_nuevo.firstChild);
        }
        if(accordion_nuevo)
            accordion.removeChild(accordion_nuevo);

     }

$(document).ready(function() {
        $('#rootwizard').bootstrapWizard({onNext: function(tab, navigation, index) 
            {
                if(index==1) 
                {
                    generar_unidades_objetivos();
                    document.getElementById('btn_atras').style.display="inline";
                    document.getElementById('btn_salir').style.display="none";
                    document.getElementById('btn_siguiente').style.display="none";

                }
                
                // Set the name for the next tab
                
            },onPrevious:function(tab, navigation, index) 
            {
                if(index==0)
                {
                    quitar_unidad_objetivos();
                    document.getElementById('btn_atras').style.display="none";
                    document.getElementById('btn_salir').style.display="inline";
                    document.getElementById('btn_siguiente').style.display="inline";
                }
                if(index==1)
                {
                   quitar_unidad_objetivos();
                   document.getElementById('btn_salir').style.display="inline";
                   document.getElementById('btn_atras').style.display="none";
                   document.getElementById('btn_siguiente').style.display="inline";
                }
            },onTabClick: function(tab, navigation, index) {
                        Notifica_Error('Debe continuar mediante el botón de SIGUIENTE');
                        $('#btn_siguiente').focus();
                        return false;
            }, onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
            }});    
        window.prettyPrint && prettyPrint()
    });
    // single keys
        Mousetrap.bind('ctrl+shift+s', function(){ agregar();});
        Mousetrap.bind('ctrl+shift+z', function(){ agregar_objetivo();});
</script>