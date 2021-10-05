<?php
$busca = $banco->query("$sql_user");
if (!$busca) {
    echo msg_erro('Opp..', 'Falha na busca do banco de dados, por favor tente denovo', 'Tentar Novamente', 'index.php');
} else {
    if ($busca->num_rows > 0) {
        while ($reg = $busca->fetch_object()) {
            if (empty($reg->user_desc) || is_null($reg->user_desc)){
                
            }else{
                echo"<div class='col-12 mt-4'>
                <h5 class='text-uppercase'>descrição</h5>
                <p class='descri'>$reg->user_desc</p>
            </div>";
            }
            echo "
        <div class='col-12 mt-4'>
            <h5 class='text-uppercase'>contato</h5>
            <a class='link-dark' href='mailto:$reg->user_email_cont'>$reg->user_email_cont</a>
            <br>
            <a class='link-dark' href='https://api.whatsapp.com/send?phone=$reg->user_whatsapp_cont'>$reg->user_whatsapp_cont</a>
            <br>
            <a class='link-dark' href='tel:+$reg->user_telefone_cont'>$reg->user_telefone_cont</a>
        </div>
        <div class='col-12 mt-4'>
            <h5 class='text-uppercase'>redes sociais</h5>
            <a class='link-dark' href='https://www.instagram.com/$reg->social_insta/'>@$reg->social_insta</a>
            <br>
            <a class='link-dark' href='https://twitter.com/$reg->social_twitter'>@$reg->social_twitter</a>
            <br>
            <a class='link-dark link_save' href='$reg->social_url'>$reg->social_url</a>
        </div>
        ";
        }
    } else {
        echo msg_erro('Opp..', 'Nenhum registro encontrado, por favor tente denovo', 'Tentar Novamente', 'index.php');
    }
}
