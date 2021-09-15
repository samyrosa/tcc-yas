// preview imagem bg
function previewFile(input) {
    var file = $("input[type=file]").get(0).files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function () {
            $("#previewImg").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}

// preview multiplos img
$(".imgAdd").click(function () {
    $(this).closest(".row").find('.imgAdd').before(
        '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-success"><i class="bi bi-cloud-upload"></i> Upload<input type="file" class="uploadFile img" name="files[]" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label>  <button type="button" class="btn btn-primary del"><i class="bi bi-trash " > </i> Deletar</button></div>'
    );
});
$(document).on("click", "button.del", function () {
    // 	to remove card
    $(this).parent().remove();
    // to clear image
    // $(this).parent().find('.imagePreview').css("background-image","url('')");
});
$(function () {
    $(document).on("change", ".uploadFile", function () {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader)
            return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function () { // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image",
                    "url(" + this.result + ")");
            }
        }

    });
});