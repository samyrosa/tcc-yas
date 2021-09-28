<?php
$busca = $banco->query("select * from user_yas where user_id='$cod'");
$value = $busca->fetch_object();
?>

<form action='user-edit.php?cod=<?php echo $cod?>' method="post">
    <div class="container mt-5 pe-5 rounded-3" style="background-color:#e6e0de;">
        <div class="row">
            <div class="col-4 pt-5 text-center">
                <label class="preview-yas">
                    <input type="file" name="bg_projet" id="bg-yas" onchange="previewFile(this);" accept="image/*">
                    <?php
                    $perfil = img_perfil($reg->user_foto);
                    echo "<img id='previewImg' src='$perfil' alt='mdo' width='180' height='180' class='rounded-circle '>"
                    ?>
                </label>

            </div>
            <div class="col-8 mt-4 ">
                <div class="container-fluid my-4 border-bottom border-dark border-1">
                    <h5>INFORMAÇÕES PESSOAIS</h5>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="nome">Nome</label><input class="form-control shadow " type="text" name="nome"
                            id="nome" size="30" maxlength="30" value=" <?php echo $value->user_first_name ?>">
                    </div>
                    <div class="col-6">
                        <label for="sobrenome">Sobrenome</label><input class="form-control shadow " type="text"
                            name="sobrenome" id="sobrenome" size="30" maxlength="30"
                            value="<?php echo $value->user_last_name ?>">
                    </div>
                </div>
                <div class="col"> <label for="email">Email</label><input class="form-control shadow " type="email"
                        name="email" id="email" readonly value="<?php echo $value->user_email ?>">
                </div>
                <div class="col">
                    <label for="ocupacao">Ocupação</label><input class="form-control shadow " type="text"
                        name="ocupacao" id="ocupacao" value="<?php echo $value->user_carreira ?>">
                </div>
                <div class="col">
                    <label for="descricao">Descrição</label><textarea class="form-control shadow " id="descricao"
                        style="height: 200px"><?php echo $value->user_desc ?></textarea>
                </div>
                <div class="container-fluid my-4 border-bottom border-dark border-1">
                    <h5>CONTATOS</h5>
                </div>
                <div class="col"> <label for="email">Email</label><input class="form-control shadow " type="email"
                        name="cont-email" id="cont-email" value="<?php echo $value->user_email_cont ?>">
                </div>
                <div class="row">
                    <div class="col-6"> <label for="phone">Telefone</label><input class="form-control shadow" type="tel"
                            id="phone" name="phone" placeholder="(DD) 12345-6789"
                            value="<?php echo $value->user_telefone_cont ?>">
                    </div>
                    <div class="col-6">
                        <label for="phone">WhatsApp</label><input class="form-control shadow" type="tel" id="whatsapp"
                            name="whatsapp" placeholder="(DD) 12345-6789"
                            value="<?php echo $value->user_whatsapp_cont ?>">
                    </div>
                </div>
                <div class="container-fluid my-4 border-bottom border-dark border-1">
                    <h5>REDES SOCIAIS</h5>
                </div>
                <div class="row">
                    <div class="col"><label for="instagram">Instagram</label><input class="form-control shadow "
                            type="text" name="insta" id="insta" size="30" maxlength="30"
                            value="<?php echo $value->social_insta ?>">
                    </div>
                    <div class="col"><label for="twitter">Twitter</label><input class="form-control shadow " type="text"
                            name="twitter" id="twitter" size="30" maxlength="30"
                            value="<?php echo $value->social_twitter ?>">
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="link">Link</label><input class="form-control shadow " type="text" name="link" id="link"
                        size="30" maxlength="30" value="<?php echo $value->social_url ?>">
                </div>
            </div>
            <div class="container my-5 text-end">
            <button type="reset" class="btn btn-primary shadow me-3">Cancelar</button>
            <button type="submit" class="btn btn-success shadow ">Enviar</button>
        </div>
        </div>
    </div>
    

  
</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="layout/js/script.js"></script>