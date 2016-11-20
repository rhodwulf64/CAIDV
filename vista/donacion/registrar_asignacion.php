<?php
    require_once("../clases/clase_asignacion2.php");
    $lobjModulo=new clsAsignacion;
    $id=(isset($_GET['id']))?$_GET['id']:"";
    $lobjModulo->idAsignacion=$id;
    //$Modulos=$lobjModulo->consultar_asignacion();
?>
<style>
    body, input, textarea{
        text-transform: uppercase;
    }
</style>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Registrar Asignaciones</h3>
     <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá registrar las asignaciones del sistema.</li>
           <!--<li>Sí necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>-->
        </ul>
    </div>
    <form class="formulario" style='width:100%;' action="../controlador/control_asignacion2.php" method="POST" name="form_modulo">
        <input type="hidden" value="registrar_asignacion" name="operacion" />
        <input type="hidden"  name="idAsignacion" id="cam_idAsignacion"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Persona <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Seleccione la persona que donara."><i class="fa fa-question" ></i></span></label>
                <select name='idPersona' id='idPersona' forzar='obligatorio' required/>
                    <option value=''>Seleccione una Persona</option>
                    <?php
                        $filas = $lobjModulo->consultar_persona();
                        foreach($filas as $fila){
                            echo "<option value='".$fila["idAsignado"]."'>".$fila["nacionalidad"].$fila["idAsignado"]." ".$fila['nombre']."</option>";
                        }
                    ?>
                </select>   
            </div>

            <div class="col-lg-6 span6">
                <label>Motivo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Seleccione la empresa que representa la persona."><i class="fa fa-question" ></i></span></label>
                <select name='idMotivo' id='idMotivo' forzar='obligatorio' required/>
                    <?php
                        $filas = $lobjModulo->consultar_motivo();
                        foreach($filas as $fila){
                            echo "<option value='".$fila["id_motivo_mov"]."'>".$fila["des_motivo_mov"]."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-12 span12">
                <label>observacion <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Ingrese una observacion"><i class="fa fa-question" ></i></span></label>
                <textarea name='observacion' id='observacion' class='span12' style='resize:none;' rows='5'></textarea>   
            </div>
        </div>
        <div class="row-fluid">
            <table class='table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable'>
                <thead>
                    <th>Articulo</th><th>Cantidad</th><th>agregar</th>
                </thead>
                <tbody id='tbody_contenido'>
                    <tr>
                        <td>
                            
                            <select id='articulo' required/>
                                <option value=''>SELECCIONE UNA OPCION</option>
                                <?php
                                    $filas = $lobjModulo->consultar_articulo();
                                    foreach($filas as $fila){
                                        echo "<option value='".$fila["idArticulo"]."'>".$fila["nombre"]."</option>";
                                    }
                                ?>
                            </select>
                            
                        </td>
                        <script>
                            var maximo='';
                            $('#articulo').change(function(){
                                var articulo = document.getElementById("articulo").value;
                                $.post('../controlador/control_asignacion2.php',{operacion:"ajax",idArticulo:articulo},function(data){
                                    var val = $.parseJSON(data);
                                    console.log(val);
                                    $("#cantidad").val(val[0].cantidad);
                                    maximo=val[0].cantidad;
                                });
                            });
                            function validarmax(){
                                if($("#cantidad").val() > Number(maximo)){
                                    Notifica_Error('HA SOBREPASADO LA CANTIDAD DEL ARTICULO');
                                    $("#cantidad").val('');
                                }
                            }
                        </script>
                        <td>
                            
                            <input type='text' id='cantidad' value='' onblur='validarmax();'>
                            
                        </td>
                        <td>
                            
                            <button class='btn btn-default' type='button' id='agregar'>+</button>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="botonera">
            <input type="button" onclick='validar();' class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Aceptar">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=donacion/asignacion';">
        </div>
    </form>
</div>
<?php
            for($i=0;$i<count($Modulos);$i++)
            {
                ?>
                    <input type="hidden" value="<?php print($Modulos[$i][1]);?>" name="nombres[]" />
                <?php
            }
?>
<script type="text/javascript">
function validar(){
    if(document.getElementById("idPersona").value==""){
        Notifica_Error("No ha seleccionado la persona");
        return false;
    }
    var arr = document.getElementsByName("idArticulo[]");
    if(arr.length==0){
        Notifica_Error("No ha asignado ningun articulo");
        return false;
    }
    document.form_modulo.submit();
}
document.getElementById("agregar").onclick = function()
{
    var articulo = document.getElementById("articulo");
    var articulo_value = document.getElementById("articulo").value;
    var articulo_option = articulo.options[articulo.selectedIndex].text;
    var cantidad_value = document.getElementById("cantidad").value
    var idTabla = "tbody_contenido";
    var campos = {
        //ETIQUETAS     
        tag : ["input","input","input"],
        //NOMBRES DE LAS ETIQUETAS
        name : ["","idArticulo[]","cantidad[]"],
        //ID DE LAS ETIQUETAS (FINALIZAR CON - PARA HACER NUMERACION)
        id : ["articulo-","idArticulo-","cantidad-"],
        //TIPOS DE LA ETIQUETAS (DEJAS VACIO PARA SELECT)
        type : ["text","hidden","text"],
        //VALORES PARA LAS ETIQUETAS
        value : [articulo_option,articulo_value,cantidad_value],
        //CLASES PARA LAS ETIQUETAS
        clases: ["form-control","form-control","form-control"],
        //VALIDACIONES DE LA LIBRERIA PARA LAS ETIQUETAS
        /*libAA: ["",["forzar","obligatorio","numeros"],"",""],*/
        //ATRIBUTOS PARA LAS ETIQUETAS
        attributes: [["readonly","true"],"",["readonly","true"]]
    };
    var boton_eliminar={
        clases: "btn btn-default",
        texto: "-"
    }
    if(articulo_value!=0 && cantidad_value!="0" && cantidad_value!=""){
        var arr=document.getElementsByName("idArticulo[]");
        if(arr.length>0){
            for(var i=0;i<arr.length;i++){
                if(arr[i].value == articulo_value){
                    Notifica_Error("Ya ha ingresado este articulo");
                    return false;
                }
            }
        }
        muchos(idTabla,campos,boton_eliminar);
    }else{
        Notifica_Error("Debe seleccionar un articulo y agregar una cantidad");

    }
};

</script>