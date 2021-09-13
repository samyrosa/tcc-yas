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
    ?>
  <?php
    require_once "includes/header.php";
    ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-6">
        akjsdhadjk
      </div>
      <div class="col-6">
        <label for="nomeProj">Nome do Projeto</label><input class="form-control shadow " type="text" name="nomeProj"
          id="nomeProj" size="30" maxlength="30">
        <label for="descricao">Descrição</label><textarea class="form-control shadow " id="descricao"
          style="height: 100px"></textarea>

        <select class="form-select shadow mt-3" aria-label="Default select example">
          <option selected>Tag</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>

      </div>
    </div>
  </div>

  <div class="container mt-5">
    upload
  </div>


  <!--Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>