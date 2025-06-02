<?php
  session_start();

  if (isset($_SESSION['usuario'])) {
        // TODO: establecer que se implementa en caso de estar en siesión
      } else {
          header('Location: ../../');
  }
?>

<script type="text/javascript">
    var id = '<?php echo$_SESSION['usuario']['id'];?>'
    var tipo = '<?php echo$_SESSION['usuario']['tipo'];?>'
    var area = '<?php echo$_SESSION['usuario']['nombre_area'];?>'
    var nombre = '<?php echo$_SESSION['usuario']['nombre'];?>'
    var apellido1 = '<?php echo$_SESSION['usuario']['apellido1'];?>'
    var apellido2 = '<?php echo$_SESSION['usuario']['apellido2'];?>'
    var correo = '<?php echo$_SESSION['usuario']['correo'];?>'
</script>



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
<script src="../../vendor/bootstrap-4.1/js/bootstrap.min.js"></script>
<script src="../../vendor/alertify/alertify.min.js"></script>
<script src="../../script/main.js"></script>
<script src="../../script/model.js"></script>
<script src="../../script/view.js"></script>

</head>
<script src="./js/menu.js"></script>
<body>


    <div class="">
            <img class="img-responsive img-fluid" src="../../assets\img\banner.png" alt="">
            <div class="lugar textosLogin">
                <h1 style="font-size:3vw;">- Menú Principal</h1>
            </div>

        <!-- <h1 class="ubicacion"><span class="spnVersion" ></span> - Menú Principal</h1> -->
    </div>
<br>
    <div class="container">
<!-- Modal cambio clave -->
<div class="modal fade" id="cambioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form id="loginForm"> <!-- form with an ID so we can identify it, now includes both the textbox and the button within it -->
      <div class="modal-body"> 
      <label for="modalpass" class="col-form-label">Nueva contraseña:</label>
           <div class="input-group">
           
            <input type="password" name="password" class="form-control" id="password" required>
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>
         <br>
            <label for="modalpass" class="col-form-label">Repita la contraseña:</label> <div class="input-group">
            <input type="password" name="password2" class="form-control" id="password2" required>
            <div class="input-group-append">
             <button id="show_password2" class="btn btn-primary" type="button" onclick="mostrarPassword2()"> <span class="fa fa-eye-slash icon"></span> </button>
          </div></div>
      </div>
      <div id="alerta" class="alert alert-info fade in alert-dismissible show">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button> <span id="mensajeError"></span> 
</div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="button" id="btnEnviarClave" class="btn btn-primary" value="Enviar">
      </div>
    </div>
  </div>
</div>
        <div class="row">
            <div class="col-4">
                <span class="spn-ico" > <i class="fas fa-user"></i> Usuario:  </span> <span id="spnTipoUsuario"></span>
            </div>
            <div class="col-4 text-center">
                <span  id="icoCloseSession" class="spn-ico lnk-ico" > <i class="fas fa-sign-out-alt"></i> Cerrar Sesión </span>
            </div>

            <div class="col-4 text-right">
                <span class="spn-ico"> <i class="fas fa-info-circle"></i> Nombre: </span> <span id="spnNombre"></span>
                <br><span id="btn_cambiar" class="spn-ico" > <i class="fas fa-key"></i> Cambiar contraseña </span>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10">
                Ingrese al módulo que corresponda según sea la tarea que requiere realizar.  Podrá volver a este menú desde cualquier módulo dando clic al botón "Ir a Inicio".
            </div>
            <div class="col-1">
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-3">
                </div>
            <div class="col-2">
                <img class="cliqueables" id="btnIrMod01" src="../../assets/ico/formulario.png" alt="formulario" title="Ingresar registro" >
            </div>

            <div class="col-2">
            <img class="cliqueables"  id="btnIrMod02" src="../../assets/ico/registros.png" alt="Base de datos" title="Ver y editar registros" >
            </div>
            <div class="col-2">
              <a href="../table2/informe.php" title="Ir a informe">
                <img class="cliqueables" id="btnGoups" src="../../assets/ico/sinDefinir.png" alt="Estadísticas trimestrales">
              </a>
            </div>

            <div class="col-3">
                </div>
        </div>
    <br>

    <div class="row">
      <div class="col-3">
          </div>
        <div class="col-2">
             <a href="../grafico1/grafico.php" title="Ir a gráfico">
                <img class="cliqueables" id="btnGoups" src="../../assets/ico/graficos.png" alt="Gráfico anual">
              </a>
            <!--<img class="cliqueables" id="btnGrafico1" src="../../assets/ico/graficos.png" alt="gráficos" title="Gráficos"  >-->
        </div>

        <div class="col-2">
        <img  class="cliqueables" id="btnLogs" src="../../assets/ico/bitacora.png" alt="calendario"  title="Bitácora">
        </div>
        <div class="col-2">
          <a href="../../server/descargar_backup.php" title="Descargar respaldo">
            <img class="cliqueables" id="btnBackup" src="../../assets/ico/respaldo.png" alt="Respaldar DB">
          </a>
        </div>
        <div class="col-3">
            </div>
    </div>

        <hr>

        <div class="row">
            <div class="col-2">
            </div>
            <div id="pieMenu" class="col-8">
                @GESPRO 2018
            </div>
            <div class="col-2">
            </div>
        </div>
        <hr>
    </div>

    <div class="div-shadow invisible">
        <img class="img-ajax-loading" src="../../assets/gif/ajax-loader.gif" alt="Loading">
    </div>


</body>
</html>
