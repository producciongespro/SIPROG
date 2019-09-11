"use strict";

var m = new Model (), v = new View ();
var equipo, tmpRecord;

$(document).ready(function () {
    loadMod();
});

function loadMod() {
    prepareMod();
    v.loadRecordFromSession( m.stringToJson("record") );
    handlerEvents();
    renderSelects();
    renderTeamSelected();
}

function renderSelects() {   
   v.selectOptEditMode(m.stringToJson("categorias"), "nombre_categoria", "#selCategoria",  m.getFieldArrayJson( "record", "id_cat" ) );    
    v.selectOptEditMode(m.stringToJson("estados"), "nombre_estado", "#selEstado",  m.getFieldArrayJson( "record", "id_estado" ) );    
    v.selectOptEditMode(m.stringToJson("instancias"), "nombre_instancia", "#selInstancia",  m.getFieldArrayJson( "record", "id_instancia" ) );
    v.MemeberTeam(m.stringToJson("usuarios"), "#mdlBodyEquipo" );
    v.selectOptEditMode(m.stringToJson("tipos"), "nombre_tipo", "#selTipo",  m.getFieldArrayJson( "record", "id_tipo" ) );
}

function renderTeamSelected() {
    tmpRecord =  m.stringToJson("record"); 
    //console.log(tmpRecord.equipo);
    tmpRecord.equipo = JSON.parse(tmpRecord.equipo);
    //console.log(tmpRecord.equipo);
    v.CheckMemeberTeam( "form-checkbox", tmpRecord.equipo);
}

function handlerEvents() {

    $("#btnGuardarEquipo").click(function () { 
        console.log("Equipo");
        
        equipo = m.checkedToJson("form-checkbox");      
        equipo = JSON.stringify(equipo);    
        //console.log("Equipo string");        
        console.log(equipo );

        $("#mdlEquipo").modal("hide");        
    });

    $("#btnSendForm").click(function (e) { 
        sendFormDataAjax(); 
    });
}

function sendFormDataAjax() {

  

    var formData = new FormData ();
    formData.append("id_ingreso", JSON.stringify(  tmpRecord.id_registro)  );
    formData.append("id_estado", $("#selEstado").val()  );
    formData.append("nombre", $("#txtNombreRecurso").val()  );
    formData.append("id_cat", $("#selCategoria").val()  );
    formData.append("id_tipo", $("#selTipo").val()  );
    formData.append("fecha_pub", $("#datPublicacion").val()  );
    formData.append("url", $("#txtUrl").val()  );
    formData.append("equipo", equipo );
    formData.append("solicitante", $("#txtContacto").val()  );
    formData.append("id_instancia", $("#selInstancia").val()  );
    formData.append("audios", $("#numAudios").val()  );
    formData.append("videos", $("#numVideos").val()  );
    formData.append("documentos", $("#numDocs").val()  );
    formData.append("imagenes", $("#numImg").val()  );
    formData.append("correo_usuario",  m.getFieldArrayJson("usuarioActual", "correo" ) );
    

    formData.append("observaciones", $("#txtObservaciones").val()  );
    
    m.conectDataAjax( "../../server/actualizar_elemento.php", formData, function () { 
                    alertify
                    .alert( nameSistem, "Recurso Actualizado satisfactoriamente", function(){
                       console.log("ok");
                       
                    });        
     } );
    
}