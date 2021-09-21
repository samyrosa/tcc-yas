<style>
    label.btn-success {
        background-color: var(--yas_color4);
        border: 0;
        color: var(--yas_color1);

    }

    label.btn-success:hover {
        border: 0;
        background-color: var(--yas_color3);
        color: var(--yas_color5);
    }

    label.btn-success:link {
        border: 0;
        background-color: var(--yas_color3);
        color: var(--yas_color5);
    }

    label.btn-success:visited {
        border: 0;
        background-color: var(--yas_color3);
        color: var(--yas_color5);
    }

    label.btn-success:active {
        border: 0;
        background-color: var(--yas_color3);
        color: var(--yas_color5);
    }

    .imagePreview {
        width: 100%;
        height: 200px;
        border-radius: 5px 5px 0px 0px;
        background-position: center center;
        background-color: var(--yas_color1);
        display: inline-block;
    }

    label.btn-success {
        display: block;
        border-radius: 0px;
        margin-top: -10px;
    }

    .imgUp {
        margin-bottom: 15px;
    }

    button.del {
        width: 100%;
        border-radius: 0;
    }

    .imgAdd {

        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: var(--yas_color3);
        background-size: cover;
        color: rgb(0, 0, 0);
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
        text-align: center;
        line-height: 30px;
        margin-top: 5px;
        margin-left: 10px;
        cursor: pointer;
        font-size: 15px;
    }
</style>

<form action="proj-add.php" method="POST" enctype="multipart/form-data">
    <div class="container mt-5">
        <div class="row">
            <div class="col-5">
                <label class="preview-yas">
                    <input type="file" name="bg_projet" id="bg-yas" onchange="previewFile(this);" accept="image/*">
                    <img id="previewImg" class="rounded-3" src="layout/image/preview-yas.png" alt="Placeholder">
                </label>
            </div>
            <div class="col-7 ps-5">
                <label for="nomeProj">Nome do Projeto</label><input class="form-control shadow " type="text"
                    name="nomeProj" id="nomeProj" size="30" maxlength="30">
                <label for="desc">Descrição</label><textarea class="form-control shadow " id="desc"
                    style="height: 100px" name="desc"></textarea>
                <label for="tag">Tag</label>
                <select class="form-select shadow " name="tag" aria-label="Default select example">
                    <option selected>Tag</option>
                    <?php
                    $busca = $banco->query("select * from tag_proj");
                    while ($value = $busca->fetch_object()) {
                        echo "<option value='$value->tag_id'>$value->tag_name</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="container mt-5 ps-5">
        <div class="row">
            <div class="col-sm-2 imgUp">
                <div class="imagePreview"></div><label class="btn btn-success"><i class="bi bi-cloud-upload"></i>
                    Upload<input type="file" class="uploadFile img" name="files[]" value="Upload Photo"
                        style="width:0px;height:0px;overflow:hidden;"></label> <button type="button"
                    class="btn btn-primary del"><i class="bi bi-trash "> </i> Deletar</button>
            </div>
            <i class="bi bi-plus imgAdd p-0"></i>
        </div>
    </div>
    <div class="container mt-5 text-end">
        <button type="reset" class="btn btn-primary shadow me-3">Cancelar</button>
        <button type="submit" class="btn btn-success shadow ">Enviar</button>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="layout/js/script.js"></script>