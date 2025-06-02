"use strict";

var m = new Model (), v = new View ();

$(document).ready(function () {
    prepareMod();
    loadMod();
});

function loadMod() {
    $(".div-shadow").removeClass("invisible");
    m.loadJson("../../server/obtener_informe.php", renderTable);
}


function renderTable(dataset) {
    $(".div-shadow").addClass("invisible");
    //console.log("dataset desde el controler");
    //console.log(dataset);
    var fecha = new Date();
    var ano = fecha.getFullYear();
    var pestanas = ano-2015;
    v.table2(dataset, pestanas, "#visorEstadisticas");

    //eventos de de componentes de tabla
    // bot贸n editar y bot贸n eliminar

    //Evento de eliminar registro
    $(".btn-del").click(function () {

        let target = $(this).attr("target");
        console.log("target: " + target);

            alertify.confirm( nameSistem, "¿Desea realmente eliminar el registro?",
            function(){
                // si da clic en OK:
              console.log("Aceptar");

            //prepara datos para AJAX
            let formData = new FormData();
            formData.append("idVal", target);
            formData.append("usuario", m.getFieldArrayJson("usuarioActual", "correo" ) );
            //envia datos por AJAX para el query que hace php
            m.conectDataAjax("../../server/eliminar_registro.php", formData,  loadMod )

            },
            function(){
             console.log("Cancelar");

            });

    });

    //Evento de edici贸n
    $(".btn-edit").click(function (e) {
        e.preventDefault();
        let target = $(this).attr("target");
        //console.log("edit: " + target);
        //console.log(m.getItemByField("id", target));
        m.setJsonInSession( "record", m.getItemByField("id_registro", target) );
        window.location.assign("../details/details.php");

    });

    //loadDataTable();


}



function loadDataTable() {
    $('#tblReportes').DataTable( {
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                }
    } );
}
