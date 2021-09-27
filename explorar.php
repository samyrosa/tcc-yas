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

    <div id="yas_pesquisa" class="container mt-5 yas_search">
        <form method="$_GET" action="search.php">
            <input class="form-control me-2 shadow" id="search" type="search" placeholder="Pesquisa..." aria-label="Search" name="pesquisa">
            <button type="submit" id="yas_lupa"><i id="yas_icon_pesquisa" class="bi bi-search"></i></button>
        </form>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <a href="" class="link-dark">
                    <h5 class="yas_font_ligth text-uppercase mb-3 ms-2">CATEGORIAS PRINCIPAIS</h5>
                </a>
            </div>
            <div class="col mx-2 text-center">
                <button type='button' onclick="window.location.href = 'tag.php?cod=16'" class='btn btn-primary btn-lg me-2 shadow '>Arte digital</button>
                <button type='button' onclick="window.location.href = 'tag.php?cod=16'" class='btn btn-primary btn-lg me-2 shadow '>Arte urbana</button>
                <button type='button' onclick="window.location.href = 'tag.php?cod=16'" class='btn btn-primary btn-lg me-2 shadow '>Design de moda</button>
                <button type='button' onclick="window.location.href = 'tag.php?cod=16'" class='btn btn-primary btn-lg me-2 shadow '>Design gráfico</button>
                <button type='button' onclick="window.location.href = 'tag.php?cod=16'" class='btn btn-primary btn-lg me-2 shadow '>Fotografia de beleza</button>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="col-12">
            <a href="" class="link-dark">
                <h5 class="yas_font_ligth text-uppercase mb-3 ms-2">ALGUNS ARTISTAS</h5>
            </a>
        </div>
        <div class='row row-cols-1 row-cols-md-5 g-4 mx-4'>
            <?php
            $busca = $banco->query("SELECT * FROM `user_yas` ORDER BY RAND() LIMIT 4");
            if (!$busca) {
                echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
            } else {
                if ($busca->num_rows > 0) {
                    while ($reg_user = $busca->fetch_object()) {
                        $perfil = img_perfil($reg_user->user_foto);
                        echo "<div class='card mx-4 yas_radius shadow' style='background-color: var(--yas_color1)'>
            <img src='$perfil' width='100' height='100' class=' img-fluid rounded-circle text-center mx-auto mt-3' alt='...'>
            <div class='card-body'>
                <a href='user-perfil.php?cod=$reg_user->user_id' class='link-dark'>
                    <h5 class='card-title mt-2 mb-0 name text-center'>$reg_user->user_first_name $reg_user->user_last_name</h5>
                </a>
                <p class=' text-center card-text'><small class='text-muted text-uppercase'>$reg_user->user_carreira</small></p>
            </div>
        </div>";
                    }
                } else {
                    echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                }
            }
            ?>

        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <a href="" class="link-dark">
                    <h5 class="yas_font_ligth text-uppercase mb-3 ms-2">CATEGORIAS PRINCIPAIS</h5>
                </a>
            </div>
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class='row row-cols-1 row-cols-md-3 g-3 mx-3'>
                    <?php
                    $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img,  user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id   ORDER BY RAND() LIMIT 3");
                    if (!$busca) {
                        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
                    } else {
                        if ($busca->num_rows > 0) {
                            while ($reg = $busca->fetch_object()) {
                                $bg = bg_proj($reg->proj_back_img);
                                $perfil = img_perfil($reg->user_foto);
                                $datatime = new DateTime($reg->proj_data);
                                $data = $datatime->format("d / m / y",);
                                echo "<a href='proj-view.php?cod=$reg->proj_id'>
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
          </a>";
                            }
                        } else {
                            echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="carousel-item">
                <div class='row row-cols-1 row-cols-md-3 g-3 mx-3'>
                    <?php
                    $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img,  user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id   ORDER BY RAND() LIMIT 3");
                    if (!$busca) {
                        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
                    } else {
                        if ($busca->num_rows > 0) {
                            while ($reg = $busca->fetch_object()) {
                                $bg = bg_proj($reg->proj_back_img);
                                $perfil = img_perfil($reg->user_foto);
                                $datatime = new DateTime($reg->proj_data);
                                $data = $datatime->format("d / m / y",);
                                echo "<a href='proj-view.php?cod=$reg->proj_id'>
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
          </a>";
                            }
                        } else {
                            echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="carousel-item">
                <div class='row row-cols-1 row-cols-md-3 g-3 mx-3'>
                    <?php
                    $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img,  user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id   ORDER BY RAND() LIMIT 3");
                    if (!$busca) {
                        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
                    } else {
                        if ($busca->num_rows > 0) {
                            while ($reg = $busca->fetch_object()) {
                                $bg = bg_proj($reg->proj_back_img);
                                $perfil = img_perfil($reg->user_foto);
                                $datatime = new DateTime($reg->proj_data);
                                $data = $datatime->format("d / m / y",);
                                echo "<a href='proj-view.php?cod=$reg->proj_id'>
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
          </a>";
                            }
                        } else {
                            echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="visually-hidden ">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <a href="" class="link-dark">
                    <h5 class="yas_font_ligth text-uppercase mb-3 ms-2">CATEGORIAS PRINCIPAIS</h5>
                </a>
            </div>
        </div>
    </div>
    <div id="carrocel2" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class='row row-cols-1 row-cols-md-3 g-3 mx-3'>
                    <?php
                    $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img,  user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id   ORDER BY RAND() LIMIT 3");
                    if (!$busca) {
                        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
                    } else {
                        if ($busca->num_rows > 0) {
                            while ($reg = $busca->fetch_object()) {
                                $bg = bg_proj($reg->proj_back_img);
                                $perfil = img_perfil($reg->user_foto);
                                $datatime = new DateTime($reg->proj_data);
                                $data = $datatime->format("d / m / y",);
                                echo "<a href='proj-view.php?cod=$reg->proj_id'>
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
          </a>";
                            }
                        } else {
                            echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="carousel-item">
                <div class='row row-cols-1 row-cols-md-3 g-3 mx-3'>
                    <?php
                    $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img,  user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id   ORDER BY RAND() LIMIT 3");
                    if (!$busca) {
                        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
                    } else {
                        if ($busca->num_rows > 0) {
                            while ($reg = $busca->fetch_object()) {
                                $bg = bg_proj($reg->proj_back_img);
                                $perfil = img_perfil($reg->user_foto);
                                $datatime = new DateTime($reg->proj_data);
                                $data = $datatime->format("d / m / y",);
                                echo "<a href='proj-view.php?cod=$reg->proj_id'>
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
          </a>";
                            }
                        } else {
                            echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="carousel-item">
                <div class='row row-cols-1 row-cols-md-3 g-3 mx-3'>
                    <?php
                    $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img,  user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id   ORDER BY RAND() LIMIT 3");
                    if (!$busca) {
                        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
                    } else {
                        if ($busca->num_rows > 0) {
                            while ($reg = $busca->fetch_object()) {
                                $bg = bg_proj($reg->proj_back_img);
                                $perfil = img_perfil($reg->user_foto);
                                $datatime = new DateTime($reg->proj_data);
                                $data = $datatime->format("d / m / y",);
                                echo "<a href='proj-view.php?cod=$reg->proj_id'>
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
          </a>";
                            }
                        } else {
                            echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev " type="button" data-bs-target="#carrocel2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="visually-hidden ">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carrocel2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <a href="" class="link-dark">
                    <h5 class="yas_font_ligth text-uppercase mb-3 ms-2">CATEGORIAS PRINCIPAIS</h5>
                </a>
            </div>
        </div>
    </div>
    <div id="carrocel3" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class='row row-cols-1 row-cols-md-3 g-3 mx-3'>
                    <?php
                    $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img,  user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id   ORDER BY RAND() LIMIT 3");
                    if (!$busca) {
                        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
                    } else {
                        if ($busca->num_rows > 0) {
                            while ($reg = $busca->fetch_object()) {
                                $bg = bg_proj($reg->proj_back_img);
                                $perfil = img_perfil($reg->user_foto);
                                $datatime = new DateTime($reg->proj_data);
                                $data = $datatime->format("d / m / y",);
                                echo "<a href='proj-view.php?cod=$reg->proj_id'>
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
          </a>";
                            }
                        } else {
                            echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="carousel-item">
                <div class='row row-cols-1 row-cols-md-3 g-3 mx-3'>
                    <?php
                    $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img,  user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id   ORDER BY RAND() LIMIT 3");
                    if (!$busca) {
                        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
                    } else {
                        if ($busca->num_rows > 0) {
                            while ($reg = $busca->fetch_object()) {
                                $bg = bg_proj($reg->proj_back_img);
                                $perfil = img_perfil($reg->user_foto);
                                $datatime = new DateTime($reg->proj_data);
                                $data = $datatime->format("d / m / y",);
                                echo "<a href='proj-view.php?cod=$reg->proj_id'>
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
          </a>";
                            }
                        } else {
                            echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="carousel-item">
                <div class='row row-cols-1 row-cols-md-3 g-3 mx-3'>
                    <?php
                    $busca = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img,  user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id   ORDER BY RAND() LIMIT 3");
                    if (!$busca) {
                        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
                    } else {
                        if ($busca->num_rows > 0) {
                            while ($reg = $busca->fetch_object()) {
                                $bg = bg_proj($reg->proj_back_img);
                                $perfil = img_perfil($reg->user_foto);
                                $datatime = new DateTime($reg->proj_data);
                                $data = $datatime->format("d / m / y",);
                                echo "<a href='proj-view.php?cod=$reg->proj_id'>
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
          </a>";
                            }
                        } else {
                            echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev " type="button" data-bs-target="#carrocel3" data-bs-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="visually-hidden ">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carrocel3" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <?php
    require "includes/footer.php"
    ?>

    <!--Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.js"> </script>
    <script src="layout/js/carousel.js"> </script>
</body>

</html>