"use strict";

var m = new Model (), v = new View ();

$(document).ready(function () {
    prepareMod();
    loadMod();    
});

function loadMod() {
    $(".div-shadow").removeClass("invisible");
   m.loadJson("../../server/obtener.php?valor=bitacoranew&id=id_evento", renderTable );
   
}

function renderTable(dataset) {
    $(".div-shadow").addClass("invisible");
    dataset = dataset.reverse();
    console.log("dataset desde el controler");
    //console.log(dataset);    
    v.tableLogs(dataset, "#visor");  
}


