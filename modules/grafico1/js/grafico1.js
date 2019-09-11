"use strict";

var m = new Model (), v = new View ();


$(document).ready(function () {
    prepareMod();
    loadMod();
});

function loadMod() {
    $(".div-shadow").removeClass("invisible");
    m.loadJson("../../server/obtener.php?valor=ingresos&id=id_registro", function (dataset) {
     //console.log(dataset);
     

        m.loadJson("../../server/obtener.php?valor=estados&id=id", function (listaEstados) {
            //console.log(array);
            var estados = [];
            for (let index = 0; index < listaEstados.length; index++) {
                estados.push(listaEstados[index].nombre_estado);
                
            }
            //console.log(estados);
            //console.log(dataset);
            
            barChart(dataset, estados );
            //pieChart(dataset);


           
           } );



           m.loadJson("../../server/obtener.php?valor=tipos&id=id", function (listaTipo) {
            //console.log(array);
            var tipos = [];
            for (let index = 0; index < listaTipo.length; index++) {
                tipos.push(listaTipo[index].nombre_tipo);
                
            }
            //console.log(tipos);
            //console.log(dataset);
            
            
            pieChart(dataset, tipos );


            $(".div-shadow").addClass("invisible");
           } );




    } );


}


function getEstado(array ) {
    //console.log("EStados: ");    
    //console.log(array);
    
    var cantPorEstado = [0, 0, 0, 0, 0, 0, 0 ];
    for (let index = 0; index < array.length; index++) {
        for (let i = 0; i < cantPorEstado.length; i++) {
            let tmpEstado = parseInt(array[index].id_estado);
           // console.log(i + " - " + tmpEstado);            
           if (i == tmpEstado ) {
            cantPorEstado[i] = parseInt(cantPorEstado[i]) + 1;
           }
            
        }
        
    }
    
    cantPorEstado = cantPorEstado.slice(1);
    
    
    return cantPorEstado;
}



function getTipo(array ) {
    //console.log("tipos: ");    
    //console.log(array);
    
    var cantPorTipo = [0, 0, 0, 0, 0, 0, 0, 0 ];
    for (let index = 0; index < array.length; index++) {
        for (let i = 0; i < cantPorTipo.length; i++) {
            let tmpTipo = parseInt(array[index].id_tipo);
           // console.log(i + " - " + tmpEstado);            
           if (i == tmpTipo ) {
            cantPorTipo[i] = parseInt(cantPorTipo[i]) + 1;
           }
            
        }
        
    }
    
    cantPorTipo = cantPorTipo.slice(1);
    
    
    return cantPorTipo;
}



function barChart(array, estados) {
    
    var dataEstados = getEstado(array);
    //console.log(dataEstados);
    //console.log(estados);
    
    
    
    var ctx = document.getElementById("bar1").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: estados,
        datasets: [{
            label: 'Estado de recursos',
            data: dataEstados,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
    
}

function pieChart(array, tipos) {

    var dataTipos = getTipo(array);
    //console.log(dataTipos);
    //console.log(tipos);


    var ctx = document.getElementById("pie1").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: tipos,
        datasets: [{
            label: '# of Votes',
            data: dataTipos,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    }

});
}