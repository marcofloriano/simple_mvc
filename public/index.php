<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if( !isset($_SESSION['loggedin']) ) {
  header('Location: /login.php');  
}
require '../Application/autoload.php';
use Application\core\App;
use Application\core\Controller;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Framework Setor9</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  </head>
  <body>
    <div class="col-8 offset-2 text-center" style="margin-top:10px">
    <a href="/home">Dashboard</a> |
    <a href="/login/logout">Sair</a>
  </div> 
  <?php 
    $app = new App();
  ?>
  <script src="/assets/js/jquery.slim.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>