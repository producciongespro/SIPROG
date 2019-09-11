<?php
  session_start();

  if (isset($_SESSION['usuario'])) {
        // TODO: establecer que se implementa en caso de estar en siesión
      } else {
          header('Location: ../../');
  }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title class="" >SIPROG v1.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="../../assets/ico/creative.png" type="image/png">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="../../vendor/bootstrap-4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendor/alertify/css/alertify.min.css">
    <link rel="stylesheet" href="../../vendor/alertify/css/themes/default.min.css">
    <link rel="stylesheet" href="../../css/master.css">


    <script src="../../vendor/jquery-3.3.1/jquery-3.3.1.min.js"></script>
    <script src="../../vendor/alertify/alertify.min.js"></script>
    <script src="../../vendor/bootstrap-4.1/js/bootstrap.min.js"></script>

    <script src="../../script/model.js"></script>
    <script src="../../script/view.js"></script>
    <script src="../../script/main.js"></script>
    <script src="./js/form1.js"></script>

</head>
<body>


  <div class="">
          <img class="img-responsive img-fluid" src="../../assets\img\banner.png" alt="">
          <div class="lugar textosLogin">
              <h1 style="font-size:3vw;">- Agregar recurso</h1>
          </div>

      <!-- <h1 class="ubicacion"><span class="spnVersion" ></span> - Menú Principal</h1> -->
  </div>
<br>
    <div class="container">

        <div class="row">
            <div class="col-4">
                <span class="spn-ico"> <i class="fas fa-user"></i> Usuario:  </span> <span id="spnTipoUsuario"></span>
            </div>
            <div class="col-4 text-center">
                  <span class="spn-ico lnk-ico" id="spnHome"> <i class="fas fa-home"></i> Ir a Inicio </span>
            </div>
            <div class="col-4 text-right">
                <span class="spn-ico" > <i class="fas fa-info-circle"></i> Nombre: </span> <span id="spnNombre"></span>
            </div>
        </div>
        <hr>

      <form id="frmData1" class="needs-validation" novalidate>

                    <div class="form-group">
                            <label for="txtNombreRecurso">Nombre del recurso:</label>
                            <input name="nombre" type="text" class="form-control" id="txtNombreRecurso" placeholder="Escriba aquí el nombre del recurso" required>
                            <div class="invalid-feedback">
                              Por favor incluye el nombre del recurso
                            </div>
                    </div>


                    <div class="form-group">
                      <label for="selEstado">Seleccionar estado:</label>
                      <select class="form-control" id="selEstado" name="id_estado" required>
                        <option selected disabled >Por favor seleccione el estado</option>
                      </select>
                      <div class="invalid-feedback">
                           Campo requerido, selecciona el estado
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="selCategoria">Seleccionar categoría:</label>
                      <select class="form-control" id="selCategoria" name="id_categoria" required >
                        <option selected disabled >Por favor seleccione la categoría</option>
                      </select>
                      <div class="invalid-feedback">
                           Campo requerido, selecciona la categoría
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="selTipo">Seleccionar tipo:</label>
                      <select class="form-control" id="selTipo" name="id_tipo" required>
                        <option selected disabled >Por favor seleccione el tipo</option>
                      </select>
                      <div class="invalid-feedback">
                           Campo requerido, selecciona el tipo
                      </div>
                    </div>

                <div class="row row-publicacion">

                     <div class="col">
                        <div class="form-group">
                            <label id="textoFecha" for="datPublicacion"></label>
                            <input name="fecha_pub" type="date" class="form-control" id="datPublicacion" >
                        </div>
                        </div>

                        <div class="col">
                        <div class="form-group">
                        <label for="txtUrl">Url del recurso:</label>
                        <input name="url" type="text" class="form-control" id="txtUrl" placeholder="Escriba aquí la URL">
                        </div>
                        </div>


                </div>

                    <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                <label for="txtContacto">Nombre del contacto:</label>
                                <input name="contacto" type="text" class="form-control" id="txtContacto" placeholder="Escriba aquí el nombre de contacto del recurso" required>
                                <div class="invalid-feedback">
                                     Campo requerido, por favor incluye el nombre del contacto
                                </div>
                                </div>
                        </div>
                        <div class="col">
                                <div class="form-group">
                                    <label for="selInstancia">Instancia del contacto:</label>
                                    <select class="form-control" id="selInstancia" name="id_instancia" required >
                                            <option selected disabled >Por favor seleccione la instancia</option>
                                    </select>
                                    <div class="invalid-feedback">
                                         Campo requerido, selecciona la instancia
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="numAudios">Cantidad de audios:</label>
                            <input name="audios" min="0" max="10000" type="number" class="form-control" id="numAudios" required>
                            <div class="invalid-feedback">
                                 Campo requerido. 0 si no incluye audios
                            </div>
                        </div>
                        <div class="col">
                            <label for="numVideos">Cantidad de videos:</label>
                            <input name="videos" min="0" max="10000" type="number" class="form-control" id="numVideos" required>
                            <div class="invalid-feedback">
                                 Campo requerido. 0 si no incluye vídeos
                            </div>
                        </div>
                        <div class="col">
                            <label for="numDocs">Cantidad de documentos:</label>
                            <input name="documentos" min="0" max="10000" type="number" class="form-control" id="numDocs" required >
                            <div class="invalid-feedback">
                                 Campo requerido. 0 si no incluye documentos
                            </div>
                        </div>
                        <div class="col">
                            <label for="numImg">Cantidad de imágenes:</label>
                            <input name="imagenes" min="0" max="10000" type="number" class="form-control" id="numImg" required >
                            <div class="invalid-feedback">
                                 Campo requerido. 0 si no incluye imágenes
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-10 text-right">
                            Clic en el botón para agregar los encargados de desarrollo del recurso:
                        </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-dark"  data-toggle="modal" data-target="#mdlEquipo"  >Equipo de trabajo</button>
                            </div>
                    </div>
                    <br>


                    <div class="form-group">
                      <label for="txtObservaciones">Observaciones:</label>
                      <textarea class="form-control" id="txtObservaciones" rows="3" name="observaciones" ></textarea>
                    </div>


                    <div class="row">
                        <div class="col text-right">
                        <input class="btn btn-outline-primary" id="btnSendForm" name="btnSendForm" type="button" value="Enviar">
                        </div>
                    </div>


        </form>
    </div>





<div class="div-shadow invisible">
    <img class="img-ajax-loading" src="../../assets/gif/ajax-loader.gif" alt="Loading">
</div>





<!-- Modal -->
<div class="modal fade" id="mdlEquipo" tabindex="-1" role="dialog" aria-labelledby="mdlEquipoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlEquipoLabel">Miembros del equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mdlBodyEquipo">




      </div>
      <div class="modal-footer">
                <button type="button" id="btnGuardarEquipo" class="btn btn-info">Guardar</button>
      </div>
    </div>
  </div>
</div>




</body>
</html>
