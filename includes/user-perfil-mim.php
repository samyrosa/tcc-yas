<?php
$busca = $banco->query("$sql_user");
if (!$busca) {
    echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
} else {
    if ($busca->num_rows > 0) {
        while ($reg = $busca->fetch_object()) {
            if (empty($reg->user_desc) || is_null($reg->user_desc)) {
            } else {
                echo "<div class='col-12 mt-4'>
                <h5 class='text-uppercase'>descrição</h5>
                <p class='descri'>$reg->user_desc</p>
            </div>";
            }
            if (
                empty($reg->user_email_cont) || is_null($reg->user_email_cont)
                && empty($reg->user_whatsapp_cont) || is_null($reg->user_whatsapp_cont)
                && empty($reg->user_telefone_cont) || is_null($reg->user_telefone_cont)
            ) {
            } else {
                echo "<div class='col-12 mt-4'>
                <h5 class='text-uppercase'>contato</h5>
                ";
            if (empty($reg->user_email_cont) || is_null($reg->user_email_cont)) {
            } else {
                echo " <a class='link-dark' href='mailto:$reg->user_email_cont'>$reg->user_email_cont</a>
                <br>";
            }
            if (empty($reg->user_whatsapp_cont) || is_null($reg->user_whatsapp_cont)) {
            } else {
                echo " <a class='link-dark' href='https://api.whatsapp.com/send?phone=$reg->user_whatsapp_cont'>$reg->user_whatsapp_cont</a>
                <br>";
            }
            if (empty($reg->user_telefone_cont) || is_null($reg->user_telefone_cont)) {
            } else {
                echo " <a class='link-dark' href='tel:+$reg->user_telefone_cont'>$reg->user_telefone_cont</a>";
            }
            echo "</div>";
            }
            if (
                empty($reg->social_insta) || is_null($reg->social_insta)
                && empty($reg->social_twitter) || is_null($reg->social_twitter)
                && empty($reg->social_url) || is_null($reg->social_url)
            ) {
            } else {
                echo "<div class='col-12 mt-4'>
            <h5 class='text-uppercase'>redes sociais</h5> ";
            if (empty($reg->social_insta) || is_null($reg->social_insta)) {
            } else {
                echo " <a class='link-dark' href='https://www.instagram.com/$reg->social_insta/'>@$reg->social_insta</a>
                <br>";
            }
            if (empty($reg->social_twitter) || is_null($reg->social_twitter)) {
            } else {
                echo " <a class='link-dark' href='https://twitter.com/$reg->social_twitter'>@$reg->social_twitter</a>
                <br>";
            }
            if (empty($reg->social_url) || is_null($reg->social_url)) {
            } else {
                echo " <a class='link-dark link_save' href='$reg->social_url'>$reg->social_url</a>";
            }
        echo "</div>";
            }
        }
    } else {
        echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
    }
}
