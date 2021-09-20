<?php 
$busca = $banco->query("select * from projeto where proj_id='$cod'");
$value = $busca->fetch_object();
?>

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
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
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