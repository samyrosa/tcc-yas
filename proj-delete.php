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
     $cod = $_GET['cod'] ?? 0;
     $busca = $banco->query("select proj_id from projeto where proj_id='$cod'");

     if(!is_logado()){
      echo msg_erro('Opp..', 'Você precisa estar logado, tente novamente ou se <b><a href="cadastro.php">CADASTRE-SE</a></b>','Tentar Novamente', 'index.php');
     }else{
         if($busca->num_rows>0){
            if($banco->query("delete from projeto where proj_id=$cod")){
              header("Location: index.php");
            }else{
              echo msg_erro($cod, 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
             }
         }else{
          echo msg_erro('Opp..', 'Nenhum arquivo encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
         }
        
     }
     
 ?>

  <!--Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>