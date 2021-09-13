<header class='bg-white p-3 shadow text-dark fixed-top'>
  <div class='container'>
    <div class='d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start'>
      <a href='index.php' class='pe-3 d-flex align-items-center mb-2 mb-lg-0 text-decoration-none'>
        <?php require_once 'includes/function/function-svg.php'; yas_logo_resp_2('--yas_color5','--yas_color2', '40'); ?>
      </a>

      <ul class='nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0'>
        <li><a href='index.php' class='nav-link px-2 text-dark'>Início</a></li>
        <li><a href='explorar.php' class='nav-link px-2 text-dark'>Explorar</a></li>
      </ul>
      <?php
          
            if(is_logado()){
              $id=$_SESSION['id'];
              $sql="SELECT user_id, user_foto, user_first_name, user_last_name, user_email FROM user_yas WHERE user_id= $id ";
              $busca = $banco->query("$sql");
              $reg = $busca -> fetch_object();
              $img_perfil= img_perfil($reg->user_foto);
                echo "<div class='dropdown text-end '>
                <a href='user-perfil.php' class='d-block link-dark text-decoration-none dropdown-toggle' id='dropdownUser1' data-bs-toggle='dropdown' aria-expanded='false'>
                  <img src='$img_perfil' alt='mdo' width='32' height='32' class='rounded-circle'>
                </a>
                <ul id='dropdown' class='dropdown-menu shadow dropdown-menu-end m-4' aria-labelledby='dropdownUser1'>
                  <li class='m-2'><a class='dropdown-item-text text-center'><img src='$img_perfil' alt='mdo' width='100' height='100' class='rounded-circle'></a></li>
                  <li> <span class='dropdown-item-text text-center'><h4 class='name'>$reg->user_first_name $reg->user_last_name </h4></span> </li>
                  <li><span class='dropdown-item-text text-muted text-center email'>$reg->user_email</span></li>
                  <li><hr class='dropdown-divider'></li>
                  <li><a class='dropdown-item' href='user-perfil.php?cod=$reg->user_id'><i class='bi bi-person-circle'> </i>Perfil</a></li>
                  <li><a class='dropdown-item' href='user-perfil.php?cod=$reg->user_id&mod=salvos'><i class='bi bi-bookmark'> </i>Salvos</a></li>
                  <li><a class='dropdown-item' href='user-perfil.php?cod=$reg->user_id&mod=insp'><i class='bi bi-star'> </i>Inspirações</a></li>
                  "
                  ?><br>
      <li class="text-center"><button onclick="window.location.href = 'user-logof.php'" type='button'
          class='btn btn-primary mb-2'>&nbsp&nbsp&nbspSair&nbsp&nbsp&nbsp</button></li>
      <?php
                echo "</ul>
              </div>";
            }else{
                ?>
      <div class='text-end'>
        <button onclick="window.location.href = 'user-login.php'" type='button'
          class='btn btn-light px-3 me-2'>Login</button>
        <button onclick="window.location.href = 'user-cadastro.php'" type='button'
          class='btn btn-primary '>Cadastre-se</button>
      </div>
      <?php
            }
        ?>
    </div>
  </div>
</header>
<div class="mt-5">&nbsp</div>