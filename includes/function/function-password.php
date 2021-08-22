<?php

    function criptografar($senha){
        $cripto="";
        for($pos=0; $pos < strlen($senha); $pos++){
            $letra = ord($senha[$pos]) + 1 ;
            $cripto.=chr($letra);
        }
        return $cripto;
    }

    function criar_hash($senha){
        $hash = password_hash(criptografar($senha), PASSWORD_DEFAULT);
        return $hash;
    }

    function testar_hash($senha, $hash){
        $ok = password_verify (criptografar($senha), $hash);
        return $ok;
    }

?>