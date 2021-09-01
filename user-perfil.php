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
            <div class="col-4 text-center pt-4 5">
                <div class="row">
                    <div class="col-12">
                        <img src='layout/image/user-yas.png' alt='mdo' width='180' height='180' class='rounded-circle '>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 text-center">
                    <button onclick="window.location.href = 'index.php'" type='button' class='btn btn-success btn-sm '><i class="bi bi-pencil-square"></i></button>
                    </div>
                </div> 
                <div class="row border-bottom border-2 mx-4 mt-2">
                    <div class="col-12 ">
                       <h3 class="name">Thais linda</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <h5 class="text-muted text-uppercase mt-2">ocupação</h5> 
                    </div>
                </div> 
            </div>
            <div class="col-8">
                <div class="col-12">
                    <div class="row pb-2 border-bottom border-2">
                        <div class="col-9">
                            <button onclick="window.location.href = 'index.php'" type='button' class='btn btn-primary btn-sm me-4 px-4'>GALERIA</button>
                            <button onclick="window.location.href = 'index.php?ordem=recente'" type='button' class='btn btn-primary btn-sm me-4 px-3'>SOBRE MIM</button>
                            <button onclick="window.location.href = 'index.php?ordem=antigo'" type='button' class='btn btn-primary btn-sm me-4 px-3'>SALVOS</button>
                            <button onclick="window.location.href = 'index.php?ordem=antigo'" type='button' class='btn btn-primary btn-sm me-4 px-3'>INSPIRAÇÕES</button>
                        </div>
                        <div class="col-3 text-end">
                            <button onclick="window.location.href = 'index.php?ordem=antigo'" type='button' class='btn btn-success btn-sm px-3'>+PROJETOS</button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class='row row-cols-1 row-cols-md-2 g-3 mt-1'>
                        <a href='view-proj.php?cod=$reg->proj_id'>
                            <div class='col'>
                                <div class='card position-relative'>
                                    <img src='$bg' height='250' class='card-img'>
                                    <div class='mask position-absolute d-flex flex-column justify-content-end align-items-start w-100 h-100 pb-3 ps-3 pe-1 text-white' style='background: var(--yas_color5_gradient);'>
                                        $data
                                        <h4 class='titulo'>" . mb_strimwidth("$reg->proj_name", 0, 20, "...") . "</h4>
                                        <p class='descri'>" . mb_strimwidth("$reg->proj_desc", 0, 80, "...") . "</p>
                                        <span class='name'><img src='$perfil' alt='mdo' width='32' height='32' class='rounded-circle'> $reg->user_first_name $reg->user_last_name</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
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