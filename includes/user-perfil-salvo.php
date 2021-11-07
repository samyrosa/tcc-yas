
<div class="col-12">
    
    <?php
      $galeria = $banco->query("SELECT projeto.proj_data, projeto.proj_id, projeto.proj_name, projeto.proj_desc, projeto.proj_back_img, user_yas.user_first_name, user_yas.user_id, user_yas.user_last_name, user_yas.user_foto FROM salvo_proj salvo_proj join user_yas user_yas on salvo_proj.user_id=user_yas.user_id join projeto projeto on salvo_proj.proj_id=projeto.proj_id WHERE user_yas.user_id= $cod");
      if(!$galeria){
        echo msg_erro('Opp..','Falha na busca do banco de dados, por favor tente denovo','Tentar Novamente','index.php');
      }else{
        if($galeria->num_rows>0){
          echo "<div class='row row-cols-1 row-cols-md-2 g-3 mt-1'>";
          while($reg_galeria=$galeria->fetch_object()){
            $bg = bg_proj($reg_galeria->proj_back_img);
            $datatime = new DateTime($reg_galeria->proj_data);
            $data= $datatime->format("d / m / y",);
            echo "
              <a href='proj-view.php?cod=$reg_galeria->proj_id'>
                <div class='col'>
                  <div class='card position-relative'>
                    <img src='$bg' height='250' class='card-img'>
                    <div class='mask position-absolute d-flex flex-column justify-content-end align-items-start w-100 h-100 pb-3 ps-3 pe-1 text-white' style='background: var(--yas_color5_gradient);'>
                      $data
                      <h4 class='titulo'>".mb_strimwidth("$reg_galeria->proj_name", 0, 20, "...")."</h4>
                      <p class='descri'>".mb_strimwidth("$reg_galeria->proj_desc", 0, 80, "...")."</p>
                    </div>
                  </div>
                </div>
              </a>
            ";
          }
          echo "</div>";
        }
        else{
          echo "<br>";
          echo msg_local_avisso("Nenhum registro!!!");
        }
      }
    ?>
    </div>
</div>

