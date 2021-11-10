<?php
$busca = $banco->query("select * from user_yas where user_id='$cod'");
$value = $busca->fetch_object();
require_once "includes/header.php";
?>


<form action='user-edit.php?cod=<?php echo $cod ?>' method="post" enctype="multipart/form-data">
    <div class="container mt-5 pe-5 rounded-3" style="background-color:#e6e0de;">
        <div class="row">
            <div class="col-4 pt-5 text-center ">
                <label class="preview-yas">
                    <input type="file" name="userfoto" id="bg-yas" onchange="previewFile(this);" accept="image/*">
                    <?php
                    $perfil = img_perfil($reg->user_foto);
                    echo "<img id='previewImg' src='$perfil' alt='mdo' width='180' height='180' class='rounded-circle '>"
                    ?>
                </label>
                <div class="row mt-4">
                    <div class="col mx-5 text-uppercase border-bottom border-top border-dark ">
                        <ul class="list-unstyled mt-3 text-start">
                            <li><a class="link-dark" href="#infoP"><i class="bi bi-person-badge"></i> Infomaçãos
                                    Pessoais</a></li>
                            <li><a class="link-dark" href="#cont"><i class="bi bi-megaphone"></i> Contatos</a></li>
                            <li><a class="link-dark" href="#redeS"><i class="bi bi-globe"></i> Redes Sociais</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3 mx-5 text-uppercase ">
                        <ul class="list-unstyled text-start">
                            <li><a class="link-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i><b> Excluir
                                        perfil</b></a></li>

                        </ul>
                    </div>
                </div>
                <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header yas_msg_erro'>
                                <h5 class='modal-title' id='exampleModalLabel'> <i class='yas_icon_msg bi bi-x-circle-fill'></i> Excluir Perfil</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                Tem certeza que deseja sair do YAS? Fique com a gente...
                            </div>
                            <div class='modal-footer'>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                <button onclick="window.location.href = 'user-delete.php'" type="button" class="btn btn-success">Excluir</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-4 ">
                <div class="container-fluid my-4 border-bottom border-dark border-1">
                    <h5 id="infoP"><i class="bi bi-person-badge"></i> INFORMAÇÕES PESSOAIS</h5>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="nome">Nome</label><input class="form-control shadow " type="text" name="nome" id="nome" size="30" maxlength="30" value="<?php echo $value->user_first_name ?>">
                    </div>
                    <div class="col-6">
                        <label for="sobrenome">Sobrenome</label><input class="form-control shadow " type="text" name="sobrenome" id="sobrenome" size="30" maxlength="30" value="<?php echo $value->user_last_name ?>">
                    </div>
                </div>
                <div class="col"> <label for="email">Email</label><input class="form-control shadow " type="email" name="email" id="email" readonly value="<?php echo $value->user_email ?>">
                </div>
                <div class="col">
                    <label for="ocupacao">Ocupação</label><input class="form-control shadow " type="text" name="ocupacao" id="ocupacao" value="<?php echo $value->user_carreira ?>">
                </div>
                <div class="col" id="cont">
                    <label for="descricao">Descrição</label><textarea class="form-control shadow " name="descricao" id="descricao" style="height: 200px"><?php echo $value->user_desc ?></textarea>
                </div>
                <div class="container-fluid my-4 border-bottom border-dark border-1">
                    <h5><i class="bi bi-megaphone"></i> CONTATOS</h5>
                </div>
                <div class="col"> <label for="email">Email</label><input class="form-control shadow " type="email" name="cont-email" id="cont-email" maxlength="400" value="<?php echo $value->user_email_cont ?>">
                </div>
                <div class="row">
                    <div class="col-6"> <label for="phone">Telefone</label><input class="form-control shadow" type="tel" id="phone" name="phone" placeholder="DD12345-6789" maxlength="11" value="<?php echo $value->user_telefone_cont ?>">
                    </div>
                    <div class="col-6" id="redeS">
                        <label for="phone">WhatsApp</label><input class="form-control shadow" type="tel" id="whatsapp" name="whatsapp" placeholder="DD12345-6789" maxlength="11" value="<?php echo $value->user_whatsapp_cont ?>">
                    </div>
                </div>
                <div class="container-fluid my-4 border-bottom border-dark border-1">
                    <h5><i class="bi bi-globe"></i> REDES SOCIAIS</h5>
                </div>
                <div class="row">
                    <div class="col"><label for="instagram">Instagram</label><input class="form-control shadow " type="text" name="insta" id="insta" size="30" maxlength="20" value="<?php echo $value->social_insta ?>">
                    </div>
                    <div class="col"><label for="twitter">Twitter</label><input class="form-control shadow " type="text" name="twitter" id="twitter" size="30" maxlength="20" value="<?php echo $value->social_twitter ?>">
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="link">Link</label><input class="form-control shadow " type="text" name="link" id="link" size="30" maxlength="50" value="<?php echo $value->social_url ?>">
                </div>
            </div>
            <div class="container my-5 text-end">
                <button onclick="window.location.href = 'user-perfil.php?cod=<?php echo $cod; ?>'" type='reset' class='btn btn-primary shadow me-3'>Cancelar</btton>
                    <button type="submit" class="btn btn-success shadow ">Enviar</button>
            </div>
        </div>
    </div>



</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="layout/js/script.js"></script>