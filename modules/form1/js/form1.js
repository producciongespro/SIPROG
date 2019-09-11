"use strict";

var m = new Model (), v = new View ();
var equipo;

$(document).ready(function () {
    loadMod();
});

function loadMod() {
    prepareMod();
    handlerEvents();
    renderSelects();
    hideRowPublicacion();
    console.log("correo usuario actual: "  + m.getFieldArrayJson("usuarioActual", "correo" ));
}


function renderSelects() {
    v.selectOpt(m.stringToJson("categorias"), "nombre_categoria", "#selCategoria");
    v.selectOpt(m.stringToJson("estados"), "nombre_estado", "#selEstado");
    v.selectOpt(m.stringToJson("instancias"), "nombre_instancia", "#selInstancia");
    v.MemeberTeam(m.stringToJson("usuarios"), "#mdlBodyEquipo" );
    v.selectOpt(m.stringToJson("tipos"), "nombre_tipo", "#selTipo");
}




function handlerEvents() {
    //console.log("Eventos");

    $("#btnGuardarEquipo").click(function () {
        console.log("equipo...");
        equipo = m.checkedToJson("form-checkbox");
        console.log(equipo);
        equipo = JSON.stringify(equipo);
        console.log(equipo);
        $("#mdlEquipo").modal("hide");
    });
    //llamada al método que valida el formulario
    customValidation();
}
//Validaciónh del formulario mediante complemento de Bootstrap
function customValidation() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      // form.addEventListener('submit', function(event) {
          document.getElementById("btnSendForm").addEventListener('click', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        else {  //formulario válido
           sendFormDataAjax();
        }
        form.classList.add('was-validated'); //agrega la clase
      }, false);
    });
};

function sendFormDataAjax() {

    let observaciones =  $("#txtObservaciones").val();
    console.log(observaciones);
    if (observaciones == "") {
        //console.log("observaciones vacio");
        observaciones = "No aplica";
    }



   console.log("Send Form Ajax");
    var formData = new FormData ();
    formData.append("id_estado", $("#selEstado").val()  );
    formData.append("nombre", $("#txtNombreRecurso").val()  );
    formData.append("id_cat", $("#selCategoria").val()  );
    formData.append("id_tipo", $("#selTipo").val()  );
    formData.append("fecha_pub", $("#datPublicacion").val()  );
    formData.append("url", $("#txtUrl").val()  );
    formData.append("equipo", equipo  );
    formData.append("solicitante", $("#txtContacto").val()  );
    formData.append("id_instancia", $("#selInstancia").val()  );
    formData.append("audios", $("#numAudios").val()  );
    formData.append("videos", $("#numVideos").val()  );
    formData.append("documentos", $("#numDocs").val()  );
    formData.append("imagenes", $("#numImg").val()  );
    formData.append("correo_usuario",  m.getFieldArrayJson("usuarioActual", "correo" )  );
    formData.append("observaciones", observaciones  );

    m.conectDataAjax( "../../server/agregar_ingresos.php", formData, function () {
                    alertify
                    .alert( nameSistem, "Recurso Ingresado satisfactoriamente", function(){
                       console.log("ok");
                       // para que al resetear no valide y aparezcan los mensajes de error
                       document.getElementById("frmData1").classList.remove('was-validated');

                       //resetea los campos del formulario
                       document.getElementById("frmData1").reset();
                    });
     } );


}



function hideRowPublicacion() {
    $("#selEstado").click(function (e) {
        e.preventDefault();
        //row-publicacion
        let opcion = $(this).prop("value");
        console.log(opcion);
        if (opcion=="4") {
          $("#textoFecha").html("Fecha de publicación en Educatico:");
            $(".row-publicacion").slideDown();
        }
        else if (opcion == "8" ) {
            $("#textoFecha").html("Fecha de actualización:");
            $(".row-publicacion").slideDown();

        } else {
            $(".row-publicacion").slideUp();
        }

    });


}
