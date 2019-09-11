'use strict';

function View () {

}


Model.prototype.info = function (container) {

}


View.prototype.table = function (array, visor) {
 //console.log(array);


    $(visor).empty();

    var limite = array.length, row,
    htmlTable = $(
      "<table  id='tblReportes' class='table table-striped'>" +
      "<thead>" +
      "<tr>" +
        "<th scope='col'>#</th>" +
        "<th class='text-center' scope='col'>Estado</th>" +
        "<th class='text-center' scope='col'>Nombre</th>" +
        "<th scope='col'>Categor\u00EDa</th>" +
        "<th scope='col'>Tipo</th>" +
        "<th scope='col'>Fecha Publicaci\u00F3n</th>" +
        "<th scope='col'>Trimestre</th>" +
        "<th class='text-center' scope='col'> Ver - Editar </th>" +
        "<th class='text-center' scope='col'> Eliminar </th>" +
      "</tr>" +
      "</thead>" +
      "</table>"
    ), tBody = $("<tbody></tbody>");

            for (let index = 0; index < limite; index++) {
              let fowNumb = index + 1;
              row = $(
                "<tr>" +
                "<th scope='row'>" + fowNumb + "</th>" +
                "<td class='text-center'>" +
                   array[index].nombre_estado +
                "</td>" +
                  "<td class='text-center'>" +
                    array[index].nombre_proyecto +
                  "</td>" +
                  "<td class='text-center'>" +
                    array[index].nombre_categoria +
                  "</td>" +
                  "<td>" +
                    array[index].nombre_tipo +
                  "</td>" +
                  "<td>" +
                  array[index].fecha_pub +
                "</td>" +
                "<td>" +
                    array[index].trimestre +
                "</td>" +
                "<td class='text-center'>" +
                      "<i id='faiEdt"+ index +"'  target='"+ array[index].id_registro +"'  class='fas fa-pencil-alt lnk-ico btn-edit'></i>  " +
                "</td>" +
                "<td class='text-center'>" +
                      "<i id='faiDel"+ index +"'  target='"+ array[index].id_registro +"'   class='far fa-trash-alt lnk-ico btn-del'></i>" +
                "</td>" +
                "</tr>"
            );
              $(tBody).append(row);
          }
    $(htmlTable).append(tBody);
    $(visor).html(htmlTable);


  }

View.prototype.table2 = function (array,anos,visor) {
   // var totales, audios=0,videos=0,documentos=0,imagenes=0,contratacion=0,gestion=0,noPedagogicos=0,recursos=0;
      var estadosPosibles = ["Ingresado","En producci\u00F3n","En revisi\u00F3n","Publicado","Desestimado","Obsoleto","Prioridad","Actualizaci\u00F3n"];
      for (var i = 0; i < anos; i++) {
        $(visor+(2017+i)).empty();
      }

      var htmlPeriodos = $("<nav><div class='nav nav-tabs' id='informes'></div></nav>");
      var limite = array.length, row;
      var htmlTable = new Array();
      $("#periodos").append(htmlPeriodos);
      for (var i = 0; i < anos; i++) {

      $("#informes").append("<a id='menu"+i+"' class='nav-item nav-link' data-toggle='tab' href='#"+(2017+i)+"' role='tab' aria-controls='"+(2017+i)+"'>"+(2017+i)+"</a></li>");
      if (i==(anos-1)) {
         $("#menu"+i).addClass('active');
      }
        }
      for (var j = 0; j < anos; j++) {
        var estados = [0,0,0,0,0,0,0,0];
         var totalAudios = [0,0,0,0];
         var totalActualizados = [0,0,0,0];
         var totalVideos = [0,0,0,0];
         var totalImagenes = [0,0,0,0];
         var totalDocumentos = [0,0,0,0];
         var totalRecursos = [0,0,0,0];
         var totalContratacion = [0,0,0,0];
         var totalGestion = [0,0,0,0];
         var totalNoPedagogicos = [0,0,0,0];
         var trimestres = ["I","II","III","IV"];
         totales=0;
      htmlTable[j] = $(
        "<table  id='tblReportes' class='table table-striped table-bordered'>" +
        "<thead>" +
        "<tr>" +
          // "<th scope='col'>#</th>" +
          "<th colspan='2' class='text-center' scope='col'>Total de Recursos por Trimestre</th>" +
          // "<th class='text-center' scope='col'>Total de recursos</th>" +
          "<th scope='col'>Total de audios</th>" +
          "<th scope='col'>Total de im\u00E1genes</th>" +
          "<th scope='col'>Total de documentos</th>" +
          "<th scope='col'>Total de v\u00EDdeos</th>" +
          "<th scope='col'> Contrataci\u00F3n Administrativa </th>" +
          "<th scope='col'> Gestionados </th>" +
          "<th scope='col'> No pedag\u00F3gicos </th>" +
            "<th scope='col'> Actualizaciones </th>" +
        "</tr>" +
        "</thead>" +
        "</table>");
      var tBody = $("<tbody></tbody>");
      for (var i = 0; i < 4; i++) {
        //var añoPublicacion = array[j].fecha_pub.slice(0, -6);
        // console.log(añoPublicacion);
              for (var index = 0; index < limite; index++) {
                if (array[index].id_estado==(parseInt(i)+1)) {
                  estados[i] = (parseInt(estados[i])+1);
                }

                if ((array[index].trimestre == trimestres[i]) && ((array[index].id_estado == 4)||(array[index].id_estado == 8)) && (array[index].fecha_pub.slice(0, -6)==(2017+j))) {
                  console.log("Año: "+(2017+j));
                  totalAudios[i] = parseInt(totalAudios[i]) + parseInt(array[index].audios);
                  totalVideos[i] = parseInt(totalVideos[i]) + parseInt(array[index].videos);
                  totalImagenes[i] = parseInt(totalImagenes[i]) + parseInt(array[index].imagenes);
                  if (array[index].id_cat==3) {
                    totalContratacion[i] = parseInt(totalContratacion[i]) + 1;
                  }
                  if (array[index].id_cat==1) {
                    totalGestion[i] = parseInt(totalGestion[i]) + 1;
                  }
                  if (array[index].id_tipo==6) {
                    totalNoPedagogicos[i] = parseInt(totalNoPedagogicos[i]) + 1;
                  }

                  totalDocumentos[i] = parseInt(totalDocumentos[i]) + parseInt(array[index].documentos);
                  if ((array[index].id_estado == 4)) {
                    totalRecursos[i] = (totalRecursos[i]+1);
                  }
                  }

                  if ((array[index].trimestre == trimestres[i]) && (array[index].id_estado == 8) && (array[index].fecha_pub.slice(0, -6)==(2017+j))) {
                      totalActualizados[i] = parseInt(totalActualizados[i]) + 1;
                  }
                }

      row = $(
                  "<tr>" +
                  // "<th scope='row'> </th>" +
                  "<td class='text-center'>" +
                      trimestres[i] + " Trimestre"  +
                  "</td>" +
                  "<td class='text-center'>" +
                     totalRecursos[i] +
                  "</td>" +
                    "<td class='text-center'>" +
                      totalAudios[i] +
                    "</td>" +
                    "<td class='text-center'>" +
                      totalImagenes[i] +
                    "</td>" +
                    "<td class='text-center'>" +
                      totalDocumentos[i] +
                    "</td>" +
                    "<td class='text-center'>" +
                    totalVideos[i] +
                  "</td>" +
                  "<td class='text-center'>" +
                      totalContratacion[i] +
                  "</td>" +
                  "<td class='text-center'>" +
                      totalGestion[i] +
                  "</td>" +
                  "<td class='text-center'>" +
                      totalNoPedagogicos[i] +
                  "</td>" +
                  "<td class='text-center'>" +
                      totalActualizados[i] +
                  "</td>" +
                "</tr>"
              );
                $(tBody).append(row);

            }
            var totales, audios=0,videos=0,documentos=0,imagenes=0,contratacion=0,gestion=0,noPedagogicos=0,recursos=0,actualizados=0;
            for (var i = 0; i < 4; i++) {
              audios = (audios + parseInt(totalAudios[i]));
              videos = (videos + parseInt(totalVideos[i]));
              documentos = (documentos + parseInt(totalDocumentos[i]));
              imagenes = (imagenes + parseInt(totalImagenes[i]));
              contratacion = (contratacion + parseInt(totalContratacion[i]));
              gestion = (gestion + parseInt(totalGestion[i]));
              noPedagogicos = (noPedagogicos+ parseInt(totalNoPedagogicos[i]));
              recursos = (recursos + parseInt(totalRecursos[i]));
              actualizados = (actualizados + parseInt(totalActualizados[i]));
            }
            row = $(
              "<tr>" +
                  "<td class='text-center'><b>" +
                  "TOTALES"  +
              "</b></td>" +
                "<td class='text-center'>" +
                  recursos +
              "</td>" +
              "<td class='text-center'>" +
                  audios +
              "</td>" +
              "<td class='text-center'>" +
                  imagenes +
              "</td>" +
              "<td class='text-center'>" +
                  documentos +
              "</td>" +
              "<td class='text-center'>" +
                  videos +
              "</td>" +
              "<td class='text-center'>" +
                  contratacion +
              "</td>" +
              "<td class='text-center'>" +
                  gestion +
              "</td>" +
              "<td class='text-center'>" +
                  noPedagogicos +
              "</td>" +
              "<td class='text-center'>" +
                  actualizados +
              "</td>" +
              "</tr>"
            );
            $(tBody).append(row);
            totales = $(
              "<div id='resumen'><br>" +
              "<h3>" + "Total por estado" +
              "</h3></div>"
            );

      $(htmlTable[j]).append(tBody);
  }

      for (var i = 0; i < anos; i++) {
        $(visor+(2017+i)).html("<h1>"+(2017+i)+"</h1>");
        console.log(htmlTable[i]);
        $(visor+(2017+i)).append(htmlTable[i]);



      }


      for (var i = 0; i < 8; i++) {
        $(visor).append("<p>"+ estadosPosibles[i]+ " : " +estados[i]+"</p>");
      }


    }

View.prototype.formWithData = function (record) {
  $(visor).empty();

}

View.prototype.cards = function (array, visor, emailUser) {
  //console.log(array);

  console.log(emailUser);


  var limite = array.length;


  $(visor).empty();

  var htmlContainer = $("<div class='col-12'></div>");

for (let index = 0; index <limite; index++) {
  //console.log(index);
  //console.log(array[index].titulo );
  var tmpIco, coreVisor, htmlDelete;

  if (emailUser == array[index].correo ) {
    htmlDelete =
      "<span class='spn-ico spn-del' > <i class='fas fa-trash-alt'></i>  <span>"
  } else {
    htmlDelete = " "
  };

  switch (array[index].tipo) {
    case "lnk":
    tmpIco = "<i class='fas fa-link'></i>";
    coreVisor = "<a href='"+ array[index].urlArchivo +"' target='_balnk' >" +
    "<img class='img-thumbnail lnk-ico' src='assets/ico/link.png' alt='imagen link de sitio web'></img>" +
    "</a>";
    break;
    case "mp3":
    tmpIco =  "<i class='fas fa-volume-up'></i>";
    coreVisor = "<audio controls src='" + array[index].urlArchivo + "' ></audio>";
    break;
    case "mp4":
    tmpIco = "<i class='fas fa-video'></i>";
    coreVisor = "<video controls src='" + array[index].urlArchivo + "' ></video>";
    break;
    case "img":
    tmpIco = "<i class='far fa-image'></i>";
    coreVisor = "<img class='img-fluid' src='" + array[index].urlArchivo + "' alt='imagen' ></img>";
    break;
    case "pdf":
    tmpIco = "<i class='fas fa-file-pdf'></i>";
    coreVisor = "<img class='img-thumbnail lnk-ico' src='assets/ico/pdf.png' alt='Card image cap'></img>";
    coreVisor = "<a href='"+ array[index].urlArchivo +"' target='_balnk' >" +
    "<img class='img-thumbnail lnk-ico' src='assets/ico/pdf.png' alt='imagen link de pdf'></img>" +
    "</a>";
    break;

    default:
    console.log("Opci車n de ico fuera de rango");

      break;
  }


  var htmlCard = $(
    "<div class='row'>"  +
      "<div class='col-12 col-cards-container'>" +
  "<div class='card text-center'>" +
  "<div class='card-header' > "+
  "<div class='row'>" +
      "<div class='col-4 text-center'> </div>" +
      "<div class='col-4 text-center'> "+ tmpIco +" </div>" +
      "<div class='col-4 text-right'> "+ htmlDelete +" </div>" +
  "</div>"   +
  " </div>" +
  "<div class='card-body'>" +
    "<h5 class='card-title' > "+ array[index].titulo +" </h5>" +

     "<p>" +  coreVisor + "</p>" +
     "<p class='card-text'  > "+ array[index].descripcion +"</p>" +
  //  "<button class='btn btn-primary btn-ver-media' typeMedia='"+ array[index].tipo +"' target='"+ array[index].urlArchivo +"'   >" +
//        "<i class='far fa-eye'></i> Ver " +
//    "</button>" +
  "</div>" +
  "<div class='card-footer text-muted'>Publicado el " + array[index].fecha + "  por "+  array[index].nombre  +"  </div>" +
      "</div>" +
    "</div>" +
    "</div>");
  $(htmlContainer).append(htmlCard);
}

$(visor).html(htmlContainer);

}

View.prototype.selectOpt = function (array, nombreCampo, objSelect) {
    for (let index = 0; index < array.length; index++) {
      //console.log(array[index].id );
      //console.log(array[index].categoria );
      var htmlOpt = $("<option value='"+ array[index].id +"' > "+ array[index][nombreCampo] +" </option>");
        $(objSelect).append(htmlOpt);
    }
}


View.prototype.selectOptEditMode = function (array, nombreCampo, objSelect, idRecord) {
  for (let index = 0; index < array.length; index++) {
    //console.log(array[index].id );
    //console.log(array[index].categoria );
    //console.log(idRecord);
    if (idRecord ==  array[index].id ) {
      var htmlOpt = $("<option selected value='"+ array[index].id +"' > "+ array[index][nombreCampo] +" </option>");
      $(objSelect).append(htmlOpt);
    } else {
      var htmlOpt = $("<option value='"+ array[index].id +"' > "+ array[index][nombreCampo] +" </option>");
      $(objSelect).append(htmlOpt);
    }

  }
}


View.prototype.CheckMemeberTeam = function ( classChecked, array ) {


  var chkTeam = $("."+classChecked), i;
      for ( i = 0; i < array.length; i++) {
        for (let index = 0; index < chkTeam.length; index++) {
        /*
          console.log("Check");
         console.log( $(chkTeam[index] ).attr("id") );
         console.log("***********");
         console.log( array[i] );
          */


            if (  $(chkTeam[index] ).attr("id")  == array[i]   ) {
                $(chkTeam[index] ).prop("checked", true );
               //console.log($(chkTeam[index] ).attr("id"));
               //console.log("cheked");


            }
        }
    }


}



View.prototype.MemeberTeam = function (array, visor) {
 //console.log(array);

    $(visor).empty();

      for (let index = 0; index < array.length; index++) {
        var htmlPerson =        ( "<div class='input-group mb-3'>" +
                                "<div class='input-group-prepend'>  " +
                                        "<div class='input-group-text'>" +
                                          "<input  id='"+ array[index].correo+"' class='form-checkbox' type='checkbox' >" +
                                        "</div>" +
                                "</div>" +
                                    "<label for='"+  array[index].correo +"'  >  &nbsp &#8594; "+ array[index].nombre + " " + array[index].apellido1 + " " +  array[index].apellido2 +  " </label>" +
                                  "</div>");
      $(visor).append(htmlPerson);

      }
}

View.prototype.loadRecordFromSession = function (record) {

  //console.log(record);
  //carga los datos del registro en  los input de tipo text

  $("#txtNombreRecurso").val(record.nombre_proyecto );


  $("#datPublicacion").val(record.fecha_pub);
  $("#txtUrl").val(record.url );
  $("#txtContacto").val(record.solicitante);


  $("#numAudios").val(record.audios );
  $("#numVideos").val(record.videos );
  $("#numDocs").val(record.documentos );
  $("#numImg").val(record.imagenes );
  $("#txtObservaciones").val(record.observaciones );




}


View.prototype.tableLogs = function (array, visor) {
  //console.log(array);


     $(visor).empty();
     var limite = array.length, row,
     htmlTable = $(
       "<table  id='tblLog' class='table table-striped'>" +
       "<thead>" +
         "<tr>" +
           "<th class='text-center' scope='col'>Id</th>" +
           "<th class='text-center' scope='col'>Usuario responsable</th>" +
           "<th scope='col'>Tipo de evento</th>" +
           "<th scope='col'>Fecha del evento</th>" +
           "<th scope='col'>Recurso afectado</th>" +
         "</tr>" +
       "</thead>" +
       "</table>"
     ), tBody = $("<tbody></tbody>");

             for (let index = 0; index < limite; index++) {
            console.log(array[index].evento  );
             
             let evento = JSON.parse(array[index].evento );
            // console.log(evento);
              
              
               row = $(
                 "<tr>" +
                 "<td class='text-center'>" +
                    array[index].id_evento +
                 "</td>" +
                   "<td class='text-center'>" +
                     array[index].usuario +
                   "</td>" +
                   "<td class='text-center'>" +
                     array[index].evento +
                   "</td>" +
                   "<td>" +
                     array[index].fecha_evento +
                   "</td>" +
                   "<td>" +
                   array[index].nombre +
                 "</td>" +
                 "</tr>"
             );
               $(tBody).append(row);
           }
     $(htmlTable).append(tBody);
     $(visor).html(htmlTable);


   }
