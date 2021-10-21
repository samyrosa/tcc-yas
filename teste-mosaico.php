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
    <style>
        #grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-auto-rows: minmax(100px, auto);
            grid-auto-flow: dense;
            grid-column-gap: .6em;
            grid-row-gap: .6em;
            margin: 20px 0 0 0;
        }

        #grid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .span-2 {
            grid-column-end: span 1;
            grid-row-end: span 2;
        }
    </style>
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
        $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_back_img, projeto.proj_id, projeto.user_id, user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, projeto.proj_name, projeto.proj_desc, tag.tag_name from projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id join tag_proj tag on projeto.tag_id=tag.tag_id where projeto.proj_id='$cod'");
 
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
                        if(is_logado()){

                        
                    ?>
                    <?php
                    if (is_user()) {
                    ?>
                    <button onclick="window.location.href = 'proj-edit.php?cod=<?php echo $reg->proj_id?>'"
                        type='button' class='btn btn-success btn-sm mb-2 '><i
                            class="bi bi-pencil-square"></i>Editar</button>
                    <?php
            } else {
            ?>
                    <button onclick="window.location.href = '#'" type='button' class='btn btn-primary btn-sm mb-2'><i
                            class="bi bi-star"></i> Salvar</button>
                    <?php
            }
            ?>
                    <?php
                        }
            ?>
                    <h2 class="text-uppercase"><?php echo $reg->proj_name?></h2>
                    <h5 class="yas_font_ligth"><?php echo $reg->tag_name?></h5>
                    <h5 class="yas_font_ligth"><?php echo $reg->proj_data?></h5>
                    <h5 class="yas_font_ligth"><?php echo mb_strimwidth("$reg->proj_desc", 0, 160, "...") ?></h5>
                    <h5 class="name mt-3">
                        <a class="link-dark"
                            href="user-perfil.php?cod=<?php echo $reg->user_id?>"><?php echo "<img src='$perfil' alt='mdo' width='32' height='32' class='rounded-circle Pfoto'> $reg->user_first_name&nbsp$reg->user_last_name"?></a>
                    </h5>
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5">
            <h5 class="yas_font_ligth text-uppercase">galeria do projeto</h5>
            <div id="grid">
                <img class="span-2 "
                    src="https://followthecolours.com.br/ezoimgfmt/i2.wp.com/followthecolours.com.br/wp-content/uploads/2020/04/lili-oliveira-follow-the-colours-7.jpg?ezimgfmt=ng%3Awebp%2Fngcb1%2Frs%3Adevice%2Frscb1-2&resize=620%2C620&ssl=1">
                <img src="https://i.pinimg.com/originals/70/62/1b/70621bb7d9773f88e0f79fe31cf0e831.jpg">
                <img class="span-2"
                    src="https://cdn.domestika.org/c_fit,dpr_auto,f_auto,t_base_params,w_820/v1596139259/content-items/005/364/874/Despir-se_de_si_mesma_-_Apolonnia_Studio-original.jpg?1596139259">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYYXhnN7d7r_8u3ah6bbwdCt9EZRkUTUAJJxr2HL2x5miqoFGzuyuoPTs9RMyB5li9nqA&usqp=CAU">
                <img class="span-2" src="https://pbs.twimg.com/media/Edt70ZkWAAEGEw5.jpg">
                <img class="span-2"
                    src="http://d3ugyf2ht6aenh.cloudfront.net/stores/937/655/products/poster-colagem-digital-malala1-46dd503eb9f23fa28315891216624221-640-0.jpg">
                <img
                 src="data:image/jpeg;base64,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">
                <img
                    src="http://d3ugyf2ht6aenh.cloudfront.net/stores/937/655/products/poster-colagem-digital-maya-angelou-cartaz1-de5c860ea129b8289715891210209389-640-0.jpg">

            </div>

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