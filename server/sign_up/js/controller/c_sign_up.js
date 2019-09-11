"use strict";
const m = new Model(), v = new View;
var infoUser;
$(document).ready(function () {
    handlerEvents();
    m.loadJson("../obtener.php?valor=areas&id=id", loadInstances );
});



function loadInstances() {
    //console.log(m.getDataSet());
    v.instances(m.getDataSet(), $("#gorupSelectorInstance") );


}


function handlerEvents() {
    console.log("eventos listos");

    $("#btnSignup").click(function (e) {
        e.preventDefault();
        m.signUp($("#txtNombre").val(), $("#txtApellido1").val(), $("#txtApellido2").val(), $("#selInstancia").val(), $("#txtEmail").val(), $("#txtPass1").val(),  $("#txtPass1").val()   );
    });







}
