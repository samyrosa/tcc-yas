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
  require_once('src/PHPMailer.php');
  require_once('src/SMTP.php');
  require_once('src/Exception.php');
  require "includes/forms/user-recuperar-forms.php";


  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $valorEnviado = $_GET['enviado'] ?? 'null';

  ?>

  <?php
  if (!isset($_POST['email'])) {
    Forms($valorEnviado);
  } else {
    $emailValidar = $_POST['email'];
    echo "<br>";
    $sql = "SELECT user_email from user_yas where user_email='$emailValidar' limit 1";

    $busca = $banco->query($sql);
    echo "<br>";
    if ($busca->num_rows === 0) {
      return FormsErro($emailValidar);
    } else {

      $_SESSION['emailValidar'] = $emailValidar;
      $cod = md5($emailValidar);

      $mail = new PHPMailer(true);

      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'tcc.yas2021etec@gmail.com';
      $mail->Password = 'tccyas1234';
      $mail->Port = 587;

      $mail->setFrom('tcc.yas2021etec@gmail.com');
      $mail->addAddress($emailValidar);

      $mail->isHTML(true);
      $mail->Subject = 'Recupere sua senha YAS';
      $mail->Body = "<a href='http://localhost/tcc-yas/user-troca-senha.php?cod=$cod'>Clik aqui para redefinir sua senha</a>";
      $mail->AltBody = 'Chegou o email teste do Canal TI';
      if ($mail->send()) {
        return Formssucesso($emailValidar);
      } else {
        return FormsErro($emailValidar);
      }
    }
  }
  ?>

  <?php

  ?>

  <!--Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>