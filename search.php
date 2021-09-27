<?php
$pesquisa = $_GET['pesquisa'] ?? null;
$cond = $_GET['cond'] ?? null;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Pesquisa de: <?php echo $pesquisa; ?></title>
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

  if (empty($pesquisa)) {
    header("Location: explorar.php");
  } else {
    $sql_1 = "SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img, user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto, user_yas.user_carreira, user_yas.user_id FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id ";
    $sql_2 = "SELECT tag_id,tag_name FROM tag_proj where tag_name like '%$pesquisa%'";
    switch ($cond) {
      case "artista":
        $sql_1 .= " WHERE user_yas.user_first_name LIKE '%$pesquisa%' OR user_yas.user_last_name LIKE '%$pesquisa%' OR user_yas.user_carreira LIKE '%$pesquisa%'";

        break;
      default:
        $sql_1 .= " WHERE projeto.proj_name LIKE '%$pesquisa%'";
    }
  }
  ?>
  <?php
  require_once "includes/header.php";
  ?>

  <div id="yas_pesquisa" class="container mt-5 yas_search">
    <form method="$_GET" action="search.php">
      <input class="form-control me-2 shadow" id="search" type="search" placeholder="Pesquisa..." aria-label="Search" name="pesquisa" value="<?php echo $pesquisa ?>">
      <button type="submit" id="yas_lupa"><i id="yas_icon_pesquisa" class="bi bi-search"></i></button>
    </form>
  </div>

  <div class="container mt-5 ">
    <div class="row">
      <div class="col-12 border-bottom border-2 pb-2">
        <div class="row">
          <div class="col-6 mt-2">
            <h5 class="yas_font_ligth text-uppercase mb-0">RESULTADO PARA: <?php echo $pesquisa ?></h5>
          </div>
          <div class="col-6  text-end">
            <button onclick="window.location.href = 'search.php?pesquisa=<?php echo $pesquisa ?>&cond=projeto'" type='button' class='btn btn-primary btn-sm  me-2 px-3'><i class="bi bi-grid-fill"></i> Galeria</button>
            <button onclick="window.location.href = 'search.php?pesquisa=<?php echo $pesquisa ?>&cond=artista'" type='button' class='btn btn-primary btn-sm me-1 px-3'><i class="bi bi-person-fill"></i> Artistas</button>
          </div>
        </div>
      </div>
      <div class="col-12 mt-2">
        <?php
        $busca = $banco->query($sql_2);
        if (!$busca) {
          echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
        } else {
          if ($busca->num_rows > 0) {
            echo "<p class='ms-1'>
            <span class='yas_font_bold'>Categorias: </span> &nbsp";

            while ($reg = $busca->fetch_object()) {
              echo "<a href='tag.php?cod=$reg->tag_id' class='link-dark'><u>$reg->tag_name</u></a> &nbsp";
            }
          }
          echo "</p>";
        }
        ?>

      </div>
    </div>
    <div class="col-12">

      <?php
      $proj = $banco->query($sql_1);
      if (!$proj) {
        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
      } else {
        if ($cond === "artista") {
          if ($proj->num_rows > 0) {
            echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
            while ($reg = $proj->fetch_object()) {
              $perfil = img_perfil($reg->user_foto);
              echo "
              <div class='card mt-5 border-0'>
              <div class='row '>
                  <div class='col-md-3 pe-0'>
                      <img src='$perfil' width='100' height='100' class='img-fluid rounded-circle' alt='...'>
                  </div>
                  <div class='col-md-8 ps-0 ms-0'>
                      <div class='card-body'>
                      <a href='user-perfil.php?cod=$reg->user_id' class='link-dark'><h5 class='card-title mt-2 mb-0 name'>$reg->user_first_name $reg->user_last_name</h5></a>
                          
                          <p class='card-text'><small class='text-muted text-uppercase'>$reg->user_carreira</small></p>
                      </div>
                  </div>
              </div>
          </div>
          ";
            }
            echo "</div>";
          } else {
            echo msg_local_avisso("nenhum resoldado para $pesquisa");
          }
        } else {
          if ($proj->num_rows > 0) {
            echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
            while ($reg = $proj->fetch_object()) {
              $bg = bg_proj($reg->proj_back_img);
              $perfil = img_perfil($reg->user_foto);
              $datatime = new DateTime($reg->proj_data);
              $data = $datatime->format("d / m / y",);
              echo "
                <a href='proj-view.php?cod=$reg->proj_id'>
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
              ";
            }
            echo "</div>";
          } else {
            echo msg_local_avisso("nenhum resoldado para $pesquisa");
          }
        }
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