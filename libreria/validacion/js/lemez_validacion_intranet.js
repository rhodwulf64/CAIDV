//Plugin Creado Por Leonardo J Melendez S. (lemez) 2013.
//Validación lemez version 1.1
//Nota: Es importante validar del lado servidor.
	jQuery.fn.lemez_aceptar = function (a,z) {

	  $(this).attr("autocomplete","off");var c=true;var d=false;var e="#CC0000";var f=$(this).css("border-top-color");var f2=$(this).css("border-bottom-color");var f3=$(this).css("border-left-color");var f4=$(this).css("border-right-color");var g=$(this);switch(a){case"texto":var h=/^[a-zA-Z \u00C0-\u00ff\s]+$/;var i="Solo se acepta letras";break;case"texto_numero":var h=/^[a-zA-Z0-9 \u00C0-\u00ff\s]+$/;var i="Solo se acepta Letras y Numeros";break;case"texto_especial":var h=/^[a-zA-Z., \u00C0-\u00ff\s]+$/;var i="Solo se acepta Letras comas y puntos";break;case"numero":var h=/^[\d]+$/;var i="Solo se aceptan Numeros";break;case"numero_especial":var h=/^[\d.,]+$/;var i="Solo se aceptan Numeros";break;case"correo":var h=/([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}/;var d=true;var i="Debe introducir un correo electronico valido Ej: leonardo@pagina.com";break;case"todo":var h=/[^\s]/;var d=true;var i="No deje espacios en blanco";break;case"url":var h=/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/;var d=true;var i="Debe introducir una URL valida Ej: http://leonardo.com";break;case"telefono":var h=/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/;var d=true;var i="Debe introducir un telefono valido Ej: 0255-1111222";break;case"ip":var h=/\b(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/;var d=true;var i="Debe introducir una ip valida Ej: 192.168.1.1";break;case"fecha":var h=/^(?:(?:0?[1-9]|1\d|2[0-8])(\/|-)(?:0?[1-9]|1[0-2]))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(?:(?:31(\/|-)(?:0?[13578]|1[02]))|(?:(?:29|30)(\/|-)(?:0?[1,3-9]|1[0-2])))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(29(\/|-)0?2)(\/|-)(?:(?:0[48]00|[13579][26]00|[2468][048]00)|(?:\d\d)?(?:0[48]|[2468][048]|[13579][26]))$/;var d=true;var i="Debe introducir una fecha valida Ej: 29/02/1988";break;case"contraseña":var h=/^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9!@#\$%\^&\*\?_~\.\/]{8,20}$/;var d=true;var i="La clave debe contener de 8 a 20 caracteres y no se aceptan comillas simples \' o comillas dobles \".";break;default:{var h=a;var d=true;var i="Existe un error de Validacion, Por Favor Verifique sus campos."}}

posicion=g.position();var j=document.createElement("div");j.id="div_msj"+g.attr("id");var k=g.height()+7;$(j).css({border:"2px solid #FFF",background:"#299042",color:"#FFF",position:"absolute","border-radius":"3px",top:posicion.top+k+130,left:posicion.left+350});
	    j.innerHTML=i;$("body").append(j);$(j).hide();$(this).keypress(function(a){if(d==false){c=h.test(String.fromCharCode(a.which));if(a.which==8||a.which==0)c=true;return c}});

$(this).keyup(function(){j.innerHTML=i;if(d==false){if(c==false){$("#div_msj"+g.attr("id")).show().delay(3e3).fadeOut(2e3)}else{$("#div_msj"+g.attr("id")).hide()}}});
$(this).blur(function(){if(z!=""&&g.val()){if(h.test(g.val())==false){$(g).css("border-color",e);swal(i,"","error");return false}else{$(g).css("border-color",f);$("#div_msj"+g.attr("id")).hide();return true}}});
		//if(!z) {z="form"; b="no"};
	    $("button").click(function () {

			recolorear();
if($(this).attr("id")&&z){boton_clic=$(this).attr("id");todo_id_boton=z;id_boton=todo_id_boton.split(",");for(ii=0;ii<id_boton.length;ii++){if(boton_clic!=id_boton[ii]){b="no"}else{b="si";ii=10000}}}else{b="no"}
	       if(b=="si"&&g.val()==""){j.innerHTML="Campo obligatorio";$("#div_msj"+g.attr("id")).show().delay(3e3).fadeOut(2e3)}else{$("#div_msj"+g.attr("id")).hide()}if(b=="si"||b=="no"&&g.val()!=""){if(h.test(g.val())==false){$(g).css("border-color",e);return false}else{recolorear();return true}}})
function recolorear(){$(g).css("border-top-color",f);$(g).css("border-bottom-color",f2);$(g).css("border-left-color",f3);$(g).css("border-right-color",f4)}
	}
