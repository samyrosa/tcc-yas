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
  require_once "includes/header.php";
  $cod = $_GET['cod'];
  $tag = $banco->query("SELECT * FROM `tag_proj` where tag_id=$cod");
  $reg_tag=$tag->fetch_object()
  ?>
  <div class="container text-center mt-5">
  <h1><?php  echo $reg_tag->tag_name; ?></h1>
  </div>
  <div class="container text-center mt-5">
  <?php 
  
  $galeria = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img, user_yas.user_first_name, user_yas.user_id, user_yas.user_last_name, user_yas.user_foto, tag.tag_name, tag.tag_id FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id join tag_proj tag on projeto.tag_id=tag.tag_id WHERE tag.tag_id=$cod");
  if(!$galeria){
    echo msg_erro('Opp..','Falha na busca do banco de dados, por favor tente denovo','Tentar Novamente','index.php');
  }else{
    if($galeria->num_rows>0){
      echo "<div class='row row-cols-1 row-cols-md-3 g-3 mt-1'>";
      while($reg_galeria=$galeria->fetch_object()){
        $bg = bg_proj($reg_galeria->proj_back_img);
        $datatime = new DateTime($reg_galeria->proj_data);
        $data= $datatime->format("d / m / y",);
        echo "
          <a href='proj-view.php?cod=$reg_galeria->proj_id'>
            <div class='col'>
              <div class='card position-relative'>
                <img src='$bg' height='250' class='card-img'>
                <div class='mask position-absolute d-flex flex-column justify-content-end align-items-start w-100 h-100 pb-3 ps-3 pe-1 text-white' style='background: var(--yas_color5_gradient);'>
                  $data
                  <h4 class='titulo'>".mb_strimwidth("$reg_galeria->proj_name", 0, 20, "...")."</h4>
                  <p class='descri'>".mb_strimwidth("$reg_galeria->proj_desc", 0, 80, "...")."</p>
                </div>
              </div>
            </div>
          </a>
        ";
      }
      echo "</div>";
    }
    else{
      echo "<br>";
      echo msg_local_avisso("Nenhum registro!!!");
    }
  }
  ?>
  </div>
  <?php
  require "includes/footer.php"
  ?>


  <!--Bootstrap JS -->
  <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>