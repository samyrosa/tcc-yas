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
        require_once "includes/header.php";;
        $cod = $_GET['cod'] ?? null;
        $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_back_img, projeto.proj_id, user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, projeto.proj_name, projeto.proj_desc, tag.tag_name from projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id join tag_proj tag on projeto.tag_id=tag.tag_id where projeto.proj_id='$cod'");
 
        ?>

    <div class="container mt-5">
        <?php
    if (!$busca) {
        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
    } else {
    if ($busca->num_rows > 0) {
        $reg = $busca->fetch_object();
       ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-5">
                    <?php
                        $foto= bg_proj($reg->proj_back_img);
                        $perfil = img_perfil($reg->user_foto);
                     ?>
                    <img class="rounded-3 img-detalhe" src="<?php echo $foto ?>" width='450' height='280'>
                </div>
                <div class="col-7 ps-5">
                    <?php
                    if (is_user()) {
                    ?>
                    <button onclick="window.location.href = 'user-edit.php?cod=<?php echo $cod;?>'" type='button'
                        class='btn btn-success btn-sm '><i class="bi bi-pencil-square"></i>Editar</button>
                    <?php
            } else {
            ?>
                    <button onclick="window.location.href = 'user-edit.php?cod=<?php echo $cod;?>'" type='button'
                        class='btn btn-primary btn-sm '><i class="bi bi-star"></i> Salvar</button>
                    <?php
            }
            ?>
                    <h2><?php echo $reg->proj_name?></h2>
                    <h5 class="yas_font_ligth"><?php echo $reg->tag_name?></h5>
                    <h5 class="yas_font_ligth"><?php echo $reg->proj_data?></h5>
                    <h5 class="yas_font_ligth"><?php echo $reg->proj_desc?></h5>
                    <h5 class="text-uppercase">
                        <?php echo "<img src='$perfil' alt='mdo' width='32' height='32' class='rounded-circle'> $reg->user_first_name&nbsp$reg->user_last_name"?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h5 class="yas_font_ligth text-uppercase">galeria do projeto</h5>
        </div>
        <?php
      }
else {
      echo msg_local_avisso("Nenhum registro!!!");
    }
  }
  ?>
    </div>
    <!--Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>