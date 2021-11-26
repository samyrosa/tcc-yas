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

    $cod = $_GET['cod'] ?? null;
    if (is_logado()) {
        if (!isset($_POST['nomeProj'])) {
            require_once "includes/forms/proj-edit-form.php";
        } else {
            $user = $_SESSION['id'];
            $nome = $_POST['nomeProj'];
            $bg_projet = $_FILES['bg_projet']['name'] ?? null;;
            $array = $_POST['img'] ?? null;;
            $desc = $_POST['desc'] ?? null;;
            $tag = $_POST['tag'] ?? null;;
            $sql = "update projeto set proj_name='$nome', proj_desc='$desc', tag_id='$tag'";
            if (!empty($bg_projet)) {
                $ext = pathinfo($_FILES['bg_projet']['name'], PATHINFO_EXTENSION); //Pegando extensão do arquivo
                $new_name = "YAS-" . date("Y.m.d-H.i.s.") . $ext; //Definindo um novo nome para o arquivo
                $dir = 'upload/img-proj-bg/'; //Diretório para uploads
                move_uploaded_file($_FILES['bg_projet']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
                $sql .= ", proj_back_img='$new_name'";
            }
            $sql .= " where proj_id= '$cod'";
            if ($banco->query($sql)) {
                echo "xx";
            }
            if (!is_null($array)) {
                echo "z";
                for ($i = 0; $i < count($array); ++$i) {
                    if ($banco->query("DELETE FROM `img_proj` WHERE `img_proj`.`img_id` ='" . $array[$i] . "'")) {
                        echo "apagou $array[$i]";
                    } else {
                        exit();
                    }
                }
            }
            header("Location: proj-view.php?cod=$cod");
        }
    } else {
        echo msg_erro("Ops...", "Você não pode acessar essa página.<br> Por favor efetue seu <u><b><a class='link-dark' href='user-login.php'>login</a></u></b> ou <u><b><a class='link-dark' href='user-cadastro.php'>cadastre-se</a></u></b>. ", "Voltar a explorar", "index.php");
    }
    require "includes/footer.php"
    ?>


    <!--Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>