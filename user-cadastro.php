<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title> Cadastro - YAS</title>
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
        echo msg_erro("Já tem alguém ai...","Você já está logado em uma conta existente.<br> Para criar uma nova, por favor <u><b><a class='link-dark' href='user-logof.php'>SAIA DA SUA CONTA</a></u><b>. ","Voltar a explorar","index.php");
      }
      else{
        if(!isset($_POST['nome'])){
          require "includes/forms/user-cadastro-form.php";
      }else{
        $nome= $_POST['nome'] ?? null;
        $sobrenome= $_POST['sobrenome'] ?? null;
        $email= $_POST['email'] ?? null;
        $senha1= $_POST['senha1'] ?? null;
        $senha2= $_POST['senha2'] ?? null;

        if(empty($nome)||empty($sobrenome)||empty($email)||empty($senha1)||empty($senha2)){
          echo msg_erro("Opps...","Todos os dados são obrigatórios.","Tentar Novamente","user-cadastro.php");
          
        }else{
          
          if($senha1===$senha2){

          $senha = criar_hash($senha1);
          $sql= "INSERT INTO user_yas(user_first_name, user_last_name, user_email , user_senha) VALUES('$nome','$sobrenome','$email','$senha')";
          if ($banco->query($sql)){
          echo msg_sucesso("Parabéns...","$nome $sobrenome, agora você é um membro do YAS. <br> Seja bem-vindo(a).","Entrar","user-login.php");
        }else{
          echo msg_erro("Opss...","$nome $sobrenome erro no banco na hora de cadastrar.","Tentar Novamente","user-cadastro.php");
        }
        }else{
          echo msg_erro("Opps...","Por favor, insira senhas compatíveis.","Tentar Novamente","user-cadastro.php");
        }
        }
      }
      }
    ?>
  <!--Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.js"> </script>

</body>

</html>