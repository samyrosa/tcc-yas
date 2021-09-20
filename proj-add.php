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

<body>
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
  if (is_logado()) {
    if (!isset($_POST['nomeProj'])) {
      require_once "includes/forms/proj-add-form.html";
    } else {
      echo "ok";
      $user = $_SESSION['id'];
      $data =  date("y-m-d h:m:s");
      $nome = $_POST['nomeProj'] ?? null;
      $desc = $_POST['desc'] ?? null;
      $tag = $_POST['tag'] ?? null;
      $bg_projet = $_FILES['bg_projet']['name'] ?? null;
      $array = $_FILES['files']['name'] ?? null;
      if (empty($nome) || empty($desc) || empty($tag) || empty($bg_projet) || empty($array)) {
        echo msg_erro("Opps...", "Todos os dados são obrigatórios.", "Tentar Novamente", "proj-add.php");
      } else {
        if (isset($_FILES['bg_projet'])) {
          $ext = pathinfo($_FILES['bg_projet']['name'], PATHINFO_EXTENSION); //Pegando extensão do arquivo
          $new_name = date("Y.m.d-H.i.s.") . $ext; //Definindo um novo nome para o arquivo
          $dir = 'upload/image/'; //Diretório para uploads
          move_uploaded_file($_FILES['bg_projet']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
          $bg_projet = $new_name;
          for($x = 0; $x < count($array); $x++){
            print_r(array_values ($array));
          }
        }
      }
    }
  } else {
    echo msg_erro("Ops...", "Você não pode acessar essa página.<br> Por favor efetue seu <u><b><a class='link-dark' href='user-login.php'>login</a></u></b> ou <u><b><a class='link-dark' href='user-cadastro.php'>cadastre-se</a></u></b> para publicar novas projetos . ", "Voltar a explorar", "index.php");
  }
  require "includes/footer.php"
  ?>

  <!--Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>