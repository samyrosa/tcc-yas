<?php
function Forms($valorEnviado)
{
    echo "
    <form action='user-recuperar.php' method='post'>
        <div class=' yas_box_senha shadow '>
            <div class='row'>
                <div class='col p-3'>
                    <div class='col'>
                        <label for='email'>Email </label><input class='form-control shadow ' type='email' name='email' id='email'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col ms-auto p-3 bd-highligh text-center'>
                        <button type='submit' class='btn btn-primary shadow '>Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
    ";
}
function FormsErro($emailValidar)
{
    echo "
    <form action='user-recuperar.php' method='post'>
        <div class=' yas_box_senha shadow '>
            <div class='row'>
                <div class='col p-3'>
                    <div class='col'>
                    nenhuma conta corespondente pr o email $emailValidar 
                    </div>
                </div>
                <div class='row'>
                    <div class='col ms-auto p-3 bd-highligh text-center'>
                        <button type='submit' class='btn btn-primary shadow '>Tenta Novamente</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
    ";
}

function Formssucesso($emailValidar)
{
    echo "
    <form action='user-login.php' method='post'>
        <div class=' yas_box_senha shadow '>
            <div class='row'>
                <div class='col p-3'>
                    <div class='col'>
                    <h3>foi enviado pra o email $emailValidar  o link de refiniçao de senha</h3>
                    siga as intruçoes que acompanha o email com o link
                    </div>
                </div>
                <div class='row'>
                    <div class='col ms-auto p-3 bd-highligh text-center'>
                        <button type='submit' class='btn btn-primary shadow '>Ok</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
    ";
}


?>

<svg width="auto" height="auto" id="yas_wave_login" viewBox="0 0 1458 557" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.409912 557L1458 557L1458 291.305V274.232L1458 92.9303C1078.13 -83.7886 858.597 46.5671 672.584 157.018C465.364 280.062 299.745 378.403 0.409912 0L0.409912 274.232V291.305L0.409912 557Z" fill="#204B3D" />
</svg>