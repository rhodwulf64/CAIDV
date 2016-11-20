
<<<<<<< HEAD
confirmacionModal=false;



function DecideOpciones(texto)
{
	resulta=false;
     resulta=swal({   title: "Desactivar solicitud",   
    text: texto,   
    type: "warning",   showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "¡Si, estoy seguro!",   
    cancelButtonText: "Cancelar",
    closeOnConfirm: false }, 
	function(isConfirm){
	if (isConfirm) 
	{
		 confirmacionModal=true;
	} 
	});
}


function Mensaje(e){
    swal(e);
}

function Notificalo(texto,tipo)
{
        notif({
		type: tipo,
		msg: texto,
		position: "center",
		width: 800,
		height: 60,
		opacity: 0.9
		});
}

function Notifica_Error(texto)
{
        notif({
		msg: texto,
		position: "center",
		width: 800,
		height: 60,
		bgcolor: "#BD362F",
  		color: "#FFFFFF",
		opacity: 0.9,
		time: 5000
		});
}

function Notifica_Alerta(texto)
{
        notif({
		msg: texto,
		position: "center",
		width: 800,
		height: 60,
		bgcolor: "#F2B600",
  		color: "#FFFFFF",
		opacity: 0.9,
		time: 5000
		});
}

function Notifica_Logro(texto)
{
        notif({
		msg: texto,
		position: "center",
		width: 800,
		height: 60,
		bgcolor: "#299042",
  		color: "#FFFFFF",
		opacity: 0.9,
		time: 5000
		});
}


function tplural(nume,singu,plu)
{
    var resulta='';
    if (nume=='1')
    {
        resulta=singu;
    }
    else
    {
        resulta=plu;
    }
    return resulta;
}
=======
>>>>>>> caidv2
