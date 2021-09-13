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
                    <button onclick="window.location.href = 'user-edit.php'" type='button' class='btn btn-success btn-sm '><i class="bi bi-pencil-square"></i></button>
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
                            <button onclick="window.location.href = 'user-perfil.php'" type='button' class='btn btn-primary btn-sm me-4 px-4'>GALERIA</button>
                            <button onclick="window.location.href = 'user-perfil.php?ordem=mim'" type='button' class='btn btn-primary btn-sm me-4 px-3'>SOBRE MIM</button>
                            <button onclick="window.location.href = 'user-perfil.php?ordem=salvos'" type='button' class='btn btn-primary btn-sm me-4 px-3'>SALVOS</button>
                            <button onclick="window.location.href = 'user-perfil.php?ordem=insp'" type='button' class='btn btn-primary btn-sm me-4 px-3'>INSPIRAÇÕES</button>
                        </div>
                        <div class="col-3 text-end">
                            <button onclick="window.location.href = 'add-proj.php'" type='button' class='btn btn-success btn-sm px-3'>+PROJETOS</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <h5 class="text-uppercase">descrição</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sapien sociosqu, bibendum leo pretium maximus himenaeos netus vel sem tincidunt, nec quisque lectus orci phasellus consequat aptent ac</p>

                </div>
                <div class="col-12 mt-4">
                    <h5 class="text-uppercase">contato</h5>
                    <a class="link-dark" href="mailto:m.bluth@example.com">e-mai.contato@gmail.com</a>
                    <br>
                    <a  class="link-dark" href="https://api.whatsapp.com/send?phone=15551234567">(00) 0000-0000</a>
                    <br>
                    <a class="link-dark" href="tel:+123456789">(00) 0000-0000</a>
                </div>
                <div class="col-12 mt-4">
                    <h5 class="text-uppercase">redes sociais</h5>
                    <a class="link-dark" href="https://www.instagram.com/schiaparelli/">@schiaparelli</a>
                    <br>
                    <a class="link-dark" href="https://twitter.com/ChloeBailey">@ChloeBailey</a>
                    <br>
                    <a class="link-dark link_save" href="https://example.com">Website</a>
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