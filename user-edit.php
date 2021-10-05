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

<body style="background-color:#204b3d;">
    <?php
    require_once "includes/connection-bd.php";
    require_once "includes/function/function-login.php";
    require_once "includes/function/function-password.php";
    require_once "includes/function/function-msg.php";
    require_once "includes/function/function-img.php";

    ?>
    <?php
    require_once "includes/header.php";
    $cod = $_SESSION['id'] ?? null;
    if (is_logado()) {
        if (!isset($_POST['nome'])) {
            require_once "includes/forms/user-edit-form.php";
        } else {
            $nome = $_POST['nome'] ?? null;
            $sobrenome = $_POST['sobrenome'] ?? null;
            $ocupacao = $_POST['ocupacao'] ?? null;
            $desc = $_POST['descricao'] ?? null;
            $email = $_POST['cont-email'] ?? null;
            $telefone = $_POST['phone'] ?? null;
            $whatsapp = $_POST['whatsapp'] ?? null;
            $insta = $_POST['insta'] ?? null;
            $twitter = $_POST['twitter'] ?? null;
            $link = $_POST['link'] ?? null;
            $foto = $_FILES['userfoto'] ?? null;
            $id= $_SESSION['id'];

            $q = "update user_yas set user_first_name='$nome', user_last_name='$sobrenome', user_carreira='$ocupacao', user_desc='$desc',
                user_email_cont='$email', user_telefone_cont='$telefone', user_whatsapp_cont='$whatsapp', social_insta='$insta', 
                social_twitter='$twitter', social_url='$link', ";
            if (!empty($foto) || !is_null($foto)) {
                    $ext = pathinfo($_FILES['userfoto']['name'], PATHINFO_EXTENSION); //Pegando extensão do arquivo
                    $new_name = "YAS-" . date("Y.m.d-H.i.s.") . $ext; //Definindo um novo nome para o arquivo
                    $dir = 'upload/img-user/'; //Diretório para uploads
                    move_uploaded_file($_FILES['userfoto']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
                    echo "$new_name";
                    $q .= " user_foto='$new_name'";
            }
            $q .= " where user_id = '$id'";
            echo "$q";
            if ($banco->query($q)) {
                echo msg_sucesso("Parabéns...", "$nome $sobrenome, seus dados foram alterados com sucesso.", "Voltar a Explorar", "index.php");
            }
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