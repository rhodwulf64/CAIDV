<!DOCTYPE html>
<html>
<head>
	<title>Grafica De Bienes</title>
    <script type="text/javascript" src="javascript/chart.min.js"></script>
</head>
<body>
	<h3>Grafica de Consumibles</h3>
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
					$("#txtCheckMovi"+varRandom).focus();
			    }
                function mostrarResultados(){
					$('.formulario div').html('');
                	$.getJSON("../controlador/update2017/control_graficaco.php",{o:1},function(json){
                		if(json[0]!=0){
                            var Datos = {
                                labels:[],
                                datasets : []
                            }
			                var series = {
			                	backgroundColor: randomColor(),
			                    fill: true,
			                    data: []
			                }
                            Datos.labels=json['nombre'];
                            series.label="Disponibles";
                            series.data=json['data'];
                            Datos.datasets.push(series);
                            var contexto = document.getElementById('grafico').getContext('2d');
                            window.Barra = Chart.Bar(contexto,{
                            	data:Datos,
					            options: {
					                responsive: true,
				                    tooltips: {
				                        mode: 'index',
				                        intersect: true
				                    },
				                    scales: {
										xAxes: [{
											barPercentage: 0.2
										}]
									},
									elements: {
										rectangle: {
											borderSkipped: 'left',
										}
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