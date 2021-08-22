<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title> Login - YAS</title>
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

<body class="yas_pag_reg yas_font_regular">
  <?php
      require_once "includes/connection-bd.php";
      require_once "includes/function/function-login.php";
      require_once "includes/function/function-password.php";
      require_once "includes/function/function-svg.php";
      require_once "includes/function/function-msg.php";
    ?>
  <?php

      if(is_logado()){
        echo msg_erro("Já tem alguem ai","Você ja está logado, em uma conta existente,para criar uma nova conta porfavor saia de sua conta ","voltar a explorar","index.php");
      }
      else{
        if(!isset($_POST['email'])){
          require "includes/forms/user-login-form.html";
      }else{
          $email=$_POST['email'];
          $senha=$_POST['senha'];
          $sql= "SELECT user_id, user_email, user_senha from user_yas where user_email='$email' limit 1";
          $busca = $banco->query("$sql");
          if(!$busca){
            echo msg_erro('Opp..','Falha na busca do banco de dados, por favor tente denovo','Tentar Novamente','user-login.php');
          }
          else{
            if($busca->num_rows>0){
              $reg = $busca->fetch_object();
              // print_r($reg);
              if(testar_hash($senha, $reg->user_senha)){
                $_SESSION['email'] = $reg->user_email;
                $_SESSION['id'] = $reg->user_id;
                header("Location: index.php");
              }else{
                echo msg_erro("Senha Inválida","Por favor, insira a senha corretamente. ","Tentar Novamente","user-login.php");
              }
            }else{
              echo msg_erro("Opps..","Você ainda não existe, tente novamente ou <br><a href='user_cadastro.php' class='link-dark'><u><b>CADASTRE-SE</b></u></a>.","Tentar Novamente","user-login.php");
            }
          }
        }
      }
    ?>
  <!--Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.js"> </script>

</body>

</html>