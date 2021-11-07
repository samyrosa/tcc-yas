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
                            $foto = bg_proj($reg->proj_back_img);
                            $perfil = img_perfil($reg->user_foto);
                            ?>
                            <img class="rounded-3 img-detalhe" src="<?php echo $foto ?>" width='450' height='280'>
                        </div>
                        <div class="col-7 ps-5">
                            <?php
                            if (is_logado()) {


                            ?>
                                <?php

                                if (is_user($reg->user_id)) {
                                ?>
                                    <button onclick="window.location.href = 'proj-edit.php?cod=<?php echo $reg->proj_id ?>'" type='button' class='btn btn-success btn-sm mb-2 '><i class="bi bi-pencil-square"></i>Editar</button>
                                <?php
                                } else {
                                    $logadocod = $_SESSION['id'] ?? 0;
                                    $buscaSalvo = $banco->query("SELECT * from salvo_proj WHERE  proj_id='$cod' and user_id='$logadocod'");
                                    if (!is_logado()) {
                                        echo msg_erro('Opp..', 'Você precisa estar logado, tente novamente ou se <b><a href="cadastro.php">CADASTRE-SE</a></b>', 'Tentar Novamente', 'index.php');
                                    } else {
                                        if ($buscaSalvo->num_rows > 0) {
                                            ?>
                                            <button onclick="window.location.href = 'proj-save.php?Scod=<?php echo $cod; ?>'" type='button' class='btn btn-primary btn-sm '>
                                        <i class="bi bi-star-fill"></i> Salvo
                                    </button>
                                            <?php
                                        } else {
                                            ?>
                                            <button onclick="window.location.href = 'proj-save.php?Scod=<?php echo $cod; ?>'" type='button' class='btn btn-success btn-sm '>
                                        <i class="bi bi-star"></i> salvar
                                    </button>
                                            <?php
                                        }
                                    } 
                                }
                                ?>
                            <?php
                            }
                            ?>
                            <h2 class="text-uppercase"><?php echo $reg->proj_name ?></h2>
                            <h5 class="yas_font_ligth"><?php echo $reg->tag_name ?></h5>
                            <?php $datatime = new DateTime($reg->proj_data);
                            $data= $datatime->format("d / m / y",); ?>
                            <h5 class="yas_font_ligth"><?php echo $data ?></h5>
                            <h5 class="yas_font_ligth"><?php echo mb_strimwidth("$reg->proj_desc", 0, 160, "...") ?></h5>
                            <h5 class="name mt-3">
                                <a class="link-dark" href="user-perfil.php?cod=<?php echo $reg->user_id ?>"><?php echo "<img src='$perfil' alt='mdo' width='32' height='32' class='rounded-circle Pfoto'> $reg->user_first_name&nbsp$reg->user_last_name" ?></a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="container mt-5">
                    <h5 class="yas_font_ligth text-uppercase">galeria</h5>
                    <div id="grid">
                        <?php
                        $f=0;
                        $imgId=$reg->proj_id;
                        $img = $banco->query("SELECT * from img_proj where proj_id='$imgId'");
                        while ($regimg = $img->fetch_object()) {
                            $imgproj=img_proj($regimg->proj_img);
                            if($f % 2 == 0){
                                echo"<img class='span-2' src='$imgproj'>";
                            }else{
                                echo"<img src='$imgproj'>";
                            }
                            $f++;
                        }
                        ?>
                    </div>
                </div>
        <?php
            } else {
                echo msg_local_avisso("Nenhum registro!!!");
            }
        }
        if(is_adimin()){
            echo "delete proj";
        }
        ?>
        
    </div>

    <?php         require "includes/footer.php"
 ?>

    <!--Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>