<?php
    $cod = $_SESSION['id'] ?? 0;
    $Scod = $_GET['salvo_id'] ?? 0;
    $busca = $banco->query("SELECT * from user_insp WHERE  user_save_id like %'$Scod'% and user_id='$cod'");

    if(!is_logado()){
        echo msg_erro('Opp..', 'Você precisa estar logado, tente novamente ou se <b><a href="cadastro.php">CADASTRE-SE</a></b>','Tentar Novamente', 'index.php');
       }else{
           if($busca->num_rows<0){
              if($banco->query("INSERT INTO user_insp (user_save_id, user_id) VALUES ($Scod,$cod)") ){
                
                header("Location: user-perfil.php?cod=$cod&mod=insp");
              }else{
                echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
               }
           }else{
            echo msg_erro('Opp..', 'Nenhum arquivo encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
           }
          
       }
?>