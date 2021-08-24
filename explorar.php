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
        @media (max-width: 767px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* medium and up screens */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
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
            <div class="col mx-2">
                <button type="button" class="btn btn-primary btn-lg me-1">Large button</button>
                <button type="button" class="btn btn-primary btn-lg me-1">Large button</button>
                <button type="button" class="btn btn-primary btn-lg me-1">Large button</button>
                <button type="button" class="btn btn-primary btn-lg me-1">Large button</button>
                <button type="button" class="btn btn-primary btn-lg me-1">Large button</button>
                <button type="button" class="btn btn-primary btn-lg me-1">Large button</button>
                <button type="button" class="btn btn-primary btn-lg me-1">Large button</button>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="col-12">
            <a href="" class="link-dark">
                <h5 class="yas_font_ligth text-uppercase mb-3 ms-2">ALGUNS ARTISTAS</h5>
            </a>
        </div>
        <div class='row row-cols-1 row-cols-md-5 g-4'>
            <div class="card mx-4 yas_radius " style='background-color: var(--yas_color1)'>
                <img src="layout/image/user-yas.png" width='100' height='100' class=" img-fluid rounded-circle text-center mx-auto mt-3" alt="...">
                <div class='card-body'>
                    <a href='user-cadastro.php' class='link-dark'>
                        <h5 class='card-title mt-2 mb-0 name text-center'>samuel rosa</h5>
                    </a>
                    <p class='card-text'><small class='text-muted text-uppercase text-center'>$reg->user_carreira</small></p>
                </div>
            </div>
            <div class="card mx-4 yas_radius " style='background-color: var(--yas_color1)'>
                <img src="layout/image/user-yas.png" width='100' height='100' class=" img-fluid rounded-circle text-center mx-auto mt-3" alt="...">
                <div class='card-body'>
                    <a href='user-cadastro.php' class='link-dark'>
                        <h5 class='card-title mt-2 mb-0 name text-center'>samuel rosa</h5>
                    </a>
                    <p class='card-text'><small class='text-muted text-uppercase text-center'>$reg->user_carreira</small></p>
                </div>
            </div>
            <div class="card mx-4 yas_radius " style='background-color: var(--yas_color1)'>
                <img src="layout/image/user-yas.png" width='100' height='100' class=" img-fluid rounded-circle text-center mx-auto mt-3" alt="...">
                <div class='card-body'>
                    <a href='user-cadastro.php' class='link-dark'>
                        <h5 class='card-title mt-2 mb-0 name text-center'>samuel rosa</h5>
                    </a>
                    <p class='card-text'><small class='text-muted text-uppercase text-center'>$reg->user_carreira</small></p>
                </div>
            </div>
            <div class="card mx-4 yas_radius " style='background-color: var(--yas_color1)'>
                <img src="layout/image/user-yas.png" width='100' height='100' class=" img-fluid rounded-circle text-center mx-auto mt-3" alt="...">
                <div class='card-body'>
                    <a href='user-cadastro.php' class='link-dark'>
                        <h5 class='card-title mt-2 mb-0 name text-center'>samuel rosa</h5>
                    </a>
                    <p class='card-text'><small class='text-muted text-uppercase text-center'>$reg->user_carreira</small></p>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <a href="" class="link-dark">
                    <h5 class="yas_font_ligth text-uppercase mb-3 ms-2">CATEGORIAS PRINCIPAIS</h5>
                </a>
            </div>
            <div class="col mx-2">
                <div class="container text-center my-3">
                    <div class="row mx-auto my-auto justify-content-center">
                        <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                                            </div>
                                            <div class="card-img-overlay">Slide 1</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src="//via.placeholder.com/500x400/e66?text=2" class="img-fluid">
                                            </div>
                                            <div class="card-img-overlay">Slide 2</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src="//via.placeholder.com/500x400/7d2?text=3" class="img-fluid">
                                            </div>
                                            <div class="card-img-overlay">Slide 3</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src="//via.placeholder.com/500x400?text=4" class="img-fluid">
                                            </div>
                                            <div class="card-img-overlay">Slide 4</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src="//via.placeholder.com/500x400/aba?text=5" class="img-fluid">
                                            </div>
                                            <div class="card-img-overlay">Slide 5</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src="//via.placeholder.com/500x400/fc0?text=6" class="img-fluid">
                                            </div>
                                            <div class="card-img-overlay">Slide 6</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                        </div>
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
    <script src="layout/js/carousel.js"> </script>
</body>

</html>