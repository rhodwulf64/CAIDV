<!DOCTYPE html>
<html>
<head>
	<title>Grafica De Bienes</title>
    <script type="text/javascript" src="javascript/chart.min.js"></script>
</head>
<body>
	<h3>Grafica de Bienes Nacionales</h3>
	<div class="formulario">
		<div></div>
		<canvas id="grafico"></canvas>
	</div>
    <script>
            $(document).ready(function(){
            	fpInicio(),
				mostrarResultados()
			});
			    function fpInicio()
			    {
			        var varRandom=Math.floor((Math.random() * 6) + 1);
			        $('#dp3').datepicker();
			        $('#dp4').datepicker();
					$("#txtCheckMovi"+varRandom).focus();
			    }
                function mostrarResultados(){
					var f=$('#txtFechaInicio').val();
					var ff=$('#txtFechaFin').val();
					$('.formulario div').html('');
                	$.getJSON("../controlador/update2017/control_graficabn.php",{o:1},function(json){
            			if(json[0]!=0){
                            var Datos = {
                                labels:[],
                                datasets : []
                            }
			                var seriesb = {
			                	backgroundColor: randomColor(),
			                    fill: true,
			                    data: []
			                }
			                var seriesdi = {
			                	backgroundColor: randomColor(),
			                    fill: true,
			                    data: []
			                }
			                var seriesac = {
			                	backgroundColor: randomColor(),
			                    fill: true,
			                    data: []
			                }
			                var seriesd = {
			                	backgroundColor: randomColor(),
			                    fill: true,
			                    data: []
			                }
			                var seriesp = {
			                	backgroundColor: randomColor(),
			                    fill: false,
			                    data: []
			                }
                            Datos.labels=json['nombre'];
                            seriesb.label="Total";
                            seriesb.data=json['datab'];
                            seriesdi.data=json['dataac'];
                            seriesdi.label="Disponible";
                            seriesac.data=json['dataa'];
                            seriesac.label="Asignado";
                            seriesd.data=json['datad'];
                            seriesd.label="Desincorporado";
                            seriesp.data=json['datap'];
                            seriesp.label="Prestado";
                            Datos.datasets.push(seriesb);
                            Datos.datasets.push(seriesdi);
                            Datos.datasets.push(seriesac);
                            Datos.datasets.push(seriesd);
                            Datos.datasets.push(seriesp);
                            var contexto = document.getElementById('grafico').getContext('2d');
                            window.Barra = Chart.Bar(contexto,{
                            	data:Datos,
					            options: {
					                responsive: true,
				                    tooltips: {
				                        mode: 'index',
				                        intersect: true
				                    }
					            }
                            });
            			}else{
            				$('.formulario div').html('<h3>No hay registros para mostrar</h3>');
            			}
                    });
                    return false;
                }
        var url_base64=document.getElementById("grafico").toDataURL("image/jpg");
        $(document).on("ready",function(){
        	$("#link2").attr("href",url_base64);
        });
        function randomColor(){
        	return 'rgb('+(Math.floor(Math.random()*256))+','+(Math.floor(Math.random()*256))+','+(Math.floor(Math.random()*256))+')';
    	}
    </script>
</body>
</html>