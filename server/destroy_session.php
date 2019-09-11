<?php
  session_start();
  session_destroy();
  header('Location: ../modules/login/login.html'); //redireccionamiento a login (index.php)
 ?>
