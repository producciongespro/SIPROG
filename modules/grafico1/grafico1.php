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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.css"/>
    <link rel="stylesheet" href="../../css/master.css">


    <script src="../../vendor/jquery-3.3.1/jquery-3.3.1.min.js"></script>
    <script src="../../vendor/alertify/alertify.min.js"></script>
    <script src="../../vendor/bootstrap-4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js" integrity="sha256-MZo5XY1Ah7Z2Aui4/alkfeiq3CopMdV/bbkc/Sh41+s=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" integrity="sha256-oSgtFCCmHWRPQ/JmR4OoZ3Xke1Pw4v50uh6pLcu+fIc=" crossorigin="anonymous"></script>

    <script src="../../script/model.js"></script>
    <script src="../../script/view.js"></script>
    <script src="../../script/main.js"></script>
    <script src="./js/grafico1.js"></script>

</head>
<body>


  <div class="">
          <img class="img-responsive img-fluid" src="../../assets\img\banner.png" alt="">
          <div class="lugar textosLogin">
              <h1 style="font-size:3vw;">- Gráficos</h1>
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
        <div class="row">
          <div class="col-12">
            <h2>Gráficos</h2>
          </div>
        </div>
        <br>
        <div class="row">
            <div class="col-10 offset-1">
              El gráfico de la izquierda muestra la cantidad de recursos ingresados al sistema agrupados según sea el estado en que se encuentren actualmente.  El gráfico de la derecha los agrupa según sea el tipo de recurso del que se trate.
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-6">
              <canvas id="bar1" width="400" height="400"></canvas>
          </div>
          <div class="col-6">
          <canvas id="pie1" width="400" height="400"></canvas>
          </div>
        </div>



    </div>



<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Ver - Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
           <div class="col-12" id="visorModal" ></div>
       </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="div-shadow invisible">
    <img class="img-ajax-loading" src="../../assets/gif/ajax-loader.gif" alt="Loading">
</div>


</body>
</html>
