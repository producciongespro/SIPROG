"use strict";

var m = new Model (), v = new View ();

$(document).ready(function () {
    //console.log("Menu Ready");
    loadMod();
});


function loadMod() {
    //Si la sessión en cliente existe no debe cargar los json
    let sessionPersist = sessionStorage.getItem("sessionPersist");
    //console.log(sessionPersist);

    if (sessionPersist != "true") {
        sessionStorage.setItem("sessionPersist", true );
        saveSession();
        loadData();
    };

    prepareMod();
    getUser();
    handlerEvents();

}


function handlerEvents() {
    //referencias
    $("#btnIrMod01").click(function () {
        window.location.assign("../form1/form1.php");
    });
    $("#btnIrMod02").click(function () {
        window.location.assign("../table1/table1.php");
    });
    $("#btnGrafico1").click(function () {
        window.location.assign("../grafico1/grafico1.php");
    });
    $("#btnGoups").click(function () {
        window.location.assign("../table2/table2.php");
    });
    $("#btnLogs").click(function () {
        window.location.assign("../logs/logs.php");
    });




        $("#icoCloseSession").click(function () {
                    alertify.confirm( nameSistem, "¿Desea cerrar sesión?",
                    function(){
                        window.location.assign("../../server/destroy_session.php");
                    },
                    function(){
                        console.log("cancela cierre sesión");

                    });

                });
}


function loadLayout(user) {
    if (user=="Admin") {

    }

}




function saveSession() {
    var objUser = {
        "tipo" : tipo,
        "area": area,
        "nombre": nombre,
        "apellido1": apellido1,
        "apellido2": apellido2,
        "correo": correo };

     m.setJsonInSession("usuarioActual", objUser );

}


function loadData() {
    $(".div-shadow").removeClass("invisible");
      m.loadJson("../../server/obtener.php?valor=categorias&id=id", function (array) {
          m.setJsonInSession("categorias", array );
          $(".div-shadow").addClass("invisible");
      });

      m.loadJson("../../server/obtener.php?valor=estados&id=id", function (array) {
        m.setJsonInSession("estados", array );
    } );

    m.loadJson("../../server/obtener.php?valor=instancias&id=id", function (array) {
       m.setJsonInSession("instancias", array );
  } );


  m.loadJson("../../server/obtener.php?valor=usuarios&id=id", function (array) {
    m.setJsonInSession("usuarios", array );
  } );


    m.loadJson("../../server/obtener.php?valor=tipos&id=id", function (array) {
        m.setJsonInSession("tipos", array );
  } );

  m.loadJson("../../server/obtener.php?valor=areas&id=id", function (array) {
    m.setJsonInSession("areas", array );
} );



  }
