<?php
require_once "includes/connection-bd.php";
require_once "includes/function/function-login.php";
require_once "includes/function/function-password.php";
require_once "includes/function/function-msg.php";
require_once "includes/function/function-img.php";
$cod = $_SESSION['id'] ?? 0;
$Scod = $_GET['salvoId'] ?? 0;
$busca = $banco->query("SELECT * from user_insp WHERE  user_save_id='$Scod' and user_id='$cod'");

if (!is_logado()) {
  echo msg_erro('Opp..', 'Você precisa estar logado, tente novamente ou se <b><a href="cadastro.php">CADASTRE-SE</a></b>', 'Tentar Novamente', 'index.php');
} else {
  if ($busca->num_rows > 0) {
    if ($banco->query("delete from user_insp WHERE  user_save_id='$Scod' and user_id='$cod'")) {

      header("Location: user-perfil.php?cod=$Scod");
    } else {
      echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
    }
  } else {
    if ($banco->query("INSERT INTO user_insp (user_save_id, user_id) VALUES ($Scod,$cod)")) {

      header("Location: user-perfil.php?cod=$Scod");
    } else {
      echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
    }
  }
}
