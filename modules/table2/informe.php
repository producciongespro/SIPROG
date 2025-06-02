<?php
  session_start();

  if (isset($_SESSION['usuario'])) {
        // TODO: establecer que se implementa en caso de estar en sesión
      } else {
          header('Location: ../../');
  }
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title class="" >SIPROG v1.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../assets/ico/creative.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="../../css/master.css">
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

<div class="container mt-5">
            <div class="row">
            <div class="col-4">
                <span class="spn-ico"><i class="fas fa-user"></i> Usuario: Tipo: <?php echo $_SESSION['usuario']['tipo']; ?> - Area: <?php echo $_SESSION['usuario']['nombre_area']; ?></span>

                <!--<span class="spn-ico"> <i class="fas fa-user"></i> Usuario:  </span> <span id="spnTipoUsuario"></span>-->
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
         <div class="exportar">
<button type="button" id="btnExportarExcel" class="btn btn-success">
    Exportar a Excel 
</button>

        </div>
    <!--<h2>Resumen por Trimestre</h2>-->
    <!-- Tabs -->
    <ul class="nav nav-tabs" id="anioTabs" role="tablist"></ul>
    <!-- Contenido de cada tab -->
    <div class="tab-content" id="anioTabsContent"></div>
</div>

<script>
fetch('informe_trimestral.php')
    .then(response => response.json())
    .then(data => {
        let tabs = '';
        let content = '';

        for (const anio in data) {
            // const currentYear = 2026; // valor simulado para pruebas
            const currentYear = new Date().getFullYear();
            const isActive = anio == currentYear ? 'active' : '';
            const isShow = anio == currentYear ? 'show active' : '';


            tabs += `
                <li class="nav-item">
                    <a class="nav-link ${isActive}" id="tab-${anio}" data-toggle="tab" href="#contenido-${anio}" role="tab">${anio}</a>
                </li>
            `;

            let granTotal = 0;

            let tabla = `
                <table class="table table-bordered table-sm mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>Trimestre</th>
                            <th>Prod. Interna</th>
                            <th>Actu.</th>
                            <th>Contratación</th>
                            <th>Gestionados</th>
                            <th>Audios</th>
                            <th>Imágenes</th>
                            <th>Documentos</th>
                            <th>Videos</th>
                            <th>No Pedagógicos*</th>
                        </tr>
                    </thead>
                    <tbody>`;

            for (const trimestre in data[anio]) {
                const t = data[anio][trimestre];

               const esTotales = t.trimestre.toLowerCase() === 'totales';

tabla += `
    <tr>
        <td>${esTotales ? '<strong>' + t.trimestre + '</strong>' : t.trimestre}</td>
        <td>${esTotales ? '<strong>' + t.prod_interna + '</strong>' : t.prod_interna}</td>
        <td>${esTotales ? '<strong>' + t.actu + '</strong>' : t.actu}</td>
        <td>${esTotales ? '<strong>' + t.contratacion + '</strong>' : t.contratacion}</td>
        <td>${esTotales ? '<strong>' + t.gestionados + '</strong>' : t.gestionados}</td>
        <td>${t.total_audios}</td>
        <td>${t.total_imagenes}</td>
        <td>${t.total_documentos}</td>
        <td>${t.total_videos}</td>
        <td>${t.no_pedagog}</td>
    </tr>
`;


                // Calcular el total solo si no es la fila de totales
                if (t.trimestre.toLowerCase() !== 'totales') {
                    granTotal += parseInt(t.prod_interna || 0)
                               + parseInt(t.actu || 0)
                               + parseInt(t.contratacion || 0)
                               + parseInt(t.gestionados || 0);
                }
            }

            tabla += '</tbody></table>';

            const leyenda = `
                <div class="mt-2 mb-4 font-weight-bold">
                    Gran total: ${granTotal} (Incluye recursos gestionados, actualizaciones, de contratación y de producción interna).<br>
                    <small>*Los recursos no pedagógicos se encuentran contemplados dentro de los de producción interna.</small>
                </div>
            `;

            content += `
                <div class="tab-pane fade ${isShow}" id="contenido-${anio}" role="tabpanel">
                    ${tabla}
                    ${leyenda}
                </div>
            `;
        }

        document.getElementById('anioTabs').innerHTML = tabs;
        document.getElementById('anioTabsContent').innerHTML = content;
    })
    .catch(error => {
        console.error('Error al cargar los datos:', error);
        document.getElementById('anioTabsContent').innerHTML = '<p class="text-danger">No se pudieron cargar los datos.</p>';
    });

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById("btnExportarExcel").addEventListener("click", function () {
    // Obtiene el contenido del tab activo
    const activeTab = document.querySelector(".tab-pane.active");
    if (!activeTab) {
        alert("No hay contenido activo para exportar.");
        return;
    }

    const table = activeTab.querySelector("table");
    if (!table) {
        alert("No se encontró una tabla en el tab activo.");
        return;
    }

    const tableHTML = table.outerHTML;

    // Crear formulario y enviarlo
    const form = document.createElement("form");
    form.method = "POST";
    form.action = "ficheroExcel.php";
    form.target = "_blank";

    const input = document.createElement("input");
    input.type = "hidden";
    input.name = "datos_a_enviar";
    input.value = tableHTML;

    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
});
</script>

</body>
</html>
