<?php
  session_start();

  if (isset($_SESSION['usuario'])) {
        // TODO: establecer que se implementa en caso de estar en sesión
      } else {
          header('Location: ../../');
  }
?>




<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.js"></script>

    <script src="../../script/model.js"></script>
    <script src="../../script/view64.js"></script>
    <script src="../../script/main.js"></script>
    <script src="./js/table2.js"></script>
    <script language="javascript">
    $(document).ready(function() {
    	$(".botonExcel").click(function(event) {
    		$("#datos_a_enviar").val( $("<div>").append( $("#tblReportes").eq(0).clone()).html());
    		$("#FormularioExportacion").submit();
    });
    });
    </script>
</head>
<body>

  <div class="">
          <img class="img-responsive img-fluid" src="../../assets\img\banner.png" alt="">
          <div class="lugar textosLogin">
              <h1 style="font-size:3vw;">- Estadísticas trimestrales</h1>
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

          </div>
        </div>
        <br>
        <div class="exportar">
          <form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
          <p>Exportar a Excel  <img id="btnExportar" src="export_to_excel.gif" class="botonExcel" /></p>
          <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
          </form>
        </div>
        <div class="row" >
          <div class="col-1">

          </div>
            <!--<div class="col-10" id="periodos">-->
            <!--<ul class="nav nav-tabs">-->

            <!--  </div>-->
            <div class="col-1">

            </div>
      </div>
        <div class="row">
          <!--<div class="tab-content" id="nav-tabContent">-->
          <!--                   <div class="tab-pane fade show active" id="2021" role="tabpanel" aria-labelledby="2021-tab">-->
          <!--    <div id="visorEstadisticas2021"  class="col-10 offset-1"></div>-->
          <!--  </div>-->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#visorEstadisticas2017">2017</a>
    </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#visorEstadisticas2018">2018</a>
    </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#visorEstadisticas2019">2019</a>
    </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#visorEstadisticas2020">2020</a>
    </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#visorEstadisticas2021">2021</a>
    </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#visorEstadisticas2022">2022</a>
    </li>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#visorEstadisticas2023">2023</a>
    </li>
            </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#visorEstadisticas2024">2024</a>
    </li>
    </li>
        <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#visorEstadisticas2025">2025</a>
    </li>
  </ul>

           <div class="tab-content">
                <div id="visorEstadisticas2025"  class="container tab-pane active"> </div>
                <div id="visorEstadisticas2024"  class="container tab-pane fade"> </div>
                <div id="visorEstadisticas2023"  class="container tab-pane fade"> </div>
                <div id="visorEstadisticas2022"  class="container tab-pane fade"> </div>
                <div id="visorEstadisticas2021"  class="container tab-pane fade"> </div>
                <div id="visorEstadisticas2020"  class="container tab-pane fade"> </div>
                <div id="visorEstadisticas2019"  class="container tab-pane fade"> </div>
                <div id="visorEstadisticas2018"  class="container tab-pane fade"> </div>
                <div id="visorEstadisticas2017"  class="container tab-pane fade"> </div>
            </div>
          </div>
        </div>

    </div>

    <div class="div-shadow invisible">
        <img class="img-ajax-loading" src="../../assets/gif/ajax-loader.gif" alt="Loading">
    </div>

</body>
</html>
