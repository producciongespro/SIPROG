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

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    canvas {
      width: 100% !important;
      height: 600px !important;
      max-width: 1200px;
      margin: 40px auto;
      display: block;
    }
  </style>
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
                  <span class="spn-ico"><i class="fas fa-user"></i> Usuario: Tipo: <?php echo $_SESSION['usuario']['tipo']; ?> - Area: <?php echo $_SESSION['usuario']['nombre_area']; ?></span>
            </div>
            <div class="col-4 text-center">
                <a href="../menu/menu.php" class="spn-ico lnk-ico" id="spnHome">
                    <i class="fas fa-home"></i> Ir a Inicio
                </a>
            </div>
            <div class="col-4 text-right">
               <span class="spn-ico"><i class="fas fa-info-circle"></i> Nombre: <?php echo $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido1'] . ' ' . $_SESSION['usuario']['apellido2']; ?></span>
            </div>
        </div>
        <hr>
  <canvas id="graficoRecursos"></canvas>
</div>
  <script>
    fetch('datos_recursos.php')
      .then(res => res.json())
      .then(data => {
        const anios = Object.keys(data);
        const categorias = ['Producción interna', 'Contratación', 'Gestionados', 'Actualizaciones'];
        const colores = {
          'Producción interna': '#4CAF50',
          'Contratación': '#2196F3',
          'Gestionados': '#FFC107',
          'Actualizaciones': '#F44336'
        };

        const datasets = categorias.map(categoria => ({
          label: categoria,
          data: anios.map(anio => data[anio][categoria] || 0),
          backgroundColor: colores[categoria],
          stack: 'total'
        }));

        new Chart(document.getElementById('graficoRecursos'), {
          type: 'bar',
          data: {
            labels: anios,
            datasets: datasets
          },
          options: {
            responsive: true,
            plugins: {
              title: {
                display: true,
                text: 'Recursos Publicados por Año (agrupados por categoría)'
              },
              tooltip: {
                mode: 'index',
                intersect: false
              }
            },
            scales: {
              x: {
                stacked: true
              },
              y: {
                stacked: true,
                beginAtZero: true
              }
            }
          }
        });
      });
  </script>
</body>
</html>
