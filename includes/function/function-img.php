<?php
    function img_perfil($arq) {
        $caminho="upload/img-user/$arq";

        if (is_null($arq) || !file_exists($caminho) || empty($arq)) {
            return "layout/image/user-yas.png";
        }

        else {
            return $caminho;
        }
    }

    function bg_proj($arq) {
        $caminho="upload/img-proj-bg/$arq";

        if (is_null($arq) || !file_exists($caminho) || empty($arq)) {
            return "layout/image/bg-yas.png";
        }

        else {
            return $caminho;
        }
    }
    function img_proj($arq) {
        $caminho="upload/img-proj/$arq";

        if (is_null($arq) || !file_exists($caminho) || empty($arq)) {
            return "layout/image/bg-yas.png";
        }

        else {
            return $caminho;
        }
    }

?>