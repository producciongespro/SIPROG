"use strict";

/*
constantes de etiquetas
*/

const nameSistem = "<img src='../../assets/ico/logo.png'>"; // etiqueta de títiulo para alert de alerftify

$(document).ready(function () {
    $(document).on('click', '#spnCambioClave', function(){
    //   var usuario_id = $(this).attr("id");  
    //   var usuario = $(this).attr("usuario");
    //   usuarioTemp = usuario;
    //   usuarioIdTemp = usuario_id;
      console.log("Cambiar clave"); 
      $('#dataModal').modal('show'); 
    });
    $("#btn-actualizar").click(function (e) { 
      e.preventDefault();
    //   editarUsuario(usuarioTemp,usuarioIdTemp,"usuarios");
      $('#dataModal').modal('hide');
    });
    $("#btnEnviarClave").click(function (e) { 
        e.preventDefault();
        enviarClaves();
      });
    $("#btn_cambiar").click(function (e) { 
        e.preventDefault();
        cambiarClave();
    });
  });

  function mostrarPassword3(){
    var cambio3 = document.getElementById("password3");
    if(cambio3.type == "password"){
        cambio3.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio3.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 

function mostrarPassword(){
    var cambio = document.getElementById("password");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 

function mostrarPassword2(){
        var cambio2 = document.getElementById("password2");
    if(cambio2.type == "password"){
        cambio2.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio2.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}

  function cambiarClave() {  
    $("#password").val("");
    $("#password2").val("");
    var usuarioActual =  sessionStorage.getItem("usuarioActual");
    usuarioActual = JSON.parse(usuarioActual);
    console.log("Usuario: "+usuarioActual.correo);
    console.log("Id: "+usuarioActual.id);
    var formData = {usuario: usuarioActual.correo, idUsuario: usuarioActual.id};
          $.ajax({
    url : "../../server/login/cambiar_clave2.php", // Url of backend (can be python, php, etc..)
    type: "POST", // data type (can be get, post, put, delete)
    data : formData, // data in json format
  	async : false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
    success: function(response, textStatus, jqXHR) {
        var json = $.parseJSON(response);
        if (!json.error){
            console.log(json);
            hacerCambio(json.url);
        }
    	
    },
    error: function (jqXHR, textStatus, errorThrown) {
		console.log(jqXHR);
      	console.log(textStatus);
      	console.log(errorThrown);
    }
});
}

function enviarClaves() {
    var usuarioActual =  sessionStorage.getItem("usuarioActual");
    usuarioActual = JSON.parse(usuarioActual);  
    var formData = {usuario: usuarioActual.correo, idUsuario: usuarioActual.id, password: $("#password").val(), password2: $("#password2").val()};
          $.ajax({
    url : "../../server/login/guardar_clave2.php", // Url of backend (can be python, php, etc..)
    type: "POST", // data type (can be get, post, put, delete)
    data : formData, // data in json format
  	async : false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
    success: function(response, textStatus, jqXHR) {
        var json = $.parseJSON(response);
        if (!json.error){              
            $("#mensajeError").text(json.msj);
            $("#alerta").show();
          //  console.log("Enviando...");
          setTimeout(function() {
            $("#cambioModal").modal('hide');
            //console.log(json.msj);
            }, 3000);
 
        }
        else{
            $("#mensajeError").text(json.msj);
             $("#alerta").show();
          //  console.log(json.msj);
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
		console.log(jqXHR);
      	console.log(textStatus);
      	console.log(errorThrown);
    }
});

}

function hacerCambio(url) { 
    $("#alerta").hide();
    $("#cambioModal").modal('show');
}

function prepareMod() {
    eGoHome();
    getUser();
    ShowVersion();
}

function getUser() {
    //Obtiene el usuario desde la session PHP
    //console.log(user);
    var usuarioActual =  sessionStorage.getItem("usuarioActual");
    usuarioActual = JSON.parse(usuarioActual);


    $("#spnTipoUsuario").text("Tipo: " +   usuarioActual.tipo  + " - Área: " +    usuarioActual.area  );
    $("#spnNombre").text(  usuarioActual.nombre  + " " +  usuarioActual.apellido1  + " " + usuarioActual.apellido2 );
}


function eGoHome() {
    $("#spnHome").click(function (e) {
        e.preventDefault();
        window.location.assign("../menu/menu.php");
    });
}


function ShowVersion() {
      $(".spnVersion").html(nameSistem);
}


