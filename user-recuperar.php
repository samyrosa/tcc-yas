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
    $sql = "SELECT user_email, user_first_name from user_yas where user_email='$emailValidar' limit 1";

    $busca = $banco->query($sql);
    echo "<br>";
    if ($busca->num_rows === 0) {
      return FormsErro($emailValidar);
    } else {

      $_SESSION['emailValidar'] = $emailValidar;
      $cod = md5($emailValidar);

      $reg = $busca->fetch_object();
      $nome = $reg->user_first_name;

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
      $mail->Body = "<!DOCTYPE html>
      <html lang='pt-br'>
      
      <head>
          <meta charset='UTF-8'>
          <meta name='author' content=''>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <link rel='stylesheet' href=''>
          <link rel='preconnect' href='https://fonts.googleapis.com'>
          <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
          <link
              href='https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400&display=swap'
              rel='stylesheet'>
      
          <title>REDEFINIÇÃO DE SENHA</title>
          <style>
              .barra {
                  font-family: 'Montserrat', sans-serif;
                  padding: 50px;
                  background-color: #204B3D;
                  display: grid;
                  margin: 0;
                  place-items: center center;
      
      
              }
      
              .barra2 {
                  margin-left: 20px;
                  font-family: 'Montserrat', sans-serif;
                  padding: 40px;
                  width: 800px;
                  height: 370px;
                  background-color: #E6E0DE;
                  border-radius: 30px;
      
              }
              h5{
                  font-weight: 300;
                  font-size: 20px;
              }
              h1{
                text-transform: capitalize;
              }
          </style>
      </head>
      
      <body>
          <div class='barra'>
              <div class='barra2'>
                  <h1>Olá, $nome!</h1>
                  <h5>Sua senha do yas pode ser redefinida clicando no botão abaixo. Se você não solicitou uma nova senha,
                      ignore este e-mail.</h5>
                  <a class='btn btn-primary' href='http://localhost/tcc-yas/user-troca-senha.php?cod=$cod'
                      role='button'>Redefinir senha</a>
      
              </div>
          </div>
      
      
      
      </body>
      
      </html>";
      $mail->AltBody = 'Olá, $nome!
      Sua senha do yas pode ser redefinida clicando no botão abaixo. Se você não solicitou uma nova senha, ignore este e-mail.
      http://localhost/tcc-yas/user-troca-senha.php?cod=$cod';
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