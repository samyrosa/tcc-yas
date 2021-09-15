<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Crie seu projeto</title>
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

<body >
  <?php
      require_once "includes/connection-bd.php";
      require_once "includes/function/function-login.php";
      require_once "includes/function/function-password.php";
      require_once "includes/function/function-msg.php";
      require_once "includes/function/function-img.php";
    ?>
  <?php
    require_once "includes/header.php";
    ?>
  <?php
        if(is_logado()){
          if(!isset($_POST['nomeProj'])){
            require_once "includes/forms/proj-add-form.html";
        }else{
          echo"ok";
          $array =$_FILES['files']['name'];
          print_r(array_values ($array));
        }
        }
        else{
          echo msg_erro("Ops...","Você não pode acessar essa página.<br> Por favor efetue seu <u><b><a class='link-dark' href='user-login.php'>login</a></u></b> ou <u><b><a class='link-dark' href='user-cadastro.php'>cadastre-se</a></u></b> para publicar novas projetos . ","Voltar a explorar","index.php");
        }
        require "includes/footer.php"
      ?>

  <!--Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>