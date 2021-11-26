<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Your Save Art</title>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- favincon -->
  <link rel="shortcut icon" href="layout/icon/favicon.ico" />
  <!-- Arquivo CSS -->
  <link type="text/css" rel="stylesheet" href="layout/css/style.css">
  <!-- Bootstrap CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
  <?php
  require_once "includes/connection-bd.php";
  require_once "includes/function/function-login.php";
  require_once "includes/function/function-password.php";
  require_once "includes/function/function-msg.php";
  require_once "includes/function/function-img.php";
  require "includes/forms/user-recuperar-forms.php";

  $emailValidar = $_SESSION['emailValidar'];
  $cod = $_GET['cod'];

  if ($cod === md5($emailValidar)) {
    if (!isset($_POST['senha1'])) {
      $sql = "SELECT * from user_yas where user_email='$emailValidar'";
      $busca = $banco->query($sql);
      $reg = $busca->fetch_object();
      $nome = $reg->user_first_name;
      Formstroca($nome, $cod);
    } else {
          
    }
  } else {
    echo 'nao';
  }

  ?>


  <!--Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>