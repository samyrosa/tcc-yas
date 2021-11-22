<?php
$busca = $banco->query("select * from projeto where proj_id='$cod'");
$value = $busca->fetch_object();
?>
<style>
    .radio-image label>input {
        visibility: hidden;
    }

    .radio-image label>input+img {
        cursor: pointer;
        border: 4px solid #EEE;
        border-radius: 15px;
    }

    .radio-image label>input:checked+img {
        border: 4px solid #fa8589;
        
        filter: blur(2px);
        -webkit-filter: blur(2);
    }
</style>
<form action="proj-edit.php?cod=<?php echo$cod ?>" method="POST" enctype="multipart/form-data">
    <div class="container mt-5">
        <div class="row">
            <div class="col-5">
                <label class="preview-yas">
                    <input type="file" name="bg_projet" id="bg-yas" onchange="previewFile(this);" accept="image/*">
                    <?php
                    $Pcapa = bg_proj($value->proj_back_img);
                    echo "<img id='previewImg' src='$Pcapa' alt='mdo' width='480' height='250' 'class='rounded-3'>"
                    ?>
                </label>
            </div>
            <div class="col-7 ps-5">
                <label for="nomeProj">Nome do Projeto</label><input class="form-control shadow " type="text" name="nomeProj" id="nomeProj" size="30" maxlength="30" value=" <?php echo $value->proj_name ?>">
                <label for="desc">Descrição</label><textarea class="form-control shadow " id="desc" style="height: 100px" name="desc"><?php echo $value->proj_desc ?></textarea>
                <label for="tag" name="tag" id="tag">Tag</label>
                <select class="form-select shadow " name="tag" aria-label="Default select example">
                    <?php
                    $q = "select tag_id, tag_name from tag_proj";
                    $busca = $banco->query($q);
                    while ($reg = $busca->fetch_object()) {
                        if ($value->tag_id == $reg->tag_id) {
                            $selected = 'selected';
                        } else {
                            $selected = "";
                        }
                        echo "<option value='$reg->tag_id' $selected>$reg->tag_name</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="container mt-5 radio-image">
    selecione as img para excluir:
        <div class='row row-cols-1 row-cols-md-2 g-3 mt-1'>
            <?php
            $galeria = $banco->query("select * from img_proj  where proj_id='$cod'");
            while ($img = $galeria->fetch_object()) {
                $image = img_proj($img->proj_img);
                echo "<div class='col'>
                <label for='$img->img_id'>
                    <input type='checkbox' name='img[]' id='$img->img_id' value='$img->img_id'>
                    <img src='$image' alt='$img->img_id' height='300' width='480' class='radio-image '>
                </label>
            </div>";
            }
            ?>
        </div>
    </div>
    </div>
    </div>

    <div class="container mt-5 text-end">
        <button type="reset" class="btn btn-primary shadow me-3">Cancelar</button>
        <button type="submit" class="btn btn-success shadow ">Enviar</button>
    </div>

</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="layout/js/script.js"></script>