<?php
    function img_perfil($arq) {
        $caminho="uplod/img-user/$arq";

        if (is_null($arq) || !file_exists($caminho) || empty($arq)) {
            return "layout/image/user-yas.png";
        }

        else {
            return $caminho;
        }
    }

    function bg_proj($arq) {
        $caminho="uplod/img-proj-bg/$arq";

        if (is_null($arq) || !file_exists($caminho) || empty($arq)) {
            return "layout/image/bg-yas.png";
        }

        else {
            return $caminho;
        }
    }

?>