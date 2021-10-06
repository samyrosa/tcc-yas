<?php
$ordem = $_GET['ordem'] ?? null;
$sql = "SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img, user_yas.user_first_name, user_yas.user_last_name, user_yas.user_foto FROM projeto projeto join user_yas user_yas on projeto.user_id=user_yas.user_id";
switch ($ordem) {
  case "recente":
    $sql .= " order by projeto.proj_data desc";
    break;
  case "antigo":
    $sql .= " order by projeto.proj_data asc";
    break;
  default:
    $sql .= " order by rand()";
}
?>

<div id="yas_pesquisa" class="container mt-5 yas_search">
  <form method="$_GET" action="search.php">
    <input class="form-control me-2 shadow" id="search" type="search" placeholder="Pesquisa..." aria-label="Search" name="pesquisa">
    <button type="submit" id="yas_lupa"><i id="yas_icon_pesquisa" class="bi bi-search"></i></button>
    <div class="text-center mt-4">
      <button onclick="window.location.href = 'index.php'" type='button' class='btn btn-primary btn-sm me-4 px-4'>Todos</button>
      <button onclick="window.location.href = 'index.php?ordem=recente'" type='button' class='btn btn-primary btn-sm me-4 px-3'>Recentes</button>
      <button onclick="window.location.href = 'index.php?ordem=antigo'" type='button' class='btn btn-primary btn-sm me-4 px-3'>Antigos</button>
    </div>
  </form>
</div>


<div class="container mt-5">
  <?php
  $busca = $banco->query($sql);
  if (!$busca) {
    echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
  } else {
    if ($busca->num_rows > 0) {
      echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
      while ($reg = $busca->fetch_object()) {
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
                      <span class='name'><img src='$perfil' alt='mdo' width='32' height='32' class='rounded-circle Pfoto'> $reg->user_first_name $reg->user_last_name</span>
                    </div>
                  </div>
                </div>
              </a>
            ";
      }
      echo "</div>";
    } else {
      echo msg_local_avisso("Nenhum registro!!!");
    }
  }
  ?>
</div>