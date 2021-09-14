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
    $cod = $_GET['cod'] ?? null;
    $sql_user = "SELECT * FROM user_yas WHERE user_id= $cod ";
    ?>

    <div class="container mt-5">
        <div class="row">
            <?php

            $busca = $banco->query("$sql_user");
            if (!$busca) {
                echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
            } else {
                if ($busca->num_rows > 0) {
                    while ($reg = $busca->fetch_object()) {
                        $perfil = img_perfil($reg->user_foto);
                        $id = $_SESSION['id'];
                        $img_perfil = img_perfil($reg->user_foto);
                        echo "<div class='col-4 text-center pt-4 5'>
                        <div class='row'>
                            <div class='col-12'>
                                <img src='$img_perfil' alt='mdo' width='180' height='180' class='rounded-circle '>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-12 mt-3 text-center'>";
                        if (is_user()) {
            ?>
                            <button onclick="window.location.href = 'user-edit.php'" type='button' class='btn btn-success btn-sm '><i class="bi bi-pencil-square"></i></button>

                        <?php
                        } else {
                        ?>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#user-inp">
                                <i class="bi bi-bookmark"></i>
                            </button>

                            <div class="modal fade" id="user-inp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Se inpire com a arte </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <?php
                                            $id = $_SESSION['id'];
                                            if($banco->query("INSERT INTO user_insp (user_id, user_save_id) VALUES ('$id', '$cod')")){
                                                echo "$reg->user_first_name $reg->user_last_name foi adicionada a sua lista de inpiraçoes";
                                            }else{
                                                echo "Não foi posivel adicionar $reg->user_first_name $reg->user_last_name, ha sua lista de inpiraçoes";
                                            }
                                        ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary data-bs-dismiss="modal"">&nbsp&nbspOK&nbsp&nbsp</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

            <?php
                        echo "</div>
                </div>
                <div class='row border-bottom border-2 mx-4 mt-2'>
                    <div class='col-12 '>
                        <h3 class='name'>$reg->user_first_name $reg->user_last_name</h3>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-12'>
                        <h5 class='text-muted text-uppercase mt-2'>$reg->user_carreira</h5>
                    </div>
                </div>
            </div>";
                    }
                } else {
                    echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                }
            }
            ?>
            <div class="col-8">
                <div class="col-12">
                    <div class="row pb-2 border-bottom border-2">
                        <div class="col-9">
                            <button onclick="window.location.href = 'user-perfil.php?cod=<?php echo $cod; ?>'" type='button' class='btn btn-primary btn-sm me-4 px-4'>GALERIA</button>
                            <button onclick="window.location.href = 'user-perfil.php?cod=<?php echo $cod; ?>&mod=mim'" type='button' class='btn btn-primary btn-sm me-4 px-3'>SOBRE MIM</button>
                            <?php
                            if (is_user()) {
                            ?>
                                <button onclick="window.location.href = 'user-perfil.php?cod=<?php echo $cod; ?>&mod=salvos'" type='button' class='btn btn-primary btn-sm me-4 px-3'>SALVOS</button>
                                <button onclick="window.location.href = 'user-perfil.php?cod=<?php echo $cod; ?>&mod=insp'" type='button' class='btn btn-primary btn-sm me-4 px-3'>INSPIRAÇÕES</button>
                            <?php } ?>
                        </div>
                        <div class="col-3 text-end">
                            <?php
                            if (is_user()) {
                            ?>
                                <button onclick="window.location.href = 'add-proj.php'" type='button' class='btn btn-success btn-sm px-3'>+PROJETOS</button>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <?php
                $mod = $_GET['mod'] ?? null;
                switch ($mod) {
                    case "mim":
                        require "includes/user-perfil-mim.php";
                        break;
                    case "salvos":
                        break;
                    case "insp":
                        require "includes/user-perfil-insp.php";
                        break;
                    default:
                        require "includes/user-perfil-galeria.php";
                }
                ?>
            </div>
        </div>

    </div>

    <?php
    require "includes/footer.php"
    ?>

    <!--Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.js"> </script>
</body>

</html>