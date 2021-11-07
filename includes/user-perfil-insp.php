<div class="col-12">
  <div class='row '>
    <?php
    $user = $banco->query("SELECT user_save_id FROM `user_insp` WHERE user_id = '$cod'");
    while ($reg_id = $user->fetch_object()) {
      $inp_id = $reg_id->user_save_id;
      $busca = $banco->query("SELECT * FROM user_yas WHERE user_id = '$inp_id';");

      if (!$busca) {
        echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
      } else {
        if ($busca->num_rows > 0) {
          while ($reg_user = $busca->fetch_object()) {
            $perfil = img_perfil($reg_user->user_foto);
            echo "<div class='card mt-5 border-0'>
          <div class='row '>
              <div class='col-md-3 pe-0 w-auto'>
                  <img src='$perfil' width='100' height='100' class='Pfoto rounded-circle' alt='...'>
              </div>
              <div class='col-md-8 ps-0 ms-0'>
                  <div class='card-body'>
                  <a href='user-perfil.php?cod=$reg_user->user_id' class='link-dark'><h5 class='card-title mt-2 mb-0 name'>$reg_user->user_first_name $reg_user->user_last_name</h5></a>
                      
                      <p class='card-text'><small class='text-muted text-uppercase'>$reg_user->user_carreira</small></p>
                  </div>
              </div>
          </div>
      </div>";
          }
        } else {
          // echo msg_erro('Opps..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
        }
      }
    }

    ?>

  </div>
</div>